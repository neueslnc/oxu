
@extends('template')

@section('body')

{{--    <div class="page-wrapper">--}}
{{--        <div class="page-content">--}}
{{--            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">--}}
{{--                <div class="breadcrumb-title pe-3">Qayta o'zlashtirish</div>--}}
{{--                <div class="ps-3">--}}
{{--                    <nav aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb mb-0 p-0">--}}
{{--                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>--}}
{{--                            </li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="d-flex align-items-center">--}}
{{--                <h6 class="mb-0 text-uppercase">Qayta o'zlashtirishlar</h6>--}}
{{--            </div>--}}

{{--            <div class="d-flex align-items-center">--}}
{{--                <div class="ms-auto">--}}
{{--                    <a href="{{ route('test_theme.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi sinov</a>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <hr>--}}
{{--            <div class="card radius-10">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="">--}}
{{--                        <table class="table table-bordered align-middle mb-0">--}}
{{--                            <thead class="table-light">--}}
{{--                            <tr>--}}
{{--                                <th class="fixed_header2 align-middle">#</th>--}}
{{--                                <th class="fixed_header2 align-middle">Mavzu</th>--}}
{{--                                <th class="fixed_header2 align-middle">Savollar soni</th>--}}
{{--                                <th class="fixed_header2 align-middle">Fanlar</th>--}}
{{--                                <th class="fixed_header2 align-middle">Sanasi</th>--}}
{{--                                <th class="fixed_header2 align-middle">Harakatlar</th>--}}
{{--                                <th class="fixed_header2 align-middle">Harakatlar</th>--}}

{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}

{{--                            @foreach ($test_themes as $i => $test_theme)--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        {{ ++$i }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $test_theme->theme->theme_name }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $test_theme->questinos_count() }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $test_theme->subject->name }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        {{ $test_theme->date_create() }}--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{ route('test_theme.edit', ['test_theme' => $test_theme->id ]) }}" class="btn btn-info">Yangilash</a>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <form action="{{route('test_theme.destroy',['test_theme'=>$test_theme->id])}}" method="post">--}}
{{--                                            @method('DELETE')--}}
{{--                                            @csrf--}}
{{--                                            <input type="submit" class="btn btn-danger" value="O'chirish">--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


@endsection
