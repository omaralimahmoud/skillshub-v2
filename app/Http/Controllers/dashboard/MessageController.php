<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ContactResponseMail;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::latest()->paginate(10);

        return view('dashboard.pages.showMessages.index', [
            'messages' => $messages,
        ]);

    }

    public function show(Message $message): View
    {
        //  dd($message);

        return view('dashboard.pages.showMessages.show', [
            'message' => $message,
        ]);
    }

    public function response(Message $message, Request $request): RedirectResponse
    {
        $request->validate([
            'Title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        $receiverName = $message->name;
        $receiverMail = $message->email;
        Mail::to($receiverMail)->send(new ContactResponseMail($receiverName, $request->Title, $request->body));

        return redirect(route('dashboard.messages.index'));

    }
}
