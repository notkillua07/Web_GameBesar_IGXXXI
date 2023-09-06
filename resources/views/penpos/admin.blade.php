@extends('layouts.app')

<head>
    <title>IGXXXI - Admin Dashboard</title>
</head>

@section('content')
    {{-- Outer Card --}}
    <div class="card mt-3 mx-3">

        {{-- Outer Card Head --}}
        <div class="card-header text-center" style="background-color:#7DC1E3;">
            <h1 style="font-weight:bold;color:#ffffff;"><i class="bi bi-person-badge-fill"></i> Admin Area</h1>
        </div>

        {{-- Outer Card Body --}}
        <div class="card-body">

            {{-- Input Pilih Tim --}}
            <div class="form-outline mb-3">
                <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
                <select name="team" id="team" class="form-select select2 mb-3" onchange="changeTeam()">
                    <option value="-" selected disabled>- Pilih Team -</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->name }}" id="{{ $team->name }}">
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tabel --}}
            <div class="card m-auto mt-5 shadow-sm">
                <div class="card-header px-4" style="background-color:#7DC1E3;">
                    <div class="row p-auto pt-2">
                        <div class="col-sm">
                            <h1 class="text-left" style="color:#ffffff;"><i class="bi bi-coin"></i> Koin</h1>
                        </div>
                        <div class="col-sm pe-5">
                            <h1 class="text-end" id="koin" style="color:#ffffff;">
                                {{-- {{ $tim->currency }}  --}}
                            </h1>
                        </div>
                        <div class="col-sm ps-5">
                            <h1 class="text-left" style=";color:#ffffff;"><i class="bi bi-boxes"></i> Demand</h1>
                        </div>
                        <div class="col-sm">
                            <h1 class="text-end" id="demands" style="color:#ffffff;">
                                {{-- {{ $tim->fulfill_demands }} --}}
                            </h1>
                        </div>
                    </div>
                </div>
                <table class="table table-striped mt-1">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Kota Tujuan</th>
                            <th scope="col">Sisa Waktu</th>
                        </tr>
                    </thead>
                </table>
            
            </div>
        </div>
    </div>

     {{-- Control Area --}}
     <div class="card mt-3 mx-auto text-center" style="height: 20em; width:25em">
        <div class="card-header text-center" style="background-color:#7DC1E3;">
            <h1 style="font-weight:bold;color:#ffffff;"><i class="bi bi-joystick"></i></i> Control Area</h1>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-lg btn-primary btn-danger mb-4" style="width: 10em"><i class="bi bi-calendar"></i> GANTI BULAN</a><br>
            <a href="#" class="btn btn-lg btn-danger btn-primary mb-4" style="width: 10em"><i class="bi bi-graph-up-arrow"></i> INFLASI</a>
            <p class="text-danger"><i class="bi bi-radioactive"></i> Danger! Please Proceed with Caution. <i class="bi bi-radioactive"></i></p>
        </div>
    </div>
@endsection
