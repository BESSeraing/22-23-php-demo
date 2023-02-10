<?php


$pages = [
    ['id'=> 1, 'titre' => 'Accueil'],
    ['id'=> 2, 'titre' => 'Contact'],
    ['id'=> 20, 'titre' => 'Réservations']
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
        echo '<h1>'. $page['titre'] . '</h1>';
        break;
    }
}




function displayNav(array $pages) {
    echo '<nav>
        <ul>';
// Faites une boucle sur ce tableau pour écrire le menu parce que la méthode utilisée ci dessus n'est pas acceptable
    foreach ($pages as $page) {
        echo '<li><a href="?id=' .$page['id']. '">'. $page['titre'] .'</a></li>';

    }

echo '</ul>
</nav>';
}

