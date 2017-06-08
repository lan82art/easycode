<?php

setcookie('auth',21,time() + 300);

echo $_COOKIE['auth'];

$b = 1;

echo $b > 1 ? 'Yes':'No';
