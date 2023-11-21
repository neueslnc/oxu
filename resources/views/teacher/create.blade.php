@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">O'qituvchilar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi o'qituvchilar</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- @dd($teacher_edits) --}}
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">O'qituvchilar qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        @isset($teacher_edits)
                            <form class="row g-3" method="post" action="{{ route('teacher.update',['teacher'=>$teacher_edits->id]) }}">
                                @csrf
                                @method('PUT')
                        @else
                            <form class="row g-3" method="post" action="{{ route('teacher.store') }}">
                                @csrf
                        @endisset
                       
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                
                                    </div>
                                @endforeach
                            </div>
                           
                            @isset($teacher_edits)
                            
                                <div class="col-md-12">
                                    <label for="full_name" class="form-label">Ism</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name" value="{{ $teacher_edits->full_name }}">
                                </div>
                            @else
                                <div class="col-md-12">
                                    <label for="full_name" class="form-label">Ism</label>
                                    <input type="text" name="full_name" class="form-control" id="full_name">
                                </div>
                            @endisset
                            
                            <div class="col-md-12">
                                <label class="form-label">Fanlar</label>
                                <select name="subjects[]" class="multiple-select" data-placeholder="Выберите предмет" multiple="multiple">
                               
                                    @isset($teacher_edits)
                             
                                        @foreach ($subjects as $subject)
                                           
                                                <option value="{{ $subject->id }}" 
                                                    @foreach ($subject_selecteds as $subject_selected) 
                                                    @if ($subject_selected->subject_id==$subject->id)
                                                    selected
                                                    @endif
                                                @endforeach>{{ $subject->name }}</option>
                                           
                                         @endforeach
                                    @else
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                           
                            @isset($teacher_edits)
                            
                            <div class="col-md-12">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" class="form-control" id="login" value="{{ $teacher_edits->login }}">
                            </div>
                            @else
                            <div class="col-md-12">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" class="form-control" id="login">
                            </div>
                            @endisset
                            <div class="col-md-12">
                                <label for="password" class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="col-md-12">
                                <label for="password_confirmation" class="form-label">Parolni qayta kiriting</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>


@endsection

@push('scripte_include_end_body')

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>

        $('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});

    </script>

@endpush