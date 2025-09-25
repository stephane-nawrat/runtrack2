<!--  job07
Faire un algorithme qui aﬃche un triangle de 5 de hauteur. Cette dimension devra être
stockée dans une variable $hauteur, modifiable facilement.
-->
<?php

$height = 8;
$leftChar = '/';
$rightChar = '\\';
$space = '&nbsp;&nbsp;';
$spaceAlone = '&nbsp;';

$innerSpace = '';
$foot = '';
$countA = 0;
$countB = 0;

// Boucle pour chaque niveau du triangle
for ($countA = 1; $countA < $height; $countA++) {
    $outerSpace = '';
    for ($countOuterSpaces = 0; $countOuterSpaces < ($height - 1 - $countA); $countOuterSpaces++) {
        $outerSpace .= $spaceAlone;
    }
    // Ajout des traits obliques
    echo $outerSpace . $spaceAlone . $leftChar . $innerSpace . $rightChar . "<br />";
    // Espace intérieur pour le prochain niveau
    $innerSpace .= $space . $space;
}

// Base du triangle
for ($countB = 0; $countB < (2 * $height - 1); $countB++) {
    $foot .= '_';
}
echo $foot;

?>