<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Author;

class SiteController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(12);
        return view('index', compact('books'));
    }

    public function showAuthor($id)
    {
        $author = Author::find($id);
        //$books = Book::where('author_id', $id);
        $books = $author->books()->paginate(12);
        return view('author', compact('author','books'));
    }

    public function download()
    {

    }

}
