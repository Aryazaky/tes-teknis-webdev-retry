<?php
namespace App\Actions\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Data\Auth\RegisterUserData;
use App\Models\User;

class RegisterUserAction
{
    public static function run(RegisterUserData $data)
    {
        $user = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        event(new Registered($user));

        return $user;
    }
}
