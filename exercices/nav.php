<?php

$pages = [
    ['id'=> 1, 'titre' => 'Accueil'],
    ['id'=> 2, 'titre' => 'Contact'],
    ['id'=> 3, 'titre' => 'Réservations']
];


displayNav($pages);

// Afficher le titre de la page cliquée dans le menu


function displayNav(array $pages) {
    echo '<nav>
        <ul>';
// Faites une boucle sur ce tableau pour écrire le menu

echo '</ul>
</nav>';
}

