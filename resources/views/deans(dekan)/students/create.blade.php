@extends('template')
@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talabalar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Talaba qo'shish</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <form action="{{ route('upload.fileExcel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label d-block btn btn-outline-success px-5" for="file">Import Excel <i class="bx bx-cloud-upload mr-1"></i></label>
                    <input type="file" name="file" id="file" class="form-control w-50 d-none">

                    <input id="excel" class="btn btn-success" type="submit" value="Saqlash">
                </form>
            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <label for="student_id" class="form-label">Talaba id</label>
                            <input placeholder="Talaba id" value="{{ old('student_id') }}" type="number" class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id">
                            @error('student_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="hemis_id" class="form-label">Hemis id</label>
                            <input placeholder="Hemis" value="{{ old('hemis_id') }}" type="number" class="form-control @error('hemis_id') is-invalid @enderror" id="hemis_id" name="hemis_id">
                            @error('hemis_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-4">
                            <label for="full_name" class="form-label">Talaba F.I.O</label>
                            <input placeholder="F.I.O" type="text" value="{{ old('full_name') }}" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name">
                            @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="number_phone" class="form-label">Talaba telefon raqami</label>
                            <input placeholder="+998901234567" type="text" value="{{ old('number_phone') }}" class="form-control @error('number_phone') is-invalid @enderror" id="number_phone" name="number_phone">
                            @error('number_phone')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Gurhni tanlang</label>
                            <select name="group_id" id="group_id" class="single-select select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
                                <option value="">Talaba guruhni tanlang!</option>
                                @foreach($dean_groups as $dean_group)
                                    <option value="{{ $dean_group->id }}">{{ $dean_group->title }}</option>
                                @endforeach
                            </select>
                            @error('group_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" >Ta'lim tili</label>
                            <select name="language_id" id="language_id" class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
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
                            <label class="form-label" >Ta'lim shakli</label>
                            <select name="type_of_education_id" id="type_of_education_id" class="single-select select2-hidden-accessible" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim shaklini tanlang!</option>
                                @foreach($type_of_educations as $type_of_education)
                                    <option value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                @endforeach
                            </select>
                            @error('type_of_education_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" >Ta'lim turi</label>
                            <select name="form_of_education_id" id="form_of_education_id" class="single-select select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim turini tanlang!</option>
                                @foreach($form_of_educations as $form_of_education)
                                    <option value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>
                                @endforeach
                            </select>
                            @error('form_of_education_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" >Ta'lim yo'nalishi</label>
                            <select name="direction_id" id="direction_id" class="single-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim yo'nalishini tanlang!</option>
                                @foreach($directions as $direction)
                                    <option value="{{ $direction->id }}">{{ $direction->title }}</option>
                                @endforeach
                            </select>
                            @error('direction_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" >Kursi</label>
                            <select name="student_course_id" id="student_course_id" class="single-select select2-hidden-accessible" data-select2-id="5" tabindex="-1" aria-hidden="true">
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
                            @error('student_course_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" >Jinsi</label>
                            <select name="sex_id" id="sex_id" class="single-select select2-hidden-accessible" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                <option value="">Talaba jinsini tanlang!</option>
                                @foreach($sexes as $sex)
                                    <option value="{{ $sex->id }}">{{ $sex->title }}</option>
                                @endforeach
                            </select>
                            @error('sex_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="img_path">Talaba rasmi</label>
                            <input type="file" class="form-control" name="img_path" id="img_path">
                            @error('img_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="excel_transfer_group">Izoh</label>
                            <textarea type="file" class="form-control" rows="10" name="excel_transfer_group" id="excel_transfer_group"></textarea>
                            @error('excel_transfer_group')
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
    <link href="
https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css
" rel="stylesheet">
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
    <script src="
    https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js
    "></script>


    <script>

        function filter_group() {

            $.ajax('{{ route('get_states') }}', {
                type : "GET",
                data : {
                    'group_id' : $('#group_id').val(),
                    'type_of_education_id' : $('#type_of_education_id').val(),
                    'form_of_education_id' : $('#form_of_education_id').val(),
                    'direction_id' : $('#direction_id').val(),
                    'group_course_id' : $('#student_course_id').val(),
                    'group_akademik_year' : $('#group_akademik_year').val(),
                },
                success : function (data, status){
                    // console.log(data);

                    // let objects_language_id = [];

                    // let objects_type_of_education_id = [];

                    // let objects_form_of_education_id = [];

                    // let objects_direction_id = [];

                    // let objects_student_course_id = [];

                    // let group_id =  $('#group_id').val();

                    // let newOption = $("<option selected='selected'></option>").val("TheID").text("The text");

                    // objects_language_id.push({id : '', text: ''})

                    // objects_type_of_education_id.push({id : '', text: ''})

                    // objects_form_of_education_id.push({id : '', text: ''})

                    // objects_direction_id.push({id : '', text: ''})

                    // objects_student_course_id.push({id : '', text: ''})

                    // for (const item of data.group_inf) {

                    //     objects_language_id.push({id : item.language_id, text: item.language_id})

                    //     objects_type_of_education_id.push({id : item.type_of_education_id, text: item.type_of_education_id})

                    //     objects_form_of_education_id.push({id : item.form_of_education_id, text: item.form_of_education_id})

                    //     objects_direction_id.push({id : item.direction_id, text: item.direction_id})

                    //     objects_student_course_id.push({id : item.group_course_id, text: item.group_course_id})

                    // }
                    console.log(data.type);
                    // $('#language_id').empty().select2({
                    //     theme: 'bootstrap4',
                    //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    //     placeholder: "Guruhni tanlang",
                    //     allowClear: Boolean($(this).data('allow-clear')),
                    //     data: objects_language_id,
                    //     disabled : false

                    // });

                    $("#language_id").html(``);

                    $("#type_of_education_id").html(``);

                    $("#form_of_education_id").html(``);

                    $("#direction_id").html(``);

                    // $("#student_course_id").html(``);

                    $("#language_id").append($('<option  value=' + data.language.id+  '  selected="selected"></option>').val(data.language.id).text(data.language.name));

                    $("#type_of_education_id").append($('<option  value=' + data.type.id+  '  selected="selected"></option>').val(data.type.id).text(data.type.name));

                    $("#form_of_education_id").append($('<option  value=' + data.form.id+  '  selected="selected"></option>').val(data.form.id).text(data.form.title));

                    $("#direction_id").append($('<option  value=' + data.direction.id+  '  selected="selected"></option>').val(data.direction.id).text(data.direction.title));

                    // $("#student_course_id").append($('<option  value=' + data.course.id+  '  selected="selected"></option>').val(data.course.id).text(data.course.title));

                    // $('#type_of_education_id').empty().select2({
                    //     theme: 'bootstrap4',
                    //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    //     placeholder: "Guruhni tanlang",
                    //     allowClear: Boolean($(this).data('allow-clear')),
                    //     data: objects_type_of_education_id,
                    //     disabled : false,

                    // });

                    // $('#form_of_education_id').empty().select2({
                    //     theme: 'bootstrap4',
                    //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    //     placeholder: "Guruhni tanlang",
                    //     allowClear: Boolean($(this).data('allow-clear')),
                    //     data: objects_form_of_education_id,
                    //     disabled : false
                    // });

                    // $('#direction_id').empty().select2({
                    //     theme: 'bootstrap4',
                    //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    //     placeholder: "Guruhni tanlang",
                    //     allowClear: Boolean($(this).data('allow-clear')),
                    //     data: objects_direction_id,
                    //     disabled : false
                    // });

                    // $('#student_course_id').empty().select2({
                    //     theme: 'bootstrap4',
                    //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    //     placeholder: "Guruhni tanlang",
                    //     allowClear: Boolean($(this).data('allow-clear')),
                    //     data: objects_student_course_id,
                    //     disabled : false
                    // });


                }
            })
        }

        $('#group_id').on('select2:select', function () {
            filter_group();

        })
        // $('#type_of_education_id').on('select2:select', function () {
        //     filter_group();

        // })
        // $('#form_of_education_id').on('select2:select', function () {
        //     filter_group();

        // })
        // $('#direction_id').on('select2:select', function () {
        //     filter_group();

        // })
        // $('#student_course_id').on('select2:select', function () {
        //     filter_group();

        // })

        // $(document).ready(function(){
        //   $(document).on('change','#student_course_id',function(){
        //     console.log($(this).val());
        //     var id=$(this).val();
        //   });
        // });


           </script>
@endpush
