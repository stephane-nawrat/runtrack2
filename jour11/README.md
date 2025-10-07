# Module Connexion — Jour 11

## Description du projet
Ce projet a pour objectif de créer un **module de connexion** simple en PHP et MySQL.  
Il permet aux utilisateurs de :
- Créer un compte
- Se connecter
- Modifier leur profil
- Pour l’administrateur `admin`, consulter l’ensemble des utilisateurs

Ce projet est **pédagogique** et conçu pour l’apprentissage de :
- SQL / MySQL
- PHP (PDO, sessions)
- HTML / CSS minimaliste et lisible
- Git (commits atomiques et ciblés)

---

## Structure des fichiers

jour11/
├── index.php # Page d'accueil
├── inscription.php # Formulaire d'inscription
├── connexion.php # Formulaire de connexion
├── profil.php # Modification du profil
├── admin.php # Page d'administration pour l'utilisateur 'admin'
├── README.md # Ce fichier
└── config/
├── config.local.php # Configuration locale réelle (NE PAS committer)
└── config.sample.php # Configuration publique à partager


## Installation rapide (local)

1. Importer la base de données `moduleconnexion.sql` via phpMyAdmin.  
   > Cette base contient la table `utilisateurs` et l'utilisateur `admin`.

2. Copier le fichier de configuration publique pour créer votre configuration locale :
    > config/config.sample.php config/config.local.php```


## Modifier config/config.local.php avec vos identifiants MySQL.

1. Lancer un serveur PHP depuis le dossier racine du projet :
php -S localhost:8000

2. Ouvrir la page d'accueil dans votre navigateur :
http://localhost:8000/jour11/index.php

___

