@extends('layouts.app')
<?php
date_default_timezone_set('Asia/Jakarta');
$t = time();
?>
<head>
    <title>Dashboard</title>
</head>
@section('content')
    <div class="card m-auto mt-5 shadow-sm" style="height:35em;width:50em;">
        <div class="container">
            <div class="row p-auto pt-2" style="background-color:#7DC1E3;">
                <div class="col-sm">
                    <h1 class="text-left" style="font-weight:bold;color:#ffffff;"> Koin</h1>
                </div>
                <div class="col-sm pe-5">
                    <h1 class="text-end" id="koin" style="font-weight:bold;color:#ffffff;"> {{ $tim->currency }} </h1>
                </div>
                <div class="col-sm ps-5">
                    <h1 class="text-right" style="font-weight:bold;color:#ffffff;"> Demand</h1>
                </div>
                <div class="col-sm">
                    <h1 class="text-end" id="demands" style="font-weight:bold;color:#ffffff;"> {{ $tim->fulfill_demands }}
                    </h1>
                </div>
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
                {{-- <p>{{print_r($arrOfBT[0]->expedition_id)}}</p> --}}
                @if ($arrOfBT == null)
                @else
                    @for ($i = 0; $i < count($arrOfBT[0]); $i++)
                        <tr>
                            <td class="align-middle"><b>{{ $i + 1 }}</b></td>
                            @if ($arrOfBT[0][$i]->expedition_id == '1')
                                <td class="align-middle">Cargo</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '2')
                                <td class="align-middle">Cargo</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '3')
                                <td class="align-middle">Cargo</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '4')
                                <td class="align-middle">Si Fast - Darat</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '5')
                                <td class="align-middle">Si Fast - Darat</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '6')
                                <td class="align-middle">Si Fast - Darat</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '7')
                                <td class="align-middle">Si Fast - Laut</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '8')
                                <td class="align-middle">Si Fast - Laut</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '9')
                                <td class="align-middle">Si Fast - Laut</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '10')
                                <td class="align-middle">Jalur Kurir - Darat</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '11')
                                <td class="align-middle">Jalur Kurir - Darat</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '12')
                                <td class="align-middle">Jalur Kurir - Darat</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '13')
                                <td class="align-middle">Jalur Kurir - Laut</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '14')
                                <td class="align-middle">Jalur Kurir - Laut</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '15')
                                <td class="align-middle">Jalur Kurir - Laut</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '16')
                                <td class="align-middle">JNA - Darat</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '17')
                                <td class="align-middle">JNA - Darat</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '18')
                                <td class="align-middle">JNA - Darat</td>
                                <td class="align-middle">Bandung</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '19')
                                <td class="align-middle">JNA - Laut</td>
                                <td class="align-middle">Surabaya</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '20')
                                <td class="align-middle">JNA - Laut</td>
                                <td class="align-middle">Semarang</td>
                            @elseif ($arrOfBT[0][$i]->expedition_id == '21')
                                <td class="align-middle">JNA - Laut</td>
                                <td class="align-middle">Bandung</td>
                            @endif
                            <td class="align-middle">
                                @php
                                    $valid = true;
                                    if ($arrOfBT[0][$i]->status == 'arrived') {
                                        $minutes = 'Sudah ';
                                        $seconds = 'Sampai';
                                        $valid = false;
                                    } elseif ($arrOfBT[0][$i]->status == 'sold') {
                                        $minutes = 'Sudah ';
                                        $seconds = 'Dijual';
                                        $valid = false;
                                    } else {
                                        $minutes = floor($seconds / 60);
                                        $seconds = $seconds % 60;
                                    }
                                    if ($valid) {
                                        echo "$minutes:$seconds";
                                    } else {
                                        echo $minutes . '' . $seconds;
                                    }
                                @endphp
                            </td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

        });

        $('#submit').click(function() {
            $('#submit').attr('disabled', 'disabled');
            $('#submit').addClass('btn-submit-disabled');
            setTimeout(function() {
                $('#submit').removeAttr('disabled');
                $('#submit').removeClass('btn-submit-disabled');
            }, 2000);
        });
    </script>
@endsection
