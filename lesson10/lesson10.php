<?php
$title = 'Lesson 10';
require_once "header.php";
?>

<div style="clear:both; margin-top: 80px;"></div>
<?php if(empty($_GET['story'])){?>
<p>текст главной страницы</p>
<?php }elseif(isset($_GET['story']) && $_GET['story'] == 1) {?>
<form method="post" action="form10.php">
    <label>
        <span class="atr">Имя: </span>
        <input type="text" name="name" placeholder="Имя" value="<?php if (isset($_SESSION['name'])){ echo $_SESSION['name']; }?>"/>
    </label>

    <label>
        <span class="atr">Телефон: </span>
        <input type="text" name="phone" placeholder="Телефон" />
        <?php if(isset($_SESSION['error']) && $_SESSION['error']!= ''){?>
        <br /><span style="color:red"> <?php echo $_SESSION['error']?></span>
    <?php } ?>
    </label>

    <label>
        <span class="atr">Сообщение: </span><textarea name="message"></textarea>
    </label>
    <input type="submit" class="knop" value="Отправить"
</form>
<?php } elseif(isset($_GET['story']) && $_GET['story'] == 2){ ?>
<p>sjhksjhfksjdfhksjdfsdfsdfsdlvd mvklsbnljgnjkbngjksjfgnbkjsfgnkbjsnfgkbjnsfkgjbnf</p>


<?php }else {?>
<h1>Страница не найдена!!!</h1>
<?php }?>
</div>
<?php
require_once "footer.php";
?>

