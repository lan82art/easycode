<?php
session_start();

$login = 'login';
$password = 'password';

if(!empty($_POST['exit'])){
    unset($_SESSION['auth']);
    session_destroy();
    header('Location: /lesson7.php');
    exit;
}

/*LOGIN*/
if(isset($_POST['login']) && trim($_POST['login']) == $login){
    $flag_login = 'on';
    unset($_SESSION['error_login']);
    $_SESSION['login'] = $login;

} else {
    $_SESSION['error_login'] = 'Login error';

    unset($_SESSION['login']);
}

/*END LOGIN*/

/*PASSWORD*/
if(isset($_POST['password']) && trim($_POST['password']) == $password){
    $flag_password = 'on';
    unset($_SESSION['error_password']);
    $_SESSION['password'] = $password;

} else {
    $_SESSION['error_password'] = 'Password error';
    unset($_SESSION['password']);
}
/*END PASSWORD*/


if(!empty($flag_login) && !empty($flag_password)){
    $_SESSION['auth'] = 1;

}
header('Location: /lesson7.php');

