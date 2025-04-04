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
    online('Žaidėjų TOP');
    top('Žaidėju topai');
    echo '
    <div class="meniu">
   '.$ico.' <a href="?id=top&ID=1">Lygio</a><br />
    '.$ico.' <a href="?id=top&ID=2">Kreditų</a><br />
   '.$ico.' <a href="?id=top&ID=3">Pinigu </a><br />

   '.$ico.' <a href="?id=top&ID=4">Laimėtų kovų</a><br />
'.$ico.' <a href="?id=top&ID=5">Pralaimėtų kovų </a><br />
    '.$ico.' <a href="?id=top&ID=6">Viso veiksmų </a><br />
    '.$ico.' <a href="?id=top&ID=7">Lygio taškų</a><br />
   '.$ico.' <a href="?id=top&ID=8">Atsakymų viktorinoje TOP</a><br />
    '.$ico.' <a href="?id=top&ID=9">Forumo žinučių TOP</a><br />
    '.$ico.' <a href="?id=top&ID=10">Pokalbių žinučių TOP</a><br />
    '.$ico.' <a href="?id=top&ID=11">Prisijungimo laiko TOP</a><br />
    '.$ico.' <a href="?id=top&ID=12">Dienos varžybu</a><br />
     '.$ico.' <a href="?id=top&ID=13">Banko pinigu</a><br />
       '.$ico.' <a href="?id=top&ID=14">Eurų</a><br />
    
'.$ico.' <a href="?id=top&ID=15">Pliusų</a><br />
'.$ico.' <a href="?id=top&ID=16">Bitcoin</a><br />
'.$ico.' <a href="?id=top&ID=17">VIP TICKET</a><br />
'.$ico.' <a href="?id=top&ID=18">Kasimo LVL</a><br />
 '.$ico.' <a href="?id=top&ID=19">Auksinių</a><br />
 '.$ico.' <a href="?id=top&ID=20">Vegeta Cash</a><br />
    </div>';
  	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","informacija.php", "Informacija", "Topai");
	navigacija($g_n);
}
elseif($id == "top"){
    $ID =isset( $_GET['ID']) ? $_GET[ID] : null;
    
    if($ID == 1) { $pg = 'lygis'; $tp = 'Lygio'; }
    if($ID == 2) { $pg = 'kred'; $tp = 'Kreditų'; }
    if($ID == 3) { $pg = 'litai'; $tp = 'Pinigu'; }
    if($ID == 4) { $pg = 'veiksmai'; $tp = 'Laimėtų kovų'; }
    if($ID == 5) { $pg = 'pveiksmai'; $tp = 'Pralaimėtų kovų'; }
    if($ID == 6) { $pg = 'vveiksmai'; $tp = 'Viso veiksmų'; }
    if($ID == 7) { $pg = 'taskai'; $tp = 'Lygio taškų'; }
	if($ID == 11) { $pg = 'online_time'; $tp = 'Prisijungimo laiko'; }
   if($ID == 8) { $pg = 'vikte'; $tp = 'Atsakymų viktorinoje'; }
    if($ID == 9) { $pg = 'forums'; $tp = 'Forumo žinučių'; }
    if($ID == 10) { $pg = 'chate'; $tp = 'Pokalbių žinučių'; }
    if($ID == 12) { $pg = 'dtopwin'; $tp = 'Dienos varžybu'; }
	if($ID == 13) { $pg = 'b_zenu'; $tp = 'Bank pinigu'; }
	 if($ID == 14) { $pg = 'sms_litai'; $tp = 'Eurų'; }
if($ID == 15) { $pg = 'pliusai'; $tp = 'Pliusų'; }
if($ID == 16) { $pg = 'bitcoin'; $tp = 'Bitcoin'; }
if($ID == 17) { $pg = 'vipticket'; $tp = 'Vip Ticket'; }
if($ID == 18) { $pg = 'kasimolvl'; $tp = 'Kasimo LVL'; }
if($ID == 19) { $pg = 'auksiniai'; $tp = 'Auksinių'; }
if($ID == 20) { $pg = 'botas'; $tp = 'Vegeta Cash'; }

if($ID > 20){
      
        echo '<div class="meniuc">Tokio TOP\'o nėra!</div>';
       $g_n[] = array("pagrindinis.php?id=","Pagrindinis","informacija.php", "Informacija", "Klaida");
	navigacija($g_n);
        
     }else{
        online(''.$tp.' TOP\'as');
     top(''.$tp.' topas');
     
        $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM zaidejai"),0);
        
        if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
                
            $query = mysql_query("SELECT * FROM zaidejai WHERE  nick != 'CORE' ORDER BY (0+ $pg) DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            if($ID == 11){
                while($top = mysql_fetch_assoc($query)){
                $vt++;
                if($top['nick'] == $nick){
                    echo '<font color="red"><b>'.$vt.'</b>.</font> <a href="pagrindinis.php?id=apie&ka='.$top['nick'].'">'.statusas($top['nick']).'</a> (<b>'.laikas($top[$pg], 1).'</b>)<br />';
                }else{
                    echo '<b>'.$vt.'</b>. <a href="pagrindinis.php?id=apie&ka='.$top['nick'].'">'.statusas($top['nick']).'</a> (<b>'.laikas($top[$pg], 1).'</b>)<br />';
                }
            }
            }else{
            	error_reporting(null);
                while($top = mysql_fetch_assoc($query)){
                $vt++;
                if($top['nick'] == $nick){
                    echo '<font color="red"><b>'.$vt.'</b>.</font> <a href="pagrindinis.php?id=apie&ka='.$top['nick'].'">'.statusas($top['nick']).'</a> (<b>'.sk($top[$pg]).'</b>) <font color="red">(<b>'.skaicius($top[$pg]).'</b>)</font><br />';
                }else{
                    echo '<b>'.$vt.'</b>. <a href="pagrindinis.php?id=apie&ka='.$top['nick'].'">'.statusas($top['nick']).'</a> (<b>'.sk($top[$pg]).'</b>) <font color="red">(<b>'.skaicius($top[$pg]).'</b>)</font><br />';
              
			    }
            }
				
            }

            echo '</div>';
            echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=top&ID='.$ID.'').'</div>';
            $g_n[] = array("pagrindinis.php?id=","Pagrindinis","informacija.php", "Informacija", "topai.php", "Topai",  "$tp topas");
	navigacija($g_n);
        }
        else{
            
        }
     }
}
 foot();
?>
