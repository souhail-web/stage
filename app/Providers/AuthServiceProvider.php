<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();



        Gate::define('manage-users', function ($user) {
            // permet aux administrateurs de gérer les utilisateurs
            return $user->isAdmin();
            //   return $user->hasAnyRoles(['admin','auteur']); // si plusieurs roles on le droit voir vidéo 9 a 3:00
        });

        /*         Gate::define('edit-users',function($user){
            return $user->isAdmin();
        }) ;

        Gate::define('delete-users',function($user){
            return $user->isAdmin();
        }) ; */

        Gate::define('modify-info', function ($user) {
            // permet aux administrateurs de gérer les utilisateurs
            return $user->isUser();
        });

        Gate::define('write-article', function ($user) {
            // permet aux administrateurs de gérer les utilisateurs
            return $user->hasAnyRoles(['admin', 'user']);
        });

        Gate::define('edit-article', function ($user, $post) {
            // permet aux administrateurs et à l'auteur du post de pouvoir editer son article
            return (($user->isAuthor($post)) || $user->isAdmin());
        });

        Gate::define('edit-comment', function ($user, $comment) {
            // permet aux administrateurs et à l'auteur du post de pouvoir editer son article
            return $user->isCommentAuthor($comment);
        });

        Gate::define('delete-comment', function ($user, $comment) {
            // permet aux administrateurs et à l'auteur du post de pouvoir editer son article

            return (/* ($user->isAuthor($comment->article)) ||*/  $user->isAdmin() ||  ($user->isCommentAuthor($comment)));
        });
    }
}
