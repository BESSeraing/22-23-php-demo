<?php
if (isFormSubmit() && isFormValid()) {
    insertDB($_POST['gameName'], $_POST['platform']);
    displayGames();
} else {
    displayForm();
}



function displayGames() {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root','root');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $request = $pdo->prepare('SELECT * from jeux_videos');
    $exec = $request->execute();

    $games = $request->fetchAll();


    echo '<table style="width:100%; border:1px solid #333;">
<thead>
  <tr>
    <th style="border: 1px solid #333;">id</th>
    <th style="border: 1px solid #333;">Name</th>
    <th style="border: 1px solid #333;">Platform</th>
  </tr>
  </thead>
  <tbody>';

    foreach ($games as $game) {
        echo '<tr>
    <td style="border: 1px solid #333;">'.$game['id'].'</td>
    <td style="border: 1px solid #333;">'.$game['name'].'</td>
    <td style="border: 1px solid #333;">'.$game['platform'].'</td>
  </tr>';

    }

    echo '</tbody></table>';

}


function insertDB($name, $platform) {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root','root');
    $request = $pdo->prepare('INSERT INTO `jeux_videos` (`name`, `platform`) VALUES (:nameOfTheGame, :nameOfThePlatform)' );
    $request->execute([
        'nameOfTheGame' => $name,
        'nameOfThePlatform' => $platform
    ]);
}

function isFormSubmit() {
    return count($_POST) > 0;
}

function isFormValid() {
    if (isset($_POST['gameName']) && isset($_POST['platform']) && !empty($_POST['gameName']) && !empty($_POST['platform'])) {
        return true;
    } else {
        return false;
    }
}


function displayForm() {
    echo '<form method="post">
    <div>
        <label for="name">Nom du jeu</label>
        <input type="text" id="name" name="gameName" />
    </div>
    <div>
        <label for="platform">Plateforme</label>
        <input type="text" id="platform" name="platform" />
    </div>
    <button type="submit">envoyer</button>
</form>';
}
