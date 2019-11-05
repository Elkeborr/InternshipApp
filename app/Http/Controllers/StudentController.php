<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request)
    {
        $user = session('user');
        $data['user'] = \App\User::where('id', $user)->first();

        $user->id = request('id');
        $user->name = request('firstname');
        $user->email = request('email');
        $user->type = request('type');
        $user->password = Hash::make(request('password'));
        $user->updated_at = date('Y-m-d h:i:s');
        $user->save();

        return redirect('home');
    }
}
