<?php

for ($test = 0; $test <= 1337; $test++) {
    if ($test === 42) {
        // Afficher le nombre 42 en gras et souligné
        echo "<b><u>$test</u></b><br>";
    } else {
        // Afficher les autres nombres normalement
        echo $test . "<br>";
    }
}
?>