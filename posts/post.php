<?php require "../includes/navbar.php" ?>
<?php require "../config/config.php" ?>


<?php

if (isset($_GET['post_id'])) {

    $id = $_GET['post_id'];

    $select = $conn->query("SELECT * FROM posts where id ='$id'");
    $select->execute();
    $post = $select->fetch(PDO::FETCH_OBJ);
} else {
    header("location: 404.php");
}

// Check if the user is logged in
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Check if the user has already liked the post
$hasLiked = false;

if ($user_id) {
    $checkLike = $conn->prepare("SELECT id FROM likes WHERE post_id = :post_id AND user_id = :user_id");
    $checkLike->bindParam(':post_id', $post->id, PDO::PARAM_INT);
    $checkLike->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $checkLike->execute();
    $hasLiked = $checkLike->fetchColumn() !== false;
}
?>


<!-- Page Header-->
<header class="masthead" style="background-image: url('images/<?php echo $post->img ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo $post->title ?></h1>
                    <h2 class="subheading"><?php echo $post->subtitle ?></h2>
                    <span class="meta">
                        Posted by
                        <a href="#!"><?php echo $post->user_name ?> on </a>
                        <?php echo  date('M', strtotime("$post->created_at")) . "," . date('d', strtotime("$post->created_at")) . " " . date('Y', strtotime("$post->created_at")); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7 para">
                <h2 class="heading">Body</h2>
                <p class="body"><?php echo $post->body ?></p>
                <?php if (isset($_SESSION['user_id']) and $_SESSION['user_id'] == $post->user_id) : ?>
                    <a href="delete.php?del_id=<?php echo $post->id ?>" class="btn btn-danger text-center float-end">Delete</a>
                    <a href="update.php?upd_id=<?php echo $post->id ?>" class="btn btn-warning text-center ">Update</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>


<div>
    <form action="likes.php" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
        <button type="submit" class="btn btn-link" style="background-color: #f0f0f0; padding: 10px; margin-bottom: 10px;" <?php echo $hasLiked ? 'disabled' : ''; ?>>
            <i class="bi bi-heart<?php echo $hasLiked ? '-fill' : ''; ?>"></i> Like -> <?php echo $post->likes; ?>
        </button>
    </form>

</div>

<!-- Footer-->
<?php require "../includes/footer.php" ?>