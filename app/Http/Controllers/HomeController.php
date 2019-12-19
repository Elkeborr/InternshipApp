<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['internships'] = \App\Internship::where('company_id', \Auth::user()->company_id)->where('status', true)->get();
        $data['company'] = \App\Company::where('id', \Auth::user()->company_id)->first();

        $data['jobApplications'] = \App\JobApplication::where('user_id', \Auth::user()->id)->get();
        $data['likes'] = \App\Like::where('user_id', \Auth::user()->id)
        ->where('status', true)
        ->with('internship')
        ->get();

        $data['messagesStudent'] = \App\Message::where('user_id', \Auth::user()->id)->get();

        $data['messagesCompany'] = \App\Message::where('company_id', \Auth::user()->company_id)->first();

        return view('home', $data);
    }
}
