
const TestList = {
    data() {
        return {
            students : students,
            directions : directions,
            languages : languages,
            groups : groups,
            type_of_educations : type_of_educations,
            form_of_educations : form_of_educations,
            group_courses : group_courses,
            academic_years : academic_years,
            search_group : true,
            search_criteria: false,
            count_elements_page : count_elements_page
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'students',
        'groups',
        'directions',
        'languages',
        'type_of_educations',
        'form_of_educations',
        'group_courses',
        'academic_years',
        'search_group',
        'search_criteria'
    ],
    template: `
    <form class="row g-3 p-3">

        <div class="col-md-12">
            <label for="direction_id" class="form-label">Qidiruv</label>
            <input placeholder="Ism, Passport, Talaba ID" type="text" class="form-control mb-3" id="search_input" name="search_input">
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Mezonlar
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="search_group" v-bind:checked="search_group" @click="set_revers_search_type()">
                                <label class="form-check-label" for="search_group" >Guruhlar bo\`yicha qidiruv</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="search_criteria" v-bind:checked="search_criteria" @click="set_revers_search_type()">
                                <label class="form-check-label" for="search_criteria" >Parametrlar bo\`yicha qidiruv</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="group_id" class="form-label">Guruh</label>
                            <select class="form-select mb-3" id="group_id" v-bind:disabled="search_criteria">
                                <option value=""></option>
                                <option v-for="group in groups" :value="group.id">{{group.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="direction_id" class="form-label">Yo'nalish</label>
                            <select class="form-select mb-3" id="direction_id" v-bind:disabled="search_group">
                                <option value=""></option>
                                <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="language_id" class="form-label">Tili</label>
                            <select class="form-select mb-3" id="language_id" v-bind:disabled="search_group">
                                <option value=""></option>
                                <option v-for="language in languages" :value="language.id">{{language.name}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="type_of_education_id" class="form-label">Kuzduzgi sirtqi</label>
                            <select class="form-select mb-3" id="type_of_education_id" v-bind:disabled="search_group">
                                <option value=""></option>
                                <option v-for="type_of_education in type_of_educations" :value="type_of_education.id">{{type_of_education.name}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="form_of_education_id" class="form-label">magistr bakalavr</label>
                            <select class="form-select mb-3" id="form_of_education_id" v-bind:disabled="search_group">
                                <option value=""></option>
                                <option v-for="form_of_education in form_of_educations" :value="form_of_education.id">{{form_of_education.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="group_course_id" class="form-label">Kurs</label>
                            <select class="form-select mb-3" id="group_course_id" v-bind:disabled="search_group">
                                <option value=""></option>
                                <option v-for="group_courses in group_courses" :value="group_courses.id">{{group_courses.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="count_elements_page_id" class="form-label">Sahifadagi elementlar soni</label>
                            <select class="form-select mb-3" id="count_elements_page_id">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary" @click="reset_parametr()">
                                Parametrlarni tashlash
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>FIO</th>
                    <th>Passport raqami PINFL</th>
                    <th>Debit</th>
                    <th>Contrakt</th>
                    <th>Guruh</th>
                    <th>Telefon</th>
                    <th>Tili</th>
                    <th>Kkuzduzgi sirtqi</th>
                    <th>asd</th>
                    <th>ta\`lim fakulteti</th>
                    <th>Guruh kursi</th>
                    <th>Guruh o\`qiyotgan yil</th>
                    <th>Harakatlar</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>
                        {{ student['student_id'] }}
                    </td>
                    <td>
                        {{ student['full_name'] }}
                    </td>
                    <td>
                        {{ student['passport_series'] }} - {{ student['passport_number'] }} - {{ student['passport_pinfl '] }}
                    </td>
                    <td>
                        {{ student['debit_contrakt'] }}
                    </td>
                    <td>
                        {{ student['contract_price'] }}
                    </td>
                    <td>
                        {{ student['dean_group']['title'] }}
                    </td>
                    <td>
                        {{ student['number_phone'] }}
                    </td>
                    <td>
                        {{ student.language?.name }}
                    </td>
                    <td>
                        {{ student.type_of_education?.name }}
                    </td>
                    <td>
                        {{ student['form_of_education']['title'] }}
                    </td>
                    <td>
                        {{ student['direction']['title'] }}
                    </td>
                    <td>
                        {{ student['student_course']['title'] }}
                    </td>
                     <td>
                        {{ student.dean_group?.get_group_akademik_year?.name }}
                    </td>
                    <td>
                        <buttton class="btn btn-primary" @click="show_exam(student['id'])">
                            O'zgartirish
                        </buttton>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
        set_revers_search_type (){
            vm.$data.search_group = !vm.$data.search_group;
            vm.$data.search_criteria = !vm.$data.search_criteria;
        },

        reset_parametr(){
            $("#direction_id").val("").trigger('change');
            $("#language_id").val("").trigger('change');
            $("#type_of_education_id").val("").trigger('change');
            $("#form_of_education_id").val("").trigger('change');
            $("#group_course_id").val("").trigger('change');
            $("#academic_year_id").val("").trigger('change');
            $("#group_id").val("").trigger('change');
        },

        show_exam(id){
            let item = vm.students.find(item => item.id == id);

            $("#student_id").val(id)

            $("#full_name").val(item.full_name);

            $('#debit_contrakt').val(item.debit_contrakt);

            $('#contract_price').val(item.contract_price);

            $('#student_id').val(item.student_id);

            $('#exampleModal').modal('toggle');
        },
    }

});

const vm = app.mount('#test');
