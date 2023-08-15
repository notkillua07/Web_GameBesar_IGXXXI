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
    <h1>Pos Distribusi</h1>
    <div class="team-select-section">

        {{-- Pilih Tim --}}
        <div class="form-outline mb-3">
        <label class="form-label" for="team">Pilih Tim</label><br>
        <select name="team" id="team" class="select2 w-25 mb-3" onchange="loadGanti()"
            required>
            <option value="-" selected disabled>- Pilih Team -</option>
            @for ($i=1; $i <= 7; $i++)
                <option value="{{ $i }}" id="{{ $i }}">
                    {{ "Tim ".$i }}
                </option>
            @endfor
        </select>
        </div>

         {{-- Pilih Barang --}}
         <div class="form-outline mb-3">
            <label class="form-label" for="team">Pilih Barang</label><br>
            <select name="barang" id="barang" class="select2 w-25 mb-3" onchange="loadGanti()"
                required>
                <option value="-" selected disabled>- Pilih Barang -</option>
                @for ($i=1; $i <= 7; $i++)
                    <option value="{{ $i }}" id="{{ $i }}">
                        {{ "Barang ".$i }}
                    </option>
                @endfor
            </select>
        </div>

         {{-- Pilih Jalur --}}
         <div class="form-outline mb-3">
            <label class="form-label" for="team">Pilih Jalur </label><br>
            <select name="jalur" id="jalur" class="select2 w-25 mb-3" onchange="loadGanti()"
                required>
                <option value="-" selected disabled>- Pilih Barang -</option>
                <option value="jalur" id="darat">
                    Jalur Darat
                </option>
                <option value="jalur" id="laut">
                    Jalur Laut
                </option>
            </select>
        </div>

         {{-- Pilih Jenis Transportasi --}}
         <div class="form-outline mb-3">
            <label class="form-label" for="team">Jenis Transportasi</label><br>
            <select name="jenisTransport" id="jenisTransport" class="select2 w-25 mb-3" onchange="loadGanti()"
                required>
                <option value="-" selected disabled>- Pilih Jenis Transportasi -</option>
                @for ($i=1; $i <= 7; $i++)
                    <option value="{{ $i }}" id="{{ $i }}">
                        {{ "Transportasi ".$i }}
                    </option>
                @endfor
            </select>
        </div>

        {{-- Input Muatan --}}
        <div class="form-outline mb-3">
            <label class="form-label" for="typeNumber">Input Muatan</label>
            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="999999"/> 
        </div>

        {{-- Button Pengecekan Muatan --}}
        <button type="button" class="btn btn-primary" id="btnCekMuatan">Cek</button>
        
        <script>    
        // Jika pengecekan tidak berhasil maka input selanjutnya tidak ditampilkan
        </script>
        

        {{-- Pilih Kota Tujuan --}}
         <div class="form-outline mb-3 mt-3">
            <label class="form-label" for="team">Kota Tujuan</label><br>
            <select name="kotaTujuan" id="kotaTujuan" class="select2 w-25 mb-3" onchange="loadGanti()"
                required>
                <option value="-" selected disabled>- Pilih Kota Tujuan -</option>
                @for ($i=1; $i <= 3; $i++)
                    <option value="{{ $i }}" id="{{ $i }}">
                        {{ "Kota ".$i }}
                    </option>
                @endfor
            </select>
        </div>

        {{-- Input Berapa Kali Kirim --}}
        <div class="form-outline mb-3">
            <label class="form-label" for="typeNumber">Frekuensi Pengiriman</label>
            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="10"/> 
        </div>

        {{-- Button Submit --}}
        <button type="button" class="btn btn-primary">Submit</button>

    </div>
    
@endsection
</html>

