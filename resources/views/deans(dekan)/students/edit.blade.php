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
                            <li class="breadcrumb-item active" aria-current="page">Talaba tahrirlash</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post"
                          action="{{ route('students.update',['student' => $student->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
{{--                        <div class="col-md-4">--}}
{{--                            <label for="student_id" class="form-label">Talaba id</label>--}}
{{--                            <input disabled placeholder="Talaba id" value="{{ $student->student_id }}" type="text"--}}
{{--                                   class="form-control @error('student_id') is-invalid @enderror" id="student_id"--}}
{{--                                   name="student_id">--}}
{{--                            @error('student_id')--}}
{{--                                <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        @if($student->hemis_id == null)--}}
{{--                            <div class="col-md-4">--}}
{{--                                <label for="hemis_id" class="form-label">Hemis id</label>--}}

{{--                                <input placeholder="Hemis" type="number"--}}
{{--                                       class="form-control @error('hemis_id') is-invalid @enderror" id="hemis_id"--}}
{{--                                       name="hemis_id">--}}
{{--                                @error('hemis_id')--}}
{{--                                <span class="text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="col-md-4">--}}
{{--                            <label for="full_name" class="form-label">Talaba F.I.O</label>--}}
{{--                            <input value="{{ $student->full_name }}" placeholder="F.I.O" type="text"--}}
{{--                                   class="form-control @error('full_name') is-invalid @enderror" id="full_name"--}}
{{--                                   name="full_name">--}}
{{--                            @error('full_name')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <label for="number_phone" class="form-label">Talaba telefon raqami</label>--}}
{{--                            <input value="{{ $student->number_phone }}" placeholder="+998901234567" type="text"--}}
{{--                                   class="form-control @error('number_phone') is-invalid @enderror" id="phone" name="number_phone">--}}
{{--                            @error('number_phone')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="language_id">Ta'lim tili</label>--}}
{{--                            <select name="language_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="1" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($languages as $language)--}}
{{--                                    @if($student->language_id == $language->id)--}}
{{--                                        <option selected value="{{ $language->id }}">{{ $language->name }}</option>--}}
{{--                                    @elseif($student->language_id != $language->id)--}}
{{--                                        <option value="{{ $language->id }}">{{ $language->name }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('language_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="type_of_education_id">Ta'lim shakli</label>--}}
{{--                            <select name="type_of_education_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="2" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($type_of_educations as $type_of_education)--}}
{{--                                    @if($student->type_of_education_id == $type_of_education->id)--}}
{{--                                        <option selected--}}
{{--                                                value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>--}}
{{--                                    @elseif($student->type_of_education_id != $type_of_education->id)--}}
{{--                                        <option--}}
{{--                                            value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('type_of_education_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="form_of_education_id">Ta'lim turi</label>--}}
{{--                            <select name="form_of_education_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="3" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($form_of_educations as $form_of_education)--}}
{{--                                    @if($student->form_of_education_id == $form_of_education->id)--}}
{{--                                        <option selected--}}
{{--                                                value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>--}}
{{--                                    @elseif($student->form_of_education_id != $form_of_education->id)--}}
{{--                                        <option--}}
{{--                                            value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('form_of_education_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="direction_id">Ta'lim yo'nalishi</label>--}}
{{--                            <select name="direction_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="4" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($directions as $direction)--}}
{{--                                    @if($student->direction_id == $direction->id)--}}
{{--                                        <option selected value="{{ $direction->id }}">{{ $direction->title }}</option>--}}
{{--                                    @elseif($student->direction_id != $direction->id)--}}
{{--                                        <option value="{{ $direction->id }}">{{ $direction->title }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('direction_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="student_course_id">Kursi</label>--}}
{{--                            <select name="student_course_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="5" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($student_courses as $student_course)--}}
{{--                                    @if($student->student_course_id == $student_course->id)--}}
{{--                                        <option selected--}}
{{--                                                value="{{ $student_course->id }}">{{ $student_course->title }}</option>--}}
{{--                                    @elseif($student->student_course_id != $student_course->id)--}}
{{--                                        <option value="{{ $student_course->id }}">{{ $student_course->title }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('student_course_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" id="group_id">Guruh</label>--}}
{{--                            <select name="group_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="6" tabindex="-1" aria-hidden="true">--}}
{{--                                @foreach($dean_groups as $dean_group)--}}
{{--                                    @if($student->group_id == $dean_group->id)--}}
{{--                                        <option selected--}}
{{--                                                value="{{ $dean_group->id }}">{{ $dean_group->title }}</option>--}}
{{--                                    @elseif($student->group_id != $student_course->id)--}}
{{--                                        <option value="{{ $dean_group->id }}">{{ $dean_group->title }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('group_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label">Jinsi</label>--}}
{{--                            <select name="sex_id" id="sex_id" class="single-select select2-hidden-accessible"--}}
{{--                                    data-select2-id="7" tabindex="-1" aria-hidden="true">--}}
{{--                                <option value="">Talaba jinsini tanlang!</option>--}}
{{--                                @foreach($sexes as $sex)--}}
{{--                                    @if($student->sex_id == $sex->id)--}}
{{--                                        <option selected value="{{ $sex->id }}">{{ $sex->title }}</option>--}}
{{--                                    @elseif($student->sex_id != $sex->id)--}}
{{--                                        <option value="{{ $sex->id }}">{{ $sex->title }}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('sex_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" for="contract_price">Kontrakt summasi</label>--}}
{{--                            <input type="number" value="{{ $student->contract_price }}" class="form-control" name="contract_price" id="contract_price">--}}
{{--                            @error('contract_price')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

{{--                        <div class="col-md-4">--}}
{{--                            <label class="form-label" for="img_path">Talaba rasmi</label>--}}
{{--                            <input type="file" class="form-control" name="img_path" id="img_path">--}}
{{--                            @error('img_path')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="col-xl-12">
                            <div class="card border-top border-0 border-4 border-primary">
                                <div class="card-body p-5">
                                    <div class="card-title d-flex align-items-center">
                                        <div>
                                            <img width="32px" height="32px" src="{{ asset('students/images/'.$student->img_path) }}" alt="avatar" style="margin-right: 8px; border-radius: 50px;">
                                        </div>
                                        <h5 class="mb-0 text-primary">{{ $student->full_name }}</h5>
                                    </div>
                                    <hr>
                                    <div class="row g-3">
                                        <input type="hidden" value="{{ $student->id }}" name="user_id[]">
                                        <div class="col-md-6">
                                            <label for="full_name_{{ $student->id }}" class="form-label">F.I.O</label>
                                            <input name="full_name" value="{{ $student->full_name }}" type="text" class="form-control" id="full_name_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="student_id_{{ $student->id }}" class="form-label">Talaba ID</label>
                                            <input name="student_id" value="{{ $student->student_id }}" type="number" class="form-control" id="student_id_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="number_phone_{{ $student->id }}" class="form-label">Telefon raqami</label>
                                            <input name="number_phone" value="{{ $student->number_phone }}" type="text" class="form-control" id="number_phone_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="hemis_id_{{ $student->id }}" class="form-label">Hemis ID</label>
                                            <input name="hemis_id" value="{{ $student->hemis_id }}" type="number" class="form-control" id="hemis_id_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="passport_series_{{ $student->id }}" class="form-label">Passport seriyasi va raqami</label>
                                            <input name="passport_series" value="{{ $student->passport_series }}" type="text" class="form-control" id="passport_series_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="passport_pinfl_{{ $student->id }}" class="form-label">PINFL(JSHSHIR)</label>
                                            <input name="passport_pinfl" value="{{ $student->passport_pinfl }}" type="number" class="form-control" id="passport_pinfl_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="address_{{ $student->id }}" class="form-label">Yashash manzili</label>
                                            <input name="address" value="{{ $student->address }}" type="text" class="form-control" id="address_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="sex_id_{{ $student->id }}" class="form-label">Jinsi</label>
                                            <select name="sex_id" id="sex_id_{{ $student->id }}" class="form-select">
                                                @foreach($sexes as $sex)
                                                    @if($sex->id == $student->sex_id)
                                                        <option selected value="{{ $sex->id }}">{{ $sex->title }}</option>
                                                    @elseif($sex->id != $student->sex_id)
                                                        <option value="{{ $sex->id }}">{{ $sex->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="birthday_{{ $student->id }}" class="form-label">Tug'ilgan yili</label>
                                            <input name="birthday" value="{{ $student->birthday }}" type="date" class="form-control" id="birthday_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="father_fio_{{ $student->id }}" class="form-label">Otasining F.I.O</label>
                                            <input name="father_fio" value="{{ $student->father_fio }}" type="text" class="form-control" id="father_fio_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="mather_fio_{{ $student->id }}" class="form-label">Onasining F.I.O</label>
                                            <input name="mather_fio" value="{{ $student->mather_fio }}" type="text" class="form-control" id="mather_fio_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="father_phone_{{ $student->id }}" class="form-label">Otasining T.R</label>
                                            <input name="father_phone" value="{{ $student->father_phone }}" type="text" class="form-control" id="father_phone_{{ $student->id }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label for="mather_phone_{{ $student->id }}" class="form-label">Onasining T.R</label>
                                            <input name="mather_phone" value="{{ $student->mather_phone }}" type="text" class="form-control" id="mather_phone_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="address_temporarily_{{ $student->id }}" class="form-label">Vaqtincha (y.m)</label>
                                            <input name="address_temporarily" value="{{ $student->address_temporarily }}" type="text" class="form-control" id="address_temporarily_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="deprived_of_parental_{{ $student->id }}" class="form-label">Ota-ona (q.m.bo'lganlar)</label>
                                            <input name="deprived_of_parental" value="{{ $student->deprived_of_parental }}" type="number" class="form-control" id="deprived_of_parental_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="disabled_{{ $student->id }}" class="form-label">Nogironligi</label>
                                            <input name="disabled" value="{{ $student->disabled }}" type="number" class="form-control" id="disabled_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="social_security_{{ $student->id }}" class="form-label">Ijtimoiy (t.m)</label>
                                            <input name="social_security" value="{{ $student->social_security }}" type="number" class="form-control" id="social_security_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="court_{{ $student->id }}" class="form-label">Sudlanganligi</label>
                                            <input name="court" value="{{ $student->court }}" type="number" class="form-control" id="court_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="workplace_{{ $student->id }}" class="form-label">Ish joyi</label>
                                            <input name="workplace" value="{{ $student->workplace }}" type="text" class="form-control" id="workplace_{{ $student->id }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label" id="language_id">Ta'lim tili</label>
                                            <select name="language_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                @foreach($languages as $language)
                                                    @if($student->language_id == $language->id)
                                                        <option selected value="{{ $language->id }}">{{ $language->name }}</option>
                                                    @elseif($student->language_id != $language->id)
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
                                            <select name="type_of_education_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="2" tabindex="-1" aria-hidden="true">
                                                @foreach($type_of_educations as $type_of_education)
                                                    @if($student->type_of_education_id == $type_of_education->id)
                                                        <option selected
                                                                value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                                    @elseif($student->type_of_education_id != $type_of_education->id)
                                                        <option
                                                            value="{{ $type_of_education->id }}">{{ $type_of_education->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('type_of_education_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" id="form_of_education_id">Ta'lim turi</label>
                                            <select name="form_of_education_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                @foreach($form_of_educations as $form_of_education)
                                                    @if($student->form_of_education_id == $form_of_education->id)
                                                        <option selected
                                                                value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>
                                                    @elseif($student->form_of_education_id != $form_of_education->id)
                                                        <option
                                                            value="{{ $form_of_education->id }}">{{ $form_of_education->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('form_of_education_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" id="direction_id">Ta'lim yo'nalishi</label>
                                            <select name="direction_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="4" tabindex="-1" aria-hidden="true">
                                                @foreach($directions as $direction)
                                                    @if($student->direction_id == $direction->id)
                                                        <option selected value="{{ $direction->id }}">{{ $direction->title }}</option>
                                                    @elseif($student->direction_id != $direction->id)
                                                        <option value="{{ $direction->id }}">{{ $direction->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('direction_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" id="student_course_id">Kursi</label>
                                            <select name="student_course_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="5" tabindex="-1" aria-hidden="true">
                                                @foreach($student_courses as $student_course)
                                                    @if($student->student_course_id == $student_course->id)
                                                        <option selected
                                                                value="{{ $student_course->id }}">{{ $student_course->title }}</option>
                                                    @elseif($student->student_course_id != $student_course->id)
                                                        <option value="{{ $student_course->id }}">{{ $student_course->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('student_course_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label" id="group_id">Guruh</label>
                                            <select name="group_id" class="single-select select2-hidden-accessible"
                                                    data-select2-id="6" tabindex="-1" aria-hidden="true">
                                                @foreach($dean_groups as $dean_group)
                                                    @if($student->group_id == $dean_group->id)
                                                        <option selected
                                                                value="{{ $dean_group->id }}">{{ $dean_group->title }}</option>
                                                    @elseif($student->group_id != $student_course->id)
                                                        <option value="{{ $dean_group->id }}">{{ $dean_group->title }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('group_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="img_path_{{ $student->id }}" class="form-label">Rasmi</label>
                                            <input name="img_path" type="file" class="form-control" id="img_path_{{ $student->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img width="64px" height="64px" src="{{ asset('students/images/'.$student->img_path) }}" alt="">
                        </div>

                        <div class="col-6" style="text-align: right">
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
@endpush
