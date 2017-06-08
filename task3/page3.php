<?php
session_start();
$_SESSION['page'][]= $_GET['page'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page3</title>
</head>
<body>
<h1>Page3</h1>


<a href="page1.php?page=page1">Page1</a>
<a href="page2.php?page=page2">Page2</a>
<a href="page4.php?page=page4">Page4</a>


</body>
</html>