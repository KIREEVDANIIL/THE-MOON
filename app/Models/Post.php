<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

protected $fillable = [
    'moonshine_user_id', 
    'title',
    'content', 
    'category_id',
    'slug',
    'image',
    'is_published'
];
}