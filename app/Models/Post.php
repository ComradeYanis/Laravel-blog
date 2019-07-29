<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    /**
     * @var array $fillable
     */
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

    /**
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->where(['type' => Comment::TYPE_POST_COMMENT]);
    }
}
