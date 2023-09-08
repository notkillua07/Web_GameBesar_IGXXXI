@extends('layouts.app')

<head>
    <title>IGXXXI - Admin Dashboard</title>
</head>

@section('content')
    {{-- Outer Card --}}
    <div class="card shadow mt-3 mx-3">

        {{-- Outer Card Head --}}
        <div class="card-header text-center" style="background-color:#7DC1E3;">
            <h1 style="font-weight:bold;color:#ffffff;"><i class="bi bi-person-badge-fill"></i> Admin Area</h1>
        </div>

        {{-- Outer Card Body --}}
        <div class="card-body">

            {{-- Input Pilih Tim --}}
            <div class="form-outline mb-3">
                <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
                <select name="team" id="team" class="form-select select2 mb-3" onchange="getTeam()">
                    <option value="-" selected disabled>- Pilih Team -</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->name }}" id="{{ $team->name }}">
                            {{ $team->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tabel --}}
            <div class="card m-auto mt-5 shadow-sm">
                <div class="card-header px-4" style="background-color:#7DC1E3;">
                    <div class="row p-auto pt-2">
                        <div class="col-sm">
                            <h1 class="text-left" style="color:#ffffff;"><i class="bi bi-calculator"></i> Hutang</h1>
                        </div>
                        <div class="col-sm pe-5">
                            <h1 class="text-end" id="koin" style="color:#ffffff;">
                                {{$team->debt}}
                            </h1>
                        </div>
                        <div class="col-sm">
                            <h1 class="text-left" style="color:#ffffff;"><i class="bi bi-coin"></i> Total Dana</h1>
                        </div>
                        <div class="col-sm pe-5">
                            <h1 class="text-end" id="koin" style="color:#ffffff;">
                                {{$team->currency}}
                            </h1>
                        </div>
                        <div class="col-sm ps-5">
                            <h1 class="text-left" style=";color:#ffffff;"><i class="bi bi-boxes"></i> Demand</h1>
                        </div>
                        <div class="col-sm">
                            <h1 class="text-end" id="demands" style="color:#ffffff;">
                                {{$team->fulfill_demands}}
                            </h1>
                        </div>
                    </div>
                </div>
                <table class="table table-striped mt-1">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Kota Tujuan</th>
                            <th scope="col">Sisa Waktu</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kapasitas Terisi</th>
                        </tr>
                    </thead>
                    <tbody id="table-pen">
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- Control Area --}}
    <div class="card mt-3 mx-auto text-center" style="height: 20em; width:25em">
        <div class="card-header text-center" style="background-color:#7DC1E3;">
            <h1 style="font-weight:bold;color:#ffffff;"><i class="bi bi-joystick"></i></i> Control Area</h1>
        </div>
        <div class="card-body">
            {{-- <a href="#" class="btn btn-lg btn-primary btn-danger mb-4" style="width: 10em"><i
                    class="bi bi-calendar"></i> GANTI BULAN</a><br> --}}
            <button class="btn btn-lg btn-primary btn-danger mb-4" style="width: 10em" onclick="gantiBulan()"
                id="submitBulan"><i class="bi bi-calendar"></i> GANTI BULAN</button><br>
            <button class="btn btn-lg btn-primary btn-danger mb-4" style="width: 10em" onclick="inflasi()" id="submitInf"><i
                    class="bi bi-graph-up-arrow"></i> INFLASI</button><br>
            {{-- <a href="#" class="btn btn-lg btn-danger btn-primary mb-4" style="width: 10em"><i
                    class="bi bi-graph-up-arrow"></i> INFLASI</a> --}}
            <p class="text-danger"><i class="bi bi-radioactive"></i> Danger! Please Proceed with Caution. <i
                    class="bi bi-radioactive"></i></p>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();

            window.setTimeout(function() {
                $(".alert-danger").fadeTo(1000, 0).slideUp(800, function() {
                    $(this).remove();
                });
            }, 2000);
        });

        $('#submitBulan').click(function() {
            $('#submitBulan').attr('disabled', 'disabled');
            $('#submitBulan').addClass('btn-submit-disabled');
            setTimeout(function() {
                $('#submitBulan').removeAttr('disabled');
                $('#submitBulan').removeClass('btn-submit-disabled');
            }, 2000);
        });

        $('#submitInf').click(function() {
            $('#submitInf').attr('disabled', 'disabled');
            $('#submitInf').addClass('btn-submit-disabled');
            setTimeout(function() {
                $('#submitInf').removeAttr('disabled');
                $('#submitInf').removeClass('btn-submit-disabled');
            }, 2000);
        });


        const gantiBulan = () => {
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.bulan') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    alert(data.msg);
                },
                error: function(data) {
                    // window.location.reload();
                }
            });
        }

        const inflasi = () => {
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.inflasi') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                },
                success: function(data) {
                    alert(data.msg);
                },
                error: function(data) {
                    // window.location.reload();
                }
            });
        }

        const getTeam = () => {

            let teamName = $('#team').val();
            var table = document.getElementById("table-pen");
            table.innerHTML = "";
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.getTeam') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamName': teamName,
                },
                success: function(data) {
                    $('#koin').text(data.team.currency);
                    $('#demand').text(data.team.demand_fulfilled);
                    
                    if (data.arrOfBT.length != 0) {
                        for (let i = 0; i < data.arrOfBT.length; i++) {
                            let content = ""
                            content += "<td>" + (i + 1) + "</td>"
                            if (data.arrOfBT[i].expedition_id == '1') {
                                content += "<td> Cargo </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '2') {
                                content += "<td> Cargo </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '3') {
                                content += "<td> Cargo </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '4') {
                                content += "<td> Si Fast - Darat </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '5') {
                                content += "<td> Si Fast - Darat </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '6') {
                                content += "<td> Si Fast - Darat </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '7') {
                                content += "<td> Si Fast - Laut </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '8') {
                                content += "<td> Si Fast - Laut </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '9') {
                                content += "<td> Si Fast - Laut </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '10') {
                                content += "<td> Jalur Kurir - Darat </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '11') {
                                content += "<td> Jalur Kurir - Darat </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '12') {
                                content += "<td> Jalur Kurir - Darat </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '13') {
                                content += "<td> Jalur Kurir - Laut </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '14') {
                                content += "<td> Jalur Kurir - Laut </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '15') {
                                content += "<td> Jalur Kurir - Laut </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '16') {
                                content += "<td> JNA - Darat </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '17') {
                                content += "<td> JNA - Darat </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '18') {
                                content += "<td> JNA - Darat </td> <td>Bandung</td>";
                            } else if (data.arrOfBT[i].expedition_id == '19') {
                                content += "<td> JNA - Laut </td> <td>Surabaya</td>";
                            } else if (data.arrOfBT[i].expedition_id == '20') {
                                content += "<td> JNA - Laut </td> <td>Semarang</td>";
                            } else if (data.arrOfBT[i].expedition_id == '21') {
                                content += "<td> JNA - Laut </td> <td>Bandung</td>";
                            }

                            if (data.arrOfBT[i].status == 'arrived') {
                                content += "<td> 00:00 </td> <td>Sudah Sampai</td>";
                            } else if (data.arrOfBT[i].status == 'sold') {
                                content += "<td> 00:00 </td> <td>Sudah Dijual</td>";
                            } else if (data.arrOfBT[i].status == 'sending') {
                                var dtString = data.arrOfBT[i].arrived_at;
                                var curTime = new Date();
                                var timeDiff = curTime - dtString;

                                var seconds = Math.floor(timeDiff / 1000);
                                var minutes = Math.floor(timeDiff / (1000 * 60));
                                if (seconds < 10) {
                                    seconds = "0" + seconds;
                                }
                                if (minutes < 10) {
                                    minutes = "0" + minutes;
                                }
                                content += "<td> " + minutes + ":" +
                                    seconds +" </td> <td>Dalam Pengiriman</td>";
                            }
                            content+="<td> "+data.arrOfBT[i].cap_left+" </td>";
                            table.innerHTML += "<tr>";
                            table.innerHTML += content;
                            table.innerHTML += "</tr>";
                        }
                    }
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
