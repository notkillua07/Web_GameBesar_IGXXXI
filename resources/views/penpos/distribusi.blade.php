@extends('layouts.app')
<html>

<head>
    <title>IGXXXI - Penpos Distribusi</title>
    @section('styles')
        <style>

        </style>
    @endsection
</head>

@section('content')
    <div class="card m-auto mt-5 shadow-sm" style="height:50em;width:40em;">
        <h1 class="card-header text-center" style="font-weight:bold;background-color:#E1AC61;color:#58431F;"><i
                class="bi bi-truck"></i> Pos Distribusi</h1>
        <div class="card-body">
            <div class="team-select-section">
                <form class="row g-3">
                    <div class="col-md-6">
                        {{-- Pilih Tim --}}
                        <label class="form-label" for="team">Pilih Tim</label><br>
                        <select name="team" id="team" class="select2 mb-3" onchange="loadGanti()" required>
                            <option value="-" selected disabled>- Pilih Team -</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}" id="{{ $i }}">
                                    {{ 'Tim ' . $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                         {{-- Pilih Barang --}}
                            <label class="form-label" for="team">Pilih Barang</label><br>
                            <select name="barang" id="barang" class="select2  mb-3" onchange="loadGanti()" required>
                                <option value="-" selected disabled>- Pilih Barang -</option>
                                @for ($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}" id="{{ $i }}">
                                        {{ 'Barang ' . $i }}
                                    </option>
                                @endfor
                            </select>
                    </div>
                    <div class="col-md-6">
                         {{-- Pilih Jalur --}}
                            <label class="form-label" for="team">Pilih Jalur </label><br>
                            <select name="jalur" id="jalur" class="select2  mb-3" onchange="loadGanti()" required>
                                <option value="-" selected disabled>- Pilih Jalur -</option>
                                <option value="jalur" id="darat">
                                    Jalur Darat
                                </option>
                                <option value="jalur" id="laut">
                                    Jalur Laut
                                </option>
                            </select>
                    </div>
                    <div class="col-md-4">
                         {{-- Pilih Jenis Transportasi --}}
                            <label class="form-label" for="team">Jenis Transportasi</label><br>
                            <select name="jenisTransport" id="jenisTransport" class="select2  mb-3" onchange="loadGanti()" required>
                                <option value="-" selected disabled>- Pilih Jenis Transportasi -</option>
                                @for ($i = 1; $i <= 7; $i++)
                                    <option value="{{ $i }}" id="{{ $i }}">
                                        {{ 'Transportasi ' . $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                         {{-- Input Muatan --}}
                        <div class="form-outline mb-3">
                            <label class="form-label" for="typeNumber">Input Muatan</label>
                            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="999999">
                        </div>
                    </div>
                    <div class="col-12">
                         {{-- Button Pengecekan Muatan --}}
                        <button type="button" class="btn btn-primary" id="btnCekMuatan">Cek Muatan</button>

                        <script>
                            
                        </script>
                    </div>
                    <div class="col-12">
                     {{-- Pilih Kota Tujuan --}}
                        <div class="form-outline mb-3 mt-3">
                            <label class="form-label" for="team">Kota Tujuan</label><br>
                            <select name="kotaTujuan" id="kotaTujuan" class="select2 w-25 mb-3" onchange="loadGanti()" required>
                                <option value="-" selected disabled>- Pilih Kota Tujuan -</option>
                                @for ($i = 1; $i <= 3; $i++)
                                    <option value="{{ $i }}" id="{{ $i }}">
                                        {{ 'Kota ' . $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col">
                         {{-- Input Berapa Kali Kirim --}}
                        <div class="form-outline mb-3">
                            <label class="form-label" for="typeNumber">Frekuensi Pengiriman</label>
                            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="10" />
                        </div>

                        {{-- Button Submit --}}
                        <button type="button" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
</html>
