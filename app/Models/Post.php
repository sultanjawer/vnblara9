<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'posts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];

    protected $fillable = [
        'post_title', //thet title of the post. TEXT
        'post_content', //the content of the post. LONGTEXT
        'post_status', //the status for the post. default is published VARCHAR 20
        'post_ecxerpt', //short text for the post. TEXT
        'category_id', //category of the post. default uncategorized
        'mime', //attachment media for the post
        'tags', //tags for the post
        'created_at',
        'updated_at',
        'deleted_at',
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
