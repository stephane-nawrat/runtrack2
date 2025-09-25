<!--  job06
Faire un algorithme qui aﬃche un rectangle de 20 de largeur par 10 de hauteur. Ces
dimensions devront être stockées dans deux variables $largeur et $hauteur, modifiables
facilement.
-->
<?php
// Variables pour les dimensions du rectangle
$largeur = 20;
$hauteur = 10;

// Afficher le rectangle
for ($test = 1; $test <= $hauteur; $test++) {
    // Afficher une ligne complète d'astérisques
    for ($colonne = 1; $colonne <= $largeur; $colonne++) {
        echo "_";
    }
    // Retour à la ligne après chaque ligne du rectangle
    echo "<br>";
}
?>

<!-- 
Structure :
- Variables $largeur et $hauteur modifiables facilement
- Boucle externe : contrôle les lignes (hauteur)
- Boucle interne : contrôle les colonnes (largeur)  
- Chaque ligne = largeur astérisques + <br>
-->