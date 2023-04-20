<?php

namespace App\Rules;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class IsTruePassword implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public function __construct($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
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
        return Hash::check($value, $this->hashedPassword);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Votre mot de passe est incorrect !';
    }
}
