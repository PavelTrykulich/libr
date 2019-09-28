@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create new book</h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('books.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Title" name="title" value="{{old('title')}}">
                    <input class="form-control my-2 w-50" type="text" placeholder="Description" name="description" value="{{old('description')}}">
                    <input type="file" class="form-control-file my-2" name="link" value="{{old('link')}}">

                    <p>Author</p>
                    <select class="form-control form-control-sm w-50" name="author_id">
                        @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->getFullName()}}</option>
                        @endforeach
                    </select>

                    <p class="my-2">Categories</p>
                    @foreach($categories as $category)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{$category->id}}" name='categories[]' value="{{$category->id}}">
                            <label class="custom-control-label" for="{{$category->id}}">{{$category->title}}</label>
                            <br>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-success my-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

