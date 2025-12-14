<?php

use LegacyDbz\Core\Db;

ob_start();
session_start();

include_once 'cfg/sql.php';
include_once 'cfg/limit.php';
include_once 'cfg/functions.php';

// Get reCAPTCHA keys from environment
$siteKey = getenv('GOOGLE_CAPTCHA_SITE_KEY');

/* ===================== CAPTCHA ===================== */

function isValidCaptcha(?string $captcha): bool
{
    if ($captcha === null || $captcha === '') {
        return false;
    }

    $secretKey = getenv('GOOGLE_CAPTCHA_SECRET');
    if (!$secretKey) {
        return false;
    }

    $postData = http_build_query([
            'secret'   => $secretKey,
            'response' => $captcha
    ], '', '&', PHP_QUERY_RFC3986);

    $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
    curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $postData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 3,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4, // fixes IPv6 issues
            CURLOPT_HTTPHEADER     => [
                    'Content-Type: application/x-www-form-urlencoded'
            ],
    ]);

    $result = curl_exec($ch);

    if ($result === false) {
        logError('Captcha cURL error: ' . curl_error($ch));
        curl_close($ch);
        return false;
    }

    curl_close($ch);

    $response = json_decode($result, true);

    if (!is_array($response)) {
        logError('Captcha invalid JSON: ' . $result);
        return false;
    }

    return !empty($response['success']);
}

/* ===================== INPUT ===================== */

// id: allow only safe characters
$id = isset($_GET['id'])
        ? preg_replace('/[^A-Za-z0-9_ ]/', '', (string)$_GET['id'])
        : null;

// ka: string, trimmed, length-limited
$ka = isset($_GET['ka'])
        ? substr(trim((string)$_GET['ka']), 0, 50)
        : null;

// ID: referral or external ID, length-limited
$ID = isset($_GET['ID'])
        ? substr(trim((string)$_GET['ID']), 0, 50)
        : null;

// IP: validated
$ipas = filter_var(
        $_SERVER['REMOTE_ADDR'] ?? '',
        FILTER_VALIDATE_IP
) ?: '0.0.0.0';

// Fetch common data
$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));
$new = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$totalNewsCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
$adsSms = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM sms_reklama ORDER BY id DESC LIMIT 1"));

// Close the output buffer and return the content
$content = ob_get_contents();
ob_end_clean();
echo $content;
// Online players
$online_players = kiek('online');
?>
<!DOCTYPE html>
<html lang="lt" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBZRetro.lt - Dragon Ball Z Naršyklinis Žaidimas</title>
    <!-- Preload critical resources -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Press+Start+2P&family=Orbitron:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap&subset=latin-ext" as="style">
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Metal+Mania&family=Press+Start+2P&family=Orbitron:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400&display=swap&subset=latin-ext" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style-modern.css?v=<?php echo time(); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='64' viewBox='0 0 64 64' fill='none' aria-label='Dragon Ball Z Icon'%3E%3Ccircle cx='32' cy='32' r='30' fill='%23F9A825' stroke='%23F57F17' stroke-width='4'/%3E%3Cpath d='M32 12L35.09 24.26H48L37.45 31.74L40.54 44L32 36.52L23.46 44L26.55 31.74L16 24.26H28.91L32 12Z' fill='%23FF6F00'/%3E%3C/svg%3E">
    <!-- Meta Tags -->
    <meta name="description" content="Prisijunk prie DBZRetro.lt - nemokamo naršyklinio Dragon Ball Z žaidimo. Kovok, treniruokis ir tapk stipriausiu kovotoju visatoje!">
    <meta name="keywords" content="DBZ, Dragon Ball Z, žaidimas, naršyklinis žaidimas, kovos žaidimas">
    <meta name="author" content="DBZRetro.lt">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="DBZRetro.lt - Dragon Ball Z Naršyklinis Žaidimas">
    <meta property="og:description" content="Prisijunk prie DBZRetro.lt - nemokamo naršyklinio Dragon Ball Z žaidimo. Kovok, treniruokis ir tapk stipriausiu kovotoju visatoje!">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://dbzretro.lt">
    <meta property="og:image" content="https://dbzretro.lt/img/logo.webp">
    <!-- PWA Support -->
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#212529">
    <link rel="apple-touch-icon" href="img/logo.webp">
    <!-- Accessibility -->
    <meta name="color-scheme" content="dark light">
</head>
<body class="<?php echo $id ? 'section-view' : 'home-view'; ?>">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top py-3 border-bottom border-warning border-2 shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 0 64 64" fill="none" aria-label="Dragon Ball Z Icon" class="me-2">
                <circle cx="32" cy="32" r="30" fill="#F9A825" stroke="#F57F17" stroke-width="4"/>
                <path d="M32 12L35.09 24.26H48L37.45 31.74L40.54 44L32 36.52L23.46 44L26.55 31.74L16 24.26H28.91L32 12Z" fill="#FF6F00"/>
            </svg>
            <span class="fs-4 fw-bold text-warning text-uppercase sitename">DbzRetro.lt</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item"><a class="nav-link text-warning <?php echo !$id ? 'active fw-bold' : ''; ?>" href="index.php"><i class="bi bi-house-door-fill me-1 d-lg-none d-xl-inline-block"></i>Pagrindinis</a></li>
                <li class="nav-item"><a class="nav-link text-warning <?php echo $id === 'news' ? 'active fw-bold' : ''; ?>" href="index.php?id=news"><i class="bi bi-newspaper me-1 d-lg-none d-xl-inline-block"></i>Naujienos</a></li>
                <li class="nav-item"><a class="nav-link text-warning <?php echo $id === 'add2' ? 'active fw-bold' : ''; ?>" href="index.php?id=add2"><i class="bi bi-megaphone-fill me-1 d-lg-none d-xl-inline-block"></i>Reklamos</a></li>
                <li class="nav-item"><a class="nav-link text-warning <?php echo $id === 'rases' ? 'active fw-bold' : ''; ?>" href="index.php?id=rases"><i class="bi bi-person-arms-up me-1 d-lg-none d-xl-inline-block"></i>Rasės</a></li>
                <li class="nav-item"><a class="nav-link text-warning <?php echo basename($_SERVER['PHP_SELF']) === 'kontaktai.php' ? 'active fw-bold' : ''; ?>" href="kontaktai.php"><i class="bi bi-envelope-fill me-1 d-lg-none d-xl-inline-block"></i>Kontaktai</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4 mt-lg-5 mb-5">
    <div class="row gx-lg-5">
        <aside class="col-lg-4 mb-4 mb-lg-0 order-lg-0" id="sidebar">
            <!-- Mobile Banner ONLY -->
            <div class="card bg-dark2 p-2 mb-4 text-center shadow-sm d-lg-none">
                <img src="/img/logo.webp" alt="DBZRetro Logo Banner" class="img-fluid w-75 mx-auto d-block rounded" loading="lazy">
            </div>
            <!-- Desktop Sidebar Content -->
            <div class="d-none d-lg-block">
                <!-- Login Card -->
                <div class="card bg-dark2 p-3 mb-4 shadow">
                    <h5 class="text-center text-warning mb-3 fw-bold"><i class="bi bi-box-arrow-in-right me-2"></i>Prisijungimas</h5>
                    <?php
                    if (isset($_SESSION['login_error'])) {
                        echo '<div class="alert alert-danger small p-2 mb-3" role="alert"><i class="bi bi-exclamation-triangle-fill me-1"></i> ' . htmlspecialchars($_SESSION['login_error']) . '</div>';
                        unset($_SESSION['login_error']);
                    }
                    ?>
                    <form action="prisijungti.php?id=login" method="post" novalidate>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" id="user" name="vardas" placeholder="Žaidėjo vardas" maxlength="20" required>
                            <label for="user">Žaidėjo vardas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-sm" id="pass" name="pass" placeholder="Slaptažodis" maxlength="20" required>
                            <label for="pass">Slaptažodis</label>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 mb-2 fw-bold text-uppercase">Prisijungti</button>
                        <div class="text-end"><a href="prisijungti.php?id=forget" class="text-warning small link-underline-opacity-50 link-underline-opacity-100-hover">Pamiršau slaptažodį</a></div>
                    </form>
                    <?php if ($nust['reg'] === '+'): ?>
                        <hr class="border-warning border-1 opacity-25 my-3">
                        <a href="regas.php" class="btn btn-outline-warning w-100 fw-bold text-uppercase">Registruotis</a>
                    <?php elseif ($nust['reg'] === '?'): ?>
                        <div class="alert alert-secondary small p-2 mt-3 text-center" role="alert">Registracija laikinai sustabdyta.</div>
                    <?php endif; ?>
                </div>
                <!-- Statistika kortelė -->
                <div class="card bg-dark2 p-3 mb-4 shadow">
                    <h5 class="text-center text-gold mb-3 fw-bold">
                        <i class="bi bi-bar-chart-line-fill me-2"></i>Statistika
                    </h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
            <span>
              <i class="bi bi-people-fill me-2 text-info"></i>Prisijungę:
            </span>
                        <span class="fw-bold" style="color:#7fffca; font-size: 1.1rem;">
              <?= isset($online_players) ? (int)$online_players : 0 ?>
              <span style="color:#b6ffe6; font-weight:normal;">/</span>
              <span style="color:#eaffd0;"><?= isset($nust['max_on']) ? (int)$nust['max_on'] : 0 ?></span>
            </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
            <span>
              <i class="bi bi-newspaper me-2 text-info"></i>Atnaujinimai:
            </span>
                        <span>
              <a href="?id=news" class="fw-bold" style="color:#00e6ff; text-decoration:none;">
                <?= isset($totalNewsCount) ? (int)$totalNewsCount : 0 ?>
              </a>
              <?php if(isset($todays_news_count) && $todays_news_count > 0): ?>
                  <span class="ms-1 small" title="Šiandien pridėta" style="color:#b6ffe6;">(+<?= (int)$todays_news_count ?>)</span>
              <?php endif; ?>
            </span>
                    </div>
                    <div class="text-center small mt-3 border-top border-secondary pt-2">
                        <i class="bi bi-person-plus-fill me-1 text-warning"></i>
                        Naujausias narys:
                        <strong class="text-warning">
                            <?= isset($nust['new']) && $nust['new'] ? htmlspecialchars($nust['new']) : 'N/A' ?>
                        </strong>
                    </div>
                </div>
                <!-- Top Players Card -->
                <div class="card bg-dark2 p-4 mb-4 shadow-lg rounded">
                    <h5 class="text-center text-gold mb-4 fw-bold"><i class="bi bi-trophy-fill me-2"></i>TOP Žaidėjai</h5>
                    <ul class="list-group list-group-flush">
                        <?php
                        $rank = 1;
                        $stmtTop = mysqli_prepare($conn, "SELECT nick, lygis FROM zaidejai WHERE statusas NOT IN ('Kurejas', 'Banned') ORDER BY lygis DESC, exp DESC LIMIT 3");
                        if ($stmtTop) {
                            mysqli_stmt_execute($stmtTop);
                            $topResult = mysqli_stmt_get_result($stmtTop);
                            if ($topResult && mysqli_num_rows($topResult) > 0):
                                while($row = mysqli_fetch_assoc($topResult)):
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0 px-0 py-2">
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold me-3 text-warning fs-5"><?= $rank ?>.</span>
                                            <span class="text-light fs-6"><?= htmlspecialchars($row['nick']) ?></span>
                                        </div>
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                  <i class="bi bi-star-fill me-1"></i><?= htmlspecialchars($row['lygis']) ?> Lvl
                </span>
                                    </li>
                                    <?php
                                    $rank++;
                                endwhile;
                            else:
                                echo '<li class="list-group-item bg-transparent border-0 px-0 py-2 text-muted text-center fst-italic">Žaidėjų sąrašas tuščias.</li>';
                            endif;
                            mysqli_stmt_close($stmtTop);
                        } else {
                            error_log("DB Prepare Error (TOP Players): " . mysqli_error($conn));
                            echo '<li class="list-group-item bg-transparent border-0 px-0 py-2 text-danger text-center">Klaida gaunant TOP žaidėjus.</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Main Content - Full width on mobile, 8 columns on desktop -->
        <main class="col-12 col-lg-8 main-content">
            <!-- Back button for mobile section views -->
            <div class="d-lg-none mb-3">
                <a href="javascript:history.back()" class="btn btn-warning w-100 fw-bold py-2 rounded-pill shadow-sm" style="font-size:1.1rem;">
                    <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
                </a>
            </div>

            <?php if($nust['reg'] == "-"): ?>
                <div class="card bg-dark2 p-4 text-center">
                    <h3 class="text-white mb-4">Registracija</h3>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Registracija šiuo metu išjungta!
                    </div>
                    <a href="javascript:history.back()" class="btn btn-warning mt-3">
                        <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
                    </a>
                </div>

            <?php elseif($id == ""): ?>
                <div class="card bg-dark2 p-4 shadow-lg border-0 modern-character-select-card" style="border-radius: 20px; background: linear-gradient(135deg, #232323 80%, #1a1a1a 100%); overflow: hidden;">
                    <div class="text-center mb-4">
                        <h3 class="text-gold fw-bold mb-2" style="letter-spacing:1px; font-size:2rem;">
                            <i class="bi bi-person-arms-up me-2"></i>Veikėjo pasirinkimas
                        </h3>
                        <p class="text-white-50 mb-0" style="font-size:1.1rem;">
                            Pasirink savo mėgstamiausią veikėją ir būk pirmas! Kiekvienas veikėjas turi savo privalumų, pliusų bei minusų!
                        </p>
                    </div>
                    <div class="alert alert-warning border-0 mb-3 shadow-sm" style="background:rgba(255,191,0,0.07); color:#ffe082;">
                        <i class="bi bi-info-circle me-2"></i>
                        Kiekvienas veikėjas turintis bent vieną transformaciją negauna papildomų veikėjo procentų jėgai ir gynybai!
                        O tie kurie neturi nei vienos transformacijos, gauna jėgos ir gynybos procentus vos užsiregistravę!
                    </div>
                    <div class="row g-4 justify-content-center modern-character-select">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <a href="?id=veik&ka=1&ID=" class="modern-character-card d-flex flex-column align-items-center text-decoration-none p-3 h-100">
                                <div class="modern-character-img-wrap mb-3">
                                    <img src="/img/characters/goku.webp" alt="Gokas" class="img-fluid" loading="lazy">
                                </div>
                                <span class="fw-bold text-warning fs-5 mb-1">Gokas</span>
                                <span class="badge bg-dark2 text-white-50 px-3 py-1 mt-auto" style="font-size:0.95rem;">Transformacijos: Taip</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <a href="?id=veik&ka=33&ID=" class="modern-character-card d-flex flex-column align-items-center text-decoration-none p-3 h-100">
                                <div class="modern-character-img-wrap mb-3">
                                    <img src="/img/characters/krillin.webp" alt="Krilinas" class="img-fluid" loading="lazy">
                                </div>
                                <span class="fw-bold text-warning fs-5 mb-1">Krilinas</span>
                                <span class="badge bg-dark2 text-white-50 px-3 py-1 mt-auto" style="font-size:0.95rem;">Transformacijos: Ne</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <a href="?id=veik&ka=6&ID=" class="modern-character-card d-flex flex-column align-items-center text-decoration-none p-3 h-100">
                                <div class="modern-character-img-wrap mb-3">
                                    <img src="/img/characters/bulma.webp" alt="Bulma" class="img-fluid" loading="lazy">
                                </div>
                                <span class="fw-bold text-warning fs-5 mb-1">Bulma</span>
                                <span class="badge bg-dark2 text-white-50 px-3 py-1 mt-auto" style="font-size:0.95rem;">Transformacijos: Ne</span>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3">
                            <a href="?id=veik&ka=10&ID=" class="modern-character-card d-flex flex-column align-items-center text-decoration-none p-3 h-100">
                                <div class="modern-character-img-wrap mb-3">
                                    <img src="/img/characters/piccolo.webp" alt="Pikolas" class="img-fluid" loading="lazy">
                                </div>
                                <span class="fw-bold text-warning fs-5 mb-1">Pikolas</span>
                                <span class="badge bg-dark2 text-white-50 px-3 py-1 mt-auto" style="font-size:0.95rem;">Transformacijos: Taip</span>
                            </a>
                        </div>
                    </div>
                    <style>
                        .modern-character-select-card {
                            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(255,191,0,0.08);
                            transition: box-shadow 0.3s;
                        }
                        .modern-character-select-card:hover {
                            box-shadow: 0 12px 40px 0 rgba(255,191,0,0.15), 0 2px 12px 0 rgba(0,0,0,0.25);
                        }
                        .modern-character-select {
                            margin-top: 1.5rem;
                        }
                        .modern-character-card {
                            background: linear-gradient(120deg, rgba(255,255,255,0.01) 0%, rgba(255,191,0,0.03) 100%);
                            border-radius: 1rem;
                            box-shadow: 0 2px 8px 0 rgba(255,191,0,0.08);
                            border: 1.5px solid #232323;
                            min-height: 220px;
                            transition: transform 0.2s, box-shadow 0.2s, background 0.2s;
                            position: relative;
                            width: 100%;
                            max-width: 320px;
                            margin-left: auto;
                            margin-right: auto;
                        }
                        .modern-character-card:hover, .modern-character-card:focus {
                            transform: translateY(-8px) scale(1.03);
                            background: linear-gradient(120deg, rgba(255,255,255,0.03) 0%, rgba(255,191,0,0.07) 100%);
                            box-shadow: 0 6px 24px 0 rgba(255,191,0,0.13);
                            z-index: 2;
                        }
                        .modern-character-img-wrap {
                            background: rgba(255,255,255,0.04);
                            border-radius: 1rem;
                            box-shadow: 0 4px 24px 0 rgba(255,191,0,0.08);
                            padding: 0.5rem;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            width: 100%;
                            min-height: 120px;
                        }

                        @media (max-width: 991.98px) {
                            .modern-character-select-card {
                                border-radius: 10px;
                                padding: 1rem !important;
                            }
                            .modern-character-card {
                                min-height: 180px;
                                border-radius: 0.7rem;
                                padding: 1rem !important;
                                max-width: 340px;
                            }

                        }
                        @media (max-width: 600px) {
                            .modern-character-select-card { border-radius: 8px; padding: 0.5rem !important; }
                            .modern-character-card {
                                min-height: 120px;
                                border-radius: 0.5rem;
                                padding: 0.5rem !important;
                                max-width: 100%;
                            }
                            .modern-character-select { margin-top: 0.5rem; }
                            .fw-bold.fs-5.mb-1 { font-size: 1rem !important; }
                            .badge { font-size: 0.8rem !important; }
                        }
                        /* Extra: make each character take full width on mobile for better visibility */
                        @media (max-width: 600px) {
                            .modern-character-select > .col-12 {
                                flex: 0 0 100%;
                                max-width: 100%;
                            }
                        }
                    </style>
                </div>
            <?php elseif($id == 'veik'): ?>
                <?php
                $ka = (int)$ka; // enforce integer (very important)

                $stmt = Db::prepare("SELECT * FROM veikejai WHERE id = ?");
                $stmt->execute([$ka]);
                $veik = $stmt->fetch(PDO::FETCH_ASSOC);


                if ($veik === false):
                    ?>
                    <div class="card bg-dark2 p-4 text-center">
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Tokio veikėjo nėra!
                        </div>
                        <a href="regas.php" class="btn btn-warning mt-3">
                            <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
                        </a>
                    </div>
                <?php else:
                    $imgssxx = ($veik['name'] == 'Vedžitas') ? 'Vedzitas' : $veik['name'];
                    $zaideju_kiekis = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='$veik[name]'"));
                    ?>
                    <div class="card shadow-lg border-0 modern-character-card" style="border-radius: 20px; background: linear-gradient(135deg, #232323 80%, #1a1a1a 100%); overflow: hidden;">
                        <div class="character-header position-relative text-center p-0" style="background: linear-gradient(90deg, #232323 60%, #ffb300 100%);">
                            <img src="img/veikejaic/<?=$imgssxx?>.png" class="character-img img-fluid mx-auto d-block" style="max-height: 200px; margin-top: 1.5rem; filter: drop-shadow(0 8px 24px #000a);" alt="<?=$veik['name']?>">
                            <h2 class="fw-bold text-gold mb-0 mt-3" style="letter-spacing:1px; font-size:2.1rem;"><?=htmlspecialchars($veik['name'])?></h2>
                            <span class="badge rounded-pill bg-warning text-dark px-3 py-2 position-absolute top-0 end-0 m-3 shadow" style="font-size:1rem; font-weight:600;">
                                <i class="bi bi-person-fill me-1"></i><?=$zaideju_kiekis?> žaidėjų
                            </span>
                        </div>
                        <div class="px-4 pb-4 pt-3">
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-md-4">
                                    <div class="bonus-box text-center py-3 px-2 rounded-3 shadow-sm" style="background:rgba(75,224,75,0.08);">
                                        <div class="bonus-icon mb-2"><i class="bi bi-lightning-charge-fill" style="color:#4be04b; font-size:2rem;"></i></div>
                                        <div class="bonus-label text-white-50 small">Jėga</div>
                                        <div class="bonus-value fw-bold" style="color:#4be04b; font-size:1.3rem;"><?=$veik['jega']?>%</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="bonus-box text-center py-3 px-2 rounded-3 shadow-sm" style="background:rgba(62,198,224,0.08);">
                                        <div class="bonus-icon mb-2"><i class="bi bi-shield-fill" style="color:#3ec6e0; font-size:2rem;"></i></div>
                                        <div class="bonus-label text-white-50 small">Gynyba</div>
                                        <div class="bonus-value fw-bold" style="color:#3ec6e0; font-size:1.3rem;"><?=$veik['gynyba']?>%</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="bonus-box text-center py-3 px-2 rounded-3 shadow-sm" style="background:rgba(224,75,75,0.08);">
                                        <div class="bonus-icon mb-2"><i class="bi bi-heart-fill" style="color:#e04b4b; font-size:2rem;"></i></div>
                                        <div class="bonus-label text-white-50 small">Gyvybės</div>
                                        <div class="bonus-value fw-bold" style="color:#e04b4b; font-size:1.3rem;"><?=$veik['gyvybes']?>%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="character-info mb-4">
                                <h5 class="text-center text-white-50 mb-3" style="letter-spacing:0.5px;">Veikėjo informacija</h5>
                                <ul class="list-group list-group-flush modern-list-group">
                                    <li class="list-group-item d-flex align-items-center bg-transparent border-0 px-0 py-2">
                                        <i class="bi bi-person-fill text-warning me-2"></i>
                                        <span class="text-white-50">Veikėjas:</span>
                                        <span class="ms-auto text-white fw-bold"><?=htmlspecialchars($veik['name'])?></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center bg-transparent border-0 px-0 py-2">
                                        <i class="bi bi-arrow-up-circle-fill text-warning me-2"></i>
                                        <span class="text-white-50">Turi transformacijų:</span>
                                        <span class="ms-auto text-white fw-bold"><?=htmlspecialchars($veik['trans'])?></span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center bg-transparent border-0 px-0 py-2">
                                        <i class="bi bi-lightning-fill text-warning me-2"></i>
                                        <span class="text-white-50">Unikali technika:</span>
                                        <span class="ms-auto text-white fw-bold"><?=htmlspecialchars($veik['technika'])?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="?id=reg2&ka=<?=urlencode($veik['name'])?>&ID=<?=urlencode($ID)?>" class="btn btn-warning btn-lg px-4 py-2 fw-bold shadow-sm modern-btn" style="border-radius: 10px; font-size:1.15rem;">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    PASIRINKTI ŠĮ VEIKĖJĄ
                                </a>
                            </div>
                        </div>
                    </div>
                    <style>
                        .modern-character-card {
                            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(255,191,0,0.08);
                            transition: box-shadow 0.3s;
                        }
                        .modern-character-card:hover {
                            box-shadow: 0 12px 40px 0 rgba(255,191,0,0.15), 0 2px 12px 0 rgba(0,0,0,0.25);
                        }
                        .character-header {
                            border-bottom: 1px solid #ffb30033;
                            padding-bottom: 1rem;
                        }
                        .character-img {
                            background: rgba(255,255,255,0.03);
                            border-radius: 1rem;
                            box-shadow: 0 4px 24px 0 rgba(255,191,0,0.08);
                        }
                        .bonus-box {
                            min-width: 120px;
                            min-height: 100px;
                            border: 1.5px solid #232323;
                            background: linear-gradient(120deg, rgba(255,255,255,0.01) 0%, rgba(255,191,0,0.03) 100%);
                        }
                        .modern-list-group .list-group-item {
                            border-bottom: 1px solid #232323;
                            font-size: 1.05rem;
                        }
                        .modern-list-group .list-group-item:last-child {
                            border-bottom: none;
                        }
                        .modern-btn {
                            box-shadow: 0 2px 8px 0 rgba(255,191,0,0.13);
                            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
                        }
                        .modern-btn:hover, .modern-btn:focus {
                            background: #ffb300;
                            color: #232323;
                            box-shadow: 0 4px 16px 0 rgba(255,191,0,0.18);
                        }
                        @media (max-width: 991.98px) {
                            .modern-character-card { border-radius: 10px; }
                            .character-header { padding-bottom: 0.5rem; }
                            .character-img { max-height: 140px; }
                            .bonus-box { min-width: 90px; min-height: 80px; }
                        }
                        @media (max-width: 600px) {
                            .modern-character-card { border-radius: 8px; }
                            .character-header { padding-bottom: 0.3rem; }
                            .character-img { max-height: 80px; }
                            .bonus-box { min-width: 60px; min-height: 50px; }
                            .modern-list-group .list-group-item { font-size: 0.95rem; }
                        }
                    </style>
                <?php endif; ?>
            <?php elseif($id == 'reg2'): ?>
                <?php
                $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'"));

                if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0):
                    ?>
                    <div class="card bg-dark2 p-4 text-center">
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Tokio veikėjo nėra!
                        </div>
                        <a href="regas.php" class="btn btn-warning mt-3">
                            <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
                        </a>
                    </div>
                <?php else:
                    $imgssxx = ($veik['name'] == 'Vedžitas') ? 'Vedzitas' : $veik['name'];
                    ?>
                    <div class="card bg-dark2 p-4 shadow-lg border-0 modern-register-card" style="border-radius: 20px; background: linear-gradient(135deg, #232323 80%, #1a1a1a 100%); overflow: hidden;">
                        <div class="text-center mb-4">
                            <img src="img/veikejaic/<?=$imgssxx?>.png" class="img-fluid modern-register-img" style="max-height: 180px; border-radius: 1rem; box-shadow: 0 4px 24px 0 rgba(255,191,0,0.08);" alt="<?=htmlspecialchars($veik['name'])?>">
                            <h3 class="text-gold mt-3 fw-bold" style="letter-spacing:1px; font-size:2rem;">
                                <i class="bi bi-person-plus-fill me-2"></i>Registracija – <?=htmlspecialchars($veik['name'])?>
                            </h3>
                        </div>
                        <div class="alert alert-dbz mb-4 shadow-sm border-0" style="background:rgba(255,191,0,0.07); color:#ffe082;">
                            <i class="bi bi-info-circle me-2"></i>
                            Vardas gali būti tik iš mažųjų raidžių. Jeigu vesite didžiosiom, jis bus automatiškai pakeistas į mažąsias.
                        </div>
                        <form method="post" action="?id=reg3&ka=<?=urlencode($ka)?>&ID=<?=urlencode($ID)?>" class="needs-validation modern-form" novalidate autocomplete="off">
                            <div class="mb-3">
                                <label for="user" class="form-label text-white-50 fw-semibold">
                                    <i class="bi bi-person-fill me-2"></i>Žaidėjo vardas
                                </label>
                                <input type="text" class="form-control modern-input" name="vardas" id="user" placeholder="Įveskite norimą vardą" maxlength="15" required>
                                <div class="invalid-feedback">Prašome įvesti žaidėjo vardą</div>
                            </div>
                            <div class="mb-3">
                                <label for="pass" class="form-label text-white-50 fw-semibold">
                                    <i class="bi bi-lock-fill me-2"></i>Slaptažodis
                                </label>
                                <input type="password" class="form-control modern-input" name="pass" id="pass" placeholder="Įveskite slaptažodį" minlength="6" maxlength="20" required>
                                <div class="invalid-feedback">Prašome įvesti slaptažodį</div>
                            </div>
                            <div class="mb-3">
                                <label for="pass2" class="form-label text-white-50 fw-semibold">
                                    <i class="bi bi-lock-fill me-2"></i>Pakartoti slaptažodį
                                </label>
                                <input type="password" class="form-control modern-input" name="pass2" id="pass2" placeholder="Pakartokite slaptažodį" minlength="6" maxlength="20" required>
                                <div class="invalid-feedback">Prašome pakartoti slaptažodį</div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-white-50 fw-semibold">
                                    <i class="bi bi-shield-lock-fill me-2"></i>Apsauga nuo robotų
                                </label>
                                <style>
                                    /* Remove white background from reCAPTCHA iframe */
                                    .g-recaptcha, .grecaptcha-badge, .g-recaptcha iframe {
                                        background: transparent !important;
                                        box-shadow: none !important;
                                    }
                                </style>
                                <div class="g-recaptcha" data-theme="dark" data-sitekey="<?=htmlspecialchars($siteKey)?>"></div>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-warning btn-lg fw-bold shadow modern-btn" style="border-radius: 10px; font-size:1.15rem;">
                                    <i class="bi bi-person-plus-fill me-2"></i>Registruotis
                                </button>
                            </div>
                        </form>
                    </div>
                    <style>
                        .modern-register-card {
                            box-shadow: 0 8px 32px 0 rgba(0,0,0,0.25), 0 1.5px 8px 0 rgba(255,191,0,0.08);
                            transition: box-shadow 0.3s;
                        }
                        .modern-register-card:hover {
                            box-shadow: 0 12px 40px 0 rgba(255,191,0,0.15), 0 2px 12px 0 rgba(0,0,0,0.25);
                        }
                        .modern-register-img {
                            background: rgba(255,255,255,0.03);
                            border-radius: 1rem;
                            box-shadow: 0 4px 24px 0 rgba(255,191,0,0.08);
                        }
                        .modern-form .form-label {
                            font-size: 1.05rem;
                            letter-spacing: 0.5px;
                        }
                        .modern-input {
                            background: rgba(255,255,255,0.03);
                            border: 1.5px solid #232323;
                            color: #fff;
                            border-radius: 0.5rem;
                            font-size: 1.1rem;
                            transition: border-color 0.2s, box-shadow 0.2s;
                        }
                        .modern-input:focus {
                            border-color: #ffb300;
                            box-shadow: 0 0 0 0.2rem rgba(255,191,0,0.15);
                            background: rgba(255,255,255,0.07);
                            color: #fff;
                        }
                        .modern-btn {
                            box-shadow: 0 2px 8px 0 rgba(255,191,0,0.13);
                            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
                        }
                        .modern-btn:hover, .modern-btn:focus {
                            background: #ffb300;
                            color: #232323;
                            box-shadow: 0 4px 16px 0 rgba(255,191,0,0.18);
                        }
                        @media (max-width: 991.98px) {
                            .modern-register-card { border-radius: 10px; padding: 1rem !important; }
                            .modern-register-img { max-height: 120px; }
                        }
                        @media (max-width: 600px) {
                            .modern-register-card { border-radius: 8px; padding: 0.5rem !important; }
                            .modern-register-img { max-height: 70px; }
                            .modern-form .form-label { font-size: 0.95rem; }
                            .modern-input { font-size: 1rem; }
                        }
                    </style>
                <?php endif; ?>

            <?php elseif($id == 'reg3'): ?>
            <?php
            $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'"));

            if(isset($_POST['submit'])){
            $vardas = isset($_POST['vardas']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['vardas']) : null;
            $pass = isset($_POST['pass']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['pass']) : null;
            $pass2 = isset($_POST['pass2']) ? preg_replace("/[^A-Za-z0-9_]/","",$_POST['pass2']) : null;
            $captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : null;
            $vardas2 = strtolower($vardas);

            if(empty($vardas) || empty($pass) || empty($pass2)){
                $klaida = 'Paliktas kažkuris tuščias laukelis!';
            } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0){
                $klaida = 'Tokio veikėjo nėra!';
            } elseif(preg_match('/[^A-Za-z0-9]/', $vardas)){
                $klaida = 'Žaidėjo varde negalima naudoti tokių simbolių!';
            } elseif(preg_match('/[^A-Za-z0-9]/', $pass)){
                $klaida = 'Slaptažodyje negalima naudoti tokių simbolių!';
            } elseif(!$captcha){
                $klaida = 'Pamiršote įrodyti, kad nesate robotas.';
            } elseif(strlen($vardas) < 3){
                $klaida = 'Žaidėjo vardas yra per trumpas. Mažiausiai 3 simboliai.';
            } elseif(!isValidCaptcha($captcha)){
                $klaida = 'Google sako, kad esate robotas arba wap gejus.';
            } elseif(strlen($vardas) > 15){
                $klaida = 'Žaidėjo vardas yra per ilgas. Daugiausiai 15 simbolių.';
            } elseif(strlen($pass) < 6){
                $klaida = 'Slaptažodis yra per trumpas. Mažiausiai 6 simboliai.';
            } elseif(strlen($pass) > 20){
                $klaida = 'Slaptažodis yra per ilgas. Daugiausiai 20 simbolių.';
            } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$vardas'")) > 0){
                $klaida = 'Toks žaidėjas jau užsiregistravęs!';
            } elseif(strcasecmp($vardas, 'sistema') === 0){
                $klaida = 'Toks žaidėjas jau užsiregistravęs!';
            } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE ip='$ipas'")) > 0){
                $klaida = 'Registruotis galima tik 1 kartą!';
            } elseif($pass != $pass2){
                $klaida = 'Slaptažodžiai nesutampa!';
            } else {
            // Registration successful
            // Insert user data into database
            mysqli_query($conn,"INSERT INTO zaidejai SET nick='$vardas2', pass='$pass', atved='$ID', litai='50000', kred='20', sms_litai='10', veikejas='$ka', css='2', statusas='Žaidėjas', jega='60', gynyba='180', gyvybes='100', max_gyvybes='100', exp='0', expl='50', minichatas='1', mini_chat='1', lygis='1',kai ='-', rodymas='10', auksiniai='0', laimeta='0', laimetapl='0', pralaimetapl='0', vip ='$vip_time', pralaimeta='0',ip ='$ipas', sword='Neuzdetas', armor='Neuzdetas', amuletas='Neuzdetas', vipticket='0', uzsiregistravo='".time()."' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO veikejas SET nick='$vardas2', veikejas='$ka' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO susijungimas SET nick='$vardas2' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO auros SET nick='$vardas2' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO technikos SET nick='$vardas2' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO pasiekimai SET nick='$vardas2' ") or die(mysqli_error());
            $timxx = time()+60*60*24;
            mysqli_query($conn,"UPDATE zaidejai SET antipl='$timxx' WHERE nick='$vardas2' ");
            mysqli_query($conn,"UPDATE inv SET viplvl='0' WHERE nick='$vardas2' ");
            mysqli_query($conn,"INSERT INTO user SET nick='$vardas2', meniu1='+', meniu2='+', meniu3='+' ") or die(mysqli_error());
            mysqli_query($conn,"INSERT INTO daily set nick='$vardas2', snd='-', snd2='-', snd3='-', snd4='-', snd5='-', 2snd='-', 2snd2='-', 2snd3='-', 2snd4='-', 2snd5='-', m='-', m2='-', m3='-', m4='-', m5='-' ") or die(mysqli_error());
            mysqli_query($conn,"UPDATE nustatymai SET new='$vardas2' ");
            mysqli_query($conn,"INSERT INTO pm set what='SISTEMA', gavejas='$vardas2', time='".time()."', txt='Sveikas <b>$vardas2!</b>. Tu užsiregistravai į Dragon Ball Super žaidimą!.Kaip naujokas tu gavai 50000 Pinigų ,20 Kreditų ir 10 Eurų.Kodėl būtent verta žaisti šita žaidima? Atnaujinimai daromi dažnai .Puiki administracija .Išklausoma kiekviena žaidejo nuomonė. Tad prisijunkite ir tapkite šio žaidimo dalimi. Prisijungus prie žaidimo siūlome iškart pasiimti legendinę dienos misiją. (Misijos -> Legendinės dienos misijos)', nauj='NEW'") or die(mysqli_error());

            // Show success message
            ?>
            <div class="card bg-dark2 p-4 text-center">
                <div class="alert alert-success mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Registracija sėkminga, <b><?=$vardas2?></b>!
                </div>
                <p>Dabar galite prisijungti prie žaidimo! :)</p>
                <p>Turite kokių klausimų, idėjų? Rašykite testas1 privačia žinute!</p>
                <p>Sėkmės žaidime!</p>
                <a href="javascript:history.back()" class="btn btn-warning mt-3">
                    <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
                </a>
            </div>
    </div>
    <?php
    }

    if(isset($klaida)){
        ?>
        <div class="card bg-dark2 p-4 text-center">
            <div class="alert alert-danger mb-4">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?=$klaida?>
            </div>
            <a href="?id=reg2&ka=<?=$veik['name']?>&ID=<?=$ID?>" class="btn btn-warning">
                <i class="bi bi-arrow-left me-2"></i>Grįžti atgal
            </a>
        </div>
        <?php
    }
    }
    ?>
    <?php endif; ?>
    </main>
</div>
</div>
<footer class="navbar navbar-dark bg-dark py-3 mt-auto border-top border-warning border-2 shadow-sm">
    <div class="container text-center">
        <a class="navbar-brand d-inline-flex align-items-center justify-content-center mb-3" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 0 64 64" fill="none" aria-label="Dragon Ball Z Icon" class="me-2">
                <circle cx="32" cy="32" r="30" fill="#F9A825" stroke="#F57F17" stroke-width="4"/>
                <path d="M32 12L35.09 24.26H48L37.45 31.74L40.54 44L32 36.52L23.46 44L26.55 31.74L16 24.26H28.91L32 12Z" fill="#FF6F00"/>
            </svg>
            <span class="fs-5 fw-bold text-warning text-uppercase sitename">DbzRetro.lt</span>
        </a>
        <div class="footer-social mb-3 d-flex justify-content-center align-items-center gap-3">
            <a href="https://discord.gg/QyRdrszqtZ" target="_blank" rel="noopener noreferrer nofollow" title="Prisijunk prie mūsų Discord" class="text-warning mx-2 footer-icon-link">
                <i class="bi bi-discord fs-3"></i>
            </a>
            <a href="mailto:emarcinkevicius82@gmail.com" title="Susisiek el. paštu" class="text-warning mx-2 footer-icon-link">
                <i class="bi bi-envelope-fill fs-3"></i>
            </a>
        </div>
        <div class="footer-love text-light text-uppercase fw-bold small mb-2">
            Sukurta su <span class="text-danger mx-1" style="font-size: 1.2em; text-shadow: 0 0 8px rgba(220, 53, 69, 0.7);">&hearts;</span> DBZ Fanams
        </div>
        <div class="text-muted small">© <?= date('Y') ?> DbzRetro.lt Visos teisės saugomos.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
<script src="js/main.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    // Form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Loading overlay
    document.addEventListener('DOMContentLoaded', function() {
        const loading = document.querySelector('.loading');
        const forms = document.querySelectorAll('form');

        forms.forEach(form => {
            form.addEventListener('submit', function() {
                loading.classList.add('active');
            });
        });
    });
</script>
</body>
</html>