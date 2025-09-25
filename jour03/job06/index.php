<!--  job06
Créez une variable de type string nommée $str et affectez y le texte :
“Les choses que l'on possède finissent par nous posséder."
Créez un algorithme qui parcourt et écrit cette chaine à l’envers.
-->
<?php
// ÉTAPE 1 : Créer la variable string avec le texte donné
$str = "Les choses que l'on possède finissent par nous posséder.";

// ÉTAPE 2 : Utiliser mb_strlen et mb_substr pour gérer les caractères UTF-8
echo "Phrase originale : " . $str . "<br><br>";
echo "Phrase inversée : ";

// Parcourir la chaîne à l'envers avec les fonctions multibyte
for ($position = mb_strlen($str) - 1; $position >= 0; $position--) {
    
    // Récupérer le caractère à la position courante avec mb_substr
    $lettre = mb_substr($str, $position, 1);
    
    // Afficher le caractère
    echo $lettre;
}
?>

<!-- 
CORRECTION POUR LES CARACTÈRES ACCENTUÉS :

1. mb_strlen($str) : compte correctement les caractères UTF-8 (è = 1 caractère)
2. mb_substr($str, $position, 1) : extrait 1 caractère à la position donnée en UTF-8
3. strlen() et $str[$position] ne gèrent pas bien les accents (è = 2 bytes)

FONCTIONS MULTIBYTE (mb_) :
- mb_strlen() : longueur en caractères UTF-8
- mb_substr() : extraction de sous-chaîne UTF-8
- Nécessaires pour les caractères accentués français

RÉSULTAT CORRIGÉ :
".redéssop suon rap tnessinif edèssop no'l euq sesohc seL"
-->