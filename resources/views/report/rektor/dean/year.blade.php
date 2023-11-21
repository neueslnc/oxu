@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Guruh Transfer</div>
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
                    v-bind:years="years"
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

    let years = {{ Js::from($years) }};

    let count = {{ $count }};

    let count_elements_page = {{ $count_elements_page }};

    let current_page = 1;

</script>

<script src="{{ url('vue/report/rektor/dean/year.js?21') }}"></script>

<script src="{{ url('vue/template/pagination/bootstrap.js?3') }}"></script>

<script>
    
    function get_exam(page = 0){

        let data = {
            "_token": "{{ csrf_token() }}",
            "paginate" : (pagination.current_page - 1),
            "count_elements_page" : $('#count_elements_page_id').val()
        };

        $.ajax('{{ route('reports.dean.filter_transfer_year_r') }}', {
            type: 'POST',
            data: data,
            success: function (data, status) {

                vm.years = data.objects;

                pagination.count = data.count;

            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });
    }

    $('#count_elements_page_id').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });

    $("#count_elements_page_id").on("select2:select", function(e){
        get_exam()
    });

</script>
@endpush