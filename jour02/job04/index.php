<!--  job04
Aﬃcher les nombres de 1 à 100 en mettant un retour à la ligne entre chaque nombre
(“<br />”) et en remplaçant certains nombres par un mot selon les conditions suivantes :
● Si le nombre est un multiple de 3, aﬃchez “Fizz”.
● Si le nombre est un multiple de 5, aﬃchez “Buzz”.
● Si le nombre est un multiple de 3 et de 5, aﬃchez “FizzBuzz”.
-->

<?php
// Boucle FizzBuzz de 1 à 100
for ($test = 1; $test <= 100; $test++) {
    
    // Si multiple de 3 ET de 5 : FizzBuzz
    if ($test % 3 == 0 && $test % 5 == 0) {
        echo "FizzBuzz<br>";
    }
    // Si multiple de 3 seulement : Fizz
    else if ($test % 3 == 0) {
        echo "Fizz<br>";
    }
    // Si multiple de 5 seulement : Buzz
    else if ($test % 5 == 0) {
        echo "Buzz<br>";
    }
    // Cas normal : afficher le nombre
    else {
        echo $test . "<br>";
    }
}
?>

<!-- 
Points clés :
- L'opérateur % (modulo) retourne le reste d'une division
- $test % 3 == 0 signifie "divisible par 3"
- La condition FizzBuzz (multiple de 3 ET 5) doit être testée EN PREMIER
- Sinon les conditions Fizz ou Buzz seraient déclenchées avant
-->
