@extends('layouts.app')
<!DOCTYPE html>
<html>

<head>
    <title>IGXXXI - Penpos Pembelian</title>
    @section('styles')
    @endsection
</head>

@section('content')
    <div class="card m-auto mt-5 shadow-sm" style="height:35em;width:30em;">
        <h1 class="card-header text-center" style="font-weight:bold;background-color:#E1AC61;color:#58431F;"><i
                class="bi bi-cart4"></i></i> Pos Pembelian</h1>
        <div class="card-body">
            <div class="team-select-section">

                {{-- Pilih Tim --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="team"><i class="bi bi-people-fill"></i> Pilih Tim</label><p>Currency: <span id="currency"></span></p>
                    <select name="team" id="team" class="form-select select2 mb-3" onchange="changeTeam()">
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
                    <select name="kotaTujuan" id="kotaTujuan" class="form-select select2 mb-3" onchange="getCitySupply()"
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
                        @foreach ($items as $group => $item)
                            <optgroup label="{{ $group }}">
                                @foreach ($item as $it)
                                    <option value="{{ $it->name }}">{{ $it->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>

                {{-- Input Jumlah Objek --}}
                <div class="form-outline mb-3">
                    <label class="form-label" for="typeNumber"><i class="bi bi-info-square"></i> Kuantitas</label>
                    <input type="number" id="amount" class="form-control w-25" min="1" max="999" />
                </div>

                {{-- Button Submit --}}
                <div class="form-outline">
                    <button type="button" class="btn btn-primary" id="submit" onclick="buySupply()">Konfirmasi</button>
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

        const changeTeam = () => {
            let teamName = $('#team').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('pembelian.getCurr') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamName': teamName,
                },
                success: function(data) {
                    $('#currency').text(data.team.currency);
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }

        const getCitySupply = () => {
            let city = $('#kotaTujuan').val();
            $('#barang').html("<option value = '-' disabled selected>- Pilih Barang -</option>")
            console.log(city);
            $.ajax({
                type: 'POST',
                url: '{{ route('pembelian.getCity') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'city': city,
                },
                success: function(data) {
                    console.log(data.items);
                    for (let i = 1; i < 4; i++) {
                        // Create a new option group element
                        let j = 0
                        if (i == 1) {
                            var optionGroup = $('<optgroup label="Buah"></optgroup>');
                            j = 0;
                        } else if (i == 2) {
                            var optionGroup = $('<optgroup label="Sayur"></optgroup>');
                            j = 3;
                        } else if (i == 3) {
                            var optionGroup = $('<optgroup label="Biji-bijian"></optgroup>');
                            j = 6;
                        }
                        for (let k = j; k < (j + 3); k++) {
                            var option =
                                `<option value="${data.items[k].id}">${data.items[k].name}</option>`;
                            // Append the option group to the combobox
                            optionGroup.append(option);
                        }
                        $('#barang').append(optionGroup);
                    }
                },
                error: function(data) {
                    window.location.reload();
                }
            });
        }
        const buySupply = () => {
            let teamName = $('#team').val();
            let itemName = $('#barang').val();
            let city = $('#kotaTujuan').val();
            let amount = $('#amount').val();
            console.log(teamName, itemName, city, amount);
            $.ajax({
                type: 'POST',
                url: '{{ route('pembelian.buySup') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'teamName': teamName,
                    'itemName': itemName,
                    'city': city,
                    'amount': amount,
                },
                success: function(data) {
                    console.log(data.msg)
                    alert(data.msg);
                },
                error: function(data) {
                    // window.location.reload();
                }
            });
        }
    </script>
@endsection

</html>
