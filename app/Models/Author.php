<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
        'DOB',
        'nationality',
        'career',
        'category_id'
    ];
    public function posts(){
        return $this->hasMany( Post::class );
    }

    // public function comments(){
    //     return $this->hasMany( Comment::class );
    // }

    public function category(){
        return $this->belongsTo( Category::class );
    }
}
