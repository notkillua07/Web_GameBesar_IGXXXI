@extends('layouts.app')
@section('styles')

    {{--  Toaster Sweet Alert  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        #team-select-section {}
    </style>
@endsection

@section('content')
    <h1>Pos Hutang</h1>
    <div class="team-select-section">
        {{-- Pilih Tim --}}
        <div class="form-outline mb-3">
        <label class="form-label" for="team">Pilih Tim</label><br>
        {{-- <select name="team" id="team" class="select2 w-25 mb-3" onchange="loadGanti()"
            required>
            <option value="-" selected disabled>- Pilih Team -</option>
            @for ($i = 1; $i <= 7; $i++)
                <option value="{{ $i }}" id="{{ $i }}">
                    {{ 'Tim ' . $i }}
                </option>
            @endfor
        </select>  --}}

        <select name="team" id="team" class="select2 w-25 mb-3" required>
            <option value="-" selected disabled>- Pilih Team -</option>
            @foreach ($teams as $team)
                <option value="{{ $team->name }}" id="{{ $team->name }}">
                    {{ $team->name }}
                </option>
            @endforeach
        </select>
        </div>

        {{-- Input jawaban benar * 200 coin --}}
        <div class="form-outline mb-3">
            <label class="form-label" for="totalRight">Jawaban Benar</label>
            <input type="number" id="totalRight" class="form-control w-25" min="1" max="10" />
        </div>

        {{-- Selesai Disubmit nanti keluar notif nambah koin berapa --}}
        <button type="button" class="btn btn-primary" id="submit" onclick="inputHutang()" >Submit</button>
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

        const Toaster = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        })

        $('#submit').click(function() {
            $('#submit').attr('disabled', 'disabled');
            $('#submit').addClass('btn-submit-disabled');
            setTimeout(function() {
                $('#submit').removeAttr('disabled');
                $('#submit').removeClass('btn-submit-disabled');
            }, 2000);
        });


        const inputHutang = () => {
            let teamName = $('#team').val();;

            const hutang = $('#totalRight').val() * 200;
            console.log(teamName, hutang);
            $.ajax({
                type: 'POST',
                url: '{{ route('penpos.hutang') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'team_name': teamName,
                    'hutang': hutang,
                },
                success: function(data) {
                    console.log('Hutang Berhasil!' + '\nTeam: ' + teamName +
                        "\nTotal Hutang: " + poin);
                    if (data[0].msg == "Success") {
                        Toaster.fire({
                            icon: 'success',
                            animation: true,
                            title: 'Hutang Berhasil!' + '\nTeam: ' + teamName +
                                "\nTotal Hutang: " + hutang;
                        });

                        // $("#team").val('');
                        $("#team").val('');

                        $("#totalRight").val('');
                    } else {
                        Toaster.fire({
                            icon: 'error',
                            animation: true,
                            title: data[0].msg,
                        });

                        // $("#team").val('');
                        $("#team").val('');

                        $("#totalRight").val('');
                    }
                    // setTimeout(function() {
                    //     window.location.reload();
                    // }, 7000);
                },
                error: function(data) {
                    console.log(data);
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
