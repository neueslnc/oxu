@extends('template')

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Talaba</div>
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
                <a class="btn btn-sm btn-inverse-warning" style="margin-right: 10px;" href="{{ route('supervisors.edit.allStudent',[$direction_id, $dean_id]) }}">Talaba ma'lumotlarni tahrirlash <i class="bx bxs-pencil"></i></a></li>
                <div id="test">
                    <main-component
                        v-bind:students="students"
                        v-bind:search_student="search_student"
                        v-bind:data="data"
                        v-bind:key="1"
                    >
                    </main-component>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="change_supervisor_direction_1" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="full_name"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="post">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="col-md-12">
                            <label for="birthday" class="form-label">tug`ilgan yili</label>
                            <input placeholder="tug`ilgan yili" type="text" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="col-md-12">
                            <label for="father_fio" class="form-label">otasining ismi</label>
                            <input placeholder="otasining ismi" type="text" class="form-control" id="father_fio" name="father_fio">
                        </div>
                        <div class="col-md-12">
                            <label for="number_phone" class="form-label">otasining telefon raqami</label>
                            <input placeholder="otasining telefon raqami" type="text" class="form-control" id="number_phone" name="number_phone">
                        </div>
                        <div class="col-md-12">
                            <label for="mather_fio" class="form-label">onasining ismi</label>
                            <input placeholder="onasining ismi" type="text" class="form-control" id="mather_fio" name="mather_fio">
                        </div>
                        <div class="col-md-12">
                            <label for="mather_phone" class="form-label">onasining telefon raqami</label>
                            <input placeholder="onasining telefon raqami" type="text" class="form-control" id="mather_phone" name="mather_phone">
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">yashash manzili</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-md-12">
                            <label for="address_temporarily" class="form-label">vaqtincha yashash joyi</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="address_temporarily" name="address_temporarily">
                        </div>
                        <div class="col-md-12">
                            <label for="deprived_of_parental" class="form-label">ota-ona qaramog`idan maxrum bo`lganlar</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="deprived_of_parental" name="deprived_of_parental">
                        </div>
                        <div class="col-md-12">
                            <label for="disabled" class="form-label">nogironligi bo`lgan</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="disabled" name="disabled">
                        </div>
                        <div class="col-md-12">
                            <label for="social_security" class="form-label">ijtimoiy ta`minotga muxtoj</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="social_security" name="social_security">
                        </div>
                        <div class="col-md-12">
                            <label for="court" class="form-label">sudlanganligi</label>
                            <input placeholder="yashash manzili" type="text" class="form-control" id="court" name="court">
                        </div>
                        <div class="col-md-12">
                            <label for="workplace" class="form-label">ish joyi</label>
                            <input placeholder="ish joyi" type="text" class="form-control" id="workplace" name="workplace">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" onclick="send_data()">Saqlash</button>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripte_include_end_body')

    <script src="{{ url('vue/vue.global.js') }}"></script>

    <script>

        let students = {{ Js::from($students) }};

        let data = students;

        let search_student = '';

    </script>

    <script src="{{ url('vue/report/super_visors/search_student.js?45') }}"></script>

    <script>

        $('#search_student').on('keyup', function (){

            vm.$data.data = vm.$data.students.filter(obj => {
                return Object.values(obj).some(value => String(value).includes($(this).val()));
            });
        });

        function send_data(){
            $.ajax('{{ route('set_metrick_student_data') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "user_id" : $('#user_id').val(),
                    "birthday" : $('#birthday').val(),
                    "father_fio" : $('#father_fio').val(),
                    "father_phone" : $('#father_phone').val(),
                    "number_phone" : $('#number_phone').val(),
                    "mather_fio" : $('#mather_fio').val(),
                    "mather_phone" : $('#mather_phone').val(),
                    "address" : $('#address').val(),
                    "address_temporarily" : $('#address_temporarily').val(),
                    "deprived_of_parental" : $('#deprived_of_parental').val(),
                    "disabled" : $('#disabled').val(),
                    "social_security" : $('#social_security').val(),
                    "court" : $('#court').val(),
                    "workplace" : $('#workplace').val()
                },
                success: function (data, status) {

                    if (data.status == 'success') {
                        succes_noti(msg="operatsiya muvaffaqiyatli yakunlandi");

                        let student_id = $('#user_id').val();

                        vm.$data.students = vm.$data.students.map(item => item.id == student_id ? data.user : item );
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    error_noti(errorMessage);
                }
            });
        }

    </script>

@endpush
