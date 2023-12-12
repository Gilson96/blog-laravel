<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleListResource extends JsonResource
{
    public function toArray($request)
    {
        // just the id and title properties
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "comments" => $this->comments->pluck('comment')

        ];
    }

}