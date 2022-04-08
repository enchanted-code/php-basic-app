<?php
    session_start();
    require_once "../resources/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php template("head", array("title"=>"Home")); ?>
<body>
    <?php template("header", array("title"=>"Home", "authenticated"=>user_authenticated())); ?>
    <main>
        <h2>Welcome Home</h2>
    </main>
    <?php template("footer"); ?>
</body>

</html>
