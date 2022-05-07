<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Welcome on TreckingSecu.re';
        return view('layouts.home', ['title' => $title]);
    }

    public function userTreckView() 
    {
        $title = 'Welcome on TreckingSecu.re';
        return view('pages.userTreck', ['title' => $title]);
    }

    public function watchTreckers()
    {
        $title = 'Trecking Tours engaged and in stand by';
        return view('pages.watchTrecker', ['title' => $title]);
    }
}
