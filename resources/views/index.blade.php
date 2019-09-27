@extends('layouts.app')

@section('content')

<main role="main">

    <div class="jumbotron">
        <div class="container">
            <form method="get" action="">
                <p class="display-4 my-2">Search</p>
                <input class="form-control my-2" type="text" placeholder="Author name">
                <input class="form-control" type="text" placeholder="File name">
                <select class="form-control my-2">
                    <option>Without category</option>
                    <option>Default select</option>
                </select>
                <button class="btn btn-secondary my-2" role="button">Search</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4">
                    <h2>{{$book->title}}</h2>
                    <p>{{$book->description}}</p>
                    <p>Author: <a href="{{Route('show.author',$book->author_id)}}">{{$book->author->getFullNameUser()}}</a></p>
                    <p><a href="{{Route('download',$book->link)}}">Download</a></p>
                </div>
            @endforeach
        </div>

        <hr>

    </div>

</main>

<div class="pagination row justify-content-center">
    {{$books->links()}}
</div>

@endsection