<?php
function template($name, $atts = []) {
    $source = realpath(dirname(__FILE__) . "/templates/$name.html");
    if(file_exists($source)) {
        extract($atts);
        include $source;
    }
}

function user_authenticated() {
    if (isset($_SESSION["username"])) {
        return true;
    }
    return false;
}

function user_login($username) {
    $_SESSION["username"] = $username;
}

function user_logout() {
    $_SESSION["username"] = null;
}
