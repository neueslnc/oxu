
const PaginationTemplate = {
    data() {
        return {
            count : count,
            current_page : current_page
        }
    },
}

const paginations = Vue.createApp(PaginationTemplate)

paginations.component('pagination-component', {
    props: ['count', 'current_page'],
    template: `

    <ul class="mb-0 pagination" >
        <li class="page-item pagination-page-nav" :class="{ active: (n.page == current_page) }" v-for="n of get_test()">
            <a class="page-link" href="#" @click="send(n.page)" >
                {{ n.name }}
            </a>
        </li>
    </ul>
    `,
    methods : {
        send(page)  {
            pagination.$data.current_page = page;
            get_exam();
        },

        get_test(){

            let start_page = 1;
            let per_page = 3;
            let end_page = this.count;
            
            let arr = [];

            if (( (this.current_page - per_page) - (start_page + per_page)) > 5) {
                
                for (let index = 1; index <= per_page; index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }

                arr.push({
                    'name' : "...",
                    'page' : Math.round(((this.current_page - per_page) + (start_page + per_page)) / 2)
                });

                for (let index = (this.current_page - per_page); index < this.current_page; index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }

            }else{

                for (let index = start_page; index < this.current_page; index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }
            }

            if (( (end_page - per_page) - (this.current_page + per_page) ) > 5) {
                
                for (let index = this.current_page; index <= (this.current_page + per_page); index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }

                arr.push({
                    'name' : "...",
                    'page' : Math.round(((this.current_page + per_page) + (end_page - per_page)) / 2)
                });

                for (let index = (end_page - per_page); index < end_page; index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }

            }else{

                for (let index = this.current_page; index <= end_page; index++) {
                    arr.push({
                        'name' : index,
                        'page' : index
                    });
                }
            }

            console.log(arr);

            return arr;
        }

    }
});

const pagination = paginations.mount('#pagination');
