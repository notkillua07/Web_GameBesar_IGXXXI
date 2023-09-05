@extends('layouts.app')

<head>
    <title>IGXXXI - Admin Control</title>
</head>

@section('content')
    {{-- Control Area --}}
    <div class="card mt-3 mx-auto text-center" style="height: 20em; width:25em">
        <div class="card-header text-center" style="background-color:#7DC1E3;">
            <h1 style="font-weight:bold;color:#ffffff;"><i class="bi bi-joystick"></i></i> Control Area</h1>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-lg btn-primary btn-danger mb-4"><i class="bi bi-calendar"></i> GANTI BULAN</a><br>
            <a href="#" class="btn btn-lg btn-danger btn-primary mb-4"><i class="bi bi-graph-up-arrow"></i> INFLASI</a>
            <p class="text-danger"><i class="bi bi-radioactive"></i> Danger! Please Proceed with Caution. <i class="bi bi-radioactive"></i></p>
            <a href="{{ __('/admin') }}" class="btn btn-info" role="button"><i class="bi bi-signpost-fill"></i> Control Admin</a>
        </div>

    </div>
    @endsection