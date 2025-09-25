<!--  job05
Créez une variable de type string nommée $str et affectez y le texte :
“On n’est pas le meilleur quand on le croit mais quand on le sait”.

Créez un dictionnaire (tableau keys/values) nommé $dic qui a comme keys
“consonnes” et “voyelles”. Créez un algorithme qui parcourt, compte et stocke le
nombre d'occurrences de consonnes et de voyelles de $str.

Aﬃchez ces résultats dans un tableau <table> html qui a comme <thead> “Voyelles” et
“Consonnes”..
-->
<?php
// ÉTAPE 1 : Créer la variable string avec le texte donné
$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";

// ÉTAPE 2 : Créer le dictionnaire (tableau associatif) avec les clés demandées
$dic = [
    "voyelles" => 0,    // Compteur pour les voyelles
    "consonnes" => 0    // Compteur pour les consonnes
];

// ÉTAPE 3 : Définir la liste des voyelles (minuscules et majuscules)
$listeVoyelles = "aeiouAEIOU";

// ÉTAPE 4 : Parcourir la chaîne caractère par caractère
for ($position = 0; $position < strlen($str); $position++) {
    
    // Récupérer le caractère à la position courante
    $lettre = $str[$position];
    
    // Vérifier si c'est une lettre alphabétique (ignore espaces, apostrophes, etc.)
    if (ctype_alpha($lettre)) {
        
        // Vérifier si c'est une voyelle
        if (strpos($listeVoyelles, $lettre) !== false) {
            // C'est une voyelle : incrémenter le compteur
            $dic["voyelles"]++;
        } else {
            // C'est une lettre mais pas une voyelle = consonne
            $dic["consonnes"]++;
        }
    }
    // Si ce n'est pas une lettre (espace, ponctuation), on l'ignore
}
?>

<!-- AFFICHAGE DES RÉSULTATS -->
<h2>"<?php echo $str; ?>"</h2>

<table border="1">
    <thead>
        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $dic["voyelles"]; ?></td>
            <td><?php echo $dic["consonnes"]; ?></td>
        </tr>
    </tbody>
</table>

<!-- 
NOTES PÉDAGOGIQUES :

1. strlen($str) : retourne le nombre total de caractères dans la chaîne
2. $str[$position] : accède au caractère à l'index $position
3. ctype_alpha() : vérifie si le caractère est une lettre de l'alphabet
4. strpos() !== false : vérifie si le caractère existe dans la liste des voyelles
5. $dic["clé"]++ : incrémente la valeur associée à cette clé dans le tableau

RÉSULTAT ATTENDU :
- Voyelles : 20 (O, e, a, e, e, i, e, u, a, o, e, o, i, a, i, u, a, o, e, a, i)
- Consonnes : 28 (n, n, s, t, p, s, l, m, l, l, r, q, n, d, n, l, c, r, t, m, s, q, n, d, n, l, s, t)
-->