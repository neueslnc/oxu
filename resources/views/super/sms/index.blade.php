@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Xabarlar(SMS)</div>
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
            <h6 class="mb-0 text-uppercase">Barcha xabarlar</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('superadmin.sms_message.create',['admin_id'=>$id]) }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi qo`shish</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">
                    <div class="container">
                        <div class="starter-template">
                            @if(session()->has('success'))
                                <p class="alert alert-success">{{ session()->get('success') }}</p>
                            @endif
                            @if(session()->has('warning'))
                                <p class="alert alert-warning">{{ session()->get('warning') }}</p>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Jo'natuvchi</th>
                                    <th class="fixed_header2 align-middle">Qabul qiluvchi</th>
                                    <th class="fixed_header2 align-middle">Xabar mazmuni</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($messages as $i => $message)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $message->user_sender->full_name }}
                                        </td>
                                        <td>
                                            {{ $message->user_taker->full_name }}
                                        </td>
                                        <td>
                                            {{ $message->sms_body }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">

                            {{ $messages->links() }}
                        </div>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection
