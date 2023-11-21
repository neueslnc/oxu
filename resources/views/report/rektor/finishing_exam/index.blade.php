@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Test talaba</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        <div class="card radius-10">
            <div class="card-body">
                <div id="test">
                    <main-component
                    v-bind:groups="groups"
                    v-bind:students="students"
                    v-bind:directions="directions"
                    v-bind:subjects="subjects"
                    v-bind:include_send_button="true"
                    v-bind:include_operation_button="true"
                    v-bind:key="1"
                    >
                    </main-component>
                </div>
                <div id="pagination" style="margin: 0; padding: 10px;">
                    <pagination-component
                    v-bind:count="count"
                    v-bind:current_page="current_page"
                    v-bind:key="1">
                    </pagination-component>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Talaba</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <form class="row g-3 p-3">
                    <input type="hidden" id="theme_id">
                    <div class="col-md-12">
                        <label for="ball_id" class="form-label">Ball</label>
                        <input class="form-control mb-3" id="ball_id">
                    </div>
                    <div class="col-md-12">
                        <label for="question_count" class="form-label">Savollar</label>
                        <input class="form-control mb-3" id="question_count_id">
                    </div>
                    <div class="col-md-12">
                        <label for="question_success" class="form-label">To'g'ri javoblar</label>
                        <input class="form-control mb-3" id="question_success_id">
                    </div>
                    <div class="col-md-12">
                        <label for="question_rejerect" class="form-label">Noto'g'ri javoblar</label>
                        <input class="form-control mb-3" id="question_rejerect_id">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish</button>
            <button id="save_change_group" type="button" class="btn btn-primary" onclick="submit_result_exam()">Saqlash</button>
        </div>
        </div>
    </div>
</div>

<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    let students = {{ Js::from($all) }};

    let groups = {{ Js::from($groups) }};

    let directions = {{ Js::from($directions) }};

    let subjects = {{ Js::from($subjects) }};

    let count = {{ $count }};

    let current_page = 1;

</script>

<script src="{{ url('vue/report/rektor/test/index.js') }}"></script>

<script src="{{ url('vue/template/pagination/bootstrap.js?3') }}"></script>

<script>

    // $('#exampleModal').on('shown.bs.modal', function (e) {
    //     $('[aria-labelledby = "select2-group_id-container"]').css('display', 'none');
    //     $('[aria-labelledby = "select2-student_id-container"]').css('display', 'none');
    // });

    // $('#exampleModal').on('hide.bs.modal', function (e) {
    //     $('[aria-labelledby = "select2-group_id-container"]').css('display', '');
    //     $('[aria-labelledby = "select2-student_id-container"]').css('display', '');
    // });

    $('#group_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });


    $('#student_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#direction_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#subject_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    function get_exam(page = 0){
        $.ajax('{{ route('reports.test.filter_test') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "student_id" : $("#student_id").val(),
                "group_id" : $("#group_id").val(),
                "direction_id" : $("#direction_id").val(),
                "subject_id" : $("#subject_id").val(),
                "date_from" : $("#date_from").val(),
                "date_to" : $("#date_to").val(),
                "paginate" : (pagination.current_page - 1),
                "status" : 1
            },
            success: function (data, status) {

                vm.students = data.objects;
                
                pagination.count = data.count;

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    $("#group_id").on("select2:select", function(e){
        console.log(e.params.data.id);

        $.ajax('{{ route('reports.test.get_student') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "group_id" : e.params.data.id
            },
            success: function (data, status) {

                let objects = [];

                objects.push({id : ' ', text: ' '})

                for (const item of data.objects) {

                    objects.push({id : item.id, text: item.full_name})
                }

                $('#student_id').empty().select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: "Ўқув режани танланг",
                    allowClear: Boolean($(this).data('allow-clear')),
                    data: objects,
                    disabled : false
                });

                get_exam();
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    });

    function submit_result_exam() {
        
        $.ajax('{{ route('reports.exam_student.save_exam_result_supervisor') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "theme_id" : $("#theme_id").val(),
                "supervisor_ball" : $("#ball_id").val(),
                "supervisor_question_count" : $("#question_count_id").val(),
                "supervisor_question_success" : $("#question_success_id").val(),
                "supervisor_question_rejerect" : $("#question_rejerect_id").val()
            },
            success: function (data, status) {

                succes_noti(msg="Ma'lumotlar saqlandi");

                get_exam(pagination.current_page);
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    function send_supervisor_view(id, status) {
        $.ajax('{{ route('reports.exam_student.set_supervisor_view') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "theme_id" : id,
                "supervisor_view" : status
            },
            success: function (data, status) {

                succes_noti(msg="Ma'lumotlar saqlandi");

                get_exam(pagination.current_page);
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    function send_all_supervisor_view() {
        $.ajax('{{ route('reports.exam_student.set_supervisor_view') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "supervisor_view" : 1
            },
            success: function (data, status) {

                succes_noti(msg="Ma'lumotlar saqlandi");

                get_exam(pagination.current_page);
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    $("#student_id").on("select2:select", function(e){
        get_exam()
    });

    $("#date_from").on("change", function(e){
        get_exam()
    });

    $("#date_to").on("change", function(e){
        get_exam()
    });

    $("#direction_id").on("change", function(e){
        get_exam()
    });

    $("#subject_id").on("change", function(e){
        get_exam()
    });

</script>
@endpush