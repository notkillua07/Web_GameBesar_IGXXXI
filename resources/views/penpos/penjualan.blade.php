<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IGXXXI - Penpos Penjualan</title>
</head>
<body>
     {{-- Pilih Tim --}}
     <select name="team" id="team" class="select2 w-25 mb-3" onchange="loadGanti()"
     required>
     <option value="-" selected disabled>- Pilih Team -</option>
     @for ($i=1; $i <= 7; $i++)
         <option value="{{ $i }}" id="{{ $i }}">
             {{ "Tim ".$i }}
         </option>
     @endfor
 </select>
</body>
</html>