@extends('template')

@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Guruh biriktirish</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Guruh biriktirish</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="starter-template">
                @if (session()->has('success'))
                    <p class="alert alert-success">{{ session()->get('success') }}</p>
                @endif
                @if (session()->has('warning'))
                    <p class="alert alert-danger">{{ session()->get('warning') }}</p>
                @endif

            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post" action="{{ route('deans_connect_group.store') }}">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label">Ta'lim shakli</label>
                            <select name="type_of_education_id" id="type_of_education_id"
                                    class="single-select select2-hidden-accessible" data-select2-id="2" tabindex="-1"
                                    aria-hidden="true">
                                <option value="">Ta'lim shaklini tanlang!</option>
                                <option value="1">Bakalavr(kunduzgi)</option>
                                <option value="2">Bakalavr(sirtqi)</option>
                                <option value="4">Bakalavr(kechki)</option>
                                <option value="3">Magistr(kunduzgi)</option>
                                 {{-- @foreach($type_of_educations as $type_of_education)
                                    <option value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                @endforeach  --}}
                            </select>
                            @error('type_of_education_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ta'lim tili</label>
                            <select name="language_id" id="language_id" class="single-select select2-hidden-accessible"
                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim tilini tanlang!</option>
                                @foreach($languages as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                            @error('language_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ta'lim yo'nalishi</label>
                            <select name="direction_id" id="direction_id"
                                    class="single-select select2-hidden-accessible" data-select2-id="4" tabindex="-1"
                                    aria-hidden="true">
                                <option value="">Ta'lim yo'nalishini tanlang!</option>
                                W
                            </select>
                            @error('direction_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-4">
                            <label class="form-label">Kursi</label>
                            <select name="group_course_id" id="group_course_id"
                                    class="single-select select2-hidden-accessible" data-select2-id="5" tabindex="-1"
                                    aria-hidden="true">
                                <option value="">Talaba kursini tanlang!</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
{{--                                @foreach($student_courses as $student_course)--}}
{{--                                    <option value="{{ $student_course->id }}">{{ $student_course->title }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            @error('group_course_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <input type="hidden" name="user" id="user" value="{{ $user }}">
                        <div class="col-md-4">
                            <label class="form-label">Guruhlar</label>
                            <select name="group_akademik_year[]" id="group_akademik_year"
                                    class="single-select select2-hidden-accessible" data-select2-id="6" tabindex="-1"
                                    aria-hidden="true" multiple>
                                <option value="">Guruh tanlang</option>
                            </select>
                            @error('group_akademik_year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="supervisor">Nazoratchi</label>
                            <select name="supervisor_id" class="single-select select2-hidden-accessible"
                                    data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="">Nazoratchi</option>
                                @foreach($supervisors as $supervisor)
                                    <option value="{{ $supervisor->id }}">{{ $supervisor->full_name }}</option>
                                @endforeach
                            </select>
                            @error('supervisor')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
@endpush
@push('scripte_include_end_body')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script
        src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>
    <script>

        $("#student_group_id").on("select2:select", function (e) {
            console.log('asd');
        })
    </script>
    <script>

        // $("#type_of_education_id").change(function (){
        //     $("#direction_id").html('');
        //     $.ajax('{{ route('get.directionSupervisor') }}', {
        //         type: "GET",
        //         data: {
        //             'type_of_education_id': $('#type_of_education_id').val(),
        //             'user': $('#user').val(),
        //         },
        //         success: function (data) {
        //             $("#direction_id").append(`
        //                    <option>Yo'nalishni tanlang</option>
        //                 `);
        //             $.each( data.direction, function( key, item ) {
        //                 $("#direction_id").append(`
        //                    <option value="${item.id}">${item.title}</option>
        //                 `);
        //             });
        //         }
        //     });
        // });

        $("#direction_id").change(function (){
            $("#group_akademik_year").html('');
            $.ajax('{{ route('get.groupWithDirection') }}', {
                type: "GET",
                data: {
                    'direction_id': $(this).val(),
                    'user': $('#user').val(),
                },
                success: function (data) {
                    $("#group_akademik_year").append(`
                           <option>Guruhni tanlang</option>
                        `);
                    $.each( data.groups, function( key, item ) {
                        $("#group_akademik_year").append(`
                           <option value="${item.id}">${item.title}</option>
                        `);
                    });
                }
            })
        });


        function filter_direction() {


            $.ajax('{{ route('get_connect_direction') }}', {
                type: "GET",
                data: {

                    'type_of_education_id': $('#type_of_education_id').val(),
                    'language_id': $('#language_id').val(),
                    'user': $('#user').val(),

                },
                success: function (data, status) {
                    let format_data = []
                    for (const iterator of data.direction) {
                        format_data.push({
                            id: iterator.get_direction_id.id,
                            text: `${iterator.get_direction_id.code} ${iterator.get_direction_id.title}`,
                        })
                    }


                    //     $("#language_id").html(``);


                    $('#direction_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Guruhni tanlang",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: format_data,
                        disabled: false,
                    });
                },
                error: function (e){
                    console.log(e);
                }
            })
        };


        $('#language_id').on('select2:select', function () {
            filter_direction();
        });


        function filter_group() {


            $.ajax('{{ route('get_connect_groups') }}', {
                type: "GET",
                data: {
                    'type_of_education_id': $('#type_of_education_id').val(),
                    'language_id': $('#language_id').val(),
                    'direction_id': $('#direction_id').val(),
                    'group_course_id': $('#group_course_id').val(),

                },
                success: function (data, status) {


                    let format_data = []


                    for (const iterator of data.direction) {
                        format_data.push({
                            id: iterator.dean_group.id,
                            text: ` ${iterator.dean_group.title}`,
                        })
                    }


                    //     $("#language_id").html(``);


                    $('#group_akademik_year').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Guruhni tanlang",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: format_data,
                        disabled: false,
                    });
                }
            })
        };


        $('#group_course_id').on('select2:select', function () {
            filter_group();
        });

    </script>
@endpush
