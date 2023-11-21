@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Yo'nalishlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('get.formOfEducation') }}">
                                    @if($type_id == 1)
                                        Bakalavr(Kunduzgi)
                                    @elseif($type_id == 2)
                                        Bakalavr(Sirtqi)
                                    @elseif($type_id == 3)
                                        Magistratura
                                    @elseif($type_id == 4)
                                        Bakalavr(Kechki)
                                    @endif
                                </a>
                            </li>
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
                        <th scope="col">Yo'nalishlar nomi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($directions as $direction)
{{--                            @dd($direction)--}}
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td><a href="{{ route('get.directionGroupSeparately', [$direction->id,$type_id]) }}" class="fs-6"><i class="bx bx-folder-plus"></i>&nbsp;{{$direction->code}} - {{ $direction->title }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection



