<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table    =   'comments';
    protected $fillable =   [
        'description',  'article_id',   'user_id'   ,'published',   'created_at',   'updated_at'
    ];

    public function user(){
        return  $this->belongsTo('App\User');
    }

}
