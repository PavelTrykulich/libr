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
        return view('index', compact('books'));
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
        $categories = Category::paginate(9);
        return view('categories', compact('categories'));
    }

    public function download()
    {

    }


}
