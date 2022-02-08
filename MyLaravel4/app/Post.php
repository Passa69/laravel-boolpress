<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'author',
        'subtitle',
        'description',
        'date',
        'rating',
        'category_id'
    ];

    public function category() {

        return $this -> belongsTo(Category::class);
    }   

    public function reactions() {
        return $this -> belongsToMany(Reaction::class);
    }
}
