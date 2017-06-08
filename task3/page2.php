<?php
session_start();
$_SESSION['page'][]= $_GET['page'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page2</title>
</head>
<body>
<h1>Page2</h1>


<a href="page1.php?page=page1">Page1</a>
<a href="page3.php?page=page3">Page3</a>
<a href="page4.php?page=page4">Page4</a>


</body>
</html>