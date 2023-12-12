<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;
class Article extends Model
{
    protected $fillable = ['title', 'content'];

    // get a truncated version of each article’s content
    public function truncate()
    {
        // use the Laravel Str::limit method
        // to limit to 20 characters
        return Str::limit($this->content, 20);
    }

    public function relativeDate()
    {
        return $this->created_at->diffForHumans();
    }

    // plural, as an article can have multiple comments
    public function comments()
    {
        // use hasMany relationship method
        return $this->hasMany(Comment::class);
    }

}