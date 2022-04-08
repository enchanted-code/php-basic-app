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

    $sql = 'CREATE TABLE IF NOT EXISTS user(
        id INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(20) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY(id)
    )';
    $conn->exec($sql);
}

function create_user($conn, $username, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $sql->execute([$username, $password]);
}

function count_users($conn) {
    $sql = 'SELECT COUNT(id) FROM user';
    return $conn->query($sql)->fetch()[0];
}

function get_user_password($conn, $username) {
    $sql = $conn->prepare('SELECT password FROM user WHERE username=?');
    $sql->execute([$username]);
    $row = $sql->fetch();
    if ($row == false) {
        return null;
    }
    return $row[0];
}

function get_all_lecture_content($conn) {
    $sql = 'SELECT author, content FROM lecture_content';
    return $conn->query($sql);
}

function create_lecture_content($conn, $author, $content) {
    $sql = $conn->prepare("INSERT INTO lecture_content (author, content) VALUES (?, ?)");
    $sql->execute([$author, $content]);
}
