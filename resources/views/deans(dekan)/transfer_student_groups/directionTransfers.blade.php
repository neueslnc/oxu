@extends('template')
@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Yo'nalishlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Yo'nalishi almashganlar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-end">
                    {{ $transfers->links() }}
                </div>
                <form action="{{ route('transfer.status') }}" method="post">
                    @csrf
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Rasm</th>
                                <th>F.I.O</th>
                                <th>Yo'nalishi</th>
                                <th>Sana</th>
                                <th>Holati</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($transfers as $transfer)
                                <tr>
                                    <td>{{ ($transfers->currentpage()-1)*$transfers->perpage() + ($loop->index + 1)}}</td>
                                    <td><img width="43px" height="43px" src="{{ asset('students/images/'.$transfer->student->img_path) }}" class="avatar"
                                             alt="product img"></td>
                                    <td data-bs-toggle="modal"
                                        data-bs-target="#student_show_{{$transfer->id}}">{{ $transfer->student->full_name }}</td>
                                    <td>{{ $transfer->student->direction->title }}</td>
                                    <td>{{ $transfer->date }}</td>
                                    <td>
                                        <span class="badge @if($transfer->status == 0) bg-gradient-orange @elseif($transfer->status == 1) bg-gradient-quepal @endif text-white shadow-sm w-100">{{ $transfer->status == 0 ? 'Ko`rib chiqilmoqda' : 'Perevod bo`ldi' }}</span>
                                    </td>
                                </tr>
                                @if($transfer->status == 0)
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
                                                                    <input type="text" id="phone" disabled class="form-control" value="{{ $transfer->student->phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Hozirgi yo'nalishi</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_direction->title }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Perevod yo'nalishi</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->transfer_direction->title }}">
                                                                    <input type="hidden" name="transfer_direction_id" value="{{ $transfer->transfer_direction_id }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Holati</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <div class="alert border-0 border-start border-5 border-warning alert-dismissible fade show py-2">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="font-35 text-warning"><i class="bx bx-info-circle"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <h6 class="mb-0 text-warning">Holati</h6>
                                                                                <div>Ko'rib chiqilmoqda</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-3"><h6 class="mb-0">Action</h6></div>
                                                                <div class="col-sm-9 text-secondary text-end">
                                                                    <input type="hidden" name="student_id" value="{{ $transfer->student_id }}">
                                                                    <button type="submit" class="btn btn-outline-success px-5">Qabul qilish</button>
                                                                </div>
                                                            </div>
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
                                @elseif($transfer->status == 1)
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
                                                                    <input type="text" id="phone" disabled class="form-control" value="{{ $transfer->student->phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Ushbu yo'nalishdan</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" disabled id="exit_group_id" class="form-control" value="{{ $transfer->exit_direction->title }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Ushbu guruhga ko'chirildi</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="text" disabled id="transfer_group_id" class="form-control" value="{{ $transfer->transfer_direction->title }}">
                                                                    <input type="hidden" name="transfer_direction_id" value="{{ $transfer->transfer_group_id }}">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-3">
                                                                    <h6 class="mb-0">Holati</h6>
                                                                </div>
                                                                <div class="col-sm-9 text-success">
                                                                    <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="font-35 text-success"><i class="bx bx-info-circle"></i>
                                                                            </div>
                                                                            <div class="ms-3">
                                                                                <h6 class="mb-0 text-success">Holati</h6>
                                                                                <div>Talaba muvaffaqiyatli ko'chirildi.</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                @endif
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
