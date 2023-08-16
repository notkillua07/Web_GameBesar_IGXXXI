<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Supplier;
use App\Models\Team;
use Illuminate\Http\Request;

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
}
