
const TestList = {
    data() {
        return {
            students : students,
            search_student : "",
            data : data
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'students',
        'search_student',
        'data'
    ],
    template: `
    <form class="row g-3 p-3">
        <div class="col-md-12">
            <label for="direction_id" class="form-label">Qidiruv</label>
            <input placeholder="Ism, Passport, Talaba ID" id="search_student" type="text" class="form-control mb-3" >
        </div>
    </form>

    <div class="table-responsive" id="tab">
        <table class="table align-middle mb-0" id="table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>FIO</th>
                    <th>Guruh</th>
                    <th>Telefon</th>
                    <th>Tili</th>
                    <th>Kkuzduzgi sirtqi</th>
                    <th>ta\`lim fakulteti </th>
                    <th>ta\`lim fakulteti</th>
                    <th>Guruh kursi</th>
                    <th>Guruh o\`qiyotgan yil</th>
                    <th>Debit</th>
                    <th>NB</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in data">
                    <td>
                        {{ student.student_id}}
                    </td>
                    <td>
                        {{ student.full_name}}
                    </td>
                    <td>
                        {{ student.dean_group?.title}}
                    </td>
                    <td>
                        {{ student.number_phone}}
                    </td>
                    <td>
                        {{ student.language?.name}}
                    </td>
                    <td>
                        {{ student.type_of_education?.name}}
                    </td>
                    <td>
                        {{ student.form_of_education?.title}}
                    </td>
                    <td>
                        {{ student.direction?.title}}
                    </td>
                    <td>
                        {{ student.student_course?.title}}
                    </td>
                    <td>
                    </td>
                    <td>
                        {{ student.debit_contrakt}}
                    </td>
                    <td>
                        {{ student.get_nb_count}}

                        <a data-bs-toggle="modal"
                        @click="set_data(student.id)"
                        data-bs-target="#change_supervisor_direction_1"
                        href="#"
                        class="btn btn-sm btn-warning">Yo'nalish o'zgartirish <i class="bx bx-pencil"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
        set_data(student_id){

            let student = vm.$data.students.find(item => item.id == student_id);

            $("#full_name").html(student.full_name);
            $("#user_id").val(student.id);
            $("#birthday").val(student.birthday);
            $("#father_fio").val(student.father_fio);
            $("#father_phone").val(student.father_phone);
            $("#number_phone").val(student.number_phone);
            $("#mather_fio").val(student.mather_fio);
            $("#mather_phone").val(student.mather_phone);
            $("#address").val(student.address);
            $("#address_temporarily").val(student.address_temporarily);
            $("#deprived_of_parental").val(student.deprived_of_parental);
            $("#disabled").val(student.disabled);
            $("#social_security").val(student.social_security);
            $("#court").val(student.court);
            $("#workplace").val(student.workplace);

        }
    }
});

const vm = app.mount('#test');
