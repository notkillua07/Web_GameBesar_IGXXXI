@extends('layouts.app')
@section('styles')
<style>
    #team-select-section{
        
    }
</style>
@endsection

@section('content')
    <h1>Pos Hutang</h1>
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

        {{-- Input jawaban benar * 200 coin --}}
        <div class="form-outline mb-3">
            <label class="form-label" for="typeNumber">Jawaban Benar</label>
            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="10"/> 
        </div>

        {{-- Selesai Disubmit nanti keluar notif nambah koin berapa --}}
        <button type="button" class="btn btn-primary">Submit</button>
    </div>
@endsection
