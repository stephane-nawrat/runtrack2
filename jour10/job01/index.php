<?php
// Job01 - jour10
// Connexion à la base runtrack2_jour09 avec mysqli

$host = "localhost";
$user = "devLocal";
$pass = "devLocal";
$db   = "runtrack2_jour09";

// Connexion
$mysqli = new mysqli($host, $user, $pass, $db);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("❌ Erreur de connexion : " . $mysqli->connect_error);
}

// Exécution de la requête pour récupérer tous les étudiants
$query = "SELECT * FROM etudiants";
$result = $mysqli->query($query);

if (!$result) {
    die("❌ Erreur dans la requête : " . $mysqli->error);
}

// Création du tableau HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";

// 4a️⃣ Entêtes du tableau (noms des champs)
echo "<thead><tr>";
$fields = $result->fetch_fields();
foreach ($fields as $field) {
    echo "<th>" . htmlspecialchars($field->name) . "</th>";
}
echo "</tr></thead>";

// 4b️⃣ Contenu du tableau (données)
echo "<tbody>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "</tr>";
}
echo "</tbody>";

echo "</table>";

// Fermeture de la connexion
$mysqli->close();
