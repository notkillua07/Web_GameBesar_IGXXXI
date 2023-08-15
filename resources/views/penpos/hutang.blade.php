@extends('layouts.app')
@section('styles')
<style>
    #team-select-section{
        
    }
</style>
@endsection

@section('content')
    Pilih Team
    <div class="team-select-section">
        <select name="team" id="team" class="select2 w-25 mb-3" onchange="loadGanti()"
            required>
            <option value="-" selected disabled>- Pilih Team -</option>
            @for ($i=0; $i <= 2; $i++)
                <option value="{{ $i }}" id="{{ $i }}">
                    {{ $i }}
                </option>
            @endfor
        </select>

        <div class="form-outline">
            <label class="form-label" for="typeNumber">Jawaban Benar</label>
            <input type="number" id="typeNumber" class="form-control w-25" min="1" max="10"/> 
            
        </div>
    </div>
@endsection