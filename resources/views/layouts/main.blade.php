<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Apollo Dashboard Admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    @include('templates/styles')
</head>
<style>
    .panel-header {
        background-color: #002531 !important;
    }

</style>

<body class="">
    <div class="wrapper ">
        @include('templates/sidebar')
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            @include('templates/navbar')
            <!-- End Navbar -->
            @yield('chart')
            <div class="content">
                @yield('content')
            </div>
            @include('templates/footer')
        </div>
    </div>
    @include('templates/script')
    @yield('js')
    <script>
        const menu = document.querySelectorAll('.nav li')
        var url = window.location.href
        menu.forEach(val => {
            if (val.children[0].href == url) {
                val.classList.add('active')
            }
        })
    </script>
    <script>
        setTimeout(() => {
            $('.alert').alert('close');
        }, 1500);
    </script>
</body>

</html>
