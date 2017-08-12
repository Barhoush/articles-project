<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table    =   'articles';
    protected $fillable  =   ['title', 'description',   'category_id', 'published'];

    public function category(){
        return $this->belongsTo('App\Article');
    }

    public function comments(){
        return  $this->hasMany('App\Comment');
    }

}
