<?php
error_reporting(E_ERROR);
ob_start();
session_start();

include_once 'cfg/sql.php';
include_once 'cfg/limit.php';

$id = isset($_GET['id']) ? preg_replace('/[^A-Za-z0-9_ ]/', '', $_GET['id']) : null;

// Fetch common data
$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));

$content = ob_get_contents();
ob_end_clean();
echo $content;
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBZRETRO.LT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Press+Start+2P&family=Orbitron:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body class="section-view">
<nav class="navbar navbar-expand-lg navbar-dark py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <img src="/img/logo.webp" height="45" alt="DBZ Logo">
      <span class="ms-3 fs-3 fw-bold text-gold">DbzRetro.lt</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link text-gold" href="index.php">Pagrindinis</a></li>
        <li class="nav-item"><a class="nav-link text-gold section-link" href="index.php?id=news">Naujienos</a></li>
        <li class="nav-item"><a class="nav-link text-gold section-link" href="index.php?id=add2">Reklamos</a></li>
        <li class="nav-item"><a class="nav-link text-gold" href="kontaktai.php">Kontaktai</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
  <div class="row gx-5">
    <aside class="col-lg-4 mb-4 order-0 order-lg-0" id="sidebar">
      <!-- Login -->
      <div class="card bg-dark2 p-3 mb-4">
        <h5 class="text-center text-gold mb-3"><i class="bi bi-box-arrow-in-right me-2"></i>Prisijungimas</h5>
        <form action="prisijungti.php?id=login" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="user" name="vardas" placeholder="" maxlength="20">
            <label for="user">Žaidėjo vardas</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="" maxlength="20">
            <label for="pass">Slaptažodis</label>
          </div>
          <button type="submit" class="btn btn-warning w-100 mb-2">Prisijungti</button>
          <div class="text-end"><a href="prisijungti.php?id=forget" class="text-gold small">Pamiršau slaptažodį</a></div>
        </form>
        <?php if ($nust['reg'] === '+'): ?>
        <a href="regas.php" class="btn btn-outline-warning w-100 mt-3">Registruotis</a>
        <?php endif; ?>
      </div>
      <!-- Online/Stats Info -->
      <div class="card bg-dark2 p-3 mb-4">
        <h5 class="text-center text-gold mb-3"><i class="bi bi-bar-chart-line me-2"></i>Statistika</h5>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span><i class="bi bi-people-fill me-1 text-gold"></i>Prisijungę:</span>
          <span class="badge bg-warning rounded-pill"><?=kiek('online')?> / <?=kiek('zaidejai')?></span>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-2">
          <span><i class="bi bi-newspaper me-1 text-gold"></i>Atnaujinimai:</span>
          <span class="badge bg-warning rounded-pill"><?=kiek('news')?> <small class="text-white">+<?=$nust['sndnew']?></small></span>
        </div>
        <div class="text-end small mt-2">
          <i class="bi bi-person-plus-fill me-1 text-gold"></i>Naujausias narys: <span class="fw-bold text-gold"><?=$nust['new']?></span>
        </div>
      </div>
      <!-- Top Players -->
      <div class="card bg-dark2 p-3">
        <h5 class="text-center text-gold mb-3"><i class="bi bi-trophy-fill me-2"></i>TOP žaidėjai</h5>
        <ul class="list-group list-group-flush">
          <?php $rank=1; $top= mysqli_query($conn, "SELECT nick,lygis FROM zaidejai WHERE statusas!='Kurejas' ORDER BY lygis DESC LIMIT 3"); while($row=mysqli_fetch_assoc($top)): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0 py-1">
            <span class="text-white"><span class="fw-bold me-2"><?=$rank?>.</span> <?=$row['nick']?></span>
            <span class="badge bg-warning rounded-pill text-white"><?=$row['lygis']?> lygis</span>
          </li>
          <?php $rank++; endwhile; ?>
        </ul>
      </div>
    </aside>

    <main class="col-lg-8 main-content order-1 order-lg-1">
      <div class="back-button">
        <a href="index.php" class="btn btn-outline-warning mb-3">
          <i class="bi bi-arrow-left"></i> Grįžti į pagrindinį
        </a>
      </div>
      <div class="card p-4 mb-4 bg-dark2">
        <h4 class="text-gold mb-3"><i class="bi bi-envelope-fill me-2"></i>Kontaktai</h4>
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-transparent border-0 text-white px-0">Gmail: <a href="mailto:emarcinkevicius82@gmail.com" class="text-gold">emarcinkevicius82@gmail.com</a></li>
          <li class="list-group-item bg-transparent border-0 text-white px-0">Discord: <strong class="text-gold">0712</strong></li>
          <li class="list-group-item bg-transparent border-0 text-white px-0">Žaidimo administracija: <span class="text-gold">testas1</span></li>
        </ul>
      </div>
    </main>
  </div>
</div>

<footer class="footer-dbz text-center py-4 mt-5 w-100" style="position:relative; clear:both;">
  <div class="container">
    <div class="mb-2">
      <img src="/img/logo.webp" alt="DBZ Logo" class="footer-logo mb-2">
    </div>
    <div class="footer-social mb-2">
      <a href="https://discord.gg/QyRdrszqtZ" target="_blank" rel="noopener" title="Discord"><i class="bi bi-discord"></i></a>
      <a href="mailto:emarcinkevicius82@gmail.com" title="El. paštas"><i class="bi bi-envelope-fill"></i></a>
    </div>
    <div class="footer-copy mb-1">© <?=date('Y')?> DbzRetro.lt</div>
    <div class="footer-love">Sukurta su <span style="color:#ff6f00">❤</span> DBZ fanams</div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // ...existing code from index.php <script> ...
</script>
</body>
</html>
