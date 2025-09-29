<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau POST - Job 04</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Résultat : Tableau des arguments POST</h1>

    <?php
    // =========================================
    // JOB 04 - AFFICHAGE DES ARGUMENTS POST
    // =========================================
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Vérifier si au moins un champ est rempli
        $champsRemplis = false;
        foreach ($_POST as $valeur) {
            if (trim($valeur) !== "") {
                $champsRemplis = true;
                break;
            }
        }

        if ($champsRemplis) {
            echo '<table>';
            echo '<thead><tr><th>Argument</th><th>Valeur</th></tr></thead>';
            echo '<tbody>';

            foreach ($_POST as $champ => $valeur) {
                if (trim($valeur) !== "") {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($champ) . '</td>';
                    echo '<td>' . htmlspecialchars($valeur) . '</td>';
                    echo '</tr>';
                }
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<div class="resultat erreur">';
            echo '<h2>⚠ Aucun champ rempli</h2>';
            echo '<p>Vous n\'avez rempli aucun champ du formulaire.</p>';
            echo '</div>';
        }

    } else {
        echo '<p>Merci de remplir le formulaire <a href="formulaire_post.html">ici</a>.</p>';
    }
    ?>

    <div class="actions">
        <a href="formulaire_post.html" class="bouton-retour">← Retour au formulaire</a>
    </div>
</div>

<!-- =========================================
     EXPLICATIONS PÉDAGOGIQUES
     ========================================= -->
<div class="container" style="margin-top:30px; background:#fafafa;">
    <h2>📚 Comprendre l’algorithme POST - Job 04</h2>

    <h3>1. $_POST</h3>
    <p>
        <code>$_POST</code> contient toutes les données envoyées par le formulaire via POST.
    </p>

    <h3>2. Parcours des arguments</h3>
    <p>
        On parcourt chaque argument avec <code>foreach</code> et on ignore ceux qui sont vides.
    </p>

    <h3>3. htmlspecialchars()</h3>
    <p>
        Protège l’affichage HTML en transformant les caractères spéciaux pour éviter des problèmes de sécurité.
    </p>

    <h3>4. Tableau HTML</h3>
    <p>
        Chaque ligne contient l’argument et sa valeur.  
        Les colonnes sont <strong>Argument</strong> et <strong>Valeur</strong>.
    </p>

    <h3>5. Résumé</h3>
    <p style="background:white; padding:10px; border-left:3px solid #333;">
        L’algorithme parcourt $_POST, ignore les champs vides et affiche un tableau clair et sécurisé.
    </p>
</div>

</body>
</html>
