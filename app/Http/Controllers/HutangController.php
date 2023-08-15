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
        // Pengecekan textbox
        $validator = Validator::make($request->all(), [
            'team_name' => 'required',
            'hutang' => 'required'
        ]);
        // Klu gagal
        if ($validator->fails()) {
            $request->session()->flash('valid', 'false');
            return view('penpos.hutang');
        }
        //Klu berhasil
        else {
            $request->session()->flash('valid', 'true');
            $teamName = request()->get('team_name');
            $team = Team::where('name', $teamName)->first();
            $hutang = $request->get('hutang');

            if ($team->indebted == false) {
                $team->currency += $hutang;
                $team->debt = $hutang;
                $team->indebted = true;
                $team->save();
                $msg = 'Success';
            } else {
                $msg = "Failed, team sudah pernah hutang sebelumnya";
            }
        }

        return response()->json(array([
            'msg' => $msg,
        ]), 200);
    }
}
