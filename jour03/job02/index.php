<!--  job02
Créez une variable de type string nommée $str et affectez y le texte :
“Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.”
Parcourir cette chaîne en aﬃchant seulement un caractère sur deux.
-->
<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

// Parcourir la chaîne en affichant un caractère sur deux
for ($index = 0; $index < strlen($str); $index += 2) {
    // Récupérer le caractère à la position $index
    $caractere = $str[$index];
    
    // Afficher le caractère
    echo $caractere;
}
?>

<!-- 
Explication :
- $str : la chaîne de caractères à parcourir
- strlen($str) : retourne la longueur de la chaîne (nombre de caractères)
- $index += 2 : incrémente de 2 à chaque tour (positions 0, 2, 4, 6...)
- $str[$index] : accède au caractère à la position $index
- Résultat : "Toscsisat eonpru asl eps omlslre oslapue"
-->
