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

        if ($user == \Auth::User()->id) {
            return view('/students/edit', $data);
        } else {
            return view('/students/show', $data);
        }
    }

    public function editIntro($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit-intro', $data);
    }

    public function editKwaliteiten($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit-kwaliteiten', $data);
    }

    public function editSocial($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit-social', $data);
    }

    public function addKwaliteiten($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/add-kwaliteiten', $data);
    }

    public function saveKwaliteiten(Request $request)
    {
        $validation = $request->validate([
            'skill' => 'required',
        ]);

        $user = session('user');
        $skill = new \App\Skill();
        $skill->skill = request('skill');
        $skill->user_id = $user->id;
        $skill->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function addSocial($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/add-social', $data);
    }

    public function saveSocial(Request $request)
    {
        $validation = $request->validate([
            'socialname' => 'required',
            'sociallink' => 'required|starts_with:http://',
        ]);

        $user = session('user');
        $social = new \App\Social();
        $social->link = request('sociallink');
        $social->name = request('socialname');
        $social->user_id = $user->id;
        $social->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function update(Request $request)
    {
        $validation = $request->validate([
            'firstname' => 'required|max:200',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = session('user');

        $user->name = request('firstname');
        $user->lastname = request('lastname');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->updated_at = date('Y-m-d h:i:s');
        $user->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function updateIntro(Request $request)
    {
        $user = session('user');
        $user->biography = request('biography');
        $user->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function updateKwaliteiten(Request $request)
    {
        /*\App\Skill('post')->where('id', request('skillid'))->update(['skill' => request('skillEdit')]);*/
        $user = session('user');

        //\App\Skill::where('id', '=', request('skillid'))->update(['skill' => request('skillEdit')]);

        //$skillEdit['skill'] = \App\Skill::where('id', request('skillid'))->first();

        //DIT WERKT ENKEL DE LAATSTE!!!!!
        $skill = \App\Skill::where('id', request('skillid'));
        $skill->skill = request('skill');
        //$skillEdit->skill = request('skill');
        $skill->save();

        /*$skillEdit['skill'] = \App\Skill::find(request('skillid'))->first();*/
        /*
        $skillEdit = \App\Skill::where('id', request('skillid'))->get();
        $skill->id = request('skillid');
        $skillEdit->skill = request('skillEdit');
        $skillEdit->user_id = $user->id;
        $skillEdit->save();
        */

        $user = \Auth::User();

        return redirect()->action('StudentController@show', $user->id);
    }

    public function updateSocial(Request $request)
    {
        $user = session('user');

        return redirect()->action('StudentController@show', $user);
    }
}
