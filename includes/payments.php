<?php
require_once __DIR__ . '/includes/bootstrap.php';

// includes/payments.php - stub for subscription handling
// Replace the internals with your payment provider SDK (Stripe, PayPal, Iyzico, etc.)
function create_subscription($user_id, $plan_id) {
    // Example: create subscription record in DB and return checkout URL
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO subscriptions (user_id, plan_id, status, created_at) VALUES (?, ?, ?, NOW())');
    $stmt->execute([$user_id, $plan_id, 'pending']);
    $sub_id = $pdo->lastInsertId();
    // TODO: integrate real payment provider SDK to return a checkout URL
    return [
        'subscription_id' => $sub_id,
        'checkout_url' => '/subscribe_confirm.php?sub=' . $sub_id
    ];
}
?>