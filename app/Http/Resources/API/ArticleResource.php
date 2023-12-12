<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{

    public function toArray($request)
    {
        // just show the id, title, and article properties
        // $this represents the current article
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "comments" => $this->comments
        ];
    }
}