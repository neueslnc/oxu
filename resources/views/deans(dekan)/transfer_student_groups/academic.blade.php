@extends('template')
@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Akademik ta'til</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Akademik ta'til olganlar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-header d-flex align-items-center justify-content-end">
                <input type="search" name="search" class="form-control w-25" placeholder="Sana, guruh...">
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-end">
                    {{ $transfers->links() }}
                </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Rasm</th>
                                <th>F.I.O</th>
                                <th>Mutaxassislik</th>
                                <th>Guruhi</th>
                                <th>Sana</th>
                                <th>Holati</th>
                                <th>Tiklash</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transfers as $transfer)
                                <tr>
                                    <td>{{ ($transfers->currentpage()-1)*$transfers->perpage() + ($loop->index + 1)}}</td>
                                    <td><img width="43px" height="43px" src="{{ asset('students/images/'.$transfer->student->img_path) }}" class="avatar"
                                             alt="product img"></td>
                                    @if($transfer->file == null)
                                        <td class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#student_show_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>
                                    @else
                                        <td class="text-success" data-bs-toggle="modal"
                                            data-bs-target="#student_show_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>
                                    @endif
                                    <td>{{ $transfer->exit_direction->title }}</td>
                                    <td>{{ $transfer->exit_group->title }}</td>
                                    <td>{{ $transfer->date }}</td>
                                    <td>
                                        <span class="badge bg-warning text-white shadow-sm w-100">Akademik ta'til olgan.</span>
                                    </td>
                                    <td data-bs-toggle="modal"
                                        data-bs-target="#student_tiklash_{{$transfer->id}}">
                                        <span role="button" class="badge bg-success">O'qishni tiklash <i class="bx bx-check"></i></span>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="student_show_{{$transfer->id}}" tabindex="-1"
                                     style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$transfer->student->full_name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Telefon raqami</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" id="phone" disabled class="form-control" value="{{ $transfer->student->number_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Yo'nalishi</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_direction->title }}">
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Guruhi</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary">
                                                                <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->exit_group->title }}">
                                                                <input type="hidden" name="transfer_group_id" value="{{ $transfer->transfer_group_id }}">
                                                            </div>
                                                        </div>
{{--                                                        <div class="row mb-3">--}}
{{--                                                            <div class="col-sm-3">--}}
{{--                                                                <h6 class="mb-0">Ushbu sanagacha</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-sm-9 text-secondary">--}}
{{--                                                                <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->academic_year }}">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Holati</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-warning">
                                                                <div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="font-35 text-warning"><i class="bx bx-info-circle"></i>
                                                                        </div>
                                                                        <div class="ms-3">
                                                                            <h6 class="mb-0 text-warning">Holati</h6>
                                                                            <div>Akademik ta'til olgan.</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @if($transfer->desc != null)
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Izoh</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                        <textarea disabled class="form-control"
                                                                                  rows="8">{{ $transfer->desc }}</textarea>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if($transfer->file != null)
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Fayl</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <div class="d-flex align-items-center mt-3">
                                                                        <div class="fm-file-box bg-light-success text-success"><i class="bx bxs-file-blank"></i>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-2">
                                                                            <h6 class="mb-0">{{ $transfer->file }}</h6>
                                                                            <p class="mb-0 text-secondary">{{ ceil(\Illuminate\Support\Facades\File::size(public_path('students/files/'.$transfer->file)) / pow(1024,2)) }} MB</p>
                                                                        </div>
                                                                        <a href="{{ route('student.downloadFile',$transfer->file) }}" class="text-success h6 mb-0 fm-file-box bg-light-success text-success">
                                                                            <i class="bx bxs-download"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <form action="{{ route('update.transferUploadFile',$transfer->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @if($transfer->file == null)
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Fayl</h6>
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        <input type="file" name="file" class="form-control">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($transfer->desc == null)
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-3">
                                                                        <h6 class="mb-0">Izoh</h6>
                                                                    </div>
                                                                    <div class="col-sm-9 text-secondary">
                                                                    <textarea class="form-control" name="desc"
                                                                              rows="8"></textarea>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($transfer->desc == null || $transfer->file == null)
                                                                <div class="col-sm-2">
                                                                    <input class="btn btn-success" type="submit" value="Saqlash">
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
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
                                <form action="{{ route('student.recovery',$transfer->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="student_tiklash_{{$transfer->id}}" tabindex="-1"
                                         style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{$transfer->student->full_name}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label" for="desc">O'qishni tiklash (izoh).</label>
                                                        <textarea class="form-control" id="desc" rows="10"
                                                                  placeholder="Izoh" name="desc"></textarea>
                                                        @error('desc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label" for="file">Fayl (majburiy emas. (doc,
                                                            docx, xlsx, pdf)).</label>
                                                        <input type="file" class="form-control" name="file" id="file">
                                                        @error('file')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <input value="{{ date('Y-m-d') }}" name="academic_year" type="hidden"
                                                           id="date">
                                                    <input type="hidden" id="status" name="status" value="6">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
                                                        Saqlash
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>

@endsection
