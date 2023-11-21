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
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">O'qituvchilar bazasi</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('teacher.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi o'qituvchilar</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">FIO</th>
                                    <th class="fixed_header2 align-middle">Fanlar</th>
                                    <th class="fixed_header2 align-middle">O'zgartirish</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($teachers as $i => $teacher)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $teacher->full_name }}
                                        </td>
                                        <td>
                                            @foreach ($teacher->subjects as $subjects)
                                                {{ $subjects->subject->name }},
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('teacher.edit',['teacher'=>$teacher->id]) }}" class="btn btn-warning px-3"></i>O'zgartirish</a>
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
