@extends('exercises.partials.template')
@section('body_exercise')
    <div style="margin: 100px 100px 0 100px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Qayta o'zlashtirish</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Fanlar ro'yxati</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fan</th>
                        <th scope="col">Mavzu</th>
                        <th scope="col">O'qituvchi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($nbs as $nb)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>
                                @foreach($nb->mb_test_theme as $theme)
                                    {{ $theme->theme->theme_name }}
                                @endforeach
                            </td>
                            <td>{{ $nb->subject->name }}</td>
                            <td>{{ $nb->teacher->full_name }}</td>
                            <td><a href="#" class="btn btn-success">Boshlash <i class="bx bx-check-circle"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
