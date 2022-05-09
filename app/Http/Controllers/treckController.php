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
        // dd($request);
        $request->validate([
            'inputPseudo' => 'required',
            'inputPseudoId' => 'required',
            'inputCircuitName' => 'required',
            'inputHardness' => 'required',
            'inputTime' => 'required',
            'inputLocation' => 'required',
            'inputDescription' => 'required',
            'inputCoords' => 'required',
            'inputProfile' => 'required',
            'inputType' => 'required',
            // 'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // dd($request);

        if (!$request->hasFile('img')){
            return redirect()->back()
                ->with('error', 'no img');
        } 
        // else {
        //    dd($request); 
        // }

        $path = $request->file('img')->store('public/images');
        
        $treck = new Trecks;
        $treck->treckName = $request->inputCircuitName;
        $treck->idUser = $request->inputPseudoId;
        $treck->pseudo = $request->inputPseudo;
        $treck->hardness = $request->inputHardness;
        $treck->time = $request->inputTime;
        $treck->location = $request->inputLocation;
        $treck->coords = $request->inputCoords;
        $treck->profil = $request->inputProfile;
        $treck->description = $request->inputDescription;
        $treck->distance = $request->inputDistance;
        $treck->type = $request->inputType;
        $treck->img = $path;
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
    public function detailTrek($id)
    {
        $treck = Trecks::query()
            ->where('id', '=', $id)
            ->get();

        $title = "Treck Réunion ".$treck[0]->location.' '.$treck[0]->treckName;
        
        return view('pages.detailTreck', ['trecks' => $treck, 'title' => $title]);
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
