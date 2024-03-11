@extends('layout.layout')
@section('title', 'Block Users')
@section('content')

    <div class="container-fluid border border-bottom">
        <div class="container d-flex justify-content-evenly pt-2 pb-2">
            <a href="{{ route('admin.dashboard') }}" class="navbar-a-hover navbar-brand">Statistics</a>
            <a href="{{ route('request.event') }}" class="navbar-a-hover navbar-brand">Event Request</a>
            <a href="{{ route('block.users') }}" class="navbar-a-hover navbar-brand">Block Users</a>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap user-table mb-0">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium pl-4">#</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Email</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Events Numbers</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="pl-4">{{ $user->id }}</td>
                                <td>
                                    <h5 class="font-medium mb-0">{{ $user->name }}</h5>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $user->role->role_name }}</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $user->email }}</span><br>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $user->events->count() }}</span><br>
                                </td>
                                <td>
                                    <form action="{{ route('block', $user->id) }}" method="post">
                                        @csrf
                                        @if($user->role_id == 4)
                                            <button type="submit" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-unlock"></i> </button>
                                        @else
                                            <button type="submit" class="btn btn-outline-info btn-circle btn-lg btn-circle"><i class="fa fa-ban"></i> </button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(!session('action') == null)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('action') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection
