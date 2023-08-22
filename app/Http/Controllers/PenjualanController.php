<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index() {
        $teams = Team::all();
        $items = Item::all();
        $arrBuah = [];
        $arrSayur = [];
        $arrBiji = [];
        foreach ($items as $item) {
            if ($item->type == "Buah") {
                array_push($arrBuah, $item);
            } else if ($item->type == "Sayur") {
                array_push($arrSayur, $item);
            } else {
                array_push($arrBiji, $item);
            }
        }
        $items = ["Buah" => $arrBuah, "Sayur" => $arrSayur, "Biji-bijian" => $arrBiji];
        $cities = Supplier::all();
        return view('penpos.penjualan', compact('teams', 'items', 'cities'));
    }

    public function getInvSupply(Request $request)
    {
        $city = $request->city;
        $teamName = $request->teamName;
        $team = Team::where('name', $teamName)->first();
        $teamInv = Inventory::where('team_id',$team)->get();
        $items = Item::where('city',$city)->get();
        $invAmount = [];
        $invName = [];
        foreach($teamInv as $item){
            foreach($items as $it){
                if($item->item_id == $it->id){
                    array_push($invAmount, $item);
                    array_push($invName, $it);
                }
            }
        }
        return response()->json(array(
            'amounts' => $invAmount,
            'names' => $invName,
        ), 200);
    }
}

?>