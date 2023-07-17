<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPastesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'title' => $this->title,
          'text' => $this->text,
          'language' => $this->language,
          'access' => $this->access,
          'expires_at' => $this->expires_at,
        ];
    }
}
