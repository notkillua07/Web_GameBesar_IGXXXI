@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <title>IGXXXI - Penpos Penjualan</title>
    @section('styles')
    @endsection
</head>

@section('content')
<div class="card m-auto mt-5 shadow-sm" style="height:35em;width:30em;">
    <h1 class="card-header text-center" style="font-weight:bold;background-color:#E1AC61;color:#58431F;"><i class="bi bi-cart4"></i></i> Pos Penjualan</h1>
    <div class="card-body">
        <div class="team-select-section">

            {{-- Pilih Tim --}}
            <div class="form-outline mb-3">
            <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
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
                <label class="form-label" for="team"><i class="bi bi-box-seam-fill"></i> Pilih Barang</label><br>
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
    
            {{-- Input Jumlah Objek --}}
            <div class="form-outline mb-3">
                <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Kuantitas</label>
                <input type="number" id="typeNumber" class="form-control w-25" min="1" max="999"/> 
            </div>
    
             {{-- Pilih Kota Tujuan --}}
             <div class="form-outline mb-3">
                <label class="form-label" for="team"><i class="bi bi-building"></i> Kota Tujuan</label><br>
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
    
            {{-- Selesai Disubmit nanti keluar notif nambah koin berapa --}}
            <button type="button" class="btn btn-primary">Konfirmasi</button>
    
        </div>
    </div>
</div>
@endsection

</html>