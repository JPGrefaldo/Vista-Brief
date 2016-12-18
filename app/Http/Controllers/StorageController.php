<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;
use Carbon\Carbon;
// use Illuminate\Filesystem\Filesystem;
// use Illuminate\Support\Collection;

class StorageController extends Controller
{
  public function index() 
  {
  	$minutes = 20;
  	$timeInPast = Carbon::now()->subMinutes($minutes);

    $files = collect(Storage::disk('temp_pdf')->files())
    ->filter(function ($file) use ($timeInPast) {
      return Carbon::createFromTimestamp(filemtime(storage_path().'/app/temp/'.$file))
         ->lt($timeInPast);
    });

    $count = count($files);
  	return view('storage.index', compact('count'));
  }

  public function delete() 
  {
    $minutes = 20;
  	$timeInPast = Carbon::now()->subMinutes($minutes);

    $files = collect(Storage::disk('temp_pdf')->files())
    ->filter(function ($file) use ($timeInPast) {
      return Carbon::createFromTimestamp(filemtime(storage_path().'/app/temp/'.$file))
         ->lt($timeInPast);
    })
    ->each(function ($file) {
        echo '<p>'.$file.'</p>';
        // Storage::disk('temp_pdf')->delete($file);
    });
  }
}
