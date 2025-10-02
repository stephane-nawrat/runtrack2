<?php
// ============================================
// Transformateur de texte (version pédagogique)
// ============================================

// On récupère les données du formulaire envoyées en POST
$texte = $_POST['str'] ?? "";           // le texte de l'utilisateur
$choix = $_POST['fonction'] ?? "";      // la transformation choisie

// Petite fonction pour sécuriser l'affichage du texte (évite les failles XSS)
function securiser($texte) {
    return htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}

// ---------------------------
// 1. Fonction "gras"
// Met en gras (<b>) les mots qui commencent par une majuscule
// ---------------------------
function mettreEnGras($texte) {
    // On coupe le texte en mots séparés par des espaces
    $mots = explode(" ", $texte);

    // On parcourt chaque mot
    foreach ($mots as $index => $mot) {
        // Vérifie si le premier caractère est une majuscule
        if (ctype_upper(substr($mot, 0, 1))) {
            $mots[$index] = "<b>" . securiser($mot) . "</b>";
        } else {
            $mots[$index] = securiser($mot);
        }
    }

    // On reconstruit le texte avec des espaces
    return implode(" ", $mots);
}

// ---------------------------
// 2. Fonction "césar"
// Décale chaque lettre de 2 dans l'alphabet
// Exemple : A → C, B → D, z → b
// ---------------------------
function codeCesar($texte) {
    $resultat = "";

    // On parcourt chaque caractère un par un
    for ($i = 0; $i < strlen($texte); $i++) {
        $caractere = $texte[$i];

        // Si c'est une lettre minuscule
        if ($caractere >= 'a' && $caractere <= 'z') {
            $resultat .= chr(((ord($caractere) - 97 + 2) % 26) + 97);
        }
        // Si c'est une lettre majuscule
        elseif ($caractere >= 'A' && $caractere <= 'Z') {
            $resultat .= chr(((ord($caractere) - 65 + 2) % 26) + 65);
        }
        // Sinon, on garde tel quel (espace, chiffre, accent…)
        else {
            $resultat .= $caractere;
        }
    }

    return securiser($resultat);
}

// ---------------------------
// 3. Fonction "plateforme"
// Ajoute "_" aux mots qui finissent par "me"
// Exemple : programme → programme_
// ---------------------------
function plateforme($texte) {
    $mots = explode(" ", $texte);

    foreach ($mots as $index => $mot) {
        if (substr($mot, -2) === "me") {
            $mots[$index] = securiser($mot) . "_";
        } else {
            $mots[$index] = securiser($mot);
        }
    }

    return implode(" ", $mots);
}

// ---------------------------
// Application du choix
// ---------------------------
$resultat = "";

if ($choix === "gras") {
    $resultat = mettreEnGras($texte);
} elseif ($choix === "cesar") {
    $resultat = codeCesar($texte);
} elseif ($choix === "plateforme") {
    $resultat = plateforme($texte);
} else {
    $resultat = "Aucune transformation appliquée.";
}
?>

<!-- ===================== -->
<!-- Partie HTML du rendu -->
<!-- ===================== -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Résultat de la transformation</h1>

    <p><strong>Texte original :</strong> <i><?= securiser($texte) ?></i></p>
    <p><strong>Transformation choisie :</strong> <?= securiser($choix) ?></p>

    <div class="resultat">
        <?= $resultat ?>
    </div>

    <p><a href="formulaire.html">⟵ Revenir au formulaire</a></p>
</div>
</body>
</html>
