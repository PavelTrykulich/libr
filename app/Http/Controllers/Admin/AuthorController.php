<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return Response
     */
    public function store(AuthorRequest $request)
    {
        Author::create(['first_name' => $request->first_name,
                        'second_name' => $request->second_name,
                        'biography' => $request->biography
            ]);
        return redirect()->route('authors');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Author $author
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Author $author)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2|max:30|unique:authors,first_name,' . $author->id,
            'second_name' => 'required|min:2|max:30' ,
            'biography' => 'max:255',
        ]);

        $author->update(['first_name' => $request->first_name,
                         'second_name' => $request->second_name,
                         'biography' => $request->biography,
        ]);
        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author $author
     * @return Response
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        if ($author->books->isNotEmpty()){
            Session::flash('error', 'First remove or unlink all books by this author.');
            return redirect()->route('authors');
        }
        $author->delete();
        return redirect()->route('authors');
    }
}
