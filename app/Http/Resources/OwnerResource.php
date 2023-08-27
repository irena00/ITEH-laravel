<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'age' => $this->resource->age,
            'is_invalid' => $this->resource->is_invalid,
            'nationality' => $this->resource->nationality,
            'driver_license' => $this->resource->driver_license
        ];
    }

    public static $wrap = 'owner';
}
