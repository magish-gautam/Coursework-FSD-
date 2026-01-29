<?php
require_once "../config/db.php";
session_start();
require_once "../includes/header.php";

$posts = $pdo->query("SELECT * FROM posts ORDER BY id DESC")->fetchAll();
?>

<div class="container">

<h1>Blog</h1>

<input id="search" placeholder="Search articles..." class="search-box">

<?php foreach ($posts as $p): ?>
<div class="post">
    <h2><?= htmlspecialchars($p['title']) ?></h2>
    <p><?= substr(htmlspecialchars($p['content']), 0, 180) ?>...</p>

    <a href="view.php?id=<?= $p['id'] ?>" class="read-more">Read More</a>


    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
    <div class="admin-actions">
        <a href="edit.php?id=<?= $p['id'] ?>" class="btn btn-primary">Edit</a>
        <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-danger">Delete</a>
    </div>
    <?php endif; ?>
</div>
<?php endforeach; ?>

</div>

<script src="/blog_cms/assets/js/search.js"></script>
<?php require_once "../includes/footer.php"; ?>
