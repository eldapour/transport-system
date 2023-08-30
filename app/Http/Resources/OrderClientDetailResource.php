<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderClientDetailResource extends JsonResource
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

            'id' => $this->id,
            'status' => $this->status,
            'image' => asset($this->image),
            'from_warehouse' => new WarehouseResource($this->from_warehouse_place),
            'to_warehouse' => new WarehouseResource($this->to_warehouse_place),
            'weight' => $this->weight,
            'quantity' => $this->qty,
            'value' => $this->value,
            'type' => $this->type,
            'price' => $this->offer->price,
            'driver' => $this->status == 'waiting' ? null : [
               'name' => $this->offer->driver->name,
               'date-arrival' => $this->offer->date,
            ],
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
