<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
    * Retourne l'utilisateur
    */
    public function users() {

        return $this->belongsToMany('App\User');
    }


}
