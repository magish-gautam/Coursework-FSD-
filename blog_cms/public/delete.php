<?php
require_once "../config/db.php";
require_once "../includes/auth.php";

$id = $_GET['id'];
$pdo->prepare("DELETE FROM posts WHERE id=?")->execute([$id]);
header("Location: index.php");
