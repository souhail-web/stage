<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article()
    {
        return $this->belongsTo('Post');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public $table = 'comments';
    public $fillable = ['post_id','comment_name','comment_email','comment_content','comment_date'];


}
