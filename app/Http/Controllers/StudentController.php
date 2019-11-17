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
        $user->biography = request('biography');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->updated_at = date('Y-m-d h:i:s');
        $user->save();
        /*
                //deleten $skill = \App\Skill::where('id',$skill)->delete();

                //nieuwe skill toevoegen WERKT!!!
                $skill = new \App\Skill();
                $skill->skill = request('skill');
                $skill->user_id = $user->id;
                $skill->save();

                //nieuwe social toevoegen WERKT!!!
                $social = new \App\Social();
                $social->link = request('sociallink');
                $social->name = request('socialname');
                $social->user_id = $user->id;
                $social->save();

                //bestaande skills wijzigen

                //$skillEdit['skill'] = \App\Skill::find(request('skillid'))->first();
                $skillEdit = \App\Skill::where('id', request('skillid'))->first();
                /*$skill->id = request('skillid');*/
        /*
                if ($skillEdit == null) {
                    $skillEdit = new \App\Skill();
                    $skillEdit->skill = request('skill');
                    $skillEdit->user_id = $user->id;
                    $skillEdit->save();
                }

                if ($skillEdit) {
                    $skillEdit->skill = request('skill');
                    $skillEdit->user_id = $user->id;
                    $skillEdit->save();
                }

               */
        /*aanpassing werkt enkel op de laats toegevoegde skill*/
        /*
        $skillEdit = \App\Skill::where('id', request('skillid'))->update();
        $skillEdit->skill = request('skillEdit');
        $skillEdit->user_id = $user->id;
        $skillEdit->save();
        */

        /*
                    $editSkill = \App\Skill::firstOrCreate(
                        [
                            'id' => request('skillid'),
                        ],

                        [
                            'skill' => request('skill'),
                            'user_id' => $user->id,
                        ]);

                    $editSkill->save();
        */
        return redirect()->action('StudentController@show', $user);
    }
}
