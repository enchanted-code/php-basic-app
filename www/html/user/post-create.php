<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: /user/new.php');
    exit();
}

require_once "../../resources/db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$conn = create_conn();
create_user($conn, $username, $password);
$conn = null;

header('Location: /user/login.php');
exit();
?>
