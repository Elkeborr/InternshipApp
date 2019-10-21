<?php

namespace App\Http\Controllers;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \App\Internship::with('jobApplications')->get();
        return view('internships/index', $data);
    }

    public function show($internship)
    {
        $data['internship'] = \App\Internship::where('id', $internship)->with('company', 'jobApplications')->first();
        return view('internships/show', $data);
    }
}
