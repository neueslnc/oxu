@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kompyuter nazorati</div>
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
            <h6 class="mb-0 text-uppercase">Kompyuter nazorati</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('supervisor_exams.control_pc.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Новый ПК</a>
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
                                    <th class="fixed_header2 align-middle">Nomi</th>
                                    <th class="fixed_header2 align-middle">Raqam</th>
                                    <th class="fixed_header2 align-middle">IP</th>
                                    <th class="fixed_header2 align-middle">Status</th>
                                    <th class="fixed_header2 align-middle">Operatsiya</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pcs as $i => $pc)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $pc->name }}
                                        </td>
                                        <td>
                                            {{ $pc->nomer }}
                                        </td>
                                        <td>
                                            {{ $pc->local_ip }}
                                        </td>
                                        <td>
                                            {!! $pc->status == 0 ? '<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Свободен</div>' : '<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Занят</div>' !!}
                                        </td>
                                        <td>
                                            <a href="{{ route('supervisor_exams.control_pc.edit',['control_pc'=>$pc->id]) }}" class="btn btn-warning px-3"></i>O'zgartirish</a>
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