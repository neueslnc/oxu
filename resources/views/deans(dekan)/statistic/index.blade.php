@extends('template')
@section('body')
<div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Guruhlar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Guruhlar statistikasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        {{-- <div class="card-header d-flex align-items-center justify-content-between">
            <a href="{{ route('groups.create') }}" class="btn btn-sm btn-success"><i class="bx bx-plus-circle"></i>Guruh yaratish</a>
            <input type="search" name="search" class="form-control form-control-sm w-50" placeholder="Guruh nomi...">
        </div> --}}
        <div class="card-body">
            <div>
                <input type="radio" value="2" class="btn-check check" name="options-outlined" id="success_outlined" autocomplete="off">
                <label class="btn btn-outline-success" for="success_outlined">Biriktirilgan guruhlar</label>

                <input type="radio" value="1" class="btn-check check" name="options-outlined" id="danger_outlined" autocomplete="off">
                <label class="btn btn-outline-danger" for="danger_outlined">Biriktirilmagan guruhlar</label>
            </div>
           <br>
            <table class="table mb-0 table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Guruh nomi</th>
                    <th scope="col">Guruh tili</th>
                    <th scope="col">Guruh o'qish turi</th>
                    <th scope="col">Guruh o'qish shakli</th>
                    <th scope="col">Guruh fakulteti</th>
                    <th scope="col">Guruh kursi</th>
                    <th scope="col">Nazoratchi</th>

                </tr>
                </thead>
                <tbody id="append_row">
{{--                     @foreach($groups as $group)--}}
{{--                        <tr>--}}
{{--                            <th scope="row">{{ ($groups->currentpage()-1)*$groups->perpage() + ($loop->index + 1)}}</th>--}}
{{--                            <td>{{ $group->title }}</td>--}}
{{--                            <td>{{ $group->get_language->name ?? 'Bo`sh' }}</td>--}}
{{--                            <td>{{ $group->get_type_of_education_id->name ?? 'Bo`sh' }}</td>--}}
{{--                            <td>{{ $group->get_form_of_education_id->title ?? 'Bo`sh' }}</td>--}}
{{--                            <td>{{ $group->get_direction_id->title ?? 'Bo`sh' }}</td>--}}
{{--                            <td>{{ $group->get_group_course_id->title ?? 'Bo`sh'}}</td>--}}
{{--                            <td>{{ $group->get_group_akademik_year->name ?? 'Bo`sh'}}</td>--}}
{{--                            <td class="d-flex align-items-center">--}}
{{--                                <a class="btn btn-sm btn-primary text-white me-2" href="{{ route('groups.edit', $group) }}"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>--}}
{{--                                <form style="margin: 0" action="{{ route('groups.destroy', $group) }}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-sm btn-danger confirm-button"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripte_include_end_body')
    <script>
        $('input[type=radio][name=options-outlined]').click(function() {
            $("#append_row").html('');
            $.ajax('{{ route('check.groupFilter') }}', {
                type : "GET",
                data : {
                    check : $(this).val()
                },
                success: function (data){
                    $.each(data.data, function(i, item) {
                        $("#append_row").append(`
                        
                            <tr>
                                <td>${i+1}</td>
                                <td>${item.title}</td>
                                <td>${item.get_language != null ? item.get_language.name : "Bo'sh" }</td>
                                <td>${item.get_type_of_education_id != null ? item.get_type_of_education_id.name : "Bo'sh"}</td>
                                <td>${item.get_form_of_education_id != null ? item.get_form_of_education_id.title : "Bo'sh"}</td>
                                <td>${item.get_direction_id != null ? item.get_direction_id.title : "Bo'sh"}</td>
                                <td>${item.get_group_course_id != null ? item.get_group_course_id.title : "Bo'sh"}</td>
                                <td>${item.get_supervisor != null ? item.get_supervisor.full_name : "Bo'sh"}</td>
                                
                            </tr>
                        `);
                    });
                },
                error: function (e){
                    console.log(e);
                }
            });
        });
    </script>
@endpush





