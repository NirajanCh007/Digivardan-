<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller
{
    public function index(User $receiver)
    {
        $authUser = auth()->user();
        $contacts = User::where('id', '!=', $authUser->id)
            ->where('role', $authUser->isDoctor() ? 'patient' : 'doctor')
            ->get();
        return view('patient.chat', compact('receiver', 'contacts'));
    }
    public function fetch(User $receiver)
    {
        $userId = auth()->id();
        $messages = Message::where(function ($q) use ($userId, $receiver) {
                $q->where('sender_id', $userId)->where('receiver_id', $receiver->id);
            })->orWhere(function ($q) use ($userId, $receiver) {
                $q->where('sender_id', $receiver->id)->where('receiver_id', $userId);
            })->with(['sender', 'receiver'])
            ->orderBy('created_at')
            ->get();

        return $messages;
    }

    public function send(Request $request, User $receiver)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
            'message' => $request->message,
        ]);

        broadcast(new MessageEvent($message->load(['sender', 'receiver'])))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
