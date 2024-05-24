
# Blog-AFPA-ECF4

Réalisation d'un Blog en suivant les instructions d'une cliente.



## Features

- Php
- HTML
- CSS
- MySQL

## Authors

- [@Antoine](https://github.com/AntoineTrabach) - Backend developper
- [@Loïc](https://github.com/Dev-Relax) - Lead dev
- [@Rémy](https://github.com/remy-delpech) - Frontend developper & SCRUM Master
- [@Vincent](https://github.com/PurpleFoetus) - Frontend developper
- [@Nantenaina](https://github.com/Nante20) - Backend developper


## Database Variables

Pour lancer ce projet vous devrez modifier le fichier `db.php`

`$servername` = "localhost"

`$username` = utilisateur de la base de donnée

`$password` = password de la base de donnée (laisser vide s'il n'y a aucun)

`$database` = nom de la base de donnée


## Structure du projet

```bash
|- index.php // fichier principal - Router
|- .htaccess // configuration du serveur Apache
|- assets 
|---- css // stockage des styles css
|---- js // stockages des scripts js
|- src
|---- partials // dossier des partials
|---- template // dossier des templates des différentes pages
|---- model // dossier des API
```
    
## Lessons Learned

Nous avons établi un Routeur à la racine de notre projet afin de servir rapidement et de façon sécurisé les différentes pages.

Nous avons pu créer la base de données relationnelles et créer une API qui exploite ses données.

Nous avons décidé d'ajouter un formulaire d'inscription / déconnexion afin de pouvoir lier chaque articles, et chaque commentaires, à un utilisateur précis.

L'utilisateur connecté est tracké grâce à l'utilisation de la variable globale `$_SESSION`.



