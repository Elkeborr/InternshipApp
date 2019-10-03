<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index()
    {
        $data['students'] = \DB::table('students')->get();

        return view('students/index', $data);
    }

    //op basis van id, opzoek gaan naar record
    public function show(\App\Student $student)
    {
        //record doorgeven
        $student = $student;
        //$student = \DB::table('students')->where('id', $student)->first();
        dd($student);
    }
}
