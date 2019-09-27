@extends('layouts.app')

@section('content')

    <main role="main">

        <div class="jumbotron">
            <div class="container">
                <p class="display-4">{{$author->getFullNameUser()}}</p>
                <p class="display-5"><strong>Biography:</strong> {{$author->biography ?? 'no text'}}</p>
            </div>
        </div>

        @if($books->isNotEmpty())
        <div class="container">
            <div class="row">
                @foreach($books as $book)
                    <div class="col-md-4">
                        <h2>{{$book->title}}</h2>
                        <p>{{$book->description}}</p>
                        <p><a href="{{Route('download',$book->link)}}">Download</a></p>
                    </div>
                @endforeach
            </div>

            <hr>

        </div>
        @else
            <div class="alert alert-warning text-center display-5" role="alert">
                <strong>Sorry, this author doesn't have any books yet.</strong>
            </div>
        @endif
    </main>

    <div class="pagination row justify-content-center">
        {{$books->links()}}
    </div>

@endsection
