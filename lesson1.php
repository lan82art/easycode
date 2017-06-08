<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	.form{
		margin: 0 auto;
		width: 200px; 
		background-color: #0010FF; 
		padding: 20px;
	}
</style>
	<title>Lesson 1</title>
</head>
<body>
	<div>
		<div class="form">
		<form action="" method="post">
			<input type="text" name="name">
			<p><input type="submit" name="ok" value="OK"></p>
		</form>
		</div>
		<div class="form">
			<?php 
				if (!isset($_POST['ok'])) {
					$text = '';
				}
				if (isset($_POST['name']) && !empty($_POST['name'])) {
					$text = stripslashes($_POST['name']);
					echo 'Hello' . ' '.$text;
				}
			?>
		</div>
	</div>
</body>
</html>