<?php
// ===========================
// FICHIER : inscription.php
// ===========================
// Rôle : Permet à un utilisateur de créer un compte
// Connexion à la BDD via PDO
// ===========================

session_start(); // nécessaire pour utiliser les sessions
require_once __DIR__ . '/config/includes/db.php'; // chemin correct vers db.php

$errors = [];

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = $_POST['password'];
    $confirm = $_POST['password_confirm'];

    // === Contrôles de validation basiques ===
    if (empty($login) || empty($prenom) || empty($nom) || empty($password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    if ($password !== $confirm) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // === Si pas d’erreur, on insère dans la base ===
    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            INSERT INTO utilisateurs (login, prenom, nom, password)
            VALUES (:login, :prenom, :nom, :password)
        ");

        $stmt->execute([
            ':login' => $login,
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':password' => $hash
        ]);

        // ⚡ Stockage du message de succès en session
        $_SESSION['success'] = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";

        // Redirection vers la page connexion
        header('Location: connexion.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Inscription</title>
</head>

<body>

    <h1>Créer un compte</h1>

    <!-- Affichage des erreurs -->
    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <form method="post" action="">
        <label>Login : <input type="text" name="login" required></label><br>
        <label>Prénom : <input type="text" name="prenom" required></label><br>
        <label>Nom : <input type="text" name="nom" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <label>Confirmation : <input type="password" name="password_confirm" required></label><br>
        <button type="submit">S'inscrire</button>
    </form>

</body>

</html>