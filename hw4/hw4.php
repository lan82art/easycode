<?php
session_start();
$charset = 'utf-8';
?><meta charset="utf-8"><?php
$_SESSION['res'] = array();
$_SESSION['error'] = array();
$_SESSION['gender_id'] = '';
//unset($_SESSION);
/*
 * Форма. В форме поля:
 * Имя,
 * Мыло,
 * Дата рождения (3 селекта: число, месяц,год),
 * Пол (радио),
 * Поле сообщения(textarea).

Валидация полей.
Поле имени должно содержать только одно слово, должно быть не менее 4 символов и не более 15 символов.
Поле мыло далжно содержать "собачку".
Поля даты рождения нужно реализовать таким образом, при котором при выборе 31 февраля выдаст ошибку, чтобы все три поля были заполненными, а высокосный год не учитывать.
Поле пол не должно быть пустым.

Поле сообщения. ПРОСТАЯ ЗАДАЧА: не должно быть пустым, содержать не менее 25 символов; заменить неприличных слов;
БОЛЕЕ СЛОЖНАЯ ЗАДАЧА: нужно сделать, чтобы все русские символы перевелись на латинские так, чтобы русские слова читались английскими буквами.

Вывести надо:
1) Ваше имя: (имя)
2) Ваше мыло: (мыло)
3) Вам (количество полных) лет
4) Ваш пол: (пол)
5) (Сообщение) */
require_once ('../functions.php');
if (isset($_POST['submit'])){
    if (!empty($_POST['name'])) {

        $len = iconv_strlen(trim($_POST['name']), $charset);
        $space_quantity = mb_substr_count(trim($_POST['name']), ' ', $charset);

        if ($space_quantity == 0 && $len > 4 && $len <= 15) {
            $_SESSION['res']['name'] = $_POST['name'];
            unset($_SESSION['error']['name']);
        } else {
            $_SESSION['error']['name'] = 'Имя должно быть больше 4 и меньше 15 символов и состоять из одного слова';
            unset($_SESSION['res']['name']);
        }
    } else {
        $_SESSION['error']['name'] = 'Имя не может быть пустым';
        unset($_SESSION['res']['name']);
    }

    if (!empty($_POST['email'])) {
        $dog_quantity = mb_substr_count(trim($_POST['email']), '@', $charset);

        if ($dog_quantity == 1) {
            $_SESSION['res']['email'] = $_POST['email'];
            unset($_SESSION['error']['email']);
        } else {
            $_SESSION['error']['email'] = 'Не валидная электронная почта';
            unset($_SESSION['res']['email']);
        }
    } else {
        $_SESSION['error']['email'] = 'Мыло не может быть пустым';
        unset($_SESSION['res']['email']);
    }
    $gender = array('Мужской','Женский');

    if (!empty($_POST['gender'])) {
        $_SESSION['res']['gender'] = $gender[$_POST['gender']-1];
        $_SESSION['gender_id'] = $_POST['gender'];
        unset($_SESSION['error']['gender']);
    } else {
        $_SESSION['error']['gender'] = 'Укажите Ваш пол';
        unset($_SESSION['res']['gender']);
        unset($_SESSION['gender_id']);
    }
    if (!empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day'])) {
        if (checkdate($_POST['month'],$_POST['day'],$_POST['year'])) {
            $_SESSION['res']['year'] = $_POST['year'];
            $_SESSION['res']['month'] = $_POST['month'];
            $_SESSION['res']['day'] = $_POST['day'];
        }else {
            $_SESSION['error']['date'] = 'Вы ввели некорректную дату';
        }
    }else {
        $_SESSION['error']['date'] = 'Заполните дату';
        unset($_SESSION['res']['year']);
        unset($_SESSION['res']['month']);
        unset($_SESSION['res']['day']);
    }
    $text_len = iconv_strlen($_POST['text']);
    if (!empty($_POST['text']) && $text_len > 25){

        $_SESSION['res']['text'] = art_str_rep($_POST['text'],' ','бля','я огорчен');
        $_SESSION['res']['text2'] = translit($_SESSION['res']['text']);

        }else {
        $_SESSION['error']['text'] = 'Ошибки в тексте';
    }
}
//var_dump($_SESSION['error']);exit;
header('Location: form.php'); exit;