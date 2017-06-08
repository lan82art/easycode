<?php
define('HOST','localhost');
define('USER','root');
define('PASS','Creation');
define('DATABASE','easycode');

$link = mysqli_connect(HOST,USER,PASS,DATABASE) or die('Error connection');
