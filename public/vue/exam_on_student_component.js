
const TestList = {
    data() {
        return {
            tests: exams,
            student : student,
            direction : direction,
            subject : subject,
            start_date_time : start_date_time,
            test_id : test_id,
            seconds : seconds
        }
    },
    mounted() {
        setInterval(() => {

            if (this.seconds != 0 && this.seconds > 0) {

                this.seconds--;
            }else if(this.seconds == 0){
                finish_exam(vm.test_id)

                this.seconds = -1;
            }

        }, 1000)
    }
}

const app = Vue.createApp(TestList)

app.component('test-item', {
    props: ['tests', 'student', 'direction', 'subject', 'start_date_time', 'seconds'],
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
                                <div class="row">
                                    <div class="col-md-12 text-center" style="font-size: 20px;">
                                        {{ student.group.name }}
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
                                        {{ start_date_time }}
                                    </div>
                                </div>
                                <hr class="my-4" style="margin: 0px !important; margin-top: 5px !important; margin-bottom: 5px !important; ">
                                <div class="row">
                                    <div class="col-md-12 text-center" style="font-size: 20px;">
                                        {{ format(seconds) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-5">
                        <div class="card" v-for="(test, index_1) in tests">
                            <div class="row disabled" :id="'id_'+ index_1">
                                <div class="card-body p-4">
                                    <div class="row  mb-2 justify-content-center" >
                                        <div class="col-md-12" v-html="++index_1 + '.Вопрос'" style="font-size: 20px"></div>
                                        <div class="col-md-12" v-html="test.question" style="font-size: 16px"></div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12" v-for="(variant, index_2) in test.variants">
                                                    <div v-bind:class="'m-1 p-4 border border-3 ' + (variant.correct_student == 1 ? 'border-success' : 'border') + ' rounded bg-light'" @click="set_variant(test.id, variant.id)">
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
                            <div class="row disabled">
                                <div class="card-body p-4">
                                    <div class="row  mb-2 justify-content-center" >
                                        <button class="btn btn-primary ol-md-12" @click="exam_finish()">
                                            Звершить экзамены
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 p-5" >
                        <div class="card" style="position:fixed;">
                            <div class="card-body p-4">
                                <div class="row" style="overflow-y: auto; max-height: 450px;">
                                    <div v-for="(test, index) in tests">
                                        <div class="col-md-12" @click="set_anchor('id_'+(--index))">
                                            {{ ++index }}
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" checked="" disabled="" v-if="test.variants.find(item => item.correct_student == 1) != null">

                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled" disabled="" v-else>
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
    `,
    methods : {

        set_anchor(anchor){

            document.getElementById(anchor).scrollIntoView();
        },
        set_variant(question_id, variant_id){

            // this.tests.map((item, index) => {
            //     if(item.id == question_id){
            //         question = index;
            //     }
            // });
            //
            // for (let item of this.tests[question].variants) {
            //     if(variant_id == item.id){
            //         item.correct_student = 1;
            //         continue;
            //     }
            //     item.correct_student = 0;
            // }
            //
            // this.tests.map((item, index) => {
            //
            //     if(item.id == question_id){
            //         item.status = 1;
            //
            //         let variant = item.variants.find((item) => {
            //             return item.correct_student == 1;
            //         });
            //     }
            // });

            set_variant(variant_id, question_id)

        },

        exam_finish(){

            let count = vm.tests.filter(item => item.status == 0).length;

            if (count > 0){

                let flag = confirm(`Осталось ${count}?`)

                if (flag){
                    finish_exam(vm.test_id);

                }
            }else{
                finish_exam(vm.test_id);
            }

        },

        format(seconds) {
            let s = (seconds % 60).toString();
            let m = Math.floor(seconds / 60 % 60).toString();
            let h = Math.floor(seconds / 60 / 60 % 60).toString();
            return `${h.padStart(2,'0')}:${m.padStart(2,'0')}:${s.padStart(2,'0')}`;
        }
    }
});

const vm = app.mount('#test');
