<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CriticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->resource->user_id,
            'film_id' => $this->resource->film_id,
            'score' => $this->resource->score,
            'comment' => $this->resource->comment,
        ];
    }
}
