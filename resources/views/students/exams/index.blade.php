@extends('template')

@section('script_include_header')

    <style>

        #video-area {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        canvas {
            position: absolute;
        }

    </style>

    <script defer src="{{ asset('face-api-0-22.min.js') }}"></script>

    <script defer>

        let img_user = '{{ asset('1.jpg') }}';

    </script>

    <script defer src="{{ asset('script.js') }}"></script>
@endsection

@section('body')


    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Fanlar</div>
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
                <h6 class="mb-0 text-uppercase">Fanlar ma'lumotlar bazasi</h6>
            </div>
    
            <hr>
    
            <div class="card radius-10">
                <div class="card-body" id="video-area">
                    <video id="video" width="600" height="450" autoplay>
                </div>
            </div>
        </div>
    </div>

@endsection