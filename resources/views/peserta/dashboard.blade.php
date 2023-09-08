@extends('layouts.app')
<?php
date_default_timezone_set('Asia/Jakarta');
$t = time();
?>

<head>
    <title>IGXXXI - Dashboard</title>
</head>
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                {{-- Card --}}
                <div class="card shadow">

                    {{-- Card Header --}}
                    <div class="card-header text-center"
                        style="background-color:#7DC1E3;font-size:1.01em">
                        <ul class="nav nav-tabs card-header-tabs">
                             
                            {{-- Hutang --}}
                            <li class="nav-item">
                                <p class="nav-link active text-danger" aria-current="true">
                                    <i class="bi bi-calculator"></i> Hutang <span>{{$tim->debt}}</span>
                                </p>
                            </li>
                            {{-- Total Dana --}}
                            <li class="nav-item">
                                <p class="nav-link active text-success" aria-current="true" style="color: green">
                                    <i class="bi bi-piggy-bank-fill"></i> Total Dana <span> {{ $tim->currency }}</span>
                                </p>
                            </li>
                            {{-- Demand --}}
                            <li class="nav-item">
                                <p class="nav-link active text-info" aria-current="true" style="color: orange">
                                    <i class="bi bi-bar-chart-fill"></i> Demand <span> {{ $tim->fulfill_demands }}</span>
                                </p>
                            </li>

                        </ul>
                    </div>

                    {{-- Tabel --}}
                    <div class="card-body">
                        <table class="table table-striped mt-5">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col"><i class="bi bi-truck"></i> Nama Layanan</th>
                                    <th scope="col"><i class="bi bi-buildings"></i> Kota Tujuan</th>
                                    <th scope="col"><i class="bi bi-hourglass-split"></i> Sisa Waktu</th>
                                </tr>
                            </thead>

                            {{-- Tabel Body --}}
                            <tbody>
                                {{-- <p>{{count($arrOfBT)}}</p> --}}
                                @if (count($arrOfBT) != 0)
                                    @for ($i = 0; $i < count($arrOfBT); $i++)
                                        <tr>
                                            <td class="align-middle"><b>{{ $i + 1 }}</b></td>
                                            @if ($arrOfBT[$i]->expedition_id == '1')
                                                <td class="align-middle">Cargo</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '2')
                                                <td class="align-middle">Cargo</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '3')
                                                <td class="align-middle">Cargo</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '4')
                                                <td class="align-middle">Si Fast - Darat</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '5')
                                                <td class="align-middle">Si Fast - Darat</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '6')
                                                <td class="align-middle">Si Fast - Darat</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '7')
                                                <td class="align-middle">Si Fast - Laut</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '8')
                                                <td class="align-middle">Si Fast - Laut</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '9')
                                                <td class="align-middle">Si Fast - Laut</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '10')
                                                <td class="align-middle">Jalur Kurir - Darat</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '11')
                                                <td class="align-middle">Jalur Kurir - Darat</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '12')
                                                <td class="align-middle">Jalur Kurir - Darat</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '13')
                                                <td class="align-middle">Jalur Kurir - Laut</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '14')
                                                <td class="align-middle">Jalur Kurir - Laut</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '15')
                                                <td class="align-middle">Jalur Kurir - Laut</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '16')
                                                <td class="align-middle">JNA - Darat</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '17')
                                                <td class="align-middle">JNA - Darat</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '18')
                                                <td class="align-middle">JNA - Darat</td>
                                                <td class="align-middle">Bandung</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '19')
                                                <td class="align-middle">JNA - Laut</td>
                                                <td class="align-middle">Surabaya</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '20')
                                                <td class="align-middle">JNA - Laut</td>
                                                <td class="align-middle">Semarang</td>
                                            @elseif ($arrOfBT[$i]->expedition_id == '21')
                                                <td class="align-middle">JNA - Laut</td>
                                                <td class="align-middle">Bandung</td>
                                            @endif
                                            <td class="align-middle">
                                                @php
                                                    $valid = true;
                                                    if ($arrOfBT[$i]->status == 'arrived') {
                                                        $minutes = 'Sudah ';
                                                        $seconds = 'Sampai';
                                                        $valid = false;
                                                    } elseif ($arrOfBT[$i]->status == 'sold') {
                                                        $minutes = 'Sudah ';
                                                        $seconds = 'Dijual';
                                                        $valid = false;
                                                    } else {
                                                        $seconds = strtotime($arrOfBT[$i]->arrived_at) - $t;
                                                        $minutes = floor($seconds / 60);
                                                        $seconds = $seconds % 60;
                                                        if($minutes <10){
                                                            $minutes = "0$minutes";
                                                        }
                                                        if($seconds<10){
                                                            $seconds = "0$seconds";
                                                        }
                                                    }
                                                    if ($valid) {
                                                        echo "$minutes:$seconds";
                                                    } else {
                                                        echo $minutes . '' . $seconds;
                                                    }
                                                @endphp
                                            </td>
                                        </tr>
                                    @endfor
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
