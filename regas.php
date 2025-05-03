<?php
error_reporting(E_ERROR);
ob_start();
session_start();

include_once 'cfg/sql.php';
include_once 'cfg/limit.php';

function jsonResponse($message, $code = 200, $extra = []) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode(array_merge(['Message' => $message], $extra));
    exit();
}

$id = isset($_GET['id']) ? preg_replace('/[^A-Za-z0-9_ ]/', '', $_GET['id']) : null;

// Fetch common data
$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));
$new = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$totalNewsCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
$adsSms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sms_reklama ORDER BY id DESC LIMIT 1"));

// Close the output buffer and return the content
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

<div class="container mb-5"> <!-- Changed my-5 to mb-5 to remove top margin -->
  <div class="row gx-5">
    <aside class="col-lg-4 mb-4" id="sidebar">
      <!-- Login -->
      <div class="card bg-dark2 p-3 mb-4"> <!-- Applied bg-dark2 -->
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
      <div class="card bg-dark2 p-3 mb-4"> <!-- Applied bg-dark2 -->
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
      <div class="card bg-dark2 p-3"> <!-- Applied bg-dark2 -->
        <h5 class="text-center text-gold mb-3"><i class="bi bi-trophy-fill me-2"></i>TOP žaidėjai</h5>
        <ul class="list-group list-group-flush">
          <?php $rank=1; $top= mysqli_query($conn, "SELECT nick,lygis FROM zaidejai WHERE statusas!='Kurejas' ORDER BY lygis DESC LIMIT 3"); while($row=mysqli_fetch_assoc($top)): ?>
          <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0 py-1"> <!-- Adjusted list item style -->
            <span class="text-white"><span class="fw-bold me-2"><?=$rank?>.</span> <?=$row['nick']?></span>
            <span class="badge bg-warning rounded-pill text-white"><?=$row['lygis']?> lygis</span>
          </li>
          <?php $rank++; endwhile; ?>
        </ul>
      </div>
    </aside>

    <main class="col-lg-8 main-content">
      <?php if($nust['reg'] == "-"): ?>
        <div class="card bg-dark2 p-4"> <!-- Applied bg-dark2 -->
          <h4 class="text-gold"><i class="bi bi-exclamation-triangle-fill me-2"></i>Registracija</h4>
          <div class="alert alert-danger mt-3">
            <b>Registracija šiuo metu yra išjungta!</b>
          </div>
          <a href="index.php" class="btn btn-warning mt-3 w-auto">Grįžti į pagrindinį</a>
        </div>
      <?php else: ?>
        <div class="card bg-dark2 p-4 rules-container"> <!-- Applied bg-dark2 -->
          <h4 class="text-center rules-title">DbzRetro.lt Taisyklės</h4>
          
          <div class="warning-box">
            <i class="bi bi-exclamation-triangle-fill me-2"></i><b>Už taisyklių pažeidimą gresia Ban, Delete, Ip ban. Administracija pasilieka teisę keisti taisykles bet kada.</b>
          </div>
          
          <div class="rules-heading">
            <i class="bi bi-shield-exclamation me-2"></i> Bendrosios Taisyklės
          </div>
          
          <div class="rule-item">
            <b>1.1.</b> Draudžiama reklamuoti bet kokias kitas svetaines (žaidimus, filmų puslapius, pažinčių svetaines ir kt.).
          </div>
          <div class="rule-item">
            <b>1.2.</b> Draudžiama vogti žaidimo resursus iš kitų žaidėjų.
          </div>
          <div class="rule-item">
            <b>1.3.</b> Draudžiama nepagarbiai elgtis su žaidėjais, juos įžeidinėti ar grasinti.
          </div>
          <div class="rule-item">
            <b>1.4.</b> Draudžiama keiktis žaidime.
          </div>
          <div class="rule-item">
            <b>1.5.</b> Leidžiama turėti tik vieną vartotoją. Jei tuo pačiu IP adresu naudojasi keli asmenys (pvz., broliai, seserys), privaloma informuoti administraciją.
          </div>
          <div class="rule-item">
            <b>1.6.</b> Draudžiama prašyti administratorių suteikti žaidimo resursų ar specialų statusą.
          </div>
          <div class="rule-item">
            <b>1.7.</b> Taisyklių nežinojimas neatleidžia nuo atsakomybės.
          </div>
          <div class="rule-item">
            <b>1.8.</b> Draudžiama pervedinėti ar kitaip perduoti žaidimo resursus bei daiktus tarp vartotojų, kurie naudojasi tuo pačiu IP adresu ar įrenginiais (pvz., šeimos nariai).
          </div>
          <div class="rule-item">
            <b>1.9.</b> Draudžiama naudoti bet kokias programas ar įrankius, kurie palengvina žaidimą (botus, skriptus ir pan.).
          </div>
          <div class="rule-item">
            <b>1.10.</b> Griežtai draudžiama vogti kitų žaidėjų vartotojus ar žaidimo resursus.
          </div>
          
          <div class="rules-heading">
            <i class="bi bi-check2-circle me-2"></i> Sutikimas
          </div>
          <p class="text-center text-muted mt-3">Spausdami "Sutinku", patvirtinate, kad perskaitėte ir sutinkate su visomis aukščiau išvardintomis taisyklėmis.</p>
          
          <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="registracija.php" class="btn btn-agree"><i class="bi bi-check-lg me-1"></i> Sutinku su taisyklėm</a>
            <a href="index.php" class="btn btn-disagree"><i class="bi bi-x-lg me-1"></i> Nesutinku</a>
          </div>
        </div>
      <?php endif; ?>
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
    // When a nav link is clicked, close the mobile menu
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');
        
        // Close mobile menu when links are clicked
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Check if the menu is expanded (visible on mobile)
                if (navbarCollapse.classList.contains('show')) {
                    // Use Bootstrap's collapse API to hide the menu
                    bootstrap.Collapse.getInstance(navbarCollapse).hide();
                }
            });
        });
    });
</script>
</body>
</html>