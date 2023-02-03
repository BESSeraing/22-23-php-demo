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
    echo '<li><a href="?id=1">Accueil</a></li>';
    echo '<li><a href="?id=2">Contact</a></li>';
    echo '<li><a href="?id=3">Réservations</a></li>';
// Faites une boucle sur ce tableau pour écrire le menu parce que la méthode utilisée ci dessus n'est pas acceptable

echo '</ul>
</nav>';
}

