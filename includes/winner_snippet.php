<?php
require_once __DIR__ . '/includes/bootstrap.php';

// includes/winner_snippet.php
// Usage: include 'includes/winner_snippet.php'; expects $pdo and $project_id to be set.
if (!isset($project_id)) {
    // try to deduce from GET or local variable names
    $project_id = $_GET['id'] ?? $_GET['project_id'] ?? null;
}
$winner_html = '';
if ($project_id) {
    try {
        // The schema may differ; adapt as necessary. This assumes there is a 'winners' table or 'projects' has winner_submission_id
        $stmt = $pdo->prepare('SELECT w.submission_id, s.title AS submission_title, s.description AS submission_description, s.thumbnail FROM winners w LEFT JOIN submissions s ON w.submission_id = s.id WHERE w.project_id = ? LIMIT 1');
        $stmt->execute([$project_id]);
        $winner = $stmt->fetch();
        if ($winner) {
            $thumb = htmlspecialchars($winner['thumbnail'] ?? '', ENT_QUOTES, 'UTF-8');
            $title = htmlspecialchars($winner['submission_title'] ?? 'Kazanan Sunum', ENT_QUOTES, 'UTF-8');
            $desc = htmlspecialchars($winner['submission_description'] ?? '', ENT_QUOTES, 'UTF-8');
            $winner_html = '<div class="card" style="margin-bottom:14px;"><div style="display:flex;gap:12px;align-items:center;"><div style="width:120px;height:80px;overflow:hidden;border-radius:8px;background:#f2f4f7;">';
            if ($thumb) $winner_html .= '<img src="/' . $thumb . '" alt="'. $title .'" style="width:100%;height:100%;object-fit:cover;">';
            $winner_html .= '</div><div><div class="winner-badge">KAZANAN</div><h3 style="margin:6px 0;">'.$title.'</h3><p class="small">'.$desc.'</p></div></div></div>';
            echo $winner_html;
        }
    } catch (Exception $e) {
        // silent fallback
    }
}
?>