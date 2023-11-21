
const TestList = {
    data() {
        return {
            test: test,
            student : student,
            direction : direction,
            subject : subject,
        }
    },
}

const app = Vue.createApp(TestList)

app.component('test-item', {
    props: ['test', 'student', 'direction', 'subject'],
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
                                    <div class="mt-3">
                                        <h4>
                                            {{ student.full_name }}
                                        </h4>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>
                                            {{ student.group.name }}
                                        </h4>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="text-center">
                                        <h4>
                                            {{ direction.title }}
                                        </h4>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>
                                            {{ subject.name }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 p-5">
                        <div class="card" v-for="(item, index_1) in test" v-if="test.type == 'variant' ">
                            <div class="row disabled">
                                <div class="card-body p-4">
                                    <div class="row  mb-2 justify-content-center" >
                                        <div class="col-md-12" v-html="++index_1 + '.Вопрос'" style="font-size: 20px"></div>
                                        <div class="col-md-12" v-html="item.question" style="font-size: 16px"></div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12" v-for="(variant, index_2) in item.variants">
                                                    <div v-bind:class="'m-1 p-4 border border-3 ' + (variant.correct_student == 1 ? 'border-success' : 'border') + ' rounded bg-light'" @click="set_variant(item.id, variant.id)">
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
                                        <button class="col-md-11 align-self-center p-4 mt-5 btn btn-primary" style="font-size: 20px" @click="set_question_answer(item.id)" v-if="item.status == 0">
                                            Подтвердить
                                        </button>
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

        set_variant(question_id, variant_id){

            let active_flage = this.test.find((item) => {
                return item.id == question_id;
            });

            if (active_flage.status == 1) {
                return 0;
            }

            this.test.map((item, index) => {
                if(item.id == question_id){
                    question = index;
                }
            });

            for (let item of this.test[question].variants) {
                if(variant_id == item.id){
                    item.correct_student = 1;
                    continue;
                }
                item.correct_student = 0;
            }
        },

        set_question_answer(question_id, variant_id){
            this.test.map((item, index) => {
                console.log(item)
                if(item.id == question_id){
                    item.status = 1;

                    let variant = item.variants.find((item) => {
                        return item.correct_student == 1;
                    });
                    set_variant(variant.id)
                }
            });
        }
    }
});

const vm = app.mount('#test');
