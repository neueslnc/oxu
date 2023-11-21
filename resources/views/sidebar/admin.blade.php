<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ url('logo.png') }}" width="10" height="50" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text"><a style="color: #fff" href="{{ route('dean.homepage') }}">

                    {{ env('APP_NAME') }}
                </a></h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        @role('super_admin')
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Xodimlar</div>
                </a>
                <ul>
                    {{-- <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.departament.index') }}')"><i class="bx bx-right-arrow-alt"></i>Kafedra</a>
                    </li> --}}


                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.user.index') }}')"><i class="bx bx-right-arrow-alt"></i>Foydalanuvchi</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Kafedra</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.departament.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Kafedralar bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">SMS-Xabarnoma </div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.sms_message.index',['admin_id'=>Auth::user()->id]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">SMS-Xabar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Exam</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('superadmin.exam_student.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Talaba natijasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        @role('nb_controller')

            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">NB</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('test_nb.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">NB bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>

        @endrole

        @role('admin')
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">O'qituvchilar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('teacher.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">O'qituvchilar bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Fanlar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('subject.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Fanlar ma'lumotlar bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Talabalar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('student_group.index') }}')"><i class="bx bx-right-arrow-alt"></i>Akademik guruhlar</a>
                    </li>
                    <li>
                        <a href="#" onclick="redrect('{{ route('student.index') }}')"><i class="bx bx-right-arrow-alt"></i>Talabalar ro'yxati</a>
                    </li>
                </ul>
            </li> -->
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Test</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('student_test.index') }}')"><i class="bx bx-right-arrow-alt"></i>Testlar</a>
                    </li>
                </ul>
            </li>
        @endrole

        @role('teacher')

            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Sinov</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('test_theme.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Sinov bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Mavzu</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('theme_subject.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Mavzu bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>

        @endrole
        @role('admin')

        @endrole
        @role('student')
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">O'zlashtirish</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('std/example')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Imtihonlar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Dars jadvallari</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">NB</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('student_nb.index') }}" onclick="">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">NB</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">TEST</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('std/example')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Imtihonlar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Dars jadvallari</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole
        @role('supervisor')
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Nazoratchi bo'limi</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('supervisors.create') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Nazorat</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                {{-- <li>
                    <a href="#" onclick="redrect('{{ route('supervisors.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Nazorat jadvali</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li> --}}
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">NB</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('test_nb.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">NB bazasi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Guruh</div>
            </a>

            @php
                $dean_groups = Auth::user()->get_group_supervisors;
            @endphp

            <ul>
                @foreach ($dean_groups as $item)
                    <li>
                        <a href="#" onclick="redrect('{{ route('supervisors.dean_group.show', ['dean_group' => $item->id]) }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">{{ $item->title }}</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        {{-- <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Talaba tekshiruvi</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('students.login') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">FACE ID</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li> --}}
        @endrole

        @role('supervisor_exams')
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">O'quv jarayoni</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('supervisor_exams.exam.index') }}')"><i class="bx bx-right-arrow-alt"></i>Imtihonlar ro'yxati</a>
                </li>
                <li>
                    {{-- <a href="#" onclick="redrect('{{ route('emloyees.index') }}')"><i class="bx bx-right-arrow-alt"></i>Foydalanuvchi</a> --}}
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Barcha kompyuterlar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('supervisor_exams.control_pc.index') }}')"><i class="bx bx-right-arrow-alt"></i>Barcha kompyuterlar</a>
                </li>
                <li>
                    {{-- <a href="#" onclick="redrect('{{ route('emloyees.index') }}')"><i class="bx bx-right-arrow-alt"></i>Foydalanuvchi</a> --}}
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Talaba tekshiruvi</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('students.login') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">FACE ID</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('supervisor_exams.face_id_login_group') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">FACE ID GROUP</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-history'></i>
                </div>
                <div class="menu-title">Hisobot</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('supervisor_exams.report.index') }}" onclick="redirect('{{ route('supervisor_exams.report.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Exam result talaba</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        @endrole

        @role('dean')

            {{-- <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Test</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('reports.dean') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">student</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-duplicate'></i>
                    </div>
                    <div class="menu-title">Mutaxassisliklar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('specialty.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Mutaxasisliklarni ko'rish</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Akademik guruhlar</div>
                </a>
                <ul>
                    <li>
                        <a href="#" onclick="redrect('{{ route('groups.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Guruhlar</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;" class="has-arrow" aria-expanded="false">
                    <div class="parent-icon">
                        <i class='bx bx-user'></i>
                    </div>
                    <div class="menu-title">Talabalar</div>
                </a>
                <ul>
{{--                    <li>--}}
{{--                        <a href="#" onclick="redrect('{{ route('students.create') }}')">--}}
{{--                            <i class="bx bx-right-arrow-alt"></i>--}}
{{--                            <div style="margin-right: 5px;">Talaba yaratish</div>--}}
{{--                            <span class="badge bg-warning text-dark"></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#" onclick="redrect('{{ route('students.index') }}')">--}}
{{--                            <i class="bx bx-right-arrow-alt"></i>--}}
{{--                            <div style="margin-right: 5px;">Talabalar</div>--}}
{{--                            <span class="badge bg-warning text-dark"></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    {{-- <li>
                        <a href="#" onclick="redrect('{{ route('students.index') }}')">
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Talabalar bazasi</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li> --}}

                        <li>
                            <a href="#" onclick="redrect('{{ route('reports.dean') }}')">
                                <i class="bx bx-right-arrow-alt"></i>
                                <div style="margin-right: 5px;">Talabalar bazasi</div>
                                <span class="badge bg-warning text-dark"></span>
                            </a>
                        </li>

                    <li>
                        <a href="#" onclick="redrect('{{ route('get.formOfEducation') }}')">
{{--                            redrect('{{ route('get.student') }}')--}}
                            <i class="bx bx-right-arrow-alt"></i>
                            <div style="margin-right: 5px;">Talabalar ro'yxati</div>
                            <span class="badge bg-warning text-dark"></span>
                        </a>
                    </li>
                </ul>
            </li>
{{--            <li class="">--}}
{{--                <a href="javascript:;" class="has-arrow" aria-expanded="false">--}}
{{--                    <div class="parent-icon">--}}
{{--                        <i class='bx bx-home-circle'></i>--}}
{{--                    </div>--}}
{{--                    <div class="menu-title">Akademik guruhlar</div>--}}
{{--                </a>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="#" onclick="redrect('{{ route('groups.index') }}')">--}}
{{--                            <i class="bx bx-right-arrow-alt"></i>--}}
{{--                            <div style="margin-right: 5px;">Guruhlar</div>--}}
{{--                            <span class="badge bg-warning text-dark"></span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}



            <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-transfer'></i>
                </div>
                <div class="menu-title">Transfer</div>
            </a>
            <ul>
{{--                <li>--}}
{{--                    <a href="#" onclick="redrect('{{ route('transfers.create') }}')">--}}
{{--                        <i class="bx bx-right-arrow-alt"></i>--}}
{{--                        <div style="margin-right: 5px;">Transer</div>--}}
{{--                        <span class="badge bg-warning text-dark"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#" onclick="redrect('{{ route('transfers.index') }}')">--}}
{{--                        <i class="bx bx-right-arrow-alt"></i>--}}
{{--                        <div style="margin-right: 5px;">Transferlar ro'yxati</div>--}}
{{--                        <span class="badge bg-warning text-dark"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.groupAll') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Transfer guruh</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>

{{--                <li>--}}
{{--                    <a href="#" onclick="redrect('{{ route('transfer.directionAll') }}')">--}}
{{--                        <i class="bx bx-right-arrow-alt"></i>--}}
{{--                        <div style="margin-right: 5px;">Transfer yo'nalish</div>--}}
{{--                        <span class="badge bg-warning text-dark"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.expulsionAll') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Talabalar safidan chiqorilganlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.academicLeave') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Akademik ta'til olganlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.give') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Hayfsan berish</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.otm') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Boshqa otmga ko'chganlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('transfer.recovery') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">O'qishni tiklaganlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-history'></i>
                </div>
                <div class="menu-title">Hisobotlar</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('reports') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Hisobotlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('reports.month') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Hisobotlar (oylar kesimida)</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('years') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Yillar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('sex.all') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Ma'lumotlar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Davomat</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('get.davomat') }}" onclick="redirect('{{ route('get.davomat') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Davomat</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                {{-- <li>
                    <a href="#" onclick="redrect('{{ route('students.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Talabalar</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li> --}}
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Nazoratchi</div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('deans_supervisor.index') }}" onclick="redirect('{{ route('deans_supervisor.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Nazoratchilar bazasi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('deans_connect_group.create') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Guruhlar biriktirish</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="redrect('{{ route('get_statistik_groups') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">Guruhlar statistikasi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="">
            <a href="javascript:;" class="has-arrow" aria-expanded="false">
                <div class="parent-icon">
                    <i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">NB</div>
            </a>
            <ul>
                <li>
                    <a href="#" onclick="redrect('{{ route('test_nb.index') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        <div style="margin-right: 5px;">NB bazasi</div>
                        <span class="badge bg-warning text-dark"></span>
                    </a>
                </li>
            </ul>
        </li>
        <script>

            function get_notification() {

                $.ajax('{{ route('get_notification') }}', {
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function (data, status) {

                        if(data.objects.type == 1){

                            succes_noti(msg= data.objects.body);
                        }else if(data.objects.type == 2){

                            succes_warn(msg= data.objects.body);
                        }

                    },
                    error: function (jqXhr, textStatus, errorMessage) {

                        console.log(errorMessage);

                    }
                });

            }

            setInterval(() => {
                get_notification();
            }, 100000);

        </script>
        @endrole

        @role('rektor')
        <li class="menu-label">Hisobot</li>
        <li>
            <a href="{{ route('reports.exam_student.finishing_exam_student') }}" onclick="redirect('{{ route('reports.exam_student.finishing_exam_student') }}')">
                <i class="bx bx-right-arrow-alt"></i>
                <div style="margin-right: 5px;">Talabalarning imtihon natijasi</div>
                <span class="badge bg-warning text-dark"></span>
            </a>
        </li>
        <li>
            <a href="{{ route('reports.test') }}" onclick="redirect('{{ route('reports.test') }}')">
                <i class="bx bx-right-arrow-alt"></i>
                <div style="margin-right: 5px;">Talabalar imtihonlarini saralash</div>
                <span class="badge bg-warning text-dark"></span>
            </a>
        </li>
        <li>
            <a href="{{ route('reports.nb') }}" onclick="redirect('{{ route('reports.nb') }}')">
                <i class="bx bx-right-arrow-alt"></i>
                <div style="margin-right: 5px;">NB filter talaba</div>
                <span class="badge bg-warning text-dark"></span>
            </a>
        </li>
        <li>
            <a href="{{ route('reports.rektors.report') }}" onclick="redirect('{{ route('reports.rektors.report') }}')">
                <i class="bx bx-right-arrow-alt"></i>
                <div style="margin-right: 5px;">Hisobotlar</div>
                <span class="badge bg-warning text-dark"></span>
            </a>
        </li>
        <li class="">
            <a class="has-arrow" href="javascript:;" aria-expanded="false">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Dean</div>
            </a>
            <ul class="mm-collapse" style="height: 1.6px;">
                <li class="">
                    <a href="{{ route('reports.dean_s_r') }}" onclick="redirect('{{ route('reports.dean_s_r') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        Talaba
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('reports.deab_st_r') }}" onclick="redirect('{{ route('reports.deab_st_r') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        Guruh
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('reports.dean_sf_r') }}" onclick="redirect('{{ route('reports.dean_sf_r') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        Guruh Transfer
                    </a>
                </li>
                <li class="">
                    <a href="{{ route('reports.dean_sy_r') }}" onclick="redirect('{{ route('reports.dean_sy_r') }}')">
                        <i class="bx bx-right-arrow-alt"></i>
                        Yillar
                    </a>
                </li>
            </ul>
        </li>
        @endrole

        @role('booker')
            <li class="menu-label">Talabalar</li>
            <li>
                <a href="{{ route('booker.students.index') }}" onclick="redirect('{{ route('booker.students.index') }}')">
                    <i class="bx bx-right-arrow-alt"></i>
                    <div style="margin-right: 5px;">Talabalar debit</div>
                    <span class="badge bg-warning text-dark"></span>
                </a>
            </li>
        @endrole
    </ul>
    <!--end navigation-->
</div>

<script>

    function redrect(url) {
        window.location.href = url;
    }

</script>
