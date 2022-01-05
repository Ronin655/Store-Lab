<?php

namespace App\DTO;

class JwtToken
{
    public string $token;
    public string $tokenType;
    public int $ttl;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->tokenType = 'Bearer';
        $this->ttl = auth()->factory()->getTTL() * 60;
    }
}