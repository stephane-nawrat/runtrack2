<?php
// ===========================
// FICHIER : profil.php
// ===========================
// Rôle : Permet à un utilisateur connecté de modifier son profil
// Connexion à la BDD via PDO et gestion des sessions
// ===========================

session_start();
require_once __DIR__ . '/config/includes/db.php';
// Connexion PDO

// === Vérifier si l'utilisateur est connecté ===
if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit;
}

// === Récupérer les infos de l'utilisateur ===
$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT login, prenom, nom FROM utilisateurs WHERE id = :id");
$stmt->execute([':id' => $user_id]);
$user = $stmt->fetch();

if (!$user) {
    die("Utilisateur introuvable !");
}

$errors = [];
$success = "";

// === Traitement du formulaire ===
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);

    // Vérifications simples
    if (empty($login) || empty($prenom) || empty($nom)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            UPDATE utilisateurs
            SET login = :login, prenom = :prenom, nom = :nom
            WHERE id = :id
        ");
        $stmt->execute([
            ':login' => $login,
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':id' => $user_id
        ]);
        $success = "Profil mis à jour avec succès !";
        // Mettre à jour les infos pour réafficher le formulaire
        $user['login'] = $login;
        $user['prenom'] = $prenom;
        $user['nom'] = $nom;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
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
        <label>Login : <input type="text" name="login" value="<?= htmlspecialchars($user['login']) ?>"></label><br>
        <label>Prénom : <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>"></label><br>
        <label>Nom : <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>"></label><br>
        <button type="submit">Mettre à jour</button>
    </form>

    <p><a href="index.php">Retour à l'accueil</a></p>

</body>

</html>