<?php

$pages = [
    ['id'=> 5, 'contenu' => ['titre' => 'Accueil', 'sousTitre' => 'Bienvenue']],
    ['id'=> 6, 'contenu' => ['titre' => 'Accueil', 'sousTitre' => 'Bienvenue']],
    ['id'=> 7,  'contenu' => ['titre' => 'Accueil', 'sousTitre' => 'Bienvenue']]
];


displayNav($pages);

// Afficher le titre de la page cliquée dans le menu


function displayNav(array $pages) {
    echo '<nav>
        <ul>';
    echo '<li><a href="?id=5">Accueil</a></li>';
    echo '<li><a href="?id=6">Contact</a></li>';
    echo '<li><a href="?id=7">Réservations</a></li>';
// Faites une boucle sur ce tableau pour écrire le menu parce que la méthode utilisée ci dessus n'est pas acceptable

echo '</ul>
</nav>';
}

