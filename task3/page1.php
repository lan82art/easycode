<?php
session_start();
$_SESSION['page'][]= $_GET['page'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Page1</title>
</head>
<body>
<h1>Page1</h1>


<a href="page2.php?page=page2">Page2</a>
<a href="page3.php?page=page3">Page3</a>
<a href="page4.php?page=page4">Page4</a>

</body>
</html>