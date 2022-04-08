<?php
session_start();
require_once "../../resources/functions.php";
user_logout();
header('Location: /user/login.php');
exit();
?>
