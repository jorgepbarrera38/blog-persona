<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_post_id', 'status', 'image'];

    public function categoryPost () {
        return $this->belongsTo(CategoryPost::class);
    }


    public function user () {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName () {
        return 'slug';
    }
    
    public function scopePublished ($query) {
        return $query->where('status', 'PUBLISHED');
    }
}
