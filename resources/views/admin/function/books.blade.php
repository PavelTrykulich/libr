@if(\Illuminate\Support\Facades\Auth::check())
    <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary btn-sm text-white">Update</a>
    <form action="{{route('books.destroy', $book->id)}}" class="btn">
        @method('delete')
        @csrf
        <button class="btn btn-danger btn-sm text-white">Delete</button>
    </form>
@endif
