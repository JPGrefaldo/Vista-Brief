<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PDF;

use App\Brief;

class PdfController extends Controller
{
    public function pdfBriefSubmittedAttachment($id) 
    {
    	// return view('pdf.briefsubmittedpdf-3');
    	// $html = \View::make('pdf.briefsubmittedpdf-3')->render();
    	// return PDF::loadHTML($html)->stream();
    	$pdf = PDF::loadView('pdf.briefsubmittedpdf-3');
    	return $pdf->stream('BriefSheet.pdf');
    	// return;
    	// $brief = Brief::find($id);

    	// return view('pdf.briefsubmittedpdf-3');
    	// return view('pdf.briefsubmittedpdf-1', compact('brief'));
    	// $pdf = PDF::loadView('pdf.briefsubmittedpdf-1', compact('brief'));
    	// return $pdf->stream('Brief Sheet.pdf');
    }
}
