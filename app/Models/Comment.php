<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * @return mixed
     */
    public static function getPostsComments() {

        return static::where('type', self::TYPE_POST_COMMENT);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getPostComments($id) {

        return static::getPostsComments()->where('data_id', $id)->get();
    }

    /**
     * @return mixed
     */
    public static function getCategoriesComments() {

        return static::where('type', self::TYPE_CATEGORY_COMMENT);
    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getCategoryComments($id) {

        return static::getCategoriesComments()->where('data_id', $id)->get();
    }
}
