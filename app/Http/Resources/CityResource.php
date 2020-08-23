<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'city_id' => $this->cities['city_id'],
            'city_name' => $this->cities['type'] . ' ' . $this->cities['city_name']
        ];
    }
}
