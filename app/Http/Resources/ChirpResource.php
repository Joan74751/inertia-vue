<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ChirpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'  => $this->id,
            'message' => $this->message,
            'created_at' => $this->created_at->diffForHumans(),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
