<!--  jour04/job01
Développez un algorithme qui aﬃche le nombre d’arguments $_GET.
Pour tester votre code, créez un formulaire html <form> de type GET avec différents
champs <input> de type “text” et un <input> de type“submit” pour l’envoi.
Vous pouvez ensuite aﬃcher avec echo directement dans votre page par exemple :
“Le nombre d’argument GET envoyé est : “
-->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat du comptage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        
        <?php
        // ========================================
        // L'ALGORITHME (3 lignes essentielles)
        // ========================================
        
        // Étape 1 : Compter les arguments reçus
        $nombre_arguments = count($_GET);
        
        // Étape 2 : Vérifier s'il y a des données
        if ($nombre_arguments > 0) {
            
            // Étape 3a : Afficher le résultat
            echo '<div class="resultat succes">';
            echo '<h2>✓ Résultat</h2>';
            echo '<p class="nombre-grand">' . $nombre_arguments . '</p>';
            echo '<p>Le nombre d\'arguments GET envoyé est : <strong>' . $nombre_arguments . '</strong></p>';
            echo '</div>';
            
            // Bonus : Détail des arguments
            echo '<div class="detail">';
            echo '<h3>Détail des arguments reçus :</h3>';
            echo '<ul>';
            foreach ($_GET as $nom_champ => $valeur_champ) {
                echo '<li>';
                echo '<span class="nom-champ">' . htmlspecialchars($nom_champ) . '</span> : ';
                echo '<span class="valeur-champ">' . htmlspecialchars($valeur_champ) . '</span>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
            
        } else {
            
            // Étape 3b : Aucune donnée reçue
            echo '<div class="resultat erreur">';
            echo '<h2>⚠ Aucun argument</h2>';
            echo '<p>Vous n\'avez rempli aucun champ du formulaire.</p>';
            echo '<p>Le nombre d\'arguments GET est : <strong>0</strong></p>';
            echo '</div>';
            
        }
        ?>
        
        <div class="actions">
            <a href="formulaire.html" class="bouton-retour">← Retour au formulaire</a>
        </div>
        
    </div>
    
    
    
    
    <!-- ========================================
         EXPLICATION DÉTAILLÉE DU FONCTIONNEMENT
         ======================================== -->
    
    <div class="container" style="margin-top: 40px; background: #fafafa;">
        
        <h2>📚 Construction et fonctionnement de l'algorithme</h2>
        
        <h3>1. Qu'est-ce que $_GET ?</h3>
        <p>
            <strong>$_GET est un tableau</strong> (une liste organisée) qui contient automatiquement toutes les données 
            envoyées par un formulaire en méthode GET.
        </p>
        <p>
            Imaginez une boîte aux lettres : quand quelqu'un remplit le formulaire et clique sur "Envoyer", 
            chaque champ rempli devient une lettre dans cette boîte.
        </p>
        <p><strong>Exemple concret :</strong></p>
        <pre style="background: white; padding: 15px; border-left: 3px solid #333; font-family: monospace;">
Si l'utilisateur remplit :
- Prénom : "Marie"
- Ville : "Lyon"

Alors $_GET contiendra :
$_GET = [
    'prenom' => 'Marie',
    'ville' => 'Lyon'
]
        </pre>
        
        <h3>2. La fonction count()</h3>
        <p>
            <strong>count()</strong> est une fonction PHP qui compte combien d'éléments il y a dans un tableau.
        </p>
        <p>
            C'est comme compter combien de lettres sont dans votre boîte aux lettres.
        </p>
        <p><strong>Exemple :</strong></p>
        <pre style="background: white; padding: 15px; border-left: 3px solid #333; font-family: monospace;">
$_GET contient 2 éléments (prenom et ville)
count($_GET) retourne : 2
        </pre>
        
        <h3>3. La condition if/else</h3>
        <p>
            La structure <strong>if/else</strong> permet de prendre une décision selon une condition.
        </p>
        <p><strong>En français :</strong></p>
        <ul style="margin-left: 20px;">
            <li><strong>SI</strong> le nombre d'arguments est supérieur à 0 (il y a des données)</li>
            <li><strong>ALORS</strong> afficher le résultat positif</li>
            <li><strong>SINON</strong> afficher un message d'erreur</li>
        </ul>
        
        <h3>4. Le parcours avec foreach</h3>
        <p>
            <strong>foreach</strong> est une boucle qui parcourt chaque élément d'un tableau, un par un.
        </p>
        <p><strong>Analogie :</strong></p>
        <p>
            C'est comme ouvrir chaque lettre de votre boîte aux lettres, une à une, 
            pour lire l'expéditeur et le contenu.
        </p>
        <pre style="background: white; padding: 15px; border-left: 3px solid #333; font-family: monospace;">
foreach ($_GET as $nom => $valeur) {
    // Pour chaque élément :
    // - $nom contient la clé (ex: "prenom")
    // - $valeur contient la valeur (ex: "Marie")
}
        </pre>
        
        <h3>5. Schéma du flux de données</h3>
        <pre style="background: white; padding: 15px; border-left: 3px solid #333;">
FORMULAIRE (formulaire.html)
    ↓
Utilisateur remplit et clique "Envoyer"
    ↓
Données envoyées dans l'URL : ?prenom=Marie&ville=Lyon
    ↓
PHP reçoit les données dans $_GET
    ↓
count($_GET) compte : 2 éléments
    ↓
Affichage : "Le nombre d'arguments GET est : 2"
        </pre>
        
        <h3>6. Point important : les champs vides</h3>
        <p>
            <strong>⚠ Attention :</strong> Si un champ du formulaire reste vide, il n'est PAS envoyé.
        </p>
        <p><strong>Exemple :</strong></p>
        <ul style="margin-left: 20px;">
            <li>Formulaire avec 5 champs</li>
            <li>L'utilisateur remplit seulement 3 champs</li>
            <li>$_GET contiendra seulement 3 éléments</li>
            <li>count($_GET) retournera 3, pas 5</li>
        </ul>
        
        <h3>7. Tester l'algorithme</h3>
        <p><strong>Scénarios à essayer :</strong></p>
        <ol style="margin-left: 20px;">
            <li>Remplir tous les champs → devrait afficher 5</li>
            <li>Remplir seulement prénom et nom → devrait afficher 2</li>
            <li>Ne remplir aucun champ → devrait afficher 0 avec un message d'erreur</li>
            <li>Remplir un seul champ → devrait afficher 1</li>
        </ol>
        
        <h3>8. Résumé en une phrase</h3>
        <p style="background: white; padding: 15px; border-left: 3px solid #333; font-weight: bold;">
            L'algorithme compte combien de cases ont été remplies dans le formulaire 
            en utilisant count() sur le tableau $_GET qui contient toutes les données envoyées.
        </p>
        
    </div>
    
</body>
</html>