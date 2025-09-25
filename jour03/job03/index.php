<!--  job03
Créez une variable de type string nommée $str et affectez y le texte :
“I'm sorry Dave I'm afraid I can't do that”.
Créez un algorithme qui parcourt cette chaîne et aﬃche uniquement les voyelles.
-->
<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = "aeiou";

for ($index = 0; $index < strlen($str); $index++) {
    $lettre = $str[$index];

    if (strpos($voyelles, $lettre) !== false) {
        echo $lettre;
    }
}
?>

<!-- 
Explication :
- $str : la chaîne de caractères à parcourir 
- $voyelles : string contenant toutes les voyelles 
- strpos($voyelles, $lettre) !== false : si strpos ne retourne PAS false, c'est une voyelle
- Résultat : "IoaIaaIao"
-->