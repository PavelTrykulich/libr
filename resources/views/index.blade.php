@extends('layouts.app')

@section('content')
<main role="main">
    <div class="jumbotron">
        <div class="container">
            @if($authors->isNotEmpty())
            <form method="get" action="{{route('search.books.author')}}">
                <p class="display-4 my-2">Search</p>
                <p>By the author</p>
                <select class="form-control form-control-sm my-2 w-75" name="author_id">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->getFullName()}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary my-2 " role="button">Search</button>
            </form>
            @endif
            @if($categories->isNotEmpty())
            <form method="get" action="{{route('search.books.category')}}">
                <p>By the category</p>
                <select class="form-control form-control-sm my-2 w-75" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <button class="btn btn-secondary my-2" role="button">Search</button>
            </form>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="row">
            @if($books->isNotEmpty())
                @foreach($books as $book)
                    <div class="col-md-4 my-4">
                        <h2 class="book">{{$book->title}}</h2>
                        <p>{{$book->description}}</p>
                        <p>Author: <a href="{{Route('show.author',$book->author_id)}}">{{$book->author->getFullName()}}</a></p>
                        @include('layouts.showCategories')
                        <p><a href="{{Route('download',$book->id)}}">Download</a></p>
                        @include('admin.function.books')
                    </div>
                @endforeach
            @else
                <div class="alert alert-primary w-100 text-center" role="alert">
                    There are no such books!
                </div>
            @endif
        </div>
        <hr>
    </div>

</main>

<div class="pagination row justify-content-center">
    {{$books->links()}}
</div>
{{--<script>
    $(document).ready(function () {

        fetch_customer_data();

        function fetch_customer_data(query = '') {
            $.ajax({
                url: "{{ route('search') }}",
                method: 'GET',
                data: {query: query},
                dataType: 'json',
                success: function (data) {
                    alert('ads');
                }
            });
        }

        $(document).on('keyup', '#search', function () {
           var query = $(this).val();
           fetch_customer_data(query);
        });
    });

</script>--}}

@endsection