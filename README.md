#  Système de gestion dématérialisée des appels d'offres

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## A propos 

La passation des **marchés publics** par les organismes de l’Etat permet aux gouvernements d’assurer les services publics tout en répondant à leurs besoins à travers des appels d’offres.


Malgré l’essor que connaissent les technologies de l’information et de la communication au Bénin, nous constatons que les entreprises éprouvent des difficultés à retirer physiquement les dossiers d’appel
d’offres au niveau des secrétariats des structures étatiques et organisations concernées. Nous notons également la difficulté des entreprises à joindre rapidement la structure commanditaire d’un marché
afin de lui poser des préoccupations relatives au marché dont il est question. Aussi, la soumission des offres par les entreprises et leur évaluation par les équipes spécialisées des structures contractantes se
fait manuellement.Tout ceci rend le processus qui conduit à l’attribution du marché lent.  

Nous avons proposé dans ce projet, la mise en place d’une plateforme web permettant de faire le retrait numérique du dossier d’appel d’offres, la soumission et l’évaluation des offres.Notre plateforme permet
de digitaliser le processus d’attribution des marchés publics et de réduire la durée de celui-ci. 

## Fonctionnalités

* Retrait numérique du dossier d’appels d’offres
* Soumission des offres 
* Planification de reunion d'ouverture 
* Ouverture en ligne des offres
* Evaluation des offres 

> Le document complet de mémoire est disponible à l'adresse : [`https://www.overleaf.com/read/nygdnjhnbbtm`](https://www.overleaf.com/read/nygdnjhnbbtm)

## Configuration

| Outils | Versions |
| :-----:| :-------:|
| [Framework Laravel](https://laravel.com/docs/8.x/installation) | `v8.83.18`|
| [Base de donnees MariaDB](https://mariadb.org/documentation/) | `v10` |
| [Framework css Bootstrap](https://getbootstrap.com/docs/5.0/getting-started/introduction/) | `v5.0.1` |

## Environnement Docker 

<p align="center">
<a href="https://www.docker.com/"><img src="https://www.docker.com/wp-content/uploads/2022/03/horizontal-logo-monochromatic-white.png.webp" width="20%" alt="docker official site"></a>

</p>

Notre projet peut etre executer dans un environnement docker. Nous avons realise un tutoriel pour le faire 

### Clonage du projet 

1. **Cloner le projet sur le referentiel github**

 ``` 
 git clone https://github.com/GangloUlrich/dematerialisation-appels-d-offres.git 
 ```
 
2. **cd le dossier du projet sur votre machine**

Vous devrez être à l'intérieur du dossier du projet pour entrer toutes les autres commandes

```
cd dematerialisation-appels-d-offres/ 
```

3. **fichier de configuration .env**

Creer un nouveau fichier `.env` et copier dedans les informations du fichier `.env.example`

````
cp .env .env.example

````

4. **Installer les dépendances composer du projet**

>[`Composer`](https://getcomposer.org/) est le gestionnaire de dépendances `PHP`

La liste des dépendances nécessaire pour démarrer le projet son répertorié dans le fichier `composer.json`

````
composer install
````


5. **Générez une clé de chiffrement d'application**

L'application utilisera cette clé de cryptage pour coder divers éléments de votre application, des cookies aux hachages de mots de passe, etc.

````
  php artisan key:generate 
````

### Docker

L'éxécution des commandes docker nécessite l'installation de docker sur votre machine.

Installer docker à partir de la [documentation](https://docs.docker.com/).

Laravel fournit un package pour l'éxécution des commandes docker plus facilement [`Laravel Sail`](https://laravel.com/docs/8.x/sail)

Le fichier `docker-compose.yml` se trouve à la racine de notre projet.

1. **Creer un alias Bash** 

````
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
````

2. **Demarrage des services** 

Nous avons comme service mariaDB et le projet Laravel 

````
sail up -d 
````

Une fois les conteneurs de l'application démarrés, vous pouvez accéder au projet dans votre navigateur Web à l' adresse : [`http://localhost`](http://localhost).

3. **Lancer les migrations de la base de données**

````
sail php artisan migrate
````

4. **Commande pour arrêter les conteneurs** 


Pour arrêter tous les conteneurs, vous pouvez simplement appuyer sur `Ctrl + C` pour arrêter l'exécution du conteneur. Ou, si les conteneurs s'exécutent en arrière-plan, vous pouvez utiliser la `stop` commande :

```` 
sail stop
````
## Licence MIT

