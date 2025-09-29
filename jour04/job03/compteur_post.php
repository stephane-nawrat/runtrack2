<!--  jour04/job03
Développez un algorithme qui aﬃche le nombre d’arguments $_POST.
Pour tester votre code, créez un formulaire html <form> de type POST avec différents
champs <input> de type “text” et un <input> de type“submit” pour l’envoi.
Vous pouvez ensuite aﬃcher avec echo directement dans votre page par exemple :
“Le nombre d’argument POST envoyé est : “
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat POST</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Résultat : Compteur d'arguments POST</h1>
        
        <?php
        // =========================================
        // ALGORITHME POST
        // =========================================
        // Objectif : Afficher le nombre de champs
        // envoyés via la méthode POST.
        // Seuls les champs remplis sont comptés.
        // =========================================
        
        // Étape 1 : Créer un tableau pour les champs remplis
        $donnees = [];

        if (isset($_POST)) {
            // Parcourir $_POST
            foreach ($_POST as $champ => $valeur) {
                if ($valeur !== "") { // garder uniquement les champs non vides
                    $donnees[$champ] = $valeur;
                }
            }
        }

        // Étape 2 : Compter le nombre de champs remplis
        $nombre_arguments = 0;
        foreach ($donnees as $champ => $valeur) {
            $nombre_arguments = $nombre_arguments + 1;
        }

        // Étape 3 : Affichage
        if ($nombre_arguments > 0) {
            echo '<div class="resultat succes">';
            echo '<h2>✓ Résultat</h2>';
            echo '<p>Le nombre d\'arguments POST envoyé est : <strong>' . $nombre_arguments . '</strong></p>';
            echo '</div>';
        } else {
            echo '<div class="resultat erreur">';
            echo '<h2>⚠ Aucun champ rempli</h2>';
            echo '<p>Vous n\'avez rempli aucun champ du formulaire.</p>';
            echo '</div>';
        }
        ?>
        
        <div class="actions" style="margin-top:20px;">
            <a href="formulaire_post.html" class="bouton-retour">← Retour au formulaire</a>
        </div>
        
    </div>
    
    <!-- =========================================
         EXPLICATIONS PÉDAGOGIQUES
         ========================================= -->
    <div class="container" style="margin-top:30px; background:#fafafa;">
        
        <h2>📚 Comprendre l’algorithme POST</h2>
        
        <h3>1. $_POST</h3>
        <p>
            <code>$_POST</code> est un <strong>tableau associatif</strong> contenant les données envoyées par le formulaire via la méthode POST.
        </p>
        
        <h3>2. Filtrage des champs vides</h3>
        <p>
            Même si un champ existe dans $_POST, il peut être vide.  
            On ne le compte que si une valeur a été saisie.
        </p>
        
        <h3>3. Compteur manuel</h3>
        <p>
            Comme l’usage de <code>count()</code> est interdit, on incrémente une variable `$nombre_arguments` à chaque champ rempli.
        </p>
        
        <h3>4. Affichage conditionnel</h3>
        <p>
            Si au moins un champ est rempli → afficher le nombre d’arguments POST.  
            Sinon → message « Aucun champ rempli ».
        </p>
        
        <h3>5. Résumé</h3>
        <p style="background:white; padding:10px; border-left:3px solid #333;">
            L’algorithme parcourt $_POST, compte les champs remplis un par un,  
            et affiche le nombre d’arguments POST envoyés.  
            Les champs vides ne sont pas comptés.
        </p>
        
    </div>
    
</body>
</html>
