<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class likeController extends Controller
{
    public function handleLike(Request $request)
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

    public function deleteLike(Request $request)
    {
        if ($request['delete']) {
            $student = \Auth::user();
            $internship_id = $request->input('id');
            $like = \App\Like::where('user_id', $student->id)
                ->where('internship_id', $internship_id)->first();

            $like->status = false;
            $like->save();

            return redirect()->back();
        }
    }
}
