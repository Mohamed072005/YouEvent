@extends('auth-layout.layout')
@section('title', 'register')
@section('content')
<main>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-primary text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please fill the information bellow</p>

                                <form name="myForm" onsubmit="return validation(event)" action="{{ route('user.register') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" >Email</label>
                                        <input type="email" name="email"  class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" >Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" >Repeat Password</label>
                                        <input type="password" name="password_confirmation"  class="form-control form-control-lg" />
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

                                </form>

                            </div>

                            <div>
                                <p class="mb-0">You already have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Log in </a>
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
<script>
    function validation(event) {
        event.preventDefault();
        let name = document.forms['myForm']['name'].value;
        let email = document.forms['myForm']['email'].value;
        let password = document.forms['myForm']['password'].value;
        let confirmedPassword = document.forms['myForm']['password_confirmation'].value;
        let emailRegex = /^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (name === '') {
            return Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Your Name is empty",
                showConfirmButton: false,
                timer: 2000
            });
        }

        if (!emailRegex.test(email)) {
            return Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Your Email is not valid",
                showConfirmButton: false,
                timer: 2000
            });
        }

        if (password.length < 8) {
            return Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Your Password should be biger than 8 characters",
                showConfirmButton: false,
                timer: 2000
            });
        }

        if(confirmedPassword.length < 8){
            return Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Your Repeat Password should be biger than 8 characters",
                showConfirmButton: false,
                timer: 2000
            });
        }

        if (password !== confirmedPassword) {
            return Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Your Password do not match",
                showConfirmButton: false,
                timer: 2000
            });
        }

        document.forms['myForm'].submit();
    }
</script>
@endsection
