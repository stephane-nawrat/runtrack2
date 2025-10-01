<!--  jour07/job06
Créez une fonction nommée “leetSpeak($str)”. Cette fonction prend en paramètre une
chaîne de caractères nommée “$str”.
Elle doit retourner la chaîne de caractères “$str” convertie en leet speak. Cela signifie
qu’elle doit la modifier de sorte à ce que :
● les “A” deviennent des “4”,
● les “B” des “8”,
● les “E” des “3”,
● les “G” des “6”,
● les “L ” des “1”,
● les “S” des “5”
● les “T” des “7”.
Cela est valable que l’on crie ou non (majuscules et minuscules).
-->
<?php
/* Fonction leetSpeak
   Objectif : remplaçer certains caractères par des chiffres. */

    function leetSpeak($chaineOriginale) {
    $chaineLeet = ""; // Chaîne qui contiendra la version leet
    $longueurChaine = strlen($chaineOriginale); // Nombre de caractères de la chaîne

    // Parcourir chaque caractère
    for ($indexCaractere = 0; $indexCaractere < $longueurChaine; $indexCaractere++) {
        $caractereCourant = $chaineOriginale[$indexCaractere]; // Caractère courant

        // Conversion en majuscule pour simplifier les comparaisons
        $caractereMajuscule = strtoupper($caractereCourant);

        // Remplacement selon la règle leet
        switch ($caractereMajuscule) {
            case "A":
                $chaineLeet .= "4";
                break;
            case "B":
                $chaineLeet .= "8";
                break;
            case "E":
                $chaineLeet .= "3";
                break;
            case "G":
                $chaineLeet .= "6";
                break;
            case "L":
                $chaineLeet .= "1";
                break;
            case "S":
                $chaineLeet .= "5";
                break;
            case "T":
                $chaineLeet .= "7";
                break;
            default:
                $chaineLeet .= $caractereCourant; // Pas de remplacement
        }
    }

    return $chaineLeet;
}

// ========================
// TEST DE LA FONCTION
// ========================
$chaineATester = "La plateforme est en travaux !";
echo leetSpeak($chaineATester); 
?>   