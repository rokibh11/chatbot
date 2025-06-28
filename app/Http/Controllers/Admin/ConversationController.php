<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conversation;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::latest()->paginate(30);
        return view('admin.conversations', compact('conversations'));
    }

    public function show($id)
    {
        $conv = Conversation::findOrFail($id);
        return view('admin.conversation_show', compact('conv'));
    }
}
