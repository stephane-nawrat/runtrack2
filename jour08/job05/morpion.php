<!--  jour08/job05
Développez le fameux jeu du morpion. Faites un tableau html avec 3 lignes et 3
colonnes représentant la grille. Au début de la partie, chacune des cases contient un
bouton de type submit dont la valeur est “-”.
Si un joueur clique sur ce bouton, le bouton est remplacé par un “O” ou par un “X”. C’est le joueur “X” qui commence.
Dès qu’un joueur a gagné, aﬃchez “X a gagné” ou “O a gagné” et réinitialisez la partie.
Si toutes les cases ont été cliquées et que personne n’a gagné, aﬃchez “Match nul” et
réinitialisez la partie. Un bouton “réinitialiser la partie” présent en dessous de la grille
permet également de réinitialiser la partie à tout moment.
-->
<?php
// ================================
// JEU DU MORPION (Version simple)
// ================================
// Objectif : créer une grille de 3x3 où deux joueurs ("X" et "O")
// jouent chacun leur tour jusqu’à ce qu’il y ait un gagnant ou un match nul.

// --------------------
// 1. Démarrer la session
// --------------------
session_start();

// --------------------
// 2. Fonction qui crée une grille vide
// --------------------
function creerGrilleVide() {
    // Une grille de morpion a 9 cases (3x3).
    // On remplit chaque case avec "-" (signifie : case vide).
    return array_fill(0, 9, "-");
}

// --------------------
// 3. Réinitialisation de la partie si demandé
// --------------------
if (isset($_POST["reset"])) {
    $_SESSION["grille"] = creerGrilleVide(); // nouvelle grille
    $_SESSION["joueur"] = "X";               // X commence toujours
    $_SESSION["message"] = "";               // pas encore de gagnant
}

// --------------------
// 4. Si aucune grille n’existe encore, on en crée une
// --------------------
if (!isset($_SESSION["grille"])) {
    $_SESSION["grille"] = creerGrilleVide();
    $_SESSION["joueur"] = "X";
    $_SESSION["message"] = "";
}

// --------------------
// 5. Gestion d’un clic sur une case
// --------------------
if (isset($_POST["case"])) {
    $numeroCase = (int) $_POST["case"]; // numéro de la case cliquée (0 → 8)

    // Si la case est encore vide, on peut jouer
    if ($_SESSION["grille"][$numeroCase] === "-") {
        // On place le symbole du joueur courant ("X" ou "O")
        $_SESSION["grille"][$numeroCase] = $_SESSION["joueur"];

        // --------------------
        // 6. Vérification d’un gagnant
        // --------------------
        $combinaisonsGagnantes = [
            [0,1,2], [3,4,5], [6,7,8], // lignes
            [0,3,6], [1,4,7], [2,5,8], // colonnes
            [0,4,8], [2,4,6]           // diagonales
        ];

        $gagnant = null;
        foreach ($combinaisonsGagnantes as $c) {
            // Exemple : [0,1,2] → vérifie si les 3 cases sont identiques et non "-"
            if ($_SESSION["grille"][$c[0]] !== "-" &&
                $_SESSION["grille"][$c[0]] === $_SESSION["grille"][$c[1]] &&
                $_SESSION["grille"][$c[1]] === $_SESSION["grille"][$c[2]]) {
                $gagnant = $_SESSION["grille"][$c[0]];
                break;
            }
        }

        // --------------------
        // 7. Si quelqu’un a gagné
        // --------------------
        if ($gagnant) {
            $_SESSION["message"] = "$gagnant a gagné !";
            $_SESSION["grille"] = creerGrilleVide(); // nouvelle partie
        }
        // --------------------
        // 8. Si plus aucune case libre → match nul
        // --------------------
        elseif (!in_array("-", $_SESSION["grille"])) {
            $_SESSION["message"] = "Match nul !";
            $_SESSION["grille"] = creerGrilleVide(); // nouvelle partie
        }
        // --------------------
        // 9. Sinon → on change de joueur
        // --------------------
        else {
            $_SESSION["joueur"] = ($_SESSION["joueur"] === "X") ? "O" : "X";
        }
    }
}
?>

<!-- ================================
     10. Partie HTML (affichage)
     ================================ -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Morpion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Jeu du Morpion</h1>

        <!-- Message de victoire ou nul -->
        <?php if ($_SESSION["message"] !== ""): ?>
            <p class="message"><?= $_SESSION["message"] ?></p>
        <?php endif; ?>

        <!-- La grille de 3x3 -->
        <form method="post">
            <table>
                <?php for ($i=0; $i<3; $i++): ?>
                    <tr>
                        <?php for ($j=0; $j<3; $j++):
                            $index = $i*3 + $j;   // numéro de la case (0 à 8)
                            $valeur = $_SESSION["grille"][$index];
                        ?>
                            <td>
                                <?php if ($valeur === "-"): ?>
                                    <!-- Si la case est vide, on affiche un bouton -->
                                    <button type="submit" name="case" value="<?= $index ?>">-</button>
                                <?php else: ?>
                                    <!-- Sinon on affiche X ou O -->
                                    <span class="case"><?= $valeur ?></span>
                                <?php endif; ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>

            <!-- Bouton reset -->
            <button type="submit" name="reset">Réinitialiser la partie</button>
        </form>

        <p>Joueur courant : <b><?= $_SESSION["joueur"] ?></b></p>
    </div>
</body>
</html>

