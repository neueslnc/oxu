@extends('template')

@section('body')
    <div style="margin-left: 260px;margin-right: 20px;" class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"><a href="{{ route('specialty.index') }}">Mutaxassisliklar</a></div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Mutaxassislik o'zgartirish</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form class="row g-3" method="post" action="{{ route('specialty.update',['specialty'=>$specialty]) }}">
                        @method('PUT')
                        @csrf

                        <div class="col-md-6">
                            <label for="student_id" class="form-label">Mutaxassislik kodi</label>
                            <input placeholder="Mutaxassislik kodi" type="number" class="form-control" id="student_id" name="code" value="{{ $direction->code }}">
                            @error('code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-5">
                            <label class="form-label" id="supervisor">Mutaxassislik shakli</label>
                            <select name="type" class="single-select select2-hidden-accessible" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                <option value="">Shaklni tanlang</option>
                                @foreach($types as $type)
                                    @if($type->id==$direction->form_of_education_id)
                                        <option selected value="{{ $type->id }}">{{ $type->title }}</option>
                                    @elseif($type->id!=$direction->form_of_education_id)
                                        <option value="{{ $type->id }}">{{ $type->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" id="supervisor">Mutaxassislik tili</label>
                            <select name="language_id" class="single-select select2-hidden-accessible" data-select2-id="8" tabindex="-1" aria-hidden="true">
                                <option value="">Tilni tanlang</option>

                                @foreach($languages as $language)
                                    @if($language->id==$direction->language_id)
                                        <option selected value="{{ $language->id }}">{{ $language->name }}</option>
                                    @elseif($language->id!=$direction->language_id)
                                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('type')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="hemis_id" class="form-label">Mutaxassislik nomi</label>
                            <input placeholder="Mutaxassislik nomi" type="text" class="form-control " id="hemis_id" name="name" value="{{$direction->title}}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('style')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}">
@endpush
@push('scripte_include_end_body')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
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
        })
    </script>
   {{-- <script>

      function filter_group() {

            $.ajax('{{ route('get_type') }}', {
                type : "GET",
                data : {
                    'form_of_education_id' : $('#form_of_education_id').val(),
                    'user' : $('#user').val(),

                },
                success : function (data, status){
                    console.log(data);


                    let format_data = []


                    for (const iterator of data.direction) {
                        format_data.push({
                            id : iterator.id,
                            text : `${iterator.code} ${iterator.title}`,
                        })
                    }



                //     $("#language_id").html(``);


                    $('#direction_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Guruhni tanlang",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: format_data,
                        disabled : false,
                    });
               }
            })};


        $('#form_of_education_id').on('select2:select', function () {
            filter_group();
        });



</script> --}}
@endpush
