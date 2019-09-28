@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Update book: {{$book->title}} </h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Title" name="title" value="{{$book->title}}">
                    <input class="form-control my-2 w-50" type="text" placeholder="Description" name="description" value="{{$book->description}}">
                    <p>Author</p>

                    <select class="form-control form-control-sm w-50 my-2" name="author_id">
                        <option value="{{$book->author_id}}">{{$book->author->getFullName()}}</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->getFullName()}}</option>
                        @endforeach
                    </select>

                    <p>Select categories</p>
                    @foreach($categories as $category)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{$category->id}}" name='categories[]' value="{{$category->id}}"
                                    {{$book->categories->contains($category->id ) == 2 ? 'checked' : ''}}>
                            <label class="custom-control-label" for="{{$category->id}}">{{$category->title}}</label>
                            <br>
                        </div>
                    @endforeach

                    <button class="btn btn-success my-2">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection



