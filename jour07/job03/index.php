<!--  jour07/job03
Créez une fonction nommée “getHello()”.
Cette fonction doit retourner “Hello LaPlateforme!”.
Appelez cette fonction dans votre page en récupérant sa valeur de retour et aﬃchez-la.
-->
<?php
// Déclaration de la fonction
function getHello() {
    return "Hello LaPlateforme!";
}
// Appel de la fonction et récupération de la valeur
$message = getHello();
// Affichage du résultat
echo $message;

?>