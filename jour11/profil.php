<?php
// ===========================
// FICHIER : profil.php
// ===========================
// Rôle : Permet à un utilisateur de voir et modifier son profil
// ===========================

session_start();
require_once __DIR__ . '/config/includes/db.php';


// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: connexion.php');
    exit;
}

$user = $_SESSION['user']; // infos depuis la session
$errors = [];
$success = "";

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);

    if (empty($login) || empty($prenom) || empty($nom)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    if (empty($errors)) {
        // Mise à jour dans la base
        $stmt = $pdo->prepare("
            UPDATE utilisateurs 
            SET login = :login, prenom = :prenom, nom = :nom
            WHERE id = :id
        ");
        $stmt->execute([
            ':login' => $login,
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':id' => $user['id']
        ]);

        // Mettre à jour la session
        $_SESSION['user']['login'] = $login;
        $_SESSION['user']['prenom'] = $prenom;
        $_SESSION['user']['nom'] = $nom;

        $success = "Profil mis à jour avec succès !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
</head>

<body>
    <h1>Mon profil</h1>

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

    <form method="post" action="">
        <label>Login : <input type="text" name="login" value="<?= htmlspecialchars($user['login']) ?>" required></label><br>
        <label>Prénom : <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required></label><br>
        <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required></label><br>
        <button type="submit">Mettre à jour</button>
    </form>

    <p><a href="index.php">Retour à l'accueil</a></p>
</body>

</html>