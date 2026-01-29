<?php
if (!isset($_SESSION)) session_start();

if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

function csrf() {
    return $_SESSION['csrf'];
}

function verify_csrf($token) {
    return hash_equals($_SESSION['csrf'], $token);
}
