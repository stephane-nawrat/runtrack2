<?php
try {
    // 1️⃣ Connexion à la base avec PDO
    $pdo = new PDO(
        "mysql:host=localhost;
        dbname=runtrack2_jour09;
        charset=utf8mb4",
        "devLocal",
        "devLocal"
    );

    // Activer les exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ Connexion réussie via PDO !<br>";

    // 2️⃣ Lire les tables de la base
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_NUM);

    if ($tables) {
        echo "Tables présentes dans runtrack2_jour09 :<br>";
        foreach ($tables as $table) {
            echo "- " . $table[0] . "<br>";
        }
    } else {
        echo "Aucune table trouvée.";
    }
} catch (PDOException $e) {
    die("❌ Erreur PDO : " . $e->getMessage());
}
