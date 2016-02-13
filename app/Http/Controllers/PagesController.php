<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Works; // for database

class PagesController extends Controller
{
    public function work($id) {
        $work = Works::findOrFail($id);
        return view('pages.work', compact('work'));
    }

    public function index() {
        $works = new Works;
        $recent = $works->take(6)->latest('id')->get();
//        dd($recent);
    	return view('pages.home', compact('recent'));
    }

    public function about() {
    	return view('pages.about');
    }

    public function contact() {
    	return view('pages.contact');
    }
}
