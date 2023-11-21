
const TestList = {
    data() {
        return {
            groups : groups,
            supervisor_groups : [],
            supervisor_id : 0,
            group_name : ''
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'groups',
        'supervisor_groups',
        'supervisor_id'
    ],
    template: `
        <div class="modal fade" id="selected_groups_supervisor" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="full_name_vue"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
<!--                        <form class="row g-3 p-3">-->
<!--                            <div class="col-md-12">-->
<!--                                <label for="direction_id" class="form-label">Qidiruv</label>-->
<!--                                <input placeholder="Ism, Passport, Talaba ID" id="search_student" type="text" class="form-control mb-3" v-model="group_name">-->
<!--                            </div>-->
<!--                        </form>-->
                        <div class="mb-2" v-for="(group, index) in groups.sort((a, b) => { return a.supervisor_id == supervisor_id ? -1 : 1 })">
                            <div v-bind:class="'m-1 p-4 border border-3 border-success rounded bg-light'" @click="set_status_group(group.id)" v-if="group.supervisor_id == supervisor_id">
                                <div class="row" style="font-size: 14px">
                                    <div class="col-md-1 text-center ">
                                        {{ ++index }}.
                                    </div>
                                    <div class="col-md-10 text-center ">
                                        {{ group.title }}
                                    </div>
                                </div>
                            </div>
                            <div v-bind:class="'m-1 p-4 border border-3 border rounded bg-light'" @click="set_status_group(group.id)" v-if="group.supervisor_id == 0">
                                <div class="row" style="font-size: 14px">
                                    <div class="col-md-1 text-center ">
                                        {{ ++index }}.
                                    </div>
                                    <div class="col-md-10 text-center ">
                                        {{ group.title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="send_data()">
                            Saqlash
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `,
    methods : {
        set_status_group(group_id){

            console.log(vm.$data.groups.find(item => item.id == group_id))

            if (vm.$data.groups.find(item => item.id == group_id).supervisor_id == vm.$data.supervisor_id){
                vm.$data.groups.find(item => item.id == group_id).supervisor_id = 0;
            }else{
                vm.$data.groups.find(item => item.id == group_id).supervisor_id = vm.$data.supervisor_id;
            }
            vm.$data.supervisor_groups = vm.$data.groups.filter(item => item.supervisor_id == vm.$data.supervisor_id);
        }
    }
});

const vm = app.mount('#test');
