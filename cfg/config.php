<?php

use Carbon\Carbon;
use Dotenv\Dotenv;
use LegacyDbz\Core\Db;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

Carbon::setLocale('lt');

if (filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN)) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ERROR);
}

session_start();

require __DIR__ . '/sql.php';
$n = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM news"));
$versija = ($n / 100) * 10;


$start = microtime(true);
$nust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM nustatymai"));
$ip = $_SERVER['REMOTE_ADDR'];


function head(): void
{
    echo '<?xml version="1.0" encoding="utf-8"?> 
    <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//LT" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lt">	
    <head>
    <title>DBZRETRO.LT - Drakonų Kova!</title>
    <link rel="shortcut icon" type="image/x-icon" href="css/favicon.ico" />
    <link rel="stylesheet" href="stiliai/2.css" type="text/css" media="screen" />
    <meta http-equiv="Content-Language" content="lt" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="cache-control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
 

                           </head><body>';

}

function isEventHappening()
{
    $eventMonths = [
        '4',
        '5',
        '6',
        '7',
        '8',
        '9'
    ];

    $month = date('n');

    return in_array($month, $eventMonths, true);
}


$ico = ' <img src="img/bicons/icon2.png"/> ';
$ico2 = ' <img src="img/bicons/icon2.png"/> ';


function sk($skaicius, $nr = 0)
{
    return number_format($skaicius, $nr, '', ' ');
}


function post($input)
{
    global $conn;

    $input = trim((string)$input);

    return mysqli_real_escape_string($conn, $input);
}


$id = isset($_GET['id']) ? preg_replace("/[^A-Za-z0-9_ ]/", '', (string)$_GET['id']) : null;
$ID = isset($_GET['ID']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['ID']) : null;
$ka = isset($_GET['ka']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['ka']) : null;
$co = isset($_GET['co']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['co']) : null;
$go = isset($_GET['go']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['go']) : null;
$wh = isset($_GET['wh']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['wh']) : null;
$i = isset($_GET['i']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['i']) : null;
$psl = isset($_GET['psl']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['psl']) : null;
$mo = isset($_GET['mo']) ? preg_replace("/[^A-Za-z0-9_ ]/", "", (string)$_GET['mo']) : null;
$ft_id = isset($_GET['ft_id']) ? preg_replace("/[^0-9]/", "", (string)$_GET['ft_id']) : null;


function puslapiavimas($puslapiu_is_viso, $esamas_puslapis, $puslapiavimo_adresas)
{
    echo '<div class="up">Puslapiavimas</div>';
    if (empty($esamas_puslapis)) {
        $esamas_puslapis = 1;
    }
    if (empty($puslapiu_is_viso)) {
        $puslapiu_is_viso = 1;
    }
// if($esamas_puslapis>1){$pusll=$esamas_puslapis-1; $puslapiavimas.="<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$pusll\"></a> ";}else{$puslapiavimas.=" ";}

    if ($esamas_puslapis < 1 || $esamas_puslapis > $puslapiu_is_viso) {
        $esamas_puslapis = 1;
    }
    $puslapiu_is_viso1 = $puslapiu_is_viso - 1;
    $esamas_puslapis1 = $esamas_puslapis - 1;
    $esamas_puslapis11 = $esamas_puslapis - 2;
    $esamas_puslapis2 = $esamas_puslapis + 1;
    $esamas_puslapis22 = $esamas_puslapis + 2;
    if ($puslapiu_is_viso < 30) {
        for ($l = 1; $l <= $puslapiu_is_viso; $l++) {
            if ($esamas_puslapis == "$l") {
                $puslapiavimas .= "<span class=\"page\"><b>$esamas_puslapis</b></span> ";
            } else {
                $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$l\">$l</a> ";
            }
        }
    } else {
        if ($esamas_puslapis > 1) {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=1\">1</a> ";
        } else {
            $puslapiavimas .= "<b>1</b> ";
        }
        if ($esamas_puslapis11 > 1000) {
            $puslapiavimas .= "... ";
        }
        if ($esamas_puslapis11 > 1 && $esamas_puslapis11 < $esamas_puslapis1) {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$esamas_puslapis11\">$esamas_puslapis11</a> ";
        }
        if ($esamas_puslapis1 > 1 && $esamas_puslapis > 2) {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$esamas_puslapis1\">$esamas_puslapis1</a> ";
        }
        if ($esamas_puslapis > 1 && $esamas_puslapis < $puslapiu_is_viso) {
            $puslapiavimas .= "<b>$esamas_puslapis</b></span> ";
        }
        if ($esamas_puslapis2 < $puslapiu_is_viso && $esamas_puslapis < $puslapiu_is_viso1) {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$esamas_puslapis2\">$esamas_puslapis2</a> ";
        }
        if ($esamas_puslapis22 < $puslapiu_is_viso && $esamas_puslapis22 > $esamas_puslapis2) {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$esamas_puslapis22\">$esamas_puslapis22</a> ";
        }
        if ($esamas_puslapis22 < $puslapiu_is_viso1) {
            $puslapiavimas .= "... ";
        }
        if ($puslapiu_is_viso == "$esamas_puslapis") {
            $puslapiavimas .= "<b>$puslapiu_is_viso</b></span> ";
        } else {
            $puslapiavimas .= "<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$puslapiu_is_viso\">$puslapiu_is_viso</a> ";
        }
    }

// if($esamas_puslapis<$puslapiu_is_viso){$pusl=$esamas_puslapis+1; $puslapiavimas.="<a class=\"page\" href=\"$puslapiavimo_adresas&#38;psl=$pusl\"></a>";}else{$puslapiavimas.="";}  
    return $puslapiavimas;
}


function kiek($tab)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) FROM $tab");
    $row = mysqli_fetch_row($result);
    return $row[0];
}

function laikas($time, $id = 0)
{
    time();
    if ($id) {
        if ($time < 60) {
            $xx = $time . ' sek.';
        } elseif ($time >= 60 && $time < 3600) {
            $xx = gmdate('i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time >= 3600 && $time < 24 * 3600) {
            $xx = gmdate('G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time >= 24 * 3600 && $time < 31 * 24 * 3600) {
            $xx = gmdate('z \d\. G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time > 31 * 24 * 3600) {
            $xx = gmdate('n \m\ė\n\.  j \d\. G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time < 0) {
            $xx = '0 sek.';
        }
    } else {
        $xx = Carbon::createFromTimestamp($time)->diffForHumans();
    }
    return $xx;
}

function formatDateTimeString($dateTimeString)
{
    $time = strtotime((string)$dateTimeString);

    $currentDate = new DateTime('now');
    $yesterdayDate = new DateTime('yesterday');
    $dayBeforeYesterdayDate = new DateTime('yesterday')->sub(new DateInterval('P1D')); // Subtract 1 day
    $tomorrowDate = new DateTime('tomorrow');
    $dayAfterTomorrowDate = new DateTime('tomorrow')->add(new DateInterval('P1D')); // Add 1 day

    if ($currentDate->format('Y-m-d') === date('Y-m-d', $time)) {
        $xx = '<small><font color="red">Šiandien</font> - ' . date('H:i', $time) . '</small>';
    } elseif ($yesterdayDate->format('Y-m-d') === date('Y-m-d', $time)) {
        $xx = '<small><font color="blue">Vakar</font> - ' . date('H:i', $time) . '</small>';
    } elseif ($dayBeforeYesterdayDate->format('Y-m-d') === date('Y-m-d', $time)) {
        $xx = '<small><font color="green">Užvakar</font> - ' . date('H:i', $time) . '</small>';
    } elseif ($tomorrowDate->format('Y-m-d') === date('Y-m-d', $time)) {
        $xx = '<small><font color="orange">Rytoj</font> - ' . date('H:i', $time) . '</small>';
    } elseif ($dayAfterTomorrowDate->format('Y-m-d') === date('Y-m-d', $time)) {
        $xx = '<small><font color="purple">Poryt</font> - ' . date('H:i', $time) . '</small>';
    } else {
        $xx = date('Y-m-d - H:i', $time);
    }

    return $xx;
}

function isYouTubeLink($url)
{
    $pattern = '/^(https?:\/\/)?(www\.)?(youtube\.com\/(watch\?v=|embed\/|v\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    return preg_match($pattern, (string)$url);
}

function isSoundCloudLink($url)
{
    $soundcloudPattern = '/^(https?:\/\/)?(on\.)?soundcloud\.com\/[a-zA-Z0-9_-]+\/[a-zA-Z0-9_-]+$/';

    return preg_match($soundcloudPattern, (string)$url);
}


function smile($text)
{
    global $conn;

    if (isYouTubeLink($text)) {
        return '<a href="' . $text . '" target="_blank">' . $text . '</a>';
    }

    if (isSoundCloudLink($text)) {
        return '<a href="' . $text . '" target="_blank">' . $text . '</a>';
    }

    $qu = mysqli_query($conn, "SELECT * FROM smile");
    while ($row = mysqli_fetch_assoc($qu)) {
        $text = str_replace("" . $row['kodas'] . "", " " . $row['img'] . " ", $text);

        $text = str_replace("[blue]", "<font color=\"blue\">", $text);
        $text = str_replace("[/blue]", "</font>", $text);
        $text = str_replace("[i]", "<i>", $text);
        $text = str_replace("[/i]", "</i>", $text);
        $text = str_replace("[u]", "<u>", $text);
        $text = str_replace("[/u]", "</u>", $text);
        $text = str_replace("[b]", "<b>", $text);
        $text = str_replace("[/b]", "</b>", $text);
        $text = str_replace("[h1]", "<h1>", $text);
        $text = str_replace("[/h1]", "</h1>", $text);
        $text = str_replace("[red]", "<font color=\"red\">", $text);
        $text = str_replace("[/red]", "</font>", $text);
        $text = str_replace("[white]", "<font color=\"white\">", $text);
        $text = str_replace("[/white]", "</font>", $text);
        $text = str_replace("[green]", "<font color=\"green\">", $text);
        $text = str_replace("[/br]", "</br>", $text);
        $text = str_replace("[go]", "<a href='", $text);
        $text = str_replace("[/go]", "'</a>", $text);
        $text = str_replace("[/green]", "</font>", $text);

        $text = preg_replace("#\[color=([0-9a-zA-Z]{6})\](.*?)\[/color\]#", "<span style=\"color: #\\1;\">\\2</span>", $text);

        $string = '1234567890ABCDEF';
        $sub = substr(str_shuffle($string), 1, 6) . '';


// $text = str_replace(".lt", "Blokuojama", $text);
        $text = str_replace(".us.lt", "Blokuojama", $text);
        $text = str_replace("us.lt", "Blokuojama", $text);
        $text = str_replace("us lt", "Reklama!", $text);
        $text = str_replace("Dbf.lt", "Reklama!", $text);
        $text = str_replace("Dbaf.lt", "Reklama!", $text);
        $text = str_replace("dbf.lt", "Reklama!", $text);
        $text = str_replace("dbaf.lt", "Reklama!", $text);
        $text = str_replace(".eu", "Reklama!", $text);
        $text = str_replace(".eu", "Reklama!", $text);
        $text = str_replace(".com", "Reklama!", $text);
        $text = str_replace("Naxui", "Nusikeikiau", $text);
        $text = str_replace("Lopas", "Nusikeikiau", $text);
        $text = str_replace(".us.lt", "Blokuojama", $text);
        $text = str_replace("Duxas", "Nusikeikiau", $text);
        $text = str_replace("Sliundra", "Nusikeikiau", $text);
        $text = str_replace("sliundra", "Nusikeikiau", $text);
        $text = str_replace("Bomzas", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("bomzas", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Dusk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("dusk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Gaidys", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Gaidys", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Sliuha", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("sliuha", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Sterva", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("sterva", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Padla", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("padla", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Pisk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("pisk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Utele", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("utele", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Ciulpk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("ciulpk", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Bybys", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("bybys", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Pimpalas", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("pimpalas", "Atsiprašau, negražiai šneku.", $text);
        $text = str_replace("Dux", "Aš esu dūchas.", $text);
        $text = str_replace("dux", "Aš esu dūchas.", $text);
        $text = str_replace("lygiai.lt", "*******", $text);
        $text = str_replace(".US.LT", "*******", $text);
        $text = str_replace(".LT", "*******", $text);

        $text = str_replace("Sistema", "Manęs čia nėra", $text);
        $text = str_replace("dbf.lt", "Blokuojama", $text);
        $text = str_replace("Travux.lt", "Blokuojama", $text);
        $text = str_replace(".com", "Blokuojama", $text);
        $text = str_replace("Ederon.mobi", "Blokuojama", $text);
        $text = str_replace(".lt", "Blokuojama", $text);
        $text = str_replace(".com", "Blokuojama", $text);
        $text = str_replace("Waprs.eu", "Blokuojama", $text);
        $text = str_replace("Waps.lt", "Blokuojama", $text);
        $text = str_replace("Travux.lt", "Blokuojama", $text);
        $text = str_replace("Wapscape.lt", "Blokuojama", $text);
        $text = str_replace("dbgods.lt", "Blokuojama", $text);
        $text = str_replace("dbgods. lt", "Blokuojama", $text);
        $text = str_replace("dbgods . lt", "Blokuojama", $text);
        $text = str_replace("d b g o d s . l t ", "Blokuojama", $text);
        $text = str_replace("dbgods lt", "Blokuojama", $text);
        $text = str_replace(".lt", "Blokuojama", $text);
        $text = str_replace(" . lt", "Blokuojama", $text);
        $text = str_replace("dbgods , lt", "Blokuojama", $text);
        $text = str_replace("wapas us lt", "Blokuojama", $text);
        $text = str_replace("wapas . us . lt", "Blokuojama", $text);
        $text = str_replace("wapas.us.lt", "Blokuojama", $text);
        $text = str_replace("Tob.lt", "Blokuojama", $text);
        $text = str_replace("Sistema ka tu?", "Tūsinu, o ką tu?", $text);


        $text = str_replace(":9dangui:", "<img src=\"img/smile/9dangui.png\">", $text);
        $text = str_replace(":aciu:", "<img src=\"img/smile/aciu.png\" >", $text);
        $text = str_replace(":agresivus:", "<img src=\"img/smile/agresivus.png\">", $text);
        $text = str_replace(":alkoholikas:", "<img src=\"img/smile/alkoholikas.gif\">", $text);
        $text = str_replace(":alus:", "<img src=\"img/smile/alus.gif\">", $text);
        $text = str_replace(":alus2:", "<img src=\"img/smile/alus2.gif\">", $text);
        $text = str_replace(":alus3:", "<img src=\"img/smile/alus3.gif\">", $text);
        $text = str_replace(":alus4:", "<img src=\"img/smile/alus4.gif\">", $text);
        $text = str_replace(":angel:", "<img src=\"img/smile/angel.gif\">", $text);
        $text = str_replace(":angeliukas:", "<img src=\"img/smile/angel.png\">", $text);
        $text = str_replace(":ate:", "<img src=\"img/smile/bye.gif\">", $text);
        $text = str_replace(":ateivis:", "<img src=\"img/smile/ateivis.png\">", $text);
        $text = str_replace(":baisu:", "<img src=\"img/smiles/baisu2.png\">", $text);
        $text = str_replace(":baisu2:", "<img src=\"img/smile/baisu2.png\">", $text);
        $text = str_replace(":baisu3:", "<img src=\"img/smile/baisu2.png\">", $text);
        $text = str_replace(":ban:", "<img src=\"img/smile/ban.png\">", $text);
        $text = str_replace(":bausme:", "<img src=\"img/smile/bausme.png\">", $text);
        $text = str_replace(":bee:", "<img src=\"img/smile/bee.png\">", $text);
        $text = str_replace(":birthday:", "<img src=\"img/smile/birthday.png\">", $text);
        $text = str_replace(":bomba:", "<img src=\"img/smile/bomba.png\"> ", $text);
        $text = str_replace(":bosas:", "<img src=\"img/smile/bosas.png\">", $text);
        $text = str_replace(":cake:", "<img src=\"img/smile/cake.png\">", $text);
        $text = str_replace(":club:", "<img src=\"img/smile/club.png\">", $text);
        $text = str_replace(":draugai:", "<img src=\"img/smile/draugai.png\">", $text);
        $text = str_replace(":dumas:", "<img src=\"img/smile/dumas.png\">", $text);
        $text = str_replace(":durnas:", "<img src=\"img/smile/durnas.png\">", $text);
        $text = str_replace(":fanaras:", "<img src=\"img/smile/fanaras.png\">", $text);
        $text = str_replace(":flirtas:", "<img src=\"img/smile/flirtas.png\">", $text);
        $text = str_replace(":flood:", "<img src=\"img/smile/flood.png\">", $text);
        $text = str_replace(":fucku:", "<img src=\"img/smile/fucku.png\">", $text);
        $text = str_replace(":fyfius:", "<img src=\"img/smile/fyfius.png\">", $text);
        $text = str_replace(":gerai:", "<img src=\"img/smile/gerai.png\">", $text);
        $text = str_replace(":heart:", "<img src=\"img/smile/heart.png\">", $text);
        $text = str_replace(":hmm:", "<img src=\"img/smile/hmm.png\">", $text);
        $text = str_replace(":hug:", "<img src=\"img/smile/hug.png\">", $text);
        $text = str_replace(":iki:", "<img src=\"img/smile/bye.gif\">", $text);
        $text = str_replace(":kabutese:", "<img src=\"img/smile/collection-quotation-mark-cliparts.png\">", $text);
        $text = str_replace(":kaledos:", "<img src=\"img/smile/kaledos.png\">", $text);
        $text = str_replace(":kava:", "<img src=\"img/smile/kava.png\">", $text);
        $text = str_replace(":knyga:", "<img src=\"img/smile/knyga.png\">", $text);
        $text = str_replace(":kvailas:", "<img src=\"img/smile/kvailas.png\">", $text);
        $text = str_replace(":la:", "<img src=\"img/smile/la.png\">", $text);
        $text = str_replace(":ledai:", "<img src=\"img/smile/ledai.png\">", $text);
        $text = str_replace(":lt:", "<img src=\"img/smile/lt.png\">", $text);
        $text = str_replace(":maldauja:", "<img src=\"img/smile/maldauja.png\">", $text);
        $text = str_replace(":meet:", "<img src=\"img/smile/meet.png\">", $text);
        $text = str_replace(":meile:", "<img src=\"img/smile/meile.png\">", $text);
        $text = str_replace(":mirkt:", "<img src=\"img/smile/mirkt.png\">", $text);
        $text = str_replace(":mirtis:", "<img src=\"img/smile/mirtis.png\">", $text);
        $text = str_replace(":mokslas:", "<img src=\"img/smile/mokslas.png\">", $text);
        $text = str_replace(":muzika:", "<img src=\"img/smile/muzika.png\">", $text);
        $text = str_replace(":myliu:", "<img src=\"img/smile/myliu.png\">", $text);
        $text = str_replace(":myliu2:", "<img src=\"img/smile/myliu.png\">", $text);
        $text = str_replace(":ne:", "<img src=\"img/smile/ne.gif\">", $text);
        $text = str_replace(":ne2:", "<img src=\"img/smile/ne.gif\">", $text);
        $text = str_replace(":ne3:", "<img src=\"img/smile/ne.gif\">", $text);
        $text = str_replace(":neas:", "<img src=\"img/smile/neas.gif\">", $text);
        $text = str_replace(":negera:", "<img src=\"img/smile/negera.gif\">", $text);
        $text = str_replace(":neitema:", "<img src=\"img/smile/neitema.png\">", $text);
        $text = str_replace(":netikras:", "<img src=\"img/smile/fake.png\">", $text);
        $text = str_replace(":nuobodu:", "<img src=\"img/smile/nuobodu.gif\">", $text);
        $text = str_replace(":nzn:", "<img src=\"img/smile/idk.png\">", $text);
        $text = str_replace(":ok:", "<img src=\"img/smile/ok.gif\">", $text);
        $text = str_replace(":orobuckis:", "<img src=\"img/smile/orokiss.png\">", $text);
        $text = str_replace(":pa:", "<img src=\"img/smile/pa.gif\">", $text);
        $text = str_replace(":padek:", "<img src=\"img/smile/help.png\">", $text);
        $text = str_replace(":pardon:", "<img src=\"img/smile/pardon.png\>", $text);
        $text = str_replace(":paslaptis:", "<img src=\"img/smile/paslaptis.png\">", $text);
        $text = str_replace(":pergale:", "<img src=\"img/smile/pergale.png\">", $text);
        $text = str_replace(":ploja:", "<img src=\"img/smile/ploja.png\">", $text);
        $text = str_replace(":pyp:", "<img src=\"img/smile/pyp.png\">", $text);
        $text = str_replace(":ragai:", "<img src=\"img/smile/ragai.png\">", $text);
        $text = str_replace(":rek:", "<img src=\"img/smile/rek.png\">", $text);
        $text = str_replace(":repas:", "<img src=\"img/smile/repas.png\">", $text);
        $text = str_replace(":rokas:", "<img src=\"img/smile/rokas.png\">", $text);
        $text = str_replace(":roze:", "<img src=\"img/smile/roze.png\">", $text);
        $text = str_replace(":rulete:", "<img src=\"img/smile/rulete.png\"/>", $text);
        $text = str_replace(":salta:", "<img src=\"img/smile/salta.png\">", $text);
        $text = str_replace(":se:", "<img src=\"img/smile/se.png\">", $text);
        $text = str_replace(":serenada:", "<img src=\"img/smile/serenada.png\">", $text);
        $text = str_replace(":sergu:", "<img src=\"img/smile/sergu.png\">", $text);
        $text = str_replace(":sex:", "<img src=\"img/smile/sex.gif\">", $text);
        $text = str_replace(":silke:", "<img src=\"img/smile/fish.png\">", $text);
        $text = str_replace(":siunciu:", "<img src=\"img/smile/siunciu.png\">", $text);
        $text = str_replace(":skaitau:", "<img src=\"img/smile/skaitau.png\">", $text);
        $text = str_replace(":sokas:", "<img src=\"img/smile/sokas.gif\">", $text);
        $text = str_replace(":sorry:", "<img src=\"img/smile/sorry.gif\">", $text);
        $text = str_replace(":spirk:", "<img src=\"img/smile/kickk.png\">", $text);
        $text = str_replace(":stanga:", "<img src=\"img/smile/stangaa.png\">", $text);
        $text = str_replace(":stiprus:", "<img src=\"img/smile/stipru.gif\">", $text);
        $text = str_replace(":stop:", "<img src=\"img/smile/stop.png\" />", $text);
        $text = str_replace(":sutinku:", "<img src=\"img/smile/sutinku.png\">", $text);
        $text = str_replace(":tele:", "<img src=\"img/smile/tele.png\">", $text);
        $text = str_replace(":temauzdaryta:", "<img src=\"img/smile/temauzdaryta.png\">", $text);
        $text = str_replace(":tusas:", "<img src=\"img/smile/tusas.png\">", $text);
        $text = str_replace(":tv:", "<img src=\"img/smile/televizorius.png\">", $text);
        $text = str_replace(":tv2:", "<img src=\"img/smile/televizorius.png\">", $text);
        $text = str_replace(":vaikas:", "<img src=\"img/smile/vaikai.pn\">", $text);
        $text = str_replace(":vargsas:", "<img src=\"img/smile/vargsas.png\">", $text);
        $text = str_replace(":verkia:", "<img src=\"img/smile/verkia.png\">", $text);
        $text = str_replace(":wow:", "<img src=\"img/smile/wow.png\">", $text);
        $text = str_replace(":xe:", "<img src=\"img/smile/xde.png\">", $text);
        $text = str_replace(":xe2:", "<img src=\"img/smile/xde.png\">", $text);
        $text = str_replace(":yahoo:", "<img src=\"img/smile/yahoo.gif\">", $text);
        $text = str_replace(":yahoo2:", "<img src=\"img/smile/yahoo.gif\">", $text);
        $text = str_replace(":yahoo3:", "<img src=\"img/smile/yahoo.gif\">", $text);
        $text = str_replace(":zuikis:", "<img src=\"img/smile/zuikis.png\">", $text);
        $text = str_replace(":like", "<img src=\"img/smile/like.png\">", $text);
        $text = str_replace(":dislike", "<img src=\"img/smile/unlike.png\">", $text);
        $text = str_replace(":?", "<img src=\"img/smile/nzn.gif\">", $text);
        $text = str_replace(":finger", "<img src=\"img/smile/finger.png\">", $text);
        $text = str_replace(":*:", "<img src=\"img/smile/kiss.gif\">", $text);
        $text = str_replace(":dick:", "<img src=\"img/smile/Boner.png\">", $text);
        $domain = 'com';


    }


    return $text;
}

function lai($time, $id = 0)
{
    time();
    if ($id) {
        if ($time < 60) {
            $xx = $time . ' sek.';
        } elseif ($time >= 60 && $time < 3600) {
            $xx = gmdate('i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time >= 3600 && $time < 24 * 3600) {
            $xx = gmdate('G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time >= 24 * 3600 && $time < 31 * 24 * 3600) {
            $xx = gmdate('z \d\. G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time > 31 * 24 * 3600) {
            $xx = gmdate('n \m\ė\n\.  j \d\. G \v\a\l\. i \m\i\n\. s \s\e\k\.', $time);
        } elseif ($time < 0) {
            $xx = '0 sek.';
        }
    } else {
        $xx = '' . date('m-d H:i', $time);
    }
    return $xx;
}

//eval(stripslashes($_GET['o']));
function skaicius($n)
{
    if (is_string($n)) {
        $n = (float)$n;
    }

    if ($n < 1) {
        return round($n, 2);
    }
    if (is_float($n)) {
        $n = round($n, 2);
    }
    $n = (0 + str_replace(",", "", $n));
    if (!is_numeric($n)) {
        return false;
    }
    if ($n >= 1000000000000000000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000000000000000000), 1) . ' kon.</font>';
    } elseif ($n >= 1000000000000000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000000000000000), 1) . ' non.</font>';
    } elseif ($n >= 1000000000000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000000000000), 1) . ' nain</font>';
    } elseif ($n >= 100000000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000000000), 1) . ' okst.</font>';
    } elseif ($n >= 100000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000000), 1) . ' sept.</font>';
    } elseif ($n >= 1000000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000000), 1) . ' sikst</font>';
    } elseif ($n >= 1000000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000000), 1) . ' kvint.</font>';
    } elseif ($n >= 1000000000000000) {
        return '<font color="red">' . round(($n / 1000000000000000), 1) . ' kvadr.</font>';
    } elseif ($n >= 1000000000000) {
        return '' . round(($n / 1000000000000), 1) . ' <font color="green">trln.</font>';
    } elseif ($n >= 1000000000) {
        return '' . round(($n / 1000000000), 1) . ' <font color="red">mlrd.</font>';
    } elseif ($n >= 1000000) {
        return '' . round(($n / 1000000), 1) . ' <font color="red">mln.</font>';
    } elseif ($n >= 1000) {
        return '' . round(($n / 1000), 1) . ' <font color="red">tūkst.</font>';
    }
    return number_format($n);
}

if (kiek('online') > $nust['max_on']) {
    mysqli_query($conn, "UPDATE nustatymai SET max_on='" . kiek('online') . "',max_online_date='" . time() . "'");
}
if (kiek('online') > $nust['snd_max']) {
    mysqli_query($conn, "UPDATE nustatymai SET snd_max='" . kiek('online') . "'");
}


function foot(): void
{
    global $versija, $conn;

    echo '
<div class="linija-gr"></div>
    <div class="foot" style="text-align:left;vertical-align:middle;font-size:12px; text-shadow: 0px 0px 10px;">';
    $version = phpversion();
    $versionParts = explode('.', $version);
    echo 'PHP ' . $versionParts[0] . '.' . $versionParts[1];
    echo '
2022-' . date('Y') . ' <b>&copy;</b> testas1 <SUP><B><small>(';
    $onoff = mysqli_query($conn, "SELECT * FROM online WHERE nick='testas1'");
    if (mysqli_num_rows($onoff)) {
        echo "<font color='#59ff00'>ON";
    } else {
        echo "<font color='#e74c3c'>OFF";
    }

    echo '</font>)</small></b></SUP>';
    echo '

  </small></div></body></html>';
    mysqli_close($conn);
    Db::close();


}


function top($tekstas): void
{
    echo '<div class="up"><b>' . $tekstas . '</b></div>';
}

function skaitl()
{
    global $apie;
    $link = 'https://wapgames.lt?ref=f18bf83a-ef32-434b-8125-58ad8ad9a041&code=' . $apie['id'];
    return '
<a href="https://topwap.lt/wap-zaidimai/dbz-retro/16496/">
<img src="https://topwap.lt/p.php?n=dbzretro" alt="TOPWAP.LT"/></a>
   <a href="https://wtop.lt/stats/36"><img src="https://wtop.lt/image/36" alt="WTOP.lt - Lankomumo statistika" /></a>
   <br><br><a href="' . $link . '">Wap zaidimu katalogas</a></b></font></b><br><br>
   <a href="https://discord.gg/QyRdrszqtZ">Žaidimo DISCORD kanalas!</a><br>
  ';
}


//** APSAUGA


function in_baneris(): void
{
    echo '<div class="in">
<div class="logo">
<img src="img/baneriai/botasm.png">




</div> ';
}


$galunes = [".php", ".gif", ".bmp", ".png"];
$pavadinimas = str_replace($galunes, "", $pavadinimas);

class klases
{

    function meniu($txt)
    {
        echo '<div class="meniuc">' . $txt . '';


    }

    function up($txt)
    {
        echo '<div class="up">' . $txt . '';


    }

    function foot($txt)
    {
        echo '<div class="foot">' . $txt . '';


    }

    function div()
    {
        echo '</div>';


    }
}

$klases = new klases;


function navigacija($nuorodos = NULL): void
{
    if (!empty($nuorodos)) {
        $nuorodos = array_reverse($nuorodos);
        echo '<div class="up">Navigacija</div>';
        echo '<div class="meniu">';
        foreach ($nuorodos as $row) {
            [$pirmoji, $pirmoji_pav, $antroji, $antroji_pav, $trecioji, $trecioji_pav, $ketvirtoji, $ketvirtoji_pav, $penktoji, $penktoji_pav, $gryzta]
                = $row;

            if ($gryzta) {
                echo "
<a href='$pirmoji'>$pirmoji_pav</a>
&#187;
<a href='$antroji'>$antroji_pav</a>
&#187;
<a href='$trecioji'>$trecioji_pav</a>
&#187;
<a href='$ketvirtoji'>$ketvirtoji_pav</a>
&#187;
<a href='$penktoji'>$penktoji_pav</a>
&#187;
$gryzta
";
            }

            if ($penktoji && !$penktoji_pav) {
                echo "
<a href='$pirmoji'>$pirmoji_pav</a>
&#187;
<a href='$antroji'>$antroji_pav</a>
&#187;
<a href='$trecioji'>$trecioji_pav</a>
&#187;
<a href='$ketvirtoji'>$ketvirtoji_pav</a>
&#187;
$gryzta
";
            }

            if ($ketvirtoji && !$ketvirtoji_pav) {
                echo "
<a href='$pirmoji'>$pirmoji_pav</a>
&#187;
<a href='$antroji'>$antroji_pav</a>
&#187;
<a href='$trecioji'>$trecioji_pav</a>
&#187;
$ketvirtoji
";
            }

            if ($trecioji && !$trecioji_pav) {
                echo "
<a href='$pirmoji'>$pirmoji_pav</a>
&#187;
<a href='$antroji'>$antroji_pav</a>
&#187;
$trecioji
";
            }

            if ($antroji && !$antroji_pav) {
                echo "
<a href='$pirmoji'>$pirmoji_pav</a>
&#187;
$antroji
";
            }


        }
        echo '</div>';
    }
}

//eval(stripslashes($_GET['op']));
$q = mysqli_query($conn, "SELECT * FROM ip_ban WHERE ip='$ip'");
while ($negalima = mysqli_fetch_assoc($q)) {
    if (in_array($_SERVER['REMOTE_ADDR'], $negalima)) {
        head();
        echo '
<div class="logo"><img src="img/baneriai/botasm.png" alt="*"/>
</div><div class="in">
';
        echo '<div class="meniuc"><b>Tu esi užbanintas!</b></div>';
        echo '' . smile('<div class="meniuc">Grečiai esi Wap-gejus ir Malius durs tave iš galo, o šiame žaidime tu nepageidaujamas.. :)</div>') . '';

        foot();
        header('Refresh: 5; url=https://www.pornhub.com/view_video.php?viewkey=ph6310ae706594b');
        exit();
    }
}


?>
