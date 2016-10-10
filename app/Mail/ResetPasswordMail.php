<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $title = "Reset Password Request";
    protected $username;
    protected $validation_key;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $validation_key)
    {
        $this->username = $request->username;
        $this->validation_key = $validation_key;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetpassword')
                    ->with([
                        'username'          =>  $this->username,
                        'validation_key'    =>  $this->validation_key,
                    ]);
    }
}
