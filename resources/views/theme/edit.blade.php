@extends('template')

@section('script_include_header')

    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/super-build/ckeditor.js"></script>

@endsection

@section('body')

<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Mavzu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mavzu yangilash</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-10 mx-auto">
                <h6 class="mb-0 text-uppercase">Mavzu o'zgartirish formasi</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Ma'lumotlarni to'ldiring</h5>
                        </div>
                        <hr>
                        <form class="row g-3" method="POST" action="/theme_subject/{{ $theme['id'] }}">
                            @method('PUT')

                            @csrf
                            <div class="col-12">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                        <div class="text-white">{{ $error }}</div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-md-12">
                                <label for="subject_id" class="form-label">Fanlar</label>
                                <select class="single-select" id="subject_id" name="subject_id">
                                    <option value=""></option>

                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                        @isset($theme)
                                            @if ($theme->theme_subject[0]->id==$subject->id)
                                                selected
                                            @endif
                                        @endisset>{{ $subject->name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-md-12">
                                <label for="form_education_id" class="form-label">Ta'lim turlari</label>
                                <select class="single-select" id="form_education_id" name="form_education_id">
                                    <option value="" disabled>Ta'lim turlari tanlang.</option>
                                    <option value="1" {{ $theme->direction->form_of_education_id == 1 && $theme->direction->type_of_education_id == 1 ? 'selected' : '' }}>Bakalavr (Kunduzgi)</option>
                                    <option value="2" {{ $theme->direction->form_of_education_id == 1 && $theme->direction->type_of_education_id == 2 ? 'selected' : '' }}>Bakalavr (Sirtqi)</option>
                                    <option value="4" {{ $theme->direction->form_of_education_id == 1 && $theme->direction->type_of_education_id == 4 ? 'selected' : '' }}>Bakalavr (Kechki)</option>
                                    <option value="3" {{ $theme->direction->form_of_education_id == 2 ? 'selected' : '' }}>Magistratura</option>
                                </select>
                            </div>
                            <br>

                            <div class="col-md-12">
                                <label for="direction_id" class="form-label">Yo'nalishlar</label>
                                <select class="single-select" id="direction_id" name="direction_id">
                                    @foreach ($directions as $direction)
                                        @if($theme->direction_id == $direction->id)
                                            <option selected value="{{ $direction->id }}" >{{ $direction->title }}</option>
                                        @elseif($theme->direction_id != $direction->id)
                                            <option value="{{ $direction->id }}" >{{ $direction->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <div class="col-md-12">
                                <label for="semester_id" class="form-label">Semestrlar</label>
                                <select class="single-select" id="semester_id" name="semester_id">
                                    @foreach ($semesters as $semester)
                                        @if($theme->semester_id == $semester->id)
                                            <option selected value="{{ $semester->id }}" >{{ $semester->name }}</option>
                                        @elseif($theme->semester_id != $semester->id)
                                            <option value="{{ $semester->id }}" >{{ $semester->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <label for="theme_name" class="form-label">Mavzu</label>
                                <input type="text" name="theme_name" class="form-control" id="theme_name"
                                @isset($theme)
                                    value="{{ $theme->theme_name }}"
                                @endisset>
                            </div>
                            <div class="col-md-12">
                                <label for="theme_text" class="form-label">Maqola matni</label>
                                <textarea class="form-control" id="theme_text" name="theme_text" rows="8">
                                    {{ $theme['theme_text'] }}
                                </textarea>
                            </div>
                            <br>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-5">O'zgartirish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
</div>


@endsection

@push('scripte_include_end_body')

    <script src="{{ url('assets/plugins/select2/js/select2.min.js') }}"></script>

    <script>

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

        $('#subject_id').on('select2:select', function (e) {

            $.ajax('{{ route('get_test_theme') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "subject_id" : e.params.data.id
                },
                success: function (data, status) {

                    let objects = [];

                    objects.push({id : '', text: ''})

                    for (const item of data.objects) {

                        objects.push({id : item.id, text: item.name})
                    }

                    $('#mb_test_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Ўқув режани танланг",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: objects,
                        disabled : false
                    });
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    console.log(errorMessage);
                }
            });
        });

        $('#form_education_id').on('select2:select', function (e) {
            $.ajax('{{ route('get_test_direction') }}', {
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "form_of_education_id" : e.params.data.id
                },
                success: function (data, status) {

                    let objects = [];

                    objects.push({id : '', text: ''})

                    for (const item of data.objects) {

                        objects.push({id : (item.direction_id ? item.direction_id : item.id), text: item.title})
                    }

                    $('#direction_id').empty().select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                        placeholder: "Ўқув режани танланг",
                        allowClear: Boolean($(this).data('allow-clear')),
                        data: objects,
                        disabled : false
                    });
                },
                error: function (jqXhr, textStatus, errorMessage) {

                    console.log(errorMessage);
                }
            });
        });
    </script>

    <script>

        CKEDITOR.ClassicEditor.create(document.getElementById("theme_text"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
            items: [
                'exportPDF','exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Maqola',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
            options: [ 10, 12, 14, 'default', 18, 20, 22 ],
            supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
            showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
            'MathType',
            // The following features are part of the Productivity Pack and require additional license.
            'SlashCommand',
            'Template',
            'DocumentOutline',
            'FormatPainter',
            'TableOfContents'
            ]
        }).then( newEditor => {
            editor = newEditor;
        })
        .catch( error => {
            console.error( error );
        });

    </script>

@endpush
