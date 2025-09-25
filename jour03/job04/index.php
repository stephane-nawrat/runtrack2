<!--  job04
Créez une variable de type string nommée $str et affectez y le texte :
“Dans l'espace, personne ne vous entend crier”.
Créez un algorithme qui parcourt, compte et aﬃche le nombre de caractères présents
dans cette chaîne.
-->
<?php
// Créer la variable string avec le texte donné
$str = "Dans l'espace, personne ne vous entend crier";

// Initialiser le compteur à zéro
$compteur = 0;

// Parcourir la chaîne caractère par caractère
for ($position = 0; $position < strlen($str); $position++) {
    // Récupérer le caractère à la position courante
    $lettre = $str[$position];
    
    // Incrémenter le compteur pour chaque caractère
    $compteur++;
    
    // Optionnel : afficher chaque caractère avec sa position
    echo "Position " . $position . " : '" . $lettre . "'<br>";
}

// Afficher le nombre total de caractères
echo "<br>Nombre total de caractères : " . $compteur;
?>

<!-- 
Explication :
- $str : la chaîne de caractères à analyser
- $compteur : variable qui compte le nombre de caractères
- strlen($str) : donne la longueur totale (on aurait pu utiliser directement cette fonction)
- Chaque tour de boucle incrémente le compteur de 1
- Résultat attendu : 43 caractères (espaces et apostrophe inclus)
-->



