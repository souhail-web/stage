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

## Demarage 

Taper `php artisan migrate --seed` pour créer les tables et les remplir avec des données générées aléatoirement. 

Taper `php artisan` serve pour lancer le serveur et lancez l’adresse [http://localhost:8000]( http://localhost:8000)

## Fabriqué avec
* Laravel – Framework PHP


## Include (Inclus?)
* [Socialite](https://github.com/laravel/socialite) : afin de pouvoir se connecter à l’aide de facebook, google et github 
* [No CAPTCHA reCAPTCHA](https://github.com/anhskohbo/no-captcha) : pour générer des captcha

## Tricks (Astuces?) 
Pour utiliser l’application la database est remplie avec les identifiants suivants : 

* Administrateur : email = admin@admin.com password = password
* Utilisateur : email = user@user.com, password = password

## Fonctionnalités implémentées 

### 1. Gestion des commentaires
Un formulaire de commentaires est visible sous tous les articles. La liste de commentaires est ensuite affichée sous le formulaire. 
* Un administrateur peut supprimer n'importe quel commentaire s'il le souhaite. 
* Les auteurs des articles peuvent eux aussi supprimer les commentaires. 
* Un utilisateur connecté peut modifier ou supprimer son commentaire s'il le souhaite.
* Un utilisateur non connecté peut poster un commentaire mais ne peut pas le modifier ou le supprimer.

### 2. CRUD des articles
Le CRUD est différent selon les autorisations accordées aux utilisateurs en fonction de leur rôle : 
* Un administrateur peut gérer tous les posts : il peut les lire, les éditer et les supprimer.
* Un utilisateur peut gérer tous SES posts : il peut les lire, les éditer et les supprimer.
* Seul un utilisateur authentifié peut écrire un article. 

### 3. Identification / Authentification qui protège l'accès à l’administration
Permet l'authentification et la protection de certaines parties de l’application.
* Les administrateurs peuvent gérer les utilisateurs et les posts. Pour les utilisateurs ils peuvent modifier leurs informations générales ainsi que leurs rôles, ils peuvent aussi décider de supprimer un utilisateur. Pour ce qui est des posts, cela rejoint le principe du CRUD évoqué plus haut.
* Les utilisateurs peuvent modifier leurs propres informations (nom, adresse mail et mot de passe). Ils peuvent aussi gérer le CRUD de leurs articles. 

## Auteurs
* Amély Cauchy alias [AmeyLee](https://github.com/Ameylee)
* Silvia Badoz-Griffond

