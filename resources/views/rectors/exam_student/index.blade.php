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
                        v-bind:key="1"
                        >
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
</div>

<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    let students = {{ Js::from($all) }};

    let groups = {{ Js::from($groups) }};

</script>

<script src="{{ url('vue/report/rektor/test/index.js') }}"></script>

<script src="{{ url('vue/template/pagination/bootstrap.js?3') }}"></script>


<script>

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

    function get_exam(){
        $.ajax('{{ route('reports.test.filter_test') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "student_id" : $("#student_id").val(),
                "group_id" : $("#group_id").val(),
                "date_from" : $("#date_from").val(),
                "date_to" : $("#date_to").val(),
            },
            success: function (data, status) {

                vm.students = data.objects;
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

    $("#student_id").on("select2:select", function(e){
        get_exam()
    });

    $("#date_from").on("change", function(e){
        get_exam()
    });

    $("#date_to").on("change", function(e){
        get_exam()
    });

</script>
@endpush