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

    public function welcomeIndex()
    {
        $data['internships'] = \App\Internship::with('jobApplications')->take(6)->get();
        $data['tags'] = \App\CompanyTag::get();

        return view('welcome', $data);
    }
}
