<?php

namespace App\Http\Controllers;

use App\Models\BuyTransaction;
use App\Models\Inventory;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams = Team::all();
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $bts = BuyTransaction::where('status', 'sending')->get();
        $msg = "Failed";
        foreach ($bts as $bt) {
            $seconds = $t - strtotime($bt->arrived_at);
            if ($seconds >= 0) {
                $bt->status = "arrived";
                $bt->save();
            }
            $msg = "Success";
        }
        return view('penpos.admin', compact('teams'));
    }

    public function getTeam(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $teamName = $request->teamName;
        $teamName = str_replace("+", " ", $teamName);
        $tim = Team::where('name', $teamName)->first();
        $arrOfInv = Inventory::where('team_id', $tim->id)->get();
        $arrOfBT = array();
        foreach ($arrOfInv as $inv) {
            $bts = BuyTransaction::where('inv_id', $inv->id)->get();
            if($bts != null){
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
        }
        return response()->json(array(
            'arrOfBT' => $arrOfBT,
            'team' => $tim,
        ), 200);
    }

    public function refreshBuyTransaction()
    {
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $bts = BuyTransaction::where('status', 'sending')->get();
        $msg = "Failed";
        foreach ($bts as $bt) {
            $seconds = $t - strtotime($bt->arrived_at);
            if ($seconds >= 0) {
                $bt->status = "arrived";
                $bt->save();
            }
            $msg = "Success";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }

    public function inflation()
    {
        $teams = Team::all();
        $msg = "Inflation Failed";
        foreach ($teams as $team) {
            $team->currency = $team->currency * 0.6;
            $team->save();
            $msg = "Inflation success";
        }
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }

    public function changeMonth()
    {
        $session = DB::table('sessions')->first();
        $session->month += 1;
        DB::table('sessions')
            ->where('id', $session->id)
            ->update(['month' => $session->month]);
        $msg = "Sekarang bulan ke-$session->month";
        return response()->json(array(
            'msg' => $msg,
        ), 200);
    }
}
