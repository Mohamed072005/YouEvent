@extends('layout.layout')
@section('title', 'Request Event')
@section('content')
    <div class="container-fluid border border-bottom">
        <div class="container-fluid border border-bottom">
            <div class="container d-flex justify-content-evenly pt-2 pb-2">
                <a href="{{ route('admin.dashboard') }}" class="navbar-a-hover navbar-brand">Statistics</a>
                <a href="{{ route('request.event') }}" class="navbar-a-hover navbar-brand">Event Request</a>
                <a href="{{ route('block.users') }}" class="navbar-a-hover navbar-brand">Block Users</a>
            </div>
        </div>
    </div>
    <div>
        <div class="container mt-3">
            <div class="row">
                @foreach($events as $event)
                    <div class="col-lg-4">
                        <div class="card card-margin">
                            <div class="card-body pt-0">
                                <div class="widget">
                                    <div class="widget-title-wrapper">
                                        <div class="widget-date-primary">
                                            <span class="widget-date-day">YE</span>
                                            <span class="widget-date-month">57k</span>
                                        </div>
                                        <div class="widget-meeting-info">
                                            <h4 class="widget-pro-title">{{$event->title}}</h4>
                                            <span class="widget-meeting-time">user :{{$event->user->name}}</span>
                                        </div>
                                    </div>
                                    <ul class="widget-meeting-points">
                                        <li class="widget-meeting-item"><span>Location: {{$event->localisation}}</span></li>
                                        <li class="widget-meeting-item"><span>The Categorie: {{ $event->categorie->categorie_name }}</span></li>
                                        <li class="widget-meeting-item"><span>The User: {{ $event->user->role->role_name }}</span></li>
                                        <li class="widget-meeting-item"><span>The User: {{ $event->id }}</span></li>
                                    </ul>
                                    <div class="widget-meeting-action">
                                        <form action="{{ route('refuse.event', $event->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-sm btn-flash-border-primary">Refused</button>
                                        </form>
                                        <form action="{{ route('accept.event', $event->id) }}" method="post">
                                            @csrf
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
        @if(!session('response') == null)
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('response') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
    @endif
        @if(!session('warning') == null)
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "warning",
                    title: "{{ session('warning') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
    @endif
@endsection
