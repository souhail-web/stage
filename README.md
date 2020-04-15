<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="http://forthebadge.com"><img src="http://forthebadge.com/images/badges/built-with-love.svg"></a>
</p>



# Blog Laravel
Un blog simple permettant aux utilisateurs de poster des articles et des commentaires. Un menu dédié à l’administration est intégré et permet aux administrateurs de gérer les posts, les commentaires et les utilisateurs. Les utilisateurs quant à eux peuvent gérer leurs propres posts, commentaires et informations personnelles. 

## Pour commencer
Ces instructions vous permettront d'obtenir une copie du projet sur votre ordinateur local.
### Installation
1. Lancer `git clone https://github.com/silvia-badoz/laravel.git projectname` pour cloner le repository
2. Taper `cd projectname` pour cloner le repository
3. Taper `composer install` 
4. Taper `composer update`
5. Taper `touch database/database.sqlite` pour créer la base de données
6. Taper `copy .env.example to .env `
7. Taper `php artisan key:generate` pour générer une clé dans le fichier .env 

8. Il faut maintenant modifier le fichier .env pour l’adapter à notre projet. Nous utiliserons sqlite et devons donc modifier le .env en conséquence, voici à quoi il devrait ressembler : 

`DB_CONNECTION=sqlite`  
`DB_DATABASE= votreChemin\database\database.sqlite`  
`#DB_HOST=127.0.0.1`  
`#DB_PORT=3306`  
`#DB_DATABASE=laravel`  
`#DB_USERNAME=root`  
`#DB_PASSWORD=`  

9. Pour pouvoir utiliser le reCaptcha il est nécessaire de rajouter les lignes suivantes à la fin du fichier .env :

`NOCAPTCHA_SECRET=6Lddb-kUAAAAAIiw58vdF9Nu5fr79nDdv49_VLHa`  
`NOCAPTCHA_SITEKEY=6Lddb-kUAAAAAHershddGZwN5W_LLoJJtP_JHlww`

## Démarrage 

Taper `php artisan migrate --seed` pour créer les tables et les remplir avec des données générées aléatoirement. 

Taper `php artisan serve` pour lancer le serveur et lancez l’adresse [http://localhost:8000]( http://localhost:8000)

## Fabriqué avec
* Laravel – Framework PHP

## Inclus
* [Socialite](https://github.com/laravel/socialite) : afin de pouvoir se connecter à l’aide de facebook, google et github 
* [No CAPTCHA reCAPTCHA](https://github.com/anhskohbo/no-captcha) : pour générer des captcha

## Astuces 
Pour utiliser l’application la database est remplie avec les identifiants suivants : 

* Administrateur : email = admin@admin.com password = password
* Utilisateur : email = user@user.com, password = password

## Fonctionnalités implémentées 

### 1. Gestion des commentaires
Un formulaire de commentaires est visible sous tous les articles. La liste de commentaires est ensuite affichée au dessus du formulaire. 
* Un administrateur peut supprimer n'importe quel commentaire s'il le souhaite.  
_S'authentifier comme administrateur ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur un article, cliquer sur "delete" sous un commentaire._
* Les auteurs des articles peuvent eux aussi supprimer les commentaires. 
* Un utilisateur connecté peut modifier ou supprimer son commentaire s'il le souhaite.  
_S'authentifier ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur un article  
Publier un commentaire  
Cliquer sur "edit" ou "delete"_
* Un utilisateur non connecté peut poster un commentaire mais il ne pourra pas le modifier ni le supprimer. Un captcha vérifie qu'il s'agit bien d'une personne physique.  
_Cliquer sur un article ([http://localhost:8000/posts](http://localhost:8000/posts))  
Remplir les champs du formulaire de commentaire puis cliquer sur "publish"_ 

### 2. CRUD des articles
Le CRUD est différent selon les autorisations accordées aux utilisateurs en fonction de leur rôle : 
* Un administrateur peut gérer tous les posts : il peut les lire, les éditer et les supprimer.  
_S'authentifier comme administrateur ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur "admin" puis "posts management"  
Cliquer sur le bouton "show", "edit" et "delete" ([http://localhost:8000/admin/posts](http://localhost:8000/admin/posts))_
* Un utilisateur peut gérer tous ses posts : il peut les lire, les éditer et les supprimer.  
_S'authentifier ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur votre nom en haut à droite puis "posts management" ([http://localhost:8000/user/posts](http://localhost:8000/user/posts))  
Cliquer sur le bouton "show", "edit" et "delete"_
* Seul un utilisateur authentifié peut écrire un article. 

### 3. Identification / Authentification qui protège l'accès à l’administration
Permet l'authentification et la protection de certaines parties de l’application.
* Les administrateurs peuvent gérer les utilisateurs et les posts. Pour les utilisateurs ils peuvent modifier leurs informations générales ainsi que leurs rôles, ils peuvent aussi décider de supprimer un utilisateur. Pour ce qui est des posts, cela rejoint le principe du CRUD évoqué plus haut.  
_S'authentifier comme administrateur ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur "admin" en haut à droite  
Cliquer sur "Users management" pour modifier les informations et les rôles des utilisateurs ([http://localhost:8000/admin/users](http://localhost:8000/admin/users))_  
* Les utilisateurs peuvent modifier leurs propres informations (nom, adresse mail et mot de passe). Ils peuvent aussi gérer le CRUD de leurs articles.  
_S'authentifier ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur votre nom puis "My informations" ([http://localhost:8000/user/users](http://localhost:8000/user/users))_

### 4. Ajout de rôles utilisateurs (administrateur et utilisateur)
* Un utilisateur qui s’enregistre aura le rôle utilisateur (user) par défaut.  
_S'authentifier ([http://localhost:8000/register]( http://localhost:8000/register))  
Cliquer sur votre nom en haut à droite puis sur "My informations" ([http://localhost:8000/user/users](http://localhost:8000/user/users))_ 
* Seul l’administrateur peut changer le rôle d’un utilisateur.
* Le rôle utilisateur peut uniquement voir ses informations, gérer ses articles et les commentaires associés à ceux-ci, écrire un article.  
_S'authentifier ([http://localhost:8000/login]( http://localhost:8000/login))  
Cliquer sur votre nom en haut à droite puis sur "My informations" ([http://localhost:8000/user/users](http://localhost:8000/user/users)), sur "Post management" ([http://localhost:8000/user/posts](http://localhost:8000/user/posts)), sur "Write an article" ([http://localhost:8000/posts/create](http://localhost:8000/posts/create))_  
* Le rôle administrateur peut accéder à toutes les parties de l'administration. 

Précision : une personne qui serait sur le blog sans être authentifiée peut tout de même écrire un commentaire sous un article et/ou envoyer un message via le formulaire de contact.  Dans ce cas, elle devra indiquer son nom, son adresse e-mail et cocher "Je ne suis pas un robot" grâce au captcha. 

### 6.  Identification avec Google, Facebook et Github en utilisant Socialite
Pour s'identifier via un de ces liens, il faut se rendre sur [http://localhost:8000/login]( http://localhost:8000/login) ou bien [http://localhost:8000/register]( http://localhost:8000/register).  
Ensuite, cliquez sur le bouton correspondant au réseau social avec lequel vous voulez vous connecter et entrez votre identifiant et mot de passe habituels.  
Un utilisateur Google, Facebook ou Github aura automatiquement le rôle d'utilisateur. 

## Difficultés rencontrées 
Nous avons essayé d'implémenter des tests (fonctionnalité 9 : tests unitaires) mais nous avons eu des difficultés techniques avec l'utilisation de Dusk.  
Nous avons également eu des difficultés avec l'utilisation de Github, notamment pour supprimer certains commit ou pour merger 2 versions du projet. 

## Évolution du blog
Dans les prochaines versions, il serait intéressant d’implémenter quelques fonctionnalités supplémentaires pouvant améliorer l’expérience utilisateur comme :
* demander la confirmation de l'adresse e-mail ;
* afficher des notifications ;
* pouvoir ajouter des images à un article avec un multi-upload ;
* envoyer un mail à l'utilisateur pour réinitaliser son mot de passe en cas d'oubli ;
* envoyer un mail aux utilisateurs s'étant authentifiés via Google, Facebook ou Github pour leur rappeler de créer un nouveau mot de passe ;
* demander la confirmation de l’utilisateur en cas de suppression d'article ou de commentaire ;
* créer une page type "profil" pour les utilisateurs ;

## Auteurs
* Amély Cauchy alias [AmeyLee](https://github.com/Ameylee)
* Silvia Badoz-Griffond

