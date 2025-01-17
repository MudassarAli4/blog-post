<?php
require "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (!isset($_SESSION['user_id'])) {
    //     // User is not logged in, redirect to login page
    //     header("Location: login.php");
    //     exit();
    // }
    // Validate the post ID
    $post_id = $_POST["post_id"];

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    $checkLike = $conn->prepare("SELECT id FROM likes WHERE post_id = :post_id AND user_id = :user_id");
    $checkLike->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $checkLike->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $checkLike->execute();

    if (!$checkLike->fetchColumn()) {
        $updateLikes = $conn->prepare("UPDATE posts SET likes = likes + 1 WHERE id = :post_id");
        $updateLikes->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $updateLikes->execute();

        // $insertLike = $conn->prepare("INSERT INTO likes (post_id, user_id) VALUES (:post_id, :user_id)");
        // $insertLike->execute([
        //     ':post_id' => $post_id,
        //     ':user_id' => $user_id
        // ]);
    }

    header("Location: post.php?post_id=$post_id");
    exit();
}
