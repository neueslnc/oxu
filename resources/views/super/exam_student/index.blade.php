@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Exam test</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <h6 class="mb-0 text-uppercase">Talaba</h6>
        </div>

        <hr>

        <div class="card radius-10">
                 <div class="card-body">

                    <div id="test">
                        <test-item
                        v-bind:exams="exams"
                        >
                        </test-item>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script>

    let exams = {{ Js::from($exam_results) }};

</script>

<script src="{{ url('vue/component_super_view_test_exam.js') }}"></script>

<script>

    setInterval(() => {
        
        $.ajax('{{ route('superadmin.get_update_objects') }}', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success: function (data, status) {

                vm.exams = data.data;

                console.log(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {

                console.log(errorMessage);
            }
        });

    }, 1000);

</script>
@endpush

