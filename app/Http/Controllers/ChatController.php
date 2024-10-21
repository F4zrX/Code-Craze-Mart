<?php

// app/Http/Controllers/ChatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->isAdmin()) {
            $messages = Message::all();
        } else {
            $messages = Message::where('user_id', $user->id)->orWhere('admin_id', $user->id)->get();
        }
        return view('chat.index', compact('messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate(['message' => 'required']);

        Message::create([
            'user_id' => Auth::id(),
            'admin_id' => null,
            'message' => $request->message,
            'is_admin' => false,
        ]);

        return redirect()->route('chat.index')->with('success', 'Message sent.');
    }

    public function adminIndex()
    {
        $users = User::has('chatMessages')->with('chatMessages')->get();
        return view('admin.chat.index', compact('users'));
    }

    public function __construct()
    {
        // Ensure the middleware is applied to the methods that need admin access
        $this->middleware('admin');
    }

    public function showChat($userId)
    {
        $user = User::findOrFail($userId);
        $adminId = Auth::id();

        $messages = Message::where('user_id', $userId)
            ->orWhere('admin_id', $adminId)
            ->get();

        return view('admin.chat.show', compact('user', 'messages'));
    }

    public function sendMessages(Request $request, $userId)
    {
        $request->validate(['message' => 'required']);
    
        // Periksa apakah pengguna terotentikasi dan memiliki peran admin
        if (!Auth::check() || Auth::user()->role->name != 'admin') {
            return redirect()->route('login')->with('error', 'You do not have permission to access this page.');
        }
    
        Message::create([
            'user_id' => $userId,
            'admin_id' => Auth::id(),
            'message' => $request->message,
            'is_admin' => true,
        ]);
    
        return redirect()->route('admin.chat.show', $userId)->with('success', 'Message sent.');
    }
}