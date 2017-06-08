<?php
session_start();

if($_SESSION['auth']){
    if(!empty($_SESSION['login']['name']) && !empty($_SESSION['login']['password'])){
        $sql = "SELECT * FROM `users` WHERE `user` = '".$_SESSION['login']['name']."' AND `password`  = '".sha1($_SESSION['login']['password'])."'";
        $res = mysqli_query($link,$sql);
        $result = mysqli_fetch_assoc($res);
        if(!empty($result)){?>

        <?php}


    }
}