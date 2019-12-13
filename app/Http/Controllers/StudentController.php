<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use Redirect;

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
        $data['jobApplications'] = \App\JobApplication::where('user_id', $user)->get();

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

    public function editSkills($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit-skills', $data);
    }

    public function editSocial($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/edit-social', $data);
    }

    public function addSkills($user)
    {
        $data['user'] = \App\User::where('id', $user)->first();

        return view('/students/add-skills', $data);
    }

    public function saveSkills(Request $request)
    {
        $validation = $request->validate([
            'skill' => 'required',
        ]);
        /* werkt alleen voor de laatste */
        $user = session('user');
        $skill = new \App\Skill();
        $skill->skill = request('skill');
        $skill->user_id = $user->id;
        $skill->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function deleteSkills(Request $request)
    {
        $user = session('user');
        $id = request('skillid');
        $skill = \App\Skill::where('id', $id);
        $skill->delete();

        return redirect()->action('StudentController@editSkills', $user);
    }

    public function deleteSocial(Request $request)
    {
        $user = session('user');
        $id = request('socialId');
        $social = \App\Social::where('id', $id);
        $social->delete();

        return redirect()->action('StudentController@editSocial', $user);
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

    public function imageUploadPost()
    {
        request()->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('profileImages'), $imageName);

        $user = session('user');
        $user->profile_picture = $imageName;
        $user->save();

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }

    public function updateIntro(Request $request)
    {
        $user = session('user');
        $user->biography = request('biography');
        $user->save();

        return redirect()->action('StudentController@show', $user);
    }

    public function updateSkills(Request $request)
    {
        $validation = $request->validate([
            'skill' => 'required',
        ]);
        $user = session('user');
        $skill = \App\Skill::where('id', request('skillid'))->first();
        $skill->skill = request('skill');
        $skill->user_id = $user->id;
        $skill->save();

        return redirect()->action('StudentController@editSkills', $user);
    }

    public function updateSocial(Request $request)
    {
        $validation = $request->validate([
            'socialName' => 'required',
            'socialLink' => 'required|starts_with:http://',
        ]);
        $user = session('user');
        $social = \App\Social::where('id', request('socialId'))->first();
        $social->name = request('socialName');
        $social->link = request('socialLink');
        $social->user_id = $user->id;
        $social->save();

        return redirect()->action('StudentController@editSocial', $user);
    }

    /* -------------------- LOGIN ----------------------- */
    public function login()
    {
        return view('students/login');
    }

    public function handleLogin(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $request->flash();
        if (Auth::attempt($credentials)) {
            $request->session()->flash('message', 'Login successvol!');
            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();
            if ($user->type == 'student') {
                //Put user data in session User
                $request->session()->put('user', $user);
                // dd($sessionData['name']);
                return redirect('home');
            }
            $request->session()->flash('message', 'Hier kunnen enkel studenten inloggen');

            return view('students/login');
        }
        $request->session()->flash('message', 'Login lukt niet, probeer opnieuw');

        return view('students/login');
    }

    public function register(Request $request)
    {
        return view('students/register');
    }

    public function handleRegister(Request $request)
    {
        $validation = $request->validate([
              'firstName' => 'required',
              'email' => ['unique:users,email'],
              'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
        $request->flash();
        $user = new \App\User();
        $user->name = $request->input('firstName');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->type = 'student';
        $user->save();
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $data['jobApplications'] = \App\JobApplication::where('user_id', \Auth::user()->id)->get();
            $request->session()->flash('username', $user->name);
            $request->session()->flash('message', 'Studentregistratie succesvol!');
            $request->session()->flash('email', $user->email);
            //Retrieve data and put it in session
            $user_id = Auth::id();
            $user = \App\User::where('id', $user_id)->select('id', 'name', 'email', 'type', 'company_id')->first();
            //Put user data in session User
            $request->session()->put('user', $user);
            // dd($sessionData['name']);
            return view('/home', $data);
        }

        return view('students/login');
    }
}
