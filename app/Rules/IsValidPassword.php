<?php

namespace App\Rules;

use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\Rule;

class IsValidPassword implements Rule
{
    /**
     * Determine if the Length Validation Rule passes.
     *
     * @var boolean
     */
    public $lengthPasses = true;

    /**
     * Determine if the Uppercase Validation Rule passes.
     *
     * @var boolean
     */
    public $uppercasePasses = true;

    /**
     * Determine if the Numeric Validation Rule passes.
     *
     * @var boolean
     */
    public $numericPasses = true;

    /**
     * Determine if the Special Character Validation Rule passes.
     *
     * @var boolean
     */
    public $specialCharacterPasses = true;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this -> lengthPasses = (Str::length($value) >= 8);
        $this -> uppercasePasses = (Str::lower($value) !== $value);
        $this -> numericPasses = ((bool)preg_match('/[0-9]/', $value));
        $this -> specialCharacterPasses = ((bool)preg_match('/[^A-Za-z0-9]/', $value));

        return ($this->lengthPasses && $this -> uppercasePasses && $this -> numericPasses && $this -> specialCharacterPasses);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        switch (true) {
            case !$this -> uppercasePasses
                && $this -> numericPasses
                && $this -> specialCharacterPasses:
                return 'La :attribute deve contenere almeno 8 caratteri e contenere almeno 1 carattere maiuscolo.';

            case !$this -> numericPasses
                && $this -> uppercasePasses
                && $this -> specialCharacterPasses:
                return 'La :attribute deve contenere almeno 8 caratteri e contenere almeno 1 numero.';

            case !$this -> specialCharacterPasses
                && $this -> uppercasePasses
                && $this -> numericPasses:
                return 'La :attribute deve contenere almeno 8 caratteri e contenere almeno 1 carattere speciale.';

            case !$this -> uppercasePasses
                && !$this -> numericPasses
                && $this -> specialCharacterPasses:
                return 'La :attribute deve contenere almeno 8 caratteri, 1 carattere maiuscolo e 1 numero.';

            case !$this -> uppercasePasses
                && !$this -> specialCharacterPasses
                && $this -> numericPasses:
                return 'La :attribute deve contenere almeno 8 caratteri, 1 carattere maiuscolo e 1 carattere speciale.';

            case !$this -> uppercasePasses
                && !$this -> numericPasses
                && !$this -> specialCharacterPasses:
                return 'La :attribute deve contenere almeno 8 caratteri, 1 carattere maiuscolo, 1 numero e 1 carattere speciale.';

            default:
                return 'La :attribute deve contenere almeno 8 caratteri.';
        }
    }
}
