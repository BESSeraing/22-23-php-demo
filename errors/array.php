<?php

// Array to string (écrit Array)
echo ['riri', 'fifi', 'loulou'];

echo '<br>';


// Undefined array key
// quand la clé n'existe pas
$array = [];

echo $array['firstName'];

echo '<br>';

$array = [
    'firstName' => 'loulou'
];


echo $array['firstName'];


echo $_GET['firstName'];
