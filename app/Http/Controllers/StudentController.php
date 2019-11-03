<?php

namespace App\Http\Controllers;

class StudentController extends Controller
{
    public function index()
    {
        $data['users'] = \App\Student::get();

        return view('users/index', $data);
    }

    //op basis van id, opzoek gaan naar record
    public function show($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();
        //record doorgeven
        //$student = $student;
        //$student = \DB::table('students')->where('id', $student)->first();
        //dd($student);

        return view('students/show', $data);
    }

    //op basis van id, opzoek gaan naar record
    public function edit($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();
        //record doorgeven
        //$student = $student;
        //$student = \DB::table('students')->where('id', $student)->first();
        //dd($student);

        return view('/students/edit', $data);
    }
}
