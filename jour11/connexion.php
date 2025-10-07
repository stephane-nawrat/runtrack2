<?php
// ===========================
// FICHIER : connexion.php
// ===========================
// Rôle : Permet à un utilisateur de se connecter
// Redirige vers admin.php si login = admin, sinon vers profil.php
// ===========================

session_start();
require_once __DIR__ . '/config/includes/db.php'; // chemin correct vers db.php

$errors = [];
$success = "";

// ⚡ Récupération du message de succès depuis la session
if (!empty($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']); // Supprimer le message après affichage
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    if (empty($login) || empty($password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    } else {
        // Vérifier l'utilisateur en base
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Stocker les infos de l'utilisateur dans la session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom']
            ];

            // Redirection selon le rôle
            if ($user['login'] === 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: profil.php');
            }
            exit;
        } else {
            $errors[] = "Login ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>

    <!-- Affichage du message de succès après inscription -->
    <?php if ($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <!-- Affichage des erreurs -->
    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <!-- Formulaire de connexion -->
    <form method="post" action="">
        <label>Login : <input type="text" name="login" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <button type="submit">Se connecter</button>
    </form>

    <p><a href="inscription.php">Créer un compte</a></p>
    <p><a href="index.php">Retour à l'accueil</a></p>
</body>

</html>