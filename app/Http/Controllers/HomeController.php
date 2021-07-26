<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('guest.template');
    }
    public function template() {
        return view('guest.template');
    }
}
