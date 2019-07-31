<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    protected $fillable = [
        'name',
        'content',
        'category_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
        });

        static::deleting(function ($post) {
            $post->comments()->delete();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
