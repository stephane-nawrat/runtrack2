<!--  jour08/job02
Créez un cookie nommé “nbvisites”. A chaque fois que la page est visitée, ajoutez 1. Aﬃcher le contenu du cookie.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
-->

<?php
/* Objectif : Compter le nombre de visites via un cookie */

// Nom du cookie
$nomCookie = "nbvisites";

// Durée du cookie (30 jours)
$dureeCookie = time() + 30*24*60*60;

// RESET : si le bouton a été cliqué
if (isset($_POST['reset'])) {
    setcookie($nomCookie, '', time() - 3600); // supprimer le cookie
    $nbvisites = 0;
} else {
    // Si le cookie existe déjà, on incrémente
    if (isset($_COOKIE[$nomCookie])) {
        $nbvisites = $_COOKIE[$nomCookie] + 1;
    } else {
        $nbvisites = 1; // première visite
    }

    // Écrire / mettre à jour le cookie
    setcookie($nomCookie, $nbvisites, $dureeCookie);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Compteur de visites (Cookie)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Compteur de visites</h1>
        <p>Nombre de visites : <b><?= $nbvisites ?></b></p>

        <form method="post">
            <button type="submit" name="reset">Reset</button>
        </form>
    </div>
</body>
</html>

