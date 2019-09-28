<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'description', 'author_id', 'link'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function scopeCategoryForSelect($query, $category)
    {
        return $query->select('books.*')
                     ->join('book_category', 'books.id', 'book_category.book_id')
                     ->join('categories', 'book_category.category_id', 'categories.id')
                     ->where('categories.title', $category);
    }






}
