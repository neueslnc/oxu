@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Sinov</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi sinov</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Sinov qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="col-md-12">
                                <label for="name" class="form-label">Mavzu</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>

                            <div class="col-md-12">
                                <label for="subject" class="form-label">Fanlar</label>
                                <select class="form-select mb-3" id="subject" name="subject">
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject->id }}">{{ $subject->subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button id="add_accordion" class="col-md-12 btn btn-primary" type="button" onclick="addRow()">
                               Qo'shish
                            </button>
                            <div class="col-md-12">
                                <div class="accordion main_block" id="accordionExample">    
                                    <todo-item
                                    v-for="item in datas"
                                    v-bind:todo="item"
                                    v-bind:key="item.id"
                                    >
                                    </todo-item>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-primary px-5" onclick="send_data()">Saqlash</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>

@endsection

@push('scripte_include_end_body')

<script src="{{ url('vue/vue.global.js') }}"></script>

<script src="{{ url('vue/component.js') }}"></script>

<script>

function send_data() {
    
    $.ajax('{{ route('test_theme.store') }}', {
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            "theme_name" : $("#name").val(),
            "subject" : $("#subject").val(),
            "data" : vm.$data.datas
        },
        success: function (data, status) {

            console.log(status);

            if (status == 'success') {
                window.location.href = `{{ route('test_theme.index') }}`;
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            
            console.log(errorMessage);
        }
    });
}

</script>

@endpush