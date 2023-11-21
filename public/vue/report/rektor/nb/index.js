
const TestList = {
    data() {
        return {
            students : students,
            supervisors : supervisors,
            directions : directions,
            teachers : teachers,
            groups : groups,
            subjects : subjects,
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: ['students', 'groups', 'supervisors', 'teachers', 'subjects', 'directions'],
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
            <label for="supervisor_id" class="form-label">Nazoratchi</label>
            <select class="form-select mb-3" id="supervisor_id">
                <option v-for="supervisor in supervisors" :value="supervisor.id">{{supervisor.full_name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="teacher_id" class="form-label">Oqituvchi</label>
            <select class="form-select mb-3" id="teacher_id">
                <option v-for="teacher in teachers" :value="teacher.id">{{teacher.full_name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="subject_id" class="form-label">Fanlar</label>
            <select class="form-select mb-3" id="subject_id">
                <option v-for="subject in subjects" :value="subject.id">{{subject.name}}</option>
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
            <label for="date_to" class="form-label">Data dan</label>
            <input type="date" name="date_from" class="form-control" id="date_from">
        </div>

        <div class="col-md-6">
            <label for="date_to" class="form-label">Data gacha</label>
            <input type="date" name="date_to" class="form-control" id="date_to">
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

    </form>
    
    <div class="table-responsive" id="tab">
        <table class="table align-middle mb-0" id="table">
            <thead class="table-light">
                <tr>
                    <th>Talaba</th>
                    <th>Gruhu</th>
                    <th>O'qituvchi</th>
                    <th>Nazoratchi</th>
                    <th>Mavzu</th>
                    <th>Fanlar</th>
                    <th>Yo'nalish</th>
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
                        {{ student['teacher']['full_name'] }}
                    </td>
                    <td>
                        {{ student['get_supervisor']['full_name'] }}
                    </td>
                    <td>
                        {{ student['test']['theme']['theme_name'] }}
                    </td>
                    <td>
                        {{ student['subject']['name'] }}
                    </td>
                    <td>
                        {{ student['direction']['title'] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
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
