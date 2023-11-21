@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Ta'lim turlari</div>
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
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ta'lim turi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="{{ route('getDirection',1) }}" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;Bakalavr (Kunduzgi)</a></td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td><a href="{{ route('getDirection', 2) }}" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;Bakalavr (Sirtqi)</a></td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td><a href="{{ route('getDirection', 4) }}" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;Bakalavr (Kechki)</a></td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td><a href="{{ route('getDirection', 3) }}" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;Magistratura</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
