<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin', compact('messages'));

    }

    public function store(Request $req)
    {
        $message = new Message();

        $message->name = $req->input('name');
        $message->email = $req->input('email');
        $message->message = $req->input('message');

        $message->save();

        return redirect(route('feedback'));
    }

    public function update( $id, Request $req)
    {
        $message = Message::find($id);

        $message->comment=$req->input('comment');
        $message->status='resolved';

        $message->save();

        $this->responseMessage($message);
        return redirect(route('admins'));
    }

    private function responseMessage($message) {
        Mail::to($message->email)->send(new OrderShipped($message));
    }

}
