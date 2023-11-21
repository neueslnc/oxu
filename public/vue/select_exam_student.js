
const ExamComponent = {
    data() {
        return {
            students : [],
            select_students : [],
            student_groups : student_groups,
        }
    }
}

const app = Vue.createApp(ExamComponent);

app.component('wizard', {
    props: [
        'student_groups', 
        'students', 
        'select_students'
    ],
    template: `
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-12">
                <label for="group_id" class="form-label">Guruh</label>
                <select class="single-select form-select" id="group_id" name="group_id">
                    <option value=""></option>
                    <option v-for="student_group in student_groups" :value="student_group.id">{{student_group.title}}</option>
                </select>
            </div>

            <div class="col-md-12">
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
                        <tr v-for="(student, index) in students">
                            <td>
                                {{ ++index }}
                            </td>
                            <td v-if="student.status_student_exam_accept == 0">
                                <button type="button" class="btn btn-light px-3" style="font-size: 10px;">Не допущен</button>
                            </td>
                            <td v-else>
                                <button type="button" class="btn btn-primary px-3" style="font-size: 10px;">Допущен</button>
                            </td>
                            <td>{{ student.full_name }}</td>
                            <td>{{ student.group.name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    `,
    methods : {
        set_selected_student : function (id){

            vm.$data.select_students.push( vm.$data.students.filter(item => item.id == id)[0] );

            vm.$data.students = vm.$data.students.filter(item => item.id !== id);

            $('#smartwizard').smartWizard("reset");
        },

        delet_selected_student : function (id){

            vm.$data.students.push( vm.$data.select_students.filter(item => item.id == id)[0] );

            vm.$data.select_students = vm.$data.select_students.filter(item => item.id !== id);

            $('#smartwizard').smartWizard("reset");
        }
    }
})

const vm = app.mount('#wizard_component');
