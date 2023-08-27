<?php

namespace App\Http\Controllers;

use App\Models\Expedition;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $cities = Supplier::all();
        return view('penpos.distribusi', compact('teams', 'cities'));
    }

    public function getInvSupply(Request $request)
    {
        $city = Supplier::where('id', $request->city)->first();
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $team = Team::where('name', $teamName)->first();
        $teamInv = Inventory::where('team_id', $team->id)->get();
        $items = Item::where('city', $city->city)->get();
        $msg = 'Cek Inventory!';
        $invAmount = [];
        $invName = [];
        if ($city != null) {
            foreach ($teamInv as $item) {
                foreach ($items as $it) {
                    if ($item->item_id == $it->id) {
                        array_push($invAmount, $item);
                        array_push($invName, $it);
                    }
                }
            }
        } else {
            $msg = 'Silahkan pilih kota terlebih dahulu';
        }
        return response()->json(array(
            'amounts' => $invAmount,
            'names' => $invName,
            'msg' => $msg,
        ), 200);
    }

    public function getTransport(Request $request)
    {
        $jalur = $request->jalur;
        $dest = $request->city;
        $expeditions = Expedition::where('route', $jalur)->where('dest_id', $dest)->get();
        return response()->json(array(
            'expeditions' => $expeditions,
        ), 200);
    }

    public function cekMuatan(Request $request)
    {
        $expId = $request->exp;
        $muat = $request->muatan;
        $expedition = Expedition::where('id', $expId)->first();
        $msg = "Muatan Cukup!";
        if($muat > $expedition->capacity){
            $msg = "Muatan Tidak Cukup!";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }
}
