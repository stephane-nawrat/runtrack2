<?php
// Job07 - jour10
// Connexion à la base runtrack2_jour09 avec mysqli

$host = "localhost";
$user = "devLocal";
$pass = "devLocal";
$db   = "runtrack2_jour09";

// 1️⃣ Connexion
$mysqli = new mysqli($host, $user, $pass, $db);

// 2️⃣ Vérification de la connexion
if ($mysqli->connect_error) {
    die("❌ Erreur de connexion : " . $mysqli->connect_error);
}

// 3️⃣ Requête pour récupérer la superficie totale des étages
$query = "SELECT SUM(superficie) AS superficie_totale FROM etage";
$result = $mysqli->query($query);

if (!$result) {
    die("❌ Erreur dans la requête : " . $mysqli->error);
}

// 4️⃣ Création du tableau HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";

// 4a️⃣ Entêtes
echo "<thead><tr>";
$fields = $result->fetch_fields();
foreach ($fields as $field) {
    echo "<th>" . htmlspecialchars($field->name) . "</th>";
}
echo "</tr></thead>";

// 4b️⃣ Contenu
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

// 5️⃣ Fermeture de la connexion
$mysqli->close();
