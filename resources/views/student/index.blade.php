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
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Talabalar ro'yxati</h6>
            <div class="ms-auto">
                <a href="{{ route('student.create') }}" class="btn btn-primary px-5">Yaratish</a>
            </div>
        </div>
        <hr>
        <div class="card radius-10">
                 <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nomi</th>
                                    <th>Login</th>
                                    <th>HEMIS ID</th>
                                    <th>Guruhlar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $item)
                                    <tr>
                                        <td>
                                            {{ $item['full_name'] }}
                                        </td>
                                        <td>
                                            {{ $item['login'] }}
                                        </td>
                                        <td>
                                            {{ $item['student_id'] }}
                                        </td>
                                        <td>
                                            {{ $item->group->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>
    
@endsection