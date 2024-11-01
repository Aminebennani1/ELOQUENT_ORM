<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'body', 'category_id'];
    protected $table = 'post';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //
}
