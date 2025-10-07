<?php
// ===========================
// FICHIER : connexion.php
// ===========================
// Rôle : Permet à un utilisateur de se connecter
// Redirige vers admin.php si l'utilisateur est 'admin'
// Redirige vers profil.php sinon
// ===========================

session_start(); // Démarrage de la session pour stocker les infos utilisateur
require_once __DIR__ . '/config/includes/db.php'; // Connexion PDO

$errors = [];

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    // Contrôles basiques
    if (empty($login) || empty($password)) {
        $errors[] = "Veuillez remplir tous les champs.";
    }

    if (empty($errors)) {
        // Vérification du login dans la base
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Stockage des informations en session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'login' => $user['login'],
                'prenom' => $user['prenom'],
                'nom' => $user['nom']
            ];

            // Redirection selon le rôle
            if ($user['login'] === 'admin') {
                header('Location: admin.php');
                exit;
            } else {
                header('Location: profil.php');
                exit;
            }
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

    <!-- Affichage des messages d'erreur -->
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

    <p>
        <a href="inscription.php">Créer un compte</a> |
        <a href="index.php">Retour à l'accueil</a>
    </p>

</body>

</html>