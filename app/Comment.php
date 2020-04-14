<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * Retourne l'article auquel appartient le commentaire
     */
    public function article()
    {
        return $this->belongsTo('Post');
    }


    /**
     * Retourne l'utilisateur ayant écrit le commentaire
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    public $table = 'comments';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $fillable = ['post_id', 'comment_name', 'comment_email', 'comment_content', 'comment_date'];
}
