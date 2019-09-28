@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create new category</h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('categories.store')}}" method="post">
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Category" name="title" value="{{old('title')}}">
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

