<?php

/*if (!empty($_POST['a']) && is_numeric($_POST['a']) && !empty($_POST['b']) && is_numeric($_POST['b']) && !empty($_POST['c']) && is_numeric($_POST['c'])){

	echo geron($_POST['a'],$_POST['b'],$_POST['c']);

}else echo 'Error <br/>';


function geron($a,$b,$c){

	$p = ($a+$b+$c)/2;
	$s = sqrt($p*($p-$a)*($p-$b)*($p-$c));

return $s;
}*/

$login = 'Artem';
$password = 'Password';

if (isset($_POST['login']) && isset($_POST['pass']) && trim($_POST['login']) == $login && $_POST['pass'] == $password ){

	/*$login = trim($_POST['login']);
	$password = $_POST['pass'];*/

	echo '<p>Login: '.$login.'</p>';
	echo '<p>Password: '.$password.'</p>';
	
}else echo 'Bad login';



	
?>

<p><a href="<?=$_SERVER['HTTP_REFERER']?>">Back</a></p>