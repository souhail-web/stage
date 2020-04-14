<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'github_id', 'facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


        /**
    * Retourne l'utilisateur
    */

    public function posts()
    {
        return $this->hasMany('App\Post');
    }


        /**
    * Retourne le commentaire de l'utilisateur
    */

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


        /**
    * Retourne le role de l'utilisateur
    */
    public function roles() {

        return $this->belongsToMany('App\Role');
    }


    /**
    * Retourne  true si l'utilisateur est un Admin et false sinon
    */
    public function isAdmin() {

        return $this->roles()->where('name','admin')->first();
    }


        /**
    * Retourne true si l'utilisateur est un User et false sinon
    */
    public function isUser() {

        return $this->roles()->where('name','user')->first();
    }


    /**
    * Retourne true si l'utilisateur est un User et false sinon
    */
    public function hasAnyRoles(array $roles) {

        return $this->roles()->whereIn('name',$roles)->first();
    }


    /**
    * Retourne true si l'utilisateur est un User et false sinon
    */
    public function isAuthor($post) {

        return ($this->id == $post->user_id);
    }


    /**
    * Retourne true si l'utilisateur est un User et false sinon
    */
    public function isCommentAuthor($comment) {

        return ($this->email == $comment->comment_email);
    }

}
