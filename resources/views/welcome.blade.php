<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apollo Login</title>
</head>

<body>
    <div class="materialContainer">
        <div class="box">
            <div class="title">LOGIN</div>
            <form action="/login" method="post">
                @csrf
                <div class="input">
                    <label for="name">Email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="email" name="email" id="name">
                    <span class="spin"></span>
                </div>
                <div class="input">
                    <label for="pass">Password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="password" name="password" id="pass">
                    <span class="spin"></span>
                </div>

                <div class="button login">
                    <button type="submit"><span>GO</span> <i class="fa fa-check"></i></button>
                </div>
            </form>
            <a href="" class="pass-forgot">Forgot your password?</a>
        </div>
        <div class="overbox">
            <div class="material-button alt-2"><span class="shape"></span></div>
            <div class="title">REGISTER</div>
            <form action="/register" method="post">
                @csrf
                <div class="input">
                    <label for="regname">Username</label>
                    <input type="text" name="name" id="regname">
                    <span class="spin"></span>
                </div>
                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                    <span class="spin"></span>
                </div>
                <div class="input">
                    <label for="regpass">Password</label>
                    <input type="password" name="password" id="regpass">
                    <span class="spin"></span>
                </div>
                {{-- <div class="input">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation">
                    <span class="spin"></span>
                </div> --}}
                <div class="button">
                    <button type="submit"><span>NEXT</span></button>
                </div>
            </form>


        </div>

    </div>
    @include('templates/script')
    <script>
        $(function() {

            $(".input input").focus(function() {

                $(this).parent(".input").each(function() {
                    $("label", this).css({
                        "line-height": "18px",
                        "font-size": "18px",
                        "font-weight": "100",
                        "top": "0px"
                    })
                    $(".spin", this).css({
                        "width": "100%"
                    })
                });
            }).blur(function() {
                $(".spin").css({
                    "width": "0px"
                })
                if ($(this).val() == "") {
                    $(this).parent(".input").each(function() {
                        $("label", this).css({
                            "line-height": "60px",
                            "font-size": "24px",
                            "font-weight": "300",
                            "top": "10px"
                        })
                    });

                }
            });

            $(".button").click(function(e) {
                var pX = e.pageX,
                    pY = e.pageY,
                    oX = parseInt($(this).offset().left),
                    oY = parseInt($(this).offset().top);

                $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (
                    pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
                $('.x-' + oX + '.y-' + oY + '').animate({
                    "width": "500px",
                    "height": "500px",
                    "top": "-250px",
                    "left": "-250px",

                }, 600);
                $("button", this).addClass('active');
            })

            $(".alt-2").click(function() {
                if (!$(this).hasClass('material-button')) {
                    $(".shape").css({
                        "width": "100%",
                        "height": "100%",
                        "transform": "rotate(0deg)"
                    })

                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "initial"
                        })
                    }, 600)

                    $(this).animate({
                        "width": "140px",
                        "height": "140px"
                    }, 500, function() {
                        $(".box").removeClass("back");

                        $(this).removeClass('active')
                    });

                    $(".overbox .title").fadeOut(300);
                    $(".overbox .input").fadeOut(300);
                    $(".overbox .button").fadeOut(300);

                    $(".alt-2").addClass('material-buton');
                }

            })

            $(".material-button").click(function() {

                if ($(this).hasClass('material-button')) {
                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "hidden"
                        })
                        $(".box").addClass("back");
                    }, 200)
                    $(this).addClass('active').animate({
                        "width": "700px",
                        "height": "700px"
                    });

                    setTimeout(function() {
                        $(".shape").css({
                            "width": "50%",
                            "height": "50%",
                            "transform": "rotate(45deg)"
                        })

                        $(".overbox .title").fadeIn(300);
                        $(".overbox .input").fadeIn(300);
                        $(".overbox .button").fadeIn(300);
                    }, 700)

                    $(this).removeClass('material-button');

                }

                if ($(".alt-2").hasClass('material-buton')) {
                    $(".alt-2").removeClass('material-buton');
                    $(".alt-2").addClass('material-button');
                }

            });

        });
    </script>
    <style>
        .box {
            position: relative;
            top: 0;
            opacity: 1;
            float: left;
            padding: 60px 50px 40px 50px;
            width: 100%;
            background: #fff;
            border-radius: 10px;
            transform: scale(1);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            z-index: 5;
        }

        .box.back {
            transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -ms-transform: scale(0.95);
            top: -20px;
            opacity: 0.8;
            z-index: -1;
        }

        .box:before {
            content: "";
            width: 100%;
            height: 30px;
            border-radius: 10px;
            position: absolute;
            top: -10px;
            background: rgba(255, 255, 255, 0.6);
            left: 0;
            transform: scale(0.95);
            -webkit-transform: scale(0.95);
            -ms-transform: scale(0.95);
            z-index: -1;
        }

        .overbox .title {
            color: #fff;
        }

        .overbox .title:before {
            background: #fff;
        }

        .title {
            width: 100%;
            float: left;
            line-height: 46px;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #002531;
            position: relative;
        }

        .title:before {
            content: "";
            width: 5px;
            height: 100%;
            position: absolute;
            top: 0;
            left: -50px;
            background: #002531;
        }

        .input {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input label,
        .input input,
        .input .spin {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .button {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .button button .button.login button i.fa {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .material-button .shape:before,
        .material-button .shape:after {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .button.login button {
            transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 300ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .material-button,
        .alt-2,
        .material-button .shape,
        .alt-2 .shape,
        .box {
            transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
            -webkit-transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
            -ms-transition: 400ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input {
            width: 100%;
            float: left;
        }

        .input label,
        .input input,
        .input .spin {
            width: 100%;
            float: left;
        }

        .button {
            width: 100%;
            float: left;
        }

        .button button {
            width: 100%;
            float: left;
        }

        .input,
        .button {
            margin-top: 30px;
            height: 70px;
        }

        .input {
            position: relative;
        }

        .input input {
            position: relative;
        }

        .button {
            position: relative;
        }

        .button button {
            position: relative;
        }

        .input input {
            height: 60px;
            top: 10px;
            border: none;
            background: transparent;
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            color: rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .input label {
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            color: rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .button button {
            font-family: 'Roboto', sans-serif;
            font-size: 24px;
            color: rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .input:before,
        .input .spin {
            width: 100%;
            height: 1px;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .input:before {
            content: "";
            background: rgba(0, 0, 0, 0.1);
            z-index: 3;
        }

        .input .spin {
            background: #002531;
            z-index: 4;
            width: 0;
        }

        .overbox .input .spin {
            background: rgba(255, 255, 255, 1);
        }

        .overbox .input:before {
            background: rgba(255, 255, 255, 0.5);
        }

        .input label {
            position: absolute;
            top: 10px;
            left: 0;
            z-index: 2;
            cursor: pointer;
            line-height: 60px;
        }

        .button {
            margin-top: 20px;
            margin: 40px 0;
            overflow: hidden;
            z-index: 2;
        }

        .button.login {
            width: 60%;
            left: 20%;
        }

        .button.login button {
            width: 100%;
            line-height: 64px;
            left: 0%;
            background-color: transparent;
            border: 3px solid rgba(0, 0, 0, 0.1);
            font-weight: 900;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.2);
        }

        .button button {
            width: 100%;
            line-height: 64px;
            left: 0%;
            background-color: transparent;
            border: 3px solid rgba(0, 0, 0, 0.1);
            font-weight: 900;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.2);
        }

        .button.login {
            margin-top: 30px;
        }

        .button button {
            background-color: #fff;
            color: #002531;
            border: none;
        }

        .button.login button.active {
            border: 3px solid transparent;
            color: #fff !important;
        }

        .button.login button.active span {
            opacity: 0;
            transform: scale(0);
            -webkit-transform: scale(0);
            -ms-transform: scale(0);
        }

        .button.login button.active i.fa {
            opacity: 1;
            transform: scale(1) rotate(0deg);
            -webkit-transform: scale(1) rotate(0deg);
            -ms-transform: scale(1) rotate(0deg);
        }

        .button.login button i.fa {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            line-height: 60px;
            transform: scale(0) rotate(-45deg);
            -webkit-transform: scale(0) rotate(-45deg);
            -ms-transform: scale(0) rotate(-45deg);
        }

        .button.login button:hover {
            color: #002531;
            border-color: #002531;
        }

        .button button {
            cursor: pointer;
            position: relative;
            z-index: 2;
        }

        .pass-forgot {
            width: 100%;
            float: left;
            text-align: center;
            color: rgba(0, 0, 0, 0.4);
            font-size: 18px;
        }

        .click-efect {
            position: absolute;
            top: 0;
            left: 0;
            background: #002531;
            border-radius: 50%;
        }

        .overbox {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            overflow: inherit;
            border-radius: 10px;
            padding: 60px 50px 40px 50px;
        }

        .overbox .title,
        .overbox .button,
        .overbox .input {
            z-index: 111;
            position: relative;
            color: #fff !important;
            display: none;
        }

        .overbox .title {
            width: 80%;
        }

        .overbox .input {
            margin-top: 20px;
        }

        .overbox .input input,
        .overbox .input label {
            color: #fff;
        }

        .overbox .material-button,
        .overbox .alt-2 {
            display: block;
        }

        .overbox .material-button .shape,
        .overbox .alt-2 .shape {
            display: block;
        }

        .material-button,
        .alt-2 {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background: #002531;
            position: absolute;
            top: 40px;
            right: -70px;
            cursor: pointer;
            z-index: 100;
            transform: translate(0%, 0%);
            -webkit-transform: translate(0%, 0%);
            -ms-transform: translate(0%, 0%);
        }

        .material-button .shape,
        .alt-2 .shape {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }

        .material-button .shape:before,
        .alt-2 .shape:before,
        .material-button .shape:after,
        .alt-2 .shape:after {
            content: "";
            background: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(360deg);
            -webkit-transform: translate(-50%, -50%) rotate(360deg);
            -ms-transform: translate(-50%, -50%) rotate(360deg);
        }

        .material-button .shape:before,
        .alt-2 .shape:before {
            width: 25px;
            height: 4px;
        }

        .material-button .shape:after,
        .alt-2 .shape:after {
            height: 25px;
            width: 4px;
        }

        .material-button.active,
        .alt-2.active {
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%) rotate(0deg);
            -webkit-transform: translate(50%, -50%) rotate(0deg);
            -ms-transform: translate(50%, -50%) rotate(0deg);
        }

        body {
            background-image: url(https://lh4.googleusercontent.com/-XplyTa1Za-I/VMSgIyAYkHI/AAAAAAAADxM/oL-rD6VP4ts/w1184-h666/Android-Lollipop-wallpapers-Google-Now-Wallpaper-2.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
            overflow: hidden;
        }

        html {
            overflow: hidden;
        }

        .materialContainer {
            width: 100%;
            max-width: 460px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            list-style-type: none;
            outline: none;
        }

        *:after,
        *::before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            text-decoration: none;
            list-style-type: none;
            outline: none;
        }

    </style>
</body>

</html>
