@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Talabalar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <a href="{{ route('students.create') }}" class="btn btn-sm btn-success"><i class="bx bx-plus-circle"></i>Talaba yaratish</a>
                <input type="search" name="search" class="form-control form-control-sm w-50" placeholder="Ism, Passport, Talaba ID">
            </div>
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">F.I.O</th>
                        <th scope="col">Passport raqami <br>PINFL</th>
                        <th scope="col">Ta'lim turi</th>
                        <th scope="col">Ta'lim yo'nalishi</th>
                        <th scope="col">Guruhi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <th data-bs-toggle="modal"
                                data-bs-target="#student_{{ $student->id }}" scope="row">{{ ($students->currentpage()-1)*$students->perpage() + ($loop->index + 1)}}</th>
                            <div class="modal fade" id="student_{{ $student->id }}" tabindex="-1"
                                 style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $student->full_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if($student->transfer)
                                            <div class="d-flex align-items-center mt-3">
                                                <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-0">{{ $student->transfer->file }}</h6>
                                                    <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$student->transfer->file)) / pow(1024,2)) }} MB</p>
                                                </div>
                                                <a href="{{ route('student.downloadFile',$student->transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">
                                                    <i class="bx bxs-download"></i>
                                                </a>
                                            </div>
                                            @else
                                                <div class="alert alert-warning">Fayllar mavjud emas!</div>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary">
                                                Yopish
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td scope="row">{{ $student->full_name  }}</td>
                            <td scope="row">
                                {{ strtoupper($student->passport_series).' '.$student->passport_number }}<br>
                                {{ $student->passport_pinfl }}
                            </td>
                            <td scope="row">{{ $student->form_of_education->title }}</td>
                            <td scope="row">{{ $student->direction->title }}</td>
                            <td scope="row">{{ $student->group->title }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection
@push('scripte_include_end_body')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true
            }

            toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}","Talaba!",{timeOut:6000})
        </script>
    @endif
@endpush



