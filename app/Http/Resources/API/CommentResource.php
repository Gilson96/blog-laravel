<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
       // just show the id, title, and article properties
        // $this represents the current article
        return [
            "comments" => $this->comment
        ];
    }
}
