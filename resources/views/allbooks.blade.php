@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book List</h1>
        <div class="row">
            @foreach ($allBookData as $data => $item)
                <div class="col-md-4">
                    <a href="{{ 'bookdetail/' . $item['bookId'] }}">
                        <div class="card mb-4">
                            <img src="{{ $item['bookImage'] }}" class="card-img-top" alt="image" height="500px" />
                            <div class="card-body">
                                <h3 class="card-title">{{ $item['bookName'] }}</h3>
                                <p class="card-text"><strong>Author:-</strong>
                                    @foreach ($item['bookAuthor'] as $author)
                                        {{ trim($author['name'], ", ") }},
                                    @endforeach
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
