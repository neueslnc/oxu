@extends('template')
@section('body')
<div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Mutaxassisliklar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mutaxassisliklar ro'yxati</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <a class="btn btn-sm mb-2 btn-success text-white me-2" href="{{ route('specialty.create') }}"> <i class='bx bx-plus'></i>Yangi mutaxassislik yaratish</a>
            <br>
            <table class="table mb-0 table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Raqami</th>
                    <th scope="col">Nomi</th>
                    <th scope="col">O'qish turi</th>
                    <th scope="col">O'qish tili</th>
                   <th  scope="col">Harakatlar</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($directions as $index=>$direction)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $direction->code ?? 'Bo`sh' }}</td>
                            <td>{{ $direction->title ?? 'Bo`sh' }}</td>
                            <td>{{ $direction->get_form_of_education->title ?? 'Bo`sh' }}</td>
                            <td>{{ $direction->get_language->name ?? 'Bo`sh' }}</td>
{{--                            <td>{{ $direction->get_group_akademik_year->name ?? 'Bo`sh'}}</td>--}}
                            <td class="d-flex align-items-center">
                                <a class="btn btn-primary text-white me-2" href="{{ route('specialty.edit', $direction->id) }}"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-primary"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a>
                                <form style="margin: 0" action="{{ route('specialty.destroy', $direction) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger confirm-button"><svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash text-primary"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
{{--        @if(!empty($directions->links()))--}}
{{--            <div class="card-footer">--}}
{{--                {{ $directions->links() }}--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
</div>
@endsection
@push('scripte_include_end_body')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">

        $('.confirm-button').click(function(event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            swal({
                title: `Siz ushbu mutaxassislikni o'chirmoqchimisiz?`,
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





