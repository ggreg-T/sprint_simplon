<?php

namespace App\Http\Controllers;

use App\Models\Trecks;
use App\Models\Treckers;
use Illuminate\Support\Facades\Auth;
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
        $title = 'Trecking Tours engaged and in stand by.  '.date("d-m-Y h:m");
        return view('pages.watchTrecker', ['title' => $title]);
    }

    public function planificationTreck(Request $request) 
    {
        $request->validate([
            'inputDate' => 'required',
            'inputTimeStart' => 'required',
            'inputTimeArrival' => 'required',
            'inputTimeTampon' => 'required',
            'inputTreckName' => 'required',
            'inputTreckTime' => 'required',
            'inputTreckId' => 'required',
            'inputProfil' => 'required',
        ]);

        $treckStart = $request->inputTimeStart;
        $treckEnd = $request->inputTimeArrival;
        $timeTampon = (int)$request->inputTimeTampon;
        $treckEndLimit = date('H:i', strtotime($treckEnd.' + '.$timeTampon.' minute'));

        $controlDoubleTrecks = Treckers::query()
            ->where('idUser', '=', Auth::user()->id)
            ->where('dateTreck', '=', $request->inputDate)
            ->where('treckEndLimit', '>', $treckStart)
            ->get();
        $nbTrecksActiv = count($controlDoubleTrecks);
        if ($nbTrecksActiv == 1) {
            return redirect()->back()
                ->with('error', 'You have already a trip at this time');
        } 

        $trecker = new Treckers;
        $trecker->treckName = $request->inputTreckName;
        $trecker->treckId = $request->inputTreckId;
        $trecker->idUser = Auth::user()->id;
        $trecker->pseudo = Auth::user()->pseudo;
        $trecker->timeTampon = $timeTampon;
        $trecker->dateTreck = $request->inputDate;
        $trecker->timeTreck = $request->inputTreckTime;
        $trecker->treckStart = $treckStart;
        $trecker->treckEnd = $treckEnd;
        $trecker->treckEndLimit = $treckEndLimit;
        $trecker->profil = $request->inputProfil;
        $trecker->save();

        return redirect()->back()
        ->with('success', 'Your trip is reserved and checkable in your personnel pages');
    }
}
