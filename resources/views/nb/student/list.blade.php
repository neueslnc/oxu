@extends('templaet_student')

@section('style')

@endsection

@section('body')

    <div class="container" style="margin-top: 50px;">
        <div class="page-content">

            <div class="row justify-content-md-center">

                <div class="col-md-6 px-md-5 pt-md-2 pb-md-2 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ $student->img_url }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3" style="font-size: 20px;">
                                    {{ $student->full_name }}
                                </div>
                            </div>
                            <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                            <div class="row">
                                <div class="col-md-12 text-center" style="font-size: 20px;">
                                    {{ $student->dean_group->title }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($nb_lists as $nb_list)
                    <div class="col-md-6 card px-md-5 pt-md-2 pb-md-2">
                        <div class="">
                            <div class="card-header">
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleVerticallycenteredModal">Malumot <i class="bx bx-info-circle"></i></button>
                                <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-size: 20px">Qisqacha mazmun</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" style="font-size: 20px;">
                                                {!! $nb_list->test->theme ? $nb_list->test->theme->theme_text : '' !!}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table mb-0 table-striped">
                                    <thead>
                                    <tr>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Yo'nalish:</td>
                                            <td>
                                                {{ $nb_list->direction->title }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Fanlar:</td>
                                            <td>
                                                {{ $nb_list->subject->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Mavzu:</td>
                                            <td>
                                                {{ $nb_list->test->theme->theme_name ?? '' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nazoratchi:</td>
                                            <td>
                                                {{ $nb_list->supervisor->full_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Takrorlashlar soni:</td>
                                            <td>
                                                {{ $nb_list->get_latest_repeat_count - 1 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Umumiy savolar:</td>
                                            <td>
                                                {{ $nb_list->question_count }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>To'g'ri javoblar:</td>
                                            <td>
                                                {{ $nb_list->get_latest_repeat_pro->question_success ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Noto'g'ri javoblar:</td>
                                            <td>
                                                {{ $nb_list->get_latest_repeat_pro->question_rejerect ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sizning natijangiz:</td>
                                            <td>
                                                {{ $nb_list->get_latest_repeat_pro->ball ?? 0 }} %
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                @if($nb_list->get_latest_repeat->ball >= 50)
                                                    <div class="col-md-12 badge bg-success">
                                                        NB o'tdi
                                                    </div>
                                                @endif
                                                @if($nb_list->get_latest_repeat->ball < 50)
                                                    <div class="col-md-12 badge bg-danger">
                                                        <h4 class="text-white">
                                                            NB muvaffaqiyatsiz tugadi
                                                        </h4>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">

                            @if($nb_list->end_date_time >= date('Y-m-d 00:00:00') && $nb_list->status == 0)

                                <a href="{{ route('nb.student.nb_test', ['id' => $nb_list->id]) }}" style="display : {{ $nb_list->get_latest_repeat->date <= date('Y-m-d') ? 'block' : 'none'  }};">
                                    <div class="col-md-12 btn btn-primary">
                                        Boshlanishi
                                    </div>
                                </a>

                                <a style="display : {{ $nb_list->get_latest_repeat->date >  date('Y-m-d') ? 'block' : 'none'  }};">
                                    <div class="col-md-12 btn btn-secondary">
                                        Boshlanishi {{ $nb_list->get_latest_repeat->date }}
                                    </div>
                                </a>

                            @endif


                        </div>
                    </div>
                @endforeach

                @if($nb_lists->count() == 0)

                    <div class="row">
                        <div class="col-md-12 card card-body text-center">
                            <h1>
                                Nb yo'qolgan
                            </h1>
                        </div>
                    </div>

                @endif

            </div>
        </div>
    </div>
@endsection

@push('scripte_include_end_body')
@endpush
