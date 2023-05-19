@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- {{dd($allBookData)}} --}}
        <h1>Book List</h1>
        <div class="row">
            @foreach ($allBookData as $data => $item)
                {{-- {{dd($item['bookAuthor'])}} --}}
                <div class="col-md-3">
                    <a href="{{ 'bookdetail/' . encrypt($item['bookId']) }}">
                        <div class="card mb-4">
                            <img src="{{ $item['bookImage'] }}" class="card-img-top" alt="image" height="500px" />
                            <div class="card-body">
                                <h3 class="card-title">{{ $item['bookName'] }}</h3>
                                <p class="card-text"><strong>Author:-</strong>

                                        {{-- {{dd($item['bookAuthor'][1])}} --}}
                                    

                                    {{$item['bookAuthor']}} 
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        a:link {
            text-decoration: none;
            color: black
        }
    </style>
@endsection
