# Hackathon

Repo de l'équipe 23

## Stack Technique : 

* PHP 7.4
* MySQL
* Symfony 4.4
* Javascript

## Installation : 

1. Cloner le repo

        git clone https://github.com/12Wass/hackathon.git
        
2. Installer les dépendances

        composer install

    Cela prendra quelques minutes.

3. Créer la base de donnée

        php bin/console doctrine:database:create
        
4. Importer le fichier SQL
   
   Rendez-vous dans la base que Symfony vient de créer et importer le fichier `data.sql` qui se situe à la racine du répository
        
6. Lancer le serveur symfony à la racine

        symfony serve
        
7. Informations utiles

        Compte admin :

        Url : http://localhost:8000/connexion
        Userame : admin
        Password : test
