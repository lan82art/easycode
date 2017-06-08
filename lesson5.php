<?php
echo 'lesson 5 <br />';


$str = 'hello';

//echo substr($str,-2,3);

/*$str2 = 'Привет';
$code = 'utf-8';

echo mb_substr($str2, 1, mb_strlen($str2, $code), 	$code);*/
/*
$a = 'login';
$b = '                login                      ';

if ($a == trim($b)){
	echo 'ok';
}
else {
	echo 'Error';
}*/
?>
<!--<form action="/form5.php" method="post">
<input type="text" name="a" placeholder="a"/><br />
<input type="text" name="b" placeholder="b"/><br />
<input type="text" name="c" placeholder="c"/><br />
<textarea name="text"></textarea><br/>
<input type="submit" value="Отправить"/>
</form>-->
<form action="/form5.php" method="post">
<p><input type="text" name="login" placeholder="Логин"/></p>
<p><input type="password" name="pass"  placeholder="Пароль"/></p>
<input type="submit" value="Отправить"/>
</form>