<?php
return (object) array(
    "db" => (object) array(
        "host" => $_ENV["DB_SERVER"],
        "type" => $_ENV["DB_TYPE"],
        "database" => $_ENV["DB_DATABASE"],
        "username" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
    ),
);
