<?php
// transform.php
// Objectif : appliquer des transformations (gras / césar / plateforme) sur un texte envoyé par formulaire.
// Fichier pédagogique : gère UTF-8, échappement et affichage sécurisé.

// s'assurer que PHP gère correctement UTF-8
mb_internal_encoding('UTF-8');
mb_regex_encoding('UTF-8');

// Récupération sécurisée des données POST
$userTexte = $_POST['str'] ?? '';
$choixFonction = $_POST['fonction'] ?? '';

// petit helper d'échappement (UTF-8)
function escape($s) {
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/* -----------------------------
   Fonction GRAS (pédagogique)
   - Met en <b>...</b> les mots commençant par une majuscule (Unicode aware)
   - Échappe le texte utilisateur pour éviter l'injection, puis autorise <b>
------------------------------*/
function gras($texte) {
    // on préserve les espaces en splittant en tokens (mots ET séparateurs)
    $tokens = preg_split('/(\s+)/u', $texte, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($tokens as $i => $token) {
        // laisser les séparateurs (espaces) inchangés
        if (preg_match('/^\s+$/u', $token)) continue;

        // tester si le premier caractère est une majuscule Unicode
        if (preg_match('/^\p{Lu}/u', $token)) {
            // échapper le mot puis l'entourer de <b>
            $tokens[$i] = '<b>' . escape($token) . '</b>';
        } else {
            $tokens[$i] = escape($token);
        }
    }
    return implode('', $tokens);
}

/* -----------------------------
   Fonction CÉSAR (pédagogique)
   - Décale les lettres A-Z / a-z (ASCII) de $decalage
   - Laisse les caractères non ASCII (accents, signes) inchangés
   - Retourne chaîne échappée
------------------------------*/
function cesar($texte, $decalage = 2) {
    $result = '';
    $len = mb_strlen($texte, 'UTF-8');

    for ($i = 0; $i < $len; $i++) {
        $ch = mb_substr($texte, $i, 1, 'UTF-8');

        // n'opère que sur l'alphabet ASCII (A-Z/a-z) — les lettres accentuées restent telles quelles
        if (preg_match('/[A-Z]/', $ch)) {
            $code = ord($ch); // safe car match ASCII
            $nouveau = 65 + (($code - 65 + $decalage) % 26);
            $result .= chr($nouveau);
        } elseif (preg_match('/[a-z]/', $ch)) {
            $code = ord($ch);
            $nouveau = 97 + (($code - 97 + $decalage) % 26);
            $result .= chr($nouveau);
        } else {
            // caractère non-ASCII ou non lettre : on le recopie tel quel
            $result .= $ch;
        }
    }

    // échappement final : pas de HTML attendu ici
    return escape($result);
}

/* -----------------------------
   Fonction PLATEFORME (pédagogique)
   - Ajoute un "_" aux mots finissant par "me"
   - Sensible à l'orthographe exacte "me" (on peut adapter pour majuscules)
------------------------------*/
function plateforme($texte) {
    // tokens pour préserver espaces/punctuation
    $tokens = preg_split('/(\s+)/u', $texte, -1, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($tokens as $i => $token) {
        if (preg_match('/^\s+$/u', $token)) continue;

        // on teste la version en minuscules (UTF-8)
        $lower = mb_strtolower($token, 'UTF-8');
        // \b peut être approximatif pour Unicode ; on teste la terminaison "me"
        if (mb_substr($lower, -2, 2, 'UTF-8') === 'me') {
            $tokens[$i] = escape($token) . '_';
        } else {
            $tokens[$i] = escape($token);
        }
    }
    return implode('', $tokens);
}

/* -----------------------------
   Application selon le choix
------------------------------*/
$resultat = '';
if ($userTexte !== '' && $choixFonction !== '') {
    switch ($choixFonction) {
        case 'gras':
            $resultat = gras($userTexte);          // contient potentiellement <b> (autorisé)
            break;
        case 'cesar':
            $resultat = cesar($userTexte);         // échappé
            break;
        case 'plateforme':
            $resultat = plateforme($userTexte);    // échappé (avec _ ajouté)
            break;
        default:
            $resultat = escape('Transformation inconnue.');
            break;
    }
} else {
    $resultat = '';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Résultat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Résultat de la transformation</h1>

    <p>Texte original : <i><?= htmlspecialchars($userTexte, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></i></p>
    <p>Transformation choisie : <b><?= htmlspecialchars($choixFonction, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></b></p>

    <div class="resultat">
        <!-- $resultat contient des <b> explicitement autorisés par la fonction gras ;
             les autres contenus utilisateur ont été échappés -->
        <?= $resultat ?>
    </div>

    <p><a href="formulaire.html">⟵ Revenir au formulaire</a></p>
</body>
</html>
