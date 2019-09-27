@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Create new author</h3>
        @include('layouts.errors')
        <div class="row">
            <div class="col-md-12 ">
                <form action="{{Route('authors.store')}}" method="post">
                    @csrf
                    <input class="form-control my-2 w-50" type="text" placeholder="First name" name="first_name">
                    <input class="form-control my-2 w-50" type="text" placeholder="Second name" name="second_name">
                    <textarea  class="form-control my-2 w-50" type="text" placeholder="Biography" name="biography"></textarea>
                    <button class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

