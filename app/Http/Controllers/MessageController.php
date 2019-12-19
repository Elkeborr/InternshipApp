<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        /*USER*/
        $user = \Auth::user()->id;
        $query = \App\Message::join('companies', 'companies.id', '=', 'messages.company_id')
        ->where('messages.user_id', $user)
        ->get();

        $data['messagesCompany'] = $query->unique('company_id');

        /*COMPANY*/
        $user = \Auth::user()->company_id;
        $query2 = \App\Message::join('users', 'users.id', '=', 'messages.user_id')
          ->where('messages.company_id', $user)
          ->get();
        dd($query2);
        $data['messagesUser'] = $query2->unique('user_id');

        return view('chats/index', $data);
    }

    public function show($chat_id)
    {
        /*USER*/
        $user = \Auth::user()->id;

        $data['messagesCompany'] = \App\Message::where('messages.chat_id', $chat_id)
        ->where('messages.user_id', $user)
        ->join('users', 'users.id', '=', 'messages.user_id')
        ->join('companies', 'companies.id', '=', 'messages.company_id')
        ->orderBy('messages.created_at')
        ->get();

        /*COMPANY*/
        $company = \Auth::user()->company_id;
        $data['messagesUser'] = \App\Message::where('messages.chat_id', $chat_id)
        ->where('messages.company_id', $company)
        ->join('users', 'users.id', '=', 'messages.user_id')
        ->join('companies', 'companies.id', '=', 'messages.company_id')
        ->orderBy('messages.created_at')
        ->get();

        return view('/chats/show', $data);
    }

    public function sendMessage(Request $request)
    {
        if ($request['userSave']) {
            $user = \Auth::user()->id;
            $chat_id = $request->route('chat_id');
            $company = \App\Message::where('messages.chat_id', $chat_id)->first();

            $message = new \App\Message();
            $message->user_id = $user;
            $message->company_id = $company->company_id;
            $message->message = $request->input('message');
            $message->chat_id = $chat_id;

            $message->sender = 'user';
            $message->save();

            return redirect()->back();
        }
        if ($request['companySave']) {
            $company = \Auth::user()->company_id;
            $chat_id = $request->route('chat_id');
            $user = \App\Message::where('messages.chat_id', $chat_id)->first();

            $message = new \App\Message();
            $message->user_id = $user->user_id;
            $message->company_id = $company;
            $message->message = $request->input('message');
            $message->chat_id = $chat_id;

            $message->sender = 'company';
            $message->save();

            return redirect()->back();
        }
    }

    public function newMessageToCompany($company)
    {
        $data['company'] = \App\Company::where('id', $company)->first();

        return view('chats/newMessage', $data);
    }

    public function handleNewMessageToCompany(Request $request)
    {
        if ($request['userSave']) {
            $user = \Auth::user()->id;
            $chat_id = \App\Message::orderBy('created_at', 'DESC')->first();

            if ($chat_id->chat_id) {
                $newChatId = $chat_id->chat_id + 1;
                $message = new \App\Message();
                $message->user_id = $user;
                $message->company_id = $request->route('company');
                $message->message = $request->input('message');
                $message->chat_id = $newChatId;

                $message->sender = 'user';
                $message->save();
            } else {
                $newChatId = 1;
                $message = new \App\Message();
                $message->user_id = $user;
                $message->company_id = $request->route('company');
                $message->message = $request->input('message');
                $message->chat_id = $newChatId;

                $message->sender = 'user';
                $message->save();
            }

            return redirect('/chats');
        }
        if ($request['companySave']) {
            $company = \Auth::user()->company_id;
            $chat_id = $request->route('chat_id');
            $user = \App\Message::where('messages.chat_id', $chat_id)->first();

            $message = new \App\Message();
            $message->user_id = $user->user_id;
            $message->company_id = $company;
            $message->message = $request->input('message');
            $message->chat_id = $chat_id;

            $message->sender = 'company';
            $message->save();

            return redirect('/chats');
        }

        return view('chats/newMessage');
    }
}
