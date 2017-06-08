<?php
session_start();

unset($_SESSION['auth']);
unset($_SESSION['login']);
unset($_SESSION['error']);
unset($_SESSION['res']);


header('Location: index.php'); exit;