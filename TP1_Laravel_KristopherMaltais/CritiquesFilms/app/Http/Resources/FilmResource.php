<?php

namespace App\Http\Resources;

use App\Models\Critic;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
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
            'title' => $this->resource->title,
            'release_year' => $this->resource->release_year,
            'length' => $this->resource->length,
            'description' => $this->resource->description,
            'rating' => $this->resource->rating,
            'language_id' => $this->resource->language_id,
            'special_features' => $this->resource->special_features,
            'image' => $this->resource->image,
            'critics' => Critic::where('film_id', 1)->get()
        ];
    }
}
