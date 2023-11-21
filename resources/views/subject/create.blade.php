@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Fanlar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi fanlar</li>
                    </ol>
                </nav>
            </div>
        </div>
      
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Fanlar qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        @isset($subject_edit)
                        <form class="row g-3" method="post" action="{{ route('subject.update',['subject'=>$subject_edit->id]) }}">
                            @csrf
                            @method('PUT')
                        @else
                            <form class="row g-3" method="post" action="{{ route('subject.store') }}">
                                @csrf
                        @endisset
                      
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                           
                            @isset($subject_edit)
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Ism</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$subject_edit->name }}">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">O'zgartirish</button>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <label for="name" class="form-label">Ism</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Saqlash</button>
                                </div>
                            @endisset
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>


@endsection
