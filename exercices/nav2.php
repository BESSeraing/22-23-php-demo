<?php

$pages = [
    ['id'=> 5, 'contenu' => ['titre' => 'Accueil', 'sousTitre' => 'Bienvenue']],
    ['id'=> 6, 'contenu' => ['titre' => 'Contact', 'sousTitre' => 'Envoyez nous un mail']],
    ['id'=> 7,  'contenu' => ['titre' => 'Réservations', 'sousTitre' => 'PArce que c\'est bien']]
];



displayNav($pages);

// Afficher le titre de la page cliquée dans le menu
$id = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
// J'ai déjà un id à coup sur
foreach ($pages as $page) {
    if ($page['id'] == $id) {
        echo '<h1>'. $page['contenu']['titre'] . '</h1>';
        break;
    }
}
// Afficher le titre de la page cliquée dans le menu


function displayNav(array $pages) {
    echo '<nav>
        <ul>';
    foreach ($pages as $page) {
        echo '<li><a href="?id=' .$page['id']. '">'. $page['contenu']['titre'] .'</a></li>';

    }


echo '</ul>
</nav>';
}

