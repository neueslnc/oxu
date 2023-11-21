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
                            <li class="breadcrumb-item"><a href="{{ route('get.directionGroupSeparately',[$direction->id,$type]) }}">{{ $direction->title }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript:;">{{ $course }} - kurs</a></li>
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
                    <form action="{{ route('change.group') }}" method="post">
                        @csrf
                        <input class="form-check-input" type="hidden" name="old_direction_id" value="{{ $direction->id }}">
                        <tbody>
                           @foreach($groups as $group)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1}}</th>
                                    <td>
                                        <input style="margin-right: 10px;" class="form-check-input" type="checkbox" name="group_id[]" id="group_{{$group->id}}" value="{{ $group->group_id }}">
                                        <a href="{{ route('get.directionGroupStudentSeparately',[$group->direction_id, $group->group_id,$course,$type]) }}" class="fs-6">
                                            <i class="bx bx-folder-plus"></i> &nbsp;
                                            {{ $group->dean_group->title }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <div class="row mb-2 align-items-end">
                            <div class="col-md-6">
                                <label for="direction_id">Yo'nalishlar</label>
                                <select name="direction_id"
                                        class="single-select select2-hidden-accessible"
                                        data-select2-id="1"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($directions as $direction)
                                        <option value="{{ $direction->id }}">{{$direction->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Saqlash" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </table>
            </div>
            {{-- <div class="card-footer">
                {{ $groups->links() }}
            </div> --}}
        </div>
    </div>
@endsection
@push('style')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
@endpush
@push('scripte_include_end_body')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
    <script>
@endpush



