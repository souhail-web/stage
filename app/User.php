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
        'name', 'email', 'password',
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

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function roles() {

        return $this->belongsToMany('App\Role');
    }

    public function isAdmin() {
        //retourne true si l'utilisateur est un Admin et false sinon

        return $this->roles()->where('name','admin')->first();
    }

    public function isUser() {
        //retourne true si l'utilisateur est un User et false sinon

        return $this->roles()->where('name','user')->first();
    }

    public function hasAnyRoles(array $roles) {
        //retourne true si l'utilisateur est un User et false sinon

        return $this->roles()->whereIn('name',$roles)->first();
    }

    public function isAuthor($post) {
        //retourne true si l'utilisateur est un User et false sinon

        return ($this->id == $post->user_id);
    }

    public function isCommentAuthor($comment) {
        //retourne true si l'utilisateur est un User et false sinon

        return ($this->email == $comment->comment_email);
    }

}
