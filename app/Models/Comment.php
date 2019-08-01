<?php

namespace App\Models;

use App\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * @const TYPE_POST_COMMENT
     */
    public const TYPE_POST_COMMENT = 1;

    /**
     * @const TYPE_CATEGORY_COMMENT
     */
    public const TYPE_CATEGORY_COMMENT = 2;

    /**
     * @var array
     */
    protected $fillable = [
        'author',
        'content',
        'data_id',
        'type'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
        });
    }

    /**
     * @return BelongsTo
     */
    public function data()
    {
        return $this->type == self::TYPE_POST_COMMENT ? $this->belongsTo(Post::class, 'data_id', 'id') : $this->belongsTo(Category::class, 'data_id', 'id');
    }
}
