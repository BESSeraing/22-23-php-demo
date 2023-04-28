<form method="post">
    <div>
        <input type="text" name="pseudo" placeholder="pseudo">
    </div>
    <div>
        <input type="text" name="password" placeholder="password">
    </div>
    <button type="submit"> Envoyer</button>
</form>

<?php


if (count($_POST)) {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root', 'root');
    $request = $pdo -> prepare('INSERT INTO `users` (`pseudo`, `password`) VALUES (:pseudo, :password)');
    $request->execute(['pseudo' => $_POST['pseudo'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]);
    header('Location: index.php');
}
