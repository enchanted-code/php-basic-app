<?php
  session_start();
  require_once "../../resources/functions.php";
  require_once "../../resources/db.php";

  if (user_authenticated()) {
    header('Location: /index.php');
    exit();
  }

  $title = "Login";
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
        <h2>Login To An Existing Account</h2>
        <p>Accounts Counter: <?= $user_count ?></p>
        <form action="/user/post-login.php" method="post">
          <label for="username">Username:</label>
          <input type="text" name="username" id="username" required>
          <label for="password">Password:</label>
          <input type="password" name="password" id="password" required>
          <button type="submit">Login</button>
        </form>
        <a href="/user/new.php">Register Instead</a>
    </main>
    <?php template("footer"); ?>
</body>

</html>
