@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Talaba</div>
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
                    v-bind:languages="languages"
                    v-bind:type_of_educations="type_of_educations"
                    v-bind:form_of_educations="form_of_educations"
                    v-bind:group_courses="group_courses"
                    v-bind:academic_years="academic_years"
                    v-bind:search_group="search_group"
                    v-bind:search_criteria="search_criteria"
                    v-bind:count_elements_page="count_elements_page"
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

    let students = {{ Js::from($all) }};

    let groups = {{ Js::from($groups) }};

    let directions = {{ Js::from($directions) }};

    let languages = {{ Js::from($languages) }};

    let type_of_educations = {{ Js::from($type_of_educations) }};

    let form_of_educations = {{ Js::from($form_of_educations) }};

    let group_courses = {{ Js::from($group_courses) }};

    let academic_years = {{ Js::from($academic_years) }};

    let count = {{ $count }};

    let count_elements_page = {{ $count_elements_page }};

    let current_page = 1;

</script>

<script src="{{ url('vue/report/rektor/dean/index.js?3') }}"></script>

<script src="{{ url('vue/template/pagination/bootstrap.js?3') }}"></script>

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

    $('#language_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#form_of_education_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#type_of_education_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#group_course_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $('#academic_year_id').select2({
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
    
    function get_exam(page = 0){

        let data = {
            "_token": "{{ csrf_token() }}",
            "paginate" : (pagination.current_page - 1),
            "count_elements_page" : $('#count_elements_page_id').val()
        };

        data['date_from'] = $("#date_from").val(); 
        data['date_to'] = $("#date_to").val(); 

        if (vm.$data.search_group) {
            data['group_id'] = $("#group_id").val(); 
        }else{
            data['direction_id'] = $("#direction_id").val(); 
            data['language_id'] = $("#language_id").val(); 
            data['type_of_education_id'] = $("#type_of_education_id").val(); 
            data['form_of_education_id'] = $("#form_of_education_id").val(); 
            data['group_course_id'] = $("#group_course_id").val(); 
            data['academic_year_id'] = $("#academic_year_id").val(); 
        }

        $.ajax('{{ route('reports.dean.filter_student_r') }}', {
            type: 'POST',
            data: data,
            success: function (data, status) {

                if (vm.$data.search_group) {
                    $("#direction_id").val(data.objects[0].dean_group.direction_id).trigger('change'); 
                    $("#language_id").val(data.objects[0].dean_group.language_id).trigger('change'); 
                    $("#type_of_education_id").val(data.objects[0].dean_group.type_of_education_id).trigger('change'); 
                    $("#form_of_education_id").val(data.objects[0].dean_group.form_of_education_id).trigger('change'); 
                    $("#group_course_id").val(data.objects[0].dean_group.group_course_id).trigger('change'); 
                    $("#academic_year_id").val(data.objects[0].dean_group.group_akademik_year).trigger('change'); 
                }else{
                    $("#group_id").val("").trigger('change'); 
                }

                vm.students = data.objects;

                pagination.count = data.count;

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    $("#group_id").on("select2:select", function(e){
        get_exam()
    });

    $("#direction_id").on("select2:select", function(e){
        get_exam()
    });

    $("#language_id").on("select2:select", function(e){
        get_exam()
    });

    $("#type_of_education_id").on("select2:select", function(e){
        get_exam()
    });

    $("#form_of_education_id").on("select2:select", function(e){
        get_exam()
    });

    $("#group_course_id").on("select2:select", function(e){
        get_exam()
    });

    $("#academic_year_id").on("select2:select", function(e){
        get_exam()
    });

    $("#count_elements_page_id").on("select2:select", function(e){
        get_exam()
    });

    

</script>
@endpush