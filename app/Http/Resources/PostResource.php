<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id,
            'sp' => $this->sp,
            'cab' => $this->cab,
            'text' => $this->text,
            'user' => $this->user->name,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
