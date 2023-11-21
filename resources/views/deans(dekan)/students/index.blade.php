@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talabalar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Yo'nalishlar</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('get.directionGroup',$students[0]->direction_id) }}">{{ $direction->title }}</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="javascript:;">{{ $group->title }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="{{ route('student.invoice',[$direction->id,$group->id]) }}" class="btn btn-success w-100">Yuklab olish <i class="bx bx-download"></i></a>
            </div>
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">F.I.O</th>
                        <th scope="col">Hemis</th>
                        <th scope="col">Talaba ID</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->index + 1}}</th>
                            <td>  {{ $student->full_name }}</td>
                            <td>{{ $student->hemis_id ?? 'Bo`sh' }}</td>
                            <td>{{ $student->student_id }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


