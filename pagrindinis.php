<?php

use LegacyDbz\Parties\DTO\PartyInvite;
use LegacyDbz\Parties\Repositories\PartyInvitesRepository;
use LegacyDbz\Parties\Repositories\PartyRepository;
use LegacyDbz\Players\Repositories\PlayersRepository;

ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
// wap gay protection
include_once('cfg/limit.php');


$prizas = $nust['sms_priz'];
$prizas2 = round($nust['sms_priz']) / 2;
$prizas3 = round($nust['sms_priz']) / 3;
$statusai = array("Mod", "Mod2", "Mod3", "Mod4", "Admin");
$nst = mysql_fetch_assoc(mysql_query("SELECT * FROM turnyras"));
$new = mysql_fetch_assoc(mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$xd = mysql_query("SELECT * FROM zaidejai WHERE nick= $nick");
mysql_query("DELETE FROM `pm` WHERE `time` <= UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY))");
head2();
if ($nust['new_time'] - time() > 0) {
    $q = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT 1");

    while ($row = mysql_fetch_assoc($q)) {
        echo '<div class="meniuc">Padarytas atnaujinimas: ' . $row[name] . '</div>';

        unset($row);
    }
}


baneris();
topbar();
$partyInvitesRepository = new PartyInvitesRepository();
/** @var PartyInvite|null $firstPendingInvite */
$firstPendingInvite = $partyInvitesRepository->findByIniteeIdAndStatus($apie['id'], PartyInvite::STATUS_PENDING)->first();
if ($firstPendingInvite) {
    echo '<div class="meniuc">';
    $partyRepository = new PartyRepository();
    $party = $partyRepository->findById($firstPendingInvite->partyId());
    $playerRepository = new PlayersRepository();
    $partyLeader = $playerRepository->findById($party->leaderId());
    echo 'Gavote pakvietimą į party: ' . $party->name() . ', lyderis: ' . $partyLeader->username();
    echo '<br>';
    echo '<a href="/Dungeons/view/parties/party_invites.php?id=inviteeInvites">Peržiūrėti</a>';
    echo '</div>';
}



echo '<div class="meniuc">';
echo '<a href="https://discord.gg/rHHyjVJr">Mūsų Discord</a>';
echo '</div>';

$repository = new \LegacyDbz\WorldBosses\Repositories\WorldBossRepository();
$service = new \LegacyDbz\WorldBosses\Services\WorldBossService($repository);
$boss = $service->get();
if ($boss) {
    $bossConfig = $service->getBossConfig($boss->getBossId());
    echo '<div class="meniuc">';
    echo '<a href="worldbosses/view/index.php"><font color="red">World Boss: <b>' . $bossConfig['name'] . '</b></font></a>';
    echo '</div>';
} else {
    $worldBossSpawnDate = $service->whenBossWillSpawn();
    $currentDate = new DateTime();
    $endDateObject = new DateTime($worldBossSpawnDate);
    $timeDifference = $currentDate->diff($endDateObject);
    $remainingTime = $timeDifference->format('%h h %i min %s sec');

    echo '<div class="meniuc">';
    echo '<font color="red"><b>World boss atvyks po: </b></font>' . $remainingTime;
    echo '</div>';
}

$legendaryBossRepository = new \LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository();
$legendaryBoss = $legendaryBossRepository->findAliveAndStarted();
if ($legendaryBoss) {
    $legendaryBossService = new \LegacyDbz\LegendaryBosses\Services\LegendaryBossService($legendaryBossRepository);
    $legendaryBossConfig = $legendaryBossService->getBossConfig($legendaryBoss->getBossId());
    echo '<div class="meniuc">';
    echo '<a href="LegendaryBosses/view/index.php"><font color="red">Legendary Boss: <b>' . $legendaryBossConfig['name'] . '</b></font></a>';
    echo '</div>';
    echo '<script>
             let audio = new Audio("LegendaryBosses/assets/sounds/boss_spawned.mp3");
            audio.play();
            </script>';
}


$newMissions = mysql_num_rows(mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $apie[id] AND status='new' AND DATE(created_at) = '$date'"));
if (!$newMissions) {

    echo '<div class="meniuc">';
    echo $dailypp . ' <a href="mission/daily/view/index.php?id=getMission"><font color="red"><b>Gauti dienos misiją</b></font></a>';
    echo '</div>';
}

$chests = mysql_num_rows(mysql_query("SELECT * FROM player_chest_drops WHERE player_id = '$apie[id]' AND opened_at IS NULL AND expires_at > NOW()"));
if ($chests) {

    echo '<div class="meniuc">';
    echo $chest . ' <a href="pagrindinis.php?id=chests"><font color="red"><b>Turite neatidarytų skrynių</b></font></a>';
    echo '</div>';
}


if (mysql_num_rows(mysql_query("SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == true) {
    echo "<div class='meniuc'><font color='red'>Dėmesio! Tu kviečiamas į " . $team_pakv['team'] . " komandą!</font><br>
	<a href='komanda.php?id=atmesti&ka=" . $team_pakv['team'] . "'>Atmesti</a> <a href='komanda.php?id=priimti&ka=" . $team_pakv['team'] . "'>Priimti</a>
	</div>";
}
if ($nust[moddalybos] != '+') {
    $sajanas = mysql_fetch_assoc(mysql_query("SELECT * FROM legendinis_sajanas"));
    if ($sajanas[prisikels] - time() > 0) {
        $timestamp = $sajanas[prisikels];
        $dt = new DateTime("@$timestamp");
        $timezone = new DateTimeZone('Europe/Vilnius');
        $dt->setTimezone($timezone);
        echo '<div class="meniuc">';
        echo 'Cumber prisikels: ';
        echo $dt->format('m-d H:i');
        echo '</div>';
    } else {
        echo '<div class="meniuc">';
        echo '<a href="cumber.php"><font color="red"><b>Cumber atvyko į žemę, skubėk nukauti!!!</b></font></a>';
        echo '</div>';
    }
}
$voteCount = mysql_result(mysql_query("SELECT COUNT(*) FROM bals"), 0);
if ($voteCount && mysql_num_rows(mysql_query("SELECT * FROM b_rez WHERE nick ='$nick' && bals_id ='1'")) == 0) {
    echo '<div class="meniuc">';
    echo '<a href="balsavimai.php"><b>Naujas balsavimas kuriame nebalsavai!</b></a>';
    echo '</div>';
}
if (empty($apie['vardas'])) {
    $error = '<a href="?id=keistiinf">Nusistatyk anketa</a>';
}
if (empty($apie['k_dovana'])) {

    $error = '<a href="?id=dovana"><b>Pasiimti naujoko dovaną</b></a>';

}
if (empty($apie['litis'])) {
    $error = '<a href="?id=litis">Nusistatyk lyti</a>';
}

if (empty($apie['email'])) {
    $error = '<a href="meniu.php?id=email">Nusistatyk email slaptažodžio priminimui</a>';
}
if ($apie[daily] != '+') {
    $error = '<a href="?id=daily">Pasiimk dienos prizą</a>';

}

if (isset($error)) {

    echo '<div class="meniuc">' . $error . '</div>';
}

$pakvietimai = mysql_fetch_assoc(mysql_query("SELECT * FROM pakvietimai WHERE nick='$nick'"));
if ($pakvietimai > 0 ? $pakvietimai : 0) {
    echo '<div class="meniuc">' . statusas($pakvietimai[kviecia]) . ' Kviečia i draugus !<br/>
    <a href="pagrindinis.php?id=priimti&ID=' . $pakvietimai['kviecia'] . '">Priimti</a> | <a href="pagrindinis.php?id=atmesti&ID=' . $pakvietimai['kviecia'] . '">Atmesti</a> 
  
  
  
  </div>';

}
/// team pakvietims ++
$mano_team = mysql_fetch_assoc(mysql_query("SELECT * FROM team WHERE vadas='$nick'"));
$kvietimas_i_komanda = mysql_fetch_assoc(mysql_query("SELECT * FROM prasosi_i_komanda WHERE komanda='$mano_team[pavadinimas]'"));
if ($kvietimas_i_komanda > 0) {
    echo '<div class="meniuc">' . statusas($kvietimas_i_komanda[nick]) . ' Nori i jūsų komanda<br/>
   
  	<a href="komanda.php?id=atmesti_kv&co=' . $kvietimas_i_komanda['nick'] . '"><font color="red">Atmesti</font></a> <a href="komanda.php?id=priimti_kv&co=' . $kvietimas_i_komanda[nick] . '"><font color="blue">Priimti</font></a>
  
  
  </div>';

}
if (mysql_num_rows(mysql_query("SELECT * FROM statusai WHERE kam='$nick'")) == true) {
    $st = mysql_fetch_assoc(mysql_query("SELECT * FROM statusai WHERE kam='$nick'"));

    echo '<div class="meniuc">' . statusas($st[nick]) . ' Nori pakeisti draugystės statusas į ' . $st['stats'] . '<br/>
	  
	  <a href="?id=stt_n&ka=' . $st[nick] . '&ID=' . $st[id] . '"><font color="red">Nesutinku</font></a> <a href="?id=stt_p&ka=' . $st[nick] . '&ID=' . $st[id] . '"><font color="blue">Sutinku</font></a>
	  <br/>
	
</div>	';

}

$stt = array("Admin", "Mod4", "Mod3", "Mod2", "Mod");
if (in_array($apie[statusas], $stt) && mysql_num_rows(mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='ne'")) > 0) {

    echo '<div class="meniuc"> <a href="meniu.php?id=mod&ka=ft_tikrinimas">Nauja nepatvirtinta nuotrauka</a></div>';

}

if ($user[kovu_trn] != '+' && $nst[trn_busena] == 0 && $user[rodyti_turnyra] == 1) {

    echo '<div class="meniuc"><b><font color="red">!!!</font> Registracija į turnyrą prasidėjo <font color="red">!!!</font><br/> >>> <a href="trn.php?id=reg">Registruotis</a> <<< </b></div>';
}
$sajanas = mysql_fetch_assoc(mysql_query("SELECT * FROM legendinis_sajanas"));
if ($sajanas[prisikels] - time < 0) {
    echo '<div class="meniuc"><b><a href="legendinis_sajanas.php"><font color="red">Legendinis sajanas prisikėlė</font></a></div>';
}


if ($id == "") {
    online('Pagrindiniame puslapyje');


    if ($nst['trn_busena'] == 0 and mysql_num_rows(mysql_query("SELECT * FROM user WHERE kovu_trn='+'")) < 8) {
        echo '
				  <div class="meniuc"><b>Iki turnyro pradžios trūksta <font color="red">' . (8 - mysql_num_rows(mysql_query("SELECT * FROM user WHERE kovu_trn='+'"))) . '</font> dalyvių</b><br>
<a href="trn.php?id=reg"><font color="red"><b>Registruotis į turnyrą</b></font></a>
</div>
				  ';
    } elseif ($nst['trn_busena'] == 1) {
        echo '
				  <div class="meniuc"><b>Turnyras prasidės už <font color="red">' . laikas($nst['trn_time'] - time(), 1) . '</font></b></div>
				  ';
    } elseif ($nst['trn_busena'] == 2) {
        echo '
				  <div class="meniuc"><b>Iki pirmojo turnyro etapo pabaigos liko <font color="red">' . laikas($nst['trn_time'] - time(), 1) . '</font></b></div>
				  ';
    } elseif ($nst['trn_busena'] == 3) {
        echo '
				  <div class="meniuc"><b>Iki ketvirtfinalio turnyro pabaigos liko <font color="red">' . laikas($nst['trn_time'] - time(), 1) . '</font></b></div>
				  ';
    } elseif ($nst['trn_busena'] == 4) {
        echo '
				  <div class="meniuc"><b>Iki pusfinalio turnyro pabaigos liko <font color="red">' . laikas($nst['trn_time'] - time(), 1) . '</font></b></div>
				  ';
    } elseif ($nst['trn_busena'] == 5) {
        echo '
				  <div class="meniuc"><b>Iki finalo turnyro pabaigos liko <font color="red">' . laikas($nst['trn_time'] - time(), 1) . '</font></b></div>
				  ';
    }
    if ($user['kovu_trn'] == '+') {
        echo '
		    <div class="meniuc"> Tu dalyvauji <b>Kovų turnyre!<br>Esi laimėjęs kovų: <b>' . $user['kiek_trn'] . ' kovų</b></div>
		    ';
    }

//echo' <div class="meniuc"><img src="img/imgg/botasm2.png" /></div>';


    echo '<div class="up">ADMIN pranešimas</div><div class="meniuc"><b></b><font color="RED">' . smile($nust['admin_topic']) . '</font><small><b>(' . laikas($nust['admin_time']) . '</b>)</small><br/>  (<b><a href="?id=apie&ka=' . $nust['admin_kas'] . '">' . statusas($nust['admin_kas']) . '</b>)</a><br/></div>';

    echo '<div class="up">MOD pranešimas</div><div class="meniuc"><b></b><font color="green"><b>' . smile($nust['mod_topic']) . '</b></font> <small><b>(' . laikas($nust['mod_time']) . '</b>)</small><br/>  (<b><a href="?id=apie&ka=' . $nust['mod_kas'] . '">' . statusas($nust['mod_kas']) . '</b>)</a><br/></div>';


    echo '<div class="up">Topic</div>';
    if ($nust['topic'] == "-") {

        echo '<div class="meniuc"><b>Topic rašymas išjungtas!</br></div>';

    } else {
        $q = mysql_query("SELECT * FROM topic ORDER BY id DESC LIMIT 3");

        while ($rr = mysql_fetch_assoc($q)) {
            $nr++;
            if ($apie[statusas] == 'Admin' or $apie[statusas] == 'Mod' or $apie[statusas] == 'Mod2' or $apie[statusas] == 'Mod3' or $apie[statusas] == 'Mod4') {
                $goott = '<a href="?id=exit&ka=' . $rr['id'] . '"><small>[x]</small></a>';
            }

            $dateFormat = 'm-d H:i';
            $topicDate = date($dateFormat, $rr['time']);
            echo ' <div class="meniuc">  ' . smile($rr['message']) . '(<a href="?id=apie&ka=' . $rr['kas'] . '">' . statusas($rr['kas']) . '</a>) <small>(' . $topicDate . ')' . $goott . '</small>';
            if ($rr['nick'] != $nick && $rr['nick'] != 'SISTEMA') echo ' <a href="?id=&ka=' . $rr['nick'] . '#"></a><br />'; else echo '<br /><left>';
            echo '</div>';
        }
        unset($nr);

        echo '<div class="meniuc">	<a href="pagrindinis.php?id=keisti">Keisti</a></font></a> <a href="pagrindinis.php?id=history"> Istorija</a><br/>  </div>';
    }

    $newsCount = mysql_result(mysql_query("SELECT COUNT(*) FROM news"), 0);
    if ($newsCount) {
        echo '	 <div class="up">Naujienos</div>';
        echo '<div class="titlec">
 <a href="?id=news">[Atnaujinimai]</a> [' . laikas($new['data']) . '] [' . kiek('news') . '+<font color="red"><b>' . $nust['sndnew'] . '</b></font>]</div>';
    }
    echo '<div class="up">Valiutos</div>';
    echo '<div class="meniuc">
 <a href="valiutos.php?id=">Jūsų turimos valiutos</a> <b> | </b>
 <a href="valiutos.php?id=pasl">Jūsų įsigytos paslaugos</a>
 
 

</div>
 
';

    if ($apie['bts'] - time() > 0) {
        echo ' <div class="meniuc">	
<a href="bitcoin.php?id=">BitCoin </a></b></font>[<b>' . sk($apie['bitcoin']) . ' <img src="img/bicons/bitcoin.png" /></b>]</div>';
    }

    if ($apie['pliusaib'] - time() > 0) {
        echo ' <div class="meniuc">	
<a href="pliusai.php?id=">Pliusai</a></b></font>[<b>' . sk($apie['pliusai']) . ' <img src="img/bicons/pliusai.png" /></b>]</div>';
    }
    echo ' <div class="meniuc">	
<a href="botas.php?id=">Vegita Cash</a></b></font>[<b>' . sk($apie['botas']) . ' <img src="img/bicons/cash.png" /></b>]</div>';

    echo '<div class="up">Dienos varžybos</div>

<div class="meniu">

 <img src="img/trophy.png" /> <a href="?id=dtop">Veiksmų TOP iš <b><font color ="green">' . sk($nust['dtop_priz']) . '</b></font>  <img src="img/bicons/vipt.png" />  </a><br/>
';

    echo '<img src="img/trophy.png" /> ';
    echo " <a href='s_top.php'>Savaitės veiksmų TOP iš <b><font color ='red'>" . sk($nust['savdtop_priz']) . "</b></font>  <img src='img/bicons/euro.png' /> ir <b><font color ='red'>" . sk($nust['savdtop_priz2']) . "</b></font>" . $vipt . "</a><br>";


    echo '<img src="img/trophy.png" /> 
<a href="bendravimo.php">Bendravimo TOP  iš <b><font color ="red">' . sk($nust['bendravimo_priz']) . '</b></font>' . $eurui . ' ir <font color ="red"><b>' . sk($nust['bendravimo_priz2']) . '</b></font>' . $vipt . '</a><br>';
    echo '<img src="img/trophy.png" /> <a href="kasimotop.php">Kasimo TOP  iš <b><font color ="red">' . sk($nust['kasimo_priz']) . '</b></font><b> Kasimo LVL</b></a><br>';
    echo '<img src="img/trophy.png" /> <a href="playerDailyMissionTop.php">Legendinių misijų TOP iš <b><font color ="red">' . sk($nust['daily_mission_reward']) . '</b></font><b> ' . $botas . '</b></a>';
    echo '<br><img src="img/trophy.png" /> <a href="pintop.php?id=">Surinktų pinigų TOP</a><br>';
    echo '</div>
';

    if ($nust[diena] == 1) {
        $day = Pinigų;
        $n1 = ' gausite 10 % daugiau <img src="img/bicons/pinigai.png" />  ';
    } elseif ($nust[diena] == 2) {
        $day = Exp;
        $n1 = 'gausite 15 % daugiau <img src="img/bicons/exp.png" />     ';
    } elseif ($nust[diena] == 3) {
        $day = Daigtų;
        $n1 = 'gausite 10 % didesni šansą rasti daigtus';
    } elseif ($nust[diena] == 4) {
        $day = Paprasta;
        $n1 = 'negausite nieko';
    } elseif ($nust[diena] == 5) {
        $day = Euru;
        $n1 = 'Gausite iš kovų po 0.2 euro!';
    } elseif ($nust[diena] == 6) {
        $day = Kreditu;
        $n1 = 'Gausite iš kovų po 2 kredus!';
    } elseif ($nust[diena] == 7) {
        $day = Auksiniu;
        $n1 = 'Gausite iš kovų po 2 auksinius!';
    }

    top('Žaidimo dienos');

    echo '<div class="meniu">
Šiandien yra <b>' . $day . '</b> diena !<br/>
Per šia dieną jūs <b>' . $n1 . '</b></div>';

    /*echo'
<div class="up">
<b>Trumpa informacija:</b>

</div><div class="meniuc">Išbuvote prisijunges  '.ar_on($onn['nick'], 1).' <br/> <b>5</b> kreditus gausite po '.laikas($onn[gausite]-time(),1).'</span></div>

';
  * /*/
    echo '
  
<div class="up">
<b>Trumpai apie save:</b>
</div>
';
    echo '

	<div class="meniuc" >
		<table>

		<center>
	
		<td>

<a href="pagrindinis.php?id=apie&ka=' . $nick . '"><img src="img/veikejai/' . $apie['veikejas'] . '-' . $apie[trans] . '.png" alt="IMG" ></a>


 
	</td><td><small>
Jūsų lygis - <b>' . skaicius($apie['lygis']) . '</b><br>
Jūsų saskaitoje -  <b> <a href="eurai.php?id=">   ' . skaicius($apie['sms_litai'], 2) . ' </b><img src="img/bicons/euro.png"/> </a> <br>
Turimi kreditai - <b><a href="kreditai.php?id=">    ' . skaicius($apie['kred']) . ' </b><img src="img/bicons/credit.png"/> </a> <br>
  Turimi auksiniai - <b><a href="auksiniai.php?id=">    ' . skaicius($apie['auksiniai']) . ' </b><img src="img/bicons/auxo.png"/> </a> <br>
Turimi pinigai - <b>   ' . skaicius($apie['litai']) . ' </b><img src="img/bicons/pinigai.png" /> <br>
Turite EXP - <b> ' . skaicius($apie['exp']) . ' </b><img src="img/bicons/exp.png"/> <br />
Trūksta EXP - <b>' . skaicius($apie['expl'] * 4.95 - $apie['exp']) . ' </b><img src="img/bicons/exp.png"/></small> <br />
			<td>
		</center>
		</table>

	
	
	
</div>';


    echo '
  
<div class="up">
<b>Jūsų informacija:</b>
</div>
';


    echo '
<div class="meniu">
<img src="img/aicon/apie.png" /><a href="pagrindinis.php?id=apie&ka=' . $nick . '">Apie <b>' . statusas($nick) . '</b></a><br/>

<img src="img/aicon/meniu.gif" /><a href="meniu.php?id=">Mano meniu</b></a><br/>
<img src="img/bicons/saugykla.png" /><a href="vsaugykla.php?id="><font color="red"><b>Veikėjų saugykla</a></b></font>(<b>' . $apie['kiek_unikaliu'] . '</b>/<font color="red">41</font>)<br/>
<img src="img/aicon/sword.png" /><a href="skill.php?id=">Mano skillai</b></a><br/>
<img src="img/aicon/bag.png" /><a href="inv.php?id=">Inventorius</b></a><br/>

<img src="img/aicon/sms.png" /><a href="pm.php?id=">Pm dežutė</b></a><br/>';
    if ($apie['majin'] - time() > 0) {
        echo '
<img src="img/aicon/majin.png" />Majin Karys ';
        if ($apie['majin'] - time() > 0) {
            echo '
(<font color="green"><b>' . laikas($apie["majin"] - time(), 1) . '</b></font>)<br>';
        }
    }
    if ($apie['majin'] - time() < 0) {
        echo '
<img src="img/aicon/majin.png" /> <a href="majin.php?id=">Majin Karys</a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

    }

    if ($invis['viplvl'] > 0) {
        echo '' . $ico2 . ' VIP: <b>' . $invis['viplvl'] . '</b></br>';
    }


    echo '

<img src="img/aicon/ape.png" /><a href="?id=great">Great ape</b></a><br/>';


    echo '
<img src="img/bicons/vip.png" /> <a href="vipas.php?id=">VIP Privilegija</a>';
    if ($inv['viplvl'] > 0) {
        echo '
<font color="white">[</font><font color="red"><b>' . $inv['viplvl'] . ' </b></font><font color="white"><b> Lygio VIP</b>]</font>';
    }
    echo '<br>';


    echo ' ' . $ico . '<b>VIP Tickets </b></font>[<b>' . sk($apie['vipticket']) . ' <img src="img/bicons/vipt.png" /></b>]</font><br>';

    if (isEventHappening()) {
        echo ' <img src="img/boxes/saule.png" />  <a href="event.php?id="><font color="red"><b>Vasaros Event</b></font></a>';
    }
    echo '</div>';
    echo '
<div class="up">



<b>Planetos:</b>
</div>
';

    echo '
<div class="meniu" >

	<img src="img/aicon/nam.png" /><a href="namek.php?id=">Namek planeta</a> <br>  
	<img src="img/aicon/kaju.png" /><a href="kio.php?id=">Kajų planeta</a>  <br/>
	<img src="img/aicon/angel.png" /><a href="juodap.php?id="><b>Juodoji planeta</b></a>  </br>
	<img src="img/aicon/futer.png" /><a href="tuffle.php?id="><b>Tuffle planeta</b></a>  </br>
	<img src="img/aicon/angel.png" /><a href="pomirtinis.php?id=">Pomirtinis pasaulis</a>   </br>
	';
    echo '</div>';

    echo '
<div class="up">



<b>Vietovės:</b>
</div>
';

    echo '
<div class="meniu" >

<img src="img/aicon/city.png" /><a href="miestas.php?id=">Vakarų miestas</a>   <br>
<img src="img/aicon/god.png" /><a href="dievas.php?id=">Dievo namai</a> <br/>
<img src="img/aicon/tower.png" /> <a href="karinas.php?id=">Karino bokštas</a> <br/>
<img src="img/aicon/house.png" /><a href="kame.php?id=">Džino vėžlio sala</a>   <br/>
<img src="img/aicon/capital.png" /><a href="labaratory.php?id=">Gero labaratorija</a>   <br/>
<img src="img/aicon/arena.png" /> <a href="arena.php?id=">Kovų arena (<b>' . mysql_num_rows(mysql_query("SELECT * FROM online WHERE vieta='Arenoje'")) . '</b>)</a>   <br/>
<img src="img/bicons/ball.gif" /><a href="isbarstyti.php?id=">Išbarstyti rutuliai</a>   <br/>
<img src="img/aicon/corp.png" /><a href="corp.php?id=">Kapsulių korporacija</a>   <br/>
<img src="img/aicon/planet1.png" /><a href="fight.php?id="><font color="red"><b>Kovų zona</b></font></a>  <br/> 
<img src="img/aicon/misijos.png" /><a href="misijos.php?id="><b>Misijos</b></a>   <br/>
<img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> <a href="kasimas.php?id="><b>Rūdų kasykla</b></a>  <br/>
<img src="img/bicons/malka.png" /><a href="miskas.php?id=">Miškas</a> <br/>
<img src="img/aicon/house1.png" /><a href="gravitacija.php?id=">Gravitacijos kambarys</a>   <br/>
<img src="img/aicon/team.png" /><a href="komanda.php?id=">Komandos</a>  </div>
';

    echo '
<div class="up">

<b> Papildoma:</b>
</div> 
';

    echo '
<div class="meniu">
<img src="img/aicon/pas.png" /><a href="pasiulymai.php">Pasiūlymai  (<font color="red"><b>' . $ii . '</b></font>/<font color="green"><b>' . $i . '</b></font>)</a></b><br/>
<img src="img/aicon/info.png" /><a href="informacija.php?id=">Informacija</a></b><br/>
<img src="img/aicon/forumas.png" /><a href="forumas.php?id=">Forumas</a><br />
<img src="img/aicon/viktorina.png" /><a href="viktorina.php?id=">Viktorina</a><br />
<img src="img/bicons/sms.png" /><a href="pokalbiai.php?id=">Pokalbiai</a><br />

<img src="img/aicon/on.png" /><a href="prisijunge.php?id="> Prisijungusių :</font><font color="red"> ' . kiek('online') . '</font></a><br/>

<img src="img/aicon/off.png" /><a href="pagrindinis.php?id=off">Atsijungti</a></b><br/>

</div>

';

    echo '
<div class="up">

<b> Mini chat:</b>

</div> 
';

    if ($apie['mini_chat'] == '0') {
        echo '<div class="meniuc"><a href="?id=onn">Ijungti mini chat</a></div>';
    }
    if ($apie['mini_chat'] == '1') {


        if ($ka == "rasyti") {
            $zin = post($_POST['zinute']);
            if (empty($zin)) {
                echo '<script>document.location="?id=#"</script>';
            } elseif ($lygis < 25) {
                echo '<div class="error">Jūsų lygis per žemas! Reikia 25 lygio.</div>';
            } elseif ($gaves == "+") {
                echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

            } elseif ($apie[veiksmai] < 5000) {
                echo '<font color="red">Rašyti galima nuo 5000 laimėtų kovų</font><br/>';
            } elseif (apsas($zin) == apsas('/clean') and in_array($apie[statusas], $statusai)) {

                mysql_query("TRUNCATE pokalbiai");
                mysql_query("INSERT INTO pokalbiai SET nick='" . $nick . "', sms='Išvaliau pokalbius :)', data='" . time() . "'");
            } else {


                ////bannx
                $ti = time() + 60;
                mysql_query('INSERT INTO block SET nick = "$nick", uz="keiksmazodziai", kas_ban="SISTEMA", time="$ti"');

                mysql_query("INSERT INTO pokalbiai SET nick='" . $nick . "', sms='$zin', data='" . time() . "'");
                include 'snekute.php';
            }
            if ($apie['pliusaib'] - time() < 0) {
                mysql_query("UPDATE zaidejai SET chate=chate+1, pliusai=pliusai+5 WHERE nick='$nick'");
                echo '<script>document.location="?id=#"</script>';
            }
        }
        if (!empty($ka)) $ats = $ka . ' -> '; else $ats = '';
        echo '<div class="meniuc">
		<div id="error"></div>
		';
        $apie = mysql_fetch_assoc(mysql_query("SELECT * FROM `zaidejai` WHERE `nick` = '$nick'"));
        if ($apie['minichatas'] != 1) {
            echo '
    <form action="?id=&ka=rasyti#" method="post"/>
    <textarea name="zinute" cols="25" rows="2" placeholder="Bendraujam :)" required>' . $ats . '</textarea><br />
     <div class="line"></div>
    <input type="submit" value="Rašyti" style="cursor: pointer;></form>
     <div class="l">
  </div>';

        } else {
            echo '<textarea class="bbzzin" name="zinute" id="minichatzin">' . $ats . '</textarea><br/>
<input id="minichatusername" name="nick" style="display: none;" readonly="readonly""/>
 <div class="line"></div>

  <input type="submit" onClick="minichatwrite()" value="Ra&#353;yti" style="cursor: pointer;"/>';
            echo '</div><div class="title">';

        }

        mysql_query("DELETE FROM `pokalbiai` WHERE expired_at < NOW()");
        $visi = mysql_result(mysql_query("SELECT COUNT(*) FROM pokalbiai"), 0);
        if ($visi > 0) {

            if ($apie['minichatas'] == 1) {
                require 'mini.php';
                ?>
                <script>
                    var nick = "<?php echo $nick; ?>";
                    setInterval(function () {
                        loadChat(nick);
                    }, 1000);
                </script>

                <div id="myDiv2"><?php include("minichat2.php"); ?></div></div>
                <?php
            } else {
                $xaz = $apie['rodymas'];

                $q = mysql_query("SELECT * FROM pokalbiai ORDER BY id DESC LIMIT $xaz");

                echo '<div class="title">';
                while ($rr = mysql_fetch_assoc($q)) {
                    $nr++;
                    if ($apie[statusas] == 'Admin' or $apie[statusas] == 'Mod' or $apie[statusas] == 'Mod2' or $apie[statusas] == 'Mod3' or $apie[statusas] == 'Mod4' or $apie[statusas] == 'Kurejas') {
                        $goo = '<a href="?id=delete&ka=' . $rr['id'] . '"><small>[x]</small></a>';
                    }
                    echo '<b>' . $nr . '.</b> <a href="?id=apie&ka=' . $rr['nick'] . '"><b>' . statusas($rr['nick']) . '</b></a> -';

                    if ($apie[statusas] == 'Žaidėjas') {
                        echo ' <font color="white">' . smile($rr['sms']) . '</font>';
                    }
                    if ($apie[statusas] == 'Kurejas') {
                        echo ' <font color="red">' . smile($rr['sms']) . '</font>';
                    }
                    echo ' <small>(' . lai($rr['data']) . ')</small>';
                    echo ' <a href="?id=&ka=' . $rr['nick'] . '#"><small>[A]</small></a>' . $goo . '<br />';

                }
                unset($nr);
                echo '</div>';
            }
        } else {
            echo '<div class="meniuc">Žinučių nėra!</div>';
        }
    }


    echo '
<div class="up">

<b>
	  <div class="topbar"> 
		<a href="?id=turnonminichat">Ijungti išmanujį chat`a</a>   <a href="?id=bbc">BBC kodai</a>  <a href="?id=offas">[x]</a> 
	</b>

</div> </div>
';


    echo '<div class="meniuc">' . skaitl() . '</div>';

} elseif ($id == "turnonminichat") {
    mysql_query("UPDATE zaidejai SET minichatas=1 WHERE nick='$nick' ") or die(mysql_error());
    ?>
    <script>
        window.location = "pagrindinis.php";
    </script>
    <?php
} elseif ($id == "turnoffminichat") {
    mysql_query("UPDATE zaidejai SET minichatas=0 WHERE nick='$nick' ");
    ?>
    <script>
        window.location = "pagrindinis.php";
    </script>
    <?php
} elseif ($id == "offas") {
    mysql_query("UPDATE zaidejai SET mini_chat='0' WHERE nick='$nick' ");
    ?>
    <script>
        window.location = "pagrindinis.php";
    </script>
    <?php
} elseif ($id == "onn") {
    mysql_query("UPDATE zaidejai SET mini_chat='1' WHERE nick='$nick' ");
    ?>
    <script>
        window.location = "pagrindinis.php";
    </script>
    <?php
}
if ($id == "keistiinf") {
    top("Informacija");
    online('Keicia info');


    echo '

 <div class="meniu">
        <form method="post" action="?id=keistiinf2&ka=' . $nick . '">
          Vardas:<br /><input type="text" name="varda"/><br />
          
          Amžius:<br /><input type="text" name="amzius"/><br />
          
          Miestas :<br /><input type="text" name="miesNta"/><br />
         
          Aprasymas: <br /><input type="text" name="apr" /><br />
      
         <input type="submit" name="submit" value="Nustatyti"/></form>
        </div>';

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Informacijos keitimas");
    navigacija($g_n);


} elseif ($id == "keistiinf2") {
    top("Informacija");
    online('Keicia info');
    if (isset($_POST['submit'])) {
        $varda = isset($_POST['varda']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['varda']) : null;
        $amzius = isset($_POST['amzius']) ? preg_replace("/[^0-9_]/", "", $_POST['amzius']) : null;
        $miesta = isset($_POST['miesta']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['miesta']) : null;
        $apr = post($_POST[apr]);


    }
    mysql_query("UPDATE zaidejai SET vardas='$varda', amzius='$amzius', miestas='$miesta' , aprasymas='$apr' WHERE nick='$nick'") or die(mysql_error());

    echo "<div class='meniuc'>Nustatyta.<br></div>";

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Informacijos keitimas");
    navigacija($g_n);


}

if ($id == "funkcijosm") {
    top("Mano galimybės");
    online('Žiūri savo INFO');


    echo "
 <div class='meniu'>
	$ico <a href='?id=komentarai&ka=" . $inf['nick'] . "'>Jūsų komentarai (" . mysql_num_rows(mysql_query("SELECT * FROM `komentarai` WHERE `kas` = '" . $inf['nick'] . "'")) . ")</a><br/>
			
			$ico<a href='?id=inf&ka=" . $inf['nick'] . "'>Jūsų anketa</a><br/>
			$ico  <a href='?id=sta&ka=" . $nick . "'>Statistika</a><br/>
			$ico <a href='?id=medaliai&ka=$inf[nick]'>Medaliai</a><br/>
			$ico   <a href='?id=draugai&ka=" . $ka . "'>Draugai (" . mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$ka'")) . ")</a></div>




";
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Mano Galimybės");
    navigacija($g_n);


} elseif ($id == "apie") {

    if ($inf['statusas'] == "Admin") {

        $sst = 'Administratorius';
    } elseif ($inf['statusas'] == "Mod") {
        $sst = '1 Lygio Moderatorius';
    } elseif ($inf['statusas'] == "Mod2") {
        $sst = '2 Lygio Moderatorius';

    } elseif ($inf['statusas'] == "Mod3") {
        $sst = '3 Lygio Moderatorius';
    } elseif ($inf['statusas'] == "Kurejas") {
        $sst = 'Žaidimo Kūrėjas';
    } elseif ($inf['statusas'] == "Mod4") {
        $sst = '4 Lygio Moderatorius';
    } elseif ($inf['statusas'] == "vmod") {
        $sst = 'Viktorinos prižiūrėtojas';
    } elseif ($inf['vip'] > time()) {
        $sst = 'VIP';
    } else {
        $sst = 'Žaidėjas';

    }
    if (apsas($ka) == apsas('SISTEMA')) {
        top('Žaidimo sistema');
        echo '<div class="meniuc">EIK PAS testas1</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Žaidimo kūrėjas");
        navigacija($g_n);
    } elseif (apsas($ka) == apsas('testas1')) {
        top('Administracijos topikas');
        echo '
<div class="meniuc"><div class="thumbsup thumbs_up_down center">
<strong class="result1 error " title="Man patiko!">' . $inf["rep_teig"] . '</strong>
<a href="pagrindinis.php?id=rep&co=1&ka=' . $ka . '"> <img src="img/bicons/like.png" /> </a>
<a href="pagrindinis.php?id=rep&co=2&ka=' . $ka . '"> <img src="img/bicons/dislike.png" /> </a>
<strong class="result2 error " title="Man nepatiko!">' . $inf["rep_neig"] . '</strong>

</div></a></div><div class="line"></div>';

        echo '<div class="meniuc"><img src="admin.png"/></div>';
        echo '<div class="up">Administracijos topikas</div>';
        echo '<div class="meniuc">Sveikas <b>' . $nick . '</b>, Mums būtų džiugu išgirsti iš jūsų atsiliepimą, mes visados galime jums padėti, atsakyti į klausimus, ir kita. <br/>
		Dėl atsiskaitymų prašome rašyti privačia žinute esančia žemiau.<br/>
		<i>Administracija niekada nedalina resursų dovanai, todėl visokie prašymai bus <b>ignoruojami</b> ir nebus atsakyta.<br/>
		</i><u>Į žinutes atsakysime per <b>24val.</b> laikotarpį. priklauso nuo administracijos užimtumo.</u></div>';
        echo '<div class="up">Informacija</div>
		<div class="meniuc">' . $ico2 . '<b> Paskutinis veiksmas: </b>' . laikas($inf[last]) . '<br /></div>';
        echo '<div class="up">Žinutė Administracijai</div>';
        if (!empty($ka)) $ats = $ka;
        echo '<div class="titlec">
  <form action="pm.php?id=write&kam=' . $ka . '" method="post"/>
  <textarea name="txt" type="text" maxlength="300" title="žinutė" placeholder="Jūsų žinutė" style="width: 80%;" rows="5" /></textarea><br/>
  <input type="submit" value="Siųsti"/>
   </div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Žaidimo kūrėjas");
        navigacija($g_n);
    } elseif (apsas($ka) == apsas('wandamaximoff')) {
        top('');
        echo '
<div class="meniuc"><div class="thumbsup thumbs_up_down center">
<strong class="result1 error " title="Man patiko!">' . $inf["rep_teig"] . '</strong>
<a href="pagrindinis.php?id=rep&co=1&ka=' . $ka . '"> <img src="img/bicons/like.png" /> </a>
<a href="pagrindinis.php?id=rep&co=2&ka=' . $ka . '"> <img src="img/bicons/dislike.png" /> </a>
<strong class="result2 error " title="Man nepatiko!">' . $inf["rep_neig"] . '</strong>

</div></a></div><div class="line"></div>';

        echo '<div class="meniuc"><img src="https://i.ibb.co/3Wgd94v/wanda-640x360-removebg-preview.png"/></div>';
        echo '<div class="up">Žaidimo Grafikos Kūrėjas</div>';
        echo '<div class="meniuc">Sveikas <b>' . $nick . '</b> Aš esu Žaidimo Grafikos Kūrėjas, jei radai kažkur grafikos klaida pranešk man<br/></div>';
        echo '<div class="up">Informacija</div>
		<div class="meniuc">' . $ico2 . '<b> Paskutinis veiksmas: </b>' . laikas($inf[last]) . '<br /></div>';
        echo '<div class="up">Žinutė Žaidimo Grafikos Kūrėjui</div>';
        if (!empty($ka)) $ats = $ka;
        echo '<div class="titlec">
  <form action="pm.php?id=write&kam=' . $ka . '" method="post"/>
  <textarea name="txt" type="text" maxlength="300" title="žinutė" placeholder="Jūsų žinutė" style="width: 80%;" rows="5" /></textarea><br/>
  <input type="submit" value="Siųsti"/>
   </div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Žaidimo kūrėjas");
        navigacija($g_n);
    } else {
        if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERWE nick='$ka' AND delete='+'"))) {

            top('' . $ka . ' informacija ');
            echo '<div class="meniuc">Žaidėjas yra ištrintas</div>';
            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "$ka informacija");
            navigacija($g_n);

        } else {

            if (apsas($ka) == apsas($nick)) {
                online('Žiūri savo INFO');


                echo '<div class="up" > <b>' . statusas($ka) . '</b> Informacija</div> <div class="meniuc">';

                echo '
<div class="thumbsup thumbs_up_down center">
<strong class="result1 error " title="Man patiko!">' . $inf["rep_teig"] . '</strong>
<a href="pagrindinis.php?id=rep&co=1&ka=' . $ka . '"> <img src="img/bicons/like.png" /> </a>
<a href="pagrindinis.php?id=rep&co=2&ka=' . $ka . '"> <img src="img/bicons/dislike.png" /> </a>
<strong class="result2 error " title="Man nepatiko!">' . $inf["rep_neig"] . '</strong>

</div></a></div><div class="line"></div>';


                echo '<div class="meniuc">
<center>';
                if (($inv['radaras']) >= '1') {
                    $radar = '<img class="item"src="img/radar.png"/>';
                } else {
                    $radar = '<img class="item"src="img/empty.png"/>';
                }

                if (($inv['ki']) >= '+') {
                    $ki = '<img class="item"src="img/kg.png"/>';
                } else {
                    $ki = '<img class="item"src="img/empty.png"/>';
                }
                if (($apie['kasimoreward']) == '+') {
                    $pickaxe = '<img class="item"src="img/kasimoreward.png"/>';
                } else {
                    $pickaxe = '<img class="item"src="img/empty.png"/>';
                }
                if (($apie['kovureward']) == '+') {
                    $kovu = '<img class="item"src="img/kovureward.png"/>';
                } else {
                    $kovu = '<img class="item"src="img/empty.png"/>';
                }
                if (($apie['kazkas3']) == '+') {
                    $kazkas3 = '<img class="item"src="img/giras.png"/>';
                } else {
                    $kazkas3 = '<img class="item"src="img/empty.png"/>';
                }
                if (($apie['kazkas4']) == '+') {
                    $kazkas4 = '<img class="item"src="img/giras.png"/>';
                } else {
                    $kazkas4 = '<img class="item"src="img/empty.png"/>';
                }
                if (($apie['kazkas5']) == '+') {
                    $kazkas5 = '<img class="item"src="img/giras.png"/>';
                } else {
                    $kazkas5 = '<img class="item"src="img/empty.png"/>';
                }

                if (($apie['giras']) == '+') {
                    $giras = '<img class="item"src="img/giras.png"/>';
                } else {
                    $giras = '<img class="item"src="img/empty.png"/>';
                }

                if (($apie['kate']) == '+') {
                    $kate = '<img class="item"src="img/kate.png"/>';
                } else {
                    $kate = '<img class="item"src="img/empty.png"/>';
                }

                if (($apie['lazdele']) == '+') {
                    $lazdele = '<img class="item"src="img/lazdele.png"/>';
                } else {
                    $lazdele = '<img class="item"src="img/empty.png"/>';
                }

                if (($apie['potara']) == '+') {
                    $potara = '<img class="item"src="img/potara.png"/>';
                } else {
                    $potara = '<img class="item"src="img/empty.png"/>';
                }


                echo '
			<table class="box"><tr><td>' . $radar . '</a></td><td rowspan="3" colspan="2"><img src="img/veikejai/' . $inf['veikejas'] . '-' . $inf[trans] . '.png" alt="' . $inf['veikejas'] . ' "/></a></td>	</td>
					<td>' . $ki . '</a>					</td>
				</tr>
				<tr>
					<td>' . $lazdele . '</a>				</td>
					<td>' . $potara . '</a>		</td>
				</tr>
				<tr>
					<td>' . $kate . '</a>	</td>
					
				
				<td>' . $giras . '</a>				</td>
				</tr>
		

					<center>' . $pickaxe . '
					
				' . $kovu . '
</center>
	
			</table>
		</center>

</div>';


                $userSword = '<div class="slot"><img src="img/equipment/empty_slot_sword.png" alt="Sword"></div>';
                if ($apie['sword'] === 'Atgimimo sword') {
                    $userSword = '<div class="slot"><img src="img/equipment/revival_sword.png" alt="Atgimimo Sword">
<div class="tooltip">Atgimimo sword</div></div>';
                }

                $userAmulet = '<div class="slot"><img src="img/equipment/empty_amulet_slot.png" alt="Amulet"></div>';
                if ($apie['amuletas'] === 'Atgimimo amulet') {
                    $userAmulet = '<div class="slot"><img src="img/equipment/revival_amulet.png" alt="Atgimimo Amulet">
        <div class="tooltip">Atgimimo amulet</div></div>';
                }

                $userArmour = '<div class="slot"><img src="img/equipment/empty_armour_slot.png" alt="Armour"></div>';
                if ($apie['armor'] === 'Atgimimo armor') {
                    $userArmour = '<div class="slot"><img src="img/equipment/revival_armour.png" alt="Atgimimo Armour">
        <div class="tooltip">Atgimimo armour</div></div>';
                }


                // equipment
                echo '<div class="up" > <b>Užsidėti daiktai:</b></div>';
                echo '<div class="meniuc">
    <div class="equipment-container center-items">
        ' . $userAmulet . $userSword . $userArmour . '
    </div>';


                echo ' <div class="titlec">' . smile($topic) . '</font> <br/><a href="meniu.php?id=topic">[Keisti]</a></div>';
                if ($inf[nuotaika] != '') {
                    $nuotaika = '' . $ico2 . '  Nuotaika : <img src="img/nuotaikos/' . $inf['nuotaika'] . '.gif">' . $inf[nuotaika] . '<br/>';
                }

                echo '<div class="line"></div><div class="up" > <b>Jūsų informacija:</b></div> <div class="line"></div> 
           <div class="meniu">
        ' . $ico2 . '   <b> Busena: </b>' . ar_on($inf['nick']) . '<br />
        ' . $ico2 . '  <b> Nick: </b>' . statusas($inf['nick']) . '(' . $sst . ')<br />
        ' . $ico2 . '  <b> Veikejas: </b>' . $inf['veikejas'] . '</b><br />
   
    ' . $nuotaika . '
     ' . $ico2 . '   <b> Lygis: </b>' . $inf['lygis'] . '<img src="img/bicons/lvl.png"/></b><br />
 ';

                if (!empty($user[team])) {
                    echo '    ' . $ico2 . ' <b>Priklauso komandai :</b> <a href="komanda.php?id=info&ka=' . $useris[team] . '">' . $useris[team] . '</a><br>';
                }
                echo '        ' . $ico2 . '<b> Susijunges: </b> ' . $su_kuo . '</div>';
                echo '  <div class="meniuc">Surinkai išviso pinigų: <b>' . skaicius($apie['surinktapin']) . '<img src="img/bicons/pinigai.png"/></b><br>
Turi <b>LVL</b> kasimo: <b>' . skaicius($apie['kasimolvl']) . '</b>


</div>';


                echo '  <div class="meniuc">Turi unikalių veikėjų: [<font color="red"><small>' . sk($apie['kiek_unikaliu']) . '</small></font>/<small><b>41</b></small>]</div>';
                if ($inv['viplvl'] > 0) {
                    echo ' <div class="meniuc">  Turimas: <font color="red"><b>' . $inv['viplvl'] . ' </b></font><font color="blue"><b> VIP Lygis</b></font></div>';
                }
                if ($inv['viplvl'] == 0) {
                    echo '<div class="meniuc">  Turimas: <font color="red"><b>0 </b></font><font color="blue"><b> VIP Lygis</b></font></div>';
                }

                if ($apie['antipl'] - time() > 0) {
                    echo '<div class="meniuc">Apsauga nuo puolimų turėsi: <b>' . laikas($apie['antipl'] - time(), 1) . '</b></div>';
                }
                if ($apie['antipl'] - time() < 0) {
                    echo '<div class="meniuc"><b>Apsaugos nuo puolimų neturi!</b></div>';
                }
                echo '<div class="up">Eurai/kreditai/auksiniai/pinigai/exp</div>
          <div class="meniuc">
   <b>  <a href="eurai.php?id=">   ' . skaicius($inf['sms_litai'], 2) . ' </b><img src="img/bicons/euro.png"/> </a> |
   <b> <a href="pagrindinis.php?id=kredai">    ' . skaicius($inf['kred']) . ' </b><img src="img/bicons/credit.png"/> </a> |
   <b>   <a href="auksiniai.php?id=">    ' . skaicius($inf['auksiniai']) . ' </b><img src="img/bicons/auxo.png"/> </a> |
  <b>   ' . skaicius($inf['litai']) . ' </b><img src="img/bicons/pinigai.png" /> |
      <b> ' . skaicius($inf['exp']) . ' </b><img src="img/bicons/exp.png"/> <br />
        </div>';

                echo '<div class="line"></div><div class="up"> <b>Kiek turite+Bonusai+Itemai=Bendrai</b>:</div>
         <div class="meniuc">
    <b>' . sk($inf['jega'] + $inf['swordp']) . '   <img src="img/bicons/attack.png"/>    ' . $procentas1 . '% <img src="img/bicons/kovines.png"/> +' . skaicius($swordas) . '  <img src="img/bicons/lyg.png"/>   ' . skaicius($jegax) . '  <img src="img/bicons/attack.png"/>   </b>';

                echo '<br/>';
                echo '<b> ' . sk($inf['gynyba'] + $inf['armorp']) . ' <img src="img/bicons/shield.png"/>  ' . $procentas2 . '% <img src="img/bicons/kovines.png"/> +' . skaicius($armoras) . ' 
<img src="img/bicons/lyg.png"/> ' . skaicius($gynybax) . ' <img src="img/bicons/shield.png"/> </b>';

                echo '<br/>';
                echo ' <b>' . sk($inf['gyvybes']) . ' <img src="img/bicons/hp.png"/><br />
       
      
            </div>';


                echo '<div class="up" ><b>Veiksmai:</b>:</div> <div class="line"></div> 
            <div class="meniuc">
   <b> Šiandien  <img src="img/bicons/attack1.png"/> ' . skaicius($inff['vksm']) . '</b><img src="img/bicons/lyg.png"/>
        <b> Išviso  ' . skaicius($inf['veiksmai']) . ' <img src="img/bicons/attack1.png"/></b>
     <br />


       <b> Laimėta arenoje: </b>' . $inf['laimeta'] . ' <img src="img/bicons/lyg.png"/>

         <b> Pralaimėta arenoje: </b>' . $inf['pralaimeta'] . '<br />

 <b> Laimėta prieš žaidėjus: </b>' . $inf['laimetapl'] . ' <img src="img/bicons/lyg.png"/>

         <b> Pralaimėta prieš žaidėjus: </b>' . $inf['pralaimetapl'] . '<br />
</div>';
                echo '<div class="up">Pasiekimai</div>';
                echo '<div class="meniu">
' . $ico2 . '  Vygdai:<b> ' . $apie[sagos] . ' iš 110 sagų</b><br>
' . $ico2 . '  Vygdai:<b> ' . $apie[kovu_misijos] . ' iš 151 kovų misijų</b><br>
' . $ico2 . '  Vygdai:<b> ' . $apie[namekm] . ' iš 51 namek misijų</b><br>
' . $ico2 . '  Vygdai:<b> ' . $apie[istorija] . ' iš 101 žaidimo istorijos misijų</b><br>
' . $ico2 . '  Vygdai:<b> ' . $apie[kasimom] . ' iš 11 kasimo misijų</b><br>
' . $ico2 . '  Nugalėti bosai:<b> ' . $apie[nukirtobosu] . '</b>   <br>
 ' . $ico2 . '  Kritinio lygio:<b> ' . $apie[critical] . '</b>   
</div>';

                echo '

        <div class="up">Kita</div>
<div class="meniu">
     ' . $ico2 . '      <b> Užsiregistravo: </b>' . laikas($inf['uzsiregistravo']) . '<br />
     
   
     ' . $ico2 . '                   <b> Paskutinis veiksmas: </b>' . laikas($inf['last']) . '<br />';
                echo '' . $ico2 . '       <b> IP: </b>' . $inf['ip'] . ' | ' . salys($inf['ip']) . '<br />';


                echo '         </div>';
                echo "
			<div class='up'>Galimybės:</div><div class='meniu'>
				
			
			
	   $ico<a href='?id=inf&ka=" . $inf['nick'] . "'>Jūsų anketa</a><br/>

			$ico  <a href='?id=sta&ka=" . $nick . "'>Statistika</a><br/>
			$ico <a href='?id=medaliai&ka=$inf[nick]'>Medaliai</a><br/>
			$ico   <a href='?id=draugai&ka=" . $ka . "'>Draugai (" . mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$ka'")) . ")</a><br>
   $ico<a href='?id=komentarai&ka=" . $inf['nick'] . "'>Jūsų komentarai</a><br/>
</div>
 
		";

                $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Apie $nick");
                navigacija($g_n);


            } elseif ($ka != $nick) {

                online('Žiūri <font color="white"><b>' . $inf['nick'] . '</b></font> informacija');

                if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {
                    top('Klaida!');
                    echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
                    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Klaida");
                    navigacija($g_n);
                } else {


                    echo '<div class="up">' . statusas($ka) . ' Informacija</div><div class="meniuc">';
                    if (mysql_num_rows(mysql_query("SELECT * FROM block WHERE nick='$ka'")) == TRUE) {
                        $b_in = mysql_fetch_assoc(mysql_query("SELECT * FROM block WHERE nick='$ka'"));
                        echo ' <div class="meniuc">
	<img src="img/bicons/ban.png" /></div>';
                        echo '<div class="meniuc"><b>' . $inf['nick'] . '</b> žaidėjas yra <font color="red"><b>užbanintas</b></font> už <font color="red">' . $b_in[uz] . '</font></div>';
                    } else {
                        echo '
<div class="thumbsup thumbs_up_down center">
<strong class="result1 error " title="Man patiko!">' . $inf["rep_teig"] . '</strong>
<a href="pagrindinis.php?id=rep&co=1&ka=' . $ka . '"> <img src="img/bicons/like.png" /> </a>
<a href="pagrindinis.php?id=rep&co=2&ka=' . $ka . '"> <img src="img/bicons/dislike.png" /> </a>
<strong class="result2 error " title="Man nepatiko!">' . $inf["rep_neig"] . '</strong>

</div></a></div><div class="line"></div>';


                        echo '<div class="meniuc">
<center>';
                        $inv2 = mysql_fetch_assoc(mysql_query("SELECT * FROM inv WHERE nick='$ka'"));
                        if (($inv2['radaras']) >= 1) {
                            $radar = '<img class="item"src="img/radar.png"/>';
                        } else {
                            $radar = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inv2['ki']) >= 1) {
                            $ki = '<img class="item"src="img/kg.png"/>';
                        } else {
                            $ki = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inf['kasimoreward']) == '+') {
                            $pickaxe = '<img class="item"src="img/kasimoreward.png"/>';
                        } else {
                            $pickaxe = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inf['kovureward']) == '+') {
                            $kovu = '<img class="item"src="img/kovureward.png"/>';
                        } else {
                            $kovu = '<img class="item"src="img/empty.png"/>';
                        }

                        if (($inf['giras']) == '+') {
                            $giras = '<img class="item"src="img/giras.png"/>';
                        } else {
                            $giras = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inf['kate']) == '+') {
                            $kate = '<img class="item"src="img/kate.png"/>';
                        } else {
                            $kate = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inf['lazdele']) == '+') {
                            $lazdele = '<img class="item"src="img/lazdele.png"/>';
                        } else {
                            $lazdele = '<img class="item"src="img/empty.png"/>';
                        }
                        if (($inf['potara']) == '+') {
                            $potara = '<img class="item"src="img/potara.png"/>';
                        } else {
                            $potara = '<img class="item"src="img/empty.png"/>';
                        }


                        echo '
			<table class="box"><tr><td>' . $radar . '</a></td><td rowspan="3" colspan="2"><img src="img/veikejai/' . $inf['veikejas'] . '-' . $inf[trans] . '.png" alt="' . $inf['veikejas'] . ' "/> </a></td>	</td>
										<td>' . $ki . '</a>					</td>
				</tr>
				<tr>
					<td>' . $lazdele . '</a>				</td>
					<td>' . $potara . '</a>		</td>
				</tr>
				<tr>
					<td>' . $kate . '</a>	</td>
					
				
				<td>' . $giras . '</a>				</td>
				</tr>
		

					<center>' . $pickaxe . '
					
				' . $kovu . '
</center>
	
			</table>
		</center>

</div>';

                        // SWORDS
                        $userSword = '<div class="slot"><img src="img/equipment/empty_slot_sword.png" alt="Sword">
<div class="tooltip">Nėra</div></div>';
                        if ($inf['sword'] === 'Super money sword') {
                            $userSword =
                                ' <div class="slot">
    <img src="img/equipment/super_money_sword.png" alt="Super Money Sword">
    <div class="tooltip">Super money sword</div>
    </div>';
                        }
                        if ($inf['sword'] === 'Infinity sword') {
                            $userSword =
                                ' <div class="slot">
    <img src="img/equipment/infinity_sword.png" alt="Infinity Sword">
    <div class="tooltip">Infinity sword</div>
    </div>';
                        }
                        if ($inf['sword'] === 'Atgimimo sword') {
                            $userSword =
                                ' <div class="slot">
    <img src="img/equipment/revival_sword.png" alt="Atgimimo Sword">
    <div class="tooltip">Atgimimo sword</div>
    </div>';
                        }
                        if ($inf['sword'] === 'Mirties sword') {
                            $userSword =
                                ' <div class="slot">
    <img src="img/equipment/death_sword.png" alt="Mirties Sword">
    <div class="tooltip">Mirties sword</div>
    </div>';
                        }

                        // AMULETS/NECKLACES
                        $userAmulet = '<div class="slot"><img src="img/equipment/empty_amulet_slot.png" alt="Amulet">
<div class="tooltip">Nėra</div></div>';
                        if ($inf['amuletas'] === 'Super amulet') {
                            $userAmulet = '<div class="slot"><img src="img/equipment/super_amulet.webp" alt="Super Amulet">
        <div class="tooltip">Super amulet</div></div>';
                        }
                        if ($inf['amuletas'] === 'Naikinimo amulet') {
                            $userAmulet = '<div class="slot"><img src="img/equipment/destruction_amulet.webp" alt="Naikinimo Amulet">
        <div class="tooltip">Naikinimo amulet</div></div>';
                        }
                        if ($inf['amuletas'] === 'Atgimimo amulet') {
                            $userAmulet = '<div class="slot"><img src="img/equipment/revival_amulet.png" alt="Atgimimo Amulet">
        <div class="tooltip">Atgimimo amulet</div></div>';
                        }
                        if ($inf['amuletas'] === 'Mirties amulet') {
                            $userAmulet = '<div class="slot"><img src="img/equipment/death_amulet.png" alt="Mirties Amulet">
        <div class="tooltip">Mirties amulet</div></div>';
                        }

                        // ARMOUR
                        $userArmour = '<div class="slot"><img src="img/equipment/empty_armour_slot.png" alt="Armour">
<div class="tooltip">Nėra</div></div>';
                        if ($inf['armor'] === 'Super money armor') {
                            $userArmour = '<div class="slot"><img src="img/equipment/super_money_armour.webp" alt="Super Money Armour">
        <div class="tooltip">Super money armour</div></div>';
                        }
                        if ($inf['armor'] === 'Atgimimo armor') {
                            $userArmour = '<div class="slot"><img src="img/equipment/revival_armour.png" alt="Atgimimo Armour">
        <div class="tooltip">Atgimimo armour</div></div>';
                        }
                        if ($inf['armor'] === 'Mirties armor') {
                            $userArmour = '<div class="slot"><img src="img/equipment/death_armour.png" alt="Mirties Armour">
        <div class="tooltip">Mirties armour</div></div>';
                        }


                        // equipment
                        echo '<div class="up" > <b>Užsidėti daiktai:</b></div>';
                        echo '<div class="meniuc">
    <div class="equipment-container center-items">
        ' . $userAmulet . $userSword . $userArmour . '
    </div>
</div>';

                        $banCount = mysql_result(mysql_query("SELECT COUNT(*) FROM ban_logai WHERE nick='$ka'"), 0);

                        if ($banCount == 0) {
                            $banstatus = "&#352;iuo &#382;mogumi turbut galite pasitik&#279;ti.";
                        }
                        if ($banCount == 1) {
                            $banstatus = "&#352;iuo &#382;mogumi turbut dar galite pasitik&#279;ti.";
                        }
                        if ($banCount == 2) {
                            $banstatus = "&#352;is &#382;mogus nepatikimas! Venkite sandori&#371; su juo.";
                        }
                        if ($banCount >= 5) {
                            $banstatus = "Venkite bendravimo ar kit&#371; ry&#353;iu su &#353;iuo &#382;mogumi! Geriausia j&#303; i&#353; viso ignoruoti.";
                        }
                        echo '<div class="meniu">Gavo banų: <b>' . sk($banCount) . '</b><br/>
' . $banstatus . '<br/></div>';

                        if (empty($useris[gavomute])) {

                            $useris[gavomute] = 0;
                        } else {
                            $useris[gavomute] = $useris[gavomute];
                        }
                        echo '<div class="meniu">Gavo mute:<b> ' . sk($useris[gavomute]) . '</b><br/>
' . $mutestatus . '<br/></div>';
                        echo ' <div class="titlec">' . smile($topic) . '</font> </div>';
                        if ($inf[nuotaika] != '') {
                            $nuotaika = '' . $ico2 . '  Nuotaika : <img src="img/nuotaikos/' . $inf['nuotaika'] . '.gif">' . $inf[nuotaika] . '<br/>';
                        }
                        if ($useris[secret] - time() > 0 and $apie['statusas'] != 'Kurejas') {
                            echo '<div class="up" > <b>Pagrindinė informacija:</b></div> <div class="line"></div> 
           <div class="meniu">
        ' . $ico2 . '   <b> Busena: </b>' . ar_on($inf['nick']) . ' <br/>
        ';
                            if (in_array($apie[statusas], $statusai)) {
                                echo '' . $ico2 . '       <b> IP: </b>' . $inf['ip'] . ' | ' . salys($inf['ip']) . ' <a href="meniu.php?id=mod&ka=searchip3&ip=' . $inf['ip'] . '">[šį IP]</a><br/>';
                            } else {
                                echo '' . $ico2 . '       <b> IP: </b>' . $inf['ip'] . ' | ' . salys($inf['ip']) . '<br />';
                            }
                            echo '    </div>';
                            echo '    	<div class="meniuc"><b>Šis žaidėjas yra užsislaptinęs savo informaciją</b></div>
		';
                        } else {
                            echo '<div class="up" > <b>Pagrindinė informacija:</b></div> 
           <div class="meniu">
        ' . $ico2 . '   <b> Busena: </b>' . ar_on($inf['nick']) . ' <br />
       ' . $ico2 . '    <b> Nick: </b>' . statusas($inf['nick']) . ' (' . $sst . ')<br />
       ' . $ico2 . '    <b> Veikejas: </b>' . $inf['veikejas'] . '</b><br />
      
         ' . $nuotaika . '
       ' . $ico2 . '    <b> Lygis: </b>' . sk($inf['lygis']) . '<img src="img/bicons/lvl.png"/></b><br />
      


	   ' . $ico . ' <b>Priklauso komandai :</b> <a href="komanda.php?id=info&ka=' . $useris[team] . '">' . $useris[team] . '</a><br/>
 ' . $ico2 . '       <b> Susijunges: </b> ' . $su_kuo . '<br /></div>';
                            echo '  <div class="meniuc">Surinko išviso pinigų: <b>' . skaicius($inf['surinktapin']) . '<img src="img/bicons/pinigai.png"/></b>
<br>
Turi <b>LVL</b> kasimo: <b>' . skaicius($inf['kasimolvl']) . '</b>
</div>';


                            echo '  <div class="meniuc"> Turi unikalių veikėjų: [<font color="red"><small>' . sk($inf['kiek_unikaliu']) . '</small></font>/<small><b>41</b></small>]</div>';
                            if ($inv2['viplvl'] > 0) {
                                echo ' <div class="meniuc"> Turimas: <font color="red"><b>' . $inv2['viplvl'] . ' </b></font><font color="blue"><b> VIP Lygis</b></font></div>';
                            }
                            if ($inv2['viplvl'] == 0) {
                                echo ' <div class="meniuc">  Turimas: <font color="red"><b>0 </b></font><font color="blue"><b> VIP Lygis</b></font></div>';
                            }
                            if ($inf['antipl'] - time() > 0) {
                                echo '<div class="meniuc">Apsauga nuo puolimų galioja: <b>' . laikas($inf['antipl'] - time(), 1) . '</b></div>';
                            }
                            if ($inf['antipl'] - time() < 0) {
                                echo '<div class="meniuc"><b>Apsaugos nuo puolimų žaidėjas neturi!</b>';
                            }
                            echo '</div>';
                            echo '   <div class="up">  Eurai/kreditai/auksiniai/pinigai/exp</div>
  <div class="meniuc">
        <b>' . skaicius($inf['sms_litai'], 2) . ' </b><img src="img/bicons/euro.png"/> |
         <b> ' . skaicius($inf['kred']) . ' </b><img src="img/bicons/credit.png"/> |
              <b> ' . skaicius($inf['auksiniai']) . '  </b><img src="img/bicons/auxo.png"/> |
       <b> ' . skaicius($inf['litai']) . '   </b><img src="img/bicons/pinigai.png"/> | 
	   
              <b> ' . skaicius($inf['exp']) . ' </b><img src="img/bicons/exp.png"/>   <br />   
          </div>';

                            if ($inv['ki'] >= '1' && apsas($ka) != apsas(sajanas)) {
                                echo '<div class="up"> <b> Kovos skillai</b>:</div> <div class="line"></div> 
            <div class="meniu">
      ' . $ico2 . '    <b> Jėga:</b> ' . skaicius($inf['jega']) . '</b><br/>';
                                $gy = round(($inf['gynyba'] / 3));
                                $jo_kg = ($inf['jega'] >= $gy) ? $gy : $inf['jega'];


                                echo '' . $ico2 . '<b> Gynyba:</b> ' . skaicius($inf['gynyba']) . '</b><br/>
' . $ico2 . '<b> Gyvybes:</b> ' . sk($inf['gyvybes']) . '</b><br/>
            ' . $ico2 . '    <b> Kovinė galia:</b> ' . skaicius($jo_kg) . ' </b></div>';


                            }


                            $completedMissions = mysql_num_rows(mysql_query("SELECT * FROM user_daily_mission WHERE user_id = $inf[id] AND status = 'done'"));
                            echo '<div class="up" > <b>Veiksmai:</b>:</div> 
            <div class="meniuc">

<b> Šiandien <img src="img/bicons/attack1.png"/> </b>' . sk($inff['vksm']) . ' <img src="img/bicons/lyg.png"/>
         <b> Išviso  </b>' . skaicius($inf['veiksmai']) . ' <img src="img/bicons/attack1.png"/><br>
       
            <b> Laimėta arenoje: </b>' . $inf['laimeta'] . ' <img src="img/bicons/lyg.png"/>
 
      <b> Pralaimėta arenoje: </b>' . $inf['pralaimeta'] . '<br />
<b> Laimėta prieš žaidėjus: </b>' . $inf['laimetapl'] . ' <img src="img/bicons/lyg.png"/>
 
      <b> Pralaimėta prieš žaidėjus: </b>' . $inf['pralaimetapl'] . '<br />
</div>
  <div class="up">Pasiekimai:</div>
  <div class="meniu">
' . $ico2 . '  Vygdo:<b> ' . $inf[sagos] . ' iš 110  sagų</b><br>
' . $ico2 . '  Vygdo:<b> ' . $inf[kovu_misijos] . ' iš 151  kovų misijų</b><br>
' . $ico2 . '  Vygdo:<b> ' . $inf[namekm] . ' iš 51 namek misijų</b><br>
' . $ico2 . '  Vygdo:<b> ' . $inf[istorija] . ' iš 101 žaidimo istorijos misijų</b><br>
' . $ico2 . '  Vygdo:<b> ' . $inf[kasimom] . ' iš 11 kasimo misijų</b><br>
' . $ico2 . '  Įvykdė:<b> ' . $completedMissions . ' legendines dienos misijas</b><br>

' . $ico2 . '  Nugalėti bosai:<b> ' . $inf[nukirtobosu] . '</b>    <br>
       ' . $ico2 . '  Kritinio lygio:<b> ' . $inf[critical] . '</b>   
</div>';


                            $playerBuffsQuery = mysql_query("SELECT player_id, skills.icon as icon, skills.description as description, ends_at FROM player_skills JOIN skills ON player_skills.skill_id = skills.id WHERE player_id = '$inf[id]' AND ends_at > NOW() AND skills.category = 'buff' ORDER BY ends_at LIMIT 10");
                            if (mysql_num_rows($playerBuffsQuery)) {

                                echo '<div class="up">Buffai:</div>
  <div class="meniu">';
                                while ($playerBuff = mysql_fetch_assoc($playerBuffsQuery)) {
                                    echo '<div style="display: flex; align-items: center;">';
                                    echo '<img width="30" height="30" src="/img/skills/' . $playerBuff['icon'] . '" style="margin-right: 5px;">';
                                    $currentDate = new DateTime();
                                    $endDateObject = new DateTime($playerBuff['ends_at']);
                                    $timeDifference = $currentDate->diff($endDateObject);
                                    if ($timeDifference->i > 0) {
                                        $remainingTime = $timeDifference->format('%i min %s sec');
                                    } else {
                                        $remainingTime = $timeDifference->format('%s sec');
                                    }
                                    echo '<span>- ' . $playerBuff['description'] . '(' . $remainingTime . ')</span>';
                                    echo '</div>';
                                }
                                echo '</div>';
                            }
                            $infInv = mysql_fetch_assoc(mysql_query("SELECT * FROM inv WHERE nick='$inf[nick]'"));
                            if ($infInv['alavas'] || $infInv['titanas'] || $infInv['kvarcas']) {
                                echo '<div class="up">Turimos rūdos</div>';
                                echo '<div class="meniu">';

                                if ($infInv['alavas'] > 0) {
                                    echo $ico2 . '  Alavas:<b> ' . $infInv['alavas'] . '</b><br>';
                                }
                                if ($infInv['titanas'] > 0) {
                                    echo $ico2 . '  Titano:<b> ' . $infInv['titanas'] . '</b><br>';
                                }

                                if ($infInv['kvarcas'] > 0) {
                                    echo $ico2 . '  Kvarcas:<b> ' . $infInv['kvarcas'] . '</b><br>';
                                }
                                echo '</div>';
                            }

                            echo '
  <div class="up">Kita:</div>
  <div class="meniu">
     
     ' . $ico2 . '      <b> Užsiregistravo: </b>' . laikas($inf['uzsiregistravo']) . '<br />
 ';

                            echo '
        ' . $ico2 . '          <b> Paskutinis veiksmas: </b>' . laikas($inf[last]) . '<br />
     ';
                            $statusai = array("Mod", "Mod2", "Mod3", "Mod4", "Admin", "Kurejas");
                            if (in_array($apie[statusas], $statusai)) {
                                echo '' . $ico2 . '       <b> IP: </b>' . $inf['ip'] . ' | ' . salys($inf['ip']) . ' <a href="meniu.php?id=mod&ka=searchip3&ip=' . $inf['ip'] . '">[Patikrinti šį IP]</a><br/>';
                            }

                            $statusai = array("Mod", "Mod2", "Mod3", "Mod4", "Admin", "Kurejas");
                            if (in_array($apie[statusas], $statusai)) {
                                echo '' . $ico2 . '       <b> IP: </b>' . $inf['ip'] . ' | ' . salys($inf['ip']) . '<br />';
                            }


                            if (laikass($inf['vip'] - time(), 1) > 1) {
                                echo "" . $ico . "  Šis žaidėjas turi <b>VIP Privilegija</b>";
                            }


                        }
                        echo '    </div>';
                        echo '<div class="up"><b>Funkcijos</b>:</div> <div class="meniu"> ';
                        echo '   ' . $ico . '  <a href="?id=pulti&ka=' . $inf['nick'] . '">Pulti žaidėją</a><br />';


                        if ($statusas == "Admin" or $statusas == "Kurejas") {
                            echo '' . $ico . ' <a href="meniu.php?id=mod4&co=addban&wh=' . $inf['nick'] . '">Užblokuoti</a><br />';
                        }
                        if ($statusas == "Mod" or $statusas == 'Mod2' or $statusas == 'Mod3' or $statusas == 'vmod' or $statusas == 'Mod4') {
                            echo '' . $ico . ' <a href="meniu.php?id=mod&co=block&wh=' . $inf['nick'] . '">Užblokuoti</a><br />';
                        }
                        if ($statusas == "Mod3" or $statusas == 'Mod4' or $statusas == 'Admin' or $statusas == 'Kurejas') {

                            echo '   ' . $ico . ' <a href="meniu.php?id=mod3&ka=pm_logas&ID=' . $ka . '">Skaityti PM</a><br />';


                        }

                        echo '
                 ' . $ico . ' <a href="pagrindinis.php?id=usedaiktai&ka=' . $ka . '">Uždėti daiktai</a><br /> 
          
            ' . $ico . ' <a href="pagrindinis.php?id=pervedimai&ka=' . $ka . '">Pervedimai</a><br />
          ' . $ico . ' <a href="pagrindinis.php?id=pakvietimai&ka=' . $ka . '">Pakvietimai</a><br />
          
			
			
			
			' . $ico . '  <a href="?id=inf&ka=' . $inf['nick'] . '">' . $inf['nick'] . ' anketa</a><br/>
		' . $ico . '  <a href="?id=sta&ka=' . $inf['nick'] . '">Statistika</a><br/>
		
		
							' . $ico . '  <a href="?id=medaliai&ka=' . $inf['nick'] . '">Medaliai</a><br/>
			' . $ico . '  <a href="?id=draugai&ka=' . $inf['nick'] . '">Draugai (' . mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$ka'")) . ')</a><br>
	' . $ico . ' <a href="?id=komentarai&ka=' . $inf['nick'] . '">Komentarai (' . mysql_num_rows(mysql_query("SELECT * FROM `komentarai` WHERE `kas` = '" . $inf['nick'] . "'")) . ')</a>
</div>
		
		';
                        if ($statusas == "Kurejas") {
                            echo ' <div class="up">Kūrėjo Meniu</div>';
                        }

                        if ($statusas == "Kurejas") {
                            if (!empty($wh)) $ats = $wh;
                            echo ' <div class="meniu">' . $ico . '<a href="meniu.php?id=kurejas&ka=duotiv&wh=' . $inf['nick'] . '">Duoti resursų</a></div>';
                        }
                        if ($statusas == "Kurejas") {
                            echo '<div class="meniu">' . $ico . ' <a href="meniu.php?id=kurejas&ka=atimtiv&wh=' . $inf['nick'] . '">Atimti resursų</a></div>';
                        }
                        if ($statusas == "Kurejas") {
                            echo ' <div class="meniu">' . $ico . '<a href="meniu.php?id=kurejas&ka=veikeja&wh=' . $inf['nick'] . '">Duoti  veikėją</a></div>';
                        }
                        if ($statusas == "Kurejas") {
                            echo ' <div class="meniu">' . $ico . '<a href="meniu.php?id=kurejas&ka=duotidg&wh=' . $inf['nick'] . '">Duoti daigtų/item</a></div>';
                        }

                        if (!empty($ka)) $ats = $ka;
                        echo '<div class="up">PM Siuntimas</div>';
                        echo '<div class="titlec">
  <form action="pm.php?id=write&kam=' . $ka . '" method="post"/>
   Žinutė:<br />
   <textarea name="txt" rows="3"></textarea><br />
   <input type="submit" value="Siųsti"/>
   </div>';
                    }
                    echo '</div>';

                    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Apie $inf[nick]");
                    navigacija($g_n);


                }
            }


        }

    }
}
if ($id == 'medaliai') {
    top('' . $ka . ' medaliai');
    echo '<div class="meniuc">';
    if (mysql_num_rows(mysql_query("SELECT * FROM medaliai WHERE nick='$ka'")) == 0) {
        echo 'Medalių neturi';
    } else {
        $qq = mysql_query("SELECT * FROM medaliai WHERE nick='$ka'");
        while ($rr = mysql_fetch_assoc($qq)) {

            echo '<a href="?id=medal&ka=' . $ka . '&ID=' . $rr[id] . '"><img src="img/' . $rr[medalis] . '.png" width="30" height="30"/></a>';

        }
    }
    echo '</div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Medaliai");
    navigacija($g_n);
}
if ($id == 'usedaiktai') {
    top('' . $ka . '  uždėti daiktai');
    echo '<div class="meniuc">
' . $ico2 . ' Kardas:  <b>' . $inf[sword] . ' </b>  </br>
' . $ico2 . ' Šarvai:  <b>' . $inf[armor] . ' </b> <br>
' . $ico2 . ' Amuletas:  <b>' . $inf[amuletas] . ' </b></div>
';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Uždėti daiktai");
    navigacija($g_n);
}


if ($id == 'pulti') {
    top(' Puolimas prieš ' . $ka . ' ');

    echo '<div class="meniuc">Užpuolę žaidėją, ir jį nugalėję, gausite <b>' . $vipt . '</b>!<br>Norint laimėti tavo ' . $jegai . ' turi būti didesnė nei priešo ' . $gynybai . '!<br>Pralaimėdami prarasite visas ' . $hpi . '!<br><b>Pulti galima kas 6 valandas!</div>';
    echo '<div class="meniuc">';
    echo 'Ar tikrai norite pulti?<br>
<a href="?id=pulti2&ka=' . $ka . '">Taip</a>|<a href="pagrindinis.php?id=">Ne</a>';


    echo '</div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka='.$ka.'", "Apie $ka", "Žaidėjo užpuolimas");
    navigacija($g_n);
}

if ($id == 'pulti2') {
    top(' Užpuolei žaidėją ' . $ka . ' ');
    if ($gyvybes <= 0) {
        echo '<div class="meniuc">Jūs neturite <b>' . $hp . '</b>!</div>';
    } elseif ($inf['gyvybes'] <= 0) {
        echo '<div class="meniuc">Priešas neturi <b>' . $hp . '</b>!</div>';
    } elseif ($lygis < 30) {
        echo '<div class="meniuc">Pulti galima tik nuo 30<b> lygio</b>!</div>';
    } elseif ($inf['lygis'] < 30) {
        echo '<div class="meniuc">Norint užpulti priešo lygis turi siekti bent<b> 30</b>!</div>';
    } elseif ($lygis < 10 and $inf['lygis'] > 20) {
        echo '<div class="meniuc">Lygio skirtumas per didelis</b>!</div>';
    } elseif ($apie['pllaikas'] - time() > 0) {
        echo '<div class="meniuc">Galėsi pulti už <font color="red"><b>' . laikas($apie['pllaikas'] - time(), 1) . '</b></font></div>';
    } elseif ($apie['antipl'] - time() > 0) {
        echo '<div class="meniuc"><font color="red"><b>Turint apsaugą nuo puolimų, pulti megalima</b></font>!</div>';
    } elseif ($inf['antipl'] - time() > 0) {
        echo '<div class="meniuc"><font color="red"><b>Šis žaidėjas turi apsaugą nuo puolimų</b></font>!</div>';
    } else {
        if ($jega > $inf['gynyba']) {


            echo '<div class="meniuc"><img src="img/veikejai/' . $apie['veikejas'] . '-' . $apie[trans] . '.png" alt="*"></div>';
            echo '<div class="meniuc">Užpuolei žaidėją, ir jį nugalėjai, gavote <b>5000 ' . $vipt . '</b>!</div>';
            echo '<div class="meniuc">';
            echo 'Tu <b>laimėjai šią kovą</b>!<br>';
            /*echo'Tavo '.$jega.' '.$jegai.' <br>VS <br> <b>'.$ka.'</b> '.sk($inf['gynyba']).' '.$gynybai.' ';*/
            echo 'Pulti galėsi už <b>6</b> valandų!';
            $timxx = time() + 3600 * 6;
            mysql_query("UPDATE zaidejai SET gyvybes='0' WHERE nick='$inf[nick]'");
            mysql_query("UPDATE zaidejai SET  pralaimetapl=pralaimetapl+'1' WHERE nick='$inf[nick]' ");
            mysql_query("UPDATE zaidejai SET pllaikas='$timxx', vipticket=vipticket+'5000', laimetapl=laimetapl+'1' WHERE nick='$nick' ");
            $txt = "Tave užpuolė <b>$nick</b>, ir tu <b>Pralaimėjai</b>, praradai visas<b></b>$hp ! ";
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$txt', time='" . time() . "', nauj='NEW', gavejas='$inf[nick]' ");

            echo '</div>';
        }


        if ($jega < $inf['gynyba']) {
            echo '<div class="meniuc"><img src="img/veikejai/' . $apie['veikejas'] . '-' . $apie[trans] . '.png" alt="*"></div>';
            echo '<div class="meniuc">Pralaimejai!<br>Praradai visas ' . $hp . '!<br>Pulti galėsi už <b>1</b> valandos!<br>Priešas už laimėjimą gavo <b>2500</b> ' . $vipt . ' !</div>';
            mysql_query("UPDATE zaidejai SET gyvybes='0', pralaimetapl=pralaimetapl+'1' WHERE nick='$nick'");
            mysql_query("UPDATE zaidejai SET laimetapl=laimetapl+'1' WHERE nick='$inf[nick]'");
            $timxx = time() + 3600;

            mysql_query("UPDATE zaidejai SET pllaikas='$timxx', vipticket=vipticket+'2500' WHERE nick='$inf[nick]' ");
            $txt = "Tave užpuolė <b>$nick</b>, bet tu <b>Laimėjai</b>, gavai <b>2500</b>$vipt ! ";
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$txt', time='" . time() . "', nauj='NEW', gavejas='$inf[nick]' ");

        }
    }


//// test

///
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka='.$ka.'", "Apie $ka", "Žaidėjo užpuolimas");
    navigacija($g_n);
} elseif ($id == "inf") {
    if (apsas($ka) == apsas($nick)) {
        online('zaidejo informacijoj');
        top('Informacijos keitimas');

        echo '
           <div class="meniu">
            ' . $ico2 . '<b> Vardas: </b>' . $apie['vardas'] . ' <br />
             ' . $ico2 . '<b> Amžius: </b>' . $apie['amzius'] . ' <br />
               ' . $ico2 . '<b> Miestas: </b>' . $apie['miestas'] . ' <br />
                ' . $ico2 . '<b> Aprašymas: </b>' . $apie['aprasymas'] . ' <br />
                  ' . $ico2 . '<b> Lytis: </b>' . $apie['litis'] . ' <br />
         ' . $ico . ' <a href="?id=keistiinf&ka=' . $nick . '">Keisti</a></div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$nick", "Apie $nick", "Informacijos keitimas");
        navigacija($g_n);

    }
    if (apsas($ka) != apsas($nick)) {
        $inf = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'"));
        online('Žiūri <b>' . $inf['nick'] . '</b> informacija');
        if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {
            top('Klaida!');
            echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Klaida");
            navigacija($g_n);
        } else {
            online('zaidejo informacijoj');

            top("$inf[nick] Informacija");

            echo '
           <div class="meniu">
            ' . $ico2 . ' Vardas: ' . $inf['vardas'] . ' <br />
             ' . $ico2 . ' Amžius: ' . $inf['amzius'] . ' <br />
          ' . $ico2 . ' Miestas: ' . $inf['miestas'] . ' <br />
         ' . $ico2 . '  Aprašymas: ' . $inf['aprasymas'] . ' <br />
         ' . $ico2 . '  Lytis: ' . $inf['litis'] . ' <br />
          </div>
          
          
          ';


            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$inf[nick]", "Apie $inf[nick]", "$ka informacija");
            navigacija($g_n);

        }
    }
} elseif ($id == "sta") {
    if (apsas($ka) == apsas($nick)) {
        online('zaidejo informacijoj');
        top("$ka statistika");
        echo '
           <div class="meniu">
            ' . $ico . '<b> Chate žinučiu: </b>' . $apie['chate'] . ' <br />
             ' . $ico . '<b> Viktorinoj žinučiu: </b>' . $apie['vikte'] . ' <br />
     
             
          </div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$inf[nick]", "Apie $inf[nick]", "$ka statistika");
        navigacija($g_n);
    }
    if ($ka != $nick) {
        $inf = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'"));
        online('Žiūri <b>' . $inf['nick'] . '</b> informacija');
        top("$ka statistika");
        if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {

            echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Klaida");
            navigacija($g_n);
        } else {
            online('zaidejo informacijoj');


            echo '
           <div class="meniu">
          ' . $ico . '<b> Chate žinučiu: </b>' . $inf['chate'] . ' <br />
             ' . $ico . '<b> Viktorinoj žinučiu: </b>' . $inf['vikte'] . ' <br />
             
          </div>
          
          
          ';


            $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$inf[nick]", "Apie $inf[nick]", "$ka statistika");
            navigacija($g_n);

        }
    }
}
if ($id == 'inventorius') {
    top("$ka inventorius");
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {

        echo '<div class="meniuc">Tokio žaidėjo nėra </div>';

    } elseif (empty($inf[inv_rodymas]) or $inf[inv_rodymas] == 0) {

        echo '<div class="meniuc"> ' . statusas($ka) . ' užsislaptines inventoriaus rodymą</div>';

    } else {
        $inv_kito = mysql_fetch_assoc(mysql_query("SELECT * FROM inv WHERE nick='$ka'"));
        echo '<div class="meniu">';
        if ($inv_kito['Dball'] > 0) {
            echo '' . $ico2 . ' Drakono rutuliai: <b>' . $inv_kito['Dball'] . '</b><br/>';
        }
        if ($inv_kito['Jball'] > 0) {
            echo '' . $ico2 . ' Juodieji drakono rutuliai: <b>' . $inv_kito['Jball'] . '</b><br/>';
        }
        if ($inv_kito['Nball'] > 0) {
            echo '' . $ico2 . ' Namek drakono rutuliai: <b>' . $inv_kito['Nball'] . '</b><br/>';
        }
        if ($inv_kito['Microshem'] > 0) {
            echo '' . $ico2 . ' Microshem: <b>' . $inv_kito['Microshem'] . '</b><br/>';
        }
        if ($inv_kito['Fusionfail'] > 0) {
            echo '' . $ico2 . ' Fusion fail: <b>' . $inv_kito['Fusionfail'] . '</b><br/>';
        }
        if ($inv_kito['Sayiantail'] > 0) {
            echo '' . $ico2 . ' Sayian tail: <b>' . $inv_kito['Sayiantail'] . '</b><br/>';
        }
        if ($inv_kito['Stone'] > 0) {
            echo '' . $ico2 . ' Stone: <b>' . $inv_kito['Stone'] . '</b><br/>';
        }
        if ($inv_kito['Soul'] > 0) {
            echo '' . $ico2 . ' Soul: <b>' . $inv_kito['Soul'] . '</b><br/>';
        }
        if ($inv_kito['Energystone'] > 0) {
            echo '' . $ico2 . ' Energy stone: <b>' . $inv_kito['Energystone'] . '</b><br/>';
        }
        if ($inv_kito['Pragarovaisius'] > 0) {
            echo '' . $ico2 . ' Pragaro vaisius: <b>' . $inv_kito['Pragarovaisius'] . '</b><br/>';
        }
        if ($inv_kito['Majinsroll'] > 0) {
            echo '' . $ico2 . ' Majin sroll: <b>' . $inv_kito['Majinsroll'] . '</b><br/>';
        }
        if ($inv_kito['Goldstone'] > 0) {
            echo '' . $ico2 . ' Gold stone: <b>' . $inv_kito['Goldstone'] . '</b><br/>';
        }
        if ($inv_kito['Magicball'] > 0) {
            echo '' . $ico2 . ' Magic ball: <b>' . $inv_kito['Magicball'] . '</b><br/>';
        }
        if ($inv_kito['Powerstone'] > 0) {
            echo '' . $ico2 . ' Power stone: <b>' . $inv_kito['Powerstone'] . '</b><br/>';
        }
        if ($inv_kito['Pupos'] > 0) {
            echo '' . $ico2 . ' Stebuklingos pupos: <b>' . $inv_kito['Pupos'] . '</b>';
        }
        if ($inv_kito['Malkos'] > 0) {
            echo '' . $ico2 . ' Malkos: <b>' . $inv_kito['Malkos'] . '</b><br/>';
        }
        if ($inv_kito['Mazosmalkos'] > 0) {
            echo '' . $ico2 . ' Mažos malkos: <b>' . $inv_kito['Mazosmalkos'] . '</b><br/>';
        }
        if ($inv_kito['Zuvis'] > 0) {
            echo '' . $ico2 . ' Zuvis: <b>' . $inv_kito['Zuvis'] . '</b><br/>';
        }
        if ($inv_kito['Mazazuvis'] > 0) {
            echo '' . $ico2 . ' Maža zuvis: <b>' . $inv_kito['Mazazuvis'] . '</b><br/>';
        }
        if ($inv_kito['radaras'] > 0) {
            echo '' . $ico2 . ' Radaras: <b>' . $inv_kito['radaras'] . '</b><br/>';
        }
        if ($inv_kito['ki'] > 0) {
            echo '' . $ico2 . ' Kovinės galios matuoklis: <b>' . $inv_kito['ki'] . '</b><br/>';
        }
        if ($inv_kito['zkardas'] > 0) {
            echo '' . $ico2 . ' Z kardas<br/>';
        }

        echo '</div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "$ka inventorius");
    navigacija($g_n);
} elseif ($id == "komentarai") {
    if (apsas($ka) == apsas($nick)) {
        online('' . ($ka) . ' Komentaruose');
        top("$ka komentarai");
        $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM komentarai WHERE `kas` = '$ka'"), 0);

        $rezultatu_rodymas = 10;
        $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;
        $query = "SELECT * FROM komentarai WHERE `kas` = '$nick' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas";

        $puslapiu = ceil($viso / $rezultatu_rodymas);

        echo '
			<div class="meniuc">
			<form action="?id=komentarai2&ka=' . $ka . '" method="POST">
			Komentaras:<br/>
				<input type="text" name="komentaras" maxlenght="350"><br/>
				<input type="Submit" Value="Rašyti">
			</form>
			</div>
			<div class="title">
				';
        //$query = "SELECT * FROM `komentarai` WHERE `kas` = '".$nick."' ORDER BY `id` DESC LIMIT 30";

        $mquery = mysql_query($query);

        if (@mysql_num_rows($mquery) == 0) {
            echo " Tuščia<br/>";
        } else {
            while ($komentarai = mysql_fetch_assoc($mquery)) {
                echo ++$nr . '. <a href="?id=apie&ka=' . $komentarai['kas2'] . '">' . statusas($komentarai['kas2']) . '</a>: ' . smile($komentarai['komentaras']) . ' <small>[' . $komentarai['laikas'] . ']</small><a href="?id=kom_del&ka=' . $nick . '&ID=' . $komentarai[id] . '">[x]</a><br/>';
            }
        }
        echo '
			</div>
		';
        echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=komentarai&ka=' . $ka . '') . '</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$nick", "Apie $nick", "$ka komentarai");
        navigacija($g_n);

    } else {
        online('' . $ka . ' Komentaruose');
        top("$ka komentaruose");
        $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM komentarai WHERE `kas` = '$ka'"), 0);

        $rezultatu_rodymas = 10;
        $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;
        $query = "SELECT * FROM komentarai WHERE `kas` = '$ka' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas";

        $puslapiu = ceil($viso / $rezultatu_rodymas);

        echo '
		
			<div class="meniuc">
			<form action="?id=komentarai2&ka=' . $ka . '" method="POST">
			Komentaras:<br/>
				<input type="text" name="komentaras" maxlenght="350"><br/>
				<input type="Submit" Value="Rašyti">
			</form>
			</div>
			<div class="title">
				';
        $query = "SELECT * FROM `komentarai` WHERE `kas` = '$ka' ORDER BY `id` DESC LIMIT $nuo_kiek,$rezultatu_rodymas";
        $mquery = mysql_query($query);

        if (@mysql_num_rows($mquery) == 0) {
            echo " Tuščia<br/>";
        } else {
            while ($komentarai = mysql_fetch_assoc($mquery)) {
                echo ++$nr . ". <a href='?id=apie&ka=" . $komentarai['kas2'] . "'>" . statusas($komentarai['kas2']) . "</a>: " . smile($komentarai['komentaras']) . " <small>[" . $komentarai['laikas'] . "]</small>
							<br/>";
            }
        }
        echo '
			</div>
		';
        echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=komentarai&ka=' . $ka . '') . '</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$inf[nick]", "Apie $inf[nick]", "$ka komentarai");
        navigacija($g_n);
    }

}
if ($id == 'kom_del') {
    if (mysql_num_rows(mysql_query("SELECT * FROM komentarai WHERE id='$ID' AND kas='$nick'")) == 0) {


        header('location:pagrindinis.php?id=komentarai&ka=' . $ka . '');
    } elseif ($nick != $ka) {
        header('location:pagrindinis.php?id=komentarai&ka=' . $ka . '');

    } else {
        mysql_query("DELETE FROM komentarai WHERE id ='$ID'");
        header('location:pagrindinis.php?id=komentarai&ka=' . $ka . '');
    }

} elseif ($id == "komentarai2") {
    if (isset($_POST['komentaras'])) {
        online('' . $ka . ' Komentaruose');
        top('Komentaro rašymas');
        $kom = post($_POST['komentaras']);
        if (strlen($kom) < 2) {
            echo '<div class="meniuc">
			Komentaras per trumpas</div>';
        } elseif ($lygis < 30) {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 30 lygio.</div>';
        } elseif ($gaves == "+") {
            echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

        } elseif ($apie[veiksmai] < 5000) {
            echo '<font color="meniuc">Rašyti galima nuo 5000 padarytų veiksmų!</div><br/>';


        } else {
            echo '<div class="meniuc">';
            echo "Parašyta!<br/></div>";
            mysql_query("INSERT INTO `komentarai` (`kas`, `kas2`, `komentaras`, `laikas`, `time`) VALUES ('$ka', '$nick', '$kom', '" . date("Y-m-d H:i:s") . "', '" . time() . "')") or die(mysql_error());
            $txt = "" . $nick . " Parašė jums komentarą!";
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$txt', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        }
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$inf[nick]", "Apie $inf[nick]", "$ka kometarai");
        navigacija($g_n);
    }
} elseif ($id == "dtop") {
    online('Dienos tope');
    top("Dienos kovų topas");
    $prizas = $nust['dtop_priz'];
    $dtop2 = mysql_fetch_assoc(mysql_query("SELECT * FROM dtop WHERE nick='$nick'"));

    echo '
<div class="meniuc">
<img src="img/imgg/topas.png" /></div>
    <div class="meniuc" >
     <b>1</b>. <img src="img/bicons/gold.png" /> - <b>' . sk($prizas) . '</b> <img src="img/bicons/vipt.png">!<br />
    <b>2</b>. <img src="img/bicons/silver.png" /> - <b>' . sk(round($prizas / 2)) . '</b> <img src="img/bicons/vipt.png">!<br />
     <b>3</b>. <img src="img/bicons/bronze.png" /> - <b>' . sk(round($prizas / 3)) . '</b> <img src="img/bicons/vipt.png">!<br />
    </div><div class="title">
    ' . $ico . ' <a href="?id=didinti_priza">Didinti D.TOP prizą</a><br />
    </div>';
    echo '
    <div class="title">
    &raquo; Dienos topas baigiasi lygiai <b>00:00</b> , tada visi jūsų veiksmai anuliuojasi ir vėl galėsite varžytis dėl prizo.<br />
    &raquo; Norėdami būti dienos tope turite kovoti.<br />
      
    </div><div class="meniuc"><img src="img/bicons/gold2.png" /> Dienos rekordas<font color="red"> <b>' . sk($nust[dtop_rek]) . ' <img src="img/bicons/attack1.png"></b></font>  --  <b>' . statusas($nust[dtop_rek_n]) . '.</b><br /></div>';
    echo '<div class="up"> <b>Šiandienos TOP 5</b>:</div><div class="line"></div>';


    $query = mysql_query("SELECT * FROM dtop ORDER BY vksm DESC LIMIT 0,5");
    echo '<div class="meniu">';
    while ($row = mysql_fetch_assoc($query)) {
        $vt++;
        if ($row['nick'] == $nust['last']) {
            $last_nick = '<s>' . $row['nick'] . '</s>';
        } else {
            $last_nick = '' . $row['nick'] . '';
        }
        echo ' <b>' . $vt . '</b>. <a href="?id=apie&ka=' . $row['nick'] . '">' . statusas($last_nick) . '</a>  --    <b>' . sk($row['vksm']) . '</b>
<img src="img/bicons/attack1.png">
</font></b><br>';

    }
    echo '</div>';
    echo '<div class="line"></div>';
    echo '<div class="meniuc">Jūsų veiksmai:  <b> ' . sk($dtop2['vksm']) . '</b> <img src="img/bicons/attack1.png" /></div>';


    echo '<div class="up"> <b>Paskutinis laimėtojas:</b>:</div><div class="line"></div>';


    $query = mysql_query("SELECT * FROM dtop_log ORDER BY id DESC LIMIT 1");
    echo '<div class="meniuc">';
    while ($row = mysql_fetch_assoc($query)) {

        echo ' <b><img src="img/bicons/gold.png" /> ' . $row['nick'] . '</b>
<br/>';

    }
    echo '</div>';

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Kovų dienos topas");
    navigacija($g_n);

} elseif ($id == "didinti_priza2") {
    online('Didina D.TOP prizą');
    top('Dienos topo didinimas');

    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;

        if ($kieks < 500) {
            $klaida = "Mažiausia suma 500 ticketu.";
        }
        if ($apie['vipticket'] < $kieks) {
            $klaida = "Neturi tiek ticket";
        }
        if (empty($kieks)) {
            $klaida = "Palikai tuščia laukelį.";
        }

        if ($klaida != "") {
            echo '<div class="meniuc">' . $klaida . '</div>';
        } else {
            mysql_query("UPDATE nustatymai SET dtop_priz=dtop_priz+'$kieks' ");
            mysql_query("UPDATE zaidejai SET vipticket=vipticket-'$kieks' WHERE nick='$nick' ");
            echo '<div class="meniuc">D.TOP prizą padidinai <b>' . sk($kieks) . '</b> Vip Ticket.</div>';
        }
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=dtop", "Dienos topas", "Dienos topo prizo didinimas");
    navigacija($g_n);
} elseif ($id == "didinti_priza") {
    online('Didina D.TOP prizą');
    top('Dienos topo didinimas');
    echo '<div class="meniuc">
<img src="img/imgg/topas.png" /></div>';

    echo '<div class="meniuc">
    <form action="?id=didinti_priza2" method="post">
    Kiek didinsi prizą:<br/><input type="text" name="kieks"><br/>
    <input type="submit" name="submit" value="Didinti">
    </form></div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=dtop", "Dienos topas", "Dienos topo prizo didinimas");
    navigacija($g_n);

} elseif ($id == "keisti") {
    online('Keicia topic');
    top('Topic keitimas');
    echo '<div class="meniuc">
     Topic\'o keitimas jums kainuos 10 kreditu.</div>';
    echo '<div class="titlec">
    <form action="pagrindinis.php?id=keisti2" method="post"/>
    Topic\'as:<br /><textarea name="zinute" rows="3"></textarea><br />
    <input type="submit" name="submit" value="Keisti"/></form>
    </div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Topic keitimas");
    navigacija($g_n);
} elseif ($id == "keisti2") {
    online('Keicia topic');
    top('Topic keitimas');


    if (isset($_POST['submit'])) {
        $zinute = post($_POST['zinute']);
        if (empty($zinute)) {
            echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
        } elseif ($apie['lygis'] < 50) {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 50 lygio.</div>';
        } elseif ($gaves == "+") {
            echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

        } elseif ($apie[kred] < 10) {
            echo '<div class="meniuc">Neužtenka kreditu! Reikia <b>10</b>.</div>';


        } else {
            $tm = time() + 20;
            mysql_query("INSERT INTO topic SET message='$zinute', kas='$nick', time='" . time() . "', time2='$tm' ");
            mysql_query("UPDATE zaidejai SET kred=kred-10 WHERE nick='$nick'");
            echo '<div class="meniuc">Topic\'as sėkmingai pakeistas.</div>';
        }
    }

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Topic keitimas");
    navigacija($g_n);
} elseif ($id == "history") {
    top("Topic istorija");
    echo '<div class="meniu">';
    $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM topic"), 0);
    if ($viso > 0) {
        $rezultatu_rodymas = 10;
        $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;
        $q = mysql_query("SELECT * FROM topic ORDER BY id DESC LIMIT 10");
        $puslapiu = ceil($viso / $rezultatu_rodymas);
        while ($row = mysql_fetch_assoc($q)) {

            $vt++;
            echo ' <b>' . $vt . '.</b> ' . smile($row['message']) . ' (' . statusas($row['kas']) . ')<br/>
                     ';
            unset($row);


        }
        echo '</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Topic istorija");
        navigacija($g_n);

    }
} elseif ($id == "news") {
    $row = mysql_query("SELECT * FROM news");


    online('Skaito naujienas');
    top('Atnaujinimai');
    $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM news"), 0);
    echo '<div class="meniuc"> Viso atnaujinimų [' . $viso . '+<font color="red"><b>' . $nust['sndnew'] . '</b></font>]</div>';
    if ($viso > 0) {
        $rezultatu_rodymas = 7;
        $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
        if (empty($psl) or $psl < 0) $psl = 1;
        if ($psl > $total) $psl = $total;
        $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;
        $q = mysql_query("SELECT * FROM news ORDER BY id DESC LIMIT $nuo_kiek, $rezultatu_rodymas");
        $puslapiu = ceil($viso / $rezultatu_rodymas);
        while ($row = mysql_fetch_assoc($q)) {
            echo '<div class="meniu">
           ' . $ico . '  <b>Atnaujinimas</b>: ' . smile($row['name']) . '</a><br/>';
            if ($row['new']) {
                echo '' . $ico . '  <b>Plačiau</b>: ' . smile($row['new']) . '</a><br/>';
            }
            echo '
           ' . $ico . '   <b>Atliko atnaujinimą</b> : ' . statusas($row[kas]) . '<br/>
           ' . $ico . '   <b>Data</b> : ' . laikas($row['data']) . '</br>
          ' . $ico . '    <b>Įvertinimas</b>:   <a href=?id=nrep&co=1&ka=' . $row['id'] . '><img src="img/replike.gif"></a>' . $row['likes'] . ' <a href=?id=nrep&co=2&ka=' . $row['id'] . '><img src="img/repdislike.gif"></a>' . $row['unlike'] . '
            
        
            
         
            
            </div>';
            $nau = mysql_query("SELECT * FROM news WHERE id=$id");
            $vert = $nau['likes'] - $nau['unlike'];
        }

        echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=news') . '</div>';


    } else {
        echo '<div class="meniuc"><font color="red">Atnaujinimų nėra!</font></div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Naujienos");
    navigacija($g_n);

} elseif ($id == "nrep") {
    top("Naujienos vertinimas");
    $tr = mysql_num_rows(mysql_query("SELECT * FROM news"));
    $ta = mysql_fetch_assoc(mysql_query("SELECT * FROM news_rep"));
    if ($lygis < 30) {

        echo '<div class="meniuc">Reputacija galim duoti nuo 30 lygio!</div>';
    } elseif ($co > 2 or $co < 1) {

        echo '<div class="meniuc">ERROR!</div>';
    } elseif (mysql_num_rows(mysql_query("SELECT * FROM news_rep WHERE kas='$nick' && kam='$ka'"))) {

        echo '<div class="meniuc">Tu jau vertinai šią naujieną!</div>';


    } else {

        if ($co == 1) {

            mysql_query("UPDATE news SET likes=likes+'1' WHERE id='$ka'");

        } else {

            mysql_query("UPDATE news SET unlike=unlike-'1' WHERE id='$ka'");

        }
        echo '<div class="meniuc">Atlikta</div>';

        mysql_query("INSERT INTO news_rep SET kas='$nick', kam='$ka'") or die(mysql_error());
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Naujienos vertinimas");
    navigacija($g_n);


} elseif ($id == "taskai") {
    online('Naudoja Lygio taškus');
    top('Lygio taškai');
    if ($taskai > 0) {
        $tjeg = getInt(($taskai * (getInt($apie['jega']) / 100)));
        $tgyn = getInt(($taskai * (getInt($apie['gynyba']) / 100)));
        $tgyv = getInt(($taskai * (getInt($apie['max_gyvybes']) / 100)));
        $micro = (int)($apie['lygis'] * 0.1) * $taskai;
        echo '<div class="meniuc">Sunaudojai <b>' . sk($taskai) . '</b> lygio taškų!<br/>Gavai <b>' . skaicius($tjeg) . '</b> Jėgos, <b>' . skaicius($tgyn) . '</b> Gynybos ir <b>' . skaicius($tgyv) . '</b> Gyvybių lygio.</div>';
        echo '<div class="meniuc"> Gavai mikroschemų:  <b>' . skaicius($micro) . '</b> </div>';
        mysql_query("UPDATE zaidejai SET jega=jega+'$tjeg', gynyba=gynyba+'$tgyn', max_gyvybes=max_gyvybes+'$tgyv', taskai='0' WHERE nick='$nick' ");
        mysql_query("UPDATE inv SET Microshem=Microshem+'$micro' WHERE nick='$nick'");
    } else {
        echo '<div class="meniuc">Neturi lygio taškų!</div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Lygio taškai");
    navigacija($g_n);


} elseif ($id == "chests") {
    online('Atidarinėja skrynias');
    top('Skrynios');
    $chestDrops = mysql_query("SELECT * FROM player_chest_drops WHERE player_id = '$apie[id]' AND opened_at IS NULL AND expires_at > NOW() LIMIT 5") or die(mysql_error());
    while ($chestDrop = mysql_fetch_assoc($chestDrops)) {
        echo '<div class="meniu">';
        echo $chest;
        $givenDate = $chestDrop['expires_at'];
        $currentDate = new DateTime();
        $targetDate = new DateTime($givenDate);
        $interval = $currentDate->diff($targetDate);
        $minutesLeft = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;

        if ($interval->invert) {
            $minutesLeft = 0;
        }
        echo ' <a href="pagrindinis.php?id=chests2&ka=' . $chestDrop['id'] . '">' . $chestDrop['type'] . '</a>(baigia galioti po: ' . $minutesLeft . ' min)';
        echo '</div>';
    }

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Skrynios");
    navigacija($g_n);

} elseif ($id === "chests2") {
    online('Atidarinėja skrynias');
    top('Skrynios atidarymas');

    if (!$ka) {
        echo '<div class="meniuc">Skrynia nerasta</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Skrynios");
        navigacija($g_n);
        return;
    }

    $chest = mysql_fetch_assoc(mysql_query("SELECT * FROM player_chest_drops WHERE id = '$ka' AND player_id = '$apie[id]' AND opened_at IS NULL AND expires_at > NOW()"));
    if (!$chest) {
        echo '<div class="meniuc">Skrynia nerasta</div>';
        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Skrynios");
        navigacija($g_n);
        return;
    }

    $message = 'Žaidėjas ' . $nick . ' atidarė <font color="red">' . $chest['type'] . '</font> retumo skrynią. ';
    $chestContents = mysql_query("SELECT * FROM player_chest_drop_contents WHERE chest_drop_id = '$ka'");
    while ($chestContent = mysql_fetch_assoc($chestContents)) {
        echo '<div class="meniu">';
        if ($chestContent['name'] === 'fish') {
            echo 'Žuvies: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET Zuvis=Zuvis+'$chestContent[amount]' WHERE nick='$nick' ");
            $message .= ' Gavo: ' . $chestContent['amount'] . ' žuvies.';
        }
        if ($chestContent['name'] === 'wood') {
            echo 'Malkų: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET Malkos=Malkos+'$chestContent[amount]' WHERE nick='$nick' ");
        }
        if ($chestContent['name'] === 'quartzOre') {
            echo 'Kvarco rūdos: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET kvarcas=kvarcas+'$chestContent[amount]' WHERE nick='$nick' ");
            $message .= ' Gavo: ' . $chestContent['amount'] . ' kvarco rūdos.';
        }
        if ($chestContent['name'] === 'deathArmour') {
            $amount = $chestContent['amount'];
            echo 'Mirties armour: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET mirties_armor=mirties_armor+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' mirties armour.';
        }
        if ($chestContent['name'] === 'infinitySword') {
            $amount = $chestContent['amount'];
            echo 'Infinity sword: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET infinity_sword=infinity_sword+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' infinity sword.';
        }
        if ($chestContent['name'] === 'deathSword') {
            $amount = $chestContent['amount'];
            echo 'Mirties sword: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET mirties_sword=mirties_sword+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' mirties sword.';
        }
        if ($chestContent['name'] === 'deathAmulet') {
            $amount = $chestContent['amount'];
            echo 'Mirties amulet: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET mirties_amulet=mirties_amulet+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' mirties amulet.';
        }
        if ($chestContent['name'] === 'revivalAmulet') {
            $amount = $chestContent['amount'];
            echo 'Atgimimo amulet: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET atgimimo_amulet=atgimimo_amulet+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' atgimimo amulet.';
        }
        if ($chestContent['name'] === 'destructionAmulet') {
            $amount = $chestContent['amount'];
            echo 'Naikinimo amulet: ' . $chestContent['amount'];
            mysql_query("UPDATE inv SET naikinimo_amulet=naikinimo_amulet+'$amount' WHERE nick='$nick'");
            $message .= ' Gavo: ' . $amount . ' naikinimo amulet.';
        }
        echo '</div>';
    }

    if ($chest['type'] !== 'common') {
        $expiresAt = date('Y-m-d H:i:s', strtotime(' + 1 hours'));
        $insert1 = mysql_query("INSERT INTO pokalbiai SET nick='SISTEMA', sms='$message', data='" . time() . "', expired_at='$expiresAt'");
    }

    mysql_query("UPDATE player_chest_drops SET opened_at=NOW() WHERE id='$ka' ");

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Skrynios");
    navigacija($g_n);

} elseif ($id == "rep") {
    online('Deda ' . $ka . ' REP');
    if ($lygis < 30) {
        echo '<div class="up">REP DAVIMAS</div>';
        echo '<div class="meniuc">Reputacija galim duoti nuo 30 lygio!</div>';
    } elseif ($co > 2 or $co < 1) {
        echo '<div class="up">REP DAVIMAS</div>';
        echo '<div class="meniuc">Tokios reputacijos nėra!</div>';
    } elseif (!mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'"))) {
        echo '<div class="up">REP DAVIMAS</div>';
        echo '<div class="meniuc">Toks žaidėjas neegzistuoja!</div>';
    } elseif (mysql_num_rows(mysql_query("SELECT * FROM rep WHERE kas='$nick' && kam='$ka'"))) {
        echo '<div class="up">REP DAVIMAS</div>';
        echo '<div class="meniuc">Šiam žaidėjui jau davei reputacijos!</div>';
    } elseif (apsas($ka) == apsas($nick)) {
        echo '<div class="up">REP DAVIMAS</div>';
        echo '<div class="meniuc">Sau reputacijos dėti negalimą!</div>';
    } else {

        if ($co == 1) {
            $txt = '' . $nick . ' Tau uždėjo + REP.';
            mysql_query("UPDATE zaidejai SET rep_teig=rep_teig+'1' WHERE nick='$ka'");
            $cos = '+';
        } else {
            $txt = '' . $nick . ' Tau uždėjo - REP.';
            mysql_query("UPDATE zaidejai SET rep_neig=rep_neig-'1' WHERE nick='$ka'");
            $cos = '-';
        }
        echo '<div class="meniuc">Žaidėjui <b>' . statusas($ka) . '</b> davėte <b>' . $cos . '</b> REP!</div>';
        mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$txt', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        mysql_query("INSERT INTO rep SET kas='$nick', kam='$ka', time='" . time() . "', ka='$co'");
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Reputacijos davimas");
    navigacija($g_n);

} elseif ($id == 'bbc') {
    top('BBCode');
    online('Ziuri bbcode');
    echo '
   	<div class="meniu">
   [b]Tekstas[/b] - <b>tekstas</b><br/>
  
   	[u]Tekstas[/u] - <u>tekstas</u><br/>
   	[i]Tekstas[/i] - <i>tekstas</i><br/>
  
   	[red]Tekstas[/red] - <font color="red">tekstas</font><br/>
   	[white]Tekstas[/white] - <font color="white">tekstas</font><br/>
   	[green]Tekstas[/green] - <font color="green">tekstas</font><br/>
   		[blue]Tekstas[/blue] - <font color="blue">tekstas</font><br/>
   	[color=spalvos kodas]Tekstas[/color] - rašys jusu norima spalva<br/>
   	</div> 
   	
   	
   	';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "BBCode");
    navigacija($g_n);

} elseif ($id == "great") {
    top('Gret ape');
    if (date('H') == 23 or date('H') == 24) $kas = 'Jus esate Great ape formoje!';
    echo '<div class="meniuc"><img src="img/imgg/ape.png" border="0" alt="*"></div>';
    echo ' <div class="meniu">
   <b>' . $kas . '</b><br />
   Mėnulio pilnatis buna nuo 23.00 val. iki 24.00 val.<br />
    Per mėnulio pilnatį visi žaidėjai kovose gauna 10% daugiau  <img src="img/bicons/pinigai.png" />     ir   <img src="img/bicons/exp.png" />.<br />
     </div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Great ape");
    navigacija($g_n);
} elseif ($id == "pinigus2") {
    top('Eurų pervedimas');
    online('Perveda pinigus');


    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;
        $paskirtis = isset($_POST['paskirtis']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['paskirtis']) : null;
        if (empty($kieks)) {
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        } elseif ($apie['litai'] < $kieks) {
            echo '<div class="meniuc">Neturi pakankamai pinigu!</div>';
        } elseif (apsas($ka) == apsas($nick)) {
            echo '<div class="meniuc">Sau negalima</div>';
        } elseif ($apie[lygis] < 70) {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 70 lygio!</div>';
        } elseif (mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick ='$ka' AND lygis < '20' "))) {
            echo '<div class="meniuc">' . $ka . ' Neturi 70 lygio!</div>';
        } elseif ($kieks < 1000) {
            echo '<div class="meniuc">Mažiausiai galima pervesti ' . sk(1000) . ' pinigu!</div>';
        } else {
            echo '<div class="meniuc">Žaidėjui ' . statusas($ka) . ' pervedei ' . sk($kieks) . ' ' . $pinigaii . '!</div>';
            mysql_query("UPDATE zaidejai SET litai=litai+'$kieks' WHERE nick='$ka' ");
            mysql_query("UPDATE zaidejai SET litai=litai-'$kieks' WHERE nick='$nick' ");
            mysql_query("INSERT INTO perved_log SET txt='$nick pervedė $ka <b>" . sk($kieks) . "</b> $pinigaii!', time='" . time() . "'");
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$nick jums pervedė <b>" . sk($kieks) . "</b> $pinigaii ', time='" . time() . "', gavejas='$ka', nauj='NEW'") or die(mysql_error());
        }

    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Pinigu pervedimai");
    navigacija($g_n);
} elseif ($id == "litus2") {
    top('Eurų pervedimas');
    online('Perveda eurus');


    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;
        $paskirtis = isset($_POST['paskirtis']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['paskirtis']) : null;
        if (empty($kieks)) {
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        } elseif ($apie['sms_litai'] < $kieks) {
            echo '<div class="meniuc">Neturi pakankamai eurų!</div>';
        } elseif ($apie[lygis] < '40') {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 40 lygio!</div>';
        } elseif (apsas($ka) == apsas($nick)) {
            echo '<div class="meniuc">Sau negalima</div>';
        } elseif (mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick ='$ka' AND lygis < '20' "))) {
            echo '<div class="meniuc">' . $ka . ' Neturi 40 lygio!</div>';
        } elseif ($kieks < 1) {
            echo '<div class="meniuc">Mažiausiai galima pervesti ' . sk(1) . ' eurą!</div>';
        } else {
            echo '<div class="meniuc">Žaidėjui ' . statusas($ka) . ' pervedei ' . sk($kieks) . ' ' . $eurui . '!</div>';
            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'$kieks' WHERE nick='$ka' ");
            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai-'$kieks' WHERE nick='$nick' ");
            mysql_query("INSERT INTO perved_log SET txt='$nick pervedė $ka <b>" . sk($kieks) . "</b> " . $eurui . "!', time='" . time() . "'");
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$nick jums pervedė <b>" . sk($kieks) . "</b> $eurui ', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        }
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Eurų pervedimai");
    navigacija($g_n);

} elseif ($id == "vipt") {
    top('VIP TICKET pervedimas');
    online('Perveda VIP TICKET');


    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;
        $paskirtis = isset($_POST['paskirtis']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['paskirtis']) : null;
        if (empty($kieks)) {
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        } elseif ($apie['vipticket'] < $kieks) {
            echo '<div class="meniuc">Neturi pakankamai eurų!</div>';
        } elseif ($apie[lygis] < '60') {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 60 lygio!</div>';
        } elseif (apsas($ka) == apsas($nick)) {
            echo '<div class="meniuc">Sau negalima</div>';
        } elseif (mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick ='$ka' AND lygis < '20' "))) {
            echo '<div class="meniuc">' . $ka . ' Neturi 60 lygio!</div>';
        } elseif ($kieks < 1) {
            echo '<div class="meniuc">Mažiausiai galima pervesti ' . sk(1) . ' eurą!</div>';
        } else {
            echo '<div class="meniuc">Žaidėjui ' . statusas($ka) . ' pervedei ' . sk($kieks) . ' Vip ticketu.</div>';
            mysql_query("UPDATE zaidejai SET vipticket=vipticket+'$kieks' WHERE nick='$ka' ");
            mysql_query("UPDATE zaidejai SET vipticket=vipticket-'$kieks' WHERE nick='$nick' ");
            mysql_query("INSERT INTO perved_log SET txt='$nick pervedė $ka <b>" . sk($kieks) . "</b> " . $eurui . "!', time='" . time() . "'");
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$nick jums pervedė <b>" . sk($kieks) . "</b> $eurui ', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        }
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Eurų pervedimai");
    navigacija($g_n);
}
if ($id == 'pakvietimai') {
    top('Pakvietimai');
    online('Pakvietimai');
    echo '<div class="meniu">';

    $team = mysql_fetch_assoc(mysql_query("SELECT * FROM team WHERE vadas='$nick'"));
    if ($team == true) {
        echo ' ' . $ico . ' <a href="komanda.php?id=kviesti&ka=' . $team[pavadinimas] . '&wh=' . $inf['nick'] . '">Kviesti i komanda</a><br />';
    }

    echo '
            
          
         
					' . $ico . '  <a href="?id=kviesti&ID=' . $inf['nick'] . '">Kviesti į draugus</a><br/>
	
		';
    echo '</div>';

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Pakvietimai");
    navigacija($g_n);
}
if ($id == 'pervedimai') {
    top('Pervedimai');
    online('Pervedimai');
    echo '<div class="meniu">' . $ico . '	Turi pinigų: ' . sk($apie['litai']) . '</br>
	   ' . $ico . '	Turi eurų: ' . sk($apie['sms_litai']) . '</br>
	   ' . $ico . '	Turi VIP TICKET: ' . sk($apie['vipticket']) . '</br>
	    ' . $ico . '	Turi kreditų: ' . sk($apie['kred']) . '</br>
    ' . $ico . '	Turi auksinių: ' . sk($apie['auksiniai']) . '</div>
	   
	   ';
    echo '<div class="meniuc">
        <form action="pagrindinis.php?id=litus2&ka=' . $ka . '" method="post">
        Kiek pervesi eurų:<br/><input type="text" name="kieks"><br/>
          
        <input type="submit" name="submit" value="Pervesti">
        </form></div>';

    echo '<div class="meniuc">
        <form action="pagrindinis.php?id=kred2&ka=' . $ka . '" method="post">
        Kiek pervesi kreditų:<br/><input type="text" name="kieks"><br/>
         
        <input type="submit" name="submit" value="Pervesti">
        </form></div>';
    echo '<div class="meniuc">
        <form action="pagrindinis.php?id=vipt&ka=' . $ka . '" method="post">
        Kiek pervesi VIP TICKET:<br/><input type="text" name="kieks"><br/>
         
        <input type="submit" name="submit" value="Pervesti">
        </form></div>';
    echo '<div class="meniuc">
        <form action="pagrindinis.php?id=pinigus2&ka=' . $ka . '" method="post">
        Kiek pervesi pinigu:<br/><input type="text" name="kieks"><br/>
          
        <input type="submit" name="submit" value="Pervesti">
        </form></div>';


    echo '<div class="meniuc">
        <form action="pagrindinis.php?id=aux2&ka=' . $ka . '" method="post">
        Kiek pervesi auksinių:<br/><input type="text" name="kieks"><br/>
          
        <input type="submit" name="submit" value="Pervesti">
        </form></div>';

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Pervedimai");
    navigacija($g_n);
} elseif ($id == "kred2") {
    online('Perveda kreditus');
    top('Kreditu pervedimas');

    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;
        $paskirtis = isset($_POST['paskirtis']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['paskirtis']) : null;
        if (empty($kieks)) {
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        } elseif ($apie['kred'] < $kieks) {
            echo '<div class="meniuc">Neturi pakankamai kreditų!</div>';
        } elseif ($apie[lygis] < 40) {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 40 lygio!</div>';
        } elseif (apsas($ka) == apsas($nick)) {
            echo '<div class="meniuc">Sau negalima</div>';
        } elseif (mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick ='$ka' AND lygis < '20' "))) {
            echo '<div class="meniuc">' . $ka . ' Neturi 40 lygio!</div>';
        } elseif ($kieks < 1) {
            echo '<div class="meniuc">Mažiausiai galima pervesti ' . sk(1) . ' kreditą!</div>';
        } else {
            echo '<div class="meniuc">Žaidėjui ' . statusas($ka) . ' pervedei ' . sk($kieks) . ' ' . $kreditaii . '!</div>';
            mysql_query("UPDATE zaidejai SET kred=kred+'$kieks' WHERE nick='$ka' ");
            mysql_query("UPDATE zaidejai SET kred=kred-'$kieks' WHERE nick='$nick' ");
            mysql_query("INSERT INTO perved_log SET txt='$nick pervedė $ka <b>" . sk($kieks) . "</b> $kreditaii ', time='" . time() . "'");
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$nick jums pervedė <b>" . sk($kieks) . "</b> $kreditaii ', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        }

    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Kreditu pervedimai");
    navigacija($g_n);
} elseif ($id == "aux2") {
    online('Perveda auksinius');
    top('Auksinių pervedimas');

    if (isset($_POST['submit'])) {
        $kieks = isset($_POST['kieks']) ? preg_replace("/[^0-9]/", "", $_POST['kieks']) : null;
        $paskirtis = isset($_POST['paskirtis']) ? preg_replace("/[^A-Za-z0-9_]/", "", $_POST['paskirtis']) : null;
        if (empty($kieks)) {
            echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
        } elseif ($apie['auksiniai'] < $kieks) {
            echo '<div class="meniuc">Neturi pakankamai auksinių!</div>';
        } elseif ($apie[lygis] < 40) {
            echo '<div class="meniuc">Tavo lygis per žemas! Reikia 40 lygio!</div>';
        } elseif (apsas($ka) == apsas($nick)) {
            echo '<div class="meniuc">Sau negalima</div>';
        } elseif (mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick ='$ka' AND lygis < '20' "))) {
            echo '<div class="meniuc">' . $ka . ' Neturi 40 lygio!</div>';
        } elseif ($kieks < 1) {
            echo '<div class="meniuc">Mažiausiai galima pervesti ' . sk(1) . ' auksinį!</div>';
        } else {
            echo '<div class="meniuc">Žaidėjui ' . statusas($ka) . ' pervedei ' . sk($kieks) . ' ' . $auksiniaii . '!</div>';
            mysql_query("UPDATE zaidejai SET auksiniai=auksiniai+'$kieks' WHERE nick='$ka' ");
            mysql_query("UPDATE zaidejai SET auksiniai=auksiniai-'$kieks' WHERE nick='$nick' ");
            mysql_query("INSERT INTO perved_log SET txt='$nick pervedė $ka <b>" . sk($kieks) . "</b>  $auksiniaii ', time='" . time() . "'");
            mysql_query("INSERT INTO pm SET what='SISTEMA', txt='$nick jums pervedė <b>" . sk($kieks) . "</b> $auksiniaii ', time='" . time() . "', gavejas='$ka', nauj='NEW'");
        }

    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "Auksinių pervedimai");
    navigacija($g_n);
} elseif ($id == "off") {
    top('Atsijungimas');
    header('Location:index.php');
    echo '<div class="meniuc">Sėkmingai atsijungėte!</div>';
    mysql_query("DELETE FROM online WHERE nick='$nick' ");
    setcookie('vardas', null, time() - 3600 * 12 * 365);
    setcookie('pass', nulll, time() - 3600 * 12 * 365);

    $g_n[] = array("index.php?id=", "Pagrindinis", "Atsijungimas");
    navigacija($g_n);
} elseif ($id == "dovana") {

    online('Naujoko dovana');


    if ($ka == "dov") {
        top('Naujoko dovana');
        if (empty($apie['k_dovana'])) {

            $d_krd = rand(25, 125);

            $d_png = rand(5000000, 2500000);
            $d_eur = rand(25, 75);
            mysql_query("UPDATE zaidejai SET kred=kred+'$d_krd', litai=litai+'$d_png', sms_litai=sms_litai+'$d_eur', k_dovana='+' WHERE nick='$nick' ");


            echo '<div class="meniu"> <b>Atlikta!</b> Gavai <b>' . sk($d_krd) . '</b> ' . $kreditaii . ' <b>' . sk($d_png) . '</b> ' . $pinigaii . ' <b>' . sk($d_eur) . '</b> ' . $eurui . '!</div>';

        } else {

            echo '<div class="meniuc">  Tu jau atsiėmęs dovaną.</div>';

        }

    } else {
        top('Naujoko dovana');
        echo '<div class="meniuc">
<img src="img/Dovana.png"><br/>
    Šią  dovaną gali pasiimti visi žaidėjai. Dovana galimą pasiimti tik vieną kartą!!! 

    </div><div class="title">

    ' . $ico . ' <a href="?id=dovana&ka=dov">Pasiimti dovaną</a>

    </div>';

    }

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Naujoko dovana");
    navigacija($g_n);

} elseif ($id == "litis2") {
    top('Lyties pasirinkimas');
    if ($apie[litis] != '') {
        echo '<div class="meniuc">Jau nusistatei</div>';
        atgal('Į Pradžią-index.php?id=');
    } else {

        if (isset($_POST['submit'])) {
            $kam = post($_POST['kam']);
            $kaa = post($_POST['kaa']);
            if (empty($kaa)) {
                echo '<div class="meniuc">Palikai tuščią laukelį.</div>';
            } else {
                if ($kaa == 1) {
                    mysql_query("UPDATE zaidejai SET litis='Vyras' WHERE nick='$nick' ");
                    echo '<div class="meniuc">Atlikta!</div>';
                } elseif ($kaa == 2) {
                    mysql_query("UPDATE zaidejai SET litis ='Moteris' WHERE nick='$nick' ");
                    echo '<div class="meniuc">Atlikta!</div>';
                }
                $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Lities pasirinkimas");
                navigacija($g_n);
            }
        }
    }
}
if ($id == 'litis') {
    top('Lyties pasirinkimas');
    echo '<div class="meniuc">
        <form action="?id=litis2" method="post"/>
      
        Pasirinkitę:<br/><select name="kaa">
        <option value="1">Vyras</option>
        <option value="2">Moteris</option>
        </select><br/>
        <input type="submit" name="submit" value="Nustatyti"/></form>
        </div>';
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Lities pasirinkimas");
    navigacija($g_n);
}

if ($id == 'delete') {
    $tpc = mysql_fetch_assoc(mysql_query("SELECT * FROM pokalbiai WHERE id='$ka'"));
    if ($apie[statusas] != 'Admin' && $apie[statusas] != 'Mod' && $apie[statusas] != 'Mod2' && $apie[statusas] != 'Mod3' && $apie[statusas] != 'Mod4' && $apie[statusas] != 'Kurejas') {
        header('location:pagrindinis.php');

    } else {
        mysql_query("DELETE FROM pokalbiai WHERE id ='$ka'");
        mysql_query("INSERT INTO logas SET nick='$nick', msg='$tpc[nick]: $tpc[sms]',laikas='" . time() . "', tipas='chat'");
        header('location:pagrindinis.php');
    }

}
if ($id == 'exit') {
    $tpc = mysql_fetch_assoc(mysql_query("SELECT * FROM topic WHERE id='$ka'"));
    if ($apie[statusas] != 'Admin' && $apie[statusas] != 'Mod' && $apie[statusas] != 'Mod2' && $apie[statusas] != 'Mod3' && $apie[statusas] != 'Mod4' && $apie[statusas] != 'Kurejas') {
        header('location:pagrindinis.php');

    } else {
        mysql_query("DELETE FROM topic WHERE id ='$ka'");
        mysql_query("INSERT INTO logas SET nick='$nick', msg='$tpc[kas]: $tpc[message]',laikas='" . time() . "', tipas='topic'");
        header('location:pagrindinis.php');
    }

}

if ($id == 'medal') {
    $med_inf = mysql_fetch_assoc(mysql_query("SELECT * FROM medaliai WHERE id='$ID'"));
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == false) {

        header("location:pagrindinis.php");
    } elseif (mysql_num_rows(mysql_query("SELECT * FROM medaliai WHERE id='$ID'")) == false) {
        header("location:pagrindinis.php");
    } else {
        top('' . $ka . ' medaliai');
        online('' . $ka . ' medaliai');
        echo '<div class="meniuc"><img src="img/' . $med_inf[medalis] . '.png"><br/>
	Medalis už : ' . $med_inf[uz] . '<br/>
	Kada : ' . laikas($med_inf[laikas]) . '
	
	</div>';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "pagrindinis.php?id=apie&ka=$ka", "Apie $ka", "$ka medaliai");
        navigacija($g_n);
    }
}
if ($id == 'daily') {
    top('Dienos prizas');
    online('Dienos prizas');
    if ($apie[daily] == '+') {
        echo '<div class="meniuc">Šiandien jau pasiemei <b>prizą</b>!</div>';
    } else {
        $rand[0] = rand(1, 5);
        $rand[1] = rand(1, 5);
        $rand[2] = rand(1, 5);
        $rand[3] = rand(1, 5);
        $rand[4] = rand(1, 5);
        echo '<div class="meniuc">Pasirink prizą!</div>
		<div class="meniuc">
		<a href="?id=daily2&ID=' . $rand[0] . '"><img src="img/boxes/deze.png"></a>
		<a href="?id=daily2&ID=' . $rand[1] . '"><img src="img/boxes/taure.png"></a>
		<a href="?id=daily2&ID=' . $rand[2] . '"><img src="img/boxes/deze2.png"></a>
		<a href="?id=daily2&ID=' . $rand[3] . '"><img src="img/boxes/taure2.png"></a>
		<a href="?id=daily2&ID=' . $rand[4] . '"><img src="img/boxes/deze.png"></a>
		
		
		</div>
		
		
		
		';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Dienos prizas");
    navigacija($g_n);
}
if ($id == "killself") {
    online('Pomirtinis pasaulis');
    top('Pomirtinis pasaulis');

    echo '<div class="meniuc"><img src=img/imgg/pomirtinis.png><alt="**"></div>
<div class="meniuc">Sėkmingai sumažinai savo gyvybes iki <b>0</b>!</div>';
    mysql_query("UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick'");
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Pomirtinis pasaulis");
    navigacija($g_n);
}


if ($id == 'daily2') {
    top('Dienos prizas');
    online('Dienos prizas');
    if ($apie[daily] == '+') {
        echo '<div class="meniuc">Šiandien jau pasiemei prizą!</div>';
    } else {
        $randas = rand(50, 200);
        $randas1 = rand(20, 100);
        $randas2 = rand(50, 250);
        $randas3 = rand(100, 500);
        if ($ID == 1) {
            mysql_query("UPDATE inv SET Microshem=Microshem+'$randas' WHERE nick='$nick'");
            $err = ' ' . $randas . ' <b>Mikroskemų</b>!';
        }
        if ($ID == 2) {
            mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'$randas1' WHERE nick='$nick'");
            $err = '' . $randas1 . ' ' . $eurui . ' ';
        }
        if ($ID == 3) {
            mysql_query("UPDATE inv SET Powerstone=Powerstone+'$randas2' WHERE nick='$nick'");
            $err = ' ' . $randas2 . ' <b>Power Stone</b>!';
        }
        if ($ID == 4) {

            mysql_query("UPDATE zaidejai SET litai=litai+'$randas3' WHERE nick='$nick'");
            $err = ' ' . $randas3 . ' ' . $pinigaii . ' ';
        }
        if ($ID == 5) {

            mysql_query("UPDATE zaidejai SET Majinsroll=Majinsroll+'$randas' WHERE nick='$nick'");
            $err = '' . $randas . ' <b>Majin Scroll</b>! ';
        }


        echo '<div class="meniuc">Gavai<b> ' . $err . '</b></div>';
    }
    mysql_query("UPDATE zaidejai SET daily = '+' WHERE nick='$nick'");

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Dienos prizas");
    navigacija($g_n);

}
if ($id == 'draugai') {
    top('Draugai');
    online('Draugai');
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {

        echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';

    } elseif (empty($ka)) {

        echo '<div class="meniuc">Neįvestas nick!</div>';

    } else {
        if (apsas($ka) == apsas($nick)) {
            $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM draugai WHERE nick='$ka'"), 0);

            if ($viso > 0) {
                $rezultatu_rodymas = 15;
                $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;

                $puslapiu = ceil($viso / $rezultatu_rodymas);
            }
            if ($viso == 0) {

                echo '<div class="meniuc">Draugų neturi:(</div>';
            } else {
                echo '<div class="meniu">';
                $query = mysql_query("SELECT * FROM draugai WHERE nick='$ka' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
                while ($row = mysql_fetch_assoc($query)) {
                    $a++;
                    echo '' . $a . ' <a href="?id=apie&ka=' . $row[draugas] . '">' . statusas($row[draugas]) . '</a> (' . $row[statusas] . ')<a href="?id=dlt&ID=' . $row[draugas] . '">[x]</a><a href="?id=stat&ka=' . $row[draugas] . '">[K]</a><br/>';
                }
                echo '</div>';
            }
            echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=draugai&ka=' . $ka . '') . '</div>';
        } else {

            $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM draugai WHERE nick='$ka'"), 0);

            if ($viso > 0) {
                $rezultatu_rodymas = 15;
                $total = @intval(($viso - 1) / $rezultatu_rodymas) + 1;
                if (empty($psl) or $psl < 0) $psl = 1;
                if ($psl > $total) $psl = $total;
                $nuo_kiek = $psl * $rezultatu_rodymas - $rezultatu_rodymas;

                $puslapiu = ceil($viso / $rezultatu_rodymas);
            }
            if ($viso == 0) {

                echo '<div class="meniuc">Draugų neturi</div>';
            } else {
                echo '<div class="meniu">';
                $query = mysql_query("SELECT * FROM draugai WHERE nick='$ka' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
                while ($row = mysql_fetch_assoc($query)) {
                    $a++;
                    echo '' . $a . ' <a href="?id=apie&ka=' . $row[draugas] . '">' . statusas($row[draugas]) . ' (' . $row[statusas] . '</a>)<br/>';
                }
                echo '</div>';
            }
            echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=draugai&ka=' . $ka . '') . '</div>';
        }
    }

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "?id=apie&ka='$ka'", "$ka informacija", "$ka draugai");
    navigacija($g_n);
}

if ($id == 'atmesti') {
    top('Draugai');
    if (mysql_num_rows(mysql_query("SELECT * FROM pakvietimai WHERE nick='$nick' AND kviecia ='$ID'")) == 0) {


        echo '<div class="meniuc">Tavęs nekviečia!</div>';
    } else {


        mysql_query("DELETE FROM pakvietimai WHERE nick='$nick' AND kviecia ='$ID'");

        echo '<div class="meniuc">Sėkmingai atšaukei!</div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Draugai");
    navigacija($g_n);

}
if ($id == 'dlt') {
    top('Draugu ismetimas');
    if (mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$nick' AND draugas='$ID'")) == false) {
        echo '<div class="meniuc">Tu neturi šio žmogaus drauguose!</div>';
    } else {

        echo '<div class="meniuc">Sėkmingai pašalinai ' . $ID . ' iš draugų!</div>';
        mysql_query("DELETE FROM draugai WHERE nick='$nick' AND draugas='$ID'");
        mysql_query("DELETE FROM draugai WHERE nick='$ID' AND draugas='$nick'");
        mysql_query("INSERT into pm SET gavejas='$ID',what='SISTEMA',nauj='NEW',time='" . time() . "',txt='$nick pašalino tave iš draugų!'");
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "?id=apie&ka='$ka'", "$ka informacija", "$ka draugai");
    navigacija($g_n);


}
if ($id == 'priimti') {
    top('Draugų priiemimas');
    if (mysql_num_rows(mysql_query("SELECT * FROM pakvietimai WHERE nick='$nick' AND kviecia ='$ID'")) == 0) {


        echo '<div class="meniuc">Tavęs niekas nekviečia!</div>';
    } else {


        mysql_query("INSERT INTO draugai SET draugas='$ID', nick='$nick', statusas='Draugas'");
        mysql_query("INSERT INTO draugai SET draugas='$nick', nick='$ID', statusas='Draugas'");
        mysql_query("DELETE FROM pakvietimai WHERE nick='$nick' AND kviecia ='$ID'");
        mysql_query("INSERT into pm SET gavejas='$ID',what='SISTEMA',nauj='NEW',time='" . time() . "',txt='$nick priimė tavo kvietimą draugauti!'");
        echo '<div class="meniuc">Sėkmingai priėmiai!</div>';
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Draugai");
    navigacija($g_n);
}
if ($id == 'kviesti') {
    top('Draugų kvietimas');
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$nick'")) == 0) {
        echo '<div class="meniuc">Tokio žaidėjo nėra!</div>';
    } elseif (mysql_num_rows(mysql_query("SELECT * FROM pakvietimai WHERE nick='$ID' AND kviecia='$nick'")) > 0) {
        echo '<div class="meniuc">Jau kviečiate šį žaidėją</div>';
    } elseif (mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$nick' AND draugas='$ID'")) > 0) {
        echo '<div class="meniu">Šį žaidėja jau turite drauguose</div>';
    } else {


        mysql_query("INSERT INTO pakvietimai SET nick='$ID', kviecia='$nick'");
        echo '<div class="meniuc">Sėkmingai pakvietei žaidėją!</div>';
    }

    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Draugai");
    navigacija($g_n);

}
if ($id == 'stat') {
    top('Draugų statusai');
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {

        echo '<div class="meniuc">Tokio žaidėjo nėra </div>';

    } elseif (empty($ka)) {

        echo '<div class="meniuc">Neįvestas nick!</div>';

    } elseif (mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$nick' AND draugas='$ka'")) == false) {

        echo '<div class="meniuc">Tu neturi šio draugo</div>';

    } else {
        echo '<div class="meniuc">Pasirinkite norimą statusą<br/>
	  <form action="?id=stat2&ka=' . $ka . '" method="post"/>
<select name="statusas">
<option value="Draugas">Draugas</option>
<option value="Mes susipyke\">Mes susipyke</option>
<option value="Bendraklasis">Bendraklasis</option>
<option value="Bendradarbis">Bendradarbis</option>
<option value="Tikras draugas">Tikras draugas</option>
<option value="Geriausias draugas">Geriausias draugas</option>
<option value="Geri pasnekovai">Geri pasnekovai</option>
<option value="Giminaitis">Giminaitis</option>
<option value="Mano meilė">Mano meile</option>
</select>	<br/>
   <input type="submit" value="Nustatyti"></form>

</div>
	';

        $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "?id=apie&ka='$ka'", "$ka informacija", "pagrindinis.php?id=draugai&ka=$ka", "$ka draugai", "Statuso keitimas");
        navigacija($g_n);

    }
}
if ($id == 'stat2') {
    $st = post($_POST[statusas]);
    $tinka = array("Draugas", "Mes susipyke", "Bendraklasis", "Bendradarbis", "Tikras draugas", "Geriausias draugas", "Geri pasnekovai", "Giminaitis", "Mano meilė");
    top('Draugų statusai');
    if (mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$ka'")) == 0) {

        echo '<div class="meniuc">Tokio žaidėjo nėra! </div>';

    } elseif (!in_array($st, $tinka)) {

        echo '<div class="meniuc">Blogas statusas!</div>';
    } elseif (empty($ka)) {

        echo '<div class="meniuc">Neįvestas nick!</div>';

    } elseif (mysql_num_rows(mysql_query("SELECT * FROM draugai WHERE nick='$nick' AND draugas='$ka'")) == false) {

        echo '<div class="meniuc">Tu neturi šio draugo</div>';

    } else {
        echo '<div class="meniuc">Statuso keitimo prašymas išsųstas!</div>';
        mysql_query("INSERT INTO statusai SET nick='$nick', kam='$ka',stats='$st'");
    }
    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "?id=apie&ka='$ka'", "$ka informacija", "pagrindinis.php?id=draugai&ka=$ka", "$ka draugai", "Statuso keitimas");
    navigacija($g_n);
}
if ($id == 'stt_p') {
    top('Statuso keitimas');
    if (mysql_num_rows(mysql_query("SELECT * FROM statusai WHERE kam='$nick'")) == false) {

        echo '<div class="meniuc">Niekas nenori pakeisti statuso...</div>';

    } else {
        $stt = mysql_fetch_assoc(mysql_query("SELECT * FROM statusai WHERE kam='$nick' AND id='$ID'"));
        mysql_query("UPDATE draugai SET statusas='$stt[stats]' WHERE nick='$nick' AND draugas='$stt[nick]'") or die(mysql_error());
        mysql_query("UPDATE draugai SET statusas='$stt[stats]' WHERE nick='$stt[nick]' AND draugas='$nick'") or die(mysql_error());
        echo '<div class="meniuc">Statusas pakeistas</div>';
        mysql_query("DELETE FROM statusai WHERE kam='$nick'");

    }


    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Statuso keitimas");
    navigacija($g_n);
}
if ($id == 'stt_n') {


    top('Statuso keitimas');
    if (mysql_num_rows(mysql_query("SELECT * FROM statusai WHERE kam='$nick'")) == false) {

        echo '<div class="meniuc">Niekas nenori pakeisti statuso...</div>';

    } else {
        mysql_query("DELETE FROM statusai WHERE kam='$nick'");
        echo '<div class="meniuc">Atšaukta!</div>';

    }


    $g_n[] = array("pagrindinis.php?id=", "Pagrindinis", "Statuso keitimas");
    navigacija($g_n);


}


foot();
?>
