<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- CSS Files -->
<link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{ asset('/assets/demo/demo.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('/tagsinput/bootstrap-tagsinput.css') }}">
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>

@production
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ secure_asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ secure_asset('/assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ secure_asset('/assets/demo/demo.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ secure_asset('/tagsinput/bootstrap-tagsinput.css') }}">
    <script src="{{ secure_asset('/ckeditor/ckeditor.js') }}"></script>
@endproduction
