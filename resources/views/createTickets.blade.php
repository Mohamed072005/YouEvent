@extends('layout.layout')
@section('title', 'Create Tickets')
@section('content')
    <div class="container-fluid d-flex justify-content-center mt-5">

        <div class="w-50 shadow rounded bg-body-tertiary d-flex flex-column align-items-center">
            <h3 class="mt-4 mb-5">add Tickets</h3>
            <form action="" method="post" class=" w-50">
                @csrf
                @method('POST')
                <div class="form-floating d-flex flex-column align-items-center mb-2">
                    <input type="number" min="1" name="quantity" id="floatingInput35" class="form-control form-control-lg" placeholder="#">
                    <label for="floatingInput35">Quantity</label>
                </div>
                <div class="d-flex flex-column align-items-center mb-2">
                    <select class="form-select" name="type" aria-label="Default select example">
                        <option selected>Tickets Type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
@endsection
