<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: /user/login.php');
    exit();
}
session_start();

require_once "../../resources/functions.php";
require_once "../../resources/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = create_conn();
$hashed_password = get_user_password($conn, $username);
$conn = null;

if (!isset($hashed_password) || !password_verify($password, $hashed_password)) {
    header('Location: /user/login.php');
    exit();
}

user_login($username);

header('Location: /index.php');
exit();
?>
