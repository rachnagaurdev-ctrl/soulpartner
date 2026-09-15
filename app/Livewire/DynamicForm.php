<?php

namespace App\Livewire;

use App\Models\Form;
use App\Models\FormSubmission;
use Livewire\Component;
use Illuminate\Support\Facades\Request;

class DynamicForm extends Component
{
    public Form $formModel;
     public array $data = [];
    public bool $success = false;

    public function mount(string $slug)
    {
        $this->formModel = Form::where('slug', $slug)->firstOrFail();
        
        foreach ($this->formModel->fields as $field) {
            $this->data[$field['data']['name']] = '';
        }
    }

    public function submit()
    {
        $rules = [];
        $messages = [];

        foreach ($this->formModel->fields as $field) {
            $fieldName = $field['data']['name'];
            $label = $field['data']['label'];
            
            $fieldRules = [];
            if (!empty($field['data']['required'])) {
                $fieldRules[] = 'required';
            }
            
            if ($field['type'] === 'email') {
                $fieldRules[] = 'email';
            }

            if (!empty($fieldRules)) {
                $rules["data.$fieldName"] = implode('|', $fieldRules);
                $messages["data.$fieldName.required"] = "$label is required.";
                $messages["data.$fieldName.email"] = "$label must be a valid email address.";
            }
        }

        $this->validate($rules, $messages);

        $submission = FormSubmission::create([
            'form_id' => $this->formModel->id,
            'data' => $this->data,
            'metadata' => [
                'ip' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'referer' => Request::header('referer'),
            ],
        ]);

        // Send Email Notifications
        $notificationEmails = $this->formModel->settings['notification_emails'] ?? null;
        if ($notificationEmails) {
            $emails = array_map('trim', explode(',', $notificationEmails));
            foreach ($emails as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\FormSubmitted($submission));
                }
            }
        }

        $this->success = true;
        $this->data = array_map(fn($v) => '', $this->data);
    }

    public function render()
    {
        return view('livewire.dynamic-form');
    }
}
