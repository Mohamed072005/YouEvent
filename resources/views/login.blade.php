@extends('auth-layout.layout')
@section('content')

<main>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary bg-gradient text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-3 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                <form action="{{ route('user.login') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                </form>

                            </div>

                            <div>
                                <p class="mb-0"><a href="{{ route('forget.password') }}" class="text-white-50 fw-bold">Forget Password? </a>
                                </p>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "{{ $error }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endforeach
@endif
@if(session('errorLogin'))
    <script>
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "{{ session('errorLogin') }}",
            showConfirmButton: false,
            timer: 2500
        });
    </script>
@endif
@endsection
