<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = \App\Student::get();

        return view('students/index', $data);
    }

    //op basis van id, opzoek gaan naar record
    public function show($student)
    {
        $data['student'] = \App\Student::where('id', $student)->first();
        //record doorgeven
        //$student = $student;
        //$student = \DB::table('students')->where('id', $student)->first();
        //dd($student);

        return view('students/show', $data);
    }
}
