<!--  jour07/job05
Créez une fonction nommée“occurrences($str, $char)”.
Cette fonction prend en paramètre une chaîne de caractères nommée “$str” et un
caractère nommé “$char”
.
Elle doit retourner le nombre d'occurrences du caractère “$char” dans “$str”.
Exemple : si $str
-->
<?php
/* Fonction occurrences
   Objectif : Compter combien de fois un caractère apparaît dans une chaîne */

function occurrences($chaineCaractere, $caractere) {
    // Initialiser le compteur à 0
    $nombreOccurrence = 0;

    // Calculer la longueur totale de la chaîne
    $nombreCaractere = strlen($chaineCaractere);

    // Parcourir chaque caractère de la chaîne
    for ($index = 0; $index < $nombreCaractere; $index++) {
        // Si le caractère courant correspond à celui recherché
        if ($chaineCaractere[$index] === $caractere) {
            // Incrémenter le compteur
            $nombreOccurrence++;
        }
    }
    // Retourner le nombre total d'occurrences
    return $nombreOccurrence;
}

// TEST DE LA FONCTION
$testChaine = "bonjour";    // Chaîne à analyser
$testCaractere = "o";       // Caractère à compter

// Affichage du résultat
echo "La lettre '" . $testCaractere . "' apparaît " 
     . occurrences($testChaine, $testCaractere) 
     . " fois dans '" . $testChaine . "'.";
?>
