<?php
require_once "../config/db.php";

// Get search query
$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q === '') {
    echo "<p>Type to search articles...</p>";
    exit;
}

// Search posts by title or content
$stmt = $pdo->prepare("SELECT * FROM posts WHERE title LIKE ? OR content LIKE ? ORDER BY id DESC");
$searchTerm = "%$q%";
$stmt->execute([$searchTerm, $searchTerm]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($results) === 0) {
    echo "<p>No posts found for '<strong>" . htmlspecialchars($q) . "</strong>'</p>";
} else {
    foreach ($results as $p) {
        $imgUrl = "https://source.unsplash.com/600x400/?technology,blog," . $p['id'];
        ?>
        <div class="post">
            <img src="<?= $imgUrl ?>" alt="Blog Image">
            <div class="post-content">
                <h2><?= htmlspecialchars($p['title']) ?></h2>
                <p>
                    <?= substr(htmlspecialchars($p['content']), 0, 150) ?>...
                    <a href="view.php?id=<?= $p['id'] ?>" class="read-more">Read More</a>
                </p>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                <div class="admin-actions">
                    <a href="edit.php?id=<?= $p['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $p['id'] ?>" class="delete">Delete</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
