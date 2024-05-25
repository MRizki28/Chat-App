<?php

namespace App\Repositories;

use App\Events\MessageEvent;
use App\Interfaces\MessageInterfaces;
use App\Models\MessageModel;
use App\Traits\HttpResponseTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageRepositories implements MessageInterfaces
{
    protected $messageModel;
    use HttpResponseTraits;

    public function __construct(MessageModel $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    public function sendMessage(Request $request)
    {
        $id_send = Auth::user()->id;
        $message = new $this->messageModel;
        $message->id_sender = $id_send;
        $message->id_receiver = $request->input('id_receiver');
        $message->message = $request->input('message');
        MessageEvent::dispatch($message);
        $message->save();

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    }
}
