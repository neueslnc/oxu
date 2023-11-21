
const NBComponent = {
    data() {
        return {
            students : [],
            select_students : [],
            student_groups : student_groups,
            semesters : semesters,
            directions : directions,
            sciences : sciences,
            themes : [],
            teachers : [],
            subjects : subjects,
            test_exams : [],
            group:[],
        }
    }
}

const app = Vue.createApp(NBComponent);

app.component('wizard', {
    props: [
        'student_groups',
        'students',
        'select_students',
        'semesters',
        'directions',
        'sciences',
        'themes',
        'teachers',
        'subjects',
        'group',
    ],
    template: `
    <div id="smartwizard" style="font-size: 10px;">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#step-1">
                    <strong>Qadam 1</strong>
                    <br>Talabalar tanlash
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-2">
                    <strong>Qadam 2</strong>
                    <br>NB ma'lumotlarini kiritish
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <h3>Qadam 1 - Talabalar tanlash</h3>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="group_id" class="form-label">Guruh</label>
                            <select class="single-select" id="group_id" name="group_id">
                                <option value=""></option>
                                <option v-for="student_group in student_groups" :value="student_group.id">{{student_group.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="fixed_header2 align-middle">#</th>
                                        <th class="fixed_header2 align-middle">Checked</th>
                                        <th class="fixed_header2 align-middle">F.I.O</th>
                                        <th class="fixed_header2 align-middle">Guruh</th>
                                    </tr>
                                </thead>
                                <tbody id="student_list">
                                    <tr v-for="(student, index) in students.filter(item => item.status == false)">
                                        <td>
                                            {{ ++index }}
                                        </td>
                                        <td v-if="!select_students.filter(item => item.id == student.id)[0]">
                                            <button type="button" class="btn btn-primary px-3" style="font-size: 10px;" @click="set_selected_student(student.id)">Выбрать</button>
                                        </td>
                                        <td v-else-if="select_students.filter(item => item.id == student.id)[0]">
                                            <button type="button" class="btn btn-light px-3" style="font-size: 10px;">Выбран</button>
                                        </td>
                                        <td>{{ student.full_name }}</td>
                                        <td>{{ student.group.name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6">
                            <table class="table table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="fixed_header2 align-middle">#</th>
                                        <th class="fixed_header2 align-middle">Checked</th>
                                        <th class="fixed_header2 align-middle">F.I.O</th>
                                        <th class="fixed_header2 align-middle">Guruh</th>
                                    </tr>
                                </thead>
                                <tbody id="student_list">
                                    <tr v-for="(select_student, index) in select_students">
                                        <td>
                                            {{ ++index }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger px-3" style="font-size: 10px;" @click="delet_selected_student(select_student.id)">Удалить</button>
                                        </td>
                                        <td>{{ select_student.full_name }}</td>
                                        <td>{{ select_student.group.name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                <h3>Qadam 2 - NB ma'lumotlarini kiritish</h3>
                <div class="card-body" data-select2-id="22">
                    <div class="border p-3 rounded">
                        <div class="d-flex align-items-center justify-content-start">
                            <div style="margin-right: 20px;" class="mb-3 w-50">
                                <label class="form-label">Semester</label>
                                <select name="semester_id" id="semester_id" class="single-select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option v-for="semestr in semesters" :value="semestr.id">{{semestr.name}}</option>
                                </select>
                            </div>

                            <div style="margin-right: 20px;" class="mb-3 w-50">
                                <label class="form-label">Para</label>
                                <input type="text" class="form-control" id="pair">
                            </div>

                            <div style="margin-right: 20px;" class="mb-3 w-50">
                                <label class="form-label">Data</label>
                                <input type="date" class="form-control" id="date">
                            </div>
<!--                            <div style="margin-right: 20px;" class="mb-3 w-50">-->
<!--                                <label class="form-label">Ta'lim turlari</label>-->
<!--                                <select name="form_education_id" id="form_education_id" class="single-select select2-hidden-accessible" data-select2-id="5" tabindex="-1" aria-hidden="true">-->
<!--                                    <option value="" disabled selected>Ta'lim turlari tanlang.</option>-->
<!--                                    <option value="1">Bakalavr (Kunduzgi)</option>-->
<!--                                    <option value="2">Bakalavr (Sirtqi)</option>-->
<!--                                    <option value="3">Magistratura</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="mb-3 w-50">-->
<!--                                <label class="form-label">Yo'nalish</label>-->
<!--                                <select name="direction_id" id="direction_id" class="single-select select2-hidden-accessible" data-select2-id="2" tabindex="-1" aria-hidden="true">-->
<!--                                    <option value=""></option>-->
<!--&lt;!&ndash;                                    <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>&ndash;&gt;-->
<!--                                </select>-->
<!--                            </div>-->
                        </div>
                        <div class="d-flex align-items-center justify-content-start">
                            <div style="margin-right: 20px;" class="mb-3 w-50">
                                <label class="form-label">Fan</label>
                                <select name="subject_id" id="subject_id" class="single-select select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                    <option value=""></option>
                                    <option v-for="subject in subjects" :value="subject.id">{{subject.name}}</option>
                                </select>
                            </div>
                            <input type="hidden" id="teacher_id" >

                            <div class="mb-3 w-50">
                                <label class="form-label">Mavzu</label>
                                <select name="theme_id" id="theme_id" class="single-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                    <option v-for="theme in themes" :value="theme.id">{{theme.name}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-end">
                            <button id="btn-submit" class="btn btn-primary" type="submit">Saqlash</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    `,
    methods : {

        groupBy : function test (list, keyGetter) {
            const map = new Map();
            list.forEach((item) => {
                const key = keyGetter(item);
                const collection = map.get(key);
                if (!collection) {
                    map.set(key, [item]);
                } else {
                    collection.push(item);
                }
            });
            return map;
        },
        print_selected_group : function () {

            let name_group = '';

            const grouped = this.groupBy(vm.$data.select_students, item => item.group.title);

            grouped.forEach((value, key, map) => {
                name_group += `${key} (${value.length}), `;
            });

            $('#group_selected').html(name_group);
        },
        set_selected_student : function (id){

            vm.$data.select_students.push( vm.$data.students.filter(item => item.id == id)[0] );

            vm.$data.students = vm.$data.students.filter(item => item.id !== id);

            this.print_selected_group();

            $('#smartwizard').smartWizard("reset");
        },

        delet_selected_student : function (id){

            vm.$data.students.push( vm.$data.select_students.filter(item => item.id == id)[0] );

            vm.$data.select_students = vm.$data.select_students.filter(item => item.id !== id);

            this.print_selected_group();

            $('#smartwizard').smartWizard("reset");
        }
    }
})

const vm = app.mount('#wizard_component');
