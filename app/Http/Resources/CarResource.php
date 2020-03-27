<?php

namespace App\Http\Resources;

use App\Http\Resources\DriverResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'travel'        => new TravelResource($this->travel),
            'id'            => $this->id,
            'number_plate'  => $this->number_plate,
            'name'          => $this->name,
            'from'          => $this->from,
            'to'            => $this->to,
            'price'         => $this->price,
            'picture'       => $this->picture_travel,
            'seat'          => $this->seat,
            'facility'      => $this->facility,
            'driver'        => new DriverResource($this->driver),
            'days'          => DayResource::collection($this->days),
            'hours'         => HourResource::collection($this->hours)


            /*'id_travel'     => new TravelResource($this->travel),
            'driver'        => new DriverResource($this->driver),*/
        ];
    }
}
