<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog CMS</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <?php if(isset($_SESSION['role']) && $_SESSION['role']==='admin'): ?>
        <a href="add.php">Add Post</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Admin Login</a>
    <?php endif; ?>
</nav>

<div class="container">
