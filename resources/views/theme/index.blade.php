
@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Mavzu</div>
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
            <h6 class="mb-0 text-uppercase">Mavzu bazasi</h6>
        </div>

        <div class="d-flex align-items-center">
            <div class="ms-auto">
                <a href="{{ route('theme_subject.create') }}" class="btn btn-primary px-3"><i class="bx bx-plus"></i>Yangi mavzu</a>
            </div>
        </div>


        <hr>


        <div class="card radius-10">
                 <div class="card-body">

                    <div class="">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fixed_header2 align-middle">#</th>
                                    <th class="fixed_header2 align-middle">Mavzu</th>
                                    <th class="fixed_header2 align-middle">Yo'nalish</th>
                                    <th class="fixed_header2 align-middle">Semestr</th>
                                    <th class="fixed_header2 align-middle">Fan</th>
                                    <th class="fixed_header2 align-middle">Yangilash</th>
                                    <th class="fixed_header2 align-middle">O'chirish</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($themes as $i => $theme)
                                    <tr>

                                        <td>
                                            {{ ++$nomer }}
                                        </td>
                                        <td>
                                            {{ $theme->theme_name }}
                                        </td>
                                        <td>
                                            {{ $theme->direction->title }}
                                        </td>
                                        <td>
                                            {{ $theme->semester->name }}
                                        </td>
                                        <td>
                                            {{ $theme->theme_subject[0]->name }}
                                        </td>
                                        <td><a href="{{ route('theme_subject.edit',$theme) }}" class="btn btn-info">Yangilash</a></td>
                                        <td>
                                            <form action="{{ route('theme_subject.destroy',$theme) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                {{-- <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this data ?');">Delete</button> --}}
                                                <input type="submit" class="btn btn-danger" onclick='confirmUser()' value="O'chirish">
                                                {{-- <a href='#' onclick='confirmUser()'>delete</a> --}}
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-body">

                            {{ $themes->links() }}
                        </div>
                    </div>


                 </div>
            </div>
        </div>
   </div>
</div>
<script>
     function confirmUser(){
    var ask=confirm("Siz ma'lumotni o'chirishni xohlaysizmi ? ");
    if(ask){
      window.location="/delete";
     }
}
</script>
@endsection
