<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\BuyTransaction;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
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
        return view('penpos.penjualan', compact('teams', 'items', 'cities'));
    }

    public function getInvSupply(Request $request)
    {
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $team = Team::where('name', $teamName)->first();
        $teamInv = Inventory::where('team_id', $team->id)->get();
        $buyTrans = [];
        $itemName = [];
        foreach ($teamInv as $inv) {
            $bt = BuyTransaction::where('inv_id', $inv->id)->where('status', 'arrived')->first();
            $item = Item::where('id', $inv->item_id)->first();
            if ($bt != null && $item != null) {
                array_push($buyTrans, $bt);
                array_push($itemName, $item);
            }
        }
        return response()->json(array(
            'buyTrans' => $buyTrans,
            'itemName' => $itemName,
        ), 200);
    }

    public function sellInventory(Request $request)
    {
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $team = Team::where('name', $teamName)->first();
        $session = DB::table('sessions')->first();
        $bt = BuyTransaction::where('id', $request->btId)->first();
        $buy = Buy::where('id', $bt->buy_id)->where('month', $session->month)->first();
        $msg = "";
        if (($buy->demands - $bt->amount) > 0) {
            date_default_timezone_set("Asia/Jakarta");
            $t = time();
            if (strtotime($bt->arrived_at) < $t) {
                $profit = ($bt->amount * 100) * $buy->price;
                $bt->demand_fulfilled = ($bt->amount) * 100;
                $team->currency += $profit;
                $team->fulfill_demands += ($bt->amount) * 100;
                $buy->demands -= ($bt->amount) * 100;
                $bt->status = "sold";
                $buy->save();
                $bt->save();
                $team->save();
                $msg = "Barang berhasil dijual! \nMendapatkan koin: $profit! \nTotal koin $team->name: $team->currency";
            } else {
                $msg = "Barang belum sampai!";
            }
        } else {
            $msg = "Maaf demands sudah habis";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }
}
