@if(\Illuminate\Support\Facades\Auth::check())
    <a href="{{route('authors.edit', $author->id)}}" class="btn btn-primary btn-sm text-white">Update</a>
    <form action="{{route('authors.destroy', $author->id)}}" method="post" class="btn">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm text-white">Delete</button>
    </form>
@endif


