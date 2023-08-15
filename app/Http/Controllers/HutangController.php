<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HutangController extends Controller
{
    public function index()
    {
        $teams = Team::all();

        return view('penpos.hutang', compact('teams'));
    }

    public function hutangTim(Request $request)
    {
        $teamName = $request['team_name'];
        $team = Team::where('name', $teamName)->first();
        $hutang = $request['hutang'];
        $teamName = str_replace("+"," ",$teamName);
        $msg = "";
        if ($team->indebted == false) {
            $team->currency += $hutang;
            $team->debt = $hutang;
            $team->indebted = true;
            $team->save();
            $msg = 'Success';
        } else {
            $msg = "Gagal, team sudah pernah hutang sebelumnya";
        }
        return response()->json(array([
            'msg' => $msg,
        ]), 200);
    }
}
