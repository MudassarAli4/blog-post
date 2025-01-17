<?php require "../config/config.php" ?>

<?php

$computersPosts = $conn->query("SELECT * FROM posts WHERE category_id = 1")->fetchAll(PDO::FETCH_OBJ);
$sportsPosts = $conn->query("SELECT * FROM posts WHERE category_id = 2")->fetchAll(PDO::FETCH_OBJ);
$webSeriesPosts = $conn->query("SELECT * FROM posts WHERE category_id = 3")->fetchAll(PDO::FETCH_OBJ);
$techPosts = $conn->query("SELECT * FROM posts WHERE category_id = 4")->fetchAll(PDO::FETCH_OBJ);
$contacts = $conn->query("SELECT * FROM contact")->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ADMIN</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/index.css" rel="stylesheet" />
    <link href="/css/form.css" rel="stylesheet" />
    <link href="/css/para.css" rel="stylesheet" />
    <link href="/css/admin.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />

</head>

<body>
    <!-- Header Content  -->

    <header class="masthead" style="background-image: url('/assets/img/pxfuel.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Profexxor Blog</h1>
                        <span class="subheading">Create and Publish Blogs</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="admin-panel">
            <div class="admin-welcome">
                <h2><i class="fas fa-user-circle"></i> Welcome ADMIN</h2>
            </div>
            <hr class="my-4" />
            <div class="products-table">
                <!-- Computers Category -->
                <h3>Computers</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($computersPosts as $post) : ?>
                            <tr>
                                <td><?php echo $post->id; ?></td>
                                <td><?php echo $post->user_name; ?></td>
                                <td><?php echo $post->title; ?></td>
                                <td>
                                    <img class="p-img" src="../posts/images/<?php echo $post->img; ?>" alt="Product Image" />
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="../posts/update.php?upd_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <a class="btn btn-danger" href="../posts/delete.php?del_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr class="my-4" />

                <!-- Sports Category -->
                <h3>Sports</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sportsPosts as $post) : ?>
                            <tr>
                                <td><?php echo $post->id; ?></td>
                                <td><?php echo $post->user_name; ?></td>
                                <td><?php echo $post->title; ?></td>
                                <td>
                                    <img class="p-img" src="../posts/images/<?php echo $post->img; ?>" alt="Product Image" />
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="../posts/update.php?upd_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <a class="btn btn-danger" href="../posts/delete.php?del_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr class="my-4" />

                <!-- Web Series Category -->
                <h3>Web Series</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($webSeriesPosts as $post) : ?>
                            <tr>
                                <td><?php echo $post->id; ?></td>
                                <td><?php echo $post->user_name; ?></td>
                                <td><?php echo $post->title; ?></td>
                                <td>
                                    <img class="p-img" src="../posts/images/<?php echo $post->img; ?>" alt="Product Image" />
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="../posts/update.php?upd_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <a class="btn btn-danger" href="../posts/delete.php?del_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr class="my-4" />

                <!-- Tech Category -->
                <h3>Tech</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($techPosts as $post) : ?>
                            <tr>
                                <td><?php echo $post->id; ?></td>
                                <td><?php echo $post->user_name; ?></td>
                                <td><?php echo $post->title; ?></td>
                                <td>
                                    <img class="p-img" src="../posts/images/<?php echo $post->img; ?>" alt="Product Image" />
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="../posts/update.php?upd_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <a class="btn btn-danger" href="../posts/delete.php?del_id=<?php echo $post->id; ?>">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr class="my-4" />


            </div>
            <div class="products-table">
                <h3>Messages</h3>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($contacts as $msg) : ?>
                            <tr>
                                <td><?php echo $msg->id; ?></td>
                                <td><?php echo $msg->name; ?></td>
                                <td><?php echo $msg->phoneNumber; ?></td>
                                <td>
                                    <?php echo $msg->message; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <hr class="my-4" />
            </div>
        </div>
    </div>
</body>

</html>
<?php require "../includes/footer.php" ?>