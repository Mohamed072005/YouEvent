@extends('layout.layout')
@section('title', 'Create Tickets')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-5">
        <div class="w-50 shadow rounded bg-body-tertiary d-flex flex-column align-items-center">
            <h3 class="mt-4 mb-5">add Tickets</h3>
            <form action="{{ route('add.ticket') }}" method="post" class=" w-50">
                @csrf
                @method('POST')
                <input type="hidden" name="event" value="{{ $eventId }}" id="">
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <input type="number" min="1" name="quantity" id="floatingInput35" class="form-control form-control-lg" placeholder="#">
                    <label for="floatingInput35">Quantity</label>
                </div>
                <div class="mt-3 mb-2">
                    <label>Tickets Type</label>
                    <select class="form-select mt-2" name="type" aria-label="Default select example">
                        @foreach($type as $tiType)
                        <option value="{{ $tiType->id }}">{{ $tiType->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-floating d-flex flex-column align-items-center mb-2" >
                    <div class="w-100">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">$</span>
                            </div>
                            <input type="number" class="form-control" name="price" id="validationDefaultUsername" placeholder="Price" aria-describedby="inputGroupPrepend2">
                        </div>
                    </div>
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
    @if(!session('wrongAdd') == null)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "{{ session('wrongAdd') }}",
                showConfirmButton: false,
                timer: 3500
            });
        </script>
    @endif
@endsection
