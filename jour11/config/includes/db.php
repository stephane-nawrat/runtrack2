<?php
// =======================================
// FICHIER : includes/db.php
// =======================================
// Rôle : établir une connexion PDO réutilisable
// Utilise la configuration locale (non versionnée)
// =======================================

// On remonte d’un dossier pour accéder à config/
$config = require __DIR__ . '/../config/config.local.php';

try {
    // Initialisation de la connexion PDO
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
        $config['user'],
        $config['pass']
    );

    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // remonte les erreurs proprement
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // fetch associatif par défaut

} catch (PDOException $e) {
    // Message d’erreur explicite (utile en phase de dev)
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}

// Le fichier ne retourne rien :
// $pdo devient simplement accessible dans les scripts qui l’incluent
