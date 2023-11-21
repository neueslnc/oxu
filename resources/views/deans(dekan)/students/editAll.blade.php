@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talabalar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a
                                    href="{{ route('get.directionGroupSeparately',[$students[0]->direction_id,$type]) }}">{{ $direction->title }}</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="javascript:;">{{ $groupp->title }}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @error('passport_pinfl.*')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
        <form action="{{ route('update.allStudent') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="direction_id" value="{{$direction->id}}">
            <input type="hidden" name="group_id" value="{{$groupp->id}}">
            <div class="row">
                @csrf
                @foreach($students as $key => $student)
                    <div class="col-xl-6">
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
                                    <input name="full_name[]" value="{{ $student->full_name }}" type="text" class="form-control" id="full_name_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="student_id_{{ $student->id }}" class="form-label">Talaba ID</label>
                                    <input name="student_id[]" value="{{ $student->student_id }}" type="number" class="form-control" id="student_id_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="number_phone_{{ $student->id }}" class="form-label">Telefon raqami</label>
                                    <input name="number_phone[]" value="{{ $student->number_phone }}" type="text" class="form-control" id="number_phone_{{ $student->id }}">
                                </div>
                                <div class="col-md-5">
                                    <label for="hemis_id_{{ $student->id }}" class="form-label">Hemis ID</label>
                                    <input name="hemis_id[]" value="{{ $student->hemis_id }}" type="number" class="form-control" id="hemis_id_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="passport_series_{{ $student->id }}" class="form-label">Passport seriyasi va raqami</label>
                                    <input name="passport_series[]" value="{{ $student->passport_series }}" type="text" class="form-control" id="passport_series_{{ $student->id }}">
                                </div>
                                <div class="col-md-5">
                                    <label for="passport_pinfl_{{ $student->id }}" class="form-label">PINFL(JSHSHIR)</label>
                                    <input name="passport_pinfl[]" value="{{ $student->passport_pinfl }}" type="number" class="form-control" id="passport_pinfl_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="sex_id_{{ $student->id }}" class="form-label">Jinsi</label>
                                    <select name="sex_id[]" id="sex_id_{{ $student->id }}" class="form-select">
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
                                    <input name="birthday[]" value="{{ $student->birthday }}" type="date" class="form-control" id="birthday_{{ $student->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="father_fio_{{ $student->id }}" class="form-label">Otasining F.I.O</label>
                                    <input name="father_fio[]" value="{{ $student->father_fio }}" type="text" class="form-control" id="father_fio_{{ $student->id }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="mather_fio_{{ $student->id }}" class="form-label">Onasining F.I.O</label>
                                    <input name="mather_fio[]" value="{{ $student->mather_fio }}" type="text" class="form-control" id="mather_fio_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="father_phone_{{ $student->id }}" class="form-label">Otasining T.R</label>
                                    <input name="father_phone[]" value="{{ $student->father_phone }}" type="text" class="form-control" id="father_phone_{{ $student->id }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="mather_phone_{{ $student->id }}" class="form-label">Onasining T.R</label>
                                    <input name="mather_phone[]" value="{{ $student->mather_phone }}" type="text" class="form-control" id="mather_phone_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="address_{{ $student->id }}" class="form-label">Yashash manzili</label>
                                    <input name="address[]" value="{{ $student->address }}" type="text" class="form-control" id="address_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="address_temporarily_{{ $student->id }}" class="form-label">Vaqtincha (y.m)</label>
                                    <input name="address_temporarily[]" value="{{ $student->address_temporarily }}" type="text" class="form-control" id="address_temporarily_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="deprived_of_parental_{{ $student->id }}" class="form-label">Ota-ona (q.m.bo'lganlar)</label>
                                    <input name="deprived_of_parental[]" value="{{ $student->deprived_of_parental }}" type="number" class="form-control" id="deprived_of_parental_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="disabled_{{ $student->id }}" class="form-label">Nogironligi</label>
                                    <input name="disabled[]" value="{{ $student->disabled }}" type="number" class="form-control" id="disabled_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="social_security_{{ $student->id }}" class="form-label">Ijtimoiy (t.m)</label>
                                    <input name="social_security[]" value="{{ $student->social_security }}" type="number" class="form-control" id="social_security_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="court_{{ $student->id }}" class="form-label">Sudlanganligi</label>
                                    <input name="court[]" value="{{ $student->court }}" type="number" class="form-control" id="court_{{ $student->id }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="workplace_{{ $student->id }}" class="form-label">Ish joyi</label>
                                    <input name="workplace[]" value="{{ $student->workplace }}" type="text" class="form-control" id="workplace_{{ $student->id }}">
                                </div>
                                <div class="col-md-9">
                                    <label for="img_path_{{ $student->id }}" class="form-label">Rasmi</label>
                                    <input name="img_path[]" value="{{ $student->img_path }}" type="file" class="form-control" id="img_path_{{ $student->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-footer" style="text-align: right">
                    <button type="submit" class="btn btn-success">Saqlash</button>
                </div>
            </div>

        </form>
    </div>
@endsection



