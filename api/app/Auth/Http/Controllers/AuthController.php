<?php

declare(strict_types=1);

namespace App\Auth\Http\Controllers;

use App\Auth\TransferObjects\LoginData;
use App\Auth\TransferObjects\TokenData;

class AuthController
{
    /**
     * Get a JWT via given credentials.
     */
    public function login(LoginData $request): TokenData
    {
        if (! $token = auth()->attempt($request->toArray())) {
            abort(401, 'Unauthorized');
        }

        return TokenData::from([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl') * 60,
        ]);
    }
}
