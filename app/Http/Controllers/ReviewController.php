<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function handleCreate(Request $request)
    {
        $user = session('user');
        $review = new \App\Review();
        $review->review = $request->input('review');
        $review->score = $request->input('score');
        $review->company_id = $request->route('company');
        $review->user_id = $user->id;
        $saved = $review->save();

        if ($saved) {
            $request->session()->flash('message', 'bedankt!');

            return redirect()->back();
        }
        $request->session()->flash('message', 'Oeps, er is iets fout gelopen');

        return redirect()->back();
    }
}
