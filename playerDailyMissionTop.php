<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($id == ""){
	online('Legendinių dienos misijų TOP');
	top("TOP vykdytojai(šiandien)");
    $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM player_daily_mission_top WHERE completed_missions > 0"),0);
    if (!$nust['daily_mission_reward'] || !$viso) {
        echo '<div class="titlec">Žaidėjų šiame tope nėra arba šis topas užrakintas.</div>';
        return;
    }
			

        if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
            
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            $query = mysql_query("SELECT * FROM player_daily_mission_top WHERE completed_missions > 0 ORDER BY completed_missions DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
               while ($row = mysql_fetch_assoc($query)){
                $nr++;
                if ($nr === 1) {
                    echo '<font color="green"><b>'.$nr.'</b></font>. ';
                } else {
                    echo '<b>'.$nr.'</b>. ';
                }
                    echo '<a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row['nick']).'</a> yra įvykdęs - <b>'.skaicius($row['completed_missions']).'</b> misijas(-jų)<br />';
                }
            
            }
            
            echo '</div>';
			if ($psl > 1) {
                echo '<div class="meniuc">' . puslapiavimas($puslapiu, $psl, '?id=') . '</div>';
            }

    echo '<div class="up"><b>Prizai:</b></div>';
    $prizas = $nust['daily_mission_reward'];
    echo '<div class="titlec" >
     <b>1</b>. <img src="img/bicons/gold.png" /> - <b>'.sk($prizas).'</b> '.$botas.'!<br />
    <b>2</b>. <img src="img/bicons/silver.png" /> - <b>'.sk(round($prizas/2)).'</b> '.$botas.'!<br />
     <b>3</b>. <img src="img/bicons/bronze.png" /> - <b>'.sk(round($prizas/3)).'</b> '.$botas.'!<br />
    </div>';
    if($nust['daily_mission_win']) {
        echo '<div class="titlec">Paskutinis laimėjo: <font color ="green"><b>' . $nust['daily_mission_win'] . '</b></font></div>';
    }
           
          
        
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Legendinių misijų dienos TOP");
	navigacija($g_n);
}

foot();
