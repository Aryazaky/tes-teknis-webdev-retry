<?php
namespace App\Actions\Auth;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Data\Auth\LoginData;
use App\Models\User;

class LoginAction
{
    public static function run(LoginData $data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user || !Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        return $user->createToken('default')->plainTextToken;
    }
}
