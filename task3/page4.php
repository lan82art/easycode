<?php
session_start();
//$_SESSION['page'][]= $_GET['page'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Page4</title>
</head>
<body>

<h1>Page4</h1>

<?php
foreach ($_SESSION['page'] as $value){
    echo $value.'<br />';
}
unset($_SESSION['page']);
?>
<br />
<a href="page1.php?page=page1">Page1</a>
<a href="page2.php?page=page2">Page2</a>
<a href="page3.php?page=page3">Page3</a>

</body>
</html>