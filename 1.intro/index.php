<?php

$eleves = [ 'Romain', 'Louis', 'Salvatore'];

// Avec le for
for($i = 0; $i < count($eleves); $i++) {
    echo $eleves[$i] . ' <br>';
}

// Avec le while
$i = 0;
while ($i < count($eleves)) {
    echo $eleves[$i] . ' <br>';
    $i++;
}

foreach ($eleves as $singleEleve) {
    echo $singleEleve . '<br>';
}

//echo implode(', ', $eleves);
