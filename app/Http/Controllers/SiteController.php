<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use Illuminate\Http\Request;
use App\Author;

class SiteController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->orderBy('created_at', 'desc')->paginate(12);
        $categories = Category::all();
        $authors = Author::all();
        return view('index', compact('books','categories', 'authors'));
    }

    public function authors()
    {
        $authors = Author::orderBy('created_at', 'desc')->paginate(12);
        return view('authors', compact('authors'));
    }

    public function showAuthor($id)
    {
        $author = Author::find($id);
        $books = $author->books()->paginate(12);
        return view('author', compact('author','books'));
    }

    public function categories()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(9);
        return view('categories', compact('categories'));
    }

    public function download($id)
    {

        $book = Book::find($id);
        $pathToFile = storage_path('app/public/books/' . $book->link);
        return response()->download($pathToFile);
    }

    public function filesByCategory($category){
        $books = Book::categoryForSelect($category)->paginate(12);
        return view('index',compact('books'));
    }

    public function searchBooksAuthor(Request $request)
    {
        $books = Author::find($request->author_id)->books()->paginate(12);
        $categories = Category::all();
        $authors = Author::all();
        return view('index', compact('books','categories', 'authors'));
    }

    public function searchBooksCategory(Request $request)
    {
        $books = Category::find($request->category_id)->books()->paginate(12);
        $categories = Category::all();
        $authors = Author::all();
        return view('index', compact('books','categories', 'authors'));
    }
}
