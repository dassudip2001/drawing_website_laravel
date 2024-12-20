<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;

class Post extends Model
{
    use MediaAlly;
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->select(['id', 'name', 'email']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->select(['id', 'name']);
    }
}
