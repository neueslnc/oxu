@extends('template')

@section('body')

    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Nb</div>
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
                            v-bind:all="all"
                            v-bind:groups="groups"
                            v-bind:directions="directions"
                            v-bind:subjects="subjects"
                            v-bind:teachers="teachers"
                            v-bind:supervisors="supervisors"
                            v-bind:user_level="user_level"
                            {{-- v-bind:count_elements_page="count_elements_page" --}}
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

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

@endsection

@push('scripte_include_end_body')

    <script src="{{ url('vue/vue.global.js') }}"></script>

    <script>

        let all = {{ Js::from($all) }};

        let groups = {{ Js::from($groups) }};

        let directions = {{ Js::from($directions) }};

        let subjects = {{ Js::from($subjects) }};

        let teachers = {{ Js::from($teachers) }};

        let supervisors = {{ Js::from($supervisors) }};

        let count = {{ $count }};

        let user_level = {{ Auth::user()->level_id }};

        let count_elements_page = {{ $count_elements_page }};

        let current_page = 1;

    </script>

    <script src="{{ url('vue/supervisor/nb/index.js?27') }}"></script>

    <script src="{{ url('vue/template/pagination/bootstrap.js?29') }}"></script>

    <script>

        $('#group_id').select2({
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

        $('#count_elements_page_id').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        $('#teacher_id').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        $('#supervisor_id').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        function get_exam(page = 0){

            let data = {
                "_token": "{{ csrf_token() }}",
                "paginate" : (pagination.current_page - 1),
                "count_elements_page" : Number($('#count_elements_page_id').val()),
                "search_input" : $('#search_input').val()
            };

            data['group_id'] = $("#group_id").val();
            data['direction_id'] = $("#direction_id").val();
            data['subject_id'] = $("#subject_id").val();
            data['teacher_id'] = $("#teacher_id").val();
            data['supervisor_id'] = $("#supervisor_id").val();
            data['date_from'] = $("#date_from").val();
            data['date_to'] = $("#date_to").val();

            $.ajax('{{ route('test_nb.store') }}', {
                type: 'POST',
                data: data,
                success: function (data, status) {
                    try {

                        vm.all = data.objects;

                        pagination.count = data.count;

                    } catch (error) {

                        vm.all = [];

                        pagination.count = [];
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    console.log(errorMessage);
                }
            });
        }

        $("#group_id").on("select2:select", function(e){
            get_exam();
        });

        $("#direction_id").on("select2:select", function(e){
            get_exam();
        });

        $("#subject_id").on("select2:select", function(e){
            get_exam();
        });

        $("#teacher_id").on("select2:select", function(e){
            get_exam();
        });

        $("#count_elements_page_id").on("select2:select", function(e){
            get_exam();
        });

        $("#search_input").on("keyup", function (e) {
            get_exam();
        });

        $("#date_from").on("change", function(e){
            get_exam()
        });

        $("#date_to").on("change", function(e){
            get_exam()
        });

        $("#supervisor_id").on("change", function(e){
            get_exam()
        });

    </script>
@endpush
