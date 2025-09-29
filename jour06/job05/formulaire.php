<!--  jour06/job05
Créer un formulaire qui contient une liste déroulante nommée “style” et un bouton
submit. La liste déroulante doit proposer au moins “style1”, “style2” et “style3. Créer 3
fichiers css nommés “style1.css”, “style2.css” et “style3.css”. Chaque style doit avoir
des effets sur le design du formulaire, la couleur de background, la police d’écriture...
Lorsque l’on valide le formulaire, le style sélectionné doit être inclus et donc le visuel
doit changer.
-->
<?php
// =========================================
// Job05 - Formulaire avec style dynamique
// =========================================

// Déterminer le style à inclure
$styleChoisi = 'style1.css'; // style par défaut

if (isset($_POST['style'])) {
    $selection = $_POST['style'];
    // Vérification pour ne pas inclure un fichier inconnu
    if (in_array($selection, ['style1', 'style2', 'style3'])) {
        $styleChoisi = $selection . '.css';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Job05</title>
    <!-- Inclusion du style dynamique -->
    <link rel="stylesheet" href="<?php echo $styleChoisi; ?>">
</head>
<body>

<div class="container">
    <h1>Choisissez un style pour le formulaire</h1>

    <form method="POST" action="">
        <label for="style">Style :</label>
        <select name="style" id="style">
            <option value="style1" <?php if($styleChoisi=='style1.css') echo 'selected'; ?>>Style 1</option>
            <option value="style2" <?php if($styleChoisi=='style2.css') echo 'selected'; ?>>Style 2</option>
            <option value="style3" <?php if($styleChoisi=='style3.css') echo 'selected'; ?>>Style 3</option>
        </select>
        <br><br>
        <button type="submit">Valider</button>
    </form>
</div>

</body>
</html>
