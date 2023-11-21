let item_id;

let variant_id;

const app = Vue.createApp(TodoList);

app.component('todo-item', {
    props: ['todo', 'index'],
    template: `
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapseOne_' + todo.id" aria-expanded="false" :aria-controls="'#collapseOne_' + todo.id">
                {{ (index + 1) }}. Savol -  {{ todo.question_name.length > 50 ? todo.question_name.substr(0, 50) + '...' : todo.question_name }}
            </button>
        </h2>
        <div :id="'collapseOne_' + todo.id" class="accordion-collapse collapse" aria-labelledby="question_{{ todo.id }}" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <button type="button" class="col-md-12 btn btn-danger px-5" @click="delet_question(todo.id)">Savol o'chirish</button>

<!--                    <div class="col-md-12">-->
<!--                        <div class="form-check">-->
<!--                            <input class="form-check-input question_writing" type="checkbox" value="writing" :id="'writing_' + index" :data-id='todo.id' v-bind:checked="todo.type == 'writing' ? true : false" @click="change_type_test(todo.id, $event, 'writing')">-->
<!--                            <label class="form-check-label" :for="'writing_' + index">Yozish</label>-->
<!--                        </div>-->
<!--                    </div>-->

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input question_writing" type="checkbox" value="variant" :id="'variant_' + index" :data-id='todo.id' v-bind:checked="todo.type == 'variant' ? true : false" @click="change_type_test(todo.id, $event, 'variant')">
                            <label class="form-check-label" :for="'variant_' + index">Variant</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input question_writing" type="checkbox" value="comparison" :id="'comparison_' + index" :data-id='todo.id' v-bind:checked="todo.type == 'comparison' ? true : false" @click="change_type_test(todo.id, $event, 'comparison')">
                            <label class="form-check-label" :for="'comparison_' + index">Solishtirma</label>
                        </div>
                    </div>

                    <div v-if="todo.type == 'variant'">

                        <div class="col-md-12">
                            <button type="button" class="col-md-12 btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal" @click="set_item_id(todo.id)">
                                Savol qo'yish
                            </button>
                        </div>

                        <div class="col-md-12">
                            <label for="name" class="form-label">Sekund</label>
                            <input type="text" name="name" class="form-control" v-model="todo.waiting_seconds">
                        </div>

                        <div v-for="(variant, index_v) in todo.variants.filter(item => item.delete_status == 0)">

                            <div class="row">
                                <div class="col-md-1 mt-3">
                                    {{ ( index_v + 1 ) }}.
                                </div>
                                <div class="col-md-7 mt-3">
                                    <input type="text" name="name" class="form-control question_variant_list" :data-variant-id='variant.id' v-model="variant.name">
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" :id="'variant_' + index + '_' + index_v" v-model="variant.correct">

                                        <button type="button" class="col-md-12 btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModalAnswer" @click="set_variant_id(todo.id, variant.id)">
                                            Javob
                                        </button>

                                        <label class="form-check-label" :for="'variant_' + index + '_' + index_v">To'g'ri</label>
                                    </div>
                                </div>

                                <button type="button" class="col-md-1 btn btn-danger" @click="delet_variant(todo.id, variant.id)"><i class="fadeIn animated bx bx-trash"></i></button>
                            </div>

                        </div>
                    </div>
                    <div v-if="todo.type == 'writing'">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Sekund</label>
                            <input type="text" name="name" class="form-control" v-model="todo.waiting_seconds">
                        </div>
                    </div>

                    <div v-if="todo.type == 'comparison'">

                        <div class="col-md-12">
                            <label for="name" class="form-label">Savolni kiriting</label>
                            <input type="text" name="name" class="form-control" v-model="todo.question_name">
                        </div>

                        <div class="col-md-12">
                            <label for="name" class="form-label">Sekund</label>
                            <input type="text" name="name" class="form-control" v-model="todo.waiting_seconds">
                        </div>

                        <div v-for="(comparison, index_v) in todo.comparisons.filter(item => item.delete_status == 0)">

                            <div class="row">
                                <div class="col-md-1 mt-3">
                                    {{ ( index_v + 1 ) }}.
                                </div>
                                <div class="col-md-4 mt-3">
                                    <input type="text" class="form-control" v-model="comparison.block.block_left.name">
                                </div>
                                <div class="col-md-4 mt-3">
                                    <input type="text" class="form-control" v-model="comparison.block.block_right.name">
                                </div>
                                <button type="button" class="col-md-1 btn btn-danger" @click="delet_comparison(todo.id, comparison.id)"><i class="fadeIn animated bx bx-trash"></i></button>
                            </div>

                        </div>
                    </div>

                    <div>
                        <button type="button" class="col-md-12 btn btn-primary m-2" v-if="todo.type == 'writing'" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModal" @click="set_item_id(todo.id)">
                            Savol qo'yish
                        </button>
                        <button type="button" class="col-md-12 btn btn-success m-2" v-if="todo.type == 'writing'" data-bs-toggle="modal" data-bs-target="#exampleFullScreenModalAnswerWriting" @click="set_item_id_answer(todo.id)">
                            Savolga javob berish
                        </button>
                        <button class="col-md-12 btn btn-primary m-2" type="button" :data-id="todo.id" v-if="todo.type == 'variant'" @click="add_variant(todo.id)">
                            Variant qo'shish
                        </button>
                        <button class="col-md-12 btn btn-primary m-2" type="button" :data-id="todo.id" v-if="todo.type == 'comparison'" @click="add_comparison(todo.id)">
                           Solishtirish qo'shish
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `,
    methods : {
        change_type_test(id, event, type)  {
            vm.$data.datas.filter(item => item.id == id)[0].type = type;
        },

        add_variant(id){
            vm.$data.datas.filter(item => item.id == id)[0].variants.push(
                {
                    id : -1,
                    name : "",
                    delete_status : 0,
                    correct : false
                }
            );
        },

        add_comparison(id){
            vm.$data.datas.filter(item => item.id == id)[0].comparisons.push(
                {
                    id : -1,
                    delete_status : 0,
                    block : {
                        block_left : {
                            id : -1,
                            name : ""
                        },
                        block_right : {
                            id : -1,
                            name : ""
                        }
                    }
                }
            );
        },

        set_item_id(id){
            item_id = id;

            window.editor.setData(vm.$data.datas.filter(item => item.id == item_id)[0].data);

        },

        set_item_id_answer(id) {

            item_id = id;

            window.editor2.setData(vm.$data.datas.filter(item => item.id == item_id)[0].writing);
        },
        set_variant_id(id, varian_id){
            item_id = id;

            variant_id = varian_id;

            let item_va = vm.$data.datas.find(item => item.id == item_id).variants.find(function (item1) {
                return item1.id == variant_id;
            });

            window.editor1.setData(item_va.name);
        },

        delet_question(id){

            let flag = confirm('Savol oʻchirilsinmi?');

            if (flag) {
                vm.$data.datas.find(item => item.id == id).delete_status = 1;
            }
        },
        delet_variant(id, v_id){

            let flag = confirm('Variant olib tashlansinmi?');

            if (flag) {

                vm.$data.datas.find(item => item.id == id).variants.find(item => item.id == v_id).delete_status = 1;
            }
        },
        delet_comparison(id, c_id){

            let flag = confirm('Ushbu bo`lim o`chirilsinmi?');

            if (flag) {

                vm.$data.datas.find(item => item.id == id).comparisons.find(item => item.id == c_id).delete_status = 1;

            }
        }
    }
})


const vm = app.mount('#accordionExample');

let id = 5000;

function addRow() {
    vm.$data.datas.push(
        {
            id : -1,
            question_name : "",
            type : "variant",
            data : "",
            waiting_seconds : 30,
            variants : [],
            comparisons : [],
            delete_status : 0,
            data : ""
        }
    );

    id++;
}
