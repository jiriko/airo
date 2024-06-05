<?php

namespace App\Auth\TransferObjects;

use Spatie\LaravelData\Data;

class MeData extends Data
{
    public function __construct(
        public string $email,
    ) {}
}