<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php

if (isset($_SESSION['username'])) {
  header("location: /index.php");
}

if (isset($_POST['submit'])) {

  if ($_POST['email'] == '') {
    echo "<div class='alert alert-danger text-center ' role='alert'>
          Enter Email
        </div>";
  } else if ($_POST['password'] == '') {
    echo "<div class='alert alert-danger text-center ' role='alert'>
          Enter Password
        </div>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = $conn->prepare("SELECT * FROM user WHERE email = '$email'");
    $login->execute();

    $row = $login->FETCH(PDO::FETCH_ASSOC);


    //  number of rows after executing query  $login->rowcount();

    if ($login->rowcount() > 0) {

      if (password_verify($password, $row['mypassword'])) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];

        header("location: /index.php");
        echo "Logged in";
      } else {
        echo "<div class='alert alert-danger text-center ' role='alert'>
                            The Email or password is wrong
                          </div>";
      }
    } else {
      echo "<div class='alert alert-danger text-center ' role='alert'>
                        The Email or password is wrong
                      </div>";
    }
  }
}

?>


<form method="POST" action="login.php" class="login-box">
  <h2>Login</h2>
  <!-- Email input -->
  <div class="form-outline user-box">
    <input type="email" name="email" id="form2Example1" class="form-control" />
    <label>Email</label>
  </div>
  <!-- Password input -->
  <div class="form-outline  user-box">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label>Password</label>
  </div>
  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary   text-center submit">Login</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p style="color: aliceblue">a new member? Create an acount<a href="register.php" class="register"> Register</a>
    </p>
  </div>
</form>


<?php require "../includes/footer.php" ?>