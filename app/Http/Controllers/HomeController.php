<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $response = Http::get('https://api.kanye.rest/');
        $quotes = $response->json(); 
        return view('home',compact('quotes'));
    }
    public function adminHome()
    {
        return view('adminHome');
    }
    public function fetch()
     { 
        $response = Http::get('https://api.kanye.rest/');
        $quotes = $response->json(); 
        return $quotes;
    }
}
