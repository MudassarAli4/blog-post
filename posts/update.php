<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php

if (isset($_GET['upd_id'])) {

  $id = $_GET['upd_id'];

  $select = $conn->query("SELECT * FROM posts where id ='$id'");
  $select->execute();
  $rows = $select->fetch(PDO::FETCH_OBJ);


  // if ($_SESSION['user_id'] !== $rows->user_id) {
  //   header("location: /index.php");
  // }


  if (isset($_POST['submit'])) {
    if ($_POST['title'] == '') {
      echo "<div class='alert alert-danger text-center ' role='alert'>
        Enter Title
      </div>";
    } else if ($_POST['subtitle'] == '') {
      echo "<div class='alert alert-danger text-center ' role='alert'>
        Enter Subtitle
      </div>";
    } else if ($_POST['body'] == '') {
      echo "<div class='alert alert-danger text-center ' role='alert'>
        Enter text
      </div>";
    } else {

      unlink("images/" . $rows->img . "");

      $title = $_POST['title'];
      $subtitle = $_POST['subtitle'];
      $body = $_POST['body'];
      $img = $_FILES['img']['name'];

      $dir = "images/" . basename($img);


      $update = $conn->prepare("UPDATE posts  SET title = :title, subtitle = :subtitle, body = :body, img = :img WHERE id ='$id'");

      $update->execute([
        ':title' => $title,
        ':subtitle' => $subtitle,
        ':body' => $body,
        ':img' => $img
      ]);

      if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)); {
        header("location: /index.php");
      }

      // header("location: index.php");
    }
  }
} else {
  header("location: /404.php");
}

?>


<form method="POST" action="update.php?upd_id=<?php echo $id; ?> " enctype="multipart/form-data" class="login-box">
  <!-- Email input -->
  <div class="form-outline mb-4 user-box">
    <input type="text" name="title" value="<?php echo $rows->title; ?>" id="form2Example1" class="form-control" />
    <?php echo "<label>Title</label>" ?>

  </div>
  <div class="form-outline mb-4 user-box">
    <input type="text" name="subtitle" value="<?php echo $rows->subtitle; ?>" id="form2Example1" class="form-control" />
    <?php echo "<label>Subtitle</label>" ?>
  </div>
  <div class="form-outline mb-4 user-box">
    <textarea type="text" name="body" id="form2Example1" class="form-control" rows="8"><?php echo $rows->body; ?></textarea>
    <?php echo "<label>Body</label>" ?>
  </div>


  <?php echo "<img src='images/" . $rows->img . "' width= 350px height = 200px >" ?>

  <div class="form-outline  mt-3 mb-4 user-box">
    <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
  </div>


  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>


</form>



</div>
<?php require "../includes/footer.php" ?>