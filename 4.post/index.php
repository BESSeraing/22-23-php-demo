<?php

if (count($_POST) == 0) {
    afficheForm();
} else {
    $nom = $_POST['lastName'];
    $prenom = $_POST['firstName'];
    echo 'Bonjour ' . $prenom . ' ' . $nom;
}


function afficheForm()
{
    echo '<form method="post">
    <input type="text" name="lastName" placeholder="Votre nom">
    <input type="text" name="firstName" placeholder="Votre prénom">
    <button type="submit">Envoyer</button>
    </form>';
}
