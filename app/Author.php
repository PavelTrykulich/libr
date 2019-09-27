<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['first_name', 'second_name', 'biography'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->second_name;
    }
}
