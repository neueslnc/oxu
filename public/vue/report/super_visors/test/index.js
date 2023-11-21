
const TestList = {
    data() {
        return {
            students : students,
            groups : groups,
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: ['students', 'groups'],
    template: `
    <form class="row g-3 p-3">
        <div class="col-md-6">
            <label for="group_id" class="form-label">Guruh</label>
            <select class="form-select mb-3" id="group_id">
                <option value=""></option>
                <option v-for="group in groups" :value="group.id">{{group.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="student_id" class="form-label">Talaba</label>
            <select class="form-select mb-3" id="student_id">
                <option value=""></option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Date From</label>
            <input type="date" name="date_from" class="form-control" id="date_from">
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Date To</label>
            <input type="date" name="date_to" class="form-control" id="date_to">
        </div>

    </form>
    
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Talaba</th>
                    <th>Gruhu</th>
                    <th>Результаты</th>
                    <th>Начало</th>
                    <th>Конец</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>
                        {{ student['student']['full_name'] }}
                    </td>
                    <td>
                        {{ student['student']['dean_group']['name'] }}
                    </td>
                    <td>
                        Ball - {{ (student['supervisor_ball'] ? student['supervisor_ball'] : 0 ) }},<br/>
                        Вопросы - {{ (student['supervisor_question_count'] ? student['supervisor_question_count'] : 0 )  }},<br/>
                        Правильные - {{ (student['supervisor_question_success'] ? student['supervisor_question_success'] : 0 ) }},<br/>
                        Неправльные - {{ (student['supervisor_question_rejerect'] ? student['supervisor_question_rejerect'] : 0 ) }}
                    </td>
                    <td>
                        {{ student['start_date_time'] }}
                    </td>
                    <td>
                        {{ student['end_date_time'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
    }
});

const vm = app.mount('#test');
