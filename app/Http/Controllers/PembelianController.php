<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Item;
use App\Models\Sell;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function index()
    {
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
        return view('penpos.pembelian', compact('teams', 'items', 'cities'));
    }

    public function getCitySupply(Request $request)
    {
        $city = $request->city;
        $items = Item::where('city', $city)->get();
        return response()->json(array(
            'items' => $items
        ), 200);
    }

    public function getCurrency(Request $request)
    {
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $team = Team::where('name', $teamName)->first();
        return response()->json(array(
            'team' => $team,
        ), 200);
    }

    public function buySupply(Request $request)
    {
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $team = Team::where('name', $teamName)->first();
        $teamCurr = $team->currency;
        $itemId = $request->itemId;
        $item = Item::where('id',$itemId)->first();
        $amount = $request->amount;
        $cityName = $request->city;
        $city = Supplier::where('city', $cityName)->first();
        $sell = Sell::where('item_id', $item->id)->where('supplier_id', $city->id)->first();
        $price = $amount * ($sell->price);
        if ($sell->stocks > 0) {
            if ($teamCurr >= $price) {
                $sell->stocks -= $amount;
                $team->currency -= $price;
                $invSearch = Inventory::where('team_id',$team->id)->where('item_id',$item->id)->get();
                if(count($invSearch) < 1){
                    DB::table('inventories')->insert([
                        'team_id' => $team->id,
                        'item_id' => $item->id,
                        'amount' => $amount,
                    ]);
                    $invSearch = Inventory::where('team_id',$team->id)->where('item_id',$item->id)->first();
                    DB::table('sell_transactions')->insert([
                        'inv_id' => $invSearch->id,
                        'sell_id' => $sell->id,
                        'amount' => $amount,
                    ]);
                }else{
                    $invSearch[0]->amount += $amount;
                    $invSearch[0]->save();
                }
                $sell->save();
                $team->save();
                $msg = "Successfully bought!";
            }
            else{
                $msg = "Team's Currency not enough!";
            }
        }else{
            $msg = "The Supplier is out of stock!";
        }

        return response()->json(array(
            'msg' => $msg
        ), 200);
    }
}
