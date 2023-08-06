<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Feedback
{
    /**
     * @param $id
     * @param Request $request
     * @return void
     */
    public static function send($id, Request $request): void
    {
        $message = Message::find($id);
        $sendMessage = Message::updateOrCreate(
            ['id' => $message->id, 'status' => 'active'],
            ['comment' => $request['comment'], 'status' => 'resolved']
        );

        Mail::to($message->email)->send(new OrderShipped($sendMessage));
    }
}
