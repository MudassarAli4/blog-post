<?php require "../includes/navbar.php" ?>
<?php require "../config/config.php" ?>

<?php
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];

    $select = $conn->query("SELECT * FROM posts where id ='$id'");
    $select->execute();
    $post = $select->fetch(PDO::FETCH_OBJ);


    // if ($_SESSION['user_id'] !== $post->user_id) {

    //     header("location: /index.php");
    // } else {

    unlink("images/" . $post->img . "");
    $delete = $conn->query("DELETE FROM posts WHERE id ='$id'");
    $delete->execute();
    header("location: /index.php");
    // }
} else {
    header("location: /404.php");
}

?>