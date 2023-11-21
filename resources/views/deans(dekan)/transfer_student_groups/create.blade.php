@extends('template')
@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Transferlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Transfer</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post" action="{{ route('transfers.store') }}">
                        @csrf
                        <div class="col-md-4">
                            <label class="form-label" for="student_id">Talabalar</label>
                            <select id="student_id" name="student_id" class="single-select select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                <option value="">Talabani tanlang!</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="transfer_direction_id">Yo'nalishlar</label>
                            <select name="transfer_direction_id" class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Yo'nalishni tanlang!</option>
                                @foreach($directions as $direction)
                                    <option value="{{ $direction->id }}">{{ $direction->title }}</option>
                                @endforeach
                            </select>
                            @error('transfer_direction_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="transfer_group_id">Guruhlar</label>
                            <select name="transfer_group_id" class="single-select select2-hidden-accessible" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option value="">Guruhni tanlang!</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                            @error('transfer_group_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Sana</label>
                            <input class="result form-control" name="date" type="text" id="date" placeholder="Sana" data-dtp="dtp_FypcP">
                        </div>

                        <input type="hidden" id="exit_direction_id" name="exit_direction_id">
                        <input type="hidden" id="exit_group_id" name="exit_group_id">

                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card" id="row_one">

                </div>
            </div>
            <div class="col-lg-8">
                <div class="card" id="row_two">

                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
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
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datetimepicker/js/picker.date.js') }}"></script>
    <script>

        $("#student_group_id").on("select2:select", function (e) {
            // console.log('asd');
        })
    </script>
    <script>
        $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: true
        }),
            $('.timepicker').pickatime()
    </script>
    <script>
        $(function () {
            $('#date-time').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD HH:mm'
            });
            let f = $('#date').bootstrapMaterialDatePicker({
                time: false,
            });

            console.log(f);

            $('#time').bootstrapMaterialDatePicker({
                date: false,
                format: 'HH:mm'
            });
        });
    </script>

    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#student_id").on('change', function (){
                $("#row_one").html('');
                $("#row_two").html('');
                $("#exit_direction_id").val('');
                $("#exit_group_id").val('');
                let student_id = $(this).val();
                let url = '{{ route("student.getId",":id") }}';
                url = url.replace(":id",student_id);
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'student_id': student_id
                    },
                    success:function(response)
                    {
                        $("#row_one").append(`
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4>${response.data.full_name}</h4>
                                        <p class="text-secondary mb-1">${response.data.dean_group.title}</p>
                                        <p class="text-muted font-size-sm">${response.data.direction.title}</p>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                        <span class="text-secondary">https://codervent.com</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                        <span class="text-secondary">@codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                        <span class="text-secondary">codervent</span>
                                    </li>
                                </ul>
                            </div>
                        `);
                        $("#row_two").append(`
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">F.I.O</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="full_name" type="text" class="form-control" value="${response.data.full_name}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Telefon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="phone" type="text" class="form-control" value="${response.data.phone}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ta'lim tili</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled="language_id" type="text" class="form-control" value="${response.data.language.name}">
                                </div>
                            </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ta'lim shakli</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="type_of_education_id" type="text" class="form-control" value="${response.data.type_of_education.name}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Talim turi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="form_of_education_id" type="text" class="form-control" value="${response.data.form_of_education.title}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Yo'nalishi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="direction_id" type="text" class="form-control" value="${response.data.direction.title}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Guruhi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="group_id" type="text" class="form-control" value="${response.data.dean_group.title}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Kursi</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="student_course_id" type="text" class="form-control" value="${response.data.student_course.title}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Talaba ID</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input disabled id="student_id" type="text" class="form-control" value="${response.data.student_id}">
                                    </div>
                                </div>
                            </div>
                        `);
                        $("#exit_direction_id").val(response.data.direction_id);
                        $("#exit_group_id").val(response.data.group_id);
                    },
                    error: function(response) {
                    }
                });

            })
        });
    </script>
@endpush
