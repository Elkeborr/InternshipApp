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
        $data['user'] = \App\User::where('id', $user)->with('skills', 'socials')->first();

        return view('students/show', $data);
    }

    //op basis van id, opzoek gaan naar record
    public function edit($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit', $data);
    }

    public function update(Request $request)
    {
        $validation = $request->validate([
            'firstname' => 'required|max:200',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = session('user');
        $data['user'] = \App\User::where('id', $user)->first();

        $user->name = request('firstname');
        $user->lastname = request('lastname');
        $user->biography = request('biography');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->updated_at = date('Y-m-d h:i:s');
        $user->save();

        /*
        if ($user->save()) {
            //deleten $skill = \App\Skill::where('id',$skill)->delete();
            //nieuwe toevoegen $skill = new \App\Skill();
            $skill->name = request('skill');
            $skill->user_id = request('id');
            $skill->save;
        */
        return redirect()->action('StudentController@show', $user);
        /*
        }
        */
    }
}
