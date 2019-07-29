<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'name',
        'description'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Category $category) {
            $category->posts()->delete();
        });
    }

    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'data_id')->where(['type' => Comment::TYPE_CATEGORY_COMMENT])->orderBy('id', 'desc');
    }
}
