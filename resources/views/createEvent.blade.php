@extends('layout.layout')
@section('title', 'Create Event')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-5">

        <div class="w-50 shadow rounded bg-body-tertiary d-flex flex-column align-items-center">
            <h3 class="mt-4 mb-4">add Event</h3>
            <form action="{{ route('add.event') }}" method="post" class=" w-50">
                @csrf
                @method('POST')
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <input type="text" name="title" id="floatingInput1" placeholder="#" class="rounded w-100 form-control form-control-lg">
                    <label for="floatingInput1">Event Title</label>
                </div>
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <textarea class="form-control" name="description" placeholder="#" id="floatingTextarea2" style="height: 70px"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <input type="text" name="localisation" id="floatingInput2" class="rounded w-100 form-control form-control-lg" placeholder="#">
                    <label for="floatingInput2">Location</label>
                </div>
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <input type="date" name="date" id="floatingInput3" class="rounded w-100 form-control form-control-lg" placeholder="#">
                    <label for="floatingInput3">Event Date</label>
                </div>

                <div class="mb-2 mt-2">
                    <label>acceptation</label>
                </div>
                <div class="row">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acceptation" value="1" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            On
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="acceptation" value="0" id="flexRadioDefault2" >
                        <label class="form-check-label" for="flexRadioDefault2">
                            Off
                        </label>
                    </div>
                </div>
                <div class="mb-2">
                    <label>Categories:</label>
                </div>

                <div class="row">
                    @foreach($categories as $categorie)
                        <div class="col-4 form-check ">
                            <input class="form-check-input" type="radio" name="categorie" value="{{ $categorie->id }}" id="{{ $categorie->id }}">
                            <label class="form-check-label" for="{{ $categorie->id }}">
                                {{ $categorie->categorie_name }}
                            </label>
                        </div>
                    @endforeach
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
