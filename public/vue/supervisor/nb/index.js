
const TestList = {
    data() {
        return {
            all : all,
            directions : directions,
            groups : groups,
            teachers : teachers,
            subjects : subjects,
            user_level : user_level,
            supervisors : supervisors,
            count_elements_page : count_elements_page
        }
    },
}

const app = Vue.createApp(TestList);

app.component('main-component', {
    props: [
        'all',
        'groups',
        'directions',
        'teachers',
        'supervisors',
        'user_level',
        'subjects'
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
                            <label for="group_id" class="form-label">Guruh</label>
                            <select class="form-select mb-3" id="group_id">
                                <option value=""></option>
                                <option v-for="group in groups" :value="group.id">{{group.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="direction_id" class="form-label">Yo'nalish</label>
                            <select class="form-select mb-3" id="direction_id">
                                <option value=""></option>
                                <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="subject_id" class="form-label">Fan</label>
                            <select class="form-select mb-3" id="subject_id">
                                <option value=""></option>
                                <option v-for="subject in subjects" :value="subject.id">{{subject.name}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="teacher_id" class="form-label">O'qutuvchi</label>
                            <select class="form-select mb-3" id="teacher_id">
                                <option value=""></option>
                                <option v-for="teacher in teachers" :value="teacher.id">{{teacher.full_name}}</option>
                            </select>
                        </div>

                        <div class="col-md-12" v-if="user_level == 6">
                            <label for="supervisor_id" class="form-label">Nazoratchi</label>
                            <select class="form-select mb-3" id="supervisor_id">
                                <option value=""></option>
                                <option v-for="supervisor in supervisors" :value="supervisor.id">{{supervisor.full_name}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="date_to" class="form-label">Data dan</label>
                            <input type="date" name="date_from" class="form-control" id="date_from">
                        </div>

                        <div class="col-md-6">
                            <label for="date_to" class="form-label">Data gacha</label>
                            <input type="date" name="date_to" class="form-control" id="date_to">
                        </div>

                        <div class="col-md-12">
                            <label for="count_elements_page_id" class="form-label">Sahifadagi elementlar soni</label>
                            <select class="form-select mb-3" id="count_elements_page_id">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="45">45</option>
                                <option value="50" selected>50</option>
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

    <div class="table-responsive" style="overflow-x: scroll">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Hemis ID</th>
                    <th>Talaba </th>
                    <th>Guruh </th>
                    <th>O'qituvchi</th>
                    <th v-if="user_level == 6">Nazoratchi</th>
                    <th>Yo'nalish</th>
                    <th>Fan</th>
                    <th>NB mavzu</th>
                    <th>NB savol</th>
                    <th>NB to'g'ri javob</th>
                    <th>NB noto'g'ri javob</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in all" :class=" item.status == 0 ? 'bg-warning' : 'bg-success text-white'">
                    <td>
                        {{ ++index }}
                    </td>
                    <td>
                        {{ item.student?.hemis_id }}
                    </td>
                    <td>
                        {{ item.student?.full_name }}
                    </td>
                    <td>
                        {{ item.student?.group?.name }}
                    </td>
                    <td>
                        {{ item.teacher?.full_name }}
                    </td>
                    <td v-if="user_level == 6">
                        {{ item.supervisor?.full_name }}
                    </td>
                    <td>
                        {{ item.test.theme.direction.title }}
                    </td>
                    <td>
                        {{ item.subject?.name }}
                    </td>
                    <td>
                        {{ item.test.theme.theme_name }}
                    </td>
                    <td>
                        {{ item.question_count ? item.question_count : '0' }}
                    </td>
                    <td>
                        {{ item.question_success ? item.question_success : '0' }}
                    </td>
                    <td>
                        {{ item.question_rejerect ? item.question_rejerect : '0' }}
                    </td>
                    <td>
                        {{ item.date }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
        reset_parametr(){
            $("#direction_id").val("").trigger('change');
            $("#subject_id").val("").trigger('change');
            $("#group_id").val("").trigger('change');
            $("#teacher_id").val("").trigger('change');
            $("#supervisor_id").val("").trigger('change');
            $("#date_from").val("").trigger('change');
            $("#date_to").val("").trigger('change');

            get_exam();
        }
    }

});

const vm = app.mount('#test');
