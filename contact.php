<?php require "includes/navbar.php" ?>
<?php require "config/config.php" ?>

<?php

if (isset($_POST['submit'])) {

    if ($_POST['name'] == '') {
        echo "<div class='alert alert-danger text-center ' role='alert'>
      Enter Name
    </div>";
    } else if ($_POST['email'] == '') {
        echo "<div class='alert alert-danger text-center ' role='alert'>
      Enter Email Address
    </div>";
    } else if ($_POST['phone'] == '') {
        echo "<div class='alert alert-danger text-center ' role='alert'>
      Enter PhoneNumber
    </div>";
    } else if ($_POST['message'] == '') {
        echo "<div class='alert alert-danger text-center ' role='alert'>
      Type Message
    </div>";
    } else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $insert = $conn->prepare("INSERT INTO contact (name, email, phoneNumber,message) VALUES (:name, :email, :phone,:message);");
        $insert->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':message' => $message,
        ]);

        header("location: index.php");
    }
}
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p style="color: aliceblue; text-align: center">Want to get in touch? Fill out the form below to send me
                    a message and I will get back to you as soon
                    as possible!</p>
                <div class="my-5">
                    <form id="contactForm" method="POST" action="contact.php" class="login-box">

                        <div class="user-box">
                            <input class="form-control" name="name" id="name" type="text" />
                            <label for="name">Name</label>

                        </div>
                        <div class="user-box">
                            <input class="form-control" name="email" id="email" type="email" />
                            <label for="email">Email address</label>

                        </div>
                        <div class="user-box">
                            <input class="form-control" name="phone" id="phone" type="tel" />
                            <label for="phone">Phone Number</label>

                        </div>
                        <div class="user-box">
                            <textarea class="form-control" name="message" id="message" style="height: 12rem"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <br />
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase submit" name="submit" id="submit" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require "includes/footer.php" ?>