# Application de Blog
Application de blog suite a formation Symfony 4  avec [@medjalil](https://github.com/medjalil)
## Les étapes d’installation
```bash
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console assets:install public
```
# Liste des fonctionnalités
## Espace membre
-	Connexion 
-	Inscription
-	Oublié mot de passe
-	Changer mot de passe
-	Ajouter, Modifier, Supprimer et Activer/Désactiver compte utilisateur : Version Avancée
-	Gestion des Rôles (ROLE_USER, ROLE_ADMIN)
## Gestion des catégories
-	Ajouter, Modifier et Supprimer Catégorie
## Gestion des articles
-	Ajouter, Modifier, Supprimer article
## Bundles externes
```bash
composer require --dev orm-fixtures
composer require fzaninotto/faker
composer require friendsofsymfony/ckeditor-bundle
```
