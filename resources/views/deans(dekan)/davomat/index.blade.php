@extends('template')

@section('body')
        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Nazoratchilar</div>
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
                   <h6 class="mb-0 text-uppercase">Qayta o'zlashtirishlar</h6>
                </div>

                {{-- <div class="d-flex align-items-center">
                    <div class="ms-auto">
                        <a href="{{ route('test_theme.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi sinov</a>
                    </div>
                </div> --}}


                <hr>
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Nazoratchi</th>
                                    <th class="fixed_header2 align-middle">O'quvchi </th>
                                    <th class="fixed_header2 align-middle">O'qituvchi</th>
                                    <th class="fixed_header2 align-middle">Fan</th>
                                    <th class="fixed_header2 align-middle">NB test raqami</th>
                                    <th class="fixed_header2 align-middle">Status</th>
                                    {{-- <th class="fixed_header2 align-middle">Harakatlar</th>
                                    <th class="fixed_header2 align-middle">Harakatlar</th> --}}


                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($nb_list as $i => $nb)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $nb->get_supervisor->full_name}}
                                        </td>
                                        <td>
                                            {{ $nb->student->full_name}}
                                        </td>
                                        <td>
                                            {{ $nb->teacher->full_name }}
                                        </td>
                                        <td>
                                            {{ $nb->subject->name }}
                                        </td>
                                        <td>
                                            {{ $nb->theme->theme_name ?? ''}}
                                        </td>

                                        <td>
                                            {{ $nb->status}}
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
@endsection
