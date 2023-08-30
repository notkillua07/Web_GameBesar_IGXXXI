<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\BuyTransaction;
use App\Models\Expedition;
use App\Models\Inventory;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $teamInv = Inventory::where('team_id', $team->id)->where('amount', '>', '0')->get();
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
        if ($muat > $expedition->capacity) {
            $msg = "Muatan Tidak Cukup!";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }

    public function sendMuatan(Request $request)
    {
        $expId = $request->exp;
        $invId = $request->inv;
        $expedition = Expedition::where('id', $expId)->first();
        $mult = 1;
        $addTime = 0;
        $defect = 0;
        if ($expedition->dest_id == 1) {
            $mult = 8;
        } else if ($expedition->dest_id == 2) {
            $mult = 4.5;
        } else if ($expedition->dest_id == 3) {
            $mult = 1.5;
        }

        if ($expedition->ratingSpeed == 3) {
            $addTime = 30;
        } else if ($expedition->ratingSpeed == 2) {
            $addTime = 35;
        } else if ($expedition->ratingSpeed == 5) {
            $addTime = 20;
        } else if ($expedition->ratingSpeed == 4) {
            $addTime = 25;
        }

        if ($expedition->ratingSpeed == 3) {
            $defect = 0.96;
        } else if ($expedition->ratingSpeed == 2) {
            $defect = 0.95;
        } else if ($expedition->ratingSpeed == 5) {
            $defect = 0.98;
        } else if ($expedition->ratingSpeed == 4) {
            $defect = 0.97;
        }
        $inv = Inventory::where('id', $invId)->first();
        $team = Team::where('id', $inv->team_id)->first();
        $session = DB::table('sessions')->first();
        $buy = Buy::where('item_id', $inv->item_id)->where('supplier_id', $expedition->dest_id)->where('month', $session->month)->first();
        if ($inv->amount <= $expedition->capacity) {
            // var_dump($team->currency, $expedition->cost, $mult);
            if (($team->currency - ($expedition->cost) * $mult) > 0) {
                $amount = ($inv->amount) * $defect;
                $buyTrans = new BuyTransaction();
                $buyTrans->expedition_id = $expedition->id;
                $buyTrans->inv_id = $inv->id;
                $buyTrans->buy_id = $buy->id;
                $buyTrans->amount = $amount;
                $buyTrans->demand_fulfilled = $amount;
                date_default_timezone_set("Asia/Jakarta");
                $t = time();
                $sendTime = (date("Y-m-d H:i:s", $t));
                $arrTime = (date("Y-m-d H:i:s", $t + ($expedition->time_taken)+$addTime));
                $buyTrans->sent_at = $sendTime;
                $buyTrans->arrived_at = $arrTime;
                $buyTrans->status = 'arrived';
                $buyTrans->save();
                $inv->amount = 0;
                $inv->save();
                $team->currency = ($team->currency - ($expedition->cost) * $mult);
                $team->save();
                $msg = "Successfully sent will arrive at ".(date("H:i:s", $t + ($expedition->time_taken)+$addTime));
            } else {
                $msg = "You don't have enough currency to send";
            }
        } else {
            $msg = "Capacity isn't enough";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }
}
