<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likeController extends Controller
{
    public function handlelike(\App\Internship $internship, Request $request)
    {
        $student = \Auth::user();

        $check = \App\Like::
            where('internship_id', $internship->id)
            ->where('user_id', $student->id)
            ->exists();

        if ($check == null) {
            $like = new \App\Like();
            $like->internship_id = $internship->id;
            $like->user_id = $student->id;
            $like->save();
        }
        //$data = \App\Like::where('internship_id', '=', $internship->id)->first();
        // $companyName = $data->name;
        //$request->session()->flash('message', "Je hebt succesvol gesoliciteerd voor  '$internship->internship_function' bij $companyName");
        return redirect()->back();
    }
}
