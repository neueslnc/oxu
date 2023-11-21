@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
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
                                                style="width: 160.781px;">Yillar
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 160.781px;">Guruhlar soni
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($years as $year)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <a href="{{ route('years.group',$year) }}">{{ $year->name }}</a>
                                                </td>
                                                <td class="sorting_1">
                                                    {{ $groups->where('group_akademik_year','=',$year->id)->count() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">Yillar</th>
                                            <th rowspan="1" colspan="1">Guruhlar soni</th>
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
    </div>

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
@endsection
