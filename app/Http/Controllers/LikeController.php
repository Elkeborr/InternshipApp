<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likeController extends Controller
{
    public function handlelike(Request $request)
    {
        if ($request['save']) {
            $student = \Auth::user();
            $internship = $request->route('internship');

            $check = \App\Like::
                    where('internship_id', $internship)
                    ->where('user_id', $student->id)
                    ->exists();

            if ($check == null) {
                $like = new \App\Like();
                $like->internship_id = $internship;
                $like->user_id = $student->id;
                $like->status = true;
                $like->save();
            }

            return redirect()->back();
        }
    }
}
