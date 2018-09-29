<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ZeroOrMin implements Rule
{

    private $min;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($min)
    {
        $this->min = $min ?? 0;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return strlen($value) == 0 || strlen($value) >= $this->min;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.zero_or_min', ['min' => $this->min]);
    }
}
