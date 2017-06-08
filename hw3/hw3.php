<?php
/**
Игральным картам присвоены следующие порядковые номера в зависимости от их достоинства: "валет" - 11, "дама" - 12, "король" - 13, "туз" - 14.
* Порядковые номера остальных карт соответствуют их названиям("семерка", "восмерка" и т. д.). Вам нужно разработать программу,
* которая выводила достоинство карты по заданному номеру, который будет вводить пользователь.
*/

//header("Location: hw3form.php");
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
    <div class="cards_div">
        <?php
        if (!empty($_POST['mast']) && !empty($_POST['karta'])){
            echo '<img src="images/'.$_POST['mast'].'/'.$_POST['karta'].'.jpg">';
        }else {header('Location: hw3.form.php'); exit;
        }
        ?>
    </div>
    <div class="cards_div">
        <a href="<?php echo $_SERVER['HTTP_REFERER']?>">Back</a>
    </div>
</div>
</body>
</html>
