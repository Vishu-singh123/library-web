@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- {{dd($allBookData)}} --}}
        <h1>Book List</h1>
        <div class="row">
            @foreach ($allBookData as $data => $item)
                {{-- {{dd($item['bookAuthor'])}} --}}
                <div class="col-md-3">
                    <a href="{{ 'bookdetail/' . $item['bookId'] }}">
                        <div class="card mb-4">
                            <img src="{{ $item['bookImage'] }}" class="card-img-top" alt="image" height="500px" />
                            <div class="card-body">
                                <h3 class="card-title">{{ $item['bookName'] }}</h3>
                                <p class="card-text"><strong>Author:-</strong>
                                    {{$item['bookAuthor']}} 
                                </p>
                                <p class="card-text"><strong>price:-</strong>
                                <span style="font-size: 20px">{{$item['price']}} Rs.</span> 
                            </p>
                            <a href="{{url('buynow')}}" type="button" class="btn btn-primary">Buy Now</a>
                            <button type="button" class="btn btn-secondary">Add To Cart</button>
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
