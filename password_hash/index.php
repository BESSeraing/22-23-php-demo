<?php

$pass = "MyStr0ngP@55";

//echo password_hash($pass, PASSWORD_DEFAULT);


if (password_verify($pass, '$2y$10$mF1FLgR4M76n5b1t1RLLgOwSK1XtIkCAz0njvVmASNikMrLxxK18i'))
{
    echo "bon pass";
}
else {
    echo "mauvais pass";
}


