-- Création de la base et de la table utilisateurs
CREATE DATABASE IF NOT EXISTS runtrack2_moduleconnexion CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE runtrack2_moduleconnexion;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    nom VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de l'utilisateur admin
INSERT INTO utilisateurs (login, prenom, nom, password)
VALUES ('admin', 'admin', 'admin', 'admin');
