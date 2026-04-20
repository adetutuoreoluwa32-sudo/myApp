<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
    'title',
    'content',
    'author',
    'image'
];


// app/Models/Post.php

public function comments()
{
    return $this->hasMany(Comment::class);
}
}
