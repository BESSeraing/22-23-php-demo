<?php


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
