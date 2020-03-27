<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'license_number'    => $this->license_number,
            'business_name'     => $this->business_name,
            'type'              => $this->type,
            'address'           => $this->address,
            'email'             => $this->email,
            'avatar'            => $this->path_avatar,
            'telephone'         => $this->telephone,
        ];
    }
}
