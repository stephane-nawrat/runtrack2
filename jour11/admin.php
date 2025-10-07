<?php
// ===========================
// FICHIER : admin.php
// ===========================
// Rôle : page d'administration, accessible uniquement à l'utilisateur 'admin'
// Affiche tous les utilisateurs de la base
// ===========================

session_start(); // Gestion des sessions

require_once __DIR__ . '/config/includes/db.php';
// Connexion PDO

// === Vérification connexion ===
if (!isset($_SESSION['user']) || $_SESSION['user']['login'] !== 'admin') {
    // Redirection si pas admin
    header('Location: connexion.php');
    exit;
}

// Récupération de tous les utilisateurs
$stmt = $pdo->query("SELECT id, login, prenom, nom FROM utilisateurs ORDER BY id ASC");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Administration</title>
</head>

<body>

    <h1>Page d'administration</h1>
    <p>Bienvenue, <?= htmlspecialchars($_SESSION['user']['login']) ?> !</p>

    <h2>Liste des utilisateurs :</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Prénom</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= htmlspecialchars($u['id']) ?></td>
                    <td><?= htmlspecialchars($u['login']) ?></td>
                    <td><?= htmlspecialchars($u['prenom']) ?></td>
                    <td><?= htmlspecialchars($u['nom']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="index.php">Retour à l'accueil</a></p>

</body>

</html>