@extends('layouts.app')

@section('content')
    <div class="container modal-dialog-centered justify-content-md-center">
        <div class="row">
            @isset($error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endisset
            <div class="col-md-4">
                <div class="card bg-dark text-light" style="width: 18rem;">
                    <div class="card-header">
                        Category
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($categories as $category)
                            <li class="list-group-item alert-link"><a href="{{route('filesByCategory', $category->title)}}">{{$category->title}}</a>
                                @include('admin.function.category')
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pagination row justify-content-center my-2">
        {{$categories->links()}}
    </div>
@endsection
