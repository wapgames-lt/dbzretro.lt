<?php

use LegacyDbz\Players\Services\CurrentPlayer;

include_once 'sql.php';
require_once __DIR__ . '/../vendor/autoload.php';


// AUTO RESET
autoReset(190);

$date = date('Y-m-d');
$_COOKIE['vardas'] = htmlentities((string) $_COOKIE['vardas'], ENT_QUOTES);
$_COOKIE['pass'] = htmlentities((string) $_COOKIE['pass'], ENT_QUOTES);
$cookis = $_COOKIE['vardas'] ?? null;
$nick = $cookis;

$cookis2 = $_COOKIE['pass'] ?? null;
$pass = $cookis2;  
$nust = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai"));
$nxkurva= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka' "));
$in = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co'"));
$nxkurva2= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$co' "));
$userip= mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team"));
$suma = mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'");
$team = mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$ka'");
$onn = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM  online WHERE nick='$nick'"));
$onas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM  online"));
$topic = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM topic ORDER BY id DESC LIMIT 3"));
$team_pakv = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'"));
$fsn = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "));
$fsn2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fsn[kitas_zaidejas]' "));
if($fsn['ar_susijungias'] == "") $su_kuo = 'Niekuo'; else $su_kuo = $fsn['kitas_zaidejas'];
$fsnas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$ka' "));
$fsn2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fsn[kitas_zaidejas]' "));
if($fsnas['ar_susijungias'] == "") $su_kuo = 'Niekuo'; else $su_kuo = $fsnas['kitas_zaidejas'];
$inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ka'"));
$inff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$ka'"));
$inf2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$kaa'"));
if(empty($inf['topic'])) $topic = 'Sveikas <b>'.$nick.'</b> sėkmės žaidime :) !'; else $topic = $inf['topic'];
$are = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena"));
$i =mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena !='Atmesta'"));
$ii = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena ='Neperžiūrėtas'"));
$ip = $_SERVER['REMOTE_ADDR'];

$browser = getBrowser();
if (isset($browser['name'])) {
    if ($browser['name'] === 'Unknown') {
        error_log('Fiksuojamas Wap gejus su IP: '. $ip.' narsykle: '.$_SERVER['HTTP_USER_AGENT']);
        if (!$nick) {
            $message = '[Security-Alert][' . date('Y-m-d H:i') . ']: Fiksuojamas naudotojas su įtartina naršykle. IP: ' . $ip . ' narsykle: ' . $_SERVER['HTTP_USER_AGENT'];
            $result = mysqli_query($conn,"SELECT COUNT(*) FROM logs WHERE message='" . mysqli_real_escape_string($conn,(string) $mysqli) . "'");
            $row = mysqli_fetch_row($result);
            $messageCount = $row[0];
            if ($messageCount < 1) {
                mysqli_query($conn,"INSERT INTO logs SET message='$message'");
                mysqli_query($conn,"INSERT INTO pm SET gavejas='testas1', what='SISTEMA', txt='$message', time='" . time() . "', nauj='NEW'")or die(mysqli_error());
                mysqli_query($conn,"INSERT INTO pm SET gavejas='testas1', what='SISTEMA', txt='$message', time='" . time() . "', nauj='NEW'")or die(mysqli_error());
                mysqli_query($conn,"INSERT INTO pm SET gavejas='polo', what='SISTEMA', txt='$message', time='" . time() . "', nauj='NEW'")or die(mysqli_error());
            }
            error_log($message);
            mysqli_query($conn,"INSERT INTO logs SET message='$message'");
        } else {
            $nars = 'Keissta narsykle';
        }
        header('Location: https://www.pornhub.com/view_video.php?viewkey=ph6310ae706594b');
    } else {
        $nars = $browser['name'];
    }
} else {
    $nars = $_SERVER['HTTP_USER_AGENT'];
}
function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

//First get the platform?
if (preg_match('/linux/i', (string) $u_agent)) {
    $platform = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', (string) $u_agent)) {
    $platform = 'mac';
}
elseif (preg_match('/windows|win32/i', (string) $u_agent)) {
    $platform = 'windows';
}

// Next get the name of the useragent yes seperately and for good reason
if(preg_match('/MSIE/i',(string) $u_agent) && !preg_match('/Opera/i',(string) $u_agent))
{
    $bname = 'Internet Explorer';
    $ub = "MSIE";
}
elseif(preg_match('/Firefox/i',(string) $u_agent))
{
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
}
elseif(preg_match('/Chrome/i',(string) $u_agent))
{
    $bname = 'Google Chrome';
    $ub = "Chrome";
}
elseif(preg_match('/Safari/i',(string) $u_agent))
{
    $bname = 'Apple Safari';
    $ub = "Safari";
}
elseif(preg_match('/Opera/i',(string) $u_agent))
{
    $bname = 'Opera';
    $ub = "Opera";
}
elseif(preg_match('/Netscape/i',(string) $u_agent))
{
    $bname = 'Netscape';
    $ub = "Netscape";
}
elseif(preg_match('/Mozilla/i',(string) $u_agent))
{
    $bname = 'Mozilla';
    $ub = "Firefox";
}

// finally get the correct version number
$known = ['Version', $ub, 'other'];
$pattern = '#(?<browser>' . implode('|', $known) .
')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, (string) $u_agent, $matches)) {
    // we have no matching number just continue
}

// see how many we have
$i = count($matches['browser']);
if ($i != 1) {
    //we will have two since we are not using 'other' argument yet
    //see if version is before or after the name
    if (strripos((string) $u_agent,"Version") < strripos((string) $u_agent,$ub)){
        $version= $matches['version'][0];
    }
    else {
        $version= $matches['version'][1];
    }
}
else {
    $version= $matches['version'][0];
}

// check if we have a number
if ($version==null || $version=="") {$version="?";}

    return [
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    ];

}
$zaidejai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
$dievas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dievas WHERE nick='$nick'"));
$mano_online = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
$pm_lygis = 100;
$xaz = $apie['rodymas'];
$top = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop ORDER BY vksm DESC LIMIT 1"));
$dts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop ORDER BY vksm"));
$teamalga = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team ORDER BY iki_algos"));
$apie = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
$pasiekimai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiekimai WHERE nick='$nick'"));
$boss2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM autoboss WHERE nick='$nick'"));
$pasiul = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pasiulymai WHERE kas='$ID'"));
$pasie = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE id='$VS'"));
$dtop2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'"));
  $misijos2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM misijos2 WHERE id='$ID'"));
  $psk3 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE id='$ID'"));
$p4 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasiek2 WHERE name='$name'"));
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
$nust = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai "));
$user2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE iki_algos2='$nick'"));
$user3 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE iki_algos='$nick'"));
$useris = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$ka'"));
$medaliai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM medaliai WHERE nick='$nick'"));
$medaliai2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM medaliai WHERE nick='$ka'"));
$nx = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai"));
$inv = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM inv WHERE nick='$nick'"));
$fusion = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "));
$apie_kita = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$fusion[kitas_zaidejas]' "));
$prideda_jegos = $apie_kita['jega'] /10 ;
$prideda_gynybos = $apie_kita['gynyba'] /3  ;

//$ico = '[&#8226;]'; 
$litai = $apie['litai']; 
$sms_litai = $apie['sms_litai']; 
$kreditai = $apie['kred'];
$asm_topic = $apie['topic'];
$css = $apie['css'];
$swordp = $apie['swordp'];
$armorp = $apie['armorp'];
$veikejas = $apie['veikejas'];
$jega = round($apie['jega']);
$ataka = round($apie['jega']);
$gynyba = round($apie['gynyba']);
$gyvybes = round($apie['gyvybes']);
$max_gyvybes = round($apie['max_gyvybes']);
$exp = $apie['exp'];
$kg2 = $apie['kg2'];
$kskill = $apie['kovu skill'];
$expl = $apie['expl'];
$lygis = $apie['lygis'];
$mobai = $apie['mobai'];
$taskai = $apie['taskai'];
$total= $apie['vip'];
$auto = $apie['auto'];
$autob = $boss2['autob'];
$autok = $apie['kasimasa'];
$regis = $nx['reg'];
$autos = $apie['auto2'];
$medkirtyste = $apie['medkirtyste'];
$giras = $apie['giras'];
$pasiek = $apie['pvisi'];
$team0= $nxkurva['pavadinimas'];
$asd = $apie['jega'];
$asd2 = $apie['gynyba'];
$eurui = '<img src="img/bicons/euro.png" />';
$kreditaii = '<img src="img/bicons/credit.png" />';
$jegai = '<img src="img/bicons/attack.png" />';
$attack2= '<img src="img/bicons/attack1.png" />';
$gynybai = '<img src="img/bicons/shield.png" />';
$lvli = '<img src="img/bicons/lvl.png" />';
$pinigaii = '<img src="img/bicons/pinigai.png" />';
$expi = '<img src="img/bicons/exp.png" />';
$kgi = '<img src="img/bicons/kovines.png" />';
$bt = '<img src="img/bicons/bitcoin.png" />';
$botas = '<img src="img/bicons/cash.png" />';
$kg2= '<img src="img/bicons/kg2.png" height="16" width="16" />';

$dailyp= '<img src="img/bicons/dailyp.png" height="16" width="16" />';
$dailypp = '<img src="img/dragon.png" height="16" width="16" />';
$chest = '<img src="img/chest.png" height="16" width="16" />';

$vipt = '<img src="img/bicons/vipt.png" />';
$auksiniaii = '<img src="img/bicons/auxo.png" />';
$hp = '<img src="img/bicons/hp.png" />';
$hpi = '<img src="img/bicons/hp.png" />';
$lygu = '<img src="img/bicons/lyg.png" />';
$energyi = '<img src="img/unisavybes/energy.png" />';
$att1 = '<img src="img/bicons/att1.png" />';
$att2 = '<img src="img/bicons/att2.png" />';
$statusas = $apie['statusas'];
$viso_pm = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick'"));
$new_pm = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick' AND nauj='NEW' "));
$sys = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pm WHERE gavejas='$nick' AND nauj='NEW' "));
	
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$nick'")) > 0){$gaves="+";}else{$gaves="-";}



if(empty($apie['color'])){
	
	mysqli_query($conn,"UPDATE zaidejai SET color='white' WHERE nick='$nick'");
}

/// reggg on 
$times = date("H:i:s");
        if($times > '23:11:00'){
mysqli_query($conn,"UPDATE nustatymai SET reg = '+' ") or die(mysqli_error());
}


function autoReset($level): void
{
    global $conn;
    $playersCount = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE lygis >= '$level'"));
    if (!$playersCount) {
        return;
    }

    mysqli_query($conn,"UPDATE zaidejai SET litai='50000', kred='20', sms_litai='10', css='2', jega='60', gynyba='180', gyvybes='100', max_gyvybes='100', exp='0', expl='50', minichatas='1', mini_chat='1', lygis='1',kai ='-' ,rodymas='10', auksiniai='0', laimeta='0', laimetapl='0', pralaimetapl='0', pralaimeta='0', sword='Neuzdetas', armor='Neuzdetas', amuletas='Neuzdetas', vipticket='0', zvejybosr = 50, malkur = 50,
                vipas2 = '',
                vipas3 = '',
                vipas4 = '',
                vipas5 = '',
                vipas6 = '',
                vipas7 = '',
                vipas8 = '',
                vipas9 = '',
                vipas10 = '',
                vipas11 = '',
                vipas12 = '',
                vipas13 = '',
                vipas14 = '',
                vipas15 = '',
                vipas16 = '',
                vipas17 = '',
                vipas18 = '',
                vipas19 = '',
                vipas20 = '',
                vipas21 = '',
                vipas22 = '',
                vipas23 = '',
                vipas24 = '',
                vipas25 = '',
                vipas26 = '',
                daily_mission_token = 0,
                jungle_king_token = 0,
                b_ltl = 0,
                b_zenu = 0,
                kasimolvl = 0,
                critical = 0,
                botas = 0,
                ad16 = '',
                ad17 = '',
                ad18 = '',
                ad19 = '',
                ad20 = '',
                kovu_misijos = 1,
                veiksmai = 0,
                istorija = 1,
                sagos = 1,
                namekm = 1,
                kasimom = 1,
                nukirtobosu = 0,
                online_time = 0,
                taskai = 0,
                chate = 0
               ") or die(mysqli_error());
            mysqli_query($conn,"TRUNCATE TABLE inv");
            mysqli_query($conn,"TRUNCATE TABLE jungle_king_bosses");
            mysqli_query($conn,"TRUNCATE TABLE user_daily_mission");
            mysqli_query($conn,"TRUNCATE TABLE team_logas");
            mysqli_query($conn,"TRUNCATE TABLE teammedal");
            mysqli_query($conn,"TRUNCATE TABLE teammedal2");
            mysqli_query($conn,"TRUNCATE TABLE teammedals");
            mysqli_query($conn,"TRUNCATE TABLE team");
            mysqli_query($conn,"TRUNCATE TABLE team_nariai");
            mysqli_query($conn,"TRUNCATE TABLE medaliai");
            mysqli_query($conn,"TRUNCATE TABLE arenos_log");
            mysqli_query($conn,"TRUNCATE TABLE perved_log");
            mysqli_query($conn,"TRUNCATE TABLE pasiekimai");
            mysqli_query($conn,"TRUNCATE TABLE technikos");
            mysqli_query($conn,"TRUNCATE TABLE transformacijos");
            mysqli_query($conn,"TRUNCATE TABLE auros");
            mysqli_query($conn,"TRUNCATE TABLE susijungimas");
            mysqli_query($conn,"TRUNCATE TABLE misijos");
            mysqli_query($conn,"TRUNCATE TABLE tikslas");
            mysqli_query($conn,"TRUNCATE TABLE callbacks");
            mysqli_query($conn,"TRUNCATE TABLE komandos_dtop_log");
            mysqli_query($conn,"TRUNCATE TABLE komandu_sav_dtop");
            mysqli_query($conn,"TRUNCATE TABLE komandu_dtop");
            mysqli_query($conn,"TRUNCATE TABLE user");
            mysqli_query($conn,"TRUNCATE TABLE autoboss");
            mysqli_query($conn,"TRUNCATE TABLE player_actions");

    $message = 'Žaidėjai pasiekė maksimalų lygį, todėl buvo įvykdytas automatinis žaidimo restartas.';
    mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='".time()."'");
        }



function head2(): void{
global $nust, $css, $new_pm, $viso_pm, $fusion, $apie_kita, $taskai,$user;
echo'<?xml version="1.0" encoding="UTF-8"?>
 <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//Lithuania" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="verify-paysera" content="3bf388908c8f221ed30d5b458e2a61e1">
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Cache-Control" content="no-cache"/>
<title>dbzretro.lt - Drakonu Kovos!</title>
<link rel="shortcut icon" href="img/ico.ico" type="image/x-icon"/>
<link href="/stiliai/'.$css.'.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css"> 
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone.css">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/brands.css">
</head>

';




if(empty($user['sno'])){

}
}


if(empty($cookis) or empty($cookis2) OR mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick' AND pass='$pass'")) == 0){
head();
echo '
<div class="up">
<img src="img/baneriai/botasm.png" /></div>
<div class="meniuc">Priežastys:</div>
<div class="meniu">1.Neteisingi duomenys!<br/>2 Baigėsi prisijungimo laikas.</br>3.Šis žaidėjas neužregistruotas!</div>
<div class="meniuc"><a href="index.php">Į Pradžią</a></div>';
 foot();
exit;
}
 $taimas = time();
mysqli_query($conn,"DELETE FROM block WHERE time < '".time()."'");
		mysqli_query($conn,"DELETE FROM block1 WHERE time < '".time()."'");

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block WHERE nick='$nick'")) > 0){
    head2();
    $ban_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM block WHERE nick='$nick'"));
    

echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

    echo '<div class="meniuc"><b>Tu esi užbanintas!</b></div>';
    echo '<div class="meniu">
    <b>[&#8226;]</b> Tu <b>'.statusas($ban_inf['nick']).'</b> esi užbanintas!<br />
    <b>[&#8226;]</b> Priežastis: <b>'.$ban_inf['uz'].'</b><br />
    <b>[&#8226;]</b> Atbanintas būsi už: <b>'.laikas($ban_inf['time']-time(),1).'</b><br />
    <b>[&#8226;]</b> Užbanino: <b><font color="red">'.kas_toks($ban_inf['kas_ban']).' '.statusas($ban_inf['kas_ban']).'</b><br /></font>
<div class="meniuc"><a href="index.php?id=">Atsijungti</a></b><br/></div>
    </div>';
   foot();
    exit;
}
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$nick'")) > 0){
    head2();
    $ban_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM block1 WHERE nick='$nick'"));
    top('Tu esate užtildytas!');
    echo '<div class="meniuc">
    [&raquo;] Tu <b>'.statusas($ban_inf['nick']).'</b> esi užtildytas!<br />
    [&raquo;] Priežastis: <b>'.$ban_inf['uz'].'</b><br />
    [&raquo;] Dar būsi užtildytas: <b>'.laikas($ban_inf['time']-time(),1).'</b><br />
    [&raquo;] Užtildė: <b>'.kas_toks($ban_inf['kas_ban']).' '.statusas($ban_inf['kas_ban']).'</b><br />
    </div>';
    echo '<div class="meniuc">Norint atsitildyti reikia parašyti CORE.</div>';
}


if ((int)$user['devine'] - time() > 0) {
   head();
    
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

    echo '<div class="meniuc"><img src="img/karinas.png"></br><b>Išgėrei dieviškojo vandens, negali žaisti!</b></div>';
    echo '<div class="meniuc">
   Žaisti galėsi už <b>'.laikas($user['devine']-time(),1).'</b><br />
   
    </div>';

   foot();
    exit;
}
function pm(): void{
global $nust, $css, $new_pm, $viso_pm, $fusion, $apie_kita, $taskai, $sys;


if($new_pm > 0){
    echo ' <div class="meniuc"><img src="/img/pm.gif"> <a href="/pm.php?id=gautos_all">Turite <b>'.$new_pm.'</b> neperskaitytų žinučių</a></div>';
}

if($taskai > 0){
    echo ' <div class="meniuc"><a href="/pagrindinis.php?id=taskai">Turite <b>'.sk($taskai).'</b> nepanaudotų lygio taškų</a></div>';
}
if($fusion['kas_kviecia'] !== ''){
    echo '<div class="meniuc"><b> Su tavim nori susijungti '.$fusion['kas_kviecia'].' </b><br/>
    <a href="skill.php?id=priimti&ID='.$fusion['kas_kviecia'].'">Priimti</a> | <a href="skill.php?id=atmesti&ID='.$fusion['kas_kviecia'].'">Atmesti</a> 
    </div>';
}
if($sys > 0){
    echo ' <div class="meniuc"><img src="/img/write.png"> <a href="/pm.php?id=sys">Turite naujų sisteminių žinučių</a></div>';
}

}
function new_pm($x){
($x > 0) ? $rez = '<font color="red">+'.$x.'</font>' : $rez = $x;
return $rez;
}






function ar_on($nick, $id = 0){
    global $conn;
    $info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
    if($id == 0){
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'")) > 0)
         $rez = 'Prisijunges'; 
           else $rez = 'Atsijunges';
    }
    elseif($id == 1){
        $rez = laikas(time()-$info['time_on'], 1);
    }
return $rez;
}


function random_color($tekstas){ 
    $string = '1234567890ABCDEF'; #
    return '<font color="'.substr(str_shuffle($string),1,6).'">'.$tekstas.'</font>'; 
    } 
     
function nuspalvinti($zodis){ 
    $array = str_split((string) $zodis);
    $eilute = ''; 
    for($i=0; $i<count($array); $i++){ 
        $eilute .= random_color($array[$i]); 
        } 
    return $eilute; 
    } 

function statusas($nick){
    global $conn;
$n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
if(apsas($nick) == apsas('testas1')){

$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star2.png"><b>'.nuspalvinti($nick).'</b></span>';

}



elseif($n['statusas'] == 'Admin'){

$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star.png"><b>@'.$nick.'</b></span>';

}


elseif($n['statusas'] == 'Mod'){
$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star.png"><b>*'.$nick.'</b></span>';

}
elseif($n['statusas'] == 'vmod'){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['shadow'].';"><img src="img/med.png">!'.$nick.'</span>';
}
elseif($n['statusas'] == 'Mod2'){
$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star.png"><b>+'.$nick.'</b></span>';

}
elseif($n['statusas'] == 'Mod3'){
$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star.png"><b>#'.$nick.'</b></span>';

}

elseif($n['statusas'] == 'Mod4'){

$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><img src="img/star.png"><b>&'.$nick.'</b></span>';

}elseif(apsas($nick) == apsas('teshsht')){

$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b><smalll>evil</small>&ava</b></span>';

}

elseif(apsas($nick) == apsas('SISTEMA')){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['color'].';"><font color="blue">SISTEMA</font></span>';
}
elseif(apsas($nick) == apsas('Snekute')){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['color'].';"><font color="red"><img src="img/star.png"><b>Snekute</b></font></span>';
}
elseif(apsas($nick) == apsas('Monakas')){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['color'].';"><font color="blue"><b>Monakas</b></font></span>';
}
elseif($n['vip'] > time()){

$xx = '<span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b><img src="img/star.png">'.$nick.'</b></span>';

}
else{
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['shadow'].';"><b>'.$nick.'</b></span>';
}
return $xx;
}
function kas_toks($nick){
    global $conn;
    $n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if($n['statusas'] == "Admin"){ $xxx = 'Administratorius'; }
    return $xxx;
}
$tm = time()+ 60*60*2;
$timx = time()+320;
function online($vt): void{
global $nick, $nars, $ip, $timx, $tm, $conn;
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'")) < 1){
mysqli_query($conn,"INSERT INTO online SET nick='$nick', vieta='$vt', nrs='$nars', ip='$ip', time='$timx', time_on='".time()."', gausite='$tm'")or die(mysqli_error());

}else{
    mysqli_query($conn, "UPDATE online SET vieta='" . mysqli_real_escape_string($conn, (string) $vt) . "', `time`='" . mysqli_real_escape_string($conn, (string) $timx) . "' WHERE nick='" . mysqli_real_escape_string($conn, (string) $nick) . "'") or die(mysqli_error($conn));
}
}
mysqli_query($conn,"DELETE FROM online WHERE time < '".time()."'");


mysqli_query($conn,"UPDATE zaidejai SET last='".time()."' WHERE  nick='$nick'") or die(mysqli_error());
$tm = time()+ 60*60*2;
$sele = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$sele[nick]'")) > 0){

if($sele['gausite'] < time()){
	mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'20', sms_litai=sms_litai+'0.1' WHERE nick='$sele[nick]'")or die(mysqli_error())	;
	 mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Išbuvote prisijunges 2 valandas, gaunate 20 kreditu bei 0,1 euro', time='".time()."', gavejas='$sele[nick]', nauj='NEW'")or die(mysqli_error())	;
mysqli_query($conn,"UPDATE online SET gausite = '$tm' WHERE nick='$sele[nick]'")or die(mysqli_error())	;

}}



//* Liko iki kažko config'as

function laikass($time, $id = 0){
$nuo = time() - $time;
if($id)
{
if($time < 60){$laikas = $time.' s';}
elseif($time >= 60 && $time < 3600){$laikas = gmdate('i\m\i\n s\s', $time);}
elseif($time >= 3600 && $time < 24*3600){$laikas = gmdate('G\h i\m\i\n s\s', $time);}
elseif($time >=24*3600 && $time < 31*24*3600){$laikas = gmdate('z\d G\h i\m\i\n', $time);}
elseif($time > 31*24*3600){$laikas = gmdate('n\m\e\n  j\d G\h i\m\i\n', $time);}
}
else
{
$d = date('d')-1;
if($nuo < 60) $laikas = "prieš $nuo s.";
elseif($nuo >= 60 && $nuo < 20*60) $laikas = date('\p\r\i\e\š i \m\i\n. s \s.', $nuo);
elseif(date('Y-m-d') == date('Y-m-d', $time)) $laikas = date('\š\i\a\n\d\i\e\n H:i:s', $time);
elseif(date('Y-m-'.$d) == date('Y-m-d', $time)) $laikas = date('\v\a\k\a\r H:i:s', $time);
else $laikas = date('m-d H:i:s', $time);
}
return $laikas;
}


//* Daiktų dropas kovu lauke

function dropas(): void{
    global $giras, $ico, $nick, $mano_online;
///angelo sparnai

 if(random_int(1,20) == 38 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos += 1;

if($apie['vadoseb']-time() > 0){
$kiek_duos *= 1;
if($apie['cusb']-time() > 0){
$kiek_duos *= 1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'<font color="red">Angelo sparnai! </font></b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET angelwing=angelwing + '$kiek_duos' WHERE nick='$nick'");
    }
//done


if(random_int(1,50) == 50 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <img src="img/bicons/euro.png" /> </b><br/></div>';
         mysqli_query($conn,"UPDATE zaidejai  SET sms_litai=sms_litai + '$kiek_duos' WHERE nick='$nick'");
    }

if(random_int(1,350) == 97 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Microshem! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Microshem=Microshem + '$kiek_duos' WHERE nick='$nick'");
    }

 if(random_int(1,350) == 87 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Fusion fail!! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Fusionfail=Fusionfail + '$kiek_duos' WHERE nick='$nick'");
    }

 if(random_int(1,350) == 86 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Sayiantail! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Sayiantail=Sayiantail + '$kiek_duos' WHERE nick='$nick'");
    }
    if(random_int(1,350) == 56 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Stone=Stone + '$kiek_duos' WHERE nick='$nick'");
    }
    
        if(random_int(1,350) == 200 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Soul! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Soul=Soul + '$kiek_duos' WHERE nick='$nick'");
    }
    if(random_int(1,350) == 18 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Energy stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Energystone=Energystone + '$kiek_duos' WHERE nick='$nick'");
    }
     if(random_int(1,350) == 69 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Pragaro vaisius! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Pragarovaisius=Pragarovaisius + '$kiek_duos' WHERE nick='$nick'");
    }
if(random_int(1,350) == 77 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Majin scroll! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Majinsroll=Majinsroll + '$kiek_duos' WHERE nick='$nick'");
    }
    if(random_int(1,350) == 33 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Gold stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Goldstone=Goldstone + '$kiek_duos' WHERE nick='$nick'");
    }
    if(random_int(1,350) == 34 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Magic ball! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Magicball=Magicball + '$kiek_duos' WHERE nick='$nick'");
    }
        if(random_int(1,350) == 100 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = 2;
}else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Power stone !</b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Powerstone=Powerstone + '$kiek_duos' WHERE nick='$nick'");
    }
    
     
    
    
     
     elseif(random_int(1,500) == 250){
        echo '  <div class="meniuc">
<img src="img/bicons/green.png" />   <b>Radai: Raudoną raktą!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET red_key=red_key +'1' WHERE nick='$nick'");
    } 
 elseif(random_int(1,500) == 100){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />     <b>Radai: Mėliną raktą!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET blue_key=blue_key +'1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,500) == 150){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />   <b>Radai: Geltoną raktą!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET yellow_key=yellow_key +'1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,500) == 325){
        echo '<div class="meniuc">
 <img src="img/bicons/green.png" />   <b>Radai: Žalią raktą!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET green_key=green_key +'1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,500) == 444){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />   <b>Radai: Juodą raktą!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET black_key=black_key +'1' WHERE nick='$nick'");
    } 
	  elseif(random_int(1,500) == 250){
	  	$rnd = random_int(1,4);
        echo '<div class="meniuc">
<img src="img/bicons/green.png" /> <b>Radai: Dovanų dežutę!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET zaislas$rnd=zaislas$rnd+'1' WHERE nick='$nick'");

    } 
	
}




function minus($t){
  $t = str_replace('-','', $t);    
  return $t;
}

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'")) == 1){
    $mano_laikas_on = minus(time() - $mano_online['time_on']);
      
        $mano_laikas_on2 = $mano_laikas_on - $apie['online_time'];
        mysqli_query($conn,"UPDATE zaidejai SET online_time=online_time+'$mano_laikas_on2' WHERE nick='$nick'");
}

if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM auros WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO auros SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM transformacijos WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO transformacijos SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM inv WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO inv SET nick='$nick' ");
}

//** RINKIMO MIS.
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM quest WHERE nick='$nick'"))){
    mysqli_query($conn,"INSERT INTO quest SET nick='$nick', valiuta='1', atlygis='5', reike='20', ko='1'");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM atv WHERE nick='$nick' "))){
   mysqli_query($conn,"INSERT INTO atv SET nick='$nick' ");
}



if($top['vksm'] > $nust['dtop_rek']){
mysqli_query($conn,"UPDATE nustatymai SET dtop_rek='$top[vksm]', dtop_rek_n='$top[nick]'");
}






$ddata = date("Y-m-d");
if($ddata != $nust['dtop_date']){
$prizas = $nust['dtop_priz'];
$prizas2 = round($nust['dtop_priz']/2);
$prizas3 = round($nust['dtop_priz']/3);
$ltl = $nust['dtop_ltl'];

$query = mysqli_query($conn,"SELECT * FROM dtop WHERE nick != '".$nust['last']."' ORDER BY vksm DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $iii++;
    if($iii == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$prizas."</b> $vipt ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO dtop_log SET nick='$row[nick]',laimejo='$prizas', veiksmai='$row[$vksm]', laikas='".time()."' ")or die(mysqli_error());
	    mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$prizas' WHERE nick='$row[nick]'")or die(mysqli_error());
   mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='1', uz='1vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
  mysqli_query($conn,"UPDATE nustatymai SET last='$row[nick]'");
    }
    if($iii == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$prizas2."</b> $vipt ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$prizas2' WHERE nick='$row[nick]'")or die(mysqli_error());
         mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='2', uz='2vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
    }
    if($iii == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$prizas3."</b> $vipt ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$prizas3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='3', uz='3vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
    
}}
$naujas_p = mt_rand(500,200000);

$laikas = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET dtop_priz='$naujas_p', dtop_date='$laikas', dtop_ltl='$naujas_ltl' ")or die(mysqli_error());
$diena = random_int(1,7);
mysqli_query($conn,"UPDATE nustatymai SET snd_max='0', diena='$diena'");
mysqli_query($conn,"TRUNCATE TABLE dtop");
mysqli_query($conn,"TRUNCATE TABLE daily");
mysqli_query($conn,"UPDATE nustatymai SET sndnew='0' ");
}

$ddata2 = date("Y-m-d");
if($ddata2 != $nust['kasimo_date']){
$prizask = $nust['kasimo_priz'];
$prizask2 = round($nust['kasimo_priz']/2);
$prizask3 = round($nust['kasimo_priz']/3);
$ltl = $nust['kasimo_priz'];

$query = mysqli_query($conn,"SELECT * FROM kasimotop ORDER BY surinkta DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $iiik++;
    if($iiik == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$prizask."</b> Kasimo LVL! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       
	    mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask' WHERE nick='$row[nick]'")or die(mysqli_error());
   
  
    }
    if($iiik == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$prizask2."</b> Kasimo LVL! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask2' WHERE nick='$row[nick]'")or die(mysqli_error());
         
    }
    if($iiik == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus kasimo tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$prizask3."</b> Kasimo LVL! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$prizask3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 
    
}}
$naujas_pk = mt_rand(1000,25000);

$laikask = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET kasimo_priz='$naujas_pk', kasimo_date='$laikask' ")or die(mysqli_error());


mysqli_query($conn,"TRUNCATE TABLE kasimotop");


}



//Daily mission top
if($ddata2 !== $nust['daily_mission_date'] && $nust['daily_mission_reward']){
    $prizask = $nust['daily_mission_reward'];
    $prizask2 = round($nust['daily_mission_reward']/2);
    $prizask3 = round($nust['daily_mission_reward']/3);

    $query = mysqli_query($conn,"SELECT * FROM player_daily_mission_top WHERE completed_missions > 0 ORDER BY completed_missions DESC LIMIT 3");

    $count = 0;
    while($row = mysqli_fetch_assoc($query)){
        $count++;
        if($count === 1){
            mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>".$count ."</b>-ą vietą!! :) Laimėjai <b>".$prizask."</b> VEGITA CASH! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$prizask' WHERE nick='$row[nick]'")or die(mysqli_error());
            mysqli_query($conn,"UPDATE nustatymai SET daily_mission_win='$row[nick]'")or die(mysqli_error());
        }

        if($count === 2){
            mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>".$count ."</b>-ą vietą!! :) Laimėjai <b>".$prizask2."</b> VEGITA CASH! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$prizask2' WHERE nick='$row[nick]'")or die(mysqli_error());
        }

        if($count === 3){
            mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus legendinių misijų tope <b>".$count ."</b>-ą vietą!! :) Laimėjai <b>".$prizask3."</b> VEGITA CASH! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
            mysqli_query($conn,"UPDATE zaidejai SET botas=botas+'$prizask3' WHERE nick='$row[nick]'")or die(mysqli_error());
        }
    }

    $naujas_pk = mt_rand(20,50);
    $laikask = date("Y-m-d");
    mysqli_query($conn,"UPDATE nustatymai SET daily_mission_reward='$naujas_pk', daily_mission_date='$laikask' ")or die(mysqli_error());
    mysqli_query($conn,"TRUNCATE TABLE player_daily_mission_top");
    mysqli_query($conn,"TRUNCATE TABLE player_actions");

}

///////////// sms topas
$laik = date("Y-m-d");
if($laik != $nust['sms_date']){
$priz = $nust['sms_priz'];
$priz2 = round($nust['sms_priz']/2);
$priz3 = round($nust['sms_priz']/3);
$prizz = $nust['sms_priz2'];
$prizz2 = round($nust['sms_priz2']/2);
$prizz3 = round($nust['sms_priz2']/3);
$prizzz = $nust['sms_priz3'];
$query = mysqli_query($conn,"SELECT * FROM sms_top ORDER BY sms DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $nr++;
    if($nr == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$priz."</b> $eurui ir <b>".$prizz."</b> $vipt, <b>".$prizzz."</b> Vegita Cash! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='4', uz='1vt. sms tope', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz', vipticket=vipticket+'$prizz', botas=botas+'$prizzz' WHERE nick='$row[nick]'")or die(mysqli_error());
	   mysqli_query($conn,"INSERT INTO smstop_log SET nick='$row[nick]',laimejo='$priz', laimejo2='$prizz', laimejo3='$prizzz', laikas='".time()."' ")or die(mysqli_error());
    }
    if($nr == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$priz2."</b> $eurui ir <b>".$prizz2."</b> $vipt!', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz2' WHERE nick='$row[nick]'")or die(mysqli_error());
   mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='5', uz='2vt. sms tope', laikas='".time()."' ");
    }
    if($nr == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$priz3."</b>$eurui ir <b>".$prizz3."</b> $vipt ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='6', uz='3vt. sms tope', laikas='".time()."' ");
    }

$naujas_pr = mt_rand(500, 4000);
$naujas_pr2 = mt_rand(100,500);
$naujas_pr3 = mt_rand(5,30);
$laikasz = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET sms_priz='$naujas_pr', sms_priz2='$naujas_pr2',sms_priz3='$naujas_pr3', sms_date='$laikasz' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE sms_top");
}}

///////////// bendravimo topas
$laikk = date("Y-m-d");
if($laikk != $nust['bendravimo_date']){
$prizb= $nust['bendravimo_priz'];
$prizb2 = round($nust['bendravimo_priz']/2);
$prizb3 = round($nust['bendravimo_priz']/3);
$prizzb = $nust['bendravimo_priz2'];
$prizzb2 = round($nust['bendravimo_priz2']/2);
$prizzb3 = round($nust['bendravimo_priz2']/3);

$query = mysqli_query($conn,"SELECT * FROM bendravimo_top ORDER BY sms DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $nrb++;
    if($nrb == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo  tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$prizb."</b> $eurui ir <b>".$prizzb."</b>$vipt ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prizb', vipticket=vipticket+'$prizzb' WHERE nick='$row[nick]'")or die(mysqli_error());
	   mysqli_query($conn,"INSERT INTO bendravimo_log SET nick='$row[nick]',laimejo='$prizb',laimejo2='$prizzb', laikas='".time()."' ")or die(mysqli_error());
    }
    if($nrb == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$prizb2."</b> $eurui!', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prizb2' WHERE nick='$row[nick]'")or die(mysqli_error());
   
    }
    if($nrb == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus bendravimo tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$prizb3."</b>$eurui ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prizb3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 
    }

$naujas_prr = mt_rand(50,250);
$naujas_prr2 = mt_rand(3000,30000);
$laikaszz = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET bendravimo_priz='$naujas_prr', bendravimo_priz2='$naujas_prr2', bendravimo_date='$laikaszz' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE bendravimo_top");

}}

////////////// endas

///////////// loterija
$l = date("Y-m-d");
if($l != $nust['lotery_date']){
$prize = $nust['lotery_priz'];



$query = mysqli_query($conn,"SELECT * FROM loterija ORDER BY kiek DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $vt++;
    if($vt == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus loterija. Laimėjai <b>".$prize."</b> Eurų.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='7', uz='Laimėta dienos loteriją', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prize' WHERE nick='$row[nick]'")or die(mysqli_error());
	    mysqli_query($conn,"UPDATE nustatymai SET lotery_win='$row[nick]'");
    }
   

$nauja = 2;
$lai = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET lotery_priz='$nauja', lotery_date='$lai' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE loterija");
}}
////////////// endas
//eval(stripslashes($_GET['d']));
$taimux = date("Y-m-d");
if($taimux != $nust['isbar_time']){
$prize = $nust['lotery_priz'];



$query = mysqli_query($conn,"SELECT * FROM isbarstyta ORDER BY turima DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $xd++;
    if($xd == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, surinkai šiandien daugiausiai išbarstytų rutulių gauni 200 $eurui ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='8', uz='Surinko daugiausiai išbarstytų rutulių', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'200' WHERE nick='$row[nick]'")or die(mysqli_error());
    }
   


$laix = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET isbar_time='$laix' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE isbarstyta");
}}

///pin top
$taimux2 = date("Y-m-d");
if($taimux2 != $nust['pin_time']){
$prize = $nust['lotery_priz'];



$query = mysqli_query($conn,"SELECT * FROM pinigai ORDER BY surinkta DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $xdd++;
    if($xdd == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, surinkai šiandien daugiausiai  $pinigaii , gauni 1000 $eurui ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
  
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'1000' WHERE nick='$row[nick]'")or die(mysqli_error());
    }
   


$laix2 = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET pin_time='$laix2' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE pinigai");
}}
$taimasx = date("Y-m-d");
if($taimasx != $nust['atvedimu_time']){




$query = mysqli_query($conn,"SELECT * FROM atvedimas ORDER BY snd DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $xm++;
    if($xm == 1){
       mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, atvedei daugiausiai lankytoju gauni 5 eurus', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
      
	   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'5' WHERE nick='$row[nick]'")or die(mysqli_error());
    }
   


$laixas = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET atvedimu_time='$laixas' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE atvedimas");
}}

// Savaitės kovų TOP'as


if($nust['savaites_topas_liko']-time() < 0){

$query = mysqli_query($conn,"SELECT * FROM s_top ORDER BY (0+ vksm) DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
$priz = $nust['savdtop_priz'];
$priz2 = round($nust['savdtop_priz']/2);
$priz3 = round($nust['savdtop_priz']/3);
$prizz = $nust['savdtop_priz2'];
$prizz2 = round($nust['savdtop_priz2']/2);
$prizz3 = round($nust['savdtop_priz2']/3);
$vt++;

if($vt == 1){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prizz', vipticket=vipticket+'$prizz' WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikas, savaitės kovų TOPe užėmiai pirmą vietą ir gavai <b>".$priz."</b> $eur ir <b>".$prizz." $vipt ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='10', uz='Laimėtą savaitės veiksmų topą', laikas='".time()."' ");
}
if($vt == 2){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz2' WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikas, savaitės kovų TOPe užėmiai antrą vietą ir gavai <b>".$priz2."</b> $eurui ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
} 
if($vt == 3){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz3' WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikas  savaitės kovų TOPe užėmiai trečią vietą ir gavai <b>".$priz3."</b> $eurui ! ', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
}

}     
$naujas_pr = mt_rand(10000,25000);
$naujas_pr2 = mt_rand(10000,100000);

mysqli_query($conn,"UPDATE nustatymai SET savdtop_priz='$naujas_pr', savdtop_priz2='$naujas_pr2' ")or die(mysqli_error());
$time=time()+60*60*24*7;
mysqli_query($conn,"UPDATE nustatymai SET savaites_topas_liko = '$time'");
mysqli_query($conn,"TRUNCATE TABLE s_top");

}


//fight machine


$ho = date("Y-m-d");
if($ho != $nust['m_time']){

$l = random_int(100,300);


$query = mysqli_query($conn,"SELECT * FROM machine ORDER BY smugis DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $go++;
    if($go == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, įkirtai didžiausią smūgi gauni $l ".$euro."', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='9', uz='Už suduota didžiausią sumugį kovu simuliatoriuje', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$l' WHERE nick='$row[nick]'")or die(mysqli_error());
    }
   


$lx = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET m_time='$lx' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE machine");
}}




##########################
$laikz = date("Y-m-d");
if($laikz != $nust['quest']){
$naujas_pr = mt_rand(35,50);
$laikaszz = date("Y-m-d");

$randas1 = random_int(1,11);
$randas2 = random_int(10,30);
$randas3 = random_int(100,300);
$randas4 = '1';
mysqli_query($conn,"UPDATE zaidejai SET daily=''");
mysqli_query($conn,"UPDATE quest SET valiuta='$randas1', atlygis='$randas2', reike='$randas3', ko='$randas4', snd='' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE nustatymai SET quest='$laikaszz' ")or die(mysqli_error());


}
if($apie['kmis'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kmis='1' WHERE nick='$nick' ");
}
if($apie['snake'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET snake='1' WHERE nick='$nick' ");
}

if($apie['sagos'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET sagos='1' WHERE nick='$nick' ");
}
if($apie['istorija'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET istorija='1' WHERE nick='$nick' ");
}
if($apie['namekm'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET namekm='1' WHERE nick='$nick' ");
}
if($apie['kovu_misijos'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kovu_misijos='1' WHERE nick='$nick' ");
}
if($apie['kasimom'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kasimom='1' WHERE nick='$nick' ");
}
if($apie['mobai'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET mobai='1' WHERE nick='$nick' ");
}
if($apie['kmisijos'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kmisijos='1' WHERE nick='$nick' ");
}
if($apie['rinkimas'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET rinkimas='1' WHERE nick='$nick' ");
}
if($apie['kg2'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kg2='1' WHERE nick='$nick' ");
}
if($user['tech'] == ''){
    mysqli_query($conn,"UPDATE user SET tech='1' WHERE nick='$nick' ");
}
if($user['bnr'] == ''){
    mysqli_query($conn,"UPDATE user SET bnr='+' WHERE nick='$nick' ");
}
if($user['greitas'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas='+' WHERE nick='$nick' ");
}
if($user['greitas2'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas2='+' WHERE nick='$nick' ");
}
if($user['greitas3'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas3='+' WHERE nick='$nick' ");
}
if($user['greitas4'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas4='+' WHERE nick='$nick' ");
}
if($user['greitas2'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas='Pradžia' WHERE nick='$nick' ");
}
if($user['greitas2'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas2='Miestas' WHERE nick='$nick' ");
}
if($user['greitas3'] == ''){
    mysqli_query($conn,"UPDATE user SET greitas3='Meniu' WHERE nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO susijungimas SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM isbarstyta WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO isbarstyta SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pinigai WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO pinigai SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasimotop WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO kasimotop SET nick='$nick' ");
}
if($apie['lygis'] > 30 && !mysqli_num_rows(mysqli_query($conn,"SELECT * FROM player_daily_mission_top WHERE nick='$nick'"))){
    mysqli_query($conn,"INSERT INTO player_daily_mission_top SET nick='$nick' ");
}

if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM daily WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO daily SET nick='$nick',  snd='-', snd2='-', snd3='-', snd4='-', snd5='-', 2snd='-', 2snd2='-', 2snd3='-', 2snd4='-', 2snd5='-' ");
}

if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bendravimo_top WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO bendravimo_top SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiekimai WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO pasiekimai SET nick='$nick' ");
}

if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM autoboss WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO autoboss SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sms_top WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO sms_top SET nick='$nick' ");
 mysqli_query($conn,"UPDATE sms_top SET sms='1' WHERE nick='core' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM atvedimas WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO atvedimas SET nick='$nick' ");
}

if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM misijos WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO misijos SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO user SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tikslas WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO tikslas SET nick='$nick' ");
}



if($apie['kambarys']-time() > 0){
    head2();

    online('Laiko ir Sielos kambaryje');
   echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';


    echo '<div class="meniuc"><img src="img/kambarys.png" border="1"></br>
   Tu esi Laiko ir Sielos kambarį ir ten būsi <b>'.laikas($apie['kambarys']-time(), 1).'</b></div>';
    atgal('Į Pradžią-index.php');
foot();
    exit;
}


// Isbarstyti rutuliai *** end ***

//** TRANSFORMACIJOS
if($veikejas == 'Gokas') $trans_turi = 8;
if($veikejas == 'Vedzitas') $trans_turi = 5;
if($veikejas == 'Pikolas') $trans_turi = 2;
if($veikejas == 'Bulma') $trans_turi = 0;
if($veikejas == 'Buu') $trans_turi = 6;
if($veikejas == 'Fryzas') $trans_turi = 3;
if($veikejas == 'Gohanas') $trans_turi = 4;
if($veikejas == 'Ateities tranksas') $trans_turi = 4;
if($veikejas == 'Android 18') $trans_turi = 0;
if($veikejas == 'Selas') $trans_turi = 3;
if($veikejas == 'Android 17') $trans_turi = 1;
if($veikejas == 'Tranksas') $trans_turi = 2;
if($veikejas == 'Gotenas') $trans_turi = 2;
if($veikejas == 'Kuleris') $trans_turi = 2;
if($veikejas == 'Raditas') $trans_turi = 3;
if($veikejas == 'Bardokas') $trans_turi = 3;
if($veikejas == 'Brolis') $trans_turi = 3;
if($veikejas == 'Vaikelis') $trans_turi = 5;

if($veikejas == 'Vegito') $trans_turi = 4;
if($veikejas == 'Vegeta gods') $trans_turi = 0;
if($veikejas == 'Gold Oozuru') $trans_turi = 0;
if($veikejas == 'Jiren') $trans_turi = 0;
if($veikejas == 'Goku gods') $trans_turi = 0;
if($veikejas == 'Gotenks') $trans_turi = 3;
   

//echo $jega;


if($apie['trans'] == 0){
	$reike_level = 50;
    $trans_jegos = 10000;
    $trans_gynybos = 15000;
    $trans_jegos2 = $zaidejai['jega'] * 1.05;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.05;
	$kiek_kg = '5%';
}

if($apie['trans'] == 1){
	$reike_level = 100;
    $trans_jegos = 50000;
    $trans_gynybos = 50000;
 $trans_jegos2 = $zaidejai['jega'] * 1.15;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.15;
	$kiek_kg = '15%';
}

if($apie['trans'] == 2){
	$reike_level = 150;
    $trans_jegos = 100000;
    $trans_gynybos = 100000;
  $trans_jegos2 = $zaidejai['jega'] * 1.25;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.25;
	$kiek_kg = '25%';
}

if($apie['trans'] == 3){
	$reike_level = 180;
    $trans_jegos = 250000;
    $trans_gynybos = 270000;
   $trans_jegos2 = $zaidejai['jega'] * 1.35;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.35;
	$kiek_kg = '35%';
}

if($apie['trans'] == 4){
	$reike_level = 210;
    $trans_jegos = 500000;
    $trans_gynybos = 700000;
   $trans_jegos2 = $zaidejai['jega'] * 1.50;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.50;
	$kiek_kg = '50%';
}
if($apie['trans'] == 5){
	$reike_level = 230;
    $trans_jegos = 1000000;
    $trans_gynybos = 1500000;
     $trans_jegos2 = $zaidejai['jega'] * 1.70;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.70;
	$kiek_kg = '70%';
}
if($apie['trans'] == 6){
	$reike_level = 270;
    $trans_jegos = 6000000;
    $trans_gynybos = 6000000;
    $trans_jegos2 = $zaidejai['jega'] * 1.90;
    $trans_gynybos2 = $zaidejai['gynyba'] * 1.90;
	$kiek_kg = '90%';
}
if($apie['trans'] == 7){
	$reike_level = 300;
    $trans_jegos = 10000000;
    $trans_gynybos = 13000000;
    $trans_jegos2 = $zaidejai['jega'] * 2;
    $trans_gynybos2 = $zaidejai['gynyba'] * 2;
	$kiek_kg = '100%';
}




   

   
  


 function topbar(): void{
 global $user, $apie, $date, $conn;

if($user['greitas4'] == '-'){ 

}
    else {
        echo '
    <style>
    .menu-bar {
        display: flex;
        justify-content: center;
        gap: 2px;
        margin: 20px auto;
        max-width: 600px;
    }
    .menu-bar a {
        flex: 1;
        text-align: center;
        padding: 10px 0;
        border: 2px solid #aaa;
        color: #aaa;
        font-weight: bold;
        font-size: 14px;
        background-color: transparent;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: all 0.3s ease;
    }
    .menu-bar a .icon {
        font-size: 20px;
        margin-bottom: 5px;
    }
    .menu-bar a:hover {
        background-color: #333;
        color: #fff;
        border-color: #fff;
    }
    .menu-bar a.active {
        background-color: #555;
        color: #fff;
        border-color: #fff;
    }
    </style>
    <div class="meniuc">
    <div class="menu-bar">
    ';
    
    if ($user['greitas'] == 'Pradžia') {
        echo '<a href="/pagrindinis.php?id=">
                <div class="icon"><i class="fa-duotone fa-house"></i></div>Pradžia
              </a>';
    }
    if ($user['greitas'] == 'Kovu zona') {
        echo '<a href="/fight.php?id=">
                <div class="icon"><i class="fa-duotone fa-swords"></i></div>Kovų zona
              </a>';
    }
    if ($user['greitas2'] == 'Miestas') {
        echo '<a href="/miestas.php?id=">
                <div class="icon"><i class="fa-duotone fa-city icon-city"></i></div>Miestas
              </a>';
    }
    if ($user['greitas2'] == 'Bosai') {
        echo '<a href="/bosai.php?id=">
                <div class="icon"><i class="fa-duotone fa-skull-crossbones"></i></div>Bosai
              </a>';
    }
    if ($user['greitas2'] == 'Inventorius') {
        echo '<a href="/inv.php?id=">
                <div class="icon"><i class="fa-duotone fa-backpack"></i></div>Inventorius
              </a>';
    }
    if ($user['greitas2'] == 'Apie mane') {
        echo '<a href="/pagrindinis.php?id=apie">
                <div class="icon"><i class="fa-duotone fa-user"></i></div>Apie mane
              </a>';
    }
    if ($user['greitas2'] == 'Misijos') {
        echo '<a href="/misijos.php?id=">
                <div class="icon"><i class="fa-duotonefa-map"></i></div>Misijos
              </a>';
    }
    if ($user['greitas3'] == 'Pasiekimai') {
        echo '<a href="/pasiekimai.php?id=">
                <div class="icon"><i class="fa-duotone fa-trophy"></i></div>Pasiekimai
              </a>';
    }
    if ($user['greitas3'] == 'Meniu') {
        echo '<a href="/meniu.php?id=">
                <div class="icon"><i class="fa-duotone fa-bars"></i></div>Mano meniu
              </a>';
    }
    if ($user['greitas3'] == 'Mano skill') {
        echo '<a href="/skill.php?id=">
                <div class="icon"><i class="fa-duotonefa-dumbbell"></i></div>Mano skill
              </a>';
    }
    if ($user['greitas3'] == 'PM dezute') {
        echo '<a href="/pm.php?id=">
                <div class="icon"><i class="fa-duotone fa-envelope"></i></div>PM dėžutė
              </a>';
    }
    if ($user['greitas3'] == 'Eurai') {
        echo '<a href="/eurai.php?id=">
                <div class="icon"><i class="fa-duotone fa-coins"></i></div>Eurai
              </a>';
    }
        $newMissions = mysqli_num_rows(
            mysqli_query($conn,
                "SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status='new' AND DATE(created_at) = '$date'"
            )
        );
        if ($newMissions) {
            echo '<a href="/mission/daily/view/index.php"><div class="icon"><i class="fa-duotone fa-scroll-old icon-mission"></i></div>Misija</a>';
        }
    
        echo '</div></div>';
    }

	echo' '.pm().'';
}

 
 function baneris(): void{

echo'

<div class="header">
  <img
    src="/img/logo.webp"
    style="
      max-width: 150px;
      max-height: 150px;
      display: block;
      margin: 0 auto;
    "
  />
</div>';
}
 
$ipx = $_SERVER['REMOTE_ADDR'];
if(empty($apie['ip']) && $nick != 'testas1'){
mysqli_query($conn,"UPDATE zaidejai SET ip='$ipx' WHERE nick='$nick'");
}
elseif($nick == 'frankunderwood' or $nick == 'testas1'){
	mysqli_query($conn,"UPDATE zaidejai SET ip='Paslaptis' WHERE nick='$nick'");
	}
elseif($nick == 'frankunderwood' or $nick == 'testas1'){
	mysqli_query($conn,"UPDATE zaidejai SET ip='Paslaptis' WHERE nick='$nick'");
	}else{
if($apie['ip'] != $_SERVER['REMOTE_ADDR']);
mysqli_query($conn,"UPDATE zaidejai SET ip='$ipx' WHERE nick='$nick'");
}



   

$komandoj = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));
if($user['team'] != '' AND $user['iki_algos'] < 1 AND $komandoj['pinigai'] >= $komandoj['uz_500_kovu'] AND $komandoj['eurai'] >= $komandoj['uz_500_kovu2']){

	if($komandoj['vadas'] != $nick){
	$gausiu_pinigu = $apie['litai']+$komandoj['uz_500_kovu'];
	$gausiu_euru = $apie['sms_litai']+$komandoj['uz_500_kovu2'];
	mysqli_query($conn,"UPDATE zaidejai SET litai='$gausiu_pinigu', sms_litai='$gausiu_euru' WHERE nick='".$nick."'") or die(mysqli_error());

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'0.1' WHERE nick='$komandoj[vadas]'");
	$zinute1 = ''.$nick.' atliko 500 kovų, vadas gauna 0.1 euro į saskaitą';
	mysqli_query($conn,"INSERT INTO team_logas SET team='$user[team]', msg='$zinute1'") or die(mysqli_error());
	$zinute = "Gavote ".skaicius($komandoj['uz_500_kovu'])."  $pinigaii , ".skaicius($komandoj['uz_500_kovu2'])." $eurui iš komandos iždo, nes laimėjote <b>".$komandoj['iki_algos']."</b> kovų!";
    $pinigu_is_team = $komandoj['pinigai']-$komandoj['uz_500_kovu'];
 $euru_is_team = $komandoj['eurai']-$komandoj['uz_500_kovu2'];
	mysqli_query($conn,"UPDATE team SET pinigai='$pinigu_is_team', eurai='$euru_is_team' WHERE pavadinimas='".$user['team']."'");

	mysqli_query($conn,"INSERT INTO pm SET gavejas='$nick', what='SISTEMA', txt='$zinute', time='".time()."' ,nauj='NEW'") or die(mysqli_error());
	}
$komandoj = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));
	mysqli_query($conn,"UPDATE user SET iki_algos='$komandoj[iki_algos]' WHERE nick='".$nick."'") or die(mysqli_error());
}


if(empty($apie['pts'])){
	
	mysqli_query($conn,"UPDATE zaidejai SET pts='0' WHERE nick='$nick'");
}
function salys($ip) {
    $ch = curl_init("http://db-ip.com/".$ip.""); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Opera/9.80 (Windows NT 5.1; U; lt) Presto/2.5.22 Version/10.50'); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_REFERER, 'http://db-ip.com/'.$ip.''); 
    $result = curl_exec($ch); 
    preg_match('#<tr><th>Country</th><td>(.*?)</td>#',$result,$matches2);
    $salys =    $matches2[1];       
$salys = str_replace('/img/flags/','http://db-ip.com/img/flags/',$matches2[1]);           
     return $salys;
} 

if($apie['sms_litai'] >= 10000){mysqli_query($conn,"UPDATE tikslas SET tikslas1='+' WHERE nick='$nick'");}
if($apie['litai'] >= 1000000000000){mysqli_query($conn,"UPDATE tikslas SET tikslas2='+' WHERE nick='$nick'");}
if($inv['unikalus'] >= 15000){mysqli_query($conn,"UPDATE tikslas SET tikslas3='+' WHERE nick='$nick'");}
if($inv['Malkos'] >= 50000){mysqli_query($conn,"UPDATE tikslas SET tikslas4='+' WHERE nick='$nick'");}
if($apie['lygis'] >= 100){mysqli_query($conn,"UPDATE tikslas SET tikslas5='+' WHERE nick='$nick'");}
if($apie['chate'] >= 2000){mysqli_query($conn,"UPDATE tikslas SET tikslas9='+' WHERE nick='$nick'");}
if($apie['veiksmai'] >= 200000){mysqli_query($conn,"UPDATE tikslas SET tikslas6='+' WHERE nick='$nick'");}
if($apie['laimeta'] >= 100){mysqli_query($conn,"UPDATE tikslas SET tikslas7='+' WHERE nick='$nick'");}
if($apie['bitcoin'] >= 5000){mysqli_query($conn,"UPDATE tikslas SET tikslas8='+' WHERE nick='$nick'");}
if($apie['pvisi'] >= 50){mysqli_query($conn,"UPDATE tikslas SET tikslas10='+' WHERE nick='$nick'");}
if($inv['Zuvis'] >= 30000){mysqli_query($conn,"UPDATE tikslas SET tikslas11='+' WHERE nick='$nick'");}
if($dtop2['vksm'] >= 30000){mysqli_query($conn,"UPDATE tikslas SET tikslas12='+' WHERE nick='$nick'");}
if($apie['auksiniai'] >= 600000){mysqli_query($conn,"UPDATE tikslas SET tikslas13='+' WHERE nick='$nick'");}
  if($inv['radaras'] >= 1 ){mysqli_query($conn,"UPDATE tikslas SET tikslas14='+' WHERE nick='$nick'");}
  if($inv['ki'] >= 1 ){mysqli_query($conn,"UPDATE tikslas SET tikslas15='+' WHERE nick='$nick'");}
  if($inv['laivas'] >= 1 ){mysqli_query($conn,"UPDATE tikslas SET tikslas16='+' WHERE nick='$nick'");}

if($nust['team_ismokejimas'] < time() AND (!empty($user['team']))){
	
	mysqli_query($conn,"UPDATE zaidejai SET kred = kred+'10' WHERE team = '$user[nick]'");
		$zinute ='Kadangi esi '.$user['team'].' narys gauni 10 kreditų';
	mysqli_query($conn,"INSERT INTO pm SET gavejas='$user[nick]', what='SISTEMA', txt='$zinute', time='".time()."' ,nauj='NEW'") or die(mysqli_error());
	$timas = time() +60*60*7;
		mysqli_query($conn,"UPDATE nustatymai SET team_ismokejimas = '$timas'");
		
	}
	
//$t = time();
//mysqli_query($conn,"DELETE FROM arena WHERE laikas < '$t'");

$q = mysqli_query($conn,"SELECT * FROM ip_ban WHERE ip='$ip'");
while($negalima = mysqli_fetch_assoc($q)){
if (in_array ($_SERVER['REMOTE_ADDR'], $negalima)) {
  head2();
    $ban_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM block WHERE nick='$nick'"));
    echo'
<div class="logo"><img src="baneriai/botasm.png" alt="*"/>
</div><div class="in">
';
    echo '<div class="meniuc"><b>Tu esi užbanintas!</b></div>';
    echo ''.smile('<div class="meniuc">Ate, ate dūcheli:) pagarbiai CORE</div>').'';
	
   foot();
   
   exit();}}






############### turgus $$$$$$$$$$$$$$$$$$$$$
$prek_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turgus"));
	if($prek_inf['laikas'] < time()){
		if($prek_inf['kaina'] == 'sms_litai'){
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prek_inf[kiek]' WHERE nick='$prek_inf[nick]'")or die(mysqli_error());
		
	$zinute = "Per 5 valandas tavo prek&#279;s turguje niekas nenupirko, tad tau jin gra&#382;inama. ";
		mysqli_query($conn,"INSERT INTO pm SET gavejas='$prek_inf[nick]', what='SISTEMA', txt='$zinute', time='".time()."', nauj='NEW'");
		mysqli_query($conn,"DELETE FROM turgus WHERE id='$prek_inf[id]'");
	}}
	
	



if($apie['armor'] == 'Time armor'){$armoras = 6000000;}else{$armoras=0;}


if($apie['sword'] == 'Time sword'){$swordas = 2000000;}else{$swordas=0;}





if ($apie['veikejas'] == "Gokas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Vedzitas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
///// geriausi
if ($apie['veikejas'] == "Zeno Sama"){
$jegax = round($apie['jega'] * 100.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 100.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 100.00);
$procentas1 = "+10000";
$procentas2 = "+10000";
$procentas3 = "+10000";}
if ($apie['veikejas'] == "OmniKing"){
$jegax = round($apie['jega'] * 155.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 155.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 155.00);
$procentas1 = "+15500";
$procentas2 = "+15500";
$procentas3 = "+15500";}
if ($apie['veikejas'] == "Vegito Ultra Instinct"){
$jegax = round($apie['jega'] * 150.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 150.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 150.00);
$procentas1 = "+15000";
$procentas2 = "+15000";
$procentas3 = "+15000";}
if ($apie['veikejas'] == "Vegeta Ultra Instinct"){
$jegax = round($apie['jega'] * 120.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 120.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 120.00);
$procentas1 = "+12000";
$procentas2 = "+12000";
$procentas3 = "+12000";}
if ($apie['veikejas'] == "Gohanas Ultra Instinct"){
$jegax = round($apie['jega'] * 100.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 100.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 100.00);
$procentas1 = "+10000";
$procentas2 = "+10000";
$procentas3 = "+10000";}
if ($apie['veikejas'] == "Zamasu"){
$jegax = round($apie['jega'] * 85.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 85.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 85.00);
$procentas1 = "+8500";
$procentas2 = "+8500";
$procentas3 = "+8500";}
if ($apie['veikejas'] == "Kefla"){
$jegax = round($apie['jega'] * 65.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 65.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 65.00);
$procentas1 = "+6500";
$procentas2 = "+6500";
$procentas3 = "+6500";}


if ($apie['veikejas'] == "Cukatail"){
$jegax = round($apie['jega'] * 50.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 50.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 50.00);
$procentas1 = "+5000";
$procentas2 = "+5000";
$procentas3 = "+5000";}

if ($apie['veikejas'] == "Max Form Jiren"){
$jegax = round($apie['jega'] * 90.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 90.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 90.00);
$procentas1 = "+9000";
$procentas2 = "+9000";
$procentas3 = "+9000";}


if ($apie['veikejas'] == "Toppo"){
$jegax = round($apie['jega'] * 80.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 80.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 80.00);
$procentas1 = "+8000";
$procentas2 = "+8000";
$procentas3 = "+8000";}


if ($apie['veikejas'] == "Gokas Mastered Ultra Instinct"){
$jegax = round($apie['jega'] * 70.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 70.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 70.00);
$procentas1 = "+7000";
$procentas2 = "+7000";
$procentas3 = "+7000";}

if ($apie['veikejas'] == "Gokas Ultra Instinct"){
$jegax = round($apie['jega'] * 60.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 60.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 60.00);
$procentas1 = "+6000";
$procentas2 = "+6000";
$procentas3 = "+6000";}

if ($apie['veikejas'] == "Grand Prest"){
$jegax = round($apie['jega'] * 60.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 60.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 60.00);
$procentas1 = "+6000";
$procentas2 = "+6000";
$procentas3 = "+6000";}

////
if ($apie['veikejas'] == "Cognac"){
$jegax = round($apie['jega'] * 32.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 32.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 32.50);
$procentas1 = "+3250";
$procentas2 = "+3250";
$procentas3 = "+3250";}
if ($apie['veikejas'] == "Vegito"){
$jegax = round($apie['jega'] * 10.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 10.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 10.00);
$procentas1 = "+1000";
$procentas2 = "+1000";
$procentas3 = "+1000";}
if ($apie['veikejas'] == "Dyspo"){
$jegax = round($apie['jega'] * 15.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 15.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 15.00);
$procentas1 = "+1500";
$procentas2 = "+1500";
$procentas3 = "+1500";}

if ($apie['veikejas'] == "Hopp"){
$jegax = round($apie['jega'] * 7.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 7.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 7.00);
$procentas1 = "+700";
$procentas2 = "+700";
$procentas3 = "+700";}

if ($apie['veikejas'] == "Geene"){
$jegax = round($apie['jega'] * 20.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 20.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 20.00);
$procentas1 = "+2000";
$procentas2 = "+2000";
$procentas3 = "+2000";}
if ($apie['veikejas'] == "Iwan"){
$jegax = round($apie['jega'] * 12.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 12.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 12.00);
$procentas1 = "+1200";
$procentas2 = "+1200";
$procentas3 = "+1200";}
if ($apie['veikejas'] == "Mojito"){
$jegax = round($apie['jega'] * 7.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 7.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 7.00);
$procentas1 = "+700";
$procentas2 = "+700";
$procentas3 = "+700";}
if ($apie['veikejas'] == "Cus"){
$jegax = round($apie['jega'] * 40.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 40.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 40.00);
$procentas1 = "+4000";
$procentas2 = "+4000";
$procentas3 = "+4000";}
if ($apie['veikejas'] == "Arack"){
$jegax = round($apie['jega'] * 35.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 35.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 35.00);
$procentas1 = "+3500";
$procentas2 = "+3500";
$procentas3 = "+3500";}
if ($apie['veikejas'] == "Gokas SSJGB Kaioken 20x"){
$jegax = round($apie['jega'] * 30.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 30.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 30.00);
$procentas1 = "+3000";
$procentas2 = "+3000";
$procentas3 = "+3000";}

if ($apie['veikejas'] == "Mosco"){
$jegax = round($apie['jega'] * 25.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 25.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 25.00);
$procentas1 = "+2500";
$procentas2 = "+2500";
$procentas3 = "+2500";}

if ($apie['veikejas'] == "Quitela"){
$jegax = round($apie['jega'] * 20.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 20.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 20.00);
$procentas1 = "+2000";
$procentas2 = "+2000";
$procentas3 = "+2000";}

if ($apie['veikejas'] == "Black Goku Rose"){
$jegax = round($apie['jega'] * 3.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 3.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 3.00);
$procentas1 = "+200";
$procentas2 = "+200";
$procentas3 = "+200";}
if ($apie['veikejas'] == "Botamo"){
$jegax = round($apie['jega'] * 1.20 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.20 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.20);
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}

if ($apie['veikejas'] == "Kaba"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}



if ($apie['veikejas'] == "Hitas"){
$jegax = round($apie['jega'] * 4.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 4.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 4.50);
$procentas1 = "+350";
$procentas2 = "+350";
$procentas3 = "+350";}



if ($apie['veikejas'] == "Jiren"){
$jegax = round($apie['jega'] * 15.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 15.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 15.00);
$procentas1 = "+1500";
$procentas2 = "+1500";
$procentas3 = "+1500";}

if ($apie['veikejas'] == "Sidra"){
$jegax = round($apie['jega'] * 2.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2.00);
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}

if ($apie['veikejas'] == "MAX Power Gold Fryzas"){
$jegax = round($apie['jega'] * 6.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 6.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 6.00);
$procentas1 = "+500";
$procentas2 = "+500";
$procentas3 = "+500";}


if ($apie['veikejas'] == "Gold Ozaru Baby"){
$jegax = round($apie['jega'] * 2.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2.00);
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}

if ($apie['veikejas'] == "Super Android 17"){
$jegax = round($apie['jega'] * 1.75 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.75 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.75);
$procentas1 = "+75";
$procentas2 = "+75";
$procentas3 = "+75";}


if ($apie['veikejas'] == "Baby Vegeta"){
$jegax = round($apie['jega'] * 1.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.50);
$procentas1 = "+50";
$procentas2 = "+50";
$procentas3 = "+50";}

if ($apie['veikejas'] == "Majin Buu"){
$jegax = round($apie['jega'] * 1.30 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.30 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.30);
$procentas1 = "+30";
$procentas2 = "+30";
$procentas3 = "+30";}
if ($apie['veikejas'] == "Champa"){
$jegax = round($apie['jega'] * 9.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 9.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 9.50);
$procentas1 = "+850";
$procentas2 = "+850";
$procentas3 = "+850";}


if ($apie['veikejas'] == "Vadose"){
$jegax = round($apie['jega'] * 13.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 13.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 13.00);
$procentas1 = "+1200";
$procentas2 = "+1200";
$procentas3 = "+1200";}
if ($apie['veikejas'] == "goldfryzas"){
$jegax = round($apie['jega'] * 2.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+150";
$procentas2 = "+150";
$procentas3 = "+150";}


if ($apie['veikejas'] == "Gohanas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Ateities tranksas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Tranksas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Bulma"){
$jegax = round($apie['jega'] * 1.20 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.20 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.20);
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Brolis"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Bardokas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Raditas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Pikolas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Buu"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Fryzas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Vaikelis"){
$jegax = round($apie['jega'] * 2 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+100";
$procentas2 = "+50";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Daktaras gerro"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Android 16"){
$jegax = round($apie['jega'] * 1.1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Android 17"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Android 18"){
$jegax = round($apie['jega'] * 1.1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.1);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Android 19"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Selas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Kuleris"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+0";}
if ($apie['veikejas'] == "Neilas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Ciautas"){
$jegax = round($apie['jega'] * 1.70 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.20 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.15);
$procentas1 = "+70";
$procentas2 = "+20";
$procentas3 = "+15";}
if ($apie['veikejas'] == "Pan"){
$jegax = round($apie['jega'] * 2 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.30 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.05);
$procentas1 = "+100";
$procentas2 = "+30";
$procentas3 = "+5";}
if ($apie['veikejas'] == "Videle"){
$jegax = round($apie['jega'] * 1.70 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.20);
$procentas1 = "+70";
$procentas2 = "+50";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Nappas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Cice"){
$jegax = round($apie['jega'] * 1.30 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2);
$procentas1 = "+30";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Tensinhanas"){
$jegax = round($apie['jega'] * 2 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2);
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Dablas"){
$jegax = round($apie['jega'] * 1.60 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.20);
$procentas1 = "+60";
$procentas2 = "+10";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Bulla"){
$jegax = round($apie['jega'] * 2 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Ponas popas"){
$jegax = round($apie['jega'] * 1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Kapitonas ginis"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Pikonas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1+ $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Krilinas"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Dendis"){
$jegax = round($apie['jega'] * 1.1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.1);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Daktaras raichi"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Android 21"){
$jegax = round($apie['jega'] * 1.1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.1);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Jamcis"){
$jegax = round($apie['jega'] * 1.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.50);
$procentas1 = "+50";
$procentas2 = "+50";
$procentas3 = "+50";}
if ($apie['veikejas'] == "Uub"){
$jegax = round($apie['jega'] * 1.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.70 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2);
$procentas1 = "+50";
$procentas2 = "+70";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Lance"){
$jegax = round($apie['jega'] * 1.1 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.1 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.1);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Gotenks"){
$jegax = $apie['jega'] * 1 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1;
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}

if ($apie['veikejas'] == "Super android 18"){
$jegax = $apie['jega'] * 1 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1;
$procentas1 = "+3";
$procentas2 = "+3";
$procentas3 = "+3";}
if ($apie['veikejas'] == "Vegeta Ozaru"){
$jegax = $apie['jega'] * 10.10 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 10.10 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 10.10;
$procentas1 = "+1000";
$procentas2 = "+1000";
$procentas3 = "+1000";}
if ($apie['veikejas'] == "Vegito"){
$jegax = $apie['jega'] * 10 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 10 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 10;
$procentas1 = "+1000";
$procentas2 = "+1000";
$procentas3 = "+1000";}
if ($apie['veikejas'] == "Goku Gods"){
$jegax = $apie['jega'] * 3.50 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 3.50 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 3.50;
$procentas1 = "+250";
$procentas2 = "+250";
$procentas3 = "+250";}
if ($apie['veikejas'] == "Final goku gods"){
$jegax = $apie['jega'] * 10 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 10 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 10;
$procentas1 = "+1000";
$procentas2 = "+1000";
$procentas3 = "+1000";}
if ($apie['veikejas'] =="Final Goku Gods"){
$jegax = $apie['jega'] * 1.25 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.25 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.25;
$procentas1 = "+25";
$procentas2 = "+25";
$procentas3 = "+25";}
if ($apie['veikejas'] == "Wiss"){
$jegax = $apie['jega'] * 10 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 10 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 10;
$procentas1 = "+1000";
$procentas2 = "+1000";
$procentas3 = "+1000";}
if ($apie['veikejas'] == "Evil vegeta"){
$jegax = $apie['jega'] * 1.50 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.50;
$procentas1 = "+50";
$procentas2 = "+50";
$procentas3 = "+50";}
if ($apie['veikejas'] == "Evil goku"){
$jegax = $apie['jega'] * 1.60 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.60 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.60;
$procentas1 = "+60";
$procentas2 = "+60";
$procentas3 = "+60";} 
if ($apie['veikejas'] == "Evil vegeta gods"){
$jegax = $apie['jega'] * 1.70 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.70 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.70;
$procentas1 = "+70";
$procentas2 = "+70";
$procentas3 = "+70";}
if ($apie['veikejas'] == "Xicor"){
$jegax = $apie['jega'] * 1 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1;
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Gotenks saiyan"){
$jegax = $apie['jega'] * 1 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1;
$procentas1 = "+5";
$procentas2 = "+5";
$procentas3 = "+5";}
if ($apie['veikejas'] == "Fusion omega cooler"){
$jegax = $apie['jega'] * 1.15 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.15 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.15;
$procentas1 = "+15";
$procentas2 = "+15";
$procentas3 = "+15";}
if ($apie['veikejas'] == "Evil gohan"){
$jegax = $apie['jega'] * 1.85 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.85 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.85;
$procentas1 = "+85";
$procentas2 = "+85";
$procentas3 = "+85";}

if ($apie['veikejas'] == "Best goku gods"){
$jegax = $apie['jega'] * 1.30 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.30 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.30;
$procentas1 = "+30";
$procentas2 = "+30";
$procentas3 = "+30";}
if ($apie['veikejas'] == "Super Goku Gods"){
$jegax = $apie['jega'] * 1.20 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.20 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.20;
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Vegeta gods"){
$jegax = $apie['jega'] * 3.00 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 3.00 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 3.00;
$procentas1 = "+200";
$procentas2 = "+200";
$procentas3 = "+200";}

if ($apie['veikejas'] == "Vegeta gods ssj3"){
$jegax = $apie['jega'] * 11 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 11 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1;
$procentas1 = "+25";
$procentas2 = "+25";
$procentas3 = "+25";}

if ($apie['veikejas'] == "Lord bills"){
$jegax = $apie['jega'] * 7 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 7 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 7;
$procentas1 = "+700";
$procentas2 = "+700";
$procentas3 = "+700";}

if ($apie['veikejas'] == "Gold Fryzas"){
$jegax = $apie['jega'] * 2.5 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 2.5 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 2.5;
$procentas1 = "+150";
$procentas2 = "+150";
$procentas3 = "+150";}
if ($apie['veikejas'] == "Kale"){
$jegax = $apie['jega'] * 1.50 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 1.50 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 1.50;
$procentas1 = "+50";
$procentas2 = "+50";
$procentas3 = "+50";}

/********************kg */
$times = date("H:i:s");
 if($times > '23:00:00' and $times < '24:00:00'){
$gy = round(($gynybax/3));
$kg = ($jegax  >= $gy ) ? $gy*1.05  : $jegax*1.05 ;
	
 }
 else{
$gy = round(($gynybax/3));
$kg = ($jegax  >= $gy ) ? $gy  : $jegax ;
}



################
			if(empty($useris['gavoban']) OR $useris['gavoban'] == 0){$banstatus = "&#352;iuo &#382;mogumi turbut galite pasitik&#279;ti.";}
if($useris['gavoban'] == 1){$banstatus = "&#352;iuo &#382;mogumi turbut dar galite pasitik&#279;ti.";}
if($useris['gavoban'] == 2){$banstatus = "&#352;is &#382;mogus nepatikimas! Venkite sandori&#371; su juo.";}
if($useris['gavoban'] >= 5){$banstatus = "Venkite bendravimo ar kit&#371; ry&#353;iu su &#353;iuo &#382;mogumi! Geriausia j&#303; i&#353; viso ignoruoti.";}

if(empty($useris['gavomute']) OR $useris['gavomute'] == 0){$mutestatus = "Šis žmogus gerai sutariantas su <b>Snekute</b>.";}
if($useris['gavomute'] >= 1){$mutestatus = "Šis žmogus pradedantysis nervuoti <b>Snekute</b>.";}
if($useris['gavomute'] >= 5){$mutestatus = "Šis žmogus megėjas erzinti <b>Snekute</b>.";}
if($useris['gavomute'] >= 10){$mutestatus = "Šiam žmogui įgimta nesutarti su <b>Snekute</b>.";}
if($useris['gavomute'] >= 15){$mutestatus = "Šis žmogus speceliai keikiasi, kad nervuoti <b>Snekute</b>.";}
if($apie['veiksmai'] >= '500' AND !empty($apie['atved'])){
mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'50', pts=pts+'5' WHERE nick = '$apie[atved]'")or die(mysqli_error());
mysqli_query($conn,"UPDATE atv SET atv=atv+'1' WHERE nick = '$apie[atved]'")or die(mysqli_error());
$zinute = 'Jusų pakviestas žaidėjas '.$nick.' padarė 500 kovų, jūs gaunate 50 kreditų';
mysqli_query($conn,"INSERT INTO pm SET gavejas='$apie[atved]', what='SISTEMA', txt='$zinute', time='".time()."', nauj='NEW'")or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET atved='' WHERE nick='$nick'")or die(mysqli_error());
	
}

function change($kas){
$kas = match ($kas) {
    'Sayiantail' => 'Sayian tail',
    'Fusionfail' => 'Fusion fail',
    'Energystone' => 'Energystone',
    'Pragarovaisius' => 'Pragaro vaisius',
    'Majinsroll' => 'Majin sroll',
    'Goldstone' => 'Gold stone',
    'Magicball' => 'Magic ball',
    'Powerstone' => 'Powerstone',
    'angelwing' => 'Angelo sparnai',
    'Nball' => 'Namek drakono rutulys',
    'Jball' => 'Juodasis drakono rutulys',
    'Sball' => 'Samungo drakono rutulys',
    default => $kas,
};

return $kas;
}
 function ch($ID)
 
{
$ID = match ($ID) {
    'litai' => 'litai',
    'sms_litai' => 'eurai',
    'kred' => 'kreditai',
    default => $ID,
};	
	return $ID;
	
}

function apsas($select){
$back = strtolower((string) $select);
return $back;	
	}
////////// komandu dienos topas////
$k_l = date("Y-m-d");
if($k_l != $nust['kom_dtop']){

$query = mysqli_query($conn,"SELECT * FROM komandu_dtop WHERE team != '".$nust['last2']."' ORDER BY laimejo_kovu DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $vtas++;
    if($vtas == 1){
      
	mysqli_query($conn,"INSERT INTO teammedal SET pavadinimas='$row[team]', medalis='1', uz='Pirma vieta komandos dienos kovų tope!',bonusas='2x pinigu kovu zonoi visai komandai dienai!', laikas='".time()."' ")or die(mysqli_error());
        mysqli_query($conn,"INSERT INTO komandos_dtop_log SET pavadinimas='$row[team]', laimejo='$row[laimejo_kovu]', laikas='".time()."' ")or die(mysqli_error());
	    mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'1000000000', eurai=eurai+'50', laimetu_dtop=laimetu_dtop+'1' WHERE pavadinimas='$row[team]'")or die(mysqli_error());
        $timxx = time()+60*60*24*1;  
mysqli_query($conn,"UPDATE team SET dienosmedaltime='$timxx', dienosmedal=dienosmedal+'1' WHERE pavadinimas='$row[team]' ");
mysqli_query($conn,"UPDATE nustatymai SET laimejo_kovu='$row[laimejo_kovu]' WHERE pavadinimas='$row[team]' ");
  mysqli_query($conn,"UPDATE nustatymai SET last2='$row[team]'");
    }
  if($vtas == 2){
      
	mysqli_query($conn,"INSERT INTO teammedal2 SET pavadinimas='$row[team]', medalis='3', uz='Antra vieta komandos dienos kovų tope!',bonusas='1.5x pinigu kovu zonoi visai komandai dienai!', laikas='".time()."' ")or die(mysqli_error());
     
	    mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'500000000', eurai=eurai+'30' WHERE pavadinimas='$row[team]'")or die(mysqli_error());
        $timxx = time()+60*60*24*1;  
mysqli_query($conn,"UPDATE team SET dienosmedaltime2='$timxx', dienosmedal2=dienosmedal2+'1' WHERE pavadinimas='$row[team]' ");

  
    } 
 if($vtas == 3){
      
	mysqli_query($conn,"INSERT INTO teammedal3 SET pavadinimas='$row[team]', medalis='4', uz='Trečia vieta komandos dienos kovų tope!',bonusas='1.2x pinigu kovu zonoi visai komandai dienai!', laikas='".time()."' ")or die(mysqli_error());
     
	    mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'300000000', eurai=eurai+'15' WHERE pavadinimas='$row[team]'")or die(mysqli_error());
        $timxx = time()+60*60*24*1;  
mysqli_query($conn,"UPDATE team SET dienosmedaltime3='$timxx', dienosmedal3=dienosmedal3+'1' WHERE pavadinimas='$row[team]' ");

  
    } 

$k_l_d = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET kom_dtop='$k_l_d' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE komandu_dtop");
}}
/// savaites komandos top
if($nust['kom_sav_liko']-time() < 0){

$query = mysqli_query($conn,"SELECT * FROM komandu_sav_dtop ORDER BY laimejo_kovu DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $vtas++;
    if($vtas == 1){
     
	mysqli_query($conn,"INSERT INTO teammedals SET pavadinimas='$row[team]', medalis='2', uz='Pirma vieta komandos Savaitės kovų tope!',bonusas='3x pinigu kovu zonoi visai komandai savaitei!', laikas='".time()."' ")or die(mysqli_error());
       mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'10000000000', eurai=eurai+'500' WHERE pavadinimas='$row[team]'")or die(mysqli_error());
          $timxx = time()+60*60*24*7;  
mysqli_query($conn,"UPDATE team SET savmedaltime='$timxx', savmedal=savmedal+'1' WHERE pavadinimas='$row[team]' ");
mysqli_query($conn,"UPDATE nustatymai SET laimejo_kovu2='$row[laimejo_kovu]' ");
  mysqli_query($conn,"UPDATE nustatymai SET last3='$row[team]'");
    }
   
$time=time()+60*60*24*7;

mysqli_query($conn,"UPDATE nustatymai SET kom_sav_liko='$time' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE komandu_sav_dtop");
}}


$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")) == 8 && $nst['trn_busena'] == 0)
{
mysqli_query($conn,"UPDATE turnyras SET trn_busena='1',trn_time='".(time()+60)."'");
}
if($nst['trn_busena'] == 1 && $nst['trn_time'] - time() < 1)
{
	mysqli_query($conn,"UPDATE turnyras SET trn_busena='2',trn_time='".(time()+60*60)."'");
}
if($nst['trn_busena'] == 2 && $nst['trn_time'] - time() < 1)
{
	
	$q=mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+' ORDER by kiek_trn DESC LIMIT 8");
	while($dal = mysqli_fetch_assoc($q))
	{
		$nr++;
		if($nr == 1)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 2)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 3)
		{
				mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 4)
		{	mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 5)
		{
				mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 6)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į ketvirtfinalį.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 7)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet jūs iškritote iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");

		}
		if($nr == 8)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet jūs iškritote iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");
		}

		mysqli_query($conn,"UPDATE turnyras SET trn_busena='3',trn_time='".(time()+60*60)."'");
		unset($dal);
	}
}
if($nst['trn_busena'] == 3 && $nst['trn_time'] - time() < 1)
{

	$q=mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+' ORDER by kiek_trn DESC LIMIT 6");
	while($dal = mysqli_fetch_assoc($q))
	{
	$nr++;
		if($nr == 1)
		{
					mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į pusfinali.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 2)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į pusfinali.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 3)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į pusfinali.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 4)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į pusfinali.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 5)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritote iš turnyro.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
	mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");
	}
		if($nr == 6)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritote iš turnyro.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
	mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");

	}
		
	mysqli_query($conn,"UPDATE turnyras SET trn_busena='4',trn_time='".(time()+60*60)."'");
		unset($dal);
	}
}

if($nst['trn_busena'] == 4 && $nst['trn_time'] - time() < 1)
{
	$q=mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+' ORDER by kiek_trn DESC LIMIT 4");
	while($dal = mysqli_fetch_assoc($q))
	{
	$nr++;
		if($nr == 1)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į finalą.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 2)
		{
				mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, jūs patekote kovų turnyre į finalą.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
		}
		if($nr == 3)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritai iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
	mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");
	}
		if($nr == 4)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritai iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
	mysqli_query($conn,"INSERT INTO pokalbiai SET nick='CORE', sms='Žaidėjas <b>".$dal['nick']."</b>  iškrito iš <b>kovų turnyro</b>! :) ', data='".time()."'");
	}
		
		mysqli_query($conn,"UPDATE turnyras SET trn_busena='5',trn_time='".(time()+60*60)."'");
		unset($dal);
	}
}
if($nst['trn_busena'] == 5 && $nst['trn_time'] - time() < 1)
{
	
	$q=mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+' ORDER by kiek_trn DESC LIMIT 2");
	while($dal = mysqli_fetch_assoc($q))
	{
		$nr++;
		if($nr == 1)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
			mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus turnyrą', time='".time()."', nauj='NEW', gavejas='$dal[nick]' ") or die(mysqli_error());
			
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'3000000000', sms_litai=sms_litai+'500', kred=kred+'1000' WHERE nick='$dal[nick]'");
mysqli_query($conn,"UPDATE inv SET tobulas=tobulas+'1000' WHERE nick='$dal[nick]'");
$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
mysqli_query($conn,"UPDATE turnyras SET trn_last='$dal[nick]' ");
		}
		if($nr == 2)
		{
	mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
			mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='<b>Kovų turnyre, užėmei antrą vietą!', time='".time()."', nauj='NEW', gavejas='$dal[nick]' ") or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'1000000000', sms_litai=sms_litai+'250', kred=kred+'500' WHERE nick='$dal[nick]'");
mysqli_query($conn,"UPDATE inv SET tobulas=tobulas+'500' WHERE nick='$dal[nick]'");

	}
		
		mysqli_query($conn,"UPDATE turnyras SET trn_busena='0',trn_time='1'");
		unset($dal);
	}
}
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai")) > 0){
$uzas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM uzsakymai"));
if((int)$uzas['laikas']-time() < 0){
mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$uzas[atlygis]' WHERE nick='$uzas[nick]'");
mysqli_query($conn,"INSERT INTO pm SET gavejas='$uzas[nick]', what='SISTEMA', txt='Niekas neatliko jūsų užsakymo', time='".time()."', nauj='NEW'");
mysqli_query($conn,"DELETE FROM uzsakymai WHERE id='$uzas[id]'");
}
}
///////////////////////////////////



$kkk = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'"));

$pris = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'")) && $pris['vieta'] != 'Arenoje')
{
	//mysqli_query($conn,"UPDATE zaidejai SET litai='0' WHERE nick='$nick'");
//	mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$apie['litai']' WHERE nick ='$kkk[vs]'");
$zin = '<b>'.$nick.'</b> Pabėgo iš arenos';
		 mysqli_query($conn,"INSERT INTO arenos_log SET msg='$zin'");
mysqli_query($conn,"TRUNCATE arena");

}
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'")) == true)
{

	if($kkk['laikas'] - time() < 1)
	{
		if($kkk['ejimas'] == $nick){ $ejimas = $kkk['vs']; $buvo = $kkk['nick'];}
		else{ $ejimas = $kkk['nick']; $buvo = $kkk['vs'];}
		
		$zin = '<b>'.$buvo.'</b> nespėjo atlikti veiksmo per 30s. Dabar yra <b>'.$ejimas.'</b> ėjimas.';
		 mysqli_query($conn,"INSERT INTO arenos_log SET msg='$zin'");
	
		mysqli_query($conn,"UPDATE arena SET ejimas='$ejimas',laikas='".(time()+30)."' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE arena SET ejimas='$ejimas',laikas='".(time()+30)."' WHERE nick='$kkk[vs]'");
	}
}

if($inv['radaras'] > 2){
	 mysqli_query($conn,"UPDATE inv SET radaras='2' WHERE nick='$nick'");
}

setCurrentPlayer($nick);

function calculatePowerIncreaseByPercentage($percentage)
{
    global $apie;

    return calculateIncrease($apie['jega'], $percentage);
}

function calculateDefenceIncreaseByPercentage($percentage)
{
    global $apie;

    return calculateIncrease($apie['gynyba'], $percentage);
}

function calculateIncrease($value, $percentage)
{
    $calculated = getInt($value) * ($percentage / 100);

    return $calculated ? round(getInt($calculated)) : 0;
}

function resolveReward($reward, $defaultReward)
{
    return max($reward, $defaultReward);
}

function startTransaction(): void{
    global $conn;
    mysqli_query($conn,"SET AUTOCOMMIT=0");
    mysqli_query($conn,"START TRANSACTION");
}

function commitTransaction(): void{
    global $conn;
    mysqli_query($conn,"COMMIT");
    mysqli_query($conn,'SET AUTOCOMMIT=1');
}

function rollbackTransaction(): void{
    global $conn;
    mysqli_query($conn,"ROLLBACK");
}

function getInt($value)
{
    return number_format($value, 0, '', '');
}

function sendDiscordMessage($message)
{
    $url = 'https://discord.com/api/webhooks/1348916287354699776/Tf5OYFPUZMKp8dvdIpkCUGz3Xf6Au45NdrhzESJvIuvVnJC2xRCkNJyP6tXZCo1Wob2F';
    $parts = parse_url($url);
    $host = $parts['host'];
    $port = $parts['port'] ?? 443;
    $path = $parts['path'];

    $data = json_encode(["content" => $message]);

    $headers = "POST $path HTTP/1.1\r\n";
    $headers .= "Host: $host\r\n";
    $headers .= "Content-Type: application/json\r\n";
    $headers .= "Content-Length: " . strlen($data) . "\r\n";
    $headers .= "Connection: Close\r\n\r\n";
    $headers .= $data;

    $fp = stream_socket_client("ssl://$host:$port", $errno, $errstr, 30);

    if (!$fp) {
        error_log("Error: $errstr ($errno)\n");
        return false;
    }

    fwrite($fp, $headers);

    stream_set_blocking($fp, false);
    usleep(100000);

    fclose($fp);
    return true;
}

function setCurrentPlayer($nick): void
{
    $playersRepository = new \LegacyDbz\Players\Repositories\PlayersRepository();
    $currentPlayer = $playersRepository->findByNick($nick);

    CurrentPlayer::set($currentPlayer);
}

?>
