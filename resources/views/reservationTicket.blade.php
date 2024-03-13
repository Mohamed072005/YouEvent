@extends('layout.layout')
@section('title', 'Your Tickets')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Oswald');
        * {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box
        }

        body {
            background-color: #F4F7FD;
        }

        .fl-left {
            float: left
        }

        .fl-right {
            float: right
        }

        h1 {
            text-transform: uppercase;
            font-weight: 900;
            border-left: 10px solid #fec500;
            padding-left: 10px;
            margin-bottom: 30px
        }

        .row {
            overflow: hidden
        }

        .card {
            display: table-row;
            /*width: 49%;*/
            background-color: #fff;
            color: #989898;
            margin-bottom: 10px;
            text-transform: uppercase;
            border-radius: 4px;
            position: relative
        }

        /*.card+.card {*/
        /*    margin-left: 2%*/
        /*}*/

        .date {
            display: table-cell;
            width: 25%;
            position: relative;
            text-align: center;
            border-right: 2px dashed #dadde6
        }

        .date:before,
        .date:after {
            content: "";
            display: block;
            width: 30px;
            height: 30px;
            background-color: #F4F7FD;
            position: absolute;
            top: -15px;
            right: -15px;
            z-index: 1;
            border-radius: 50%
        }

        .date:after {
            top: auto;
            bottom: -15px
        }

        .date time {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%)
        }

        .date time span {
            display: block
        }

        .date time span:first-child {
            color: #2b2b2b;
            font-weight: 600;
            font-size: 250%
        }

        .date time span:last-child {
            text-transform: uppercase;
            font-weight: 600;
            margin-top: -10px
        }

        .card-cont {
            display: table-cell;
            width: 75%;
            font-size: 85%;
            padding: 10px 10px 30px 50px
        }

        .card-cont h3 {
            color: #3C3C3C;
            font-size: 130%
        }

        .card-cont>div {
            display: table-row
        }

        .card-cont .even-date i,
        .card-cont .even-info i,
        .card-cont .even-date time,
        .card-cont .even-info p {
            display: table-cell
        }

        .card-cont .even-date i,
        .card-cont .even-info i {
            padding: 5% 5% 0 0
        }

        .card-cont .even-info p {
            padding: 30px 50px 0 0
        }

        /*.card-cont .even-date time span {*/
        /*    display: block*/
        /*}*/

        .card-cont a {
            display: block;
            text-decoration: none;
            width: 80px;
            height: 30px;
            background-color: #D8DDE0;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 2px;
            position: absolute;
            right: 10px;
            bottom: 10px
        }

        @media screen and (max-width: 860px) {
            .card {
                display: block;
                float: none;
                width: 100%;
                margin-bottom: 10px
            }
            .card+.card {
                margin-left: 0
            }
            .card-cont .even-date,
            .card-cont .even-info {
                font-size: 75%
            }
        }
    </style>
    <section class="container mt-5">
        <div class="row d-flex justify-content-evenly">
            @foreach($reservations as $reservInfo)
            <article class="col-5 card fl-left mb-5 shadow">
                <section class="date">
                    <time datetime="23th feb" class="">
                        @if($reservInfo->status == 0)
                        <i class="fa fa-clock-o fa-2x text-warning"></i>
                        @else
                        <i class="fa fa-check-circle fa-2x text-success"></i>
                        @endif
                    </time>
                </section>
                <section class="card-cont">
                    <strong>{{ $reservInfo->user->name }}</strong>
                    <h3>{{ $reservInfo->ticket->event->title }}</h3>
                    <div class="even-date">
                        <i class="fa fa-calendar"></i>
                        <time>
                            <span>{{ $reservInfo->ticket->event->date }}</span>
                            <span>08:55pm to 12:00 am</span>
                        </time>
                    </div>
                    <div class="even-info">
                        @if($reservInfo->ticket->type_id == 1)
                            <i class="fa fa-tag fa-2x text-warning"></i>
                            <h5 class="text-warning">
                                {{ $reservInfo->ticket->tickets_type->type }}
                            </h5>
                        @else
                            <i class="fa fa-tag fa-2x"></i>
                            <h5 class="">
                                {{ $reservInfo->ticket->tickets_type->type }}
                            </h5>
                        @endif

                    </div>
                </section>
            </article>
            @endforeach
        </div>
    </section>
@endsection