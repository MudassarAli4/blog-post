<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php

if (isset($_GET['prof_id'])) {

  $id = $_GET['prof_id'];

  $select = $conn->query("SELECT * FROM user where id ='$id'");
  $select->execute();
  $rows = $select->fetch(PDO::FETCH_OBJ);

  $selectUser = $conn->prepare("SELECT * FROM user WHERE id = :id");
  $selectUser->bindParam(':id', $id, PDO::PARAM_INT);
  $selectUser->execute();
  $user = $selectUser->fetch(PDO::FETCH_OBJ);


  if ($_SESSION['user_id'] !== $rows->id) {
    header("location: /index.php");
  }

  $selectPosts = $conn->prepare("SELECT * FROM posts WHERE user_id = :user_id");
  $selectPosts->bindParam(':user_id', $user->id, PDO::PARAM_INT);
  $selectPosts->execute();
  $posts = $selectPosts->fetchAll(PDO::FETCH_OBJ);


  if (isset($_POST['submit'])) {
    if ($_POST['email'] == '') {
      echo "<div class='alert alert-danger text-center ' role='alert'>
        Enter Email
      </div>";
    } else if ($_POST['username'] == '') {
      echo "<div class='alert alert-danger text-center ' role='alert'>
        Enter Username
      </div>";
    } else {

      $email = $_POST['email'];
      $username = $_POST['username'];


      $update = $conn->prepare("UPDATE user  SET email = :email, username = :username WHERE id ='$id'");

      $update->execute([
        ':email' => $email,
        ':username' => $username
      ]);



      header("location: profile.php?prof_id=" . $_SESSION['user_id'] . "");
    }
  }
} else {
  header("location: /404.php");
}

?>


<form method="POST" action="profile.php?prof_id=<?php echo $rows->id; ?>" enctype="multipart/form-data"
    class="login-box">
    <!-- Email input -->
    <div class="form-outline mb-4 user-box">
        <input type="email" name="email" value="<?php echo $rows->email; ?>" id="form2Example1" class="form-control"
            placeholder="email" />
        <?php echo "<label>Email</label>" ?>

    </div>
    <div class="form-outline mb-4 user-box">
        <input type="text" name="username" value="<?php echo $rows->username; ?>" id="form2Example1"
            class="form-control" placeholder="username" />
        <?php echo "<label>Username</label>" ?>
    </div>



    <!-- Submit button -->
    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center submit">Update</button>
</form>

<div style="text-align: center; color: wheat; padding: 10px; ">
    <h2>My POSTS</h2>
</div>

<!-- Display user's posts -->
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7 posts">
        <?php foreach ($posts as $post) : ?>

        <!-- Post preview-->
        <div class="post-preview blog-post" style="background-image: url('/posts/images/<?php echo $post->img ?>'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">
            <a href="/posts/post.php?post_id=<?php echo $post->id ?>">
                <h2 class="post-title"><?php echo $post->title; ?></h2>
                <h3 class="post-subtitle"><?php echo $post->subtitle; ?></h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!" class="userName"><?php echo $user->username; ?> on</a>
                <?php echo date('M', strtotime("$post->created_at")) . "," . date('d', strtotime("$post->created_at")) . " " . date('Y', strtotime("$post->created_at")); ?>
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        <?php endforeach; ?>
    </div>
</div>



</div>
<?php require "../includes/footer.php" ?>