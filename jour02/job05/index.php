<!--  job05
Faire un algorithme qui aﬃche les nombres premiers jusqu’à 1000 en mettant un retour
à la ligne entre chaque nombre (“<br />”).
-->
<?php
// Fonction pour vérifier si un nombre est premier
function isPrime($number) {
    // 1 et 0 ne sont pas premiers
    if ($number <= 1) {
        return false;
    }
    
    // 2 est le seul nombre premier pair
    if ($number == 2) {
        return true;
    }
    
    // Éliminer les nombres pairs (sauf 2)
    if ($number % 2 == 0) {
        return false;
    }
    
    // Vérifier les diviseurs impairs jusqu'à la racine carrée
    for ($i = 3; $i <= sqrt($number); $i += 2) {
        if ($number % $i == 0) {
            return false;
        }
    }
    
    return true;
}

// Afficher tous les nombres premiers de 2 à 1000
for ($test = 2; $test <= 1000; $test++) {
    if (isPrime($test)) {
        echo $test . "<br>";
    }
}
?>

<!-- 
Algorithme d'optimisation :
- On commence à 2 (premier nombre premier)
- On élimine directement les pairs (sauf 2)
- On teste seulement jusqu'à la racine carrée du nombre
- On teste seulement les diviseurs impairs
-->