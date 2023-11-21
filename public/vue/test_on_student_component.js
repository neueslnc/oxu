
const TestList = {
    data() {
        return {
            datas: datas,
            counter: 0,
            status : {
                flag_writing : false,
                confirm_student : false,
                timer : false
            }
        }
    },
    mounted() {
        setInterval(() => {

            if(this.counter >= this.datas.test_on_student_question.waiting_seconds && this.status.timer){
                this.status.timer = !this.status.timer;
            }
            
            user_active && this.counter <= this.datas.test_on_student_question.waiting_seconds ? this.counter++ : null;
        }, 1000)
    }
}

const app = Vue.createApp(TestList)

app.component('test-item', {
    props: ['test', 'flag_writing', 'confirm_student', 'timer', 'counter'],
    template: `
    <div class="row  mb-2" v-if="test.test_on_student_question.type == 'variant'">
        <div class="col-md-12" v-html="test.test_on_student_question.question"></div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6" v-for="item in test.test_on_student_question.test_on_student_answers">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" v-model="item.correct_student" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">{{ item.variant }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row  mb-2" v-if="test.test_on_student_question.type == 'writing'">
        
        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Savol</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="prokrutka" id="jas" v-html="test.test_on_student_question.question">
                        </div>
                        <div class="form-check" v-if="flag_writing == false || timer">
                            <div v-if="timer">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled="">
                                <label class="form-check-label" for="flexCheckDisabled">O'qing {{ counter }}</label>
                            </div>
                            <div v-else>
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled="">
                                <label class="form-check-label" for="flexCheckDisabled">O'qing</label>
                            </div>
                        </div>
                        <div v-else-if="flag_writing == true">
                            <div class="form-check" >
                                <input class="form-check-input" type="checkbox" id="flexCheckDisabled" @click="set_flag()">
                                <label class="form-check-label" for="flexCheckDisabled">O'qing</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yoping</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <textarea class="form-control" v-model="test.test_on_student_question.test_on_student_answers[0].correct_student"></textarea>
                </div>
            </div>
        </div>
    </div>
    `,
    methods : {

        set_flag(){
            vm.$data.status.confirm_student = !vm.$data.status.confirm_student;
        }
    }
})

app.component('btn-send', {
    props: ['data', 'counter', 'confirm_student'],
    template: `
    <div v-if="data.test_on_student_question.type == 'variant'">
        <div class="row" v-if="counter > data.test_on_student_question.waiting_seconds">
            <button class="btn btn-primary col-md-12" onclick="send_data()">Yuborish</button>
        </div>
        <div class="row" v-if="data.test_on_student_question.waiting_seconds >= counter">
            <button class="btn btn-light col-md-12">
                <div class="spinner-border" role="status"> 
                    <span class="visually-hidden">Loading...</span>
                </div>
                {{ counter }}
            </button>
        </div>
    </div>
    <div v-if="data.test_on_student_question.type == 'writing'">
        <div class="row">
            <button class="col-md-5 btn btn-light mr-2" v-if="confirm_student == false">
                Отправить
            </button>
            <button class="col-md-5 btn btn-primary mr-2" v-else-if="confirm_student == true" onclick="send_data()">
                Отправить
            </button>
            <div class="col-md-1">
            </div>
            <button type="button" class="btn btn-primary col-md-5 " data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Savolni ko'rish</button>
        </div>
    </div>
    `
})

const vm = app.mount('#test');
