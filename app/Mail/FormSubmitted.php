<?php

namespace App\Mail;

use App\Models\FormSubmission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FormSubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public FormSubmission $submission
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Submission: ' . $this->submission->form->name,
        );
    }

    public function content(): Content
    {
        $template = $this->submission->form->settings['email_template'] ?? null;
        
        if ($template) {
            $content = $template;
            
            // Replace {data} with a table of all fields
            if (str_contains($content, '{data}')) {
                $table = '<table style="width:100%; border-collapse: collapse;">';
                foreach ($this->submission->data as $key => $value) {
                    $label = \Illuminate\Support\Str::headline($key);
                    $val = is_array($value) ? implode(', ', $value) : $value;
                    $table .= "<tr><td style='padding: 8px; border: 1px solid #ddd; font-weight: bold;'>$label</td><td style='padding: 8px; border: 1px solid #ddd;'>$val</td></tr>";
                }
                $table .= '</table>';
                $content = str_replace('{data}', $table, $content);
            }

            // Replace individual fields {field_name}
            foreach ($this->submission->data as $key => $value) {
                $val = is_array($value) ? implode(', ', $value) : $value;
                $content = str_replace('{' . $key . '}', (string)$val, $content);
            }

            return new Content(
                html: 'emails.custom-form-submitted',
                with: [
                    'content' => $content,
                ],
            );
        }

        return new Content(
            markdown: 'emails.form-submitted',
            with: [
                'data' => $this->submission->data,
                'formName' => $this->submission->form->name,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
