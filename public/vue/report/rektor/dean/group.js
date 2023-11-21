
const TestList = {
    data() {
        return {
            directions : directions,
            languages : languages,
            groups : groups,
            type_of_educations : type_of_educations,
            form_of_educations : form_of_educations,
            group_courses : group_courses,
            academic_years : academic_years
        }
    },
}

const app = Vue.createApp(TestList)

app.component('main-component', {
    props: [
        'groups', 
        'directions', 
        'languages', 
        'type_of_educations', 
        'form_of_educations', 
        'group_courses',
        'search_criteria'
    ],
    template: `
    <form class="row g-3 p-3">

        <div class="col-md-6">
            <label for="direction_id" class="form-label">Yo'nalish</label>
            <select class="form-select mb-3" id="direction_id">
                <option value=""></option>
                <option v-for="direction in directions" :value="direction.id">{{direction.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="language_id" class="form-label">Tili</label>
            <select class="form-select mb-3" id="language_id">
                <option value=""></option>
                <option v-for="language in languages" :value="language.id">{{language.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="type_of_education_id" class="form-label">Kuzduzgi sirtqi</label>
            <select class="form-select mb-3" id="type_of_education_id">
                <option value=""></option>
                <option v-for="type_of_education in type_of_educations" :value="type_of_education.id">{{type_of_education.name}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="form_of_education_id" class="form-label">magistr bakalavr</label>
            <select class="form-select mb-3" id="form_of_education_id">
                <option value=""></option>
                <option v-for="form_of_education in form_of_educations" :value="form_of_education.id">{{form_of_education.title}}</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="group_course_id" class="form-label">Kurs</label>
            <select class="form-select mb-3" id="group_course_id">
                <option value=""></option>
                <option v-for="group_courses in group_courses" :value="group_courses.id">{{group_courses.title}}</option>
            </select>
        </div>

        <div class="col-md-12">
            <label for="count_elements_page_id" class="form-label">Sahifadagi elementlar soni</label>
            <select class="form-select mb-3" id="count_elements_page_id">
                <option value=""></option>
                <option value="5">5</option>
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

    </form>
    
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col">Guruh nomi</th>
                    <th scope="col">Guruh tili</th>
                    <th scope="col">Guruh o'qish turi</th>
                    <th scope="col">Guruh o'qish shakli</th>
                    <th scope="col">Guruh fakulteti</th>
                    <th scope="col">Guruh kursi</th>
                    <th scope="col">Guruh yili</th>
                    <th scope="col">Talaba</th>
                    <th scope="col">Talaba ko\`chdi</th>
                    <th scope="col">Talaba ko\`chirildi</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="group in groups">
                    <td>
                        {{ group['title'] }}
                    </td>
                    <td>
                        {{ group['get_language']['name'] }}
                    </td>
                    <td>
                        {{ group['get_type_of_education_id']['name'] }}
                    </td>
                    <td>
                        {{ group['get_form_of_education_id']['title'] }}
                    </td>
                    <td>
                        {{ group['get_direction_id']['title'] }}
                    </td>
                    <td>
                        {{ group['get_group_course_id']['title'] }}
                    </td>
                    <td>
                        {{ group.get_group_akademik_year?.name }}
                    </td>
                    <td>
                        {{ group.get_students_count }}
                    </td>
                    <td>
                        {{ group.get_who_came_student_count }}
                    </td>
                    <td>
                        {{ group.get_departed_student_count }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    `
});

const vm = app.mount('#test');
