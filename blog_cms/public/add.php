<?php
require_once "../config/db.php";
require_once "../includes/auth.php";   // protects page
require_once "../includes/csrf.php";
require_once "../includes/header.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf($_POST['csrf'])) {
        die("CSRF Error");
    }

    $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->execute([$_POST['title'], $_POST['content']]);

    header("Location: index.php");
    exit;
}
?>

<h1>Add New Post</h1>

<form method="post">
    <input type="text" name="title" placeholder="Post title" required>
    <textarea name="content" placeholder="Post content" required></textarea>
    <input type="hidden" name="csrf" value="<?= csrf() ?>">
    <button type="submit">Add Post</button>
</form>

<?php require_once "../includes/footer.php"; ?>
