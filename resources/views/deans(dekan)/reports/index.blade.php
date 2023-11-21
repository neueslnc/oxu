@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Hisobotlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Hisobotlar ro'yxati</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-striped table-bordered dataTable" role="grid"
                                       aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 160.781px;">Guruh
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 264.875px;">O'quv yili boshidagi talabalar soni
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 114.828px;">TSCH qilgan
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 51.2656px;">Boshqa guruhga o'tgan
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 107.219px;">Akademik ta'til olganlar
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">Boshqa guruhdan kelganlar
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">1/2 va 2/2 bilan kelgan talabalar soni
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">Umuman kelmagan talabalar soni
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">Ro'yxatdagi talabalar soni
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">2 - semestrda kelmagan talabalar soni
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 86.0312px;">Oxirgi talabalar soni
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($groups as $group)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">{{ $group->title }}</td>
                                            <td class="sorting_2">
                                                {{
                                                    $students->where('group_id','=',$group->id)->count() +
                                                    $transfers->whereColumn('exit_group_id','!=','transfer_group_id')->count()
                                                }}
                                            </td>
                                            <td class="sorting_3">
                                                {{
                                                    $reports
                                                        ->where('exit_group_id','=',$group->id)
                                                        ->where('status','=',2)
                                                        ->count()
                                                }}
                                            </td>
                                            <td class="sorting_4">
                                                {{
                                                    $reports
                                                        ->where('exit_group_id','=',$group->id)
                                                        ->where('status','=',1)
                                                        ->count()
                                                }}
                                            </td>
                                            <td class="sorting_4">
                                                {{
                                                    $reports
                                                        ->where('exit_group_id','=',$group->id)
                                                        ->where('status','=',3)
                                                        ->count()
                                                }}
                                            </td>
                                            <td class="sorting_4">
                                                {{
                                                    $reports
                                                        ->where('transfer_group_id','=',$group->id)
                                                        ->where('status','=',1)
                                                        ->count()
                                                }}
                                            </td>
                                            <td class="sorting_5"></td>
                                            <td class="sorting_6"></td>
                                            <td class="sorting_7">
                                                {{
                                                    $students->where('group_id','=',$group->id)->count() -
                                                    (
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',1)->count() +
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',2)->count() +
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',3)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',1)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',2)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',3)->count()
                                                    )
                                                }}
                                            </td>
                                            <td class="sorting_8"></td>
                                            <td class="sorting_9">
                                                {{
                                                    $students->where('group_id','=',$group->id)->count() -
                                                    (
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',1)->count() +
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',2)->count() +
                                                        $reports->where('exit_group_id','=',$group->id)->where('status','=',3)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',1)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',2)->count() +
                                                        $reports->where('transfer_group_id','=',$group->id)->where('status','=',3)->count()
                                                    )
                                                }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Jami</th>
                                            <th rowspan="1" colspan="1">{{ $all_student_count }}</th>
                                            <th rowspan="1" colspan="1">{{ $all_tsch_count }}</th>
                                            <th rowspan="1" colspan="1">{{ $all_exit_group_count }}</th>
                                            <th rowspan="1" colspan="1">{{ $all_academic_leave_count }}</th>
                                            <th rowspan="1" colspan="1">{{ $all_transfer_group_count }}</th>
                                            <th rowspan="1" colspan="1">0</th>
                                            <th rowspan="1" colspan="1">0</th>
                                            <th rowspan="1" colspan="1">{{ $all_student_transfer_count }}</th>
                                            <th rowspan="1" colspan="1">0</th>
                                            <th rowspan="1" colspan="1">{{ $all_student_transfer_count }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endpush
@push('scripte_include_end_body')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );

            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
@endpush


