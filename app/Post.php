<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title', 'slug', 'content'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
