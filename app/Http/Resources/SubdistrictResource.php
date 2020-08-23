<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubdistrictResource extends JsonResource
{
    public function __construct($subdistricts)
    {
        $this->subdistricts = $subdistricts;
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
            'subdistrict_id' => $this->subdistricts['subdistrict_id'],
            'subdistrict_name' => $this->subdistricts['type'] . ' ' . $this->subdistricts['subdistrict_name']
        ];
    }
}
