@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">O'quv jarayoni</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Imtihonlar ro'yxati</h6>
            <div class="ms-auto">
                <a href="{{ route('supervisor_exams.exam.create') }}" class="btn btn-primary px-5">Imtihon yaratish</a>
            </div>
        </div>
        <hr>
        <div class="card radius-10">
                 <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nomi</th>
                                    <th>O‘quv yili</th>
                                    <th>Guruhlar</th>
                                    <th>Savollar</th>
                                    <th>Boshlanish</th>
                                    <th>Tugash</th>
                                    <th>Vaqti (daqiqa)</th>
                                    <th>Faol</th>
                                    <th>Sozlash</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $item)
                                    <tr>
                                        <td>
                                            {{ $item['name'] }}<br>
                                            {{ $item['direction']['name'] }} / {{ $item['control_type']['name'] }}
                                        </td>
                                        <td>{{ date("Y", strtotime($item['academic_year']['start_date']) ) }}-{{ date("Y", strtotime($item['academic_year']['expiration_date']) ) }}<br>{{ $item['semester']['name'] }}</td>
                                        <td></td>
                                        <td>0/{{ $item['number_questions'] }}</td>
                                        <td>{{ $item['start_date'] }}</td>
                                        <td>{{ $item['expiration_date'] }}</td>
                                        <td>{{ $item['time_limit_minutes'] }}</td>
                                        
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" style="transform: scale(1.5);" {{ $item['status'] == '1' ? "checked" : "" }}>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('supervisor_exams.exam.show', [ 'exam' => $item['id'] ]) }}" class="btn btn-primary">Ochish</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>
    
@endsection