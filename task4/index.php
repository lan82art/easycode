<?php
session_start();

function generatePassword($length = 8){
    $chars = 'abdefhiknrstyz23456789';
    $numChars = strlen($chars);
    $string = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Captcha</title>
</head>
<body>
<h1>Captcha</h1>

<img src="image.php"/>

<form action="" method="post">
    <input type="text" name="ver" placeholder="проверка"/>
    <input type="submit" name="enter" value="Проверить"/>
</form>
<h1>

<?php
if(isset($_POST['enter'])){
    if(strcmp($_POST['ver'],$_SESSION['captcha']) == 0){
        echo 'TRUE';
    } else echo 'FALSE';
}
$_SESSION['captcha'] = generatePassword(5);

if(isset($_POST['enter'])) {

}
?>
</h1>
</body>
</html>



