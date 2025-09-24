<?php
// Définir les nombres à exclure
$numbersToExclude = [26, 37, 88, 1111, 3233];

// Boucle pour afficher tous les nombres de 0 à 1337
for ($test = 0; $test <= 1337; $test++) {
    // Vérifier si le nombre actuel est dans la liste des exclusions
    if (!in_array($test, $numbersToExclude)) {
        echo $test . "<br>";
    }
}
?>

