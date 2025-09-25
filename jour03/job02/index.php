<!--  job02
Créez une variable de type string nommée $str et affectez y le texte :
“Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.”
Parcourir cette chaîne en aﬃchant seulement un caractère sur deux.
-->
<?php
// Créer la variable string avec le texte donné
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

// Liste des voyelles (minuscules et majuscules)
$voyelles = "aeiouAEIOU";

// Parcourir la chaîne caractère par caractère
for ($index = 0; $index < strlen($str); $index++) {
    // Récupérer le caractère à la position courante
    $caractere = $str[$index];
    
    // Vérifier si le caractère n'est PAS une voyelle
    if (strpos($voyelles, $caractere) === false) {
        // Si ce n'est pas une voyelle, l'afficher
        echo $caractere;
    }
}
?>

<!-- 
Explication :
- $str : la chaîne de caractères à parcourir
- $voyelles : string contenant toutes les voyelles (a,e,i,o,u en minuscules et majuscules)
- strpos($voyelles, $caractere) : cherche si $caractere existe dans $voyelles
- === false : si strpos retourne false, le caractère n'est pas une voyelle
- Résultat : "Ts cs nstnts srnt prds dns l tmps cmm ls lrms ss l pl."
-->
