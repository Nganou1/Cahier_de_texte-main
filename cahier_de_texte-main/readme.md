# Cahier de texte pour enseignants

Bienvenue dans le projet "Cahier de texte pour enseignants" ! Ce projet vise à faciliter la gestion des cours et des emplois du temps pour les enseignants en utilisant PHP. Il offre une plateforme conviviale où les enseignants peuvent ajouter leurs cours, consulter leur historique de cours et les administrateurs peuvent gérer les enseignants et visualiser les cours de tous les enseignants, triés par classe.

![Image de la page d'accueil](./assets/page_accueil.png)

## Fonctionnalités principales

Le projet "Cahier de texte pour enseignants" offre les fonctionnalités suivantes :

### Pour les enseignants
- Ajouter des cours : Les enseignants peuvent ajouter des cours en spécifiant la date, l'heure, le titre et la description du cours.
- Consulter les cours : Les enseignants peuvent consulter leur historique de cours et afficher les détails de chaque cours effectué.

### Pour les administrateurs
- Ajouter un enseignant : Les administrateurs ont la possibilité d'ajouter de nouveaux enseignants en fournissant leurs informations personnelles, telles que le nom, l'adresse e-mail et le numéro de téléphone.
- Visualiser les cours des enseignants : Les administrateurs peuvent visualiser tous les cours effectués par les enseignants, triés par classe. Cela permet une gestion efficace des cours et des emplois du temps.

## Configuration du projet

Suivez ces étapes pour configurer le projet sur votre machine locale :

1. Clonez le référentiel du projet :
    git clone <https://github.com/KamadoSama/cahier_de_texte.git>

2. Accédez au répertoire du projet :
    cd projet_web_de_class

3. Assurez-vous que vous disposez d'un serveur web local avec PHP et MySQL installés.

4. Configurez la base de données :

- Créez une base de données MySQL nommée "cahier_de_texte".
- Importez le fichier de structure de la base de données fourni dans le répertoire "database" du projet.

5. Configurez les informations de connexion à la base de données :

- Ouvrez le fichier de configuration `config.php` dans le répertoire racine du projet.
- Modifiez les valeurs des constantes suivantes en fonction de votre configuration MySQL :

  ```php
    $DB_HOST = 'localhost';
    $DB_USER = 'votre_utilisateur';
    $DB_PASSWORD = 'votre_mot_de_passe';
    $DB_NAME='nom_de_votre_bd';
  ```

6. Démarrez votre serveur web local.

7. Accédez au projet dans votre navigateur à l'adresse `http://localhost/chemin_vers_le_projet`.

## Contributions

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez suivre les étapes suivantes :

1. Fork du référentiel du projet.
2. Créez une nouvelle branche pour votre fonctionnalité ou votre correction de bogue.
3. Effectuez les modifications nécessaires et committez-les.
4. Soumettez une demande de tirage (Pull Request).

## Auteurs

- [Kamado_Sama](https://github.com/KamadoSama)- Développeur principal
