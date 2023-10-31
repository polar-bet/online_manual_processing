
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css">
    <link rel="shortcut icon" href="{{asset("storage/images/processing_tab_logo.png")}}">

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,600,700,700italic,900,900italic"
        rel="stylesheet">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



    @vite([
    "resources/js/plugins/select2/css/select2.min.css",
    "resources/js/plugins/fontawesome-free/css/all.min.css",
    "resources/js/dist/css/adminlte.min.css",
    "resources/js/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",

    ])

    <title>@yield('title')</title>
    @vite(['resources/js/burger.js', 'resources/js/app.js', 'resources/sass/reset.scss', 'resources/sass/app.scss', 'resources/sass/header.scss', 'resources/sass/footer.scss'])
    @vite([
       "resources/js/plugins/bootstrap/js/bootstrap.bundle.min.js",
       "resources/js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
       "resources/js/dist/js/adminlte.js",
       "resources/js/plugins/select2/js/select2.full.min.js",
       "resources/js/plugins/summernote/summernote-bs4.min.js",
       "resources/js/plugins/summernote/summernote-bs4.min.css",
       "resources/js/plugins/daterangepicker/daterangepicker.js",
       "resources/js/plugins/moment/moment.min.js",
       ])

    <script type="text/javascript">
        $(document).ready(function () {
            $("#summernote").summernote({
                lang: 'uk-UA',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'help']]
                ],
                maximumImageFileSize: 500 * 1024, // 500 KB
                callbacks: {
                    onImageUploadError: function (msg) {
                        var errorMessage = "Помилка завантаження зображення: розмір зображення не повинен бути більшим ніж 1 МБ";
                        var alertHtml = '<div class="alert alert-danger" role="alert">' + errorMessage + '</div>';
                        var messageContainer = $('#error-container');

                        messageContainer.html(alertHtml);
                        messageContainer.show();

                        setTimeout(function () {
                            messageContainer.fadeOut(500, function () {
                                messageContainer.empty();
                            });
                        }, 3000);
                    }
                }
            });
        });

    </script>

    <link href="https://fonts.googleapis.com/css?family=Space+Grotesk:300,regular,500,600,700" rel="stylesheet" />
</head>

