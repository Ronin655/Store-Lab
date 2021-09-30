<?php

namespace App\Actions;

use Illuminate\Support\Str;

class ValueIndicator
{
    public function getValue(int $length, ?string $type): string
    {
        if ($type == 'string') {
            return Str::random($length);
        }

        if ($type == 'uuid') {
            return Str::limit(Str::uuid(), $length, '');
        }

        return (string)rand(
            pow(10, $length - 1),
            pow(10, $length) - 1
        );
    }
}
