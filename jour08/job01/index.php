<!--  jour08/job01
Créez une variable de session nommée “nbvisites”. A chaque fois que la page est
visitée, ajoutez 1. Aﬃcher le contenu de cette variable.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
-->

<?php
/* Objectif : Compter le nombre de visites sur une page avec une session PHP */

// Démarrer la session
session_start();

// Vérifier si le bouton "reset" a été cliqué
if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = 0; // réinitialiser le compteur
} else {
    // Si le compteur existe déjà, on l'incrémente
    if (isset($_SESSION['nbvisites'])) {
        $_SESSION['nbvisites']++;
    } else {
        // Sinon, c'est la première visite
        $_SESSION['nbvisites'] = 1;
    }
}

// Récupérer la valeur du compteur pour affichage
$visites = $_SESSION['nbvisites'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

    <title>Compteur de visites</title>

</head>
<body>
    <div class="container">
        <h1>Compteur de visites</h1>
        <p>Vous avez visité cette page <b><?= $visites ?></b> fois.</p>

        <!-- Formulaire pour réinitialiser le compteur -->
        <form method="post">
            <button type="submit" name="reset">Reset</button>
        </form>
    </div>
</body>
</html>
