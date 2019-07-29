<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

        static::creating(function ($comment) {

        });
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
}
