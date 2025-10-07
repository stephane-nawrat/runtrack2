<?php
// ===========================
// FICHIER : connexion.php
// ===========================
// Rôle : Permet à un utilisateur de se connecter
// Connexion à la BDD via le fichier db.php
// Gestion des sessions pour garder l'utilisateur connecté
// ===========================

session_start(); // Démarrage de la session

require_once __DIR__ . '/config/includes/db.php'; // Connexion PDO

$errors = [];
$success = "";

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = $_POST['password'];

    // === Contrôles de validation basiques ===
    if (empty($login) || empty($password)) {
        $errors[] = "Veuillez remplir tous les champs.";
    } else {
        // Récupérer l'utilisateur correspondant au login
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login");
        $stmt->execute([':login' => $login]);
        $user = $stmt->fetch();

        if ($user) {
            // Vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                // Connexion réussie : stocker les informations en session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_login'] = $user['login'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['user_nom'] = $user['nom'];

                $success = "Connexion réussie ! Bienvenue, " . htmlspecialchars($user['prenom']) . ".";
                // Redirection possible vers profil.php ou page d'accueil
                header('Location: profil.php');
                exit;
            } else {
                $errors[] = "Mot de passe incorrect.";
            }
        } else {
            $errors[] = "Utilisateur non trouvé.";
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

    <!-- Affichage des messages -->
    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($success): ?>
        <p style="color:green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <!-- Formulaire de connexion -->
    <form method="post" action="">
        <label>Login : <input type="text" name="login" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <button type="submit">Se connecter</button>
    </form>

    <p><a href="inscription.php">Créer un compte</a></p>

</body>

</html>