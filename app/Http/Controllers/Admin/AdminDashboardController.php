<?php
namespace App\Http\Controllers\Admin;


use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }

    public function showMessages()
    {
        $messages = Message::get();
        return view('Admin.pages.message.index', compact('messages'));
    }

    public function destroyMessage(Message $message)
    {
        $message->delete();

        return redirect()->back()->with('success', 'Message Deleted Successfully');
    }

}
