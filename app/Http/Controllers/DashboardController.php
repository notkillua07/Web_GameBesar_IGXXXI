<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
use App\Models\Inventory;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $user = auth()->user();
        $tim = Team::where('name', $user->name)->first();
        $arrOfInv = Inventory::where('team_id', $tim->id)->get();
        $arrOfBT = [];
        foreach ($arrOfInv as $inv) {
            $bts = BuyTransaction::where('inv_id', $inv->id)->get();
            foreach ($bts as $bt) {
                $seconds = $t - strtotime($bt->arrived_at);
                if ($seconds >= 0) {
                    if ($bt->status == "sending") {
                        $bt->status = "arrived";
                        $bt->save();
                    }
                }
                array_push($arrOfBT, $bt);
            }
        }
        return view('peserta.dashboard', compact('tim', 'arrOfBT'));
    }
}
