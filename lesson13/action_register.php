<?php
session_start();

$charset = 'utf-8';

    require_once('../functions.php');
    require_once ('connection.php');

    $_SESSION['res'] = array();
    $_SESSION['error'] = array();
    $_SESSION['gender_id'] = '';

    if (isset($_POST['regsubmit']) || isset($_POST['update'])) {

        if (!empty($_POST['name'])) {

            $len = iconv_strlen(trim($_POST['name']), $charset);
            $space_quantity = mb_substr_count(trim($_POST['name']), ' ', $charset);

            if ($space_quantity == 0 && $len > 4 && $len <= 15) {
                $_SESSION['res']['name'] = $_POST['name'];
                unset($_SESSION['error']['name']);

                if (isset($_POST['regsubmit'])){
                    $sql = "SELECT COUNT(user) AS userc FROM users WHERE user = '".$_SESSION['res']['name']."'";
                    $select_name = mysqli_query($link,$sql);
                    $res = mysqli_fetch_assoc($select_name);
                    if ($res['userc'] != 0) {
                        $_SESSION['error']['name'] = 'Такой логин уже есть';
                        unset($_SESSION['res']['name']);
                    }
                }
            } else {
                $_SESSION['error']['name'] = 'Имя должно быть больше 4 и меньше 15 символов и состоять из одного слова';
                unset($_SESSION['res']['name']);
            }

        } else {
            $_SESSION['error']['name'] = 'Имя не может быть пустым';
            unset($_SESSION['res']['name']);
        }

        if(!empty($_POST['pass']) && !empty($_POST['pass2'])){
            $pass1 = sha1($_POST['pass']);
            $pass2 = sha1($_POST['pass2']);

            if ($pass1 == $pass2){
                $_SESSION['res']['pass'] = $pass1;
                unset($_SESSION['error']['pass']);
            } else {
                $_SESSION['error']['pass'] = 'Пароли не совпадают';
                unset($_SESSION['res']['pass']);
            }
        } elseif(!isset($_POST['update'])) {
            $_SESSION['error']['pass'] = 'Пароль не может быть пустым';
            unset($_SESSION['res']['pass']);
        }
        if (!empty($_POST['email'])) {
            $dog_quantity = mb_substr_count(trim($_POST['email']), '@', $charset);

            if ($dog_quantity == 1) {
                $_SESSION['res']['email'] = $_POST['email'];
                unset($_SESSION['error']['email']);

                if (isset($_POST['regsubmit'])) {

                    $sql = "SELECT COUNT(email) AS emailc FROM users WHERE email = '" . $_SESSION['res']['email'] . "'";
                    $select_name = mysqli_query($link, $sql);
                    $res = mysqli_fetch_assoc($select_name);
                    if ($res['emailc'] != 0) {
                        $_SESSION['error']['email'] = 'Такой email уже существует';
                        unset($_SESSION['res']['email']);
                    }
                }
            } else {
                $_SESSION['error']['email'] = 'Не валидная электронная почта';
                unset($_SESSION['res']['email']);
            }
        } else {
            $_SESSION['error']['email'] = 'Мыло не может быть пустым';
            unset($_SESSION['res']['email']);
        }
        $gender = array('Мужской', 'Женский');

        if (!empty($_POST['gender'])) {
            $_SESSION['res']['gender'] = $gender[$_POST['gender'] - 1];
            $_SESSION['gender_id'] = $_POST['gender'];
            unset($_SESSION['error']['gender']);
        } else {
            $_SESSION['error']['gender'] = 'Укажите Ваш пол';
            unset($_SESSION['res']['gender']);
            unset($_SESSION['gender_id']);
        }
        if (!empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day'])) {
            if (checkdate($_POST['month'], $_POST['day'], $_POST['year'])) {
                $_SESSION['res']['year'] = $_POST['year'];
                $_SESSION['res']['month'] = $_POST['month'];
                $_SESSION['res']['day'] = $_POST['day'];
                $_SESSION['res']['date'] = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
            } else {
                $_SESSION['error']['date'] = 'Вы ввели некорректную дату';
            }
        } else {
            $_SESSION['error']['date'] = 'Заполните дату';
            unset($_SESSION['res']['year']);
            unset($_SESSION['res']['month']);
            unset($_SESSION['res']['day']);
            unset($_SESSION['res']['date']);
        }
    }
    if(empty($_SESSION['error']) && !empty($_SESSION['res'])){
         if (isset($_POST['update']) && !empty($_SESSION['res']['pass'])) {
            $sql = "UPDATE `users` SET `user` = '" . $_SESSION['res']['name'] . "', `password` = '" . $_SESSION['res']['pass'] . "',
         `email` = '" . $_SESSION['res']['email'] . "', `birthday` = '" . $_SESSION['res']['date'] . "', `gender` = '" . $_SESSION['gender_id'] . "' 
         WHERE `user` = '".$_SESSION['login']['name']."'";
            mysqli_query($link, $sql);
            //unset($_SESSION['res']);
        } elseif(isset($_POST['update'])) {
            $sql = "UPDATE `users` SET `user` = '" . $_SESSION['res']['name'] . "', `email` = '" . $_SESSION['res']['email'] . "', `birthday` = '" . $_SESSION['res']['date'] . "', `gender` = '" . $_SESSION['gender_id'] . "' 
         WHERE `user` = '".$_SESSION['login']['name']."'";
            mysqli_query($link, $sql);
            //unset($_SESSION['res']);
        }
        else {
            $sql = "INSERT INTO `users` SET `user` = '" . $_SESSION['res']['name'] . "', `password` = '" . $_SESSION['res']['pass'] . "',
         `email` = '" . $_SESSION['res']['email'] . "', `birthday` = '" . $_SESSION['res']['date'] . "', `gender` = '" . $_SESSION['gender_id'] . "'";
            mysqli_query($link, $sql);
            unset($_SESSION['res']);
        }

        $_SESSION['login']['name'] = $_SESSION['res']['name'];
        $_SESSION['login']['email'] = $_SESSION['res']['email'];
        $_SESSION['login']['birthday'] = $_SESSION['res']['date'];
        $_SESSION['login']['gender'] = $_SESSION['gender_id'];

        //echo $sql; exit;
        //save all to database
        if(isset($_POST['update'])){
            unset ($_POST['regsubmit']); unset($_POST['update']);
            header('Location: index.php?action=upddone');
            exit;
        }else {
            unset ($_POST['regsubmit']); unset($_POST['update']);
            header('Location: index.php?action=regdone');
            exit;
        }
    }else {
        //return to regform
        if(isset($_POST['update'])){
            unset ($_POST['regsubmit']); unset($_POST['update']);
            header('Location: index.php?action=edit'); exit;
        } else {
            unset ($_POST['regsubmit']); unset($_POST['update']);
            header('Location: index.php?action=register'); exit;
        }
    }