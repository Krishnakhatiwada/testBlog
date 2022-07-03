<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogsCategory extends model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'blog_id',

    ];
}
