<?php


$pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root','root');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$request = $pdo->prepare('SELECT * from jeux_videosd ');
$exec = $request->execute();

$games = $request->fetchAll();

foreach ($games as $game) {
    echo $game['name'].'<br>';
}
