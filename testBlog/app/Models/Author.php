<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'email',
    ];

    public function blog()
    {
        return $this->hasOne(Blog::class);
    }
}
