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
    public function getlistTrecks($location, $filter)
    {   
        // dd($location, $filter);
        // dd();
        
        $title = "Treck ".$location;

        if ($location == "Reunion" && $filter == "all" ) {
            $listTrecks = Trecks::query()
                ->where('private', '=', false)
                ->orderBy('created_at', 'ASC')
                ->get();
        } 
    
        // ####---used with filterMenu.blade.php---########################

        // elseif ($location == "Reunion" && $filter == "hardASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('private', '=', false)
        //         ->where('location', '=', $location)
        //         ->orderBy('hardness', 'ASC')
        //         ->get();
        // } elseif ($location == "Reunion" && $filter == "hardDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'DESC')
        //         ->get();
        // } elseif ($location == "Reunion" && $filter == "distASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('private', '=', false)
        //         ->where('location', '=', $location)
        //         ->orderBy('distance', 'ASC')
        //         ->get();
        // } elseif ($location == "Reunion" && $filter == "distDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'DESC')
        //         ->get();
        // }

        // elseif ($location == "north" && $filter == "all" ) {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('created_at', 'ASC')
        //         ->get();
        // } elseif ($location == "north" && $filter == "hardASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'ASC')
        //         ->get();
        // } elseif ($location == "north" && $filter == "hardDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'DESC')
        //         ->get();
        // } elseif ($location == "north" && $filter == "distASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'ASC')
        //         ->get();
        // } elseif ($location == "north" && $filter == "distDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'DESC')
        //         ->get();
        // }

        // elseif ($location == "south" && $filter == "all" ) {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('created_at', 'ASC')
        //         ->get();
        // } elseif ($location == "south" && $filter == "hardASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'ASC')
        //         ->get();
        // } elseif ($location == "south" && $filter == "hardDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'DESC')
        //         ->get();
        // } elseif ($location == "south" && $filter == "distASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'ASC')
        //         ->get();
        // } elseif ($location == "south" && $filter == "distDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'DESC')
        //         ->get();
        // }
        
        // elseif ($location == "west" && $filter == "all" ) {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('created_at', 'ASC')
        //         ->get();
        // }elseif ($location == "west" && $filter == "hardASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'ASC')
        //         ->get();
        // } elseif ($location == "west" && $filter == "hardDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'DESC')
        //         ->get();
        // } elseif ($location == "west" && $filter == "distASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'ASC')
        //         ->get();
        // } elseif ($location == "west" && $filter == "distDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'DESC')
        //         ->get();
        // }

        // elseif ($location == "east" && $filter == "all" ) {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('created_at', 'ASC')
        //         ->get();
        // } elseif ($location == "east" && $filter == "hardASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'ASC')
        //         ->get();
        // } elseif ($location == "east" && $filter == "hardDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('hardness', 'DESC')
        //         ->get();
        // } elseif ($location == "east" && $filter == "distASC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'ASC')
        //         ->get();
        // } elseif ($location == "east" && $filter == "distDESC") {
        //     $listTrecks = Trecks::query()
        //         ->where('location', '=', $location)
        //         ->where('private', '=', false)
        //         ->orderBy('distance', 'DESC')
        //         ->get();
        // }

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
            'inputPrivate' => 'required',
            'inputCircuitName' => 'required',
            'inputLocation' => 'required',
            'inputDescription' => 'required',
            'inputCoords' => 'required',
            'inputProfile' => 'required',
            'inputType' => 'required',
            // 'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if ($request->file('img') != null) {
           $path = $request->file('img')->store('public/images'); 
        } else {
            $path = "no image avaiable";
        }
        //  dd($request);
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
        $treck->private = $request->inputPrivate;
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
    public function detailTrek($idTreck)
    {

        $treck = Trecks::query()
            ->where('id', '=', $idTreck)
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
    public function edit($idTreck)
    {
        $treck = Trecks::query()
            ->where('id', '=', $idTreck)
            ->get();
        // dd($treck);
        $title = "Modify ".$treck[0]->treckName;
      
        return view('pages.modifyTreck', ['title' => $title, 'treck' => $treck]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treckUpdate(Request $request, $treckId)
    {
        if ($request->file('img') != null) {
            $path = $request->file('img')->store('public/images'); 
         } else {
             $path = "no image avaiable";
         }
    
        $treck = Trecks::find($treckId);
        $treck->treckName = $request->inputCircuitName;
        $treck->hardness = $request->inputHardness;
        $treck->location = $request->inputLocation;
        $treck->description = $request->inputDescription;
        $treck->img = $path;
        $treck->private = $request->inputPrivate;
        $treck->save();
        return redirect()->back()
            ->with('success', 'The treckinformations are up to date.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trecks $treck)
    {
        $treck->delete();

        $title = "Treck Réunion ";
        $trecks = Trecks::query()
                ->where('private', '=', false)
                ->orderBy('created_at', 'ASC')
                ->get();
        // dd($trecks);   
        $error = "";
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $trecks, 'error' => $error])
            ->with('success', 'Your treck has been deleted successfully');
    }

    public function searchTreck(Request $request)
    {
        $treckSearched = trim($request -> get('inputSearchTreck'));
        $title ='Results for '.$treckSearched;
        
        $trecks = Trecks::query()
                ->where('private', '=', 'false')
                ->where('treckName', 'like', "%{$treckSearched}%")
                ->orWhere('description', 'like', "%{$treckSearched}%")
                ->orderBy('created_at', 'ASC')
                ->get();

        if (count($trecks) == 0){
            $error = 'No treck found, sorry.';
            return view('pages.listTrecks', ['title' => $title, 'trecks' => $trecks, 'error' => $error]);
        }
        $error = '';
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $trecks, 'error' => $error]);
    }
}
