@extends('layout.layout')
@section('title', 'Crete Categorie')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-5">

        <div class="w-50 shadow rounded bg-body-tertiary d-flex flex-column align-items-center">
            <h3 class="mt-4 mb-5">add Categorie</h3>
            <form action="{{ route('add.categorie') }}" method="post" class=" w-50">
                @csrf
                @method('POST')
                <div class="d-flex flex-column align-items-center mb-2">
                    <input type="text" name="categorie_name" class="rounded w-100 form-control form-control-lg" placeholder="Categorie Name">
                </div>
                <div class="d-flex justify-content-center mt-4 mb-3">
                    <button class="btn btn-outline-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
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
    @if(!session('addSuccess') == null)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('addSuccess') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection
