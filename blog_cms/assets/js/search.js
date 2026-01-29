<?php
require_once "../config/db.php";
session_start();
require_once "../includes/header.php";

if (!isset($_GET['id'])) {
    echo "<p>Post not found</p>";
    exit;
}

$id = intval($_GET['id']);
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo "<p>Post not found</p>";
    exit;
}

$imgUrl = "https://source.unsplash.com/800x400/?technology,blog," . $post['id'];
?>

<div class="container">
    <div class="post" style="padding: 30px;">
        <img src="<?= $imgUrl ?>" alt="Blog Image">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    </div>
</div>

<?php require_once "../includes/footer.php"; ?>
