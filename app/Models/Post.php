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
}
