<?php
function create_conn() {
    $config = include_once(realpath(dirname(__FILE__) . "/config.php"));
    $config = $config->db;

    $servername = $config->host;
    $db_type = $config->type;
    $database = $config->database;
    $username = $config->username;
    $password = $config->password;

    $conn = new PDO("$db_type:host=$servername;dbname=$database", $username, $password);
    return $conn;
}

function create_tables($conn) {
    $sql = 'CREATE TABLE IF NOT EXISTS lecture_content(
        id INT NOT NULL AUTO_INCREMENT,
        author VARCHAR(255) NOT NULL,
        postdate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        content VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
    )';
    $conn->exec($sql);
}

function get_all_lecture_content($conn) {
    $sql = 'SELECT author, content FROM lecture_content';
    return $conn->query($sql);
}

function create_lecture_content($conn, $author, $content) {
    $sql = $conn->prepare("INSERT INTO lecture_content (author, content) VALUES (?, ?)");
    $sql->execute([$author, $content]);
}
