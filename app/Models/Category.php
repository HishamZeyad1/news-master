<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'avatar'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function getAvatarAttribute()
    {
        return env('APP_URL') . $this->attributes['avatar'];
    }

}
