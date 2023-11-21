
const TestList = {
    data() {
        return {
            student : student,
            direction : direction,
            subject : subject,
            test_id : test_id,
            test: test,
            counter: test.waiting_seconds,
            status : {
                flag_writing : false,
                confirm_student : false,
                timer : false
            }
        }
    },
    mounted() {
        setInterval(() => {

            if(this.counter >= this.test.waiting_seconds && this.status.timer){
                this.status.timer = !this.status.timer;
            }

            user_active && this.counter > 0 ? this.counter-- : null;
        }, 1000);
    }
}

const app = Vue.createApp(TestList)

app.component('test-item', {
    props: [
        'test', 'student', 'direction', 'subject', 'counter', 'confirm_student', 'flag_writing'
    ],
    template: `
    <div class="page-wrapper" style="margin-left: 100px;">
        <div class="container" >
            <div class="main-body">
                <div class="row">
                    <div class="col-md-3  mt-5">
                        <div class="card col-2" style="position:fixed;">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img :src="student.img_url" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3" style="font-size: 20px;">
                                        {{ student.full_name }}
                                    </div>
                                </div>
                                <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="font-size: 20px;">
                                        {{ student.dean_group.name }}
                                    </div>
                                </div>
                                <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                                <div class="row">
                                    <div class="text-center" style="font-size: 20px;">
                                        {{ direction.title }}
                                    </div>
                                </div>
                                <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="font-size: 20px;">
                                        {{ subject.name }}
                                    </div>
                                </div>
                                <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="font-size: 20px;">
                                        {{ counter }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 p-5">
                        <div v-if="test.type == 'variant'">
                            <div class="card">
                                <div class="row disabled">
                                    <div class="card-body p-4">
                                        <div class="row  mb-2 justify-content-center" >
                                            <div class="col-md-12" v-html="'Savol:'" style="font-size: 20px"></div>
                                            <div class="col-md-12" v-html="test.question" style="font-size: 16px"></div>
                                            <div class="col-md-12" v-html="'Javob:'" style="font-size: 20px"></div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12" v-for="(variant, index_2) in test.test_on_student_answers">
                                                        <div v-bind:class="'m-1 p-4 border border-3 ' + (variant.correct_student == 1 ? 'border-success' : 'border') + ' rounded bg-light'" @click="set_variant(variant.id)">
                                                            <div class="row" style="font-size: 14px">
                                                                <div class="col-md-1">
                                                                    {{ ++index_2 }}.
                                                                </div>
                                                                <div class="col-md-10 text-center ">
                                                                    {{ variant.variant }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                            <div class="row">
                                    <button class="btn btn-primary col-md-12" onclick="send_data()">Yuborish</button>
                                </div>
<!--                                <div class="row" v-if="counter > test.waiting_seconds">-->
<!--                                    <button class="btn btn-primary col-md-12" onclick="send_data()">Yuborish</button>-->
<!--                                </div>-->
<!--                                <div class="row" v-if="test.waiting_seconds >= counter">-->
<!--                                    <button class="btn btn-light col-md-12">-->
<!--                                        <div class="spinner-border" role="status"> -->
<!--                                            <span class="visually-hidden">Loading...</span>-->
<!--                                        </div>-->
<!--                                        {{ counter }}-->
<!--                                    </button>-->
<!--                                </div>-->
                            </div>
                        </div>

                        <div v-if="test.type == 'writing'">
                            <div class="card">

                                <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Savol</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="prokrutka" id="jas" v-html="test.question">
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

                                <div class="card-body">

                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control" v-model="test.test_on_student_answers[0].correct_student"></textarea>
                                            </div>
                                        </div>

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
                                </div>
                            </div>
                        </div>

                        <div v-if="test.type == 'comparison'">
                            <div class="card">
                                <div class="row disabled">
                                    <div class="card-body p-4">
                                        <div class="row  mb-2 justify-content-center" >
                                            <div class="col-md-12" v-html="'Savol:'" style="font-size: 20px"></div>
                                            <div class="col-md-12" v-html="test.question" style="font-size: 16px"></div>
                                            <div class="col-md-12" v-html="'Javob:'" style="font-size: 20px"></div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select class="form-select mb-3" id="subject_id" v-for="(variant, index_2) in test.block_lefts">
                                                            <option :value="variant.id">{{variant.name}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <select class="form-select mb-3" id="subject_id" v-for="(variant, index_2) in test.block_rights" v-model="test.comparisons[index_2].block_right">
                                                            <option v-for="(variant_1, index_3) in test.block_rights" :value="variant_1.id">{{variant_1.name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                 <div class="row">
                                    <button class="btn btn-primary col-md-12" onclick="send_data()">Yuborish</button>
                                </div>
<!--                                <div class="row" v-if="counter > test.waiting_seconds">-->
<!--                                    <button class="btn btn-primary col-md-12" onclick="send_data()">Yuborish</button>-->
<!--                                </div>-->
<!--                                <div class="row" v-if="test.waiting_seconds >= counter">-->
<!--                                    <button class="btn btn-light col-md-12">-->
<!--                                        <div class="spinner-border" role="status"> -->
<!--                                            <span class="visually-hidden">Loading...</span>-->
<!--                                        </div>-->
<!--                                        {{ counter }}-->
<!--                                    </button>-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
    methods : {

        set_flag(){
            vm.$data.status.confirm_student = !vm.$data.status.confirm_student;
        },

        set_variant(variant_id){
            this.test.test_on_student_answers.map((item, index) => {
                if(variant_id == item.id){
                    item.correct_student = 1;
                    return
                }
                item.correct_student = 0;
            })
        }
    }
});

app.component('btn-send', {
    props: ['test', 'counter', 'confirm_student'],
    template: `

    `
});

const vm = app.mount('#test');
