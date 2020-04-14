<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
    * Retourne l'auteur du post
    */
   public function author()
   {
       return $this->belongsTo('App\User','user_id');
   }

    /**
    * Retourne les commentaires du post
    */
   public function comments()
   {
       return $this->hasMany('App\Comment');
   }

   public $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

   public $fillable = ['id','user_id','post_date','post_content','post_title','post_status','post_name','post_type','post_category'];


}
