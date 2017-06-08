<?php
/**
Игральным картам присвоены следующие порядковые номера в зависимости от их достоинства: "валет" - 11, "дама" - 12, "король" - 13, "туз" - 14.
* Порядковые номера остальных карт соответствуют их названиям("семерка", "восмерка" и т. д.). Вам нужно разработать программу,
* которая выводила достоинство карты по заданному номеру, который будет вводить пользователь.
 */

$cards = array( 'hearts' => [],
    'diamonds' => [],
    'clubs' => [],
    'spades'=> []);

function init_cards($cards){
    foreach ($cards as $key=>$value){
        for($i=6;$i<=14;$i++){
            $cards[$key][$i] = $i;
        }
    }
    return $cards;
}
$cards = init_cards($cards);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Карты</title>
    <link rel="stylesheet" href="css.css"/>
</head>
<body>
<div class="wrap">
    <div class="main_div">
        <form action="hw3.php" method="post">
            <div class="select_div">
                <label>Выберите масть</label><br />
                <select name="mast">
                    <?php
                        foreach ($cards as $key => $value){
                            echo '<option value="'.$key.'">'. $key.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="select_div">
                <label>Выберите карту</label><br />
                <select name="karta">
                    <?php
                        foreach ($cards['hearts'] as $key => $value){
                            echo '<option value="'.$key.'">'.$key.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="clear_div"></div>
            <div class="button_div">
                <input type="submit" value="Подтвердить"/>
            </div>
        </form>
    </div>
</div>


</body>
</html>