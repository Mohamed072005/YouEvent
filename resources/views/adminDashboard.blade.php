@extends('layout.layout')
@section('title', 'admin statistics')
@section('content')
    <div class="container-fluid border border-bottom">
        <div class="container d-flex justify-content-evenly pt-2 pb-2">
            <a href="{{ route('admin.dashboard') }}" class="navbar-a-hover navbar-brand">Statistics</a>
            <a href="{{ route('request.event') }}" class="navbar-a-hover navbar-brand">Event Request</a>
            <a href="{{ route('block.users') }}" class="navbar-a-hover navbar-brand">Block Users</a>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Reservations</h6>
                        <h2 class="text-right d-flex justify-content-around align-items-center"><i class="fa fa-cart-plus f-left"></i><span>{{ $reservations }}</span></h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Events</h6>
                        <h2 class="text-right d-flex justify-content-around align-items-center"><i class="f-left"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28 28" height="23" width="23" id="Event--Streamline-Ultimate"><desc>Event Streamline Icon: https://streamlinehq.com</desc><g id="Event--Streamline-Ultimate"><path d="M12.203333333333335 23.111666666666668a1.1666666666666667 1.1666666666666667 0 0 1 -0.8283333333333334 -0.3383333333333333L8.166666666666668 19.588333333333335a1.1666666666666667 1.1666666666666667 0 0 1 0 -1.645 1.1666666666666667 1.1666666666666667 0 0 1 1.6566666666666667 0l2.3333333333333335 2.3333333333333335 7.116666666666667 -7.128333333333334A1.1666666666666667 1.1666666666666667 0 0 1 21 14.828333333333335l-7.956666666666668 7.945a1.1666666666666667 1.1666666666666667 0 0 1 -0.84 0.3383333333333333Z" fill="#ffffff" stroke-width="1"></path><path d="M25.083333333333336 3.5h-3.2083333333333335a0.2916666666666667 0.2916666666666667 0 0 1 -0.2916666666666667 -0.2916666666666667V1.1666666666666667a1.1666666666666667 1.1666666666666667 0 0 0 -2.3333333333333335 0v5.541666666666667a0.8866666666666667 0.8866666666666667 0 0 1 -0.875 0.875 0.8866666666666667 0.8866666666666667 0 0 1 -0.875 -0.875V4.083333333333334a0.5833333333333334 0.5833333333333334 0 0 0 -0.5833333333333334 -0.5833333333333334H9.625A0.2916666666666667 0.2916666666666667 0 0 1 9.333333333333334 3.2083333333333335V1.1666666666666667a1.1666666666666667 1.1666666666666667 0 0 0 -2.3333333333333335 0v5.541666666666667a0.8866666666666667 0.8866666666666667 0 0 1 -0.875 0.875 0.8866666666666667 0.8866666666666667 0 0 1 -0.875 -0.875V4.083333333333334A0.5833333333333334 0.5833333333333334 0 0 0 4.666666666666667 3.5H2.916666666666667a2.3333333333333335 2.3333333333333335 0 0 0 -2.3333333333333335 2.3333333333333335v19.833333333333336a2.3333333333333335 2.3333333333333335 0 0 0 2.3333333333333335 2.3333333333333335h22.166666666666668a2.3333333333333335 2.3333333333333335 0 0 0 2.3333333333333335 -2.3333333333333335V5.833333333333334a2.3333333333333335 2.3333333333333335 0 0 0 -2.3333333333333335 -2.3333333333333335ZM24.5 25.666666666666668H3.5a0.5833333333333334 0.5833333333333334 0 0 1 -0.5833333333333334 -0.5833333333333334v-14A0.5833333333333334 0.5833333333333334 0 0 1 3.5 10.5h21a0.5833333333333334 0.5833333333333334 0 0 1 0.5833333333333334 0.5833333333333334v14a0.5833333333333334 0.5833333333333334 0 0 1 -0.5833333333333334 0.5833333333333334Z" fill="#ffffff" stroke-width="1"></path></g></svg></i><span>{{ $events }}</span></h2>
                    </div>
                </div>
            </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">users</h6>
                            <h2 class="text-right d-flex justify-content-around align-items-center"><i class="fa fa-user f-left"></i><span>{{ $users }}</span></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Categories</h6>
                            <h2 class="text-right d-flex justify-content-around align-items-center"><i class="fa fa-archive f-left"></i><span>{{ $categories }}</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
