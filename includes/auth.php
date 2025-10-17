<?php
require_once __DIR__ . '/includes/bootstrap.php';

session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}