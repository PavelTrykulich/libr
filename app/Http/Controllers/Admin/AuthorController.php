<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorRequest $request
     * @param  \App\Author $author
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors');
    }
}
