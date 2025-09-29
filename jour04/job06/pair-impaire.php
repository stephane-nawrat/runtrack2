<!--  jour04/job06
Faire un formulaire de type GET avec un champ <input> text nommé “nombre” et un
bouton submit.
Après validation du formulaire :
- si la valeur entrée est un nombre pair, aﬃcher “Nombre pair”,
- si c’est un nombre impair, aﬃcher “Nombre impair”.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat Pair/Impair</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Résultat : Nombre pair ou impair</h1>

    <?php
    // =========================================
    // JOB 06 - PAIR / IMPAIR
    // =========================================

    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];

        // Vérifier que l'entrée est un nombre
        if (!is_numeric($nombre)) {
            echo '<div class="resultat erreur">';
            echo '<p>⚠ Veuillez entrer un nombre valide.</p>';
            echo '</div>';
        } else {
            $nombre = (int)$nombre;

            if ($nombre % 2 === 0) {
                echo '<div class="resultat succes">';
                echo '<p>✓ Nombre pair</p>';
                echo '</div>';
            } else {
                echo '<div class="resultat erreur">';
                echo '<p>✖ Nombre impair</p>';
                echo '</div>';
            }
        }
    } else {
        echo '<p>Merci de remplir le formulaire <a href="formulaire.html">ici</a>.</p>';
    }
    ?>

    <div class="actions">
        <a href="formulaire.html" class="bouton-retour">← Retour au formulaire</a>
    </div>
</div>

<!-- =========================================
     EXPLICATIONS PÉDAGOGIQUES
     ========================================= -->
<div class="container" style="margin-top:30px; background:#fafafa;">
    <h2>📚 Comprendre l’algorithme Pair/Impair</h2>

    <h3>1. $_GET</h3>
    <p>
        <code>$_GET</code> contient les données envoyées via la méthode GET.  
        Les valeurs sont visibles dans l’URL.
    </p>

    <h3>2. Vérification</h3>
    <p>
        <code>is_numeric()</code> permet de vérifier que la valeur est bien un nombre.
    </p>

    <h3>3. Modulo (%)</h3>
    <p>
        L’opérateur <code>%</code> permet de savoir si un nombre est pair (reste 0) ou impair (reste 1).
    </p>

    <h3>4. Affichage conditionnel</h3>
    <p>
        Affiche un message vert pour pair et rouge pour impair.
    </p>

    <h3>5. Résumé</h3>
    <p style="background:white; padding:10px; border-left:3px solid #333;">
        L’algorithme récupère la valeur via GET, vérifie qu’il s’agit d’un nombre,  
        puis affiche si le nombre est pair ou impair.
    </p>
</div>

</body>
</html>


