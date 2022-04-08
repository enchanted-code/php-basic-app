<?php
  session_start();
  require_once "../resources/functions.php";
  require_once "../resources/db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php template("head", array("title"=>"Connection Test")); ?>
<body>
  <?php template("header", array("title"=>"Connection Test", "authenticated"=>user_authenticated())); ?>
  <main>
  <?php
    try {
      $conn = create_conn();
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
      create_tables($conn); // TODO: move
      $conn = null;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  ?>
  </main>
  <?php template("footer"); ?>
</body>

</html>
