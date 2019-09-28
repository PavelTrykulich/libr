@extends('layouts.app')

@section('content')
    @include('layouts.session_error')
    <main role="main">

        <div class="container">
            <div class="row">
                @foreach($authors as $author)
                    <div class="col-md-4 my-4">
                        <h2>{{$author->getFullName()}}</h2>
                        <p>{{$author->biogtaphy}}</p>
                        <p><a href="{{Route('show.author',$author->id)}}">Page author</a></p>
                        @include('admin.function.authors')
                    </div>
                @endforeach
            </div>
            <hr>
        </div>

    </main>

    <div class="pagination row justify-content-center">
        {{$authors->links()}}
    </div>

@endsection