<!--  jour08/job03
Créez un formulaire qui contient un input de type de text nommé “prenom” et un bouton submit. Lorsque l’on valide le formulaire, le prénom est ajouté dans une variable de session. Aﬃcher l’ensemble des prénoms.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser la liste.
-->

<?php
// Démarrer la session
session_start();

// Si le bouton reset est cliqué
if (isset($_POST['reset'])) {
   unset($_SESSION['prenoms']); // on vide la liste
}

// Si le formulaire est soumis
if (isset($_POST['prenom']) && !empty($_POST['prenom'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    if (!isset($_SESSION['prenoms'])) {
        $_SESSION['prenoms']= [];
    }
    $_SESSION['prenoms'][] = $prenom;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des prénoms</title>
</head>
<body>

    <div class="container">
        <h1>Liste des prénoms</h1>

        <?php if (!empty($_SESSION['prenoms'])): ?>
            <p>Prénoms enregistrés :</p>
            <ul>
                <?php foreach ($_SESSION['prenoms'] as $p): ?>
                    <li><?= $p ?></li>
                <?php endforeach; ?>
            </ul>

            <?php else: ?>
                <p>Aucun prénom enregistré pour le moment.</p>
            <?php endif; ?>

            <form method="post">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez un prénom">
                <button type="submit">Ajouter</button>
                <button type="submit" name="reset">Reset</button>
            </form>

    </div>
</body>
</html>