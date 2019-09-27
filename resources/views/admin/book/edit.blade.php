@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Update book: {{$book->title}} </h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('books.update', $book->id)}}" method="post">
                    @method('put')
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Title" name="title" value="{{$book->title}}">
                    <input class="form-control my-2 w-50" type="text" placeholder="Description" name="description" value="{{$book->description}}">

                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection



