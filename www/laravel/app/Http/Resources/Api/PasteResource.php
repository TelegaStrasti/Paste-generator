<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $updated_at
 * @property mixed $created_at
 * @property mixed $language
 * @property mixed $user_id
 * @property mixed $expires_at
 * @property mixed $access
 * @property mixed $url
 * @property mixed $text
 * @property mixed $title
 */
class PasteResource extends JsonResource
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
            'url' => $this->url,
            'access' => $this->access,
            'expires_at' => $this->expires_at,
            'user_id' => $this->user_id,
            'language' => $this->language,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
