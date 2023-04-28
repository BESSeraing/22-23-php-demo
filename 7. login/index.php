<?php

$secret_key = "5fgf5HJ5g27";

$user = getUser($secret_key);

if ($user !== null) {
    echo '<h1>Youpie tu es connecté, Bonjour '.$user['pseudo'].'</h1>';
} else {
    if(loginFormSubmit()) {
        logUserIn($secret_key);
    } else {
        echo '<h1>Connecte toi !</h1>';
        loginForm();
    }

}

function getUser($secret_key) {
    if (isset($_COOKIE['token']) ){
        $pseudo =  decrypt($_COOKIE['token'], $secret_key);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root', 'root');
        $request = $pdo -> prepare('select * from `users` where `pseudo` = :pseudo');
        $request->execute(['pseudo' => $pseudo]);
        $user = $request->fetch();
        return $user;
    } else {
        return null;
    }
}

function isAuthenticated($secret_key) {
    if (isset($_COOKIE['token']) ){
        $pseudo =  decrypt($_COOKIE['token'], $secret_key);
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root', 'root');
        $request = $pdo -> prepare('select * from `users` where `pseudo` = :pseudo');
        $request->execute(['pseudo' => $pseudo]);
        $user = $request->fetch();
        return $user !== null && $user !== false;
    } else {
        return false;
    }
}


function logUserIn($secret_key)
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=php_22_23', 'root', 'root');
    $request = $pdo -> prepare('select * from `users` where `pseudo` = :pseudo');
    $request->execute(['pseudo' => $_POST['pseudo']]);

    $user = $request->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        setcookie('token', encrypt($user['pseudo'], $secret_key), time() + 3600 * 4 * 90);
        header('Location: index.php');
    }
}

function loginFormSubmit()
{
    return count($_POST) && isset($_POST['pseudo']) && isset($_POST['password']);
}

function loginForm() {
    echo '<form method="post">
    <div>
        <input type="text" name="pseudo" placeholder="pseudo">
    </div>
    <div>
        <input type="password" name="password" placeholder="password">
    </div>
    <button type="submit"> Envoyer</button>
</form>';


}



// --- Encrypt --- //
function encrypt($plaintext, $secret_key , $cipher = "AES-128-CBC")
{

    $key = openssl_digest($secret_key, 'SHA256', TRUE);

    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    // binary cipher
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    // or replace OPENSSL_RAW_DATA & $iv with 0 & bin2hex($iv) for hex cipher (eg. for transmission over internet)

    // or increase security with hashed cipher; (hex or base64 printable eg. for transmission over internet)
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    return base64_encode($iv . $hmac . $ciphertext_raw);
}

// --- Decrypt --- //
function decrypt($ciphertext, $secret_key, $cipher = "AES-128-CBC")
{

    $c = base64_decode($ciphertext);

    $key = openssl_digest($secret_key, 'SHA256', TRUE);

    $ivlen = openssl_cipher_iv_length($cipher);

    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);

    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, true);
    if (hash_equals($hmac, $calcmac))
        return $original_plaintext;
}
