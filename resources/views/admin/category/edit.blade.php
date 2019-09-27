@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Update author: {{$category->title}} </h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('categories.update', $category->id)}}" method="post">
                    @method('put')
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Category" name="title" value="{{$category->title}}">
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection



