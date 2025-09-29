<!--  jour04/job02
Développer un algorithme qui aﬃche dans un tableau HTML <table> l’ensemble des
arguments $_GET et les valeurs associées.
Il doit y avoir deux colonnes : argument et valeur.
Pour tester votre code, créez un formulaire html <form> de type GET avec différents
champs <input> de type “text” et un <input> de type“submit” pour l’envoi.
Vous pouvez ensuite aﬃcher avec echo directement dans votre page avec un
tableau.
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat - Tableau des arguments GET</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Résultat : Tableau des arguments GET</h1>
        
        <?php
        // =========================================
        // ALGORITHME
        // =========================================
        // Objectif : Afficher un tableau HTML contenant
        // chaque argument envoyé (clé) et sa valeur.
        // Les champs vides ne doivent pas être affichés.
        // =========================================
        
        // Étape 1 : Créer un tableau pour stocker les champs remplis
        $donnees = [];

        if (isset($_GET)) {
            // Parcourir $_GET
            foreach ($_GET as $argument => $valeur) {
                // Garder uniquement les champs non vides
                if ($valeur !== "") {
                    $donnees[$argument] = $valeur;
                }
            }
        }

        // Étape 2 : Vérifier s'il reste des données
        if (!empty($donnees)) {
            // Début du tableau HTML
            echo "<table>";
            echo "<tr><th>Argument</th><th>Valeur</th></tr>";

            // Étape 3 : Affichage des données
            foreach ($donnees as $argument => $valeur) {
                echo "<tr>";
                echo "<td>" . $argument . "</td>";
                echo "<td>" . $valeur . "</td>";
                echo "</tr>";
            }

            echo "</table>";

        } else {
            // Aucun champ rempli
            echo "<p><strong>Aucune donnée reçue.</strong></p>";
        }
        ?>
        
        <div class="actions" style="margin-top:20px;">
            <a href="formulaire.html" class="bouton-retour">← Retour au formulaire</a>
        </div>
    </div>
    
    <!-- =========================================
         EXPLICATIONS PÉDAGOGIQUES
         ========================================= -->
    <div class="container" style="margin-top:30px; background:#fafafa;">
        
        <h2>📚 Comprendre l’algorithme</h2>
        
        <h3>1. $_GET</h3>
        <p>
            <code>$_GET</code> est un <strong>tableau associatif</strong> :  
            chaque champ rempli dans le formulaire devient une <em>clé</em> (nom du champ) 
            associée à une <em>valeur</em> (texte saisi).
        </p>
        
        <h3>2. Filtrage des champs vides</h3>
        <p>
            Même si un champ existe dans $_GET, il peut être vide.  
            On ne veut pas l’afficher dans le tableau, donc on ne garde que ceux qui ne sont pas vides.
        </p>
        
        <h3>3. isset()</h3>
        <p>
            <code>isset()</code> permet de vérifier si <code>$_GET</code> existe.  
            C’est la seule fonction système autorisée pour ce projet.
        </p>
        
        <h3>4. foreach</h3>
        <p>
            La boucle <code>foreach</code> parcourt chaque élément du tableau filtré.  
            Pour chaque tour :  
        </p>
        <ul>
            <li><code>$argument</code> → le nom du champ (ex. "prenom")</li>
            <li><code>$valeur</code> → le contenu saisi (ex. "Stéphane")</li>
        </ul>
        
        <h3>5. Tableau HTML</h3>
        <p>
            Chaque paire clé/valeur devient une ligne du tableau :  
            <code>&lt;tr&gt;</code> pour la ligne, <code>&lt;td&gt;</code> pour chaque cellule.
        </p>
        
        <h3>6. Cas particulier : aucun champ rempli</h3>
        <p>
            Si aucun champ n’a été rempli, le tableau n’est pas affiché et un message clair apparaît :  
            <strong>Aucune donnée reçue.</strong>
        </p>
        
        <h3>7. Résumé</h3>
        <p style="background:white; padding:10px; border-left:3px solid #333;">
            L’algorithme parcourt <code>$_GET</code>, garde uniquement les champs remplis,  
            et affiche chaque paire argument/valeur dans un tableau HTML.  
            Sinon, un message indique qu’aucune donnée n’a été reçue.
        </p>
        
    </div>
    
</body>
</html>
