<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\MessageRepositories;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    protected $messageRepo;

    public function __construct(MessageRepositories $messageRepo)
    {
        $this->messageRepo = $messageRepo;
    }

    public function sendMessage(Request $request)
    {
        return $this->messageRepo->sendMessage($request);
    }

    public function getAllMessagesForUser($userId)
    {
        return $this->messageRepo->getAllMessagesForUser($userId);
    }
}
