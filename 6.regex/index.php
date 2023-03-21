<?php
// Le délimiteur est le #

// La classe de caractère s'écrit entre []

// Dans une classe on peut mettre une série, la série s'écrit avec le -

// On peut mettre un 'ou' avec le |

// preg_match retourne true ou false si pattern est dans ce qu'on cherche

// preg_replace remplace pattern par le replacement

$pattern = "#(04[5-9][0-9])([0-9]{6})#";



echo '<h1>La pattern à chercher est : '.$pattern.'</h1>';

if (isset($_POST['textToTest'])) {
//    $string = trim($_POST['textToTest']);

    $string = sanitizePhoneNumber($_POST['textToTest']);
//    $found = preg_match($pattern, $string);
    preg_match($pattern, $string, $phoneNumbers);

    var_dump($phoneNumbers);

//    if ($found) {
//        echo 'Trouvé dans le texte '.$string;
//    } else {
//        echo 'Pas trouvé, le texte est propre : '.$string;
//    }
}

echo '<form method="post">
    <label for="input">Le texte à chercher</label>
    <input type="text" name="textToTest" id="input" />
    <button type="submit">Tester</button>
</form>';


function sanitizePhoneNumber($input) {
    $sanitized = preg_replace('#[ /.=%-]#', '', $input);
    return $sanitized;
}
