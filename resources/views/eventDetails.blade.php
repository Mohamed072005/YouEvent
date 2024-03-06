@extends('layout.layout')
@section('title', 'Event Details')
@section('content')
    <div class="container-fluid">

        <div class="container mt-4">

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4 shadow">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between">
                                <div>
                                    <h3>{{ $event->title }}</h3>
                                </div>
                                <div>
                                    <h5>{{ $event->date }}</h5>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <h5>Description</h5>
                                </div>
                                <div>
                                    {{ $event->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- actions -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-4 d-flex justify-content-center">
                                    <form action="{{ route('delete.event', $event->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="user_id" value="{{ $event->user_id }}">
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                                <div class="col-lg-4 d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#updateModal">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Categorie</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update.event', $event->id) }}" method="post" class="">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" id="describInput" value="{{ $event->description }}">
                                                            <div class="form-floating d-flex flex-column align-items-center mb-2">
                                                                <input type="text" name="title" id="floatingInput1" placeholder="#" value="{{ $event->title }}" class="rounded w-100 form-control form-control-lg">
                                                                <label for="floatingInput1">Event Title</label>
                                                            </div>
                                                            <div class="form-floating d-flex flex-column align-items-center mb-2">
                                                                <textarea class="form-control" name="description" placeholder="#" id="floatingTextarea1" style="height: 70px"></textarea>
                                                                <label for="floatingTextarea2">Description</label>
                                                            </div>
                                                            <div class="form-floating d-flex flex-column align-items-center mb-2">
                                                                <input type="text" name="localisation" id="floatingInput2" value="{{ $event->localisation }}"  class="rounded w-100 form-control form-control-lg" placeholder="#">
                                                                <label for="floatingInput2">Location</label>
                                                            </div>
                                                            <div class="form-floating d-flex flex-column align-items-center mb-2">
                                                                <input type="date" name="date" id="floatingInput3" value="{{ $event->date }}" class="rounded w-100 form-control form-control-lg" placeholder="#">
                                                                <label for="floatingInput3">Event Date</label>
                                                            </div>
                                                            <div class="form-floating d-flex flex-column align-items-center mb-2">
                                                                <input type="number" min="1" name="tickets" id="floatingInput34" value="{{ $event->number_of_seats }}" class="rounded w-100 form-control form-control-lg" placeholder="#">
                                                                <label for="floatingInput4">Number Of Tickets</label>
                                                            </div>
                                                            <div class="mb-2 mt-2">
                                                                <label>acceptation:</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check ml-5">
                                                                    <input class="form-check-input" type="radio" name="acceptation" value="1" id="flexRadioDefault1" >
                                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                                        On
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="acceptation" value="0" id="flexRadioDefault2" checked>
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
                                                                <button type="submit" class="btn btn-outline-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="col-lg-4 d-flex justify-content-center">
                                    <form action="">
                                        <button class="btn btn-outline-success">Reserve</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <!-- event information -->
                        <div class="card-body">
                            <h5 class="">Event Info</h5>
                            <hr>
                            <div class="">
                                <ul class="widget-meeting-points">
                                    <li class="widget-meeting-item"><span>Location: {{ $event->localisation }}</span></li>
                                    <li class="widget-meeting-item"><span>Number of Tickets: {{ $event->number_of_seats }}</span></li>
                                    <li class="widget-meeting-item"><span>The Categorie: {{ $event->categorie->categorie_name }}</span></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let describArea = document.getElementById('floatingTextarea1');
            let describInput = document.getElementById('describInput').value;
            describArea.value = describInput;
        </script>

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
        @if(!session('actionResponse') == null)
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('actionResponse') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
    @endif

@endsection
