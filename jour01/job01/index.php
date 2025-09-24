<?php
// Variable str avec la valeur (texte) "LaPlateforme"
$str = "LaPlateforme";
// Afficher le contenu de la variable str
echo $str . "\n"; // on utilise "\n" pour sauter une ligne en php et <br> en html
// Variable str2 et str3
$str2 = "Vive";
$str3 = "!";
// “Vive LaPlateforme !” avec concaténation et espace
echo $str2 . " " . $str . " " . $str3 . "\n"; // Il faut ajouter des " " pour créer un espace.


// Variable val avec la valeur (chiffre) 6
$val = 6;
// Afficher le contenu de la variable
echo $val . "\n";
// Ajouter 4 à la variable
$val += 4;
// Afficher à nouveau le contenu
echo $val . "\n";
// le PHP "lit" ligne par ligne les instructions.


// création et affichage de myBool à true
$myBool = true;
echo $myBool;   // affichera 1
// on passe myBool à false et on ré-affiche
$myBool = false;
echo $myBool;   // false n'affichera rien car il se traduit par une chaîne vide (sting vide)