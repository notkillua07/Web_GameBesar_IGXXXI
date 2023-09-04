@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                {{-- <tr>
                <th scope="row">1</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>...</td>
                <td>...</td>
                <td>...</td>
              </tr> --}}
                @for ($i = 0; $i < count($arrOfBT); $i++)
                    <tr>
                        <td class="align-middle"><b>{{ $i + 1 }}</b></td>
                        @if ($arrOfBT[$i]->exp_id == '1')
                            <td class="align-middle">Cargo</td>
                            <td class="align-middle">Surabaya</td>
                        @elseif ($arrOfBT[$i]->exp_id == '2')
                            <td class="align-middle">Cargo</td>
                            <td class="align-middle">Semarang</td>
                        @elseif ($arrOfBT[$i]->exp_id == '3')
                            <td class="align-middle">Cargo</td>
                            <td class="align-middle">Bandung</td>
                        @elseif ($arrOfBT[$i]->exp_id == '4' || $arrOfBT[$i]->exp_id == '7')
                            <td class="align-middle">Si Fast</td>
                            <td class="align-middle">Surabaya</td>
                        @elseif ($arrOfBT[$i]->exp_id == '5' || $arrOfBT[$i]->exp_id == '8')
                            <td class="align-middle">Si Fast</td>
                            <td class="align-middle">Semarang</td>
                        @elseif ($arrOfBT[$i]->exp_id == '6' || $arrOfBT[$i]->exp_id == '9')
                            <td class="align-middle">Si Fast</td>
                            <td class="align-middle">Bandung</td>
                        @elseif ($arrOfBT[$i]->exp_id == '')
                            <td class="align-middle">Cargo</td>
                            <td class="align-middle">Bandung</td>
                            <td class="align-middle">{{ $t = time();$arrOfBT[$i]->sent_at }}</td>
                    </tr>
                @endfor
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

</html>
