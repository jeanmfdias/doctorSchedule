<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorsResource extends JsonResource
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
            'id'                    => $this->id,
            'name'                  => $this->name,
            'crm'                   => $this->crm,
            'status'                => $this->status,
            'register_by_user_id'   => $this->register_by_user_id,
            'created_at'            => $this->created_at,
            'updated_at'            => $this->updated_at
        ];
    }
}
