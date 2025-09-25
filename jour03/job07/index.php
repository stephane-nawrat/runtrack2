<!--  job07
Créez une variable de type string nommée $str et affectez y le texte :
“Certaines choses changent, et d'autres ne changeront jamais.”
Créer un algorithme qui parcourt cette string en remplaçant le premier caractère par le
deuxième, le deuxième par le troisième etc.. et le dernier par le premier.
-->
<?php
// ÉTAPE 1 : Créer la variable string avec le texte donné
$str = "Certaines choses changent, et d'autres ne changeront jamais.";

// ÉTAPE 2 : Sauvegarder le premier caractère (il ira à la fin)
$premierCaractere = mb_substr($str, 0, 1);

// ÉTAPE 3 : Créer une nouvelle chaîne vide pour le résultat
$nouvelleChaine = "";

echo "Phrase originale : " . $str . "<br><br>";

// ÉTAPE 4 : Parcourir la chaîne et décaler chaque caractère
for ($position = 0; $position < mb_strlen($str); $position++) {
    
    if ($position == mb_strlen($str) - 1) {
        // Pour la dernière position : mettre le premier caractère
        $nouvelleChaine .= $premierCaractere;
    } else {
        // Pour toutes les autres positions : prendre le caractère suivant
        $caractereDecale = mb_substr($str, $position + 1, 1);
        $nouvelleChaine .= $caractereDecale;
    }
}

echo "Phrase après décalage : " . $nouvelleChaine;
?>

<!-- 
NOTES PÉDAGOGIQUES :

PRINCIPE DU DÉCALAGE CIRCULAIRE :
- Position 0 (C) → reçoit le caractère de position 1 (e)
- Position 1 (e) → reçoit le caractère de position 2 (r)  
- Position 2 (r) → reçoit le caractère de position 3 (t)
- ...
- Dernière position (.) → reçoit le caractère de position 0 (C)

ÉTAPES DE L'ALGORITHME :
1. Sauvegarder le premier caractère avant de le perdre
2. Pour chaque position, prendre le caractère suivant
3. Pour la dernière position, utiliser le premier caractère sauvegardé
4. mb_substr() pour gérer les caractères accentués

EXEMPLE SIMPLE :
"ABCD" devient "BCDA"
A→B, B→C, C→D, D→A
-->