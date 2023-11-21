
const TestList = {
    data() {
        return {
            students : students,
            directions : directions,
            languages : languages,
            groups : groups,
            type_of_educations : type_of_educations,
            form_of_educations : form_of_educations,
            group_courses : group_courses,
            academic_years : academic_years,
            search_group : true,
            search_criteria: false,
            count_elements_page : count_elements_page
        }
    },
}

const app = Vue.createApp(TestList)

 // <div class="col-md-6">
        //     <label for="academic_year_id" class="form-label">Yili</label>
        //     <select class="form-select mb-3" id="academic_year_id" v-bind:disabled="search_group">
        //         <option value=""></option>
        //         <option v-for="academic_year in academic_years" :value="academic_year.id">{{academic_year.name}}</option>
        //     </select>
        // </div>

app.component('main-component', {
    props: [
        'students', 
        'groups', 
        'directions', 
        'languages', 
        'type_of_educations', 
        'form_of_educations', 
        'group_courses',
        'academic_years',
        'search_group',
        'search_criteria'
    ],
    template: `
    <form class="row g-3 p-3">

        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="search_group" v-bind:checked="search_group" @click="set_revers_search_type()">
                <label class="form-check-label" for="search_group" >Guruhlar bo\`yicha qidiruv</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="search_criteria" v-bind:checked="search_criteria" @click="set_revers_search_type()">
                <label class="form-check-label" for="search_criteria" >Parametrlar bo\`yicha qidiruv</label>
            </div>
        </div>

        <div class="col-md-6">
            <label for="group_id" class="form-label">Guruh</label>
            <select class="form-select mb-3" id="group_id" v-bind:disabled="search_criteria">
                <option value=""></option>
                <option v-for="group in groups" :value="group.id">{{group.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="direction_id" class="form-label">Yo'nalish</label>
            <select class="form-select mb-3" id="direction_id" v-bind:disabled="search_group">
                <option value=""></option>
                <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="language_id" class="form-label">Tili</label>
            <select class="form-select mb-3" id="language_id" v-bind:disabled="search_group">
                <option value=""></option>
                <option v-for="language in languages" :value="language.id">{{language.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="type_of_education_id" class="form-label">Kuzduzgi sirtqi</label>
            <select class="form-select mb-3" id="type_of_education_id" v-bind:disabled="search_group">
                <option value=""></option>
                <option v-for="type_of_education in type_of_educations" :value="type_of_education.id">{{type_of_education.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="form_of_education_id" class="form-label">magistr bakalavr</label>
            <select class="form-select mb-3" id="form_of_education_id" v-bind:disabled="search_group">
                <option value=""></option>
                <option v-for="form_of_education in form_of_educations" :value="form_of_education.id">{{form_of_education.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="group_course_id" class="form-label">Kurs</label>
            <select class="form-select mb-3" id="group_course_id" v-bind:disabled="search_group">
                <option value=""></option>
                <option v-for="group_courses in group_courses" :value="group_courses.id">{{group_courses.title}}</option>
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

        <div class="col-md-12">
            <label for="count_elements_page_id" class="form-label">Sahifadagi elementlar soni</label>
            <select class="form-select mb-3" id="count_elements_page_id">
                <option value="5" selected>5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
            </select>
        </div>

        <div class="col-md-6">
            <button type="button" class="btn btn-primary" @click="reset_parametr()">
                Parametrlarni tashlash
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

    </form>
    
    <div class="table-responsive" id="tab">
        <table class="table align-middle mb-0" id="table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>FIO</th>
                    <th>Guruh</th>
                    <th>Telefon</th>
                    <th>Tili</th>
                    <th>Kkuzduzgi sirtqi</th>	
                    <th>asd</th>
                    <th>ta\`lim fakulteti</th>
                    <th>Guruh kursi</th>
                    <th>Guruh o\`qiyotgan yil</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>
                        {{ student['student_id'] }}
                    </td>
                    <td>
                        {{ student['full_name'] }}
                    </td>
                    <td>
                        {{ student['dean_group']['title'] }}
                    </td>
                    <td>
                        {{ student['number_phone'] }}
                    </td>
                    <td>
                        {{ student.language?.name }}
                    </td>
                    <td>
                        {{ student.type_of_education?.name }}
                    </td>
                    <td>
                        {{ student['form_of_education']['title'] }}
                    </td>
                    <td>
                        {{ student['direction']['title'] }}
                    </td>
                    <td>
                        {{ student['student_course']['title'] }}
                    </td>
                     <td>
                        {{ student.dean_group?.get_group_akademik_year?.name }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `,
    methods : {
        set_revers_search_type (){
            vm.$data.search_group = !vm.$data.search_group;
            vm.$data.search_criteria = !vm.$data.search_criteria;
        },

        reset_parametr(){
            $("#direction_id").val("").trigger('change'); 
            $("#language_id").val("").trigger('change'); 
            $("#type_of_education_id").val("").trigger('change'); 
            $("#form_of_education_id").val("").trigger('change'); 
            $("#group_course_id").val("").trigger('change'); 
            $("#academic_year_id").val("").trigger('change'); 
            $("#group_id").val("").trigger('change'); 
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
