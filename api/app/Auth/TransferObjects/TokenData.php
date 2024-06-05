<?php

namespace App\Auth\TransferObjects;

use Spatie\LaravelData\Data;

class TokenData extends Data
{
    public function __construct(
        public string $access_token,
        public string $token_type,
        public int $expires_in
    ) {

    }
}
