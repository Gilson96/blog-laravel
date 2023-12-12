<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Comment extends Model
{
    use HasFactory;
    protected $fillable = ["email", "comment"];

    // setup the other side of the relationship
    // use singular, as a comment only has one article
    public function article()
    {
        // a comment belongs to an article
        return $this->belongsTo(Article::class);
    }

}