<?php

$cars = [
    [
        "name" => "Audi A3",
        "color" => "jaune"
    ],
    [
        "name" => "Ferrari GT4 Lusso",
        "color" => "rouge"
    ],
    [
        "name" => "Toyata Yaris",
        "color" => "noir"
    ],
    [
        "name" => "Toyata Corolla",
        "color" => "jaune"
    ],
    [
        "name" => "Toyata Aygo",
        "color" => "noir"
    ],
    [
        "name" => "Ford Mustang",
        "color" => "rouge"
    ]
];

// Instruction 1: Afficher toutes les voitures rouges !
// Instruction 2: Faire un menu avec les couleurs pour pouvoir cliquer sur une couleur
// Instruction 3: Afficher toutes les voitures correspondant à la couleur cliquée


echo '<h1>1. Juste les voitures rouges</h1>';
foreach ($cars as $car) {
    if ($car['color'] == 'rouge') {
        echo $car['name'] . '<br>';
    }
}
echo '<h1>2. Juste les voitures rouges</h1>';
$couleurs = [];
foreach ($cars as $car) {
    $couleurs[] = $car['color']; // array_push($couleurs, $car['color']);
}
$couleurs = array_unique($couleurs);
echo '<pre>'.print_r($couleurs, false).'</pre>';

echo '<nav><ul>';
foreach ($couleurs as $couleur) {
    echo '<li><a href="?color='.$couleur.'">'.$couleur.'</a></li>';
}
echo '</ul></nav>';

echo '<h1>3. Les voitures en fonction de leur couleur</h1>';
$selectedColor = null;
if (isset($_GET['color'])){
    $selectedColor = $_GET['color'];
}

if ($selectedColor !== null) {
    foreach ($cars as $car) {
        if ($car['color'] == $selectedColor) {
            echo $car['name'] . '<br>';
        }
    }
}




