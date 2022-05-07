<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trecks;

class treckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getlistTrecks($location)
    { 
        $title = "Treck Réunion ".$location;

        if ($location == "all") {
            $listTrecks = Trecks::orderBy('created_at', 'ASC')->paginate(100);
        } else {
            $listTrecks = Trecks::query()
            ->where('location', '=', $location)
            // ->orderBy('created_at', 'ASC')->paginate(100)
            ->get();
        }

        $nbTreck = count($listTrecks);
        if ($nbTreck == 0) {
            $error = "There are no trecks for the Réunion $location yet.";
            return view('pages.listTrecks', ['title' => $title, 'trecks' => $listTrecks, 'error' => $error]);
        }
        $error = "";
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $listTrecks, 'error' => $error]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTrecks()
    {
        $title = 'Add new Trecking Tour';
        return view('pages.addTreck', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputPseudo' => 'required',
            'inputPseudoId' => 'required',
            'inputCircuitName' => 'required',
            'inputHardness' => 'required',
            'inputTime' => 'required',
            'inputLocation' => 'required',
            'inputDescription' => 'required',
            'inputCoords' => 'required',
            'inputProfile' => 'required'
        ]);

        $treck = new Trecks;
        $treck->treckName = $request->inputCircuitName;
        $treck->idUser = $request->inputPseudoId;
        $treck->pseudo = $request->inputPseudo;
        $treck->hardness = $request->inputHardness;
        $treck->time = $request->inputTime;
        $treck->location = $request->inputLocation;
        $treck->coords = $request->inputCoords;
        $treck->profil = $request->inputProfile;
        $treck->save();

        return redirect()->back()
                ->with('success', 'Your new Track added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
