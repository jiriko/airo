<?php

declare(strict_types=1);

namespace App\Common\Rules;

use Attribute;
use Spatie\LaravelData\Attributes\Validation\CustomValidationAttribute;
use Spatie\LaravelData\Support\Validation\ValidationPath;
use Spatie\ValidationRules\Rules\Delimited as BaseDelimited;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::TARGET_PARAMETER)]
class Delimited extends CustomValidationAttribute
{
    public function __construct(
        private readonly string $rules
    ) {
    }

    /**
     * @return array<object|string>|object|string
     */
    public function getRules(ValidationPath $path): array|object|string
    {
        return [new BaseDelimited($this->rules)];
    }
}
