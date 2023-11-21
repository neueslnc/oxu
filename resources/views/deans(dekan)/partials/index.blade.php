@extends('template')
@section('body')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-primary text-primary mb-3"><i
                                    class="lni lni-users"></i>
                            </div>
                            <h4 class="my-1">{{ $student_count }}</h4>
                            <p class="mb-0 text-secondary">Umumiy talabalar soni</p>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="col">--}}
{{--                <div class="card radius-10">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3"><i--}}
{{--                                    class="bx bx-list-check"></i>--}}
{{--                            </div>--}}
{{--                            <h4 class="my-1">{{ $transfer_direction_count }}</h4>--}}
{{--                            <p class="mb-0 text-secondary">Yo'nalishini almashtirganlar</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3"><i
                                    class="bx bx-info-circle"></i>
                            </div>
                            <h4 class="my-1">{{ $group_count }}</h4>
                            <p class="mb-0 text-secondary">Umumiy guruhlar soni</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3"><i
                                    class="bx bxl-youtube"></i>
                            </div>
                            <h4 class="my-1">{{ $transfer_academic_year_count }}</h4>
                            <p class="mb-0 text-secondary">Akademik ta'til olganlar</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3"><i
                                    class="bx bxl-dropbox"></i>
                            </div>
                            <h4 class="my-1">{{ $transfer_give_count }}</h4>
                            <p class="mb-0 text-secondary">Hayfsan olganlar</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="widgets-icons rounded-circle mx-auto bg-light-warning text-warning mb-3"><i
                                    class="bx bxl-dropbox"></i>
                            </div>
                            <h4 class="my-1">{{ $transfer_expulsion_count }}</h4>
                            <p class="mb-0 text-secondary">Talabalar safidan chiqganlar</p>
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
