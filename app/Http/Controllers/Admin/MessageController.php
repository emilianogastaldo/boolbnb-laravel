<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Flat;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $messages = Message::whereHas('flat', function ($query) use ($user) {
            $query->where('user_id', '=', $user->id)
                ->orderBy('created_at', 'desc');
        })->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function messagesFlat(Flat $flat)
    {
        $user = Auth::user();
        $messages = Message::whereHas('flat', function ($query) use ($user) {
            $query->whereUserId($user->id);
        })
            ->whereFlatId($flat->id)
            ->orderByDesc('created_at')
            ->get();

        return view('admin.messages.index', compact('messages'));
    }
}
