@extends('layout.layout')
@section('title', 'Categories')
@section('content')
    <div>
        <div class="container mt-5">

            <div class="row ">
                @foreach($categories as $cateInfo)
                <div class="col-lg-4">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h5 class="card-title text-dark">{{ $cateInfo->categorie_name }}</h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="widget">
                                <div class="widget-title-wrapper">
                                    <div class="widget-date-primary">
                                        <span class="widget-date-day">09</span>
                                        <span class="widget-date-month">apr</span>
                                    </div>
                                    <div class="widget-meeting-info">
                                        <span class="widget-pro-title">PRO-08235 DeskOpe. Website</span>
                                        <span class="widget-meeting-time">12:00 to 13.30 Hrs</span>
                                    </div>
                                </div>
                                <div class="widget-meeting-action">
                                    <form action="{{ route('destroy.categorie', $cateInfo->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-flash-border-primary">Delete</button>
                                    </form>
                                    <div>
                                        <button type="button" class="btn btn-sm btn-flash-border-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $cateInfo->id }}">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $cateInfo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Categorie</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('update.categorie', ['id'=>$cateInfo->id]) }}" method="post" class=" w-50">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="d-flex flex-column align-items-center mb-2">
                                                                <input type="text" name="categorie_name" class="rounded w-100 form-control form-control-lg" value="{{ $cateInfo->categorie_name }}">
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
{{--                                        <button class="btn btn-sm btn-flash-border-primary">Update</button>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
    @if(!session('successResponse') == null)
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "{{ session('successResponse') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            </script>
    @endif
    @if(!session('warningResponse') == null)
        <script>
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "{{ session('warningResponse') }}",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif
@endsection()
