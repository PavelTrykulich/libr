@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create new author</h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('books.store')}}" method="post">
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="Title" name="title">
                    <input class="form-control my-2 w-50" type="text" placeholder="Description" name="description">

                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

