@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Testlar</div>
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
            <h6 class="mb-0 text-uppercase">Testlar</h6>
            <div class="ms-auto">
                <button type="button" class="btn btn-success px-5" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Import XLXS</button>
            </div>
            <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tests Import excel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('student_test_import') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="card">
                                    <div class="card-body">
                                            @csrf
                                            <div class="col-md-12">
                                                <label for="name" class="form-label">Mavzu</label>
                                                <input type="text" name="name" class="form-control" id="name">
                                            </div>
                                            <input name="file_xlsx" class="form-control form-control-lg" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" id="file_xlsx" type="file">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <hr>
        <div class="card radius-10">
                 <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nomi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $item)
                                    <tr>
                                        <td>
                                            {{ $item['name'] }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
            </div>
        </div>
   </div>
</div>
<script>
    $(document).ready(function () {
        $('#image-uploadify').imageuploadify();
    })
</script>
@endsection