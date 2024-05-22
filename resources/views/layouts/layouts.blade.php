<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" rel="stylesheet">


        <style>
            .txt-center {
                text-align: center;
            }
        </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if(auth()->check())
    <div id="left-menu">
        <ul>
            <li class="active"><a href="#">
                    <i class="ion-ios-person-outline"></i>
                    <span>My Tasks</span>
                </a></li>
                <li class=""><a href="{{route('chatt.index')}}">
                    <i class="ion-ios-person-outline"></i>
                    <span>Chatt System</span>
                </a></li>

        </ul>
    </div>
    <div id="main-content">
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="navbar-brand">
                        {{auth()->user()->name}}
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left: 30%">
                            <form class="d-flex" id="filter-form">
                                <select name="status" onchange="FilterFormSubmit()" class="form-select" id="">
                                    <option value="" selected>All</option>
                                    <option value="Completed" >Completed</option>
                                    <option value="Incompleted" >Incompleted</option>
                                    <option value="Delayed" >Delayed</option>
                                </select>
                                <input type="text" id="myInput" class="form-control me-2" placeholder="Search">
                                {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                            </form>
                        </ul>
                        <div class="d-flex">
                            <a href="{{route('logout')}}" class="btn btn-outline-primary" type="submit">Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="page-container">
            <div class="card">
                <div class="content">
        @endif

                    @yield('content')
    @if(auth()->check())
                </div>
            </div>
        </div>
    </div>
    @endif


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>




    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>
@if(!auth()->check())
<style>
    html, body, .container{
height: 100%;
}

.login-form {
width: 350px;
padding: 2rem 1rem 1rem;
}

form {
padding: 1rem;
}
</style>
@endif
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background-color: #f6f7fb;
        color: #888da8;
        letter-spacing: 0.2px;
        font-family: 'Roboto', sans-serif;
        padding: 0;
        margin: 0;
    }

    a,
    p,
    span,
    div,
    li,
    td {
        font-weight: 300 !important;
    }

    ::placeholder {
        color: #ccc !important;
        font-weight: 300;
    }

    :-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        color: #ccc !important;
        font-weight: 300;
    }

    ::-ms-input-placeholder {
        /* Microsoft Edge */
        color: #ccc !important;
        font-weight: 300;
    }

    input {
        border-color: #d8e0e5;
        border-radius: 2px !important;
        box-shadow: none !important;
        font-weight: 300 !important;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #f6f7fb;
    }

    button.btn {
        border-radius: 2px !important;
        box-shadow: none !important;
    }

    button.btn.btn-primary {
        background-color: #0e9aee !important;
    }

    button.btn.btn-primary:hover {
        background-color: #0879c8 !important;
    }

    #left-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 280px;
        background-color: #313644;
        overflow-y: auto;
        height: 100vh;
        border-right: 1px solid #e6ecf5;
        margin-top: 60px;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        overflow-x: hidden;
        z-index: 2;
    }

    #left-menu.small-left-menu,
    #logo.small-left-menu {
        width: 60px;
    }

    #left-menu ul {
        padding: 0;
        margin: 0;
    }

    #left-menu ul li {
        padding: 0 10px;
        display: block;
        position: relative;
    }

    #left-menu>ul>li {
        margin: 15px 0;
    }

    #left-menu ul li a {
        color: #99abb4;
        width: 100%;
        display: inline-block;
        width: 260px;
        height: 37px;
        position: relative;
    }


    #left-menu ul li a i {
        font-size: 22px;
        text-align: center;
        width: 35px;
        height: 35px;
        display: inline-block;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    #left-menu ul li:hover a span {
        color: #0e9aee;
    }

    #left-menu ul li:hover a i {
        color: #0e9aee;
    }

    #left-menu ul li a span {
        width: 100%;
        height: 35px;
        padding-left: 10px;
        color: #99abb4;
        font-weight: 300;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    #left-menu ul li.active a {
        border-bottom: 2px solid #0e9aee;
    }

    #left-menu ul li.active a span {
        color: #fff;
    }

    #left-menu ul li.active a i {
        background-color: #0e9aee;
        color: #fff;
    }


    #left-menu li.has-sub ul {
        background-color: #454e62;
        margin: 0 -10px;
        padding-left: 45px;
        height: 0;
        overflow: hidden;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    #left-menu li ul.open {
        /*    height: 140px;*/
    }

    #left-menu li.has-sub ul>li {
        padding-top: 10px;
    }

    a:hover {
        text-decoration: none;
    }

    #logo {
        position: fixed;
        top: 0;
        z-index: 2;
        left: 0;
        background-color: #464e62;
        border-color: #464e62;
        height: 60px;
        width: 280px;
        font-size: 30px;
        line-height: 2em;
        border-right: 1px solid #e6ecf5;
        z-index: 4;
        color: #fff;
        padding-left: 15px;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        overflow: hidden;
    }


    #header {
        background-color: #fff;
        height: 60px;
        border-bottom: 1px solid #e6ecf5;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 3;
    }

    #header .header-left {
        padding-left: 300px;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    #header .header-right {
        padding-right: 40px;
    }

    #header .header-right i,
    #header .header-left i {
        font-size: 30px;
        line-height: 2em;
        padding: 0 5px;
        cursor: pointer;
    }

    #main-content {
        min-height: calc(100vh - 60px);
        clear: both;
    }

    #page-container {
        padding-left: 300px;
        padding-top: 80px;
        padding-right: 25px;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    #page-container.small-left-menu,
    #header .header-left.small-left-menu {
        padding-left: 80px;
    }

    .card {
        border: 1px solid #e6ecf5;
        margin-bottom: 1em;
        font-weight: 300;
    }

    .card .title {
        padding: 15px 20px;
        border-bottom: 1px solid #e6ecf5;
        margin-bottom: 10px;
        color: #000;
        font-size: 18px;
    }

    #show-lable {
        opacity: 0;
        visibility: hidden;
        left: 80px;
        font-weight: 300;
        padding: 6px 15px;
        background-color: #0e9aee;
        position: fixed;
        color: #fff;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    #left-menu.small-left-menu li.has-sub::after {
        content: '';
    }

    #left-menu.small-left-menu li.has-sub ul {
        position: fixed;
        width: 280px;
        z-index: 123;
        height: 0;
        left: 69px;
        padding-left: 15px;
    }

    @media only screen and (max-width: 992px) {

        #left-menu,
        #logo {
            width: 60px;
        }

        #page-container,
        #header .header-left {
            padding-left: 80px;
        }

        #toggle-left-menu,
        .big-logo {
            display: none;
        }

        /*
    #logo{
        padding: 0;
        padding-left: 3px;
    }
    .small-logo{
        display: block;
    }
*/

    }

    @media only screen and (min-width: 992px) {
        #left-menu li.has-sub::after {
            font-family: "Ionicons";
            content: "\f3d3";
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            transform: rotate(0deg);
            -webkit-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        #left-menu li.has-sub.rotate:after {
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .small-logo {
            display: none;
        }

    }
</style>
<script>
    $('#toggle-left-menu').click(function() {
        if ($('#left-menu').hasClass('small-left-menu')) {
            $('#left-menu').removeClass('small-left-menu');
        } else {
            $('#left-menu').addClass('small-left-menu');
        }
        $('#logo').toggleClass('small-left-menu');
        $('#page-container').toggleClass('small-left-menu');
        $('#header .header-left').toggleClass('small-left-menu');

        $('#logo .big-logo').toggle('300');
        $('#logo .small-logo').toggle('300');
        $('#logo').toggleClass('p-0 pl-1');
    });

    $(document).on('mouseover', '#left-menu.small-left-menu > ul > li', function() {
        if (!$(this).hasClass('has-sub')) {
            var label = $(this).find('span').text();
            var position = $(this).position();
            $('#show-lable').css({
                'top': position.top + 79,
                'left': position.left + 59,
                'opacity': 1,
                'visibility': 'visible'
            });

            $('#show-lable').text(label);
        } else {
            var position = $(this).position();
            $(this).find('ul').addClass('open');

            if ($(this).find('ul').hasClass('open')) {
                const height = 47;
                var count_submenu_li = $(this).find('ul > li').length;
                if (position.top >= 580) {
                    var style = {
                        'top': (position.top + 100) - (height * count_submenu_li),
                        'height': height * count_submenu_li + 'px'
                    }
                    $(this).find('ul.open').css(style);
                } else {
                    var style = {
                        'top': position.top + 79,
                        'height': height * count_submenu_li + 'px'
                    }

                    $(this).find('ul.open').css(style);
                }

            }
        }

    });

    $(document).on('mouseout', '#left-menu.small-left-menu li a', function(e) {
        $('#show-lable').css({
            'opacity': 0,
            'visibility': 'hidden'
        });
    });

    $(document).on('mouseout', '#left-menu.small-left-menu li.has-sub', function(e) {
        $(this).find('ul').css({
            'height': 0,
        });
    });

    $(window).resize(function() {
        windowResize();
    });

    $(window).on('load', function() {
        windowResize();
    });

    $('#left-menu li.has-sub > a').click(function() {
        var _this = $(this).parent();

        _this.find('ul').toggleClass('open');
        $(this).closest('li').toggleClass('rotate');

        _this.closest('#left-menu').find('.open').not(_this.find('ul')).removeClass('open');
        _this.closest('#left-menu').find('.rotate').not($(this).closest('li')).removeClass('rotate');
        _this.closest('#left-menu').find('ul').css('height', 0);

        if (_this.find('ul').hasClass('open')) {
            const height = 47;
            var count_submenu_li = _this.find('ul > li').length;
            _this.find('ul').css('height', height * count_submenu_li + 'px');
        }
    });


    function windowResize() {
        var width = $(window).width();
        if (width <= 992) {
            $('#left-menu').addClass('small-left-menu');
            $('#logo').addClass('small-left-menu p-0 pl-1');
        } else {
            $('#left-menu').removeClass('small-left-menu');
            $('#logo').removeClass('small-left-menu p-0 pl-1');
        }
    }

    function FilterFormSubmit(){
        $('#filter-form').submit();
    }
</script>

</html>
