@extends('template')
@section('body')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Guruhlar</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Yo'nalishlar</a></li>
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
                    @foreach($groups as $group)
                        <tr>
                            <th scope="row">{{ ($groups->currentpage()-1)*$groups->perpage() + ($loop->index + 1)}}</th>
                            <td><a href="{{ route('get.directionGroupStudent',[$group->direction_id, $group->group_id]) }}" class="fs-6"><i class="bx bx-folder-plus"></i> &nbsp;{{ $group->dean_group->title }}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $groups->links() }}
            </div>
        </div>
    </div>
@endsection




