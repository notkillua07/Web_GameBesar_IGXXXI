@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
@section('content')
    <div class="card m-auto mt-5 shadow-sm" style="height:35em;width:50em;">
        <div class="container">
        <div class="row p-auto pt-2" style="background-color:#7DC1E3;"> 
            <div class="col-sm">
                <h1 class="text-left" style="font-weight:bold;color:#ffffff;"> Koin</h1>
            </div>
            <div class="col-sm pe-5"><h1 class="text-end" style="font-weight:bold;color:#ffffff;"> 1 </h1></div>
            <div class="col-sm ps-5">
                <h1 class="text-right" style="font-weight:bold;color:#ffffff;"> Demand</h1>
            </div>
            <div class="col-sm"><h1 class="text-end" style="font-weight:bold;color:#ffffff;"> 1 </h1></div>
        </div>
        </div>
        <table class="table table-striped mt-5">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Layanan</th>
                <th scope="col">Kota Tujuan</th>
                <th scope="col">Sisa Waktu</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
</html>