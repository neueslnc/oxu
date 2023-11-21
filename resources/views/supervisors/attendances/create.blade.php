@extends('template')
@section('body')
    <div class="page-wrapper" style="margin-right: 10px;">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Nazorat</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item" id="group_selected">
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="card" data-select2-id="23">

        </div>

        <div class="card">
            <div class="card-body" id="wizard_component">
                <wizard
                v-bind:student_groups="student_groups"
                v-bind:students="students"
                v-bind:select_students="select_students"
                v-bind:semesters="semesters"
                v-bind:directions="directions"
                v-bind:sciences="sciences"
                v-bind:themes="themes"
                v-bind:teachers="teachers"
                v-bind:subjects="subjects"
                >
                </wizard>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
@endpush
@push('scripte_include_end_body')


    <script src="{{ url('vue/vue.global.js') }}"></script>
    <script>
        let student_groups = {{ Js::from($student_groups) }};

        let semesters = {{ Js::from($semesters) }};

        let directions = {{ Js::from($directions) }};

        let sciences = {{ Js::from($sciences) }};

        let subjects = {{ Js::from($subjects) }};
    </script>
    <script src="{{ url('vue/create_nb_component.js?24') }}"></script>

    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script>

        function fetch_theme(){

            $.ajax('{{ route('supervisors.get_themes') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subject_id" : $('#subject_id').val(),
                    "semester_id" : $('#semester_id').val(),
                    // "direction_id" : $('#direction_id').val(),
                    "teacher_id" : $('#teacher_id').val(),
                    // 'direction_id': vm.$data.student_groups[0].direction_id,
                },
                success: function (data, status) {

                    let objects = [];

                    objects.push({id : '', text: ''})

                    for (const item of data.items) {

                        if(item.theme_mb){

                            if(item.theme_mb.notWritingQuestions > 0){
                                objects.push({id : item.theme_mb.id, text: `${item.theme_name} - ${item.teacher.full_name}`})
                            }
                        }
                    }

                    // console.log(objects);

                    $('#theme_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Ўқув режани танланг",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: objects,
                        disabled : false
                    });

                    // vm.themes = [];

                    // for (const item of data.items) {

                    //     vm.themes.push({id : item.id, name: item.theme_name});
                    // }
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    console.log(errorMessage);
                }
            });
        }

        function succes_noti(title = "Проверен", msg="") {
            Lobibox.notify('success', {
                title: title,
                pauseDelayOnHover: true,
                size: 'mini',
                icon: 'bx bx-check-circle',
                continueDelayOnInactiveTab: false,
                position: 'top right',
                msg: msg
            });
        }

        function error_noti(title = "Xato", msg="") {
            Lobibox.notify('error', {
                title: title,
                pauseDelayOnHover: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: 'bx bx-x-circle',
                msg: msg
            });
        }

        $('#semester_id').on('select2:select', function (e) {

            fetch_theme();
        });

        // $('#group_id').on('select2:select', function (e) {

        //     fetch_theme();
        // });

        $('#subject_id').on('select2:select', function (e) {

            fetch_theme();
        });

        // {{--$('#subject_id').on('select2:select', function (e) {--}}
        // {{--    $.ajax('{{ route('supervisors.get_teacher') }}', {--}}
        // {{--        type: 'POST',--}}
        // {{--        data: {--}}
        // {{--            "_token": "{{ csrf_token() }}",--}}
        // {{--            "subject_id" : e.params.data.id--}}
        // {{--        },--}}
        // {{--        success: function (data, status) {--}}

        // {{--            let objects = [];--}}

        // {{--            objects.push({id : '', text: ''})--}}

        // {{--            for (const item of data.items) {--}}

        // {{--                objects.push({id : item.user.id, text: item.user.full_name})--}}
        // {{--            }--}}

        // {{--            $('#teacher_id').empty().select2({--}}
        // {{--                theme: 'bootstrap4',--}}
        // {{--                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',--}}
        // {{--                placeholder: "Ўқув режани танланг",--}}
        // {{--                allowClear: Boolean($(this).data('allow-clear')),--}}
        // {{--                data: objects,--}}
        // {{--                disabled : false--}}
        // {{--            });--}}

        // {{--            fetch_theme();--}}

        // {{--        },--}}
        // {{--        error: function (jqXhr, textStatus, errorMessage) {--}}
        // {{--            console.log(errorMessage);--}}
        // {{--        }--}}
        // {{--    });--}}
        // {{--});--}}

        $('#teacher_id').on('select2:select', function (e) {
            fetch_theme();
        });


        $("#group_id").on("select2:select", function(e){
            $.ajax('{{ route('supervisors.get_students') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "group_id" : e.params.data.id
                },
                success: function (data, status) {

                    for (let a of data.items) {

                        a.status = false;
                    }

                    vm.$data.students = data.items;

                    $('#smartwizard').smartWizard("reset");
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    console.log(errorMessage);
                }
            });
        });

        // $("#form_education_id").on("select2:select", function(e){
        //     let objects = [];
        //
        //     objects.push({id : '', text: ''})
        //
        //         for (const item of directions.filter(item => item.form_of_education_id == e.params.data.id)) {
        //
        //         objects.push({id : item.id, text: item.title})
        //     }
        //
        //     $('#direction_id').empty().select2({
        //         theme: 'bootstrap4',
        //         width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //         placeholder: "Ўқув режани танланг",
        //         allowClear: Boolean($(this).data('allow-clear')),
        //         data: objects,
        //         disabled : false
        //     });
        // });

        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transition: {
                animation: 'slide-horizontal', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            },
            toolbarSettings: {
                toolbarPosition: 'both', // both bottom
                // toolbarExtraButtons: [btnFinish, btnCancel]
            },
            lang: { // Language variables for button
                next: 'Oldinga',
                previous: 'Orqaga'
            },
        });

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}"></script>

    <script>

        $("#student_group_id").on("select2:select", function (e) {
            console.log('asd');
        });

        $('#btn-submit').on('click', function (e) {
            if(vm.select_students.length == 0){
                return error_noti(msg="Выберите студента.");
            }

            if($('#subject_id').val() == ''){
                return error_noti(msg="Выберите предмет.");
            }
            if($('#semester_id').val() == ''){
                return error_noti(msg="Выберите семестр.");
            }
            // if($('#direction_id').val() == ''){
            //     return error_noti(msg="Выберите направления.");
            // }

            if($('#theme_id').val() == ''){
                return error_noti(msg="Выберите темы.");
            }

            succes_warn(msg="Ждите данные сохраняются")

            $.ajax('{{ route('supervisors.add_mb_on_student') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "students" : vm.select_students,
                    "subject_id" : $('#subject_id').val(),
                    "semester_id" : $('#semester_id').val(),
                    // "direction_id" : $('#direction_id').val(),
                    "theme_id" : $('#theme_id').val(),
                    "pair" : $('#pair').val(),
                    "date" : $('#date').val(),
                },
                success: function (data, status) {

                    if (data.status == '1') {
                        succes_noti(msg="NB добвен");
                        vm.select_students = [];
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    error_noti(errorMessage);
                }
            });

        })

    </script>
@endpush

