<?php



if (isset($_GET['action']) && $_GET['action'] === 'create') {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        insertIntoDB();
        showRealisationsTable();
    } else {
        showCreateForm();
    }
} else {
    showRealisationsTable();
}

function insertIntoDB()
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=my_portfolio', 'root','root');
    $query = $pdo->prepare('INSERT INTO `realisations` (`title`, `image`) VALUES (:title, :image)');

    $query->execute([
        'title' => $_POST['title'],
        'image' => $_POST['image']
    ]);
}


function showCreateForm()
{
    echo '
    <h1>Créer une réalisation</h1>
<form method="post">
        <div>
            <label for="title">Titre</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="image">Nom de l\'image</label>
            <input type="text" id="title" name="image">
        </div>
        <button type="submit">Ajouter</button>

</form>';
}


function showRealisationsTable() {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=my_portfolio', 'root','root');
    $query = $pdo->prepare('SELECT * FROM `realisations`');
    $query->execute();
    $realisations = $query->fetchAll();

    echo '<a href="?action=create">Ajouter</a>';
    echo '<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Image</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>';
    foreach ($realisations as $realisation) {
        echo '<tr>
            <td>'.$realisation['id'].'</td>
            <td>'.$realisation['title'].'</td>
            <td><img src="assets/img/portfolio/'.$realisation['image'].'" alt="" style="width: 120px;"></td>
            <td><a href="?action=update">modifier</a></td>
</tr>';

    }

    echo '</tbody>
</table>
';
}
