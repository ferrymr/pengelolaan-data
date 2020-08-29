<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class provinceResource extends JsonResource
{
    public function __construct($cities)
    {
        $this->cities = $cities;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'province_id' => $this->cities['province_id'],
            'province_name' => $this->cities['province']
        ];
    }
}
