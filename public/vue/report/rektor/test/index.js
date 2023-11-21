
const TestList = {
    data() {
        return {
            students : students,
            groups : groups,
            directions : directions,
            subjects : subjects
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: ['students', 'groups', 'directions', 'subjects', "include_send_button", "include_operation_button"],
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
            <label for="direction_id" class="form-label">Yo'nalish</label>
            <select class="form-select mb-3" id="direction_id">
                <option value=""></option>
                <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="subject_id" class="form-label">Fanlar</label>
            <select class="form-select mb-3" id="subject_id">
                <option value=""></option>
                <option v-for="subject in subjects" :value="subject.id">{{subject.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Data dan</label>
            <input type="date" name="date_from" class="form-control" id="date_from">
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Data gacha</label>
            <input type="date" name="date_to" class="form-control" id="date_to">
        </div>

    </form>

    <div class="row justify-content-center" v-if="include_send_button == true">
        <button class="btn btn-success mb-3 col-md-10" @click="set_all_supervisor_view()">
            Saqlash
        </button>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Export</button>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu" style="">
                    <li>
                        <a class="dropdown-item" @click="tableToExcel('table', 'name', 'myfile.xls')">Excel</a>
                    </li>
                    <li>
                        <a class="dropdown-item" @click="createPDF()">PDF</a>
                    </li>
                    
                </ul>
            </div>  
        </div>
    </div>
    
    <div class="table-responsive" id="tab">
        <table class="table align-middle mb-0" id="table">
            <thead class="table-light">
                <tr>
                    <th>Talaba</th>
                    <th>Gruhu</th>
                    <th>Yo'nalish</th>
                    <th>Fanlar</th>
                    <th>Yakuniy natija</th>
                    <th>Nazoratchi natijasi</th>
                    <th>Imtihon boshlanishi</th>
                    <th>Imtihon tugashi</th>
                    <th v-if="include_operation_button == true">Harakatlar</th>
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
                        {{ student['exam']['direction']['title'] }}
                    </td>
                    <td>
                        {{ student['exam']['subject']['name'] }}
                    </td>
                    <td>
                        Ball - {{ (student['ball'] ? student['ball'] : 0 ) }},<br/>
                        Savollar - {{ (student['question_count'] ? student['question_count'] : 0 )  }},<br/>
                        To'g'ri javoblar - {{ (student['question_success'] ? student['question_success'] : 0 ) }},<br/>
                        Noto'g'ri javoblar - {{ (student['question_rejerect'] ? student['question_rejerect'] : 0 ) }}
                    </td>
                    <td>
                        Ball - {{ (student['supervisor_ball'] ? student['supervisor_ball'] : 0 ) }},<br/>
                        Savollar - {{ (student['supervisor_question_count'] ? student['supervisor_question_count'] : 0 )  }},<br/>
                        To'g'ri javoblar - {{ (student['supervisor_question_success'] ? student['supervisor_question_success'] : 0 ) }},<br/>
                        Noto'g'ri javoblar - {{ (student['supervisor_question_rejerect'] ? student['supervisor_question_rejerect'] : 0 ) }}
                    </td>
                    <td>
                        {{ student['start_date_time'] }}
                    </td>
                    <td>
                        {{ student['end_date_time'] }}
                    </td>
                    <td v-if="include_operation_button == true">
                        <buttton class="btn btn-primary" @click="show_exam(student['id'])">
                            O'zgartirish
                        </buttton>
                        <buttton class="btn btn-success" v-if="student['supervisor_view'] == 0" @click="set_supervisor_view(student['id'], 1)">
                            Natijalarni ko'rsatish
                        </buttton>
                        <buttton class="btn btn-danger" v-if="student['supervisor_view'] == 1" @click="set_supervisor_view(student['id'], 0)">
                            Natijalarni ko'rsatmaslik
                        </buttton>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
        show_exam(id){
            let item = vm.students.find(item => item.id == id);

            $("#theme_id").val(id)

            $("#ball_id").val((item.supervisor_ball ? item.supervisor_ball : 0));

            $("#question_count_id").val((item.supervisor_question_count ? item.supervisor_question_count : 0));

            $("#question_success_id").val((item.supervisor_question_success ? item.supervisor_question_success : 0));

            $("#question_rejerect_id").val((item.supervisor_question_rejerect ? item.supervisor_question_rejerect : 0));

            $('#exampleModal').modal('toggle');
        },

        set_supervisor_view(id, status){
            send_supervisor_view(id, status)
        },

        set_all_supervisor_view(){
            send_all_supervisor_view()
        },

        tableToExcel(table, name, filename) {
            let uri = 'data:application/vnd.ms-excel;base64,', 
            template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>', 
            base64 = function(s) { return window.btoa(decodeURIComponent(encodeURIComponent(s))) },         format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
            
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    
            var link = document.createElement('a');
            link.download = filename;
            link.href = uri + base64(format(template, ctx));
            link.click();
        },

        createPDF() {
            var sTable = document.getElementById('tab').innerHTML;
    
            var style = "<style>";
            style = style + "table {width: 100%;font: 17px Calibri;}";
            style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
            style = style + "padding: 2px 3px;text-align: center;}";
            style = style + "</style>";
    
            // CREATE A WINDOW OBJECT.
            var win = window.open('', '', 'height=700,width=700');
    
            win.document.write('<html><head>');
            win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
            win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
            win.document.write('</head>');
            win.document.write('<body>');
            win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
            win.document.write('</body></html>');
    
            win.document.close(); 	// CLOSE THE CURRENT WINDOW.
    
            win.print();    // PRINT THE CONTENTS.
        }
    }
});

const vm = app.mount('#test');
