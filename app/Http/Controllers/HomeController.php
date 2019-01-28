<?php

namespace pdam\Http\Controllers;

use Illuminate\Http\Request;

use pdam\Models\Keyword;
use pdam\Models\Medicine;
use pdam\Models\Info;
use pdam\Models\Tips;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
