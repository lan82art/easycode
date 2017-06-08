<?php
session_start();

$_SESSION['login'] = array();
$_SESSION['auth'] = 0;
$_SESSION['error'] = array();
require_once ('connection.php');

if (!empty($_POST['login']) && !empty($_POST['password'])){

    $sql = "SELECT * FROM `users` WHERE `user` = '".$_POST['login']."' AND `password`  = '".sha1($_POST['password'])."'";
    $res = mysqli_query($link,$sql);
    $result = mysqli_fetch_assoc($res);
    if(!empty($result)){
        $_SESSION['auth'] = 1;
        $_SESSION['login']['name'] = $result['user'];
        //$_SESSION['login']['password'] = $result['password'];
        $_SESSION['login']['email'] = $result['email'];
        $_SESSION['login']['birthday'] = $result['birthday'];
        $_SESSION['login']['gender'] = $result['gender'];

        setcookie('name',$result['user'],time() + 300);

        header('Location: index.php'); exit;
    }
    else {
        header('Location: index.php?action=error'); exit;
    }
}
