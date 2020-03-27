<?php

namespace App\Http\Resources;

use App\Http\Resources\User\CarResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'id'    => $this->id,
            'name'  => $this->name,
            'nik'   => $this->nik,
            'sim'   => $this->sim,
            'name'  => $this->name,
            'gender'=> $this->gender,
            'email' => $this->email,
            'avatar'=> $this->avatar,
            'address'=> $this->address,
            'telephone' => $this->telephone
            /*'car' => [
                'car' => $this->car,
                'day' => DayResource::collection($this->car->day)
            ]*/
        ];
    }
}
