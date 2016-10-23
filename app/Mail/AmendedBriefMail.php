<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AmendedBriefMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $updated_at;
    protected $jobnumber;
    protected $jobname;
    protected $projectmanager;
    protected $department_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Brief $brief, $department_name)
    {
        $this->updated_at       = $brief->updated_at->format('m/d/Y h:m');
        $this->jobnumber        = $brief->jobnumber;
        $this->jobname          = $brief->jobname;
        $this->projectmanager   = $brief->projectmanager;
        $this->department_name  = $department_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.amendedbriefemail')
                    ->with([
                        'updated_at'        => $this->updated_at,
                        'jobnumber'         => $this->jobnumber,
                        'jobname'           => $this->jobname,
                        'projectmanager'    => $this->projectmanager,
                        'department_name'   => $this->department_name,
                    ]);
    }
}
