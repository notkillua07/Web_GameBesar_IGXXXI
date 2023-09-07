@extends('layouts.app')

<head>
    <title>IGXXXI - Penpos Distribusi</title>
</head>

@section('content')
    <div class="card m-auto mt-5 shadow" style="height:50em;width:40em;">

        {{-- Pos Distribusi --}}
        <h1 class="card-header text-center" style="font-weight:bold;background-color:#7DC1E3;color:#ffffff;"><i
                class="bi bi-truck"></i> Pos Distribusi</h1>
        <div class="card-body">
            <div class="team-select-section">
                <form class="row g-3">

                    {{-- Pilih Tim --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
                        <select name="team" id="team" class="form-select select2" onchange="getTeamInv()" required>
                            <option value="-" selected disabled>- Pilih Team -</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->name }}" id="{{ $team->name }}">
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Kota Tujuan --}}
                    <div class="col-md-6">
                        <div class="form-outline">
                            <label class="form-label" for="kotaTujuan"><i class="bi bi-building"></i> Kota
                                Tujuan</label><br>
                            <select name="kotaTujuan" id="kotaTujuan" class="form-select select2 mb-3"
                                onchange="getTeamInv()" required>
                                <option value="-" selected disabled>- Pilih Kota Tujuan -</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" id="{{ $city->id }}">
                                        {{ $city->city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Pilih Barang --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-box-seam-fill"></i> Pilih
                            Barang</label><br>
                        <select name="barang" id="barang" class="form-select select2 mb-3" onchange="" required>
                            <option value="-" selected disabled>- Pilih Barang -</option>
                        </select>
                    </div>

                    {{-- Pilih Jalur --}}
                    <div class="col-md-6">
                        <label class="form-label" for="team"><i class="bi bi-signpost-split-fill"></i> Pilih Jalur
                        </label><br>
                        <select name="jalur" id="jalur" class="form-select select2 mb-3" onchange="getTransport()"
                            required>
                            <option value="-" selected disabled>- Pilih Jalur -</option>
                            <option value="Darat" id="darat">
                                Jalur Darat
                            </option>
                            <option value="Laut" id="laut">
                                Jalur Laut
                            </option>
                        </select>
                    </div>

                    {{-- Pilih Jenis Transportasi --}}
                    <div class="col-12">
                        <label class="form-label" for="team"><i class="bi bi-globe"></i> Jenis Jasa
                            Transportasi</label><br>
                        <select name="jenisJasa" id="jenisJasa" class="form-select select2 mb-3" onchange="" required>
                            <option value="-" selected disabled>- Pilih Jenis Jasa -</option>
                        </select>
                    </div>
            </div>

            {{-- Input Muatan --}}
            <div class="col-12">
                <div class="form-outline mb-3">
                    <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Input Muatan</label>
                    <input type="number" id="muatan" class="form-control w-25" min="1" max="999999">
                </div>
            </div>

            {{-- Button Pengecekan Muatan --}}
            <div class="col-12">
                <button type="button" class="btn btn-primary" id="btnCekMuatan" onclick="cekMuatan()"><i
                        class="bi bi-search"></i> Cek
                    Muatan</button>

                <script></script>
            </div>
            {{-- Pilih Kota Tujuan --}}
            <div class="col-12">

            </div>
            </form>
            <div class="row mt-5 justify-content-center">

                {{-- Button Submit --}}
                <button type="button" class="btn btn-primary mb-2" onclick="sendMuatan()" style="width: 20em"><i
                        class="bi bi-send-fill"></i> Kirim</button>

                {{-- Button Penjualan --}}
                <a href="{{ __('/penjualan') }}" class="btn btn-info" role="button" style="width: 20em"><i
                        class="bi bi-signpost-fill"></i> Ke Penjualan</a>
            </div>
        </div>
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

        $('#submit').click(function() {
            $('#submit').attr('disabled', 'disabled');
            $('#submit').addClass('btn-submit-disabled');
            setTimeout(function() {
                $('#submit').removeAttr('disabled');
                $('#submit').removeClass('btn-submit-disabled');
            }, 2000);
        });

        const getTeamInv = () => {
            let teamName = $('#team').val();
            let city = $('#kotaTujuan').val();
            $('#barang').html("<option value = '-' disabled selected>- Pilih Barang -</option>")
            console.log(city);
            $.ajax({
                type: 'POST',
                url: '{{ route('distribusi.getInv') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'city': city,
                    'teamName': teamName,
                },
                success: function(data) {
                    console.log(data.amounts, data.names);
                    for (let i = 0; i < data.amounts.length; i++) {
                        // Create a new option group element
                        var option =
                            `<option value="${data.amounts[i].id}">${data.names[i].name} [${data.amounts[i].amount}]</option>`;
                        // Append the option group to the combobox
                        $('#barang').append(option);
                    }
                    alert(data.msg);
                },
                error: function(data) {
                    alert("Isikan Kota pengiriman!");
                }
            });
        }

        const getTransport = () => {
            let jalur = $('#jalur').val();
            let city = $('#kotaTujuan').val();
            $('#jenisJasa').html("<option value = '-' disabled selected>- Pilih Jasa -</option>")
            console.log(jalur, city);
            $.ajax({
                type: 'POST',
                url: '{{ route('distribusi.getTrans') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'jalur': jalur,
                    'city': city,
                },
                success: function(data) {
                    console.log(data.expeditions)
                    for (let i = 0; i < data.expeditions.length; i++) {
                        // Create a new option group element
                        let minute = Math.floor(data.expeditions[i].time_taken / 60);
                        let seconds = data.expeditions[i].time_taken % 60;
                        var option =
                            `<option value="${data.expeditions[i].id}">${data.expeditions[i].name} [Cap:${data.expeditions[i].capacity} Ton, Cost:${data.expeditions[i].cost}/100km, Time: ${minute}:${seconds}]</option>`;
                        // Append the option group to the combobox
                        $('#jenisJasa').append(option);
                    }
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }

        const cekMuatan = () => {
            let exp = $('#jenisJasa').val();
            let muatan = $('#muatan').val();
            console.log(exp, muatan);
            $.ajax({
                type: 'POST',
                url: '{{ route('distribusi.cekMuatan') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'exp': exp,
                    'muatan': muatan,
                },
                success: function(data) {
                    console.log(data.msg)
                    alert(data.msg);
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }

        const sendMuatan = () => {
            let exp = $('#jenisJasa').val();
            let inv = $('#barang').val();
            console.log(exp, inv);
            $.ajax({
                type: 'POST',
                url: '{{ route('distribusi.sendMuatan') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'exp': exp,
                    'inv': inv,
                },
                success: function(data) {
                    console.log(data.msg)
                    alert(data.msg);
                },
                error: function(data) {
                    console.log(data.msg)
                    //window.location.reload();
                }
            });
        }
    </script>
@endsection
