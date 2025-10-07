<?php
// ============================================================
// Fichier : config/config.sample.php
// Version publique à partager sur GitHub
// ============================================================
//
// Ce fichier sert d'exemple pour la configuration de connexion
// à la base de données MySQL.
//
// ⚠️ IMPORTANT :
// - Ne contient aucun identifiant réel.
// - Copier ce fichier et le renommer en config.local.php
//   pour votre environnement local avant utilisation.
//
// Exemple de copie pour votre environnement local :
// cp config/config.sample.php config/config.local.php
//
// ============================================================

return [
    // Adresse du serveur MySQL
    'host' => 'localhost',

    // Nom d'utilisateur MySQL
    'user' => 'mon_user',

    // Mot de passe MySQL
    'pass' => 'mon_password',

    // Nom de la base de données
    'db'   => 'ma_base',

    // Encodage des échanges avec MySQL
    'charset' => 'utf8mb4',
];
