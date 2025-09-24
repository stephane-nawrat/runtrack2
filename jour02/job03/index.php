<?php
// Boucle pour afficher les nombres de 0 à 100
for ($test = 0; $test <= 100; $test++) {
    
    // Cas spécial : remplacer 42 par "La Plateforme_"
    if ($test == 42) {
        echo "La Plateforme_<br>";
    }
    // Si le nombre est entre 0 et 20 : écrire en italique
    else if ($test >= 0 && $test <= 20) {
        echo "<i>" . $test . "</i><br>";
    }
    // Si le nombre est entre 25 et 50 : souligner
    else if ($test >= 25 && $test <= 50) {
        echo "<u>" . $test . "</u><br>";
    }
    // Cas normal : afficher le nombre tel quel
    else {
        echo $test . "<br>";
    }
}
?>

<!-- 
Logique des conditions :
1. D'abord vérifier le cas spécial (42 → "La Plateforme_")
2. Puis vérifier si 0-20 (italique)
3. Puis vérifier si 25-50 (souligné) 
4. Sinon affichage normal

Note : 42 est traité spécialement avant la plage 25-50
Les nombres 21-24 et 51-100 s'affichent normalement
-->