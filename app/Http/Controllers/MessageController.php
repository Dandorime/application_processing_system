<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin', compact('messages'));
    }

    public function store(Request $req)
    {
        Message::create($req->all());
        return redirect(route('feedback'));
    }

    public function update($id, Request $req)
    {
        Feedback::send($id, $req);
        return redirect(route('admins'));
    }
}
