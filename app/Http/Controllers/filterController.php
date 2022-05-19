<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class filterController extends Controller
{
    public function filterSorte(Request $request)
    {
        // dd($request);
        $filter = $request->filter;
        $sorte = $request->sorte;
        
        if ($filter == "⭐" ||
            $filter == "⭐⭐" ||
            $filter == "⭐⭐⭐" ||
            $filter == "⭐⭐⭐⭐" ||
            $filter == "⭐⭐⭐⭐⭐"){
            $filterTitle = "Difficulty until ".$filter;
        } elseif ($request->filter <= 50){
            $filterTitle = 'Distance until '.$filter.' km';
        } elseif ($request->filter == 51) {
            $filterTitle = 'Distance over 50 km';
        } elseif ($request->filter >= 60 && $request->filter <= 360) {
            $filterTitle = 'Time until '.$filter.' min';
        } elseif ($request->filter >360) {
            $filterTitle = 'Time over 360 min';
        }
        if ($sorte == "asc"){
            $sorteTitle = "👆";
        } else {
            $sorteTitle = "👇";
        }

        $title = $filterTitle." ".$sorteTitle;

        $trecks = [];
        
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $trecks])
            ->with('error', 'there is nothing for now');
    }
}
