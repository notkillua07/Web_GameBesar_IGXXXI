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
        $user = auth()->user();
        $tim = Team::where('name',$user->name)->first();
        $arrOfInv = Inventory::where('team_id',$tim->id)->get();
        $arrOfBT = [];
        foreach($arrOfInv as $inv){
            $bt = BuyTransaction::where('inv_id', $inv->id)->get();
            array_push($arrOfBT, $bt);
        }
        return view('peserta.dashboard', compact('tim', 'arrOfBT'));
    }
}
