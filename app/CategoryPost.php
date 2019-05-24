<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $fillable = [ 'name', 'slug' ];

    public function posts () {
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName () {
        return 'slug';
    }
}
