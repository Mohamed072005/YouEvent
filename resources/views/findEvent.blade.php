@extends('layout.layout')
@section('title', 'Find Event')
@section('content')
    <div class="container d-flex justify-content-center mt-4">
        <div class="w-75">
            <div class="d-flex justify-content-center">
                <form class="search-form w-75 d-flex justify-content-center" action="{{ route('search') }}" method="post" id="searchForm" role="search">
                    @csrf
                    <input id="searchArea" class="search-input form-control me-2 w-50" type="search" placeholder="Search">
                </form>
            </div>
        </div>
        <div class="w-25 d-flex justify-content-center align-items-center">
            <div class="w-75">

                <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                    <option selected>sort by Category</option>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->categorie_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div id="searchResult">

    </div>
    <script>
        let searchArea = document.getElementById('searchArea');
        let searchResult = document.getElementById('searchResult');
        searchArea.addEventListener('keyup', function(){
            let value = searchArea.value;

                let xhr = new XMLHttpRequest();

                xhr.open("GET", '/search/?query_s=' + value, true);

                xhr.onreadystatechange = function (){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        searchResult.innerHTML = xhr.responseText;
                        console.log(xhr.responseText);
                    }
                };
                xhr.send();
        });
    </script>
@endsection
