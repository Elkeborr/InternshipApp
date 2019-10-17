<?php

namespace App\Http\Controllers;

class InternshipController extends Controller
{
    public function index()
    {
        $data['internships'] = \DB::table('internships')->get();

        return view('internships/index', $data);
    }

    public function show(\App\Internship $internship)
    {
        $data['internship'] = $internship;
        // $internship = \DB::table('internships')->where('id', $internship)->first();
        // dd($internship);
        return view('internships/show', $data);
    }

    public function apply(\App\Internship $internship)
    {
        $data['internship'] = $internship;
        return view('internships/apply', $data);
    }
}
