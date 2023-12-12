<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return false;
    }


    public function rules()
    {
        return [
            "title" => ["required", "string"],
            "content" => ["required", "string"],
        ];
    }
}