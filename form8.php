<?php
session_start();
require_once ('functions.php');

//echo '<p>Вы выбрали день недели: '.week($_POST['week']).'</p>';

$res = '';
$_SESSION['res'] = array();
$_SESSION['error'] = array();
if (!empty($_POST['gender'])){
    if($_POST['gender'] == 1){
        $res .= 'Man <br />';
    }else{
        $res .= 'Woman <br />';
    }
}else {
    $_SESSION['error']['gender'] = 'Choose gender, please';
}

if(!empty($_POST['week'])){
    $res .= 'You have choose day of week: '.week($_POST['week']).'<br />';
}else {
    $_SESSION['error']['week'] = 'Choose day of week, please';
}
if(!empty($_POST['comment'])){
    $comment = explode(' ',$_POST['comment']);
    $mass = array('привет','как','дела');
    foreach ($comment as $key => $value) {
        if(in_array($value,$mass)){
            $comment[$key] = 'no';
        }
    }
    $newstr = implode(' ',$comment);
    $res .= $newstr;
}
$_SESSION['res'] = $res;
header('Location: /lesson8.php'); exit;
?>

<a href="lesson8.php">Back</a>
