<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::where('parent_id', null)->get();
        return view('pages.conversations.main', compact('conversations'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required',
            'message' => 'required',
        ]);

        $conversation = new Conversation;
        $conversation->topic = $request->topic;
        $conversation->message = $request->message;
        $conversation->user_id = auth()->user()->id;
        $conversation->save();

        return redirect()->route('conversations.index')->with('success', 'Conversation berhasil ditambahkan');
    }

    public function reply(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $reply = new Conversation;
        $reply->message = $request->message;
        $reply->user_id = auth()->user()->id;
        $reply->parent_id = $conversation->id;
        $reply->save();
        
        return redirect()->route('conversations.index')->with('success', 'Conversation berhasil ditambahkan');
    }

    public function show(Conversation $conversation)
    {
        //
    }

    public function edit(Conversation $conversation)
    {
        //
    }

    public function update(Request $request, Conversation $conversation)
    {
        $request->validate([
            'message' => 'required',
        ]);

        $conversation->message = $request->message;
        $conversation->update();

        return redirect()->route('conversations.index')->with('success', 'Conversation berhasil ditambahkan');
    }

    public function destroy(Conversation $conversation)
    {
        $conversation->delete();

        return redirect()->route('conversations.index')->with('success', 'Conversation berhasil dihapus');
    }
}
