<!--  job07
Faire un algorithme qui aﬃche un triangle de 5 de hauteur. Cette dimension devra être
stockée dans une variable $hauteur, modifiable facilement.
-->
<?php
$hauteur = 5;       // Hauteur du triangle
$gauche = '/';
$droite = '\\';
$baseChar = '_';
$espace = '&nbsp;'; // espace HTML non-breakable

echo '<pre>';

for ($ligne = 0; $ligne < $hauteur - 1; $ligne++) {

    // Espaces extérieurs
    $espacesExt = '';
    for ($i = 0; $i < $hauteur - $ligne - 1; $i++) {
        $espacesExt .= $espace;
    }

    // Espaces intérieurs
    $espacesInt = '';
    if ($ligne != 0) {
        for ($j = 0; $j < 2 * $ligne; $j++) {
            $espacesInt .= $espace;
        }
    }

    // Affichage de la ligne
    echo $espacesExt . $gauche . $espacesInt . $droite . "<br />";
}

// Base du triangle
echo $gauche;
for ($i = 0; $i < 2 * ($hauteur - 1); $i++) {
    echo $baseChar;
}
echo $droite;

echo '</pre>';
?>

<!-- =========================================
     NOTICE PÉDAGOGIQUE
=========================================

TRIANGLE ASCII - Job07

Objectif :
- Afficher un triangle droit de hauteur $hauteur
- Centrer le triangle dans le navigateur
- Rendre le tout lisible avec &nbsp;

Explications pas à pas :
1. Boucle principale ($ligne)
   - Parcourt chaque niveau du triangle (sauf la base)
   - Permet de construire le toit ligne par ligne

2. Boucles imbriquées
   a) Espaces extérieurs
      - Centrent le triangle
      - Nombre = $hauteur - $ligne - 1
   b) Espaces intérieurs
      - Augmentent à chaque ligne pour élargir le triangle
      - Nombre = 2 * $ligne

3. Affichage
   - Chaque ligne = espaces extérieurs + / + espaces intérieurs + \
   - <br /> pour passer à la ligne suivante
   - La base est affichée séparément

Ce que tu apprends :
- Utilisation de boucles imbriquées
- Gestion du centrage dans un affichage ASCII
- Construction progressive d’une figure géométrique
- Rendu correct dans le navigateur avec &nbsp;

Rubrique technique :
- Boucle principale + boucles internes (imbriquées)
- Condition pour gérer le sommet (pas d’espace intérieur)
- Boucle séparée pour la base
- HTML <pre> ou <br /> pour conserver l’alignement

-->
