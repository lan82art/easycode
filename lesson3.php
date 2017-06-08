<?php 
// $x = 10;
// while (  $x >= 1) {
// 	echo $x. ' - ';
// 	$x--;
// }
// $y = 11;
// do {	
	
//  	echo $y. ' - ';
//  	$y--;
// } while ( $y <= 10 && $y > 0);


// for ($i=1900; $i <= 2020; $i++) { 
// 	if ($i%4 == 0) {
// 			echo $i. ' ';
// 	}

// }

// $arr = array();

// for ($i=1; $i <=20 ; $i++){
// 	$arr[$i] = $i * $i; 
//  }

//  for ($i=1; $i <= count($arr) ; $i++){
  
//   if ($i==8) {
//   	continue;
//   }
//   echo 'Key: '. $i . ' Value: ' . $arr[$i] . '<br/>';
//  }
 
// foreach ($arr as $key => $value) {
//  	echo 'Key: '. $key . ' Value: ' . $value . '<br/>';
//  }

// foreach ($arr as $value) {
// 	echo ' Value: ' . $value . '<br/>';
// }

?>
<style type="text/css">
	table,td,tr{
		border-collapse: collapse; border:solid;
	}
</style>
<?php
 for ($i=1; $i <= 9; $i++) { 
 	for ($j=1; $j <= 9 ; $j++) { 
 		$arr[$i][$j] = $i * $j ;
 		//echo $i.'*'.$j.'='.$arr[$i][$j].'<br/>';
 	}
 }

echo '<table>';
foreach ($arr as $key1 => $value1) {
	echo'<tr>';
	foreach ($value1 as $key2 => $value2) {
		echo '<td>'.$key2 .'*'.$key1 .'='.$value2. '</td>';
	}
	echo'</tr>';
}
echo '</table>';

 for ($i=1900; $i <= 2020; $i++) { 
 	if ($i%4 == 0) {
   			$visok[] = $i;

 	}
 	else $nevisok[]=$i;
}

echo 'Visok';
echo '<br>';
foreach ($visok as $value) {
	echo $value;
}
echo '<br>';
echo 'nevisok';
echo '<br>';
foreach ($nevisok as $value) {
	echo $value;
}