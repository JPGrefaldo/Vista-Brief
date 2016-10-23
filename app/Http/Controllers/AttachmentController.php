<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;

use App\Attachment;

class AttachmentController extends Controller
{
    public function download($id) 
    {
		$attachment = \App\Attachment::find($id);
		
		$storage_path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
		$file_path = $attachment->directory.$attachment->filename;

		$headers = array('Content-Type: '.$attachment->filetype);

		return response()->download($storage_path.$file_path, $attachment->filename, $headers);
    }
}
