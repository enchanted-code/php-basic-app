<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header('Location: content.php');
    exit();
}

require_once "../resources/db.php";

$author = $_POST['author'];
$content = $_POST['content'];

$conn = create_conn();
create_lecture_content($conn, $author, $content);
$conn = null;

header('Location: content.php');
exit();
?>
