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
                            <h1 class="text-left" style="color:#ffffff;"><i class="bi bi-coin"></i> Koin</h1>
                        </div>
                        <div class="col-sm pe-5">
                            <h1 class="text-end" id="koin" style="color:#ffffff;">
                                0
                            </h1>
                        </div>
                        <div class="col-sm ps-5">
                            <h1 class="text-left" style=";color:#ffffff;"><i class="bi bi-boxes"></i> Demand</h1>
                        </div>
                        <div class="col-sm">
                            <h1 class="text-end" id="demands" style="color:#ffffff;">
                                0
                            </h1>
                        </div>
                    </div>
                </div>
                <table class="table table-striped mt-1" id="table-pen">
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
                id="submitBulan"><i class="bi bi-calendar"></i>GANTI BULAN</button><br>
            <button class="btn btn-lg btn-primary btn-danger mb-4" style="width: 10em" onclick="inflasi()" id="submitInf"><i
                    class="bi bi-graph-up-arrow"></i>INFLASI</button><br>
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
                    var table = document.getElementById("table-pen");
                    if (data.arrOfBT.length != 0) {
                        for (let i = 0; i < data.arrOfBT.length; i++) {
                            var row = table.InsertRow();

                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);

                            cell1.innerHTML = (i + 1)
                            if (data.arrOfBT[i].expedition_id == '1') {
                                cell2.innerHTML = 'Cargo'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '2') {
                                cell2.innerHTML = 'Cargo'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '3') {
                                cell2.innerHTML = 'Cargo'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '4') {
                                cell2.innerHTML = 'Si Fast - Darat'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '5') {
                                cell2.innerHTML = 'Si Fast - Darat'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '6') {
                                cell2.innerHTML = 'Si Fast - Darat'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '7') {
                                cell2.innerHTML = 'Si Fast - Laut'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '8') {
                                cell2.innerHTML = 'Si Fast - Laut'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '9') {
                                cell2.innerHTML = 'Si Fast - Laut'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '10') {
                                cell2.innerHTML = 'Jalur Kurir - Darat'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '11') {
                                cell2.innerHTML = 'Jalur Kurir - Darat'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '12') {
                                cell2.innerHTML = 'Jalur Kurir - Darat'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '13') {
                                cell2.innerHTML = 'Jalur Kurir - Laut'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '14') {
                                cell2.innerHTML = 'Jalur Kurir - Laut'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '15') {
                                cell2.innerHTML = 'Jalur Kurir - Laut'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '16') {
                                cell2.innerHTML = 'JNA - Darat'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '17') {
                                cell2.innerHTML = 'JNA - Darat'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '18') {
                                cell2.innerHTML = 'JNA - Darat'
                                cell3.innerHTML = 'Bandung'
                            } else if (data.arrOfBT[i].expedition_id == '19') {
                                cell2.innerHTML = 'JNA - Laut'
                                cell3.innerHTML = 'Surabaya'
                            } else if (data.arrOfBT[i].expedition_id == '20') {
                                cell2.innerHTML = 'JNA - Laut'
                                cell3.innerHTML = 'Semarang'
                            } else if (data.arrOfBT[i].expedition_id == '21') {
                                cell2.innerHTML = 'JNA - Laut'
                                cell3.innerHTML = 'Bandung'
                            }
                            if (data.arrOfBT[i].status == 'arrived') {
                                cell4.innerHTML = '00:00'
                                cell5.innerHTML = 'Sudah Sampai'
                            } else if (data.arrOfBT[i].status == 'sold') {
                                cell4.innerHTML = '00:00'
                                cell5.innerHTML = 'Sudah Dijual'
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
                                cell4.innerHTML = seconds + ":" + minutes;
                                cell5.innerHTML = 'Dalam Pengiriman';
                            }
                            cell6.innerHTML(data.arrOfBT[i].cap_left)
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
