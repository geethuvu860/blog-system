<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $primarykey='blog_id';
    protected $fillable=[
        'blog_id',
        'title',
        'content',
        'image',
        'status ',
    ];
    public function blogview(){
        return $this->belongsTo(User::class,'user_id','blog_id');
    }
    
     
}
