<?php

namespace App\Http\Resources;

use App\DTO\JwtToken;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin JwtToken
 */
class JwtTokenResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => $this->tokenType,
            'expires_in' =>  $this->ttl,
        ];
    }
}
