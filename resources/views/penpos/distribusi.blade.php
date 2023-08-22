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

        {{-- Pos Distribusi --}}
        <h1 class="card-header text-center" style="font-weight:bold;background-color:#E1AC61;color:#58431F;"><i
                class="bi bi-truck"></i> Pos Distribusi</h1>
        <div class="card-body">
            <div class="team-select-section">
                <form class="row g-3">

                    {{-- Pilih Tim --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
                        <select name="team" id="team" class="form-select select2 mb-3" onchange="loadGanti()"
                            required>
                            <option value="-" selected disabled>- Pilih Team -</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}" id="{{ $i }}">
                                    {{ 'Tim ' . $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    {{-- Pilih Barang --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-box-seam-fill"></i> Pilih Barang</label><br>
                        <select name="barang" id="barang" class="form-select select2 mb-3" onchange="loadGanti()"
                            required>
                            <option value="-" selected disabled>- Pilih Barang -</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}" id="{{ $i }}">
                                    {{ 'Barang ' . $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    {{-- Pilih Jalur --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-signpost-split-fill"></i> Pilih Jalur </label><br>
                        <select name="jalur" id="jalur" class="form-select select2 mb-3" onchange="loadGanti()"
                            required>
                            <option value="-" selected disabled>- Pilih Jalur -</option>
                            <option value="jalur" id="darat">
                                Jalur Darat
                            </option>
                            <option value="jalur" id="laut">
                                Jalur Laut
                            </option>
                        </select>
                    </div>

                    {{-- Pilih Jenis Transportasi --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-globe"></i> Jenis Transportasi</label><br>
                        <select name="jenisTransport" id="jenisTransport" class="form-select select2 mb-3"
                            onchange="loadGanti()" required>
                            <option value="-" selected disabled>- Pilih Jenis Transportasi -</option>
                            @for ($i = 1; $i <= 7; $i++)
                                <option value="{{ $i }}" id="{{ $i }}">
                                    {{ 'Transportasi ' . $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
            </div>

            {{-- Input Muatan --}}
            <div class="col-12">
                <div class="form-outline mb-3">
                    <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Input Muatan</label>
                    <input type="number" id="typeNumber" class="form-control w-25" min="1" max="999999">
                </div>
            </div>

            {{-- Button Pengecekan Muatan --}}
            <div class="col-12">
                <button type="button" class="btn btn-primary" id="btnCekMuatan"><i class="bi bi-search"></i> Cek Muatan</button>

                <script></script>
            </div>
            {{-- Pilih Kota Tujuan --}}
            <div class="col-12">
                <div class="form-outline mb-3 mt-3">
                    <label class="form-label" for="team"><i class="bi bi-building"></i> Kota Tujuan</label><br>
                    <select name="kotaTujuan" id="kotaTujuan" class="form-select select2 mb-3" onchange="loadGanti()"
                        required>
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
                {{-- Input Berapa Kali Kirim --}}
                <div class="col">
                    <div class="form-outline mb-3">
                        <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Frekuensi Pengiriman</label>
                        <input type="number" id="typeNumber" class="form-control w-25" min="1" max="10" />
                    </div>

                    {{-- Button Submit --}}
                    <button type="button" class="btn btn-primary"><i class="bi bi-send-fill"></i> Kirim</button>
                </div>
            </div>
        </div>
    </div>
@endsection

</html>
