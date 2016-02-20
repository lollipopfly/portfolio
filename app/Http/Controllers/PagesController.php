<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Works; // for database
use Mail;

class PagesController extends Controller
{
    public function work($id) {
        $work = Works::findOrFail($id);
        $tags = explode(',', $work->tags); // make tags
        return view('pages.work', compact('work', 'tags'));
    }

    public function index() {
        $works = new Works;
        $recent = $works->take(6)->orderBy('sort', 'asc')->latest('id')->get();
    	return view('pages.home', compact('recent'));
    }

    public function about() {
    	return view('pages.about');
    }

    public function contact() {
    	return view('pages.contact');
    }

    public function sendEmail(Request $request) {
        // validation
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $message_arr = Array(
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        );

        Mail::send('emails.contact', ['mail' => $message_arr], function($message) {
            $mail_to = env('MAIL_USERNAME');
            $subject = 'Письмо из контактов моего Портфолио!';
            $message->to($mail_to, 'Contact Form')->subject($subject);
        });

        session()->flash('flash_message', 'Email is sent!');
        return redirect('contact/');
    }
}
