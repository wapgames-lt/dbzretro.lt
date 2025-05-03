<?php
error_reporting(E_ERROR);
session_start();

include_once 'cfg/sql.php';
include_once 'cfg/limit.php';


$id = isset($_GET['id']) ? preg_replace('/[^A-Za-z0-9_ ]/', '', $_GET['id']) : null;
if (!$id) {
// Fetch common data
$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));
$new = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$totalNewsCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
$adsSms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sms_reklama ORDER BY id DESC LIMIT 1"));
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBZRETRO.LT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Press+Start+2P&family=Orbitron:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body class="<?php echo $id ? 'section-view' : ''; ?>">
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
        <li class="nav-item"><a class="nav-link text-gold section-link" href="?id=news">Naujienos</a></li>
        <li class="nav-item"><a class="nav-link text-gold section-link" href="?id=add2">Reklamos</a></li>
        <li class="nav-item"><a class="nav-link text-gold" href="kontaktai.php">Kontaktai</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
  <div class="row gx-5">
    <aside class="col-lg-4 mb-lg-4 mb-1 order-0 order-lg-0" id="sidebar">
      <!-- Mobile Banner -->
      <div class="card bg-dark2 p-1 mb-1 d-block d-lg-none">
        <img src="/img/logo.webp" alt="DBZRetro Logo Banner" class="img-fluid w-50 mx-auto d-block">
      </div>
      <!-- Login -->
      <div class="card bg-dark2 p-3 mb-lg-4 mb-1">
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
    <div class="card bg-dark2 p-3 mb-lg-4 mb-1">
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
        <ul class="list-group list-group-flush" id="top-players-list">
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
      <?php if (!$id): ?>
      <div class="card p-4 mb-lg-4 mb-1 bg-dark2">
        <h4 class="text-gold mb-3"><i class="bi bi-star-fill me-2"></i>Naujausias atnaujinimas</h4>
        <p class="text-white mb-1"><?=smile($new['name'])?></p>
        <small class="text-muted">Paskelbta: <?=laikas($new['data'])?></small>
      </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <?php $sys = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sms FROM pokalbiai WHERE nick='SISTEMA' ORDER BY id DESC LIMIT 1")); ?>
      <div class="col">
        <div class="card h-100 p-3 bg-dark2 mb-lg-0 mb-1">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-gold mb-3"><i class="bi bi-info-circle-fill me-2"></i> Sisteminė žinutė</h5>
          <p class="card-text text-white flex-grow-1"><?= $sys['sms'] ?></p>
        </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 p-3 bg-dark2">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-gold d-flex justify-content-between align-items-center mb-3">
            <span><i class="bi bi-megaphone-fill me-2"></i>Reklamos</span>
            <a href="?id=add2" class="text-gold section-link small">[Daugiau]</a>
          </h5>
          <div class="flex-grow-1">
          <?php
            $adsList = mysqli_query($conn, "SELECT antraste,adresas FROM reklama ORDER BY id DESC LIMIT 3");
            $i = 1;
            if (mysqli_num_rows($adsList) > 0) {
                while ($ad = mysqli_fetch_assoc($adsList)):
          ?>
            <p class="mb-1 text-white small">
            <strong class="me-1"><?= $i ?>.</strong>
            <a href="<?= $ad['adresas'] ?>" class="text-gold" target="_blank" rel="noopener noreferrer">
              <?= htmlspecialchars($ad['antraste']) ?> <i class="bi bi-box-arrow-up-right small"></i>
            </a>
            </p>
          <?php
                $i++;
                endwhile;
            } else {
                echo '<p class="text-muted small">Reklamų šiuo metu nėra.</p>';
            }
            echo ' <p class="mb-1 text-white small"><strong class="me-1">#</strong>.<a href="https://wapgames.lt?ref=f18bf83a-ef32-434b-8125-58ad8ad9a041" class="text-gold" target="_blank" rel="noopener noreferrer">Wap žaidimų katalogas <i class="bi bi-box-arrow-up-right small"></i></a></p>';
          ?>
          </div>
        </div>
        </div>
      </div>
    </div>
      <?php elseif ($id==='news'): ?>
      <div class="card p-3 mb-lg-4 mb-1 bg-dark2">
        <h4 class="text-gold mb-3"><i class="bi bi-newspaper me-2"></i>Visos naujienos (<?=$totalNewsCount?>)</h4>
        <?php $per=7; $page=max(1,intval($_GET['psl'] ?? 1)); $off=($page-1)*$per; $newslist=mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT {$off},{$per}"); while($n=mysqli_fetch_assoc($newslist)): ?>
        <div class="mb-lg-3 mb-1 p-3 bg-dark rounded shadow-sm">
          <h5 class="text-gold mb-1"><?=smile($n['name'])?></h5>
          <small class="text-muted d-block">Autorius <span class="text-gold"><?=$n['kas']?></span> | Paskelbta: <?=laikas($n['data'])?></small>
        </div>
        <?php endwhile; echo puslapiavimas(ceil($totalNewsCount/$per),$page,'?id=news'); ?>
      </div>
      <?php elseif ($id==='add2'): ?>
      <div class="card p-3 bg-dark2">
        <h4 class="text-gold mb-3"><i class="bi bi-cash-coin me-2"></i>Reklamos informacija</h4>
        <ul class="list-group list-group-flush">
          <li class="list-group-item bg-transparent border-0 text-white px-0">Kaina: <strong class="text-gold">2 €</strong></li>
          <li class="list-group-item bg-transparent border-0 text-white px-0">Apatinėje rodomos trys svetainės</li>
          <li class="list-group-item bg-transparent border-0 text-white px-0">Gmail: <a href="mailto:emarcinkevicius82@gmail.com" class="text-gold">emarcinkevicius82@gmail.com</a></li>
          <li class="list-group-item bg-transparent border-0 text-white px-0">Discord: <strong class="text-gold">0712</strong></li>
        </ul>
      </div>
      <?php elseif ($id==='rases'): ?>
      <div class="card p-3 bg-dark2">
        <h4 class="text-gold mb-3"><i class="bi bi-person-bounding-box me-2"></i>Veikėjų rasės</h4>
        <div class="row row-cols-2 row-cols-sm-3 g-3">
          <?php foreach(['Sajanai'=>10,'Žemiečiai'=>8,'Namekai'=>2,'Kyborgai'=>7,'Siaubūnai'=>6,'Dievai'=>2] as $race=>$num): ?>
          <div class="col">
            <div class="card bg-dark p-2 text-center h-100">
              <h6 class="text-gold mb-1"><?=$race?></h6>
              <span class="badge bg-warning text-white"><?=$num?> kov.</span>
            </div>
          </div>
          <?php endforeach; ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>

<?php
}

if ($id === 'referral') {
    $siteApiKey = getenv('WAP_GAMES_API_KEY');

    $apiKey = isset($_GET['api_key']) ? preg_replace("/[^A-Za-z0-9- ]/", '', $_GET['api_key']) : null;
    if (!$apiKey) {
        header("Content-Type: application/json");
        http_response_code(422);
        echo json_encode(['Message' => 'Missing api_key.']);
        return;
    }

    if ($apiKey !== $siteApiKey) {
        header("Content-Type: application/json");
        http_response_code(422);
        echo json_encode(['Message' => 'Incorrect api_key.', 'api_key' => $apiKey]);
        return;
    }

    $ip = isset($_GET['ip']) ? preg_replace("/[^A-Za-z0-9. ]/", '', $_GET['ip']) : null;
    if (!$ip) {
        header("Content-Type: application/json");
        http_response_code(422);
        echo json_encode(['Message' => 'Missing IP parameter.']);
        return;
    }

    $player = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip='$ip' LIMIT 1"));
    if (!$player) {
        header('Content-Type: application/json');
        $data = [
            'data' => ['Message' => 'Player by IP not found.', 'IP' => $ip],
        ];

        echo json_encode($data, true);
        exit();
    }

    $euro = 3000;
    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+$euro WHERE nick='$player[nick]'");
    $playerMessage = 'Tu paspaudei referral nuorodą už tai gauni: '. $euro.' euriukų, atmink nuorodą galima spausti kasdien po vieną karta. Nemokami euriukai? Gero žaidimo!';
    mysqli_query($conn,"INSERT INTO pm SET gavejas='$player[nick]', what='SISTEMA', txt='$playerMessage', time='" . time() . "', nauj='NEW'")or die(mysqli_error());

    $adminMessage = 'Žaidėjas: '. $player['nick'] . ' gavo '. $euro.', eur nes paspaudė atvedimo nuorodą iš IP: '. $ip;
    mysqli_query($conn,"INSERT INTO pm SET gavejas='testas1', what='SISTEMA', txt='$adminMessage', time='" . time() . "', nauj='NEW'")or die(mysqli_error());

    header("Content-Type: application/json");
    echo json_encode([
        'Message' => 'Referral approved.',
        'Player' => $player['nick'],
        'Euro' => $euro,
        'IP' => $ip,
    ]);
    return;
}
?>