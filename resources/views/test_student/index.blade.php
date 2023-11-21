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

    <div class="container ">

        <div class="card py-5">
            <div class="card-header">
                Test {{ $data['test_on_student_questions_count'] - $data['test_on_student_questions_active_count'] }} in {{ $data['test_on_student_questions_count'] }}
            </div>
            <div class="card-body p-4">

                <div id="test">

                    <test-item
                        v-bind:test="datas"
                        v-bind:key="datas.id"
                        v-bind:flag_writing="status.flag_writing"
                        v-bind:confirm_student="status.confirm_student"
                        v-bind:counter="counter"
                        v-bind:timer="status.timer"
                    >
                    </test-item>

                    <btn-send
                        v-bind:data="datas"
                        v-bind:key="datas.id"
                        v-bind:counter="counter"
                        v-bind:flag_writing="status.flag_writing"
                        v-bind:confirm_student="status.confirm_student"
                    >
                    </btn-send>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    let datas = {{ Js::from($data) }};

    let user_active = true;

</script>

<script src="{{ url('vue/test_on_student_component.js') }}"></script>

<script>

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
    
        $.ajax('{{ route('passing_test_store', ['key' => $data['access_key'] ]) }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : vm.$data.datas.test_on_student_question.id,
                "access_key" : vm.$data.datas.access_key,
                "data" : vm.$data.datas.test_on_student_question.test_on_student_answers
            },
            success: function (data, status) {

                console.log(status);

                if (status == 'success') {
                    window.location.href = `{{ route('passing_test', ['key' => $data['access_key'] ] ) }}`;
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
    window.omblur = function() {
        user_active = !user_active;
    };
</script>

@endpush