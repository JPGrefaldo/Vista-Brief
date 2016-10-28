<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $subject = 'Account - Vista Brief';
    public $title;
    protected $username;
    protected $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                ->view('emails.newuseremail')
                ->subject($this->subject)
                ->with([
                    'username'  =>  $this->username,
                    'password'  =>  $this->password,
                ]);
    }
}
