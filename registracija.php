<?php
error_reporting(E_ERROR);
ob_start();
session_start();

include_once 'cfg/sql.php';
include_once 'cfg/limit.php';

// Get reCAPTCHA keys from environment
$siteKey = getenv('GOOGLE_CAPTCHA_SITE_KEY');

// Function to validate reCAPTCHA
function isValidCaptcha($captcha) {
    $secretKey = getenv('GOOGLE_CAPTCHA_SECRET');
    
    if (!$secretKey) {
        return false;
    }
    
    $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$_SERVER['REMOTE_ADDR']}"), true);
    
    return $response['success'] === true;
}

$id = isset($_GET['id']) ? preg_replace('/[^A-Za-z0-9_ ]/', '', $_GET['id']) : null;
$ka = isset($_GET['ka']) ? $_GET['ka'] : null;
$ID = isset($_GET['ID']) ? $_GET['ID'] : null;
$ipas = $_SERVER['REMOTE_ADDR'];

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

<div class="container mb-5"> <!-- Changed my-5 to mb-5 -->
  <div class="row gx-5">
    <aside class="col-lg-4 mb-4" id="sidebar">
      <!-- Login -->
      <div class="card bg-dark2 p-3 mb-4"> <!-- Added bg-dark2 -->
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
      <div class="card bg-dark2 p-3 mb-4"> <!-- Added bg-dark2 -->
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
      <div class="card bg-dark2 p-3"> <!-- Added bg-dark2 -->
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
      <!-- Back button for mobile section views -->
      <div class="back-button">
        <a href="index.php" class="btn btn-outline-warning mb-3">
          <i class="bi bi-arrow-left"></i> Grįžti į pagrindinį
        </a>
      </div>
      
      <?php if($nust['reg'] == "-"): ?>
        <div class="card bg-dark2 p-4 text-center"> <!-- Added bg-dark2 -->
          <h3 class="text-white mb-4">Registracija</h3>
          <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Registracija šiuo metu išjungta!
          </div>
          <a href="index.php" class="btn btn-warning mt-3">Grįžti į pagrindinį</a>
        </div>
      
      <?php elseif($id == ""): ?>
        <div class="card bg-dark2 p-4"> <!-- Added bg-dark2 -->
          <h3 class="text-white text-center mb-4">Veikėjo pasirinkimas</h3>
          
          <div class="alert alert-dbz mb-4">
            <i class="bi bi-info-circle me-2"></i>
            Pasirink savo mėgstamiausią veikėją ir būk pirmas! Kiekvienas veikėjas turi savo privalumų, pliusų bei minusų!
          </div>
          
          <div class="alert alert-dbz mb-4">
            <i class="bi bi-info-circle me-2"></i>
            Kiekvienas veikėjas turintis bent vieną transformaciją negauna papildomų veikėjo procentų jėgai ir gynybai!
            O tie kurie neturi nei vienos transformacijos, gauna jėgos ir gynybos procentus vos užsiregistravę!
          </div>
          
          <div class="champion-select">
            <a href="?id=veik&ka=1&ID=">
              <img src="/img/characters/goku.webp" alt="Gokas">
              <span class="text-white">Gokas</span>
            </a>
            <a href="?id=veik&ka=33&ID=">
              <img src="/img/characters/krillin.webp" alt="Krilinas">
              <span class="text-white">Krilinas</span>
            </a>
            <a href="?id=veik&ka=6&ID=">
              <img src="/img/characters/bulma.webp" alt="Bulma">
              <span class="text-white">Bulma</span>
            </a>
            <a href="?id=veik&ka=10&ID=">
              <img src="/img/characters/piccolo.webp" alt="Pikolas">
              <span class="text-white">Pikolas</span>
            </a>
          </div>
        </div>
      
      <?php elseif($id == 'veik'): ?>
        <?php 
        $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka'"));
        
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka'")) == 0): 
        ?>
          <div class="card bg-dark2 p-4 text-center"> <!-- Added bg-dark2 -->
            <div class="alert alert-danger">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              Tokio veikėjo nėra!
            </div>
            <a href="regas.php" class="btn btn-warning mt-3">Grįžti atgal</a>
          </div>
        <?php else: 
          $imgssxx = ($veik['name'] == 'Vedžitas') ? 'Vedzitas' : $veik['name'];
        ?>
          <div class="card bg-dark2 p-4"> <!-- Added bg-dark2 -->
            <div class="text-center mb-4">
              <img src="img/veikejaic/<?=$imgssxx?>.png" class="img-fluid" style="max-height: 300px;" alt="<?=$veik['name']?>">
              <h3 class="text-white mt-3"><?=$veik['name']?></h3>
            </div>
            
            <h5 class="text-white text-center mb-3">Veikėjo bonusai</h5>
            <div class="character-stats mb-4">
              <div class="stat">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="fs-5 text-white"><?=$veik['jega']?>%</span>
                  <img src="img/bicons/attack1.png" alt="Jėga">
                </div>
                <small class="text-white">Jėga</small>
              </div>
              <div class="stat">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="fs-5 text-white"><?=$veik['gynyba']?>%</span>
                  <img src="img/bicons/shield.png" alt="Gynyba">
                </div>
                <small class="text-white">Gynyba</small>
              </div>
              <div class="stat">
                <div class="d-flex align-items-center justify-content-center">
                  <span class="fs-5 text-white"><?=$veik['gyvybes']?>%</span>
                  <img src="img/bicons/hp.png" alt="Gyvybės">
                </div>
                <small class="text-white">Gyvybės</small>
              </div>
            </div>
            
            <h5 class="text-white text-center mb-3">Veikėjo informacija</h5>
            <ul class="list-group list-group-flush mb-4">
              <li class="list-group-item bg-transparent border-secondary">
                <i class="bi bi-person-fill me-2"></i>
                Veikėjas: <span class="text-white"><?=$veik['name']?></span>
              </li>
              <li class="list-group-item bg-transparent border-secondary">
                <i class="bi bi-arrow-up-circle-fill me-2"></i>
                Turi transformacijų: <span class="text-white"><?=$veik['trans']?></span>
              </li>
              <li class="list-group-item bg-transparent border-secondary">
                <i class="bi bi-people-fill me-2"></i>
                Veikėją pasirinko: <span class="text-white"><?=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='$veik[name]'"))?> žaidėjų</span>
              </li>
              <li class="list-group-item bg-transparent border-secondary">
                <i class="bi bi-lightning-fill me-2"></i>
                Unikali technika: <span class="text-white"><?=$veik['technika']?></span>
              </li>
            </ul>
            
            <div class="text-center">
              <a href="?id=reg2&ka=<?=$veik['name']?>&ID=<?=$ID?>" class="btn btn-warning">
                <i class="bi bi-check-circle-fill me-2"></i>
                Pasirinkti šį veikėją
              </a>
            </div>
          </div>
        <?php endif; ?>
      
      <?php elseif($id == 'reg2'): ?>
        <?php 
        $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'"));
        
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0): 
        ?>
          <div class="card bg-dark2 p-4 text-center"> <!-- Added bg-dark2 -->
            <div class="alert alert-danger">
              <i class="bi bi-exclamation-triangle-fill me-2"></i>
              Tokio veikėjo nėra!
            </div>
            <a href="regas.php" class="btn btn-warning mt-3">Grįžti atgal</a>
          </div>
        <?php else: 
          $imgssxx = ($veik['name'] == 'Vedžitas') ? 'Vedzitas' : $veik['name'];
        ?>
          <div class="card bg-dark2 p-4"> <!-- Added bg-dark2 -->
            <div class="text-center mb-4">
              <img src="img/veikejaic/<?=$imgssxx?>.png" class="img-fluid" style="max-height: 200px;" alt="<?=$veik['name']?>">
              <h3 class="text-gold mt-3">Registracija - <?=$veik['name']?></h3>
            </div>
            
            <div class="alert alert-dbz mb-4">
              <i class="bi bi-info-circle me-2"></i>
              Vardas gali būti tik iš mažųjų raidžių. Jeigu vesite didžiosiom, tai jis bus automatiškai pakeistas į mažąsias.
            </div>
            
            <form method="post" action="?id=reg3&ka=<?=$ka?>&ID=<?=$ID?>">
              <div class="mb-3">
                <label for="user" class="form-label">
                  <i class="bi bi-person-fill me-2"></i>Žaidėjo vardas
                </label>
                <input type="text" class="form-control" name="vardas" id="user" placeholder="Įveskite norimą vardą">
              </div>
              
              <div class="mb-3">
                <label for="pass" class="form-label">
                  <i class="bi bi-lock-fill me-2"></i>Slaptažodis
                </label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Įveskite norimą slaptažodį">
              </div>
              
              <div class="mb-3">
                <label for="pass2" class="form-label">
                  <i class="bi bi-lock-fill me-2"></i>Pakartoti slaptažodį
                </label>
                <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Pakartokite savo slaptažodį">
              </div>
              
              <div class="mb-4">
                <label class="form-label">
                  <i class="bi bi-shield-lock-fill me-2"></i>Apsauga nuo robotų
                </label>
                <div class="g-recaptcha" data-theme="dark" data-sitekey="<?=htmlspecialchars($siteKey)?>"></div>
              </div>
              
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-warning">
                  <i class="bi bi-person-plus-fill me-2"></i>Registruotis
                </button>
              </div>
            </form>
          </div>
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
                // Insert user data into database (code from original script)
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
                <div class="card bg-dark2 p-4 text-center"> <!-- Added bg-dark2 -->
                  <div class="alert alert-success mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    Registracija sėkminga, <b><?=$vardas2?></b>!
                  </div>
                  <p>Dabar galite prisijungti prie žaidimo! :)</p>
                  <p>Turite kokių klausimų, idėjų? Rašykite testas1 privačia žinute!</p>
                  <p>Sėkmės žaidime!</p>
                  <a href="index.php" class="btn btn-warning mt-3">
                    <i class="bi bi-house-fill me-2"></i>Grįžti į pagrindinį
                  </a>
                </div>
                <?php
            }
            
            if(isset($klaida)){
                ?>
                <div class="card bg-dark2 p-4 text-center"> <!-- Added bg-dark2 -->
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
        
        // Add class to body on mobile size when section link is clicked
        const updateBodyClass = function() {
            // Check if we're on mobile viewport
            if (window.innerWidth <= 991.98) {
                // Check if URL has an ID parameter
                const urlParams = new URLSearchParams(window.location.search);
                const hasId = urlParams.has('id');
                
                // Update body class based on URL
                if (hasId) {
                    document.body.classList.add('section-view');
                } else {
                    document.body.classList.remove('section-view');
                }
            }
        };
        
        // Run on page load
        updateBodyClass();
        
        // Add event listeners to section links
        const sectionLinks = document.querySelectorAll('.section-link');
        sectionLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Add class in anticipation of the new page
                if (window.innerWidth <= 991.98) {
                    document.body.classList.add('section-view');
                }
            });
        });
        
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
        
        // Handle window resize
        window.addEventListener('resize', updateBodyClass);
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
