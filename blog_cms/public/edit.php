<?php
require_once "../config/db.php";
require_once "../includes/auth.php";
include "../includes/header.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $stmt = $pdo->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->execute([$_POST['title'], $_POST['content'], $id]);
    header("Location: index.php");
}
?>

<h2>Edit Post</h2>
<form method="post">
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea>
    <button type="submit">Update Post</button>
</form>

<?php include "../includes/footer.php"; ?>
