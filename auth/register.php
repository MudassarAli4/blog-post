<?php require  "../includes/header.php"; ?>
<?php require  "../config/config.php"; ?>



<?php

if (isset($_SESSION['username'])) {
  header("location: index.php");
}


if (isset($_POST['submit'])) {

  if ($_POST['email'] == '' or $_POST['username'] == '' or $_POST['password'] == '') {
    echo "<div class='alert alert-danger text-center ' role='alert'>
       Enter Data into the inputs
      </div>";
  } else {

    $email = $_POST['email'];
    $username = $_POST['username'];

    // password in hashcode we use password_hash
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // query
    $insert = $conn->prepare("INSERT INTO user (email, username , mypassword) VALUES (:email , :username, :mypassword)");
    $insert->execute([
      ':email' => $email,
      ':username' => $username,
      ':mypassword' => $password
    ]);


    header("location: login.php");
  }
}
?>




<form method="POST" action="register.php" class="login-box">
  <!-- Email input -->
  <div class="form-outline user-box">
    <input type="email" name="email" id="form2Example1" class="form-control" />
    <label for="">Email</label>
  </div>

  <div class="form-outline user-box">
    <input type="text" name="username" id="form2Example1" class="form-control" />
    <label for="">UserName</label>
  </div>

  <!-- Password input -->
  <div class="form-outline user-box">
    <input type="password" name="password" id="form2Example2" class="form-control" />
    <label for="">Password</label>
  </div>



  <!-- Submit button -->
  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center submit">Register</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p style="color: aliceblue">Aleardy a member? </p><a href="login.php" class="register">Login</a>


  </div>
</form>




<?php require  "../includes/footer.php"; ?>