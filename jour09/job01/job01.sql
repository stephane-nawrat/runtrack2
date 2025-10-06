-- Créer la base de données
CREATE DATABASE jour09;

-- Sélectionner la base
USE jour09;

-- Table etudiants
CREATE TABLE etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(255),
    nom VARCHAR(255),
    naissance DATE,
    sexe VARCHAR(25),
    email VARCHAR(255)
);

-- Table etage
CREATE TABLE etage (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    numero INT,
    superficie INT
);

-- Table salles
CREATE TABLE salles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    id_etage INT,
    capacite INT
);