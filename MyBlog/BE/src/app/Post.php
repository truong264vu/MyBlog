<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','short_content', 'content'];


    public function tags()
    {
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Category','post_category','post_id','category_id'); 
    }

    public function scopeGetTag($query, $postId ){
        return $query->where('id', $postId);
    }
    public function scopeGetCategory($query, $categoryId ){
        return $query->where('id', $categoryId);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','post_category','post_id','category_id');
    }
}
