<?php

//$fruits = [
//    'pomme', // 0
//    'peche', // 1
//    'poire'   // 2
//];
//
//foreach ($fruits as $fruit) {
//    echo $fruit . '<br>';
//}

// Un élève est représenté par un prenom, un nom et un identifiant
// $eleve = ['nom' => 'Collard', 'prenom' => 'Louis', id => 1];
// Pour afficher un prénom je dois faire : $eleve['prenom']
//
$eleve = ['nom' => 'Collard', 'prenom' => 'Louis', 'id' => 1];
//
//foreach ($eleve as $eleveAttribute) {
//    echo $eleveAttribute . '<br>';
//}
//
//
echo '<h3>Ici on a montré comment récupérer la clé dans un foreach </h3>';
foreach ($eleve as $key => $value) {
    echo $key . ': '. $value . '<br>';
}


echo '<h3>Ici on boucle pour la première fois sur un tableau à deux dimensions</h3>';
$eleves = [
    ['nom' => 'Collard', 'prenom' => 'Louis', 'id' => 1],
    ['nom' => 'Otto', 'prenom' => 'Romain', 'id' => 2]
];

// Pour accéder à "Otto" il faut faire $eleves[1]['nom']

foreach ($eleves as $eleve) {
    echo $eleve['prenom'] . ' ' . $eleve['nom'] . '<br>';
}
