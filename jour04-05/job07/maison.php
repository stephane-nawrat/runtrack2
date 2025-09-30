<!--  jour04/job07
Faire un formulaire avec deux <input> de type text ayant comme nom “largeur” et
“hauteur” et un bouton submit.
Vous devez créer un algorithme qui aﬃche, à la validation du formulaire,
une maison telle que :
- Si on entre les valeurs : largeur =10 et hauteur = 5 dans les champs, la
maison qui s’aﬃche sur la page doit ressembler à ceci.
Si on entre les valeurs largeur = 20 et hauteur = 10 dans les champs,
la maison qui s’aﬃche sur la page doit ressembler à ceci.
-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison ASCII - Job 07</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Résultat : Maison ASCII</h1>

    <?php
    // =========================================
    // JOB 07 - MAISON ASCII (toit centré)
    // =========================================

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $largeur = $_POST['largeur'] ?? '';
        $hauteur = $_POST['hauteur'] ?? '';

        // Vérification des valeurs
        if (!is_numeric($largeur) || !is_numeric($hauteur) || $largeur < 3 || $hauteur < 1) {
            echo '<div class="resultat erreur">';
            echo '<p>⚠ Veuillez entrer des nombres valides pour la largeur (≥3) et la hauteur (≥1).</p>';
            echo '</div>';
        } else {
            $largeur = (int)$largeur;
            $hauteur = (int)$hauteur;

            echo '<div class="resultat succes"><pre>';

            // ===== TOIT =====
            $toitHauteur = ceil($largeur / 2);
            for ($i = 1; $i <= $toitHauteur; $i++) {
                $espacesExt = str_repeat(' ', $toitHauteur - $i);
                if ($i == 1) {
                    // sommet du toit
                    echo $espacesExt . "/\\" . "\n";
                } else {
                    // ligne intermédiaire du toit
                    $espacesInt = str_repeat(' ', 2 * ($i - 1));
                    echo $espacesExt . "/" . $espacesInt . "\\" . "\n";
                }
            }

            // base du toit
            echo "/" . str_repeat('_', $largeur - 2) . "\\" . "\n";

            // ===== MURS =====
            for ($j = 0; $j < $hauteur; $j++) {
                echo "|" . str_repeat(' ', $largeur - 2) . "|" . "\n";
            }

            // ===== SOL =====
            echo "+" . str_repeat('-', $largeur - 2) . "+";

            echo '</pre></div>';
        }
    } else {
        echo '<p>Merci de remplir le formulaire <a href="formulaire.html">ici</a>.</p>';
    }
    ?>

    <div class="actions">
        <a href="formulaire.html" class="bouton-retour">← Retour au formulaire</a>
    </div>
</div>

<!-- =========================================
     EXPLICATIONS PÉDAGOGIQUES
     ========================================= -->
<div class="container" style="margin-top:30px; background:#fafafa;">
    <h2>📚 C
