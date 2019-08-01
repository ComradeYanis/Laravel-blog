<?php


namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class CommentAuthorRule
 * @package App\Rules
 */
class CommentAuthorRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return str_word_count($value) == 2;
    }

    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message()
    {
        return 'The :attribute must contains of 2 words';
    }
}
