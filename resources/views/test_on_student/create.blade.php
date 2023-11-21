@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">O'qituvchilar</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi o'qituvchilar</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">O'qituvchilar qo`shish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('test_on_student.store') }}">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-12">
                                <label for="subject_id" class="form-label">Fanlar</label>
                                <select class="single-select" id="subject_id" name="subject_id">
                                    <option value=""></option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->subject->id }}">{{ $subject->subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-12">
                                <label for="mb_test_id" class="form-label">Mavzu</label>
                                <select class="single-select" id="mb_test_id" name="mb_test_id">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="student_id" class="form-label">Talaba</label>
                                <select class="single-select" id="student_id" name="student_id">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">Saqlash</button>
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

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>
 
    <script>

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        $('#subject_id').on('select2:select', function (e) {

            $.ajax('{{ route('get_test_theme') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subject_id" : e.params.data.id
                },
                success: function (data, status) {

                    let objects = [];

                    objects.push({id : '', text: ''})

                    for (const item of data.objects) {

                        objects.push({id : item.id, text: item.theme.theme_name})
                    }

                    $('#mb_test_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Ўқув режани танланг",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: objects,
                        disabled : false
                    });
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    
                    console.log(errorMessage);
                }
            });
        });

    </script>

@endpush