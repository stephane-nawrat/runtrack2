<?php
// index.php
// Page d'accueil minimale du module connexion
// Charge la config locale si elle existe, sinon la config sample
if (file_exists(__DIR__ . '/config/config.local.php')) {
    $config = require __DIR__ . '/config/config.local.php';
} else {
    $config = require __DIR__ . '/config/config.sample.php';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Module Connexion</title>
</head>

<body>
    <header>
        <h1>Module Connexion</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="inscription.php">Inscription</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p>Bienvenue. <br> Ce module permet d'apprendre et pratiquer : SQL, PHP, HTML et CSS.</p>
        <p>Avant d'utiliser les formulaires :</p>
        <ol>
            <li>Importer <code>moduleconnexion.sql</code> via phpMyAdmin.</li>
            <li>Copier <code>config/config.sample.php</code> en <code>config/config.local.php</code> et adapter les identifiants.</li>
        </ol>
    </main>

    <footer>
        <p>Module Connexion - 2025.</p>
    </footer>
</body>

</html>