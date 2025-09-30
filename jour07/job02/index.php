<!--  jour07/job02
Créez une fonction nommée “bonjour($jour)”.
Cette fonction prend en paramètre un booléen nommé “$jour”.
- Si le paramètre “$jour” vaut true, la fonction doit aﬃcher : “Bonjour”,
- Si le paramètre “$jour” vaut false, la fonction doit aﬃcher : “Bonsoir”.
-->
<?php
// Déclaration de la fonction
function bonjour($jour) {
    if ($jour === true) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}

// Appel de la fonction
bonjour(true);
    echo "<br>";
bonjour(false);
?>
