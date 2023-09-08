<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;


class AdminMailController extends Controller
{
    public function index()
    {
        return view('dashboard.mails.index', [
            'title' => 'Mails',
            'mails' => Mail::all()->sortByDesc('created_at')
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email:dns',
            'phone' => 'required|min:10|max:13',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        Mail::create($validateData);

        return redirect('/')->with('success', 'Your message has been sent!');
    }

    public function destroy(Mail $mail)
    {
        $mail->delete();

        return redirect('/dashboard/mails')->with('success', 'Mail has been deleted!');
    }
}
