<?php
function template($name, $atts = []) {
    $source = realpath(dirname(__FILE__) . "/templates/$name.html");
    if(file_exists($source)) {
        extract($atts);
        include $source;
    }
}
