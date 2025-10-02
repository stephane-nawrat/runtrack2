<!--  jour08/job04
Créez un formulaire de connexion qui contient un input de type de text nommé “prenom” et un bouton submit nommé “connexion”. Lorsque l’on valide le formulaire, le prénom est ajouté dans un cookie. Si un utilisateur a déjà entré son prénom, n'aﬃchez plus le formulaire de connexion. A la place, écrivez “Bonjour prenom !” et ajouter un bouton “Déconnexion” nommé “deco”. Lorsque l’utilisateur se déconnecte, il faut à nouveau aﬃcher le formulaire de connexion.
-->

<?php
/** Objectif pédagogique :
    * - Comprendre les cookies en PHP
    * - Gérer la connexion / déconnexion avec un cookie */

// 1. Vérification des actions

// Si l'utilisateur clique sur le bouton "déconnexion"
if (isset($_POST['deco'])) {
    // Supprimer le cookie en le réinitialisant à une date passée
    setcookie('prenom', '', time() - 3600);
    // Rafraîchir la page pour que le formulaire réapparaisse
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Si l'utilisateur clique sur le bouton "connexion"
if (isset($_POST['connexion']) && !empty($_POST['prenom'])) {
    // Récupérer le prénom et sécuriser l'affichage
    $prenom = htmlspecialchars($_POST['prenom']);
    // Créer le cookie avec une durée de vie de 1 jour (86400 secondes)
    setcookie('prenom', $prenom, time() + 86400);
    // Rafraîchir la page pour afficher le message de bienvenue
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// 2. Vérification si cookie existe

// Si le cookie "prenom" existe, on récupère sa valeur
$prenomCookie = $_COOKIE['prenom'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion par cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulaire de connexion</h1>

        <?php if ($prenomCookie): ?>
            <!-- Affichage du message de bienvenue si cookie existant -->
            <p>Bonjour <b><?= $prenomCookie ?></b> !</p>

            <!-- Bouton pour déconnexion -->
            <form method="post">
                <button type="submit" name="deco">Déconnexion</button>
            </form>
        <?php else: ?>
            <!-- Formulaire de connexion si pas de cookie -->
            <form method="post">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
                <button type="submit" name="connexion">Connexion</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
