<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class Blog extends Model
{
    use HasFactory;
    use Taggable;
    protected $fillable = [
        'title',
        'content',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'blogs_categories');
    }
}
