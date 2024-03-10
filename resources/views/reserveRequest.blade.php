@extends('layout.layout')
@section('title', 'Reserve Request')
@section('content')
    @if(!session('role_id') == null)
        <div class="container-fluid border border-bottom">
            <div class="container d-flex justify-content-evenly pt-2 pb-2">
                @if(session('role_id') == 2)
                    <a href="{{ route('dashboard') }}" class="navbar-a-hover navbar-brand">Statistics</a>
                    <a href="{{ route('reserve.request') }}" class="navbar-a-hover navbar-brand">Reservations Request</a>
                    <a href="" class="navbar-a-hover navbar-brand">To About</a>
                @endif
                @if(session('role_id') == 1)
                    <a href="" class="navbar-a-hover navbar-brand">Statistics</a>
                    <a href="" class="navbar-a-hover navbar-brand">Event Request</a>
                    <a href="" class="navbar-a-hover navbar-brand">To About</a>
                @endif
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row ">
            @foreach($reservations as $reserveInfo)
                <div class="col-lg-4">
                    <div class="card shadow card-margin">
                        <div class="card-header no-border">
                            <h5 class="card-title text-dark">{{ $reserveInfo->name }}</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="widget">
                                <div class="widget-title-wrapper">
                                    <div class="widget-date-primary">
                                        <span class="widget-date-day">09</span>
                                        <span class="widget-date-month">apr</span>
                                    </div>
                                    <div class="widget-meeting-info">
                                        <span class="widget-pro-title">{{ $reserveInfo->title }}</span>
                                        <span class="widget-meeting-time">{{ $reserveInfo->created_at }}</span>
                                    </div>
                                </div>
                                <div class="widget-meeting-action">
                                    <form action="{{ route('refused.reserve', $reserveInfo->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-sm btn-flash-border-primary">Refused</button>
                                    </form>
                                    <form action="{{ route('accept.reserve', $reserveInfo->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-sm btn-flash-border-primary">Accept</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(!session('actionSuccess') == null)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('actionSuccess') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection
