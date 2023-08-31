@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Book Details</h1>
            <div class="card">
                <div class="card-header d-grid  d-md-block justify-content-end">
                    <a href="{{ route('books') }}" class="btn btn-primary btn-mg active" role="button" aria-pressed="true"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
                        </svg></a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="md-col-6">
                            <h3 class="card-title">{{ $bookData['bookName'] }}</h3>
                            <img src="{{ $bookData['bookImage'] }}" class="card-img-top" alt="image" height="800px" />
                        </div>
                        <div class="md-col-6">
                            <p class="card-text"><strong>Author:- </strong>
                                {{ $bookData['bookAuthor'] }}
                            </p>
                            <p class="card-text"><strong>Gener:- </strong> {{ $bookData['gener'] }}</p>
                            <p class="card-text"><strong>Category:- </strong>{{ $bookData['category'] }} </p>
                            <p class="card-text"><strong>Overall-Rating:- </strong>
                                @for ($i = 1; $i <= $averageRating; $i++)
                                    @if ($i > 5)
                                        @break(0);
                                    @endif
                                    <i class="bi bi-star-fill"
                                        style="color: @if ($averageRating < 3) yellow @else green @endif"></i>
                                @endfor
                                ({{ round($averageRating) }}/5)
                            </p>
                            @isset($bookData['reviews'])
                                <p class="card-text"><strong>Review: </strong>
                                    @foreach ($bookData['reviews'] as $review)
                                        <br>
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-WwYlkTYt_qTRBBCDQtR5vDgiG0YlkofGEc250L5GRQ&usqp=CAU&ec=48665701"
                                            alt="" height="30px">
                                        {{ $review['userName'] }}
                                        <br>
                                        @for ($i = 1; $i <= $review['rating']; $i++)
                                            @if ($i > 5)
                                                @break(0);
                                            @endif
                                            <i class="bi bi-star-fill"
                                                style="color: @if ($review['rating'] < 3) yellow @else green @endif"></i>
                                        @endfor
                                        <br>
                                        {{ $review['comment'] }}
                                        <br>
                                        {{-- {{ $review['userName']['name'] }} --}}
                                    @endforeach
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-grid  d-md-block">
                    <a href="{{ url('review/' . encrypt($bookData['bookId'])) }}" class="btn btn-primary btn-md"
                        role="button">Give
                        Review</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            overflow-x: hidden !important;
        }
    </style>
@endsection
