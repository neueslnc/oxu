@extends('templaet_student')

@section('style')

    <style>

        .prokrutka {
            height:500px; /* высота нашего блока */
            overflow-y: scroll; /* прокрутка по вертикали */
        }

    </style>

@endsection

@section('body')

<div class="error-404 d-flex align-items-center justify-content-center">

    <div class="container">

        {{-- <div class="card py-5">
            <div class="card-header">
                Test {{ $count_question - $active_question }} in {{ $count_question }}
            </div>
            <div class="card-body p-4"> --}}

                <div id="test">

                    <test-item
                        v-bind:test="test"
                        v-bind:student="student"
                        v-bind:direction="direction"
                        v-bind:subject="subject"
                        v-bind:test_id="test_id"
                        v-bind:key="test.id"
                        v-bind:flag_writing="status.flag_writing"
                        v-bind:confirm_student="status.confirm_student"
                        v-bind:counter="counter"
                        v-bind:timer="status.timer"
                    >
                    </test-item>

                {{-- </div>
            </div>
        </div> --}}
    </div>

    <button type="button" id="bus" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: none;">
    </button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Natijalar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6 display-6">
                            Umumiy savolar:
                        </div>
                        <div class="col-md-6 display-6" id="question_count">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 display-6">
                            To'g'ri javoblar:
                        </div>
                        <div class="col-md-6 display-6" id="question_count_accept">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 display-6">
                            Noto'g'ri javoblar:
                        </div>
                        <div class="col-md-6 display-6" id="question_count_rejecrect">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 display-6">
                            Sizning natijangiz:
                        </div>
                        <div class="col-md-6 display-6" id="result_procent">
                        </div>
                    </div>

                    <div class="row display-6" id="status_nb">

                    </div>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="{{ route('nb.student.nb_test_list') }}">Qaytish</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function (event) {
        window.location.href = '{{ route('nb.student.nb_test_list') }}';
    })

    let test = {{ Js::from($test) }};

    test.comparisons = [];

    for (const iterator of test.block_lefts) {
        test.comparisons.push({
            block_left : iterator.id,
            block_right : 0,
        });
    }

    let student = {{ Js::from($student) }};

    let direction = {{ Js::from($direction) }};

    let subject = {{ Js::from($subject) }};

    let test_id = {{ $test_id }};

    let user_active = true;

</script>

<script src="{{ url('vue/nb/student/index.js?20') }}"></script>

<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>




    $(document).ready(function() {
        $('.asdfaserqwrq3rq').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    });

    function elem_in_visible_area(selector) {
        let elem_p = $(selector),
            elem_p_height = elem_p.height(),
            offset_top_el = elem_p.offset().top,
            offset_bottom_el = offset_top_el + elem_p.height(),
            scrolled = $(window).scrollTop(),
            scrolled_bottom = scrolled + $(window).height();
        if (scrolled_bottom > offset_top_el && offset_bottom_el > scrolled) {
            return true;
        }
        return false;
    }

    var myModalEl = document.getElementById('exampleExtraLargeModal');

    try {

        myModalEl.addEventListener('shown.bs.modal', function (event) {
            if ($('#jas')[0].scrollHeight - $('#jas')[0].scrollTop === $('#jas')[0].clientHeight) {
                if (vm.$data.status.flag_writing == false) {
                    vm.$data.status.flag_writing = true;
                    vm.$data.status.timer = true;
                }
            }
        });
    } catch (error) {
        null;
    }


    $('#jas').scroll(function() {
        if (this.scrollHeight - this.scrollTop === this.clientHeight) {
            if (vm.$data.status.flag_writing == false) {
                vm.$data.status.flag_writing = true
            }
        }
    })

    function send_data() {

        let data = {
            "_token": "{{ csrf_token() }}",
            "test_id" : vm.$data.test_id,
            "question_id" : vm.$data.test.id,
        };

        if (vm.$data.test.type == 'variant') {

            if(!vm.$data.test.test_on_student_answers.find((item) => item.correct_student == 1)){
                return false;
            }

            data["variant_id"] = vm.$data.test.test_on_student_answers.find((item) => item.correct_student == 1).id;
        }else if(vm.$data.test.type == 'writing'){

            if (!(vm.$data.test.test_on_student_answers[0]) && !(vm.$data.test.test_on_student_answers[0].correct_student) ){
                return false;
            }

            data['variant_id'] = vm.$data.test.test_on_student_answers[0].id;
            data['answer'] = vm.$data.test.test_on_student_answers[0].correct_student;
        }else if(vm.$data.test.type == 'comparison'){

            for (const datum of vm.$data.test.comparisons) {

                if (datum.block_right == 0){
                    return false;
                }

            }

            data['comparisons'] = vm.$data.test.comparisons;
        }

        $.ajax(' {{ route('nb.student.set_variant') }} ', {
            type: 'POST',
            data: data,
            success: function (data, status) {

                console.log(status);

                if (data.status == 'success') {

                    data.test.comparisons = [];

                    for (const iterator of data.test.block_lefts) {
                        data.test.comparisons.push({
                            block_left : iterator.id,
                            block_right : 0,
                        });
                    }

                    vm.$data.test = data.test;

                    vm.$data.counter = data.test.waiting_seconds
                }else{

                    $('#question_count').text(data.supervisor_question_count)
                    $('#question_count_accept').text(data.supervisor_question_success)
                    $('#question_count_rejecrect').text(data.supervisor_question_rejerect)
                    $('#result_procent').text(`${data.ball} %`);

                    if (data.ball >= 50){

                        $(`#status_nb`).html(`
                            <div class="col-md-12 badge bg-success">
                                NB o'tdi
                            </div>
                        `)
                    }else{
                        $(`#status_nb`).html(`
                            <div class="col-md-12 badge bg-danger">
                                NB muvaffaqiyatsiz tugadi
                            </div>
                        `)
                    }

                    $('#bus').click();
                }

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    window.onfocus = function() {
        user_active = !user_active;
    };
    window.onblur = function() {
        user_active = !user_active;
    };
</script>

@endpush
