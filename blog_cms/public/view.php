<?php
require_once "../config/db.php";
require_once "../includes/header.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id=?");
$stmt->execute([$id]);
$post = $stmt->fetch();
?>

<div class="container">

<h1><?= htmlspecialchars($post['title']) ?></h1>

<p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

<br><br>
<a href="index.php" class="btn btn-primary">← Back to Blog</a>

</div>

<?php require_once "../includes/footer.php"; ?>
