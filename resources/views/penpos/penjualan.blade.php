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
        <h1 class="card-header text-center" style="font-weight:bold;background-color:#E1AC61;color:#58431F;"><i
                class="bi bi-cart4"></i></i> Pos Penjualan</h1>
        <div class="card-body">
            <div class="team-select-section">

                {{-- Pilih Tim --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><br>
                    <select name="team" id="team" class="form-select select2 mb-3" onchange="loadGanti()">
                        <option value="-" selected disabled>- Pilih Team -</option>
                        @foreach ($teams as $team)
                            <option value="{{ $team->name }}" id="{{ $team->name }}">
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Pilih Kota Tujuan --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="team"><i class="bi bi-building"></i> Kota Tujuan</label><br>
                    <select name="kotaTujuan" id="kotaTujuan" class="form-select select2 mb-3" onchange="getTeamInv()"
                        required>
                        <option value="-" selected disabled>- Pilih Kota Tujuan -</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->city }}" id="{{ $city->city }}">
                                {{ $city->city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Pilih Barang --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="team"><i class="bi bi-box-seam-fill"></i> Pilih Barang</label><br>
                    <select name="barang" id="barang" class="form-select select2 mb-3" required>
                        <option value="-" selected disabled>- Pilih Barang -</option>
                    </select>
                </div>

                {{-- Input Jumlah Objek --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Kuantitas</label>
                    <input type="number" id="typeNumber" class="form-control w-25" min="1" max="999" />
                </div>

                {{-- Button Submit --}}
                <button type="button" class="btn btn-primary">Konfirmasi</button>

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
            $('#barang').html("<option value = '-' disabled selected>- Pilih Barang yang sudah Sampai -</option>")
            console.log(teamName);
            $.ajax({
                type: 'POST',
                url: '{{ route('penjualan.getInv') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamName': teamName,
                },
                success: function(data) {
                    console.log(data.buyTrans);
                    for (let i = 0; i < data.buyTrans.length; i++) {
                        // Create a new option group element
                        var option =
                            `<option value="${data.buyTrans[i].id}">${data.itemName[i].name} [${data.buyTrans[i].amount}]</option>`;
                        // Append the option group to the combobox
                        $('#barang').append(option);
                    }
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }

        const sellInv = () => {
            let teamName = $('#team').val();
            let invId = $('#barang').val();
            $('#barang').html(
                "<option value = '-' disabled selected>- Pilih Barang yang sudah Sampai -</option>")
            console.log(teamName);
            $.ajax({
                type: 'POST',
                url: '{{ route('penjualan.sellInv') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamName': teamName,
                },
                success: function(data) {
                    console.log(data.buyTrans);
                    for (let i = 0; i < data.buyTrans.length; i++) {
                        // Create a new option group element
                        var option =
                            `<option value="${data.buyTrans[i].id}">${data.itemName[i].name} [${data.buyTrans[i].amount}]</option>`;
                        // Append the option group to the combobox
                        $('#barang').append(option);
                    }
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }
    </script>
@endsection

</html>
