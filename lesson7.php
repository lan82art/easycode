<?php
session_start();
//session_destroy();
if (!empty($_SESSION['auth'])){?>
<br /><br /><br/>
    <form action="form7.php" method="post">
        <input type="submit" name="exit" value="Exit"/>
    </form>
<p>Вы авторизировались на сайте</p>
<?php } else {?>

<form action="/form7.php" method="post" >
    <input type="text" name="login" placeholder="login" value="<?php
    if(!empty($_SESSION['login'])){ echo $_SESSION['login'];}?>"/>
    <?php if(!empty($_SESSION['error_login'])){echo 'login error';}?>
    <br />
    <input type="password" name="password" placeholder="password" value="<?php
    if(!empty($_SESSION['password'])){ echo $_SESSION['password'];}?>"/>
    <?php if(!empty($_SESSION['error_password'])){echo 'password error';}?>
    <br/>
    <input type="submit" value="OK"/>
</form>
<?php }?>