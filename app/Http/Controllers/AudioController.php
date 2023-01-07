<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index()
    {
        $audio= Audio::all();
        return view('audio_file_check',compact('audio'));
    }

    public function add(Request $request)
    {
        $audio= new Audio();            
        if($request->hasFile('file')) 
        {        
        $destinationPath = 'uploads/audio_file'; 
        $audio = $request->file('file');
        $audio_file = date('YmdHis') . "." . $audio->getClientOriginalExtension();
        $audio->move($destinationPath, $audio_file);
        $audio->audio = $audio_file;   
        }  
        $audio->save();
        return redirect('/')->with('success','Record has been added');
    }
}
