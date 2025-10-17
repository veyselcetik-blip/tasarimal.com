<?php
// webhook.php - payment provider webhook stub (replace with provider verification)
require_once __DIR__ . '/includes/bootstrap.php';
$payload = file_get_contents('php://input');
file_put_contents(__DIR__ . '/logs/webhook_payloads.log', date('c') . " " . $payload . PHP_EOL, FILE_APPEND);
http_response_code(200);
echo "ok";
?>