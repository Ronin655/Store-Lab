<?php

namespace App\Actions\Users;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public function execute(RegistrationRequest $request): void
    {
        $user = new User();
        $data = $request->validated();
        $data = array_merge($data, [
            'password' => Hash::make($data['password']),
        ]);
        $user->fill($data);

        $user->save();
    }
}