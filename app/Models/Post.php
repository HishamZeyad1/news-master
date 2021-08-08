<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' , 'content' , 'date_written' ,
        'featured_image' , //'votes_up' , 'votes_down' ,
        'author_id' , 'category_id' //, 'voters_up','voters_down'
    ];

    public function author(){
        // return $this->belongsTo( User::class );
        return $this->belongsTo( Author::class , 'author_id' , 'id' );
    }

    public function comments(){
        return $this->hasMany( Comment::class );
    }

    public function category(){
        return $this->belongsTo( Category::class );
    }
}
