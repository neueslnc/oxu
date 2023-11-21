@extends('template')

@section('script_include_header')

<style>
    #video-area {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    canvas {
        position: absolute;
    }
</style>

<script defer src="{{ url('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script defer src="{{ url('assets/plugins/notifications/js/notifications.min.js') }}"></script>

<script defer src="{{ url('moment.js') }}"></script>

<script defer>

    function reset_data() {
        window.img_user = '{{ url('avatar-2.jpg') }}';

        window.user_name = 'Неизвестен';

        window.active = false;

        window.pc.nomer = '';
        window.pc.name = '';
        window.pc.local_ip = '';

        $("#id").val("");
        $("#fio").val("");
        $("#group").val("");

        $('#user_name').text('')
        $('#time').text('');
        $('#date').text('');
        $('#computer').text('');
    }

    function succes_noti_face_id(title = "Проверен", msg="") {
        reset_data();
        Lobibox.notify('success', {
            title: title,
            pauseDelayOnHover: true,
            size: 'mini',
            icon: 'bx bx-check-circle',
            continueDelayOnInactiveTab: false,
            position: 'top right',
            msg: msg
        });
    }

    function error_noti_face_id(title = "Xato", msg="") {
        reset_data();
        Lobibox.notify('error', {
            title: title,
            pauseDelayOnHover: true,
            continueDelayOnInactiveTab: false,
            position: 'top right',
            icon: 'bx bx-x-circle',
            msg: msg
        });
    }

</script>

<script defer src="{{ asset('face-api-0-22.min.js') }}"></script>
<script defer>

    window.img_user = '{{ url('avatar-2.jpg') }}';

    window.user_name = 'Неизвестен';

    window.active = false;

    window.pc = {
        nomer : '',
        name : '',
        local_ip : '',
    }

    window.pc.nomer = '';
    window.pc.name = '';
    window.pc.local_ip = '';

</script>

<script defer src="{{ asset('script.js') }}"></script>

@endsection

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Talabalar ro'yxati</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Talabalar ro'yxati</h6>
        </div>
        <hr>
        <div class="card radius-10">
                 <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="border p-4 rounded">
                                                        <div class="text-center">
                                                            <h3 class="">Проверка</h3>
                                                        </div>
                                                        <div class="login-separater text-center mb-4">
                                                        </div>
                                                        <div class="form-body">
                                                            <form method="POST" action="{{ route('login_post') }}" class="row g-3">
                                                                @csrf

                                                                <div class="col-12">
                                                                        @foreach ($errors->all() as $error)
                                                                            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                                                                <div class="text-white">{{ $error }}</div>
                                                                            </div>
                                                                        @endforeach
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="id" class="form-label">HEMIS ID:</label>
                                                                    <input type="text" name="id" class="form-control" id="id" placeholder="Введите: ID">
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="d-grid">
                                                                        <button id="submit" type="button" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Проверить</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt-1">



                                                    <div class="border p-4 rounded">
                                                        <div class="text-center">
                                                            <h3 class="">Информация</h3>
                                                        </div>
                                                        <div class="login-separater text-center mb-4">
                                                        </div>

                                                        <div class="form-body">
                                                            <form method="POST" class="row g-3">

                                                                <div class="col-12">
                                                                    <label for="fio" class="form-label">ФИО:</label>
                                                                    <input type="text" name="fio" class="form-control" id="fio" placeholder="Фамилия Имя Отчество" readonly>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="group" class="form-label">Группа:</label>
                                                                    <input type="text" name="group" class="form-control" id="group" placeholder="Группа" readonly>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body" id="video-area">
                                            <video id="video" width="800" height="800" autoplay></video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection

@push('check')
    <section id="bill-print" class="bill-print" style="display: none;">
        <div class="bill-print-header">
        <h1 style="color : black;">{{ config('app.name') }}</h1>
        <p>
            <span style="color : black;"></span>
        </p>
        <p style="color : black;">Talaba : <p id="user_name" style="color : black;"></p></p>
        <p style="color : black;">Soat : <p id="time" style="color : black;"></p></p>
        <p style="color : black;">Sana : <p id="date" style="color : black;"></p></p>
        <p style="color : black;">Kompyuter : <p id="computer" style="color : black;"></p></p>
        </div>
    </section>
  <script>
    (function() {
      let printButton = document.querySelector('#print');
      let newButton = document.querySelector('#new');

      printButton.addEventListener( 'click', function( e ) {
        window.print();
      });
    })();
  </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
@endpush

@push('scripte_include_end_body')

<script>

    $('#submit').on('click', function name() {
        $.ajax('{{ route('supervisor_exams.get_student') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : $('#id').val()
            },
            success: function (data, status) {
                for (const key in data.data) {
                    if (Object.hasOwnProperty.call(data.data, key)) {

                        $(`#${key}`).val(data.data[key]);
                    }
                }

                window.img_user = data.img_path;
                window.user_name = data.data.fio;
                window.data_user = data.data;
                window.data_id = data.data.id;

                window.active = true;
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        })
    });

    async function get_pc() {

        return await $.ajax('{{ route('supervisor_exams.set_pc_active') }}', {
            type : 'POST',
            data : {
                "_token" : "{{ csrf_token() }}",
                "student_id" : window.data_id
            },
            success : function (data, status) {
                window.pc.nomer = data.data.pc_nomer;
                window.pc.name = data.data.pc_name;
                window.pc.local_ip = data.data.pc_local_ip;

                if (data.status == 200) {
                    return 1;
                }else{
                    return 0;
                }

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }


</script>

@endpush
