<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     /**
    * Get the user that authored the post.
    */
   public function author()
   {
       return $this->belongsTo('App\User','user_id');
   }

   public function comments()
   {
       return $this->hasMany('App\Comment');
   }

   public $table = 'posts';
   public $fillable = ['id','user_id','post_date','post_content','post_title','post_status','post_name','post_type','post_category'];


}
