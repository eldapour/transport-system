<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'image' => asset($this->image),
            'email' => $this->email,
            'phone' => $this->phone,
            'national_id' => (int)$this->national_id,
            'city' => new CityResource($this->city),
            'type' => $this->type,
            'user_type' => $this->user_type,
            'status' => $this->status ? 'active' : 'block',
            'token' => 'Bearer ' . $this->token,
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->created_at->format('Y-m-d'),

        ];
    }
}
