@extends('layouts.app')

@section('content')
    {{-- <pre>
    {{ print_r($bookData) }}
    </pre> --}}
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
                    <h5 class="card-title">{{ $bookData['bookName'] }}</h5>
                    <img src="{{ $bookData['bookImage'] }}" class="card-img-top" alt="image" height="300px" />
                    <p class="card-text"><strong>Author:</strong>
                        <?php $a=""; ?>
                        @if (count($bookData['bookAuthor']))
                            @foreach ($bookData['bookAuthor'] as $author)
                                <?php $a.=$author['name'].", "; ?>
                            @endforeach
                        @endif
                        {{rtrim($a, ", ")}}
                    </p>
                    <p class="card-text"><strong>Gener:</strong> {{ $bookData['gener'] }}</p>
                    <p class="card-text"><strong>Category: </strong>{{ $bookData['category'] }} </p>
                    <p class="card-text"><strong>Overall-Rating: </strong>
                        @for ($i = 1; $i <= $averageRating; $i++)
                            @if ($i > 5)
                                @break(0);
                            @endif
                            <i class="bi bi-star-fill"
                                style="color: @if ($averageRating < 3) yellow @else green @endif"></i>
                        @endfor
                        ({{ round($averageRating) }}/5)
                    </p>
                    <p class="card-text"><strong>Review: </strong>
                        @isset($bookData['reviews'])
                            @foreach ($bookData['reviews'] as $review)
                                <br>
                                {{ $review['userName']['name'] }}
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
                <div class="d-grid  d-md-block">
                    <a href="{{ url('review/' . $bookData['bookId']) }}" class="btn btn-primary btn-md" role="button">Give
                        Review</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            /* overflow-y: unset !important; */
            /* Hide vertical scrollbar */
            overflow-x: hidden !important;
        }
    </style>
@endsection
