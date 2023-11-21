
const TestList = {
    data() {
        return {
            exams:exams 
        }
    },
}

const app = Vue.createApp(TestList)

app.component('test-item', {
    props: ['exams'],
    template: `
    <table class="table table-bordered align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th class="fixed_header2 align-middle">#</th>
                <th class="fixed_header2 align-middle">F.I.O</th>
                <th class="fixed_header2 align-middle">Guruh</th>
                <th class="fixed_header2 align-middle">Количество вопросов</th>
                <th class="fixed_header2 align-middle">Количество правильных вопросов</th>
                <th class="fixed_header2 align-middle">Количество неправильных вопросов</th>
                <th class="fixed_header2 align-middle">Балл</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(exam, index) in exams">
                <td>
                    {{ ++index }}
                </td>
                <td>
                    {{ exam['student']['full_name'] }}
                </td>
                <td>
                    {{ exam['student']['dean_group']['name'] }}
                </td>
                <td>
                    {{ exam['question_count'] }}
                </td>
                <td>
                    {{ exam['question_success'] }}
                </td>
                <td>
                    {{ exam['question_rejerect'] }}
                </td>
                <td>
                    {{ exam['ball'] }}
                </td>
            </tr>
        </tbody>
    </table>
    `
});

const vm = app.mount('#test');
