@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Update author: {{$author->getFullName()}} </h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('authors.update', $author->id)}}" method="post">
                    @method('put')
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="First name" name="first_name" value="{{$author->first_name}}">
                    <input class="form-control my-2 w-50" type="text" placeholder="Second name" name="second_name" value="{{$author->second_name}}">
                    <textarea  class="form-control my-2 w-50" type="text" placeholder="Biography" name="biography">{{$author->biography}}</textarea>
                    <button class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection



