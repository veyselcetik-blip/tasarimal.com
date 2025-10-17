<?php
require_once __DIR__ . '/includes/bootstrap.php';

// includes/upload_helper.php
require_once __DIR__ . '/security.php';
// Wrapper alias
function handle_uploaded_file($field) {
    return secure_upload($field);
}
?>