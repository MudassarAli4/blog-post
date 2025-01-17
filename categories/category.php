<?php require "../includes/navbar.php" ?>
<?php require "../config/config.php" ?>


<?php

if (isset($_GET['cat_id'])) {
    $id = $_GET['cat_id'];

    $posts = $conn->query(
        "SELECT posts.id AS id,
             posts.img AS img, 
             posts.title AS title, 
             posts.subtitle AS subtitle, 
             posts.user_name AS user_name, 
             posts.created_at AS created_at, 
             posts.category_id AS category_id
             FROM categories JOIN posts ON categories.id = posts.category_id Where posts.category_id='$id';"
    );

    $posts->execute();
    $rows = $posts->fetchAll(PDO::FETCH_OBJ);


    $categories = $conn->query("SELECT * FROM categories WHERE categories.id='$id';");
    $categories->execute();
    $category = $categories->fetch(PDO::FETCH_OBJ);
} else {
    header("location: 404.php");
}


?>


<!-- Page Header-->
<header class="masthead" style="background-image: url('../assets/img/beautiful-night-sky.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1 class="text-uppercase"> <?php echo $category->name ?></h1>
                    <span class="subheading">Create and Publish Blogs</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- .$_SESSION['username'] -->
            <?php foreach ($rows as $row) : ?>
            <!-- Post preview-->
            <div class="post-preview blog-post" style="background-image: url('../posts/images/<?php echo $row->img ?>');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;">
                <a href="/posts/post.php?post_id=<?php echo $row->id ?>">
                    <h2 class="post-title"><?php echo $row->title; ?></h2>
                    <h3 class="post-subtitle"><?php echo $row->subtitle; ?></h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!" style="color:white;"><?php echo $row->user_name; ?> on</a>
                    <?php echo  date('M', strtotime("$row->created_at")) . "," . date('d', strtotime("$row->created_at")) . " " . date('Y', strtotime("$row->created_at")); ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php endforeach; ?>
            <!-- Pager-->
        </div>
    </div>

    <?php require "../includes/footer.php" ?>