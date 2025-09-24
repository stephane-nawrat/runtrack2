<?php
// Déclaration des variables de types primitifs

// Boolean
$isActive = true;
$isComplete = false;

// Integer
$age = 33;
$score = 14;

// String (chaine de caractère)
$firstName = "John";
$lastName = 'Doe';

// Float
$price = 39.99;
$temperature = -12.8;

// Création d'un tableau contenant toutes nos variables
$variables = [
    ['type' => 'boolean', 'name' => '$isActive', 'value' => $isActive],
    ['type' => 'boolean', 'name' => '$isComplete', 'value' => $isComplete],
    ['type' => 'integer', 'name' => '$age', 'value' => $age],
    ['type' => 'integer', 'name' => '$score', 'value' => $score],
    ['type' => 'string', 'name' => '$firstName', 'value' => $firstName],
    ['type' => 'string', 'name' => '$lastName', 'value' => $lastName],
    ['type' => 'double', 'name' => '$price', 'value' => $price],
    ['type' => 'double', 'name' => '$temperature', 'value' => $temperature]
];

// Fonction pour formater l'affichage des valeurs booléennes
function formatValue($value, $type) {
    if ($type === 'boolean') {
        return $value ? 'true' : 'false';
    }
    return $value;
}
?>

<table border="1">
    <thead>
        <tr>
            <th>Type</th>
            <th>Nom</th>
            <th>Valeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($variables as $var): ?>
        <tr>
            <td><?php echo $var['type']; ?></td>
            <td><?php echo $var['name']; ?></td>
            <td><?php echo formatValue($var['value'], $var['type']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>