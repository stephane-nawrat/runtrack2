<?php
// ===========================
// FICHIER : db.php
// ===========================
// Rôle : Initialise la connexion à la base de données via PDO
// Usage : require_once 'config/includes/db.php'
// ===========================

// On charge la configuration locale (à ne pas committer sur GitHub)
$config = require __DIR__ . '/../config.local.php';

try {
    // Création de l'objet PDO
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}",
        $config['user'],
        $config['pass']
    );

    // Options PDO pour faciliter le debug et le développement
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Affiche les erreurs SQL
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Retourne les résultats en tableau associatif

} catch (PDOException $e) {
    // Arrêt du script en cas de problème de connexion
    die("❌ Erreur de connexion à la base de données : " . $e->getMessage());
}

// Maintenant $pdo peut être utilisé partout dans le projet
