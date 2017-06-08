<?php 
$mass = array();

$mass['q1'] = 2;
$mass['q2'] = 1;
$mass['q3'] = 3;

$str = 'Вы правильно ответили на вопрос №';
$str2 = 'Вы не правильно ответили на вопрос №';
$res = '';

$count=0;
$questnum = 1;

$mass2 = array(1,3);
$otvet = 'из 2-х правильных вы угадали';

foreach ($_GET['w1'] as $key => $value) {
	foreach ($mass2 as $value2){
		if($value == $value2){
			$count++;
		}	
	}
}



// foreach ($_GET['w1'] as $key => $value) {
// 	if(in_array($value, $mass2)){
// 		$count++;
// 	}
// }

// if (count($_GET['w1']) > count($mass2)){
// 	$qwe = 'Вы читер';
// }else{
// 	$qwe = '';
// }

//echo $otvet. $count. '<br />'. $qwe;
echo $otvet. $count;

/*
if(!empty($_POST['q1']) && $_POST['q1'] == $mass['q1']){
	$count++;
	$res.= $str. '1<br />';
}else{
	$res.= $str2.'1<br />';
}

if(!empty($_POST['q2']) && $_POST['q2'] == $mass['q2']){
	$count++;
	$res.= $str. '2<br />';
}else{
	$res.= $str2.'2<br />';
}

if(!empty($_POST['q3']) && $_POST['q3'] == $mass['q3']){
	$count++;
	$res.= $str. '3<br />';
}else{
	$res.= $str2.'3<br />';
}*/
/*
for ($i=1; $i <=3; $i++) { 
	if(!empty($_POST['q'.$i]) && $_POST['q'.$i] == $mass['q'.$i]){
		$count++;
		$res.= $str.$i. '<br />';
	}else{
		$res.= $str2.$i.'<br />';
	}
	}
*/
/*
foreach ($mass as $key => $value) {
	if (!empty($_POST[$key]) && $_POST[$key] == $mass[$key]){
			$count++;
	$res.= $str. $questnum.'<br />';

	}else{
		$res.= $str2. $questnum.'<br />';
	
	}
	$questnum++;
}


echo $res.'<br />';

echo 'Из трех вопросов Вы ответили на  '.$count;*/