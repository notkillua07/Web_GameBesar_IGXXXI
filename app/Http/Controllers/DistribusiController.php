<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    public function index() {
        return view('penpos.distribusi');
    }
}

?>