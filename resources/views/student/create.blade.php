@extends('template')

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
                        <li class="breadcrumb-item active" aria-current="page">Yangi talabalar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Talabalar formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('student.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <label for="full_name" class="form-label">F.I.O</label>
                                <input type="text" name="full_name" class="form-control" id="full_name">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Guruhlar</label>
                                <select name="group_id" class="form-control" data-placeholder="Выберите предмет">
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="student_id" class="form-label">TABALA ID</label>
                                <input type="text" name="student_id" class="form-control" id="student_id">
                            </div>
                            <div class="col-md-12">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" class="form-control" id="login">
                            </div>
                            <div class="col-md-12">
                                <label for="password" class="form-label">Parol</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="col-md-12">
                                <label for="password_confirmation" class="form-label">Parolni qayta kiriting</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                            <div class="col-md-12">
                                <label for="image" class="form-label">Rasm</label>
                                <input type="file" name="image" class="form-control" id="image">
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
