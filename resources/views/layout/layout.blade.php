<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body{
            background: #F4F7FD;

        }

        .card-margin {
            margin-bottom: 1.875rem;
        }

        .card {
            border: 0;
            box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
            -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: 1px solid #e6e4e9;
            border-radius: 8px;
        }

        .card .card-header.no-border {
            border: 0;
        }
        .card .card-header {
            background: none;
            padding: 0 0.9375rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            min-height: 50px;
        }
        .card-header:first-child {
            border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
        }

        .widget .widget-title-wrapper {
            display: flex;
            align-items: center;
        }

        .widget .widget-title-wrapper .widget-date-primary {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #fcfcfd;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
        }

        .widget .widget-title-wrapper .widget-date-primary .widget-date-day {
            color: #4e73e5;
            font-weight: 500;
            font-size: 1.5rem;
            line-height: 1;
        }

        .widget .widget-title-wrapper .widget-date-primary .widget-date-month {
            color: #4e73e5;
            line-height: 1;
            font-size: 1rem;
            text-transform: uppercase;
        }

        .widget .widget-title-wrapper .widget-meeting-info {
            display: flex;
            flex-direction: column;
            margin-left: 1rem;
        }

        .widget .widget-title-wrapper .widget-meeting-info .widget-pro-title {
            color: #3c4142;
            /*font-size: 14px;*/
        }

        .widget .widget-title-wrapper .widget-meeting-info .widget-meeting-time {
            color: #B1BAC5;
            font-size: 13px;
        }

        .widget .widget-meeting-points {
            font-weight: 400;
            font-size: 13px;
            margin-top: .5rem;
        }

        .widget .widget-meeting-points .widget-meeting-item {
            display: list-item;
            color: #727686;
        }

        .widget .widget-meeting-points .widget-meeting-item span {
            margin-left: .5rem;
        }

        .widget .widget-meeting-action {
            display: flex;
            justify-content: end;
        }

        .widget .widget-meeting-action form button{
            text-transform: uppercase;
        }

        .widget .widget-meeting-action div button{
            text-transform: uppercase;
        }

        .offcanvas-content {

            height: 80vh;
            display: flex;
            align-items: center;
        }

        .aside div {
            height: 50px;
            width: 100%;
            margin-bottom: 10px;
            border-radius: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .aside div:hover{
            background-color: #e2e8f0;
            color: #1a202c;
        }

        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg,#4099ff,#73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg,#2ed8b6,#59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg,#FFB64D,#ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg,#FF5370,#ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }

        .navbar-a-hover:hover {
            color: blue;
        }
    </style>
</head>
<body>
<header class="p-2 bg-body-tertiary">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="w-25">
            <a href="{{ route('home') }}" class="navbar-brand"><h2 class="">YouEvent</h2></a>
        </div>

        <div class="w-50 d-flex justify-content-evenly align-items-center">
            <div class="">
                <a href="{{ route('home') }}" class="navbar-brand"><h5 class="mt-2">Home</h5></a>
            </div>
            <div class="">
                <a href="{{ route('to.add.event') }}" class="navbar-brand"><h5 class="mt-2">Create Event</h5></a>
            </div>
            <div class="">
                <a href="{{ route('to.add.categorie') }}" class="navbar-brand"><h5 class="mt-2">Create Categorie</h5></a>
            </div>
            <div class="">
                <a href="{{ route('to.find.event') }}" class="navbar-brand"><h5 class="mt-2">Find Event</h5></a>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(!session('user_name') == null)
                    {{ session('user_name') }}
                @else
                    actions
                @endif
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">

                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

                <li><a class="dropdown-item" href="">Login</a></li>

            </ul>
        </div>
    </div>
</header>
<div class="container-fluid bg-danget border border-bottom">
    <div class="container d-flex justify-content-evenly pt-2 pb-2">
        <a href="{{ route('dashboard') }}" class="navbar-a-hover navbar-brand">Statistics</a>
        <a href="{{ route('reserve.request') }}" class="navbar-a-hover navbar-brand">Reservations Request</a>
        <a href="" class="navbar-a-hover navbar-brand">To About</a>
    </div>
</div>
<main class="row">
    <div class="col-1 offcanvas-content">
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" height="20" width="20" id="Arrow-Button-Right-1--Streamline-Ultimate"><desc>Arrow Button Right 1 Streamline Icon: https://streamlinehq.com</desc><g id="Arrow-Button-Right-1--Streamline-Ultimate"><path d="M15.843333333333334 14a3.0800000000000005 3.0800000000000005 0 0 1 -0.8983333333333334 2.1933333333333334l-11.129999999999999 11.129999999999999a2.065 2.065 0 0 1 -2.916666666666667 -2.916666666666667l10.196666666666667 -10.196666666666667a0.31500000000000006 0.31500000000000006 0 0 0 0 -0.42L0.8983333333333334 3.5933333333333337a2.065 2.065 0 0 1 2.916666666666667 -2.916666666666667l11.129999999999999 11.129999999999999a3.0800000000000005 3.0800000000000005 0 0 1 0.8983333333333334 2.1933333333333334Z" fill="#000000" stroke-width="1"></path><path d="M27.708333333333336 14a3.091666666666667 3.091666666666667 0 0 1 -0.875 2.1933333333333334l-11.129999999999999 11.129999999999999a2.065 2.065 0 0 1 -2.916666666666667 -2.916666666666667l10.196666666666667 -10.196666666666667a0.2916666666666667 0.2916666666666667 0 0 0 0 -0.42l-10.231666666666667 -10.196666666666667a2.065 2.065 0 0 1 2.916666666666667 -2.916666666666667L26.833333333333336 11.806666666666667a3.091666666666667 3.091666666666667 0 0 1 0.875 2.1933333333333334Z" fill="#000000" stroke-width="1"></path></g></svg></button>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">YouEvent</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="">
                <aside class="aside p-2">
                    <div class="">
                        <a class="navbar-brand" href="{{ route('dashboard') }}"><h4 class="">Dashboard</h4></a>
                    </div>
                    <div class="">
                        <a class="navbar-brand" href="{{ route('get.categorie') }}"><h4 class="">Categories</h4></a>
                    </div>
                    <div class="">
                        <a><h4 class="">settings</h4></a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="col-10">
        @yield('content')
    </div>
</main>

</body>
</html>
