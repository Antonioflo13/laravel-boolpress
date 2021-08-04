<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'content',
        'url_image'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
