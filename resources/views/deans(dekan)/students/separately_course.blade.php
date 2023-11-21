@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Guruhlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('get.formOfEducation') }}">
                                    @if($type == 1)
                                        Bakalavr(Kunduzgi)
                                    @elseif($type == 2)
                                        Bakalavr(Sirtqi)
                                    @elseif($type == 3)
                                        Magistratura
                                    @elseif($type == 4)
                                        Bakalavr(Kechki)
                                    @endif
                                </a>
                            </li>
{{--                            <li class="breadcrumb-item"><a href="{{ route('get.student',$direction->form_of_education_id) }}">Yo'nalishlar</a></li>--}}
                            <li class="breadcrumb-item"><a href="javascript:;">{{ $direction->title }}</a></li>
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
                        <th scope="col">Guruhlar nomi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="{{ route('get.get_direction_with_course',['direction_id'=> $direction->id,'course'=>1,'type' => $type]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> 1-kurs</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="{{ route('get.get_direction_with_course',['direction_id'=> $direction->id,'course'=>2,'type' => $type]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> 2-kurs</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="{{ route('get.get_direction_with_course',['direction_id'=> $direction->id,'course'=>3,'type' => $type]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> 3-kurs</a></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="{{ route('get.get_direction_with_course',['direction_id'=> $direction->id,'course'=>4,'type' => $type]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> 4-kurs</a></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="{{ route('get.get_direction_with_course',['direction_id'=> $direction->id,'course'=>5,'type' => $type]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> 5-kurs</a></td>
                        </tr>




{{--                     @foreach($groups as $group)--}}
{{--                        <tr>--}}
{{--                            <th scope="row">{{ $gr  }}</th>--}}
{{--                            <td><a href="" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;{{ $group->dean_group->title }}</a></td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
            {{-- <div class="card-footer">
                {{ $groups->links() }}
            </div> --}}
        </div>
    </div>
@endsection




