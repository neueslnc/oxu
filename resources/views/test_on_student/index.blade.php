
@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">NB</div>
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
            <h6 class="mb-0 text-uppercase">NB bazasi</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('test_on_student.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi nb</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Mavzu</th>
                                    <th class="fixed_header2 align-middle">Fanlar</th>
                                    <th class="fixed_header2 align-middle">Talaba</th>
                                    <th class="fixed_header2 align-middle">Savollar</th>
                                    <th class="fixed_header2 align-middle">Sanasi</th>
                                    <th class="fixed_header2 align-middle">Link</th>
                                    <th class="fixed_header2 align-middle">O'chirish</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($all as $i => $item)
                           
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                    
                                        <td>
                                            {{ $item->test->theme->theme_name }} 
                                        </td>
                                        <td>
                                            {{ $item->subject->name }}
                                        </td>
                                        <td>
                                            {{ $item->student->full_name }}
                                        </td>
                                        <td>
                                            {{ $item->test_on_student_questions_active->count() }} / {{ $item->test_on_student_questions->count() }}
                                        </td>
                                        <td>
                                            {{ $item->date_create() }}
                                        </td>
                                        <td>
                                            <a href="{{ route("passing_test", ['key' => $item->access_key]) }}">.</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('test_on_student.destroy',['test_on_student'=>$item->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <input type="submit" class="btn btn-danger" value="O'chirish">
                                            </form>
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
