<?php
define('HOST','localhost');
define('USER','root');
define('PASS','Creation');
define('DATABASE','easycode');

$link = mysqli_connect(HOST,USER,PASS,DATABASE) or die('Error connection');

$rowsonpage = 10;

$sql = "SELECT COUNT(*) AS count FROM users";
$co = mysqli_query($link,$sql);
$res = mysqli_fetch_assoc($co);
$pagecol = ceil($res['count']/$rowsonpage);

if (!empty($_GET['page'])){
    $page = $_GET['page'];
	$limit = ($_GET['page'] - 1) * $rowsonpage;
}else {
    $limit = 0;
    $page = 1;
}

$sql = "SELECT user, password FROM users LIMIT ".$limit.",".$rowsonpage;
//var_dump($sql);exit;

$query = mysqli_query($link,$sql);

while($result[] = mysqli_fetch_assoc($query)) {
    $users = $result;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
	<meta charset="UTF-8">
    <script src="../vendor/components/jquery/jquery.min.js"></script>
    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="../vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body>
<div class="row">
    <div class="col-xs-4"></div>
    <div class="col-xs-4">
        <?php
            foreach($users as $user){
                echo 'Name: '.$user['user'].', Pass: '.$user['password'].'<br />';
            }
        ?>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php
                for ($i=1;$i<=$pagecol;$i++){
                    if($i == $page){
                        echo '<li class="active"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                    } else {
                        echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                }
                ?>
            </ul>
        </nav>
    </div>
    <div class="col-xs-4"></div>
</div>

</body>
</html>