@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3" >
            <div class="breadcrumb-title pe-3" >O'quv jarayoni</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Imtihonlar ro'yxati</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Imtihonlar ro'yxati Forma</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="post" action="{{ route('supervisor_exams.exam.store') }}">
                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nomi</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Nazorat</label>
                                        <select class="form-select mb-3" name="control_type_id">
                                            <option selected>Nazorat turini tanlang</option>
                                            <option value="1">Yakuniy</option>
                                            <option value="2">Oralik</option>
                                            <option value="2">Umumiy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Faol</label>
                                        <select class="form-select mb-3" name="status">
                                            <option value="1">Ha</option>
                                            <option value="2">Yo'q</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="explanation" class="form-label">Izoh</label>
                                <textarea class="form-control" id="explanation" name="explanation" rows="5"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="start_date" class="form-label">Boshlanish</label>
                                        <input type="datetime-local" class="form-control" onchange="set_format(this, '#start_date')">
                                        <input type="hidden" name="start_date" id="start_date" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expiration_date" class="form-label">Tugash</label>
                                        <input type="datetime-local" class="form-control" onchange="set_format(this, '#expiration_date')">
                                        <input type="hidden" name="expiration_date" id="expiration_date" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="time_limit_minutes" class="form-label">Vaqti (daqiqa)</label>
                                        <input type="number" name="time_limit_minutes" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="maximum_score" class="form-label">Maks. ball</label>
                                        <input type="number" name="maximum_score" class="form-control">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-6">
                                <label class="form-label">O'quv reja</label>
                                <div class="input-group">
                                    <select id="syllabus_id" name="syllabus_id" class="single-select form-select">
                                        <option></option>
                                        @foreach ($syllabus as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                    </button>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="attempts" class="form-label">Urinishlar</label>
                                        <input type="number" name="attempts" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="number_questions" class="form-label">Savollar soni</label>
                                        <input type="number" name="number_questions" class="form-control">
                                    </div>
                                    {{-- <div class="col-md-4" >
                                        <label for="random" class="form-label">Tasodifiy</label>
                                        <select class="form-select mb-3" name="random" aria-label="Default select example">
                                            <option value="1">Ha</option>
                                            <option value="2">Yo'q</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-6" >
                                        <label for="tur" class="form-label">Tur</label>
                                        <select class="form-select mb-3" name="tur" aria-label="Default select example">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @php
                                
                                $filtered = $academic_years->where('start_date', '=', date('Y-01-01'))->first();

                            @endphp
                            <input type="hidden" name="academic_year_id" value="{{ $filtered['id'] }}">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="academic_year_id" class="form-label">O‘quv yili </label>
                                        <select class="form-select mb-3" disabled>
                                            @foreach ($academic_years as $item)
                                                <option value="{{ $item['id'] }}" {{ $item['id'] ==  $filtered->id ? "selected" : "" }}>{{ $item['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="semester_id" class="form-label">Semestr</label>
                                        <div class="input-group">
                                            <select id="semesters" class="form-select" name="semester_id">
                                                @foreach ($semestrs as $semestr)
                                                    <option value="{{ $semestr['id'] }}">{{ $semestr['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="direction_id" class="form-label">Fanlar</label>
                                        <div class="input-group">
                                            <select id="direction_id" class="single-select form-select" name="direction_id">
                                                @foreach ($directions as $direction)
                                                    <option value="{{ $direction['id'] }}">{{ $direction['title'] }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="subject_id" class="form-label">Yo'nalishlar</label>
                                        <div class="input-group">
                                            <select id="subject_id" class="single-select form-select" name="subject_id">
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject['id'] }}">{{ $subject['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
<script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

<script>
    
    function set_format(item, parent) {

        let x = $(item).val();

        x = x.replace("T", " ");

        $(parent).val(x);
    }

    $("#semesters").select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        allowClear: Boolean($(this).data('allow-clear')),
        // disabled : true
    });
        
    $("#direction_id").select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: "Ўқув режани танланг",
        allowClear: Boolean($(this).data('allow-clear'))
    });

    $("#subject_id").select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        // disabled : true
    });
        
    $('#syllabus_id').on('select2:select', function (e) {

        $.ajax('/test', {
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : e.params.data.id
            },
            success: function (data, status) {

                let objects = [];

                objects.push({id : '', text: ''})

                for (const item of data.objects) {

                    objects.push({id : item.semester.id, text: item.semester.name})
                }

                $('#semesters').empty().select2({
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

    // $('#semesters').on('select2:select', function (e) {

    //     $.ajax('/test1', {
    //         type: 'POST',
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "semester_id" : e.params.data.id,
    //             "syllabus_id" : $('#syllabus_id').val()
    //         },
    //         success: function (data, status) {

    //             let objects = [];

    //             objects.push({id : '', text: ''})

    //             for (const item of data.objects) {

    //                 objects.push({id : item.id, text: item.name})
    //             }

    //             $('#science_id').empty().select2({
    //                 theme: 'bootstrap4',
    //                 width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    //                 placeholder: "Ўқув режани танланг",
    //                 allowClear: Boolean($(this).data('allow-clear')),
    //                 data: objects,
    //                 disabled : false

    //             });
    //         },
    //         error: function (jqXhr, textStatus, errorMessage) {
                
    //             console.log(errorMessage);
    //         }
    //     });
    // });
    
</script>
    
@endsection