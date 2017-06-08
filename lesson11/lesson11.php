<?php
define('HOST','localhost');
define('USER','root');
define('PASS','Creation');
define('DATABASE','easycode');

$link = mysqli_connect(HOST,USER,PASS,DATABASE) or die('Error connection');


//$sql = "SELECT * FROM users";

//$query = mysqli_query($link,$sql);

//var_dump($query);
//
//while($result[] = mysqli_fetch_assoc($query)){
//    $users = $result;
//}
//
//foreach($users as $user){
//    echo 'Name: '.$user['user'].', Pass: '.$user['password'].'<br />';
//}

//$sql_insert = "INSERT INTO users SET user = 'User3', password = 'pass3'";
//mysqli_query($link,$sql_insert);
//
//$sql_delete = "DELETE FROM users WHERE MOD(id,2)= 0";
//$sql_update = "UPDATE users SET password = 'xxxxx' WHERE MOD(id,2)= 0";
//for ($i = 1; $i < 51; $i++){
//    $insert = "INSERT INTO users SET user = 'user".$i."', password = 'pass".$i."'";
//    mysqli_query($link,$i nsert);
//}

$sql_select = "SELECT user, password FROM users ORDER BY id DESC LIMIT 0,9";

$query = mysqli_query($link,$sql_select);

while($result[] = mysqli_fetch_assoc($query)){
    $users = $result;
}
foreach($users as $user){
    echo 'Name: '.$user['user'].', Pass: '.$user['password'].'<br />';
}

$select_count = "SELECT COUNT(*) AS count_page FROM users";

$co = mysqli_query($link,$select_count);
$res_co = mysqli_fetch_assoc($co);

echo $res_co['count_page'];


//mysqli_query($link,$sql_update);
