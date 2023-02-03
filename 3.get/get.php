<nav>
    <ul>
        <li><a href="?lang=fr">fr</a></li>
        <li><a href="?lang=nl">nl</a></li>
        <li><a href="?lang=de">de</a></li>
        <li><a href="?lang=ru">ru</a></li>
    </ul>
</nav>

<?php
$text = [
    'fr'=> 'Bonjour',
    'nl'=> 'Goiedag',
    'de'=> 'Guttndag'
];

$lang = 'fr';

if(isset($_GET['lang'])) {
    $lang = $_GET['lang'];
}


echo '<h1>';

echo $text[$lang];

echo '</h1>';
