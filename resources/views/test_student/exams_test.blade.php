@extends('templaet_student')

@section('body')

{{-- <div class="d-flex align-items-center justify-content-center" style=""> --}}

        <div id="test">
            <test-item
            v-bind:tests="tests"
            v-bind:student="student"
            v-bind:direction="direction"
            v-bind:subject="subject"
            v-bind:start_date_time="start_date_time"
            v-bind:test_id="test_id"
            v-bind:seconds="seconds"

            v-bind:key="1"
            >
            </test-item>
            <button type="button" id="bus" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Natijalar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Hamma javoblar:
                                </div>
                                <div class="col-md-6" id="question_count">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    To`g`ri javob:
                                </div>
                                <div class="col-md-6" id="question_count_accept">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Noto`g`ri javob:
                                </div>
                                <div class="col-md-6" id="question_count_rejecrect">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    Ball:
                                </div>
                                <div class="col-md-6" id="ball">

                                </div>
                            </div>

                            <div class="row" id="status_exam">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- </div> --}}

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    let student = {{ Js::from($student) }};

    let direction = {{ Js::from($direction) }};

    let subject = {{ Js::from($subject) }};

    let start_date_time = '{{ $exams['start_date_time'] }}';

    let exams = {{ Js::from($exams['question_exam'])  }};

    let test_id = {{ Js::from($exams['id'])  }};

    let seconds = {{ Js::from($seconds) }};

</script>

<script>


function format(seconds) {
    let s = (seconds % 60).toString();
    let m = Math.floor(seconds / 60 % 60).toString();
    let h = Math.floor(seconds / 60 / 60 % 60).toString();
    return `${h.padStart(2,'0')}:${m.padStart(2,'0')}:${s.padStart(2,'0')}`;
}

</script>

<script src="{{ url('vue/exam_on_student_component.js?33') }}"></script>
<script>

    function set_variant(id, question_id){
        $.ajax('{{ route('student.set_variant') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "question_id" : question_id,
                "nomer" : {{ $nomer }}
            },
            success: function (data, status) {

                vm.tests.find(item => item.id == question_id).variants.find(item => item.id == id).correct_student = 1;

                for (const datum of vm.tests.find(item => item.id == question_id).variants.filter(item => item.id != id)) {
                    datum.correct_student = 0;
                }


                // for (let item of this.tests[question_id].variants) {
                //     if(id == item.id){
                //         item.correct_student = 1;
                //         continue;
                //     }
                //     item.correct_student = 0;
                // }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                error_noti(msg=errorMessage);
            }
        });
    }

    function finish_exam(id){
        $.ajax('{{ route('student.finish_exam_student') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : id,
                "nomer" : {{ $nomer }}
            },
            success: function (data, status) {

                if (data != 0){
                    $('#question_count').text(data.question_count)
                    $('#question_count_accept').text(data.question_success)
                    $('#question_count_rejecrect').text(data.question_rejerect)
                    $('#ball').text(data.ball)

                    if (100 >= data.ball && 90 <= data.ball) {

                        $(`#status_exam`).html(`
                            <div class="col-md-12 badge bg-success">
                                A'lo baho (${data.ball})
                            </div>
                        `)
                    }else if (89 >= data.ball && 72 <= data.ball){

                        $(`#status_exam`).html(`
                            <div class="col-md-12 badge bg-success">
                                Yaxsh baho (${data.ball})
                            </div>
                        `)
                    }else if ( 71 >= data.ball && 40 <= data.ball){

                        $(`#status_exam`).html(`
                            <div class="col-md-12 badge bg-success">
                                Qoniqarli baho (${data.ball})
                            </div>
                        `)
                    }else if (39 >= data.ball && 0 <= data.ball){
                        $(`#status_exam`).html(`
                            <div class="col-md-12 badge bg-danger">
                                Qoniqarsiz baho (${data.ball})
                            </div>
                        `)
                    }

                    $('#bus').click();
                }

            },
            error: function (jqXhr, textStatus, errorMessage) {
                error_noti(msg=errorMessage);
            }
        });
    }

</script>
@endpush
