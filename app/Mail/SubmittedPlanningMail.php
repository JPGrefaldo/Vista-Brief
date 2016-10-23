<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmittedPlanningMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Planning $planning)
    {
        $this->updated_at = $planning->updated_at->format('M d, Y h:m');
        $this->title      = $planning->title;
        $this->client     = $planning->client->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submittedplanningemail')
                    ->with([
                        'updated_at' => $this->updated_at,
                        'title'      => $this->title,
                        'client'     => $this->client,
                    ]);
    }
}
