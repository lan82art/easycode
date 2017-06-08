<?php
/* Реализовать страницу, на которую будут подтягиваться записи
из БД(Заголовок, и текст). Для того, чтобы их увидеть пользователю
необходимо пройти авторизацию или регистрацию. Также нужно заверстать
страницу. По возможности реализовать личный кабинет, где пользователь
сможет редактировать личные данные.
Доп. задание: Необходимо реализовать страницу, с которой можно
наполнять БД и удалять из нее записи.
*/
session_start();

require_once ('connection.php');

if (isset($_COOKIE['name'])) {
    //echo 'Cookie: ' . $_COOKIE['name'];

    $sql = "SELECT * FROM `users` WHERE `user` = '" . $_COOKIE['name'] . "'";
    if (!empty($res = mysqli_query($link, $sql))) {
        $result = mysqli_fetch_assoc($res);

        //if(!empty($result)){

        $_SESSION['auth'] = 1;
        $_SESSION['login']['name'] = $result['user'];
        //$_SESSION['login']['password'] = $result['password'];
        $_SESSION['login']['email'] = $result['email'];
        $_SESSION['login']['birthday'] = $result['birthday'];
        $_SESSION['login']['gender'] = $result['gender'];
    }
}
//unset($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
    <meta charset="UTF-8">
    <title>HomeWork 4</title>
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/side_menu.css">
</head>
<body>
<div class="wrap">
    <div class="container-fluid">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Главная <span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        if (!empty($_SESSION['auth'])){?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login']['name']?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?action=edit">Редактировать профиль</a></li>
                                    <li><a href="action_logout.php">Выход</a></li>
                                </ul>
                            </li>
                        <?php
                        }else {?>
                            <li><a href="index.php?action=login">Войти</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>

    <div class="container" style="padding: 70px 15px;">
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <?php
                if(!empty($_GET['action'])){
                    $action = $_GET['action'];
                }else{
                    $action = '';
                }
                switch ($action){
                    case 'login':
                        require_once 'login.php';
                        break;
                    case 'edit':
                        $_SESSION['res']['name'] = $_SESSION['login']['name'];
                        $_SESSION['res']['email'] = $_SESSION['login']['email'];
                        $_SESSION['res']['date'] = $_SESSION['login']['birthday'];
                        $_SESSION['gender_id'] = $_SESSION['login']['gender'];

                        $data = explode('-',$_SESSION['res']['date']);
                        $_SESSION['res']['year'] = $data[0];
                        $_SESSION['res']['month'] = $data[1];
                        $_SESSION['res']['day'] = $data[2];

                        require_once 'regform.php';
                        break;
                    case 'register':
                        require_once 'regform.php';
                        break;
                    case 'regdone':
                        echo 'Вы успешно зарегистрировались <a href="index.php?action=login">Войти</a>';
                        break;
                    case 'upddone':
                        echo 'Данные обновлены, перезайдите: <a href="action_logout.php">Выйти</a>';
                        //var_dump($_SESSION['res']);
                        break;
                    case 'error':
                        echo 'Вы ввели неверный логин и/или пароль. <a href="index.php?action=login">Повторить</a>';
                        break;

                    default:
                        if(!empty($_SESSION['auth'])) {
                            ?>
                            <div class="jumbotron">Вы залогинены</div>
                            <?php
                        }else {?>
                            <div class="jumbotron">Залогинтесь для просмотра контента</div>
                    <?php
                        }
                }
                ?>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <p class="pull-left"><span class="glyphicon glyphicon-copyright-mark"></span> Artem <?php echo  date('Y');?></p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>