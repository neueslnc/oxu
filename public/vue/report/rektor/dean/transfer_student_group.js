
const TestList = {
    data() {
        return {
            groups : groups,
            transef_groups : transef_group
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'groups',
        'transef_groups'
    ],
    template: `
    <form class="row g-3 p-3">

        <div class="col-md-6">
            <label for="to_group" class="form-label">Yo'nalish</label>
            <select class="form-select mb-3" id="to_group">
                <option value=""></option>
                <option v-for="group in groups" :value="group.id">{{group.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="from_group" class="form-label">Tili</label>
            <select class="form-select mb-3" id="from_group">
                <option value=""></option>
                <option v-for="group in groups" :value="group.id">{{group.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="date_from" class="form-label">Data dan</label>
            <input type="date" name="date_from" class="form-control" id="date_from">
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Data gacha</label>
            <input type="date" name="date_to" class="form-control" id="date_to">
        </div>

        <div class="col-md-6">
            <button type="button" class="btn btn-primary" @click="reset_parametr()">
                Parametrlarni tashlash
            </button>
        </div>

    </form>
    
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Guruh nomi 1</th>
                    <th scope="col">Guruh nomi 2</th>
                    <th scope="col">Talaba</th>
                    <th scope="col">Sana</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="group in transef_groups">
                    <td>
                        {{ group['exit_group']['title'] }}
                    </td>
                    <td>
                        {{ group['transfer_group']['title'] }}
                    </td>
                    <td>
                        {{ group['student']['full_name'] }}
                    </td>
                    <td>
                        {{ group['date'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `
});

const vm = app.mount('#test');
