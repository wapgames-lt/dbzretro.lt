<?php
ob_start();
session_start();
include_once 'cfg/sql.php';


head();

echo '
</script><div class="head"><div class="head_2"><img src="img/logo.png" width="150"></div><div class="head_3"><small>dbzretro.lt - ivykdyk visas legendines misijas ir užkariauk žaidima!</small></div></div><div class="up"><small><b>dbzretro.lt</b></small></div><div class="linija-red"></div>';
if ($id == "log") {
    echo '<div class="meniuc">
<img src="img/butonai/log3.png" /></div>';
    echo '<div class="meniuc">';
    echo '<form action="prisijungti.php?id=login" method="post">
<img src="img/bicons/log.png" />
<b>Žaidėjo vardas</b><br/>  <input name="vardas" type="text" mmaxlenght="20" placeholder="Slapyvardis"  id="user"/><br/>';
    echo '<b><img src="img/bicons/log.png" />
Slaptazodis</b>:<a href="?id=forget"><img src="img/bicons/log2.png" /> </a><br/>
<input
 name="pass" type="password" mmaxlenght="20" placeholder="Slaptažodis"  id="pass"><br/>';

    echo '<input type="submit" Value="Prisijungti"/></form>';
    echo '<div class="lin"></div></div>';
    echo '<div class="meniuc"><a href="https://wapgames.lt"><img src="img/bicons/atgal.png" />
Atgal</a>

</div></div>
';
}

if ($id == "login") {

    top('Prisijungimas');

    $vardas1 = isset($_POST['vardas']) ? post($_POST['vardas']) : '';
    $vardas = strtolower(trim($vardas1));
    $pass = isset($_POST['pass']) ? post($_POST['pass']) : '';

    if (empty($vardas)) {
        echo '
        <div class="meniuc">
            <img src="img/bicons/dislike.png" />
            Neįvestas žaidėjo vardas!
            <img src="img/bicons/dislike.png" /><br>
            <div class="lin"></div>
            <a href="?id=log">
                <img src="img/bicons/atgal.png" />Atgal
            </a>
        </div>';

        $g_n[] = array("index.php", "Pagrindinis", "Prisijungimas");
        navigacija($g_n);


    } elseif (empty($pass)) {
        echo '<div class="meniuc"><img src="img/bicons/dislike.png" />
Neįvestas slaptažodis!<img src="img/bicons/dislike.png" /><br>
<div class="lin"></div>
<a href="?id=log"><img src="img/bicons/atgal.png" />Atgal</a>
</div>';

        $g_n[] = array("index.php", "Pagrindinis", "Prisijungimas");
        navigacija($g_n);

    } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM zaidejai WHERE nick='" . mysqli_real_escape_string($conn, $vardas) . "' AND pass='" . mysqli_real_escape_string($conn, $pass) . "'")) == 0) {
        echo '<div class="meniuc"><img src="img/bicons/dislike.png" />
Blogas žaidėjo vardas arba slaptažodis!<img src="img/bicons/dislike.png" /><br>
<div class="lin"></div>
<a href="?id=log"><img src="img/bicons/atgal.png" />Atgal</a>
</div>';


        $g_n[] = array("index.php", "Pagrindinis", "Prisijungimas");
        navigacija($g_n);

    } else {
        echo '<div class="meniuc"><div class="content text-center">' . smile('Sveikas, <b>' . $vardas . '</b> prisijungus prie žaidimo!</br>Gerai praleikite laiką! <img src="img/bicons/log.png" />   ') . '</div>';
        mysqli_query($conn,"UPDATE zaidejai SET ip='$ipas' WHERE nick='$vardas'") or die (mysqli_error());
        setcookie('vardas', $vardas, time() + 3600 * 12 * 2);
        setcookie('pass', $pass, time() + 3600 * 12 * 2);

        echo '
		
		
       <div class="titlec"><a href="pagrindinis.php?id=">
<img src="img/bicons/log2.png" />
Jungtis į žaidimą</a><br>
<div class="lin"></div></div>
<div class="meniuc">
<a href="prisijungti.php?id=log"><img src="img/bicons/atgal.png" />
Atgal</a></div>


';
        if ($vardas !== 'testas1') {
            $message = $vardas . ' prisijungė prie žaidimo!';
            $isMessageExist = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pokalbiai WHERE sms = '$message' ORDER BY data DESC LIMIT 1"));

            if (!$isMessageExist) {

                $expiresAt = date('Y-m-d H:i:s', strtotime(' + 5 minutes'));
                mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
            }
        }
    }



} elseif ($id == 'forget') {
    top('Slaptažodžio priminimas');
    echo '<div class="meniuc">';
    echo 'Užpildykite slaptažodžio pamiršimo formą</div>';
    echo '<div class="meniuc">';
    echo '<form action="?id=forget2" method="post"/>';
    echo '<b><img src="img/bicons/reg.png" />
Žaidėjo vardas</b><br/><input type="text" name="pnick"/     placeholder="Įveskite žaidėjo vardą"><br/>';
    echo '<b><img src="img/bicons/reg.png" />
El. Paštas</b><br/><input type="text" name="email"/placeholder="Įveskite savo el. paštą"><br/>';
    echo '<input type="submit" Value="Priminti slaptažodį"/></form>';
    echo '</div>';
    $g_n[] = array("index.php", "Pagrindinis", "prisijungti.php?id=log", "Prisijungimas", "Slaptažodžio priminimas");
    navigacija($g_n);
} elseif ($id == 'forget2') {
    top('Slaptažodžio priminimas');
    sleep(5);


    $pnick = isset($_POST['pnick']) ? preg_replace("/[^a-z0-9_]/", "", $_POST['pnick']) : null;
    $email = mysqli_real_escape_string(stripslashes($_POST['email']));

    if (empty($pnick) or empty($email)) {
        echo '<div class="meniuc"><img src="img/bicons/dislike.png" />
Paliktas tuščias laukelis <img src="img/bicons/dislike.png" /><br>
<div class="lin"></div>
<a href="?id=forget"><img src="img/bicons/atgal.png" />Atgal</a>
</div>';
    } elseif (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$pnick' AND email='$email'")) < 1) {
        echo '<div class="meniuc">Blogai įvestas slapyvardis arba El. Paštas.</div>';
    } else {
        $getinf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$pnick'"));
        $kam = $email;
        $titlas = 'Slaptažodžio priminimas';
        $messa = 'Tavo slaptažodis yra ' . $getinf['pass'] . ' Pagarbiai testas1 :)';
        $nuo = 'dbzretro.lt - Slaptažodžio priminimas';
        $headeris = 'Nuo: dbzretro.lt';
        mail($kam, $titlas, $messa, $headeris);
        echo '<div class="meniuc">Slaptažodis išsiūstas į <b>' . $email . '</b> El. Paštą. :)</div>';

    }
    $g_n[] = array("index.php", "Pagrindinis", "prisijungti.php?id=log", "Prisijungimas", "Slaptažodžio priminimas");
    navigacija($g_n);

}


foot();
?>
