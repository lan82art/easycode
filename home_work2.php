<?php
/*
1. написать фунцию по типу str_replace,
которая будет принимать строку и проверять
все элементы и заменять их на другие
*
2. Вам нужно создать массив и заполнить его
случайными числами от 1 до 100 (функция rand).
Далее, вычислить произведение(сложение) тех элементов,
которые больше ноля и у которых парные индексы.
После вывести на экран произведение(сложение) элементов, которые
больше ноля и у которых нечетные индекс.
 */

function art_str_rep($source_string, $delimiter, $replase, $replasement){

  if (empty($source_string) && empty($delimiter) && empty($replase) && empty($replasement)) return false;

    $arr = explode($delimiter,$source_string);
    
    foreach ($arr as $key => $value) {
        if ($value == $replase){
            $arr[$key] = $replasement;
    }
}
    $result = implode($delimiter,$arr);

  
    return $result;
}

function generate_array($a = 1,$b = 100, $col = 10){
    $mass = array();
    for ($i = 0; $i <= $col; $i++) {
        $mass[$i] = rand($a, $b);
    }
    return $mass;
}

function print_aray($array){
    echo'<p>';
    foreach($array as $key => $value){
        if(is_numeric($key)) {
            if ($key % 2 == 0) {
                echo '<span style="color:red; font-weight: bold;">[' . $value . ']&nbsp</span>';
            } else {
                echo '<span style="color:blue; font-weight: bold;">[' . $value . ']&nbsp</span>';
            }
        }else echo '<span style="font-weight: bold;">'.$key.'=[' . $value . ']&nbsp</span>';
    }
    echo '</p>';
}

function calculate($array){

    $result = array();
    $result['chet'] = 0;
    $result['nechet'] = 0;

    for($i = 0;$i<=count($array);$i++){
        if($array[$i]>0){
            if($i%2 == 0){
                $result['chet'] = $result['chet'] + $array[$i];
            }
            else {
                $result['nechet'] = $result['nechet'] + $array[$i];
            }
        }
  
  }
    return $result;
}

//$source_string, $delimiter, $replace, $replacement

echo art_str_rep('xuz jhkdsdf xuz jhksdfs xuz',' ','xuz','art');
echo '<br />';
$massiv = generate_array();
print_aray($massiv);
$res = calculate($massiv);
print_aray($res);
