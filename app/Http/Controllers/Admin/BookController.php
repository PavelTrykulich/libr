<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $file = $request->file('link');

        $file_name = time(). $request->title .'.'. $file->extension();
        $file->storeAs('public/books/' ,$file_name);

        Book::create(['title' => $request->title,
                      'description' => $request->description,
                      'link' => $file_name,
                      'author_id' => $request->author_id
        ])->categories()->sync($request->categories);

        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book.edit', compact('book','authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required|max:60|unique:books,title,' . $book->id,
            'description' => 'max:255',
            'author_id' => 'required'
        ]);

        $book->update(['title' => $request->title,
                       'description' => $request->description,
                       'author_id' => $request->author_id,
        ]);
        $book->categories()->sync($request->categories);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book $book
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('index');
    }
}
