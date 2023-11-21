@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kompyuter nazorati</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Yangi kompyuter</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- @dd($teacher_edits) --}}
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Yangi kompyuter uchun shakl</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        @isset($control_pc)
                            <form class="row g-3" method="post" action="{{ route('supervisor_exams.control_pc.update',['control_pc'=>$control_pc->id]) }}">
                                @csrf
                                @method('PUT')
                        @else
                            <form class="row g-3" method="post" action="{{ route('supervisor_exams.control_pc.store') }}">
                                @csrf
                        @endisset
                       
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>
                           
                            <div class="col-md-12">
                                <label for="name" class="form-label">Nomi:</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ isset($control_pc) ? $control_pc->name : '' }}">
                            </div>

                            <div class="col-md-12">
                                <label for="nomer" class="form-label">Raqam:</label>
                                <input type="text" name="nomer" class="form-control" id="nomer" value="{{ isset($control_pc) ? $control_pc->nomer : '' }}">
                            </div>
                            
                            <div class="col-md-12">
                                <label for="local_ip" class="form-label">IP:</label>
                                <input type="text" name="local_ip" class="form-control" id="local_ip" value="{{ isset($control_pc) ? $control_pc->local_ip : '' }}">
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

    <script src="{{ url('jquery-mask/jquery.mask.min.js') }}"></script>

    <script>
        // var options =  { 
        //     onKeyPress: function(text, event, currentField, options){
        //                     if (text){
        //                         var ipArray = text.split(".");
        //                         var lastValue = ipArray[ipArray.length-1];
        //                         if(lastValue != "" && parseInt(lastValue) > 255){
        //                             ipArray[ipArray.length-1] = '255';
        //                             var resultingValue = ipArray.join(".");
        //                             currentField.text(resultingValue).val(resultingValue);
        //                         }
        //                     }             
        //                 },
        //     translation: {
        //             'Z': {
        //                 pattern: /[0-9]/, optional: true
        //             }
        //     }
        // };

        $(document).ready(function(){

            var options =  { 
                onKeyPress: function(text, event, currentField, options){
                                if (text){
                                    var ipArray = text.split(".");
                                    var lastValue = ipArray[ipArray.length-1];
                                    if(lastValue != "" && parseInt(lastValue) > 255){
                                        ipArray[ipArray.length-1] = '255';
                                        var resultingValue = ipArray.join(".");
                                        currentField.text(resultingValue).val(resultingValue);
                                    }
                                }             
                            },
                translation: {
                        'Z': {
                            pattern: /[0-9]/, optional: true
                        }
                }
            };

            $("#local_ip").mask("0ZZ.0ZZ.0ZZ.0ZZ", options);
        });
    </script>
@endpush