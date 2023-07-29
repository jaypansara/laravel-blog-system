<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public const PUBLISHED = 1;
    public  const DRAFT = 0;
    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
