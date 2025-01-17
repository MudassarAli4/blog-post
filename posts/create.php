<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php

$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$category = $categories->fetchAll(PDO::FETCH_OBJ);

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
          Enter Text
        </div>";
  } else if ($_POST['category_id'] == '') {
    echo "<div class='alert alert-danger text-center ' role='alert'>
          Select Category
        </div>";
  } else {

    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $body = $_POST['body'];
    $category_id = $_POST['category_id'];
    $img = $_FILES['img']['name'];
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['username'];

    $dir = "images/" . basename($img);


    $insert = $conn->prepare("INSERT INTO posts (title, subtitle, body,category_id, img, user_id,user_name) VALUES (:title, :subtitle, :body,:category_id,:img, :user_id,:user_name);");
    $insert->execute([

      ':title' => $title,
      ':subtitle' => $subtitle,
      ':body' => $body,
      ':category_id' => $category_id,
      ':img' => $img,
      ':user_id' => $user_id,
      ':user_name' => $user_name

    ]);

    if (move_uploaded_file($_FILES['img']['tmp_name'], $dir)); {
      header("location: /index.php");
    }
  }
}



?>


<form method="POST" action="create.php" enctype="multipart/form-data" class="login-box">
    <!-- Email input -->
    <div class="form-outline mb-4 user-box">
        <input type="text" name="title" id="form2Example1" class="form-control" />
        <label>Title</label>
    </div>

    <div class="form-outline mb-4 user-box">
        <input type="text" name="subtitle" id="form2Example1" class="form-control" />
        <label>Sub Title</label>
    </div>

    <div class="form-outline mb-4 user-box">
        <select name="category_id" id="category" class="form-select" aria-label="Default select example">

            <option selected>Select Category</option>
            <?php foreach ($category as $cat) : ?>
            <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
            <?php endforeach; ?>

        </select>
    </div>
    <div class="form-outline mb-4 user-box">
        <textarea type="text" name="body" id="form2Example3" class="form-control" rows="8" required></textarea>
        <label for="form2Example3">Body:</label>
    </div>


    <div class="form-outline mb-4 user-box">
        <input type="file" name="img" id="img" class="form-control" placeholder="image" required>
        <label>Image</label>
    </div>


    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center submit">create</button>


</form>


<?php require "../includes/footer.php" ?>