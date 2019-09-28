@if($book->categories->isNotEmpty())
    <small class="text-muted">
        <p>Categories:
            @foreach($book->categories as $category)
                <a  href="{{route('filesByCategory', $category->title)}}">{{$category->title}}</a>
                @if($category !== $book->categories->last())
                    {{','}}
                @endif
            @endforeach
        </p>
    </small>
    @else
    <small>
        <p>Without categories</p>
    </small>
@endif
