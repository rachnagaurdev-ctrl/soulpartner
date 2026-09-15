<?php

namespace App\Livewire;

use App\Models\Form;
use App\Models\FormSubmission;
use Livewire\Component;
use Illuminate\Support\Facades\Request;
use App\Mail\FormSubmitted;
use Illuminate\Support\Facades\Mail;

class FooterSubscription extends Component
{
    public string $email = '';
    public bool $success = false;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function submit()
    {
        $this->validate();

        $form = Form::where('slug', 'newsletter')->first();
        
        if (!$form) {
            return;
        }

        $submission = FormSubmission::create([
            'form_id' => $form->id,
            'data' => ['email' => $this->email],
            'metadata' => [
                'ip' => Request::ip(),
                'user_agent' => Request::userAgent(),
                'location' => 'footer',
            ],
        ]);

        // Send Notification if configured
        $notificationEmails = $form->settings['notification_emails'] ?? null;
        if ($notificationEmails) {
            $emails = array_map('trim', explode(',', $notificationEmails));
            foreach ($emails as $recipient) {
                if (filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
                    Mail::to($recipient)->send(new FormSubmitted($submission));
                }
            }
        }

        $this->success = true;
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.footer-subscription');
    }
}
