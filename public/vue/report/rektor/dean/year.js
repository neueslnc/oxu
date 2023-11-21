
const TestList = {
    data() {
        return {
            years : years,
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'years'
    ],
    template: `

    <form class="row g-3 p-3">

        <div class="col-md-12">
            <label for="count_elements_page_id" class="form-label">Sahifadagi elementlar soni</label>
            <select class="form-select mb-3" id="count_elements_page_id">
                <option value="5" selected>5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
            </select>
        </div>

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

    </form>
    
    <div class="table-responsive" id="tab">
        <table class="table align-middle mb-0" id="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Yillar</th>
                    <th scope="col">Guruhlar soni</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="group in years">
                    <td>
                        {{ group['name'] }}
                    </td>
                    <td>
                        {{ group['get_group_student_count'] }}
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
