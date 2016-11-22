<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Brief;
use App\Department;
use PDF;

class AmendedBriefMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $subject = 'Amended Brief Sheet: Vista Brief';
    protected $brief_id;
    protected $updated_at;
    protected $jobnumber;
    protected $jobname;
    protected $projectmanager;
    protected $department_name;
    protected $pdf_file_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Brief $brief, $department_name)
    {
        $this->brief_id         = $brief->id;
        $this->updated_at       = $brief->updated_at->format('m/d/Y h:m');
        $this->jobnumber        = $brief->jobnumber;
        $this->jobname          = $brief->jobname;
        $this->projectmanager   = $brief->projectmanager;
        $this->department_name  = $department_name;

        $this->subject          = 'Amended Brief Sheet: '.$brief->client->name.' - '.$brief->jobname.' - '.$brief->keydeliverables;

        $this->pdf_file_name    = 'Amended Brief Sheet: '.$brief->jobnumber.' - '.$brief->client->name.' - '.$brief->jobname.' - '.$brief->keydeliverables.'.pdf';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.amendedbriefemail')
                    ->subject($this->subject)
                    ->attach($this->attachment(), ['as'=>$this->pdf_file_name])
                    ->with([
                        'updated_at'        => $this->updated_at,
                        'jobnumber'         => $this->jobnumber,
                        'jobname'           => $this->jobname,
                        'projectmanager'    => $this->projectmanager,
                        'department_name'   => $this->department_name,
                    ]);
    }

    public function attachment() 
    {
        $brief = Brief::find($this->brief_id);
        $departments = Department::isactive()->get();

        // insert the classNames string to the amends-attachment collection data
        foreach($brief->amendments as $key => $amendment) {
            foreach ($amendment->attachments as $attachment) {
                $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
                $attachment->classNames = $classNames;
            }
        }

        foreach($brief->attachmentsNotAmend as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

        $pdf = PDF::loadView('pdf.amendedbriefpdf-1', compact('brief', 'departments'))->setPaper('a4');
        $save_directory = storage_path().'/app/temp/';
        $random_filename = str_random(10).'.pdf';
        $pdf->save($save_directory.$random_filename);

        return $save_directory.$random_filename;
    }
}
