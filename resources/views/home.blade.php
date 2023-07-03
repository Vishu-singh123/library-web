@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <pre>
            {{-- {{ print_r($books) }} --}}
            </pre>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">Gener</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $data => $item)
                        <tr>
                            <th scope="row">{{ $item['id'] }}</th>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                @foreach ($item['authors'] as $author)
                                    <li>
                                        {{ $author['name'] }}
                                    </li>
                                @endforeach
                            </td>
                            <td>
                                {{ $item['gener']['name'] }}
                            </td>
                            <td><a href="{{'bookdetail/'.$item['id']}}" class="btn btn-primary btn-mg active" role="button"
                                    aria-pressed="true">Primary link</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
