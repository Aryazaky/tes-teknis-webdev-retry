<?php

namespace App\Data\Auth;

use Spatie\LaravelData\Data;
use Illuminate\Validation\Rules;

class RegisterUserData extends Data
{
    public string $name;
    public string $email;
    public string $password;

    public static function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','string','min:8','confirmed', Rules\Password::defaults()],
        ];
    }
}
