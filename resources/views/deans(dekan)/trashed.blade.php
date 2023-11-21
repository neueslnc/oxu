@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talabalar</div>
                <div class="ps-3">
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb mb-0 p-0">--}}
{{--                            <li class="breadcrumb-item">--}}
{{--                                <a href="{{ route('get.formOfEducation') }}">--}}
{{--                                    @if($type == 1)--}}
{{--                                        Bakalavr(Kunduzgi)--}}
{{--                                    @elseif($type == 2)--}}
{{--                                        Bakalavr(Sirtqi)--}}
{{--                                    @elseif($type == 3)--}}
{{--                                        Magistratura--}}
{{--                                    @elseif($type == 4)--}}
{{--                                        Bakalavr(Kechki)--}}
{{--                                    @endif--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            --}}{{--                            <li class="breadcrumb-item"><a href="{{ route('get.student',$direction->form_of_education_id) }}">Yo'nalishlar</a></li>--}}
{{--                            <li class="breadcrumb-item"><a--}}
{{--                                    href="{{ route('get.directionGroupSeparately',[$direction->id,$type]) }}">{{ $direction->title }}</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item" aria-current="page">--}}
{{--                                <a href="{{ route('get.get_direction_with_course',[$direction->id,$course,$type]) }}">{{ $course }} - kurs</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb-item" aria-current="page">--}}
{{--                                <a href="javascript:;">{{ $groupp->title }}</a>--}}
{{--                            </li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <div>
                    <div class="modal fade" id="student_info" tabindex="-1"
                         style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 95%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr>
                                                <th style="font-size: 12px" scope="col">F.I.O</th>
                                                <th style="font-size: 12px" scope="col">Talaba ID</th>
                                                <th style="font-size: 12px" scope="col">Telefon raqami</th>
                                                <th style="font-size: 12px" scope="col">Hemis ID</th>
                                                <th style="font-size: 12px" scope="col">Passport</th>
                                                <th style="font-size: 12px" scope="col">PINFL</th>
                                                <th style="font-size: 12px" scope="col">Jinsi</th>
                                                <th style="font-size: 12px" scope="col">Tug'ilgan yili</th>
                                                <th style="font-size: 12px" scope="col">Otasining F.I.O</th>
                                                <th style="font-size: 12px" scope="col">Onasining F.I.O</th>
                                                <th style="font-size: 12px" scope="col">Otasining T.R</th>
                                                <th style="font-size: 12px" scope="col">Onasining T.R</th>
                                                <th style="font-size: 12px" scope="col">Yashash manzili</th>
                                                <th style="font-size: 12px" scope="col">Vaqtincha yashash manzili</th>
                                                <th style="font-size: 12px" scope="col">Ota-ona qaramog'idan maxrum bo'lganlar</th>
                                                <th style="font-size: 12px" scope="col">Nogironligi</th>
                                                <th style="font-size: 12px" scope="col">Ijtimoiy ta'minotga muxtoj</th>
                                                <th style="font-size: 12px" scope="col">Sudlanganligi</th>
                                                <th style="font-size: 12px" scope="col">Ish joyi</th>
                                                <th style="font-size: 12px" scope="col">Rasmi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($students as $key => $student)
                                                <tr>
                                                    <th style="font-size: 12px">{{ $student->full_name }}</th>
                                                    <td style="font-size: 12px">{{ $student->student_id ? $student->student_id : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->number_phone ? $student->number_phone : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->hemis_id ? $student->hemis_id : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->passport_series ? $student->passport_series : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->passport_pinfl ? $student->passport_pinfl : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->sex ? $student->sex->title : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->birthday ? $student->birthday : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->father_fio ? $student->father_fio : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->mather_fio ? $student->mather_fio : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->father_phone ? $student->father_phone : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->mather_phone ? $student->mather_phone : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->address ? $student->address : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->address_temporarily ? $student->address_temporarily : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->deprived_of_parental ? $student->deprived_of_parental : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->disabled ? $student->disabled : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->social_security ? $student->social_security : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->court ? $student->court : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px">{{ $student->workplace ? $student->workplace : "Bo'sh" }}</td>
                                                    <td style="font-size: 12px"><img style="width: 48px;height: 48px; border-radius: 50px" src="{{ asset('students/images/'.$student->img_path) }}" alt="rasm"></td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Yopish
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table mb-4 table-striped">
                    <thead>
                    <tr>
                        <th style="font-size: 11px" scope="col">#</th>
                        <th style="font-size: 11px" scope="col"><a class="d-flex align-items-center justify-content-between" href="">F.I.O <i style="font-size: 17px; color: #008cff!important;" class="fadeIn animated bx bx-sort"></i></a></th>
                        <th style="font-size: 11px" scope="col">ID</th>
                        <th style="font-size: 11px" scope="col">Hemis ID</th>
                        <th style="font-size: 11px" scope="col">Telefon</th>
                        <th style="font-size: 11px" scope="col">Passport</th>
                        <th style="font-size: 11px" scope="col">Yo'nalishi</th>
                        <th style="font-size: 11px" scope="col">Kursi</th>
                        <th style="font-size: 11px" scope="col">Transfer ma'lumotlari</th>
                        {{--                        <th style="font-size: 11px" scope="col">Rasm</th>--}}
                        <th style="font-size: 11px" scope="col">Holat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <div class="modal fade" id="info_{{ $student->id }}" tabindex="-1"
                                 style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" style="max-width: 70%">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $student->full_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
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
                                                                    <input disabled value="{{ $student->full_name }}" type="text" class="form-control" id="full_name_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="student_id_{{ $student->id }}" class="form-label">Talaba ID</label>
                                                                    <input disabled value="{{ $student->student_id }}" type="number" class="form-control" id="student_id_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="number_phone_{{ $student->id }}" class="form-label">Telefon raqami</label>
                                                                    <input disabled value="{{ $student->number_phone }}" type="text" class="form-control" id="number_phone_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <label for="hemis_id_{{ $student->id }}" class="form-label">Hemis ID</label>
                                                                    <input disabled value="{{ $student->hemis_id }}" type="number" class="form-control" id="hemis_id_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="passport_series_{{ $student->id }}" class="form-label">Passport seriyasi va raqami</label>
                                                                    <input disabled value="{{ $student->passport_series }}" type="text" class="form-control" id="passport_series_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="passport_pinfl_{{ $student->id }}" class="form-label">PINFL(JSHSHIR)</label>
                                                                    <input disabled value="{{ $student->passport_pinfl }}" type="number" class="form-control" id="passport_pinfl_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <label for="address_{{ $student->id }}" class="form-label">Yashash manzili</label>
                                                                    <input disabled value="{{ $student->address }}" type="text" class="form-control" id="address_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="sex_id_{{ $student->id }}" class="form-label">Jinsi</label>
                                                                    <input disabled type="text" class="form-control" value="{{ $student->sex->title ?? '' }}" id="sex_id_{{$student->id}}">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="birthday_{{ $student->id }}" class="form-label">Tug'ilgan yili</label>
                                                                    <input disabled value="{{ $student->birthday }}" type="date" class="form-control" id="birthday_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="father_fio_{{ $student->id }}" class="form-label">Otasining F.I.O</label>
                                                                    <input disabled value="{{ $student->father_fio }}" type="text" class="form-control" id="father_fio_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="mather_fio_{{ $student->id }}" class="form-label">Onasining F.I.O</label>
                                                                    <input disabled value="{{ $student->mather_fio }}" type="text" class="form-control" id="mather_fio_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="father_phone_{{ $student->id }}" class="form-label">Otasining T.R</label>
                                                                    <input disabled value="{{ $student->father_phone }}" type="text" class="form-control" id="father_phone_{{ $student->id }}">
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <label for="mather_phone_{{ $student->id }}" class="form-label">Onasining T.R</label>
                                                                    <input disabled value="{{ $student->mather_phone }}" type="text" class="form-control" id="mather_phone_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="address_temporarily_{{ $student->id }}" class="form-label">Vaqtincha (y.m)</label>
                                                                    <input disabled value="{{ $student->address_temporarily }}" type="text" class="form-control" id="address_temporarily_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="deprived_of_parental_{{ $student->id }}" class="form-label">Ota-ona (q.m.bo'lganlar)</label>
                                                                    <input disabled value="{{ $student->deprived_of_parental }}" type="number" class="form-control" id="deprived_of_parental_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="disabled_{{ $student->id }}" class="form-label">Nogironligi</label>
                                                                    <input disabled value="{{ $student->disabled }}" type="number" class="form-control" id="disabled_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="social_security_{{ $student->id }}" class="form-label">Ijtimoiy (t.m)</label>
                                                                    <input disabled value="{{ $student->social_security }}" type="number" class="form-control" id="social_security_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="court_{{ $student->id }}" class="form-label">Sudlanganligi</label>
                                                                    <input disabled value="{{ $student->court }}" type="number" class="form-control" id="court_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="workplace_{{ $student->id }}" class="form-label">Ish joyi</label>
                                                                    <input disabled value="{{ $student->workplace }}" type="text" class="form-control" id="workplace_{{ $student->id }}">
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <label for="img_path_{{ $student->id }}" class="form-label">Rasmi</label><br>
                                                                    <img style="width: 48px; height: 48px;" src="{{ asset('students/images/'.$student->img_path) }}" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                Yopish
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <th style="font-size: 12px" scope="row">{{ $loop->index + 1}}</th>
                            <td style="font-size: 12px" data-bs-toggle="modal"
                                data-bs-target="#info_{{ $student->id }}">{{ $student->full_name }}</td>
                            <td style="font-size: 12px">{{ $student->student_id }}</td>
                            <td style="font-size: 12px">{{ $student->hemis_id }}</td>
                            <td style="font-size: 12px">{{ $student->number_phone }}</td>
                            <td style="font-size: 12px">{{ $student->passport_series.$student->passport_number }}</td>
                            <td style="font-size: 12px">{{ $student->direction->title }}</td>
                            <td style="font-size: 12px">{{ $student->student_course ? $student->student_course->title : $student->old_course }}</td>
                            <td style="font-size: 12px">{{ $student->excel_transfer_group }}</td>
                            <td style="font-size: 12px; margin-bottom: -1px;" class="d-flex align-items-center justify-content-between">
                                <form action="{{ route('studentRestore', $student) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn-sm border-0 btn-success confirm-button"
                                            style="border-radius: 5px"><i class="bx bx-undo"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                <br>--}}
{{--                <hr>--}}
{{--                <h6 class="mb-0 text-uppercase text-center">Transferlar</h6>--}}
{{--                <hr>--}}
{{--                <br>--}}
{{--                <table class="table mb-4 table-striped">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">#</th>--}}
{{--                        <th scope="col">F.I.O</th>--}}
{{--                        <th scope="col">ID</th>--}}
{{--                        <th scope="col">Telefon</th>--}}
{{--                        <th scope="col">Oldingi guruhi</th>--}}
{{--                        <th scope="col">Hozirgi guruhi</th>--}}
{{--                        <th scope="col">Sanasi</th>--}}
{{--                        <th scope="col">Holati</th>--}}
{{--                        --}}{{--                        <th scope="col">Rasmi</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($exit_student as $transfer)--}}
{{--                        @if($transfer->status == 1)--}}
{{--                            <div class="modal fade" id="student_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu yo'nalishdan</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu yo'nalishga ko`chirildi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="transfer_direction_id" class="form-control" value="{{ $transfer->transfer_direction ? $transfer->transfer_direction->title : '' }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu guruhdan</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu guruhga ko'chirildi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->transfer_group ? $transfer->transfer_group->title : '' }}">--}}
{{--                                                            <input type="hidden" name="transfer_group_id" value="{{ $transfer->transfer_group_id }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Talaba muvaffaqiyatli ko'chirildi.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row"><i style="font-size: 19px" class="bx bx-chevron-left-circle text-danger"></i></th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td>{{ $transfer->transfer_group->title }}</td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-success">Perevod bo'lgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 2)--}}
{{--                            <div class="modal fade" id="student_change_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Talabalar safidan chiqorilgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_change_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-dark">Talabalar safidan chiqorilgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 3)--}}
{{--                            <div class="modal fade" id="student_academic_leave_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Akademik ta'til olgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_academic_leave_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-warning">Akademik ta'til olgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 4)--}}
{{--                            <div class="modal fade" id="student_hayfsan_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Hayfsan berilgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_hayfsan_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-info">Hayfsan berilgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 5)--}}
{{--                            <div class="modal fade" id="student_otm_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Boshqa otmga ko'chgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_otm_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-gradient-bloody">Boshqa otmga ko'chgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 6)--}}
{{--                            <div class="modal fade" id="student_tiklash_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->desc }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Tiklagan sana</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->academic_year }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>O'qishni tiklagan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_tiklash_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-gradient-blues">O'qishi tiklangan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                    @foreach($transfer_student as $transfer)--}}
{{--                        @if($transfer->status == 1)--}}
{{--                            <div class="modal fade" id="student_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu yo'nalishdan</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu yo'nalishga ko`chirildi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="transfer_direction_id" class="form-control" value="{{ $transfer->transfer_direction ? $transfer->transfer_direction->title : '' }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu guruhdan</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Ushbu guruhga ko'chirildi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->transfer_group ? $transfer->transfer_group->title : '' }}">--}}
{{--                                                            <input type="hidden" name="transfer_group_id" value="{{ $transfer->transfer_group_id }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Talaba muvaffaqiyatli ko'chib keldi.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row"><i style="font-size: 19px" class="bx bx-chevron-right-circle text-success"></i></th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td>{{ $transfer->transfer_group->title }}</td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-success">Perevod bo'lgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 2)--}}
{{--                            <div class="modal fade" id="student_change_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Talabalar safidan chiqorilgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_change_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-dark">Talabalar safidan chiqorilgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 3)--}}
{{--                            <div class="modal fade" id="student_academic_leave_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Akademik ta'til olgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_academic_leave_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-warning">Akademik ta'til olgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 4)--}}
{{--                            <div class="modal fade" id="student_hayfsan_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Hayfsan berilgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_hayfsan_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-info">Hayfsan berilgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 5)--}}
{{--                            <div class="modal fade" id="student_otm_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <textarea type="text" disabled id="exit_group_id" class="form-control">{{ $transfer->desc }}</textarea>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>Boshqa otmga ko'chgan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_otm_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-gradient-bloody">Boshqa otmga ko'chgan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @elseif($transfer->status == 6)--}}
{{--                            <div class="modal fade" id="student_tiklash_{{$transfer->id}}" tabindex="-1"--}}
{{--                                 style="display: none;" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title">{{$transfer->student->full_name}}</h5>--}}
{{--                                            <button type="button" class="btn-close" data-bs-dismiss="modal"--}}
{{--                                                    aria-label="Close"></button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Telefon raqami</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" id="number_phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Yo'nalishi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_direction_id" class="form-control" value="{{ $transfer->exit_direction->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Guruhi</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Izoh</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->desc }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Tiklagan sana</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-secondary">--}}
{{--                                                            <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->academic_year }}">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="row mb-3">--}}
{{--                                                        <div class="col-sm-3">--}}
{{--                                                            <h6 class="mb-0">Holati</h6>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-sm-9 text-success">--}}
{{--                                                            <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">--}}
{{--                                                                <div class="d-flex align-items-center">--}}
{{--                                                                    <div class="font-35 text-success"><i class="bx bx-info-circle"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="ms-3">--}}
{{--                                                                        <h6 class="mb-0 text-success">Holati</h6>--}}
{{--                                                                        <div>O'qishni tiklagan.</div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    @if($transfer->file != null)--}}
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Fayl</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <div class="d-flex align-items-center mt-3">--}}
{{--                                                                    <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="flex-grow-1 ms-2">--}}
{{--                                                                        <h6 class="mb-0">{{ $transfer->file }}</h6>--}}
{{--                                                                        <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>--}}
{{--                                                                    </div>--}}
{{--                                                                    <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">--}}
{{--                                                                        <i class="bx bxs-download"></i>--}}
{{--                                                                    </a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">--}}
{{--                                                Yopish--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{ $loop->index + 1}}</th>--}}
{{--                                <td data-bs-toggle="modal" data-bs-target="#student_tiklash_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>--}}
{{--                                <td>{{ $transfer->student->student_id }}</td>--}}
{{--                                <td>{{ $transfer->number_phone }}</td>--}}
{{--                                <td>{{ $transfer->exit_group->title }}</td>--}}
{{--                                <td></td>--}}
{{--                                <td>{{ $transfer->date }}</td>--}}
{{--                                <td><span class="badge bg-gradient-blues">O'qishi tiklangan</span></td>--}}
{{--                                --}}{{--                                    <td><img style="width: 32px; height: 32px; border-radius: 50px;" src="{{ asset('students/images/'.$transfer->student->img_path) }}" alt=""></td>--}}
{{--                            </tr>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--                <br>--}}
{{--                <hr>--}}
            </div>
        </div>
    </div>
@endsection
