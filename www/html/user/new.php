<?php
  session_start();
  require_once "../../resources/functions.php";
  require_once "../../resources/db.php";
  $title = "New User";
  $conn = create_conn();
  $user_count = count_users($conn);
  $conn = null;
?>
<!DOCTYPE html>
<html lang="en">
    <?php template("head", array("title"=>$title)); ?>
<body>
    <?php template("header", array("title"=>$title, "authenticated"=>user_authenticated())); ?>
    <main>
        <h2>Register A New Account</h2>
        <p>Accounts Counter: <?= $user_count ?></p>
        <form action="/user/post-login.php" method="post">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>
          <button type="submit">Register</button>
        </form>
        <a href="/user/login.php">Login Instead</a>
    </main>
    <?php template("footer"); ?>
</body>

</html>
