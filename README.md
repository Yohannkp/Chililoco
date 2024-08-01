# Chili Loco

## Description

**Chili Loco** est une application web dédiée à la gestion efficace d'un fast-food. Développée avec le framework [Symfony](https://symfony.com), et utilisant [MySQL](https://www.mysql.com) pour la base de données, cette application a été conçue à partir de maquettes réalisées sur [Figma](https://www.figma.com). **Chili Loco** permet de gérer les plats disponibles au restaurant en offrant des fonctionnalités pour afficher, modifier et supprimer des plats.

Le développement s'est effectué sous l'éditeur de texte [VSCode](https://code.visualstudio.com), garantissant une solution complète pour la gestion quotidienne de Chili Loco.

### Fonctionnalités

- **Affichage des Plats** : Consultez la liste des plats disponibles au restaurant avec des détails précis.
- **Modification des Plats** : Modifiez les informations des plats existants pour mettre à jour les offres du restaurant.
- **Suppression des Plats** : Supprimez les plats qui ne sont plus proposés.
- **Gestion Administrateur** : Ajoutez et gérez les sous-menus pour faciliter la navigation dans l'interface admin.

### Technologies Utilisées

- **Symfony** : Framework PHP pour le développement web.
- **MySQL** : Système de gestion de base de données relationnelle.
- **Figma** : Outil de conception pour la création des maquettes.
- **VSCode** : Éditeur de texte utilisé pour le développement.

### Prérequis

Avant de commencer, assurez-vous d'avoir installé :

- [PHP](https://www.php.net/) (7.x ou 8.x recommandé)
- [Composer](https://getcomposer.org/) (pour la gestion des dépendances PHP)
- [MySQL](https://www.mysql.com/) (ou [MariaDB](https://mariadb.org/) comme alternative)
- [Symfony CLI](https://symfony.com/download) (pour les commandes Symfony)

Créer une Base de Données :

Ouvrez phpMyAdmin depuis le panneau de contrôle XAMPP.
Créez une nouvelle base de données pour votre application.
Configurer les Paramètres de Connexion :

Copiez le fichier .env.example en .env :
bash
Copier le code
cp .env.example .env
Modifiez le fichier .env pour configurer les paramètres de connexion à la base de données en fonction de votre configuration XAMPP. Assurez-vous que la ligne suivante est correctement définie :
dotenv
Copier le code
DATABASE_URL=mysql://root:@127.0.0.1:3306/nom_de_votre_base_de_donnees
4. Installer les Dépendances
Installez les dépendances PHP avec Composer :

bash
Copier le code
composer install
5. Appliquer les Migrations
Créez les tables de la base de données en appliquant les migrations :

bash
Copier le code
php bin/console doctrine:migrations:migrate
6. Démarrer le Serveur Symfony
Vous pouvez utiliser le serveur de développement intégré de Symfony pour exécuter l'application localement :

bash
Copier le code
php bin/console server:run
Accédez ensuite à l'application à l'adresse http://localhost:8000.

Tests
Pour exécuter les tests de l'application, utilisez la commande suivante :

bash
Copier le code
php bin/console test
Contribuer
Les contributions sont les bienvenues ! Pour participer :

Forker le Dépôt.
Créer une Branche pour votre fonctionnalité ou correction :
bash
Copier le code
git checkout -b feature/nom-de-votre-fonctionnalité
![CHEESE!](acceuil.png).
![CHEESE!](image1.png).
![CHEESE!](image2.png).
![CHEESE!](image3.png).
![CHEESE!](image4.png).
![CHEESE!](image5.png).
![CHEESE!](image6.png).
