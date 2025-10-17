<?php
require_once __DIR__ . '/includes/bootstrap.php';

// includes/notifications.php - simple notification API
function fetch_notifications($user_id, $limit = 10) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT id, message, is_read, created_at FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT ?');
    $stmt->execute([$user_id, $limit]);
    return $stmt->fetchAll();
}
function mark_notification_read($id) {
    global $pdo;
    $stmt = $pdo->prepare('UPDATE notifications SET is_read = 1 WHERE id = ?');
    $stmt->execute([$id]);
}
?>