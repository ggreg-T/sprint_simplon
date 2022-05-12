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
        
        return view('pages.acceuil', ['title' => $title]);
        
    }

    public function watchTreckers()
    {
        $titleMain = 'Trecking Tours engaged and in stand by.';
        $titleTime = 'Updated : '.date("d/m/Y H:i");

        $treckers = Treckers::query()
            ->where('endConfirmed', '=', false)
            ->orderBy('dateTreck', 'asc')
            ->get();
        // dd($treckers);
        return view('pages.watchTrecker', ['treckers' => $treckers,
                            'titleMain' => $titleMain,
                            'titleTime' => $titleTime]);
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
            'inputPrivate' => 'required'
        ]);

        $treckStart = $request->inputTimeStart;
        $treckEnd = $request->inputTimeArrival;
        $timeTampon = (int)$request->inputTimeTampon;
        $treckEndLimit = date('H:i', strtotime($treckEnd.' + '.$timeTampon.' minute'));

        $controlDoubleTrecks = Treckers::query()
            ->where('idUser', '=', Auth::user()->id)
            ->where('dateTreck', '=', $request->inputDate)
            ->where('treckEndLimit', '>', $treckStart)
            ->where('endConfirmed', '=', false)
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
        $trecker->private = $request->inputPrivate;
        $trecker->save();

        return redirect()->back()
        ->with('success', 'Your trip is reserved and checkable in your Dashbord');
    }
    
    public function userPosi($id)
    {
        $treck = Trecks::query()
            ->where('id', '=', $id)
            ->get();

        $title = "Position of ".$treck[0]->location.' '.$treck[0]->treckName;
        
        return view('users.userPosi', ['trecks' => $treck, 'title' => $title]);
    }
}
