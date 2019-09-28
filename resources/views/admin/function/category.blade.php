@if(\Illuminate\Support\Facades\Auth::check())
    <div>
        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm text-white">Update</a>
        <form action="{{route('categories.destroy', $category->id)}}" method="post" class="btn">
            @method('delete')
            @csrf
            <button class="btn btn-danger btn-sm text-white">Delete</button>
        </form>
    </div>
@endif


