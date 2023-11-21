@extends('templaet_student')

@section('body')

{{-- <div class="d-flex align-items-center justify-content-center" style=""> --}}

        <div id="test">
            <test-item
            v-bind:test="test"
            v-bind:student="student"
            v-bind:direction="direction"
            v-bind:subject="subject"
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
                            <h5 class="modal-title" id="exampleModalLabel">Результаты</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Всего ответов:
                                </div>
                                <div class="col-md-6" id="question_count">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Правильно ответов:
                                </div>
                                <div class="col-md-6" id="question_count_accept">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Неправильно ответов:
                                </div>
                                <div class="col-md-6" id="question_count_rejecrect">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- </div> --}}

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>
{{--
<script>

    let datas = {{ Js::from($data) }};

    let user_active = true;

</script> --}}

<script>

    let student = {{ Js::from($student) }};

    let direction = {{ Js::from($direction) }};

    let subject = {{ Js::from($subject) }};

    let test = {{ Js::from($exams['question_exam'])  }}

</script>

<script src="{{ url('vue/nb_test_student.js') }}"></script>
<script>

    function set_variant(id){
        $.ajax('{{ route('student.set_variant') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : id
            },
            success: function (data, status) {

                if (data != 0){
                    $('#question_count').text(data.question_count)
                    $('#question_count_accept').text(data.question_success)
                    $('#question_count_rejecrect').text(data.question_rejerect)
                    $('#bus').click();
                }

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

</script>
@endpush
