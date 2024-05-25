<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MessageInterfaces
{
    public function sendMessage(Request $request);
    public function getAllMessagesForUser($userId);
}
