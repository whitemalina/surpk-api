<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostWithCommentsResource extends JsonResource
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
            'status' => $this->status,
            'text' => $this->text,
            'user' => $this->user->name,
//            'comments' => CommentsResource::collection($this->comments),
            'created_at' => $this->created_at,
        ];
    }
}
