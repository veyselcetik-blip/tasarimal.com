<?php
// templates/winner_display.php
// Echo this where you want the winner box. Expects $winner array with 'thumbnail','submission_title','submission_description'.
if (!empty($winner)) {
  $thumb = htmlspecialchars($winner['thumbnail'] ?? '', ENT_QUOTES, 'UTF-8');
  $title = htmlspecialchars($winner['submission_title'] ?? 'Kazanan', ENT_QUOTES, 'UTF-8');
  $desc = htmlspecialchars($winner['submission_description'] ?? '', ENT_QUOTES, 'UTF-8');
  echo '<div class="card"><div style="display:flex;gap:12px;"><div style="width:140px;height:96px;overflow:hidden;border-radius:8px;">';
  if ($thumb) echo '<img src="/' . $thumb . '" alt="'. $title .'" style="width:100%;height:100%;object-fit:cover;">';
  echo '</div><div><div class="winner-badge">KAZANAN</div><h3>'.$title.'</h3><p class="small">'.$desc.'</p></div></div></div>';
}
?>