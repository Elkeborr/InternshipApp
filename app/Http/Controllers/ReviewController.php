<?php

namespace App\Http\Controllers;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews/create');
    }

    public function handleCreate(Request $request)
    {
        $user = session('user');
        $review = new \App\Review();

        $review->review = $request->input('review');
        $review->score = $request->input('score');
        $review->company_id = ?;
        $review->user_id = $user->id;

        $review->save();

        return redirect('');
    }
}
