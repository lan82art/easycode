<?php

/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.03.2017
 * Time: 9:31
 * 2. Вам нужно создать массив и заполнить его
случайными числами от 1 до 100 (функция rand).
Далее, вычислить произведение(сложение) тех элементов,
которые больше ноля и у которых парные индексы.
После вывести на экран произведение(сложение) элементов, которые
больше ноля и у которых нечетные индекс.
 */

class hw2
{
   public $mass;

function __construct($a = 1,$b = 100, $col = 10)
{

    for ($i = 0; $i <= $col; $i++) {
        $mass[$i] = rand($a, $b);
    }
    return $this->mass;
}

function calculate($array){

    $res_chet = 0;
    $res_nechet = 0;

    for($i = 0;$i<=count($array);$i++){
        if($array[$i]>0){
            if($i%2 == 0){
                $res_chet = $res_chet+$array[$i];
            }
            else {
                $res_nechet = $res_nechet + $array[$i];
            }
        }
    }
    $result = array();
    $result[0] = $res_chet;
    $result[1] = $res_nechet;

    return $result;
}

function print_aray(){
    foreach($array as $key => $value){
        echo $value.'<br />';
    }
}

}

