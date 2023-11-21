@extends('template')
@section('body')
<div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Nazoratchilar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Nazoratchilar ro'yxati</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="ms-auto">
            <a href="{{ route('deans_supervisor.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Nazoratchi yaratish</a>
        </div>
        <div class="card-header d-flex align-items-center justify-content-between">
            {{-- <input type="search" name="search" class="form-control form-control-sm w-50" placeholder="Guruh nomi..."> --}}
        </div>
        <div class="card-body">
            <table class="table mb-0 table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazoratchi nomi</th>
                    <th scope="col">Nazoratchi login</th>
                    <th scope="col">ishga kelgan vaqti </th>
                     <th scope="col">Tahrirlash</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($supervisors as $index => $supervisor)
                        <tr>
                            {{-- <th scope="row">{{ ($groups->currentpage()-1)*$groups->perpage() + ($loop->index + 1)}}</th> --}}
                            <td>{{ $index+1}}</td>
                            <td>{{ $supervisor->full_name  ?? 'Bo`sh' }}</td>
                            <td>{{ $supervisor->login ?? 'Bo`sh' }}</td>
                            <td>{{ $supervisor->add_time ?? 'Bo`sh' }}</td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-sm btn-primary text-white me-2" href="{{ route('deans_supervisor.edit',['deans_supervisor'=>$supervisor->id]) }}"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                <form style="margin-right: 10px" action="{{ route('deans_supervisor.destroy',['deans_supervisor'=>$supervisor->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger confirm-button"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                                </form>

                                <a data-bs-toggle="modal"
                                   data-bs-target="#selected_groups_supervisor" href="#" class="btn btn-sm btn-warning" onclick="set_supervisor({{ $supervisor->id }}, `{{ $supervisor->full_name }}`)">Guruhni o'zgartirish <i class="bx bx-pencil"></i></a>
                                <form action="{{ route('update.supervisorGroup') }}" method="post">
                                    @csrf
                                    <div class="modal fade" id="change_supervisor_{{ $supervisor->id }}" tabindex="-1"
                                         style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $supervisor->full_name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <input type="hidden" name="supervisor_id" value="{{ $supervisor->id }}">
                                                <div class="modal-body">
{{--                                                    @foreach($supervisor->dean_group_supervisor as $group)--}}
{{--                                                        <div class="mb-2">--}}
{{--                                                            <input name="supervisor_group[]" value="{{ $group->id }}" checked id="check_{{ $group->id }}" style="margin-right: 10px; font-size: 18px;" type="checkbox" class="form-check-input">--}}
{{--                                                            <label style="font-size: 18px" for="check_{{ $group->id }}">{{ $group->title }}</label>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}

                                                    @foreach($supervisor->dean_group_supervisor as $dean_group)
                                                        <div class="mb-2">
                                                            <input checked style="margin-right: 10px; font-size: 18px;" type="checkbox" class="form-check-input" onclick="set_group({{ $supervisor->id }}, {{ $dean_group->id }}, this)">
                                                            <label style="font-size: 18px" for="check_{{ $dean_group->id }}">{{ $dean_group->title }}</label>
                                                        </div>
                                                    @endforeach

                                                    @foreach($dean_groups->where('supervisor_id', '=', 0) as $dean_group)
                                                        <div class="mb-2">
                                                            <input style="margin-right: 10px; font-size: 18px;" type="checkbox" class="form-check-input" onclick="set_group({{ $supervisor->id }}, {{ $dean_group->id }}, this)">
                                                            <label style="font-size: 18px" for="check_{{ $dean_group->id }}">{{ $dean_group->title }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <a data-bs-toggle="modal"
                                   data-bs-target="#change_supervisor_direction_{{ $supervisor->id }}" href="#" class="btn btn-sm btn-warning">Yo'nalish o'zgartirish <i class="bx bx-pencil"></i></a>
                                <form method="post">
                                    @csrf
                                    <div class="modal fade" id="change_supervisor_direction_{{ $supervisor->id }}" tabindex="-1"
                                         style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ $supervisor->full_name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <input type="hidden" name="supervisor_id" value="{{ $supervisor->id }}">
                                                <div class="modal-body">
                                                    @foreach($directions as $direction)
                                                        @php
                                                            $item_s = $supervisor->direction_supervisor->where('direction_id', '=', $direction->id)->first();

                                                            $checked = '';

                                                            if ($item_s){

                                                                $checked = $item_s->status == 0 ? 'checked' : '';
                                                            }
                                                        @endphp
                                                        <div class="mb-2">
                                                            <input {{ $checked }} style="margin-right: 10px; font-size: 18px;" type="checkbox" class="form-check-input" onclick="set_direction({{ $supervisor->id  }}, {{ $direction->id  }}, this)">
                                                            <label style="font-size: 18px" for="check_{{ $direction->id }}">{{ $direction->title }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(!empty($supervisors->links()))
            <div class="card-footer">
                {{ $supervisors->links() }}
            </div>
        @endif
    </div>
</div>

<div id="test">
    <main-component
        v-bind:groups="groups"
        v-bind:supervisor_groups="supervisor_groups"
        v-bind:supervisor_id="supervisor_id"
        v-bind:key="1"
    >
</div>
@endsection
@push('scripte_include_end_body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script>

        let groups = {{ Js::from($dean_groups) }};

        let supervisor_groups = [];

        function set_supervisor(supervisor_id, full_name){

            vm.$data.supervisor_groups = vm.$data.groups.filter(item => item.supervisor_id == supervisor_id);

            vm.$data.supervisor_id = supervisor_id;

            $('#full_name_vue').html(full_name);

        }

    </script>

    <script src="{{ url('vue/vue.global.js') }}"></script>

    <script src="{{ url('vue/dean/selected_change_group_supervisor.js?22') }}"></script>

    <script type="text/javascript">

        function set_direction(user_id, direction_id, object){

            $.ajax('{{ route('update.supervisorDirection') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id" : user_id,
                    "direction_id" : direction_id,
                    "status" : ($(object).is(':checked') == true ? 0 : 1 )
                },
                success: function (data, status) {

                    if (data.status == 'success') {
                        succes_noti(msg="operatsiya muvaffaqiyatli yakunlandi");
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    error_noti(errorMessage);
                }
            });
        }

        function send_data(){

            $.ajax('{{ route('update.supervisorGroup') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id" : vm.$data.supervisor_id,
                    "dean_groups" : vm.$data.groups.filter(item => item.supervisor_id !== item.supervisor_id_old
                        && item.supervisor_id_old == vm.$data.supervisor_id
                        || item.supervisor_id == vm.$data.supervisor_id
                    ),
                },
                success: function (data, status) {

                    if (data.status == 'success') {
                        succes_noti(msg="operatsiya muvaffaqiyatli yakunlandi");

                        // location.reload();
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    error_noti(errorMessage);
                }
            });
        }

        $('.confirm-button').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Siz ushbu nazoratchini  o'chirmoqchimisiz?`,
                // text: "It will gone forevert",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

    </script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true
            }

            toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}","Guruh!",{timeOut:6000})
        </script>
    @endif
@endpush





