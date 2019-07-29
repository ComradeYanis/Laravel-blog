<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Comment
 * @package App\Models
 */
class Comment extends Model
{

    //region CONSTS
    /**
     * @const TYPE_CATEGORY_COMMENT
     */
    public const TYPE_CATEGORY_COMMENT = 1;

    /**
     * @const TYPE_POST_COMMENT
     */
    public const TYPE_POST_COMMENT = 2;
    //endregion

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'author',
        'content',
        'type',
        'data_id'
    ];

    protected static function boot()
    {
        parent::boot();
    }

    /**
     * @return BelongsTo|null
     */
    public function data()
    {
        switch ($this->type) {
            case self::TYPE_CATEGORY_COMMENT :
                $data = $this->belongsTo(Category::class);
            break;
            case self::TYPE_POST_COMMENT :
                $data = $this->belongsTo(Post::class);
            break;
            default :
                $data = null;
            break;
        }

        return $data;
    }

    /**
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(Category::class)->where(['type' => self::TYPE_CATEGORY_COMMENT]);
    }

    /**
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class)->where(['type' => self::TYPE_POST_COMMENT]);
    }
}
