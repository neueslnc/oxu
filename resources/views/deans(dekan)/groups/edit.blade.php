@extends('template')
@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Guruhlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Guruhlar tahrirlash</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post" action="{{ route('groups.update',$group) }}">
                        @csrf
                        @method('PUT')
                        <div class="col-md-12">
                            <label for="title" class="form-label">First name</label>
                            <input placeholder="Guruh nomi" value="{{ $group->title }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                            <br>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="language_id">Ta'lim tili</label>
                            <select name="language_id" class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim tilini tanlang!</option>
                                @foreach($languages as $language)
                                    @if ($language->id==$group->language_id)
                                        <option selected value="{{ $language->id }}">{{ $language->name }}</option>
                                    @elseif ($language->id !=$group->language_id)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('language_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="type_of_education_id">Ta'lim shakli</label>
                            <select name="type_of_education_id" class="single-select select2-hidden-accessible" data-select2-id="2" tabindex="-1" aria-hidden="true">
                                <option value="">Ta'lim shaklini tanlang!</option>
                                @foreach($type_of_educations as $type_of_education)
                                    @if ($type_of_education->id==$group->type_of_education_id)
                                        <option selected value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                    @elseif ($type_of_education->id !=$group->type_of_education_id)
                                        <option value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                    @endif
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
                                    @if ($form_of_education->id==$group->form_of_education_id)
                                        <option selected value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>
                                    @elseif ($form_of_education->id !=$group->form_of_education_id)
                                        <option value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('form_of_education_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" >Ta'lim yo'nalishi</label>
                            <select name="direction_id" id="direction_id" class="single-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
{{--                                <option value="">Ta'lim yo'nalishini tanlang!</option>--}}
                                <option selected value="{{ $group->direction_id }}">{{ $group->get_direction_id->title }}</option>
                            </select>
                            @error('direction_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="group_course_id">Kursi</label>
                            <select name="group_course_id" class="single-select select2-hidden-accessible" data-select2-id="5" tabindex="-1" aria-hidden="true">
                                <option value="">Talaba kursini tanlang!</option>
                                @foreach($student_courses as $student_course)
                                    @if ($student_course->id==$group->group_course_id)
                                        <option selected value="{{ $student_course->id }}">{{ $student_course->title }}</option>
                                    @elseif ($student_course->id !=$group->group_course_id)
                                        <option value="{{ $student_course->id }}">{{ $student_course->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('group_course_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        {{-- @dd($user) --}}
                        <input type="hidden" name="user" id="user" value="{{$user}}">
{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="group_akademik_year">Yili</label>--}}
{{--                            <select name="group_akademik_year" class="single-select select2-hidden-accessible" data-select2-id="6" tabindex="-1" aria-hidden="true">--}}
{{--                                <option value="">Akademik yil tanlang!</option>--}}
{{--                                @foreach($akademik_years as $akademik_year)--}}
{{--                                    <option value="{{ $akademik_year->id }}"--}}
{{--                                    @if ($akademik_year->id==$group->group_akademik_year)--}}
{{--                                        selected--}}
{{--                                    @endif>{{ $akademik_year->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('group_akademik_year')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
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
    <script>

        $("#student_group_id").on("select2:select", function (e) {
            console.log('asd');
        })
    </script>
<script>

    function filter_group() {

          $.ajax('{{ route('get_type') }}', {
              type : "GET",
              data : {
                  'form_of_education_id' : $('#form_of_education_id').val(),
                  'user' : $('#user').val(),

              },
              success : function (data, status){
                  console.log(data);


                  let format_data = []


                  for (const iterator of data.direction) {
                      format_data.push({
                          id : iterator.id,
                          text : `${iterator.code} ${iterator.title}`,
                      })
                  }



              //     $("#language_id").html(``);


                  $('#direction_id').empty().select2({
                      theme: 'bootstrap4',
                      width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                      placeholder: "Guruhni tanlang",
                      allowClear: Boolean($(this).data('allow-clear')),
                      data: format_data,
                      disabled : false,
                  });
             }
          })};


      $('#form_of_education_id').on('select2:select', function () {
          filter_group();
      });



</script>
@endpush
