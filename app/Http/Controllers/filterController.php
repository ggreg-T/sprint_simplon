<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trecks;

class filterController extends Controller
{
    public function filterSorte(Request $request)
    {
        // dd($request);
        $distanceMin = intval($request->inputDistMin);
        $distanceMax = intval($request->inputDistMax);
        $timeMin = intval($request->inputTimeMin);
        $timeMax = intval($request->inputTimeMax);
        $difficulty = $request->inputDifficulty;
        $error = "There are no treck aviable on your conditions, sorry";
        
        if ($distanceMin == null) { $distanceMin = 0; }
        if ($distanceMax == null) { $distanceMax = 100000; }
        if ($timeMin == null) { $timeMin = 0; }
        if ($timeMax == null) { $timeMax = 100000; }

        $infoFilters = ['distMin' => $distanceMin, 'distMax' => $distanceMax, 'timeMin' => $timeMin, 'timeMax' => $timeMax, 'difficulty' => $difficulty];
        // dd($infoFilters);

        $title = "";
        if ($difficulty == null) {
            //  dd($infoFilters);
            $trecks = Trecks::query()
            ->where('distance', '>=', $distanceMin)
            ->where('distance', '<=', $distanceMax)
            ->where('time', '>=', $timeMin)
            ->where('time', '<=', $timeMax)
            ->orderby('created_at', 'desc')
            ->get();
        } else {
            $trecks = Trecks::query()
            ->where('distance', '>=', $distanceMin)
            ->where('distance', '<=', $distanceMax)
            ->where('time', '>=', $timeMin)
            ->where('time', '<=', $timeMax)
            ->where('hardness', '=', $difficulty)
            ->orderby('created_at', 'desc')
            ->get();
        }
        
        
        if (count($trecks) >= 1) { $error = ""; }
        return view('pages.listTrecks', ['title' => $title, 'trecks' => $trecks, 'error' => $error]);
    }
}
