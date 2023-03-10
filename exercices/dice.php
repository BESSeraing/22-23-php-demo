<?php
if(isset($_POST['dice'])) {
    $randomNumber = rand(1, 6);
    if ($randomNumber == $_POST['dice']) {
        echo '<h1>YOU WIN</h1>';
    } else {
        echo '<h1>HAHA you lose</h1>';
    }

    echo 'Vous avez essayé avec '.$_POST['dice'].' et le '.$randomNumber.' est sorti';
}

form();

function form() {
    echo '<form method="post" action="">
    <select name="dice">';
    for($i=1; $i<7; $i++) {
        echo '<option value="'.$i.'">'.$i.'</option>';
    }
   echo '</select>
    <button type="submit"> tente ta chance</button>
</form>';
}
