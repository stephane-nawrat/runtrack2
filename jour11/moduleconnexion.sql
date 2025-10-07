-- MODULE CONNEXION - Structure de la base de données

-- Suppression préalable si elle existe déjà
DROP DATABASE IF EXISTS runtrack2_moduleconnexion;

-- Création de la base
CREATE DATABASE runtrack2_moduleconnexion CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Utilisation de la base
USE runtrack2_moduleconnexion;

-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL UNIQUE,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insertion du compte administrateur
INSERT INTO utilisateurs (login, prenom, nom, password)
VALUES ('admin', 'admin', 'admin', 'admin');
