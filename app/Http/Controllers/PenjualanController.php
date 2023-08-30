<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
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
        $teamName = $request->teamName;
        $teamName = str_replace("+"," ",$teamName);
        $team = Team::where('name', $teamName)->first();
        $teamInv = Inventory::where('team_id',$team->id)->get();
        $buyTrans = [];
        $itemName = [];
        foreach($teamInv as $inv){
            $bt = BuyTransaction::where('inv_id',$inv->id)->where('status','arrived')->first();
            $item = Item::where('id',$inv->item_id)->first();
            if($bt != null && $item != null){
                array_push($buyTrans, $bt);
                array_push($itemName, $item);
            }
        }
        return response()->json(array(
            'buyTrans' => $buyTrans,
            'itemName' => $itemName,
        ), 200);
    }
}

?>