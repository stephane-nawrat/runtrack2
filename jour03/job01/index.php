<!--  job01
Créez un tableau contenant les nombres 200, 204, 173, 98, 171, 404, 459.
Parcourez ce tableau et aﬃchez pour chaque nombre “X est paire<br />” ou “X est
impaire<br />”, sur votre page index.php. X prenant tour à tour chacune des valeurs
comprises dans ce tableau.
-->
<?php
// Créer le tableau avec les nombres donnés
$tableauNombres = [200, 204, 173, 98, 171, 404, 459];

// Parcourir le tableau et vérifier si chaque nombre est pair ou impair
for ($indexTableau = 0; $indexTableau < count($tableauNombres); $indexTableau++) {
    $nombreActuel = $tableauNombres[$indexTableau];
    
    if ($nombreActuel % 2 == 0) {
        echo $nombreActuel . " est paire<br>";
    } else {
        echo $nombreActuel . " est impaire<br>";
    }
}
?>

<!-- 
Logique :
- Tableau $nombres avec les valeurs données
- Boucle for avec count($nombres) pour parcourir tous les éléments
- Modulo % 2 == 0 pour tester si pair
- $nombres pour accéder à chaque élément
-->
