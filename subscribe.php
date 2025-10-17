<?php
// subscribe.php - simple subscription flow (UI + create)
require_once __DIR__ . '/includes/bootstrap.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF check
    csrf_check();
    $plan = $_POST['plan'] ?? 'monthly';
    if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }
    $res = create_subscription($_SESSION['user_id'], $plan);
    header('Location: ' . $res['checkout_url']);
    exit;
}
?>
<?php include 'includes/header.php'; ?>
<div class="container">
  <div class="card">
    <h2>Abonelik</h2>
    <p class="small">Plan seç ve devam et.</p>
    <form method="post">
      <?php echo csrf_field(); ?>
      <div class="form-row"><label>Plan</label><select name="plan" class="input"><option value="monthly">Aylık</option><option value="yearly">Yıllık</option></select></div>
      <div class="form-row"><button type="submit" class="btn">Abone Ol</button></div>
    </form>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
