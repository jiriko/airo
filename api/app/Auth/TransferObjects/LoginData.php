<?php

declare(strict_types=1);

namespace App\Auth\TransferObjects;

use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    public function __construct(
        #[Email]
        public string $email,
        public string $password
    ) {
    }
}
