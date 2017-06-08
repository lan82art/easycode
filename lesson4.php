<?php echo 'Функции<br />'; 


/*function hello ($name = 'qwerty'){

	echo "Hello " . $name ;
}
$str = 'Artem';
//hello($str);
hello();*/

// function num($a){
// 	if ($a != 0 && $a%2 == 0){
// 		return'четное';

// 	}
// 	elseif($a != 0 && $a%2 != 0){

// 		return'не четное';
// 	}
// 	elseif($a == 0){
// 		return 'равно 0';
// 	}
	
// }

// function div($a, $b) {
// 	return $a * $b;
// }

// function num($int){
// 	if($int == 0){
// 		return '0';
// 	}
// 	elseif ($int%2 == 0){
// 		return'четное';
// 	}	
// 	return 'не четное';

// }
/*echo num(div(15,17));

echo '<br />'.num(18);*/
/*
$a = '';

if(!empty($a))
	
	echo 'yes';
else
	echo 'no';

if(isset($a))
	
	echo 'yes';
else
	echo 'no';

echo '<br />';

$str = '';
if(isset($str))
	echo 'isset';
*/
// $stroka = 'hello abc qwerty abc';

// $str = str_replace('abc','111',$stroka);

// //echo $str;

// $mass = explode(' ',$stroka);
// //var_dump($mass);

// foreach ($mass as $key => $value) {
// 	if ($value == 'abc'){
// 		$mass[$key] = '222';
// 	}
// }

// $str2 = implode(' ',$mass);

// echo $str2;

$str = 'привет мир';

$code = 'utf-8';

echo mb_strlen($str,$code);
