<!--  jour04/job05
Faire un formulaire de connexion de type POST (se demander, pourquoi pas GET ?)
ayant deux champs <input> nommés username et password.
Après validation du formulaire :
- si le username est “John” ET le password est “Rambo” aﬃcher :
“C’est pas ma guerre”
- sinon aﬃcher : “Votre pire cauchemar”.
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Job 05</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Résultat de la connexion</h1>

    <?php
    // =========================================
    // FORMULAIRE DE CONNEXION
    // =========================================
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Récupération des données
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Vérification des champs vides
        if (trim($username) === '' || trim($password) === '') {
            echo '<div class="resultat erreur">';
            echo '<h2>⚠ Champs manquants</h2>';
            echo '<p>Veuillez remplir les deux champs du formulaire.</p>';
            echo '</div>';
        } else {
            // Vérification des identifiants
            if ($username === 'John' && $password === 'Rambo') {
                echo '<div class="resultat succes">';
                echo '<p>✓ C’est pas ma guerre</p>';
                echo '</div>';
            } else {
                echo '<div class="resultat erreur">';
                echo '<p>✖ Votre pire cauchemar</p>';
                echo '</div>';
            }
        }

    } else {
        echo '<p>Merci de remplir le formulaire <a href="formulaire_login.html">ici</a>.</p>';
    }
    ?>

    <div class="actions">
        <a href="formulaire_login.html" class="bouton-retour">← Retour au formulaire</a>
    </div>
</div>

</body>
</html>
