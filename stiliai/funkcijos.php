<?php
include_once 'sql.php' ;
$_COOKIE['vardas'] = htmlentities((string) $_COOKIE['vardas'], ENT_QUOTES);
$_COOKIE['pass'] = htmlentities((string) $_COOKIE['pass'], ENT_QUOTES);
$cookis = $_COOKIE['vardas'] ?? null;
$nick = $cookis;
$cookis2 = $_COOKIE['pass'] ?? null;
$pass = $cookis2;  
$nust = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai"));
$suma = mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'");
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
if(empty($inf['topic'])) $topic = 'Sveikas <b>'.$nick.'</b> sėkmės žaidime :) !'; else $topic = $inf['topic'];
$are = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena"));
$i =mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena !='Atmesta'"));
$ii = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pasiulymai WHERE busena ='Neperžiūrėtas'"));
$nars = $_SERVER['HTTP_USER_AGENT'];
$ip = $_SERVER['REMOTE_ADDR'];
$zaidejai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
$dievas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dievas WHERE nick='$nick'"));
$mano_online = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
$pm_lygis = 100;
$xaz = $apie['rodymas'];
$top = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop ORDER BY vksm DESC LIMIT 1"));
$dts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop ORDER BY vksm"));
$apie = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
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
$gynyba = round($apie['gynyba']);
$gyvybes = round($apie['gyvybes']);
$max_gyvybes = round($apie['max_gyvybes']);
$exp = $apie['exp'];
$kskill = $apie['kovu skill'];
$expl = $apie['expl'];
$lygis = $apie['lygis'];
$taskai = $apie['taskai'];
$auto = $apie['auto'];
$regis = $nx['reg'];
$autos = $apie['auto2'];
$medkirtyste = $apie['medkirtyste'];
$giras = $apie['giras'];

$asd = $apie['jega'];
$asd2 = $apie['gynyba'];

$statusas = $apie['statusas'];
$viso_pm = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick'"));
$new_pm = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pms WHERE gavejas='$nick' AND nauj='NEW' "));
$sys = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pm WHERE gavejas='$nick' AND nauj='NEW' "));


if($apie[\ENERGY_TIME]-time() < 0){	
$en = time()+1800000;
	mysqli_query($conn,"UPDATE zaidejai SET energy='$apie[energy_max]', energy_time='$en' WHERE nick='$nick'");
}

if(empty($apie[\COLOR])){
	
	mysqli_query($conn,"UPDATE zaidejai SET color='black' WHERE nick='$nick'");
}



function head2(){
global $nust, $css, $new_pm, $viso_pm, $fusion, $apie_kita, $taskai,$user;
echo'<?xml version="1.0" encoding="UTF-8"?>
 <!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="verify-webtopay" content="a70b267693e07e989a7e7dcbf34ba18f">
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Cache-Control" content="no-cache"/>
<title>Drakonu Kovos!</title>
<link rel="shortcut icon" href="imgs/ico.ico" type="image/x-icon"/>
<link href="stiliai/4.css" rel="stylesheet" type="text/css"/>
</head>

';

if(empty($user[\SNOW])){
	echo"

    <script type='text/javascript' src='snow.js'></script>
    

	
	  

	
	";
}
}


if(empty($cookis) or empty($cookis2) OR mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick' AND pass='$pass'")) == 0){
head();
echo '
<div class="up">
<img src="/img/baneriai/botasm.png" /></div>
<div class="meniuc">Priežastys:</div>
<div class="meniu">1.Neteisingi duomenys!<br/>2 Baigėsi prisijungimo laikas.</br>3.Šis žaidėjas neregistruotas.</div>
<div class="meniuc"><a href="index.php">Į Pradžią</a></div>';
 foot();
exit;
}
 $taimas = time();
mysqli_query($conn,"DELETE FROM block WHERE time < '".time()."'");
 mysqli_query($conn,"DELETE FROM block WHERE laikas < $taimas");
		
	

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM block WHERE nick='$nick'")) > 0){
    head2();
    $ban_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM block WHERE nick='$nick'"));
    

echo'
<div class="up">
<img src="/img/baneriai/botasm.png" /></div>';

    echo '<div class="meniuc"><b>Tu esi užbanintas!</b></div>';
    echo '<div class="meniu">
    <b>[&#8226;]</b> Tu <b>'.statusas($ban_inf['nick']).'</b> esi užbanintas!<br />
    <b>[&#8226;]</b> Priežastis: <b>'.$ban_inf['uz'].'</b><br />
    <b>[&#8226;]</b> Atbanintas būsi už: <b>'.laikas($ban_inf['time']-time(),1).'</b><br />
    <b>[&#8226;]</b> Užbanino: <b><font color="red">'.kas_toks($ban_inf['kas_ban']).' '.statusas($ban_inf['kas_ban']).'</b><br /></font>
    </div>';
   foot();
    exit;
}
if($user[\DEVINE]-time() >0){
   head();
    
echo'
<div class="up">
<img src="/img/baneriai/botasm.png" /></div>';

    echo '<div class="meniuc"><img src="img/karinas.png"></br><b>Išgėrei dieviškojo vandens, negali žaisti!</b></div>';
    echo '<div class="meniuc">
   Žaisti galėsi už <b>'.laikas($user['devine']-time(),1).'</b><br />
   
    </div>';

   foot();
    exit;
}
function pm(){
global $nust, $css, $new_pm, $viso_pm, $fusion, $apie_kita, $taskai, $sys;


if($new_pm > 0){
    echo ' <div class="meniuc"><img src="img/pm.gif"> <a href="pm.php?id=gautos_all">Turite <b>'.$new_pm.'</b> neperskaitytų žinučių</a></div>';
}
if($taskai > 0){
    echo ' <div class="meniuc"><a href="pagrindinis.php?id=taskai">Turite <b>'.sk($taskai).'</b> nepanaudotų lygio taškų</a></div>';
}
if($fusion['kas_kviecia'] !== ''){
    echo '<div class="meniuc"><b> Su tavim nori susijungti '.$fusion['kas_kviecia'].' </b><br/>
    <a href="skill.php?id=priimti&ID='.$fusion['kas_kviecia'].'">Priimti</a> | <a href="skill.php?id=atmesti&ID='.$fusion['kas_kviecia'].'">Atmesti</a> 
    </div>';
}
if($sys > 0){
    echo ' <div class="meniuc"><img src="img/write.png"> <a href="pm.php?id=sys">Turite naujų sisteminių žinučių</a></div>';
}

}
function new_pm($x){
($x > 0) ? $rez = '<font color="red">+'.$x.'</font>' : $rez = $x;
return $rez;
}






function ar_on($nick, $id = 0){
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

function minichat($nick, $id = 0){
    $info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pokalbiai WHERE nick='$nick'"));

    
    if($id == 1){
        $rez = laikas(time()-$info['time_on'], 1);
    }
return $rez;
}


function kiek_time_on($nick){
    $n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
    return $n['time_on'];
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
$n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
if(apsas($nick) == apsas('jomajo')){

$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>卐'.nuspalvinti($nick).'</b></span>';

}



elseif($n['statusas'] == 'Admin'){

$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>@'.$nick.'</b></span>';

}


elseif($n['statusas'] == 'Mod'){
$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>*'.$nick.'</b></span>';

}
elseif($n['statusas'] == 'vmod'){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['shadow'].';"><img src="img/med.png">!'.$nick.'</span>';
}
elseif($n['statusas'] == 'Mod2'){
$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>+'.$nick.'</b></span>';

}
elseif($n['statusas'] == 'Mod3'){
$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>#'.$nick.'</b></span>';

}

elseif($n['statusas'] == 'Mod4'){

$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b>&'.$nick.'</b></span>';

}elseif(apsas($nick) == apsas('test')){

$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b><smalll>evil</small>&ava</b></span>';

}

elseif(apsas($nick) == apsas('SISTEMA')){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['color'].';"><font color="blue">SISTEMA</font></span>';
}
elseif(apsas($nick) == apsas('Snekute')){
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['color'].';"><font color="pink">Snekute:*</font></span>';
}
elseif($n['vip'] > time()){

$xx = '<span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['shadow'].'"><b><img src="img/star.png">'.$nick.'</b></span>';

}
else{
$xx = '<span style="color:'.$n['color'].'; text-shadow: 0px 0px 10px '.$n['shadow'].';"><b>'.$nick.'</b></span>';
}
return $xx;
}
function kas_toks($nick){
    $n = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if($n['statusas'] == "Admin"){ $xxx = 'Administratorius'; }
    return $xxx;
}
$tm = time()+ 60*60*2;
$timx = time()+320;
function online($vt){
global $nick, $nars, $ip, $timx, $tm;
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'")) < 1){
mysqli_query($conn,"INSERT INTO online SET nick='$nick', vieta='$vt', nrs='$nars', ip='$ip', time='$timx', time_on='".time()."', gausite='$tm'")or die(mysqli_error());

}else{
mysqli_query($conn,"UPDATE online SET vieta='$vt', time='$timx' WHERE nick='$nick'");
}
}
mysqli_query($conn,"DELETE FROM online WHERE time < '".time()."'");


mysqli_query($conn,"UPDATE zaidejai SET last='".time()."' WHERE  nick='$nick'") or die(mysqli_error());
$tm = time()+ 60*60*2;
$sele = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$sele[nick]'")) > 0){

if($sele[\GAUSITE] < time()){
	mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'20', sms_litai=sms_litai+'0.1' WHERE nick='$sele[nick]'")or die(mysqli_error())	;
	 mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Išbuvote prisijunges 2 valandas, gaunate 20 kreditu bei 0,1 lito', time='".time()."', gavejas='$sele[nick]', nauj='NEW'")or die(mysqli_error())	;
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

function dropas(){
    global $giras, $ico, $nick, $mano_online;

 if(random_int(1,200) == 97){  

echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Radai: 1 Microshemą!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Microshem=Microshem + '1' WHERE nick='$nick'");
    }
    elseif(random_int(1,200) == 76){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />  <b>Radai: 1 Fusion fail!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail + '1' WHERE nick='$nick'");
    }
    elseif(random_int(1,200) == 72){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />   <b>Radai: 1 Sayian Tail!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail + '1' WHERE nick='$nick'");
    }
    elseif(random_int(1,200) == 56){
        echo '<div class="meniuc">
 <img src="img/bicons/green.png" />   <b>Radai: 1 Stone!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Stone=Stone + '1' WHERE nick='$nick'");
    }
    elseif(random_int(1,200) == 200){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />    <b>Radai: 1 Soul!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Soul=Soul + '1' WHERE nick='$nick'");
    } //
    elseif(random_int(1,200) == 18){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" /> <b>Radai: 1 Energy  Stone!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Energystone=Energystone + '1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,200) == 69){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />  <b>Radai: 1 Pragaro vaisių!</b><br/></div>';
        mysqli_query($conn,"UPDATE inv SET Pragarovaisius=Pragarovaisius + '1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,200) == 77){
        echo ' <div class="meniuc">
<img src="img/bicons/green.png" />  <b>Radai: 1 Majin Sroll!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Majinsroll=Majinsroll + '1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,200) == 33){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />  <b>Radai: 1 Gold Stone!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Goldstone=Goldstone + '1' WHERE nick='$nick'");
    } 
    elseif(random_int(1,200) == 34){
        echo '<div class="meniuc">
 <img src="img/bicons/green.png" />   <b>Radai: 1 Magic Ball!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Magicball=Magicball + '1' WHERE nick='$nick'");
        } 
    elseif(random_int(1,200) == 100){
        echo ' <div class="meniuc">
<img src="img/bicons/green.png" />  <b>Radai: Išbarstyta rutulį!</b><br/></div>';
        mysqli_query($conn,"UPDATE isbarstyta SET turima=turima +'1' WHERE nick='$nick'");
        mysqli_query($conn,"UPDATE nustatymai SET balls=balls+'1'");
    } 
    
     elseif(random_int(1,200) == 14){
        echo '<div class="meniuc">
<img src="img/bicons/green.png" />   <b>Radai: 1 Power stone!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv SET Powerstone=Powerstone + '1' WHERE nick='$nick'");
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

$query = mysqli_query($conn,"SELECT * FROM dtop WHERE nick != '".$nust[\LAST]."' ORDER BY vksm DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $iii++;
    if($iii == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$prizas."</b> pinigu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO dtop_log SET nick='$row[nick]',laimejo='$prizas', veiksmai='$row[$vksm]', laikas='".time()."' ")or die(mysqli_error());
	    mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$prizas', sms_litai=sms_litai+'$ltl' WHERE nick='$row[nick]'")or die(mysqli_error());
   mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='1', uz='1vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
  mysqli_query($conn,"UPDATE nustatymai SET last='$row[nick]'");
    }
    if($iii == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$prizas2."</b> pinigu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$prizas2' WHERE nick='$row[nick]'")or die(mysqli_error());
         mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='2', uz='2vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
    }
    if($iii == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus dienos tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$prizas3."</b> pinigu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$prizas3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='3', uz='3vt. veiksmų tope', laikas='".time()."' ")or die(mysqli_error());
    
}}
$naujas_p = mt_rand(1000000,9000000);
$naujas_ltl = random_int(1,5);
$laikas = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET dtop_priz='$naujas_p', dtop_date='$laikas', dtop_ltl='$naujas_ltl' ")or die(mysqli_error());
$diena = random_int(1,4);
mysqli_query($conn,"UPDATE nustatymai SET snd_max='0', diena='$diena'");
mysqli_query($conn,"TRUNCATE TABLE dtop");

}


///////////// sms topas
$laik = date("Y-m-d");
if($laik != $nust['sms_date']){
$priz = $nust['sms_priz'];
$priz2 = round($nust['sms_priz']/2);
$priz3 = round($nust['sms_priz']/3);


$query = mysqli_query($conn,"SELECT * FROM sms_top ORDER BY sms DESC LIMIT 3");
while($row = mysqli_fetch_assoc($query)){
    $nr++;
    if($nr == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>1</b>-ą vietą!! :) Laimėjai <b>".$priz."</b> litu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='4', uz='1vt. sms tope', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz' WHERE nick='$row[nick]'")or die(mysqli_error());
	   mysqli_query($conn,"INSERT INTO smstop_log SET nick='$row[nick]',laimejo='$priz', laikas='".time()."' ")or die(mysqli_error());
    }
    if($nr == 2){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>2</b>-ą vietą!! :) Laimėjai <b>".$priz2."</b> litu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz2' WHERE nick='$row[nick]'")or die(mysqli_error());
   mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='5', uz='2vt. sms tope', laikas='".time()."' ");
    }
    if($nr == 3){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus sms tope <b>3</b>-ą vietą!! :) Laimėjai <b>".$priz3."</b> litu.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$priz3' WHERE nick='$row[nick]'")or die(mysqli_error());
		 mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='6', uz='3vt. sms tope', laikas='".time()."' ");
    }

$naujas_pr = mt_rand(5,15);
$laikasz = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET sms_priz='$naujas_pr', sms_date='$laikasz' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE sms_top");
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
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu laimėjus loterija. Laimėjai <b>".$prize."</b> Litų.', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
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
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, surinkai daugiausiai išbarstytų rutulių gauni 5 litus', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
       mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='8', uz='Surinko daugiausiai išbarstytų rutulių', laikas='".time()."' ");
	    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'5' WHERE nick='$row[nick]'")or die(mysqli_error());
    }
   


$laix = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET isbar_time='$laix' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE isbarstyta");
}}



$taimasx = date("Y-m-d");
if($taimasx != $nust['atvedimu_time']){




$query = mysqli_query($conn,"SELECT * FROM atvedimas ORDER BY snd DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $xm++;
    if($xm == 1){
       mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, atvedei daugiausiai lankytoju gauni 5 litus', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
      
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
$vt++;

if($vt == 1){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+4 WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Hi, savaitės kovų TOPe užėmiai pirmą vietą ir gavai <b>4</b> Litus. :)', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
mysqli_query($conn,"INSERT INTO medaliai SET nick='$row[nick]', medalis='10', uz='Laimėtą savaitės veiksmų topą', laikas='".time()."' ");
}
if($vt == 2){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+3 WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Hi, savaitės kovų TOPe užėmiai antrą vietą ir gavai <b>3</b> Litų. :)', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
} 
if($vt == 3){
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+2 WHERE nick='$row[nick]'");
mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Hi, savaitės kovų TOPe užėmiai trečią vietą ir gavai <b>2</b> Litų. :)', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
}

}     

$time=time()+60*60*24*7;
mysqli_query($conn,"UPDATE nustatymai SET savaites_topas_liko = '$time'");
mysqli_query($conn,"TRUNCATE TABLE s_top");

}


//fight machine


$ho = date("Y-m-d");
if($ho != $nust['m_time']){

$l = random_int(1,5);


$query = mysqli_query($conn,"SELECT * FROM machine ORDER BY smugis DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $go++;
    if($go == 1){
        mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Sveikinu, ikirtai didžiausią smugi gauni $l litų', time='".time()."', gavejas='$row[nick]', nauj='NEW'")or die(mysqli_error());
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

if($apie['kmisijos'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET kmisijos='1' WHERE nick='$nick' ");
}
if($apie['rinkimas'] == 0){
    mysqli_query($conn,"UPDATE zaidejai SET rinkimas='1' WHERE nick='$nick' ");
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
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO susijungimas SET nick='$nick' ");
}
if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM isbarstyta WHERE nick='$nick' "))){
    mysqli_query($conn,"INSERT INTO isbarstyta SET nick='$nick' ");
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
<img src="/img/baneriai/botasm.png" /></div>';


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




   

   
  


 function topbar(){
 global $user;

if($user['greitas'] == '-'){ 
}
else {
echo'<div class="meniuc"><div class="topbar"><a href="pagrindinis.php?id=">Pradžią</a> <a href="pm.php?id=">PM</a> <a href="meniu.php?id=">Meniu</a> <a href="miestas.php?id=">Miestas</a> </div></div>';
}
	 
	echo' '.pm().'';



}

 
 function baneris(){

echo'
<div class="in">
<div class="logo">

<img src="/img/baneriai/botasm.png">



</div>';}
 
$ipx = $_SERVER['REMOTE_ADDR'];
if(empty($apie['ip']) && $nick != 'Jomajo'){
mysqli_query($conn,"UPDATE zaidejai SET ip='$ipx' WHERE nick='$nick'");
}
elseif($nick == 'Jomajo'){
	mysqli_query($conn,"UPDATE zaidejai SET ip='Paslaptis' WHERE nick='$nick'");
	}else{
if($apie['ip'] != $_SERVER['REMOTE_ADDR']);
mysqli_query($conn,"UPDATE zaidejai SET ip='$ipx' WHERE nick='$nick'");
}



   

$komandoj = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));	
if($user['team'] != '' AND $user['iki_algos'] < 1 AND $komandoj['pinigai'] >= $komandoj['uz_500_kovu']){
	if($komandoj[\VADAS] != $nick){
	$gausiu_pinigu = $apie[\LITAI]+$komandoj['uz_500_kovu'];
	mysqli_query($conn,"UPDATE zaidejai SET litai='$gausiu_pinigu' WHERE nick='".$nick."'") or die(mysqli_error());

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'0.1' WHERE nick='$komandoj[vadas]'");
	$zinute1 = ''.$nick.' atliko 2000 kovų, vadas gauna 0.1 lito į saskaitą';
	mysqli_query($conn,"INSERT INTO team_logas SET team='$user[team]', msg='$zinute1'") or die(mysqli_error());
	$zinute = "Gavote ".$komandoj['uz_500_kovu']." pinigų iš komandos iždo, nes laimėjote 2000 kovų";
    $pinigu_is_team = $komandoj['pinigai']-$komandoj['uz_500_kovu'];
	mysqli_query($conn,"UPDATE team SET pinigai='$pinigu_is_team' WHERE pavadinimas='".$user['team']."'");

	mysqli_query($conn,"INSERT INTO pm SET gavejas='$nick', what='SISTEMA', txt='$zinute', time='".time()."' ,nauj='NEW'") or die(mysqli_error());
	}
	mysqli_query($conn,"UPDATE user SET iki_algos='2000' WHERE nick='".$nick."'") or die(mysqli_error());
}

if(empty($apie[\PTS])){
	
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

if($apie[\SMS_LITAI] >= 10000){mysqli_query($conn,"UPDATE tikslas SET tikslas1='+' WHERE nick='$nick'");}
if($apie[\LYGIS] >= 100){mysqli_query($conn,"UPDATE tikslas SET tikslas5='+' WHERE nick='$nick'");}
if($apie[\CHATE] >= 500){mysqli_query($conn,"UPDATE tikslas SET tikslas9='+' WHERE nick='$nick'");}
if($apie[\VEIKSMAI] >= 1000000){mysqli_query($conn,"UPDATE tikslas SET tikslas6='+' WHERE nick='$nick'");}
if($inv[\NBALL] >=100){mysqli_query($conn,"UPDATE tikslas SET tikslas2='+' WHERE nick='$nick'");}
if($inv[\JBALL] >=150){mysqli_query($conn,"UPDATE tikslas SET tikslas3='+' WHERE nick='$nick'");}	
if($inv[\DBALL] >=300){mysqli_query($conn,"UPDATE tikslas SET tikslas4='+' WHERE nick='$nick'");}
if($apie[\LAIMETA] >= 300){mysqli_query($conn,"UPDATE tikslas SET tikslas7='+' WHERE nick='$nick'");}

function nar($nick){
	  $infoo = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$nick'"));
	  
			if(preg_match("/Opera mini/i", "$infoo[nrs]")){
	$browser = 'Opera mini';		}
			elseif(preg_match("/Android/i", "$infoo[nrs]")){
	$browser = 'Android';	}
			elseif(preg_match("/UCWEB/i", "$infoo[nrs]")){
	$browser = 'UCBrowser';	}
			elseif(preg_match("/Mozilla/i", "$infoo[nrs]")){
	$browser = 'Mozilla';}
			elseif(preg_match("/Huawei/i", "$infoo[nrs]")){
	$browser = 'Huawei';}
		elseif(preg_match("/Nokia/i", "$infoo[nrs]")){
	$browser = 'Nokia';}
		elseif(preg_match("/Samsung/i", "$infoo[nrs]")){
	$browser = 'Samsung';}
		elseif(preg_match("/Opera/i", "$infoo[nrs]")){
	$browser = 'Opera';}
		elseif(preg_match("/Symbian/i", "$infoo[nrs]")){
	$browser = 'Symbian';}
			return $browser;
}

if($nust[\TEAM_ISMOKEJIMAS] < time() AND (!empty($user[\TEAM]))){
	
	mysqli_query($conn,"UPDATE zaidejai SET kred = kred+'10' WHERE team = '$user[nick]'");
		$zinute ='Kadangi esi '.$user[\TEAM].' narys gauni 10 kreditų';
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
    echo ''.smile('<div class="meniuc">Ate, ate dūcheli:) pagarbiai Jomajo</div>').'';
	
   foot();
   
   exit();}}






############### turgus $$$$$$$$$$$$$$$$$$$$$
$prek_inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turgus"));
	if($prek_inf['laikas'] < time()){
		if($prek_inf['kaina'] == \SMS_LITAI){
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'$prek_inf[kiek]' WHERE nick='$prek_inf[nick]'")or die(mysqli_error());
		
	$zinute = "Per 5 valandas tavo prek&#279;s turguje niekas nenupirko, tad tau jin gra&#382;inama. ";
		mysqli_query($conn,"INSERT INTO pm SET gavejas='$prek_inf[nick]', what='SISTEMA', txt='$zinute', time='".time()."', nauj='NEW'");
		mysqli_query($conn,"DELETE FROM turgus WHERE id='$prek_inf[id]'");
	}}
	
	

if($apie[\ARMOR] == 'Vedzito sarvai'){$armoras = 3000;}else{$armoras=0;}
if($apie[\SWORD] == 'Trankso kardas'){$swordas = 1000;}else{$swordas=0;}
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

if ($apie['veikejas'] == "jiren"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+500";
$procentas2 = "+500";
$procentas3 = "+500";}

if ($apie['veikejas'] == "goldfryza"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+400";
$procentas2 = "+400";
$procentas3 = "+400";}


if ($apie['veikejas'] == "goldozarub"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+300";
$procentas2 = "+300";
$procentas3 = "+300";}
if ($apie['veikejas'] == "super17"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+250";
$procentas2 = "+250";
$procentas3 = "+250";}


if ($apie['veikejas'] == "baby"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+200";
$procentas2 = "+200";
$procentas3 = "+200";}

if ($apie['veikejas'] == "mbuu"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+170";
$procentas2 = "+170";
$procentas3 = "+170";}
if ($apie['veikejas'] == "champa"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+140";
$procentas2 = "+140";
$procentas3 = "+140";}


if ($apie['veikejas'] == "vadose"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+120";
$procentas2 = "+120";
$procentas3 = "+120";}
if ($apie['veikejas'] == "gold fryzas"){
$jegax = round($apie['jega'] * 1.00 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.00 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.00);
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}


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
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+0";
$procentas2 = "+0";
$procentas3 = "+10";}
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
$jegax = round($apie['jega'] * 1.20 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.20 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.20);
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}
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
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Ponas popas"){
$jegax = round($apie['jega'] * 2 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 2);
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Kapitonas ginis"){
$jegax = round($apie['jega'] * 1.10 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 1.10 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Pikonas"){
$jegax = round($apie['jega'] * 1.50 + $prideda_jegos + $swordas);
$gynybax = round($apie['gynyba'] * 2 + $prideda_gynybos + $armoras);
$gyvybesx = round($apie['gyvybes'] * 1.10);
$procentas1 = "+50";
$procentas2 = "+100";
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
$jegax = $apie['jega'] * 2 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 2 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 2;
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}

if ($apie['veikejas'] == "Super android 18"){
$jegax = $apie['jega'] * 3 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 3 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 3;
$procentas1 = "+3";
$procentas2 = "+3";
$procentas3 = "+3";}
if ($apie['veikejas'] == "Gold Oozuru"){
$jegax = $apie['jega'] * 2 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 2 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 2;
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Vegito"){
$jegax = $apie['jega'] * 2 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 2 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 2;
$procentas1 = "+100";
$procentas2 = "+100";
$procentas3 = "+100";}
if ($apie['veikejas'] == "Goku gods"){
$jegax = $apie['jega'] * 20 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 20 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 20;
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Super goku gods"){
$jegax = $apie['jega'] * 25 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 25 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 25;
$procentas1 = "+25";
$procentas2 = "+25";
$procentas3 = "+25";}
if ($apie['veikejas'] =="Final goku gods"){
$jegax = $apie['jega'] * 25 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 25 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 25;
$procentas1 = "+25";
$procentas2 = "+25";
$procentas3 = "+25";}
if ($apie['veikejas'] == "Wiss"){
$jegax = $apie['jega'] * 50 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 50 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 50;
$procentas1 = "+45";
$procentas2 = "+45";
$procentas3 = "+45";}
if ($apie['veikejas'] == "Evil vegeta"){
$jegax = $apie['jega'] * 50 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 50 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 50;
$procentas1 = "+50";
$procentas2 = "+50";
$procentas3 = "+50";}
if ($apie['veikejas'] == "Evil goku"){
$jegax = $apie['jega'] * 60 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 60 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 60;
$procentas1 = "+60";
$procentas2 = "+60";
$procentas3 = "+60";} 
if ($apie['veikejas'] == "Evil vegeta gods"){
$jegax = $apie['jega'] * 70 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 70 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 70;
$procentas1 = "+70";
$procentas2 = "+70";
$procentas3 = "+70";}
if ($apie['veikejas'] == "Xicor"){
$jegax = $apie['jega'] * 10 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 10 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 10;
$procentas1 = "+10";
$procentas2 = "+10";
$procentas3 = "+10";}
if ($apie['veikejas'] == "Gotenks saiyan"){
$jegax = $apie['jega'] * 5 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 5 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 5;
$procentas1 = "+5";
$procentas2 = "+5";
$procentas3 = "+5";}
if ($apie['veikejas'] == "Fusion omega cooler"){
$jegax = $apie['jega'] * 15 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 15 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 15;
$procentas1 = "+15";
$procentas2 = "+15";
$procentas3 = "+15";}
if ($apie['veikejas'] == "Evil gohan"){
$jegax = $apie['jega'] * 85 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 85 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 85;
$procentas1 = "+85";
$procentas2 = "+85";
$procentas3 = "+85";}

if ($apie['veikejas'] == "Best goku gods"){
$jegax = $apie['jega'] * 30 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 30 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 30.;
$procentas1 = "+30";
$procentas2 = "+30";
$procentas3 = "+30";}
if ($apie['veikejas'] == "Super Goku gods"){
$jegax = $apie['jega'] * 20 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 20 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 20;
$procentas1 = "+20";
$procentas2 = "+20";
$procentas3 = "+20";}
if ($apie['veikejas'] == "Vegeta gods"){
$jegax = $apie['jega'] * 15 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 15 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 15;
$procentas1 = "+15";
$procentas2 = "+15";
$procentas3 = "+15";}

if ($apie['veikejas'] == "Vegeta gods ssj3"){
$jegax = $apie['jega'] * 25 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 25 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 25;
$procentas1 = "+25";
$procentas2 = "+25";
$procentas3 = "+25";}

if ($apie['veikejas'] == "Lord bils"){
$jegax = $apie['jega'] * 40 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 40 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 40;
$procentas1 = "+40";
$procentas2 = "+40";
$procentas3 = "+40";}

if ($apie['veikejas'] == "fryza"){
$jegax = $apie['jega'] * 8 + $prideda_jegos + $swordas; 
$gynybax = $apie['gynyba'] * 8 + $prideda_gynybos + $armoras; 
$gyvybesx = $apie['gyvybes'] * 800;
$procentas1 = "+80";
$procentas2 = "+80";
$procentas3 = "+80";}


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
			if(empty($useris[\GAVOBAN]) OR $useris[\GAVOBAN] == 0){$banstatus = "&#352;iuo &#382;mogumi turbut galite pasitik&#279;ti.";}
if($useris[\GAVOBAN] == 1){$banstatus = "&#352;iuo &#382;mogumi turbut dar galite pasitik&#279;ti.";}
if($useris[\GAVOBAN] == 2){$banstatus = "&#352;is &#382;mogus nepatikimas! Venkite sandori&#371; su juo.";}
if($useris[\GAVOBAN] >= 3){$banstatus = "Venkite bendravimo ar kit&#371; ry&#353;iu su &#353;iuo &#382;mogumi! Geriausia j&#303; i&#353; viso ignoruoti.";}

if($apie[\VEIKSMAI] >= '500' AND !empty($apie[\ATVED])){
mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'500', pts=pts+'5' WHERE nick = '$apie[atved]'")or die(mysqli_error());
mysqli_query($conn,"UPDATE atv SET atv=atv+'1' WHERE nick = '$apie[atved]'")or die(mysqli_error());
$zinute = 'Jusų pakviestas žaidėjas '.$nick.' padarė 500 kovų, jūs gaunate 500 kreditų';
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
    'litai' => 'Pinigų',
    'sms_litai' => 'Eurų',
    'kred' => 'kreditų',
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

$query = mysqli_query($conn,"SELECT * FROM komandu_dtop ORDER BY laimejo_kovu DESC LIMIT 1");
while($row = mysqli_fetch_assoc($query)){
    $vtas++;
    if($vtas == 1){
      
	 
     
	    mysqli_query($conn,"UPDATE team SET pinigai=pinigai+'100000' WHERE pavadinimas='$row[team]'")or die(mysqli_error());
    
    }
   


$k_l_d = date("Y-m-d");
mysqli_query($conn,"UPDATE nustatymai SET kom_dtop='$k_l_d' ")or die(mysqli_error());
mysqli_query($conn,"TRUNCATE TABLE komandu_dtop");
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
		}
		if($nr == 8)
		{
		mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet jūs iškritote iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
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
		}
		if($nr == 6)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritote iš turnyro.', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
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
		}
		if($nr == 4)
		{
			mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
	mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritai iš turnyro', gavejas='$dal[nick]', time='".time()."', nauj='NEW' ") or die(mysqli_error());
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
			
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'1000000', sms_litai=sms_litai+'3', kred=kred+'20' WHERE nick='$dal[nick]'");
			
		}
		if($nr == 2)
		{
	mysqli_query($conn,"UPDATE user SET kovu_trn='', kiek_trn='0' WHERE nick='$dal[nick]'");
			mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='Deja bet iškritai iš turnyro', time='".time()."', nauj='NEW', gavejas='$dal[nick]' ") or die(mysqli_error());
		}
		
		mysqli_query($conn,"UPDATE turnyras SET trn_busena='0',trn_time='1'");
		unset($dal);
	}
}
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai")) > 0){
$uzas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM uzsakymai"));
if($uzas[\LAIKAS]-time() < 0){
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
//	mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$apie[litai]' WHERE nick ='$kkk[vs]'");
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

if($inv[\RADARAS] > 2){
	 mysqli_query($conn,"UPDATE inv SET radaras='2' WHERE nick='$nick'");
}

?>
