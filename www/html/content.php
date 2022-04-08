<?php
  session_start();
  require_once "../resources/functions.php";
  require_once "../resources/db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <?php template("head", array("title"=>"Lecture Content")); ?>
<body>
  <?php template("header", array("title"=>"Lecture Content", "authenticated"=>user_authenticated())); ?>
  <main>
    <form action="post-content.php" method="post">
      <h2>Add Content</h2>
      <label for="author">Author:</label>
      <input type="text" name="author" id="author" maxlength=255 required>
      <label for="content">Content:</label>
      <textarea name="content" id="content" cols="30" rows="10" maxlength=255 required></textarea>
      <button type="submit">Submit</button>
      </form>
      <h2>Recorded Content</h2>
      <table>
        <thead>
          <tr>
            <th>Author</th>
            <th>Content</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $conn = create_conn();
        $content_rows = get_all_lecture_content($conn);

        foreach ($content_rows as $row) {
          echo '<tr>';
          echo '<td>' . $row['author'] . '</td>';
          echo '<td>' . $row['content'] . '</td>';
          echo '</tr>';
        }
        ?>
        </tbody>
      </table>
  </main>
  <?php template("footer"); ?>
</body>

</html>
