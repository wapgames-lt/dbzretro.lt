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
	online('išbarstyti rutuliai');
	top("Išbarstyti rutuliai");
    echo '<div class="meniuc"><img src="img/imgg/rutuliai.png" border="0" alt="*"></div>';
	echo'<div class="meniuc"><small>dievas drakonas, visai to nenorėdamas, išbarstė po visą visatą<b>  <img src="img/bicons/ball.gif" /> niekas nežino kur jie randasi todėl jis Jūsų prašo, kad padėtumete jam juos surinkti.</small></div>';
	echo'<div class="titlec"><small>Kiekvieną diena daugiausia rutulių surinkes žaidėjas gauna <b>200</b>'.$eurui.'</br>Surinkta<b> '.$nust[balls].'</b><img src="img/bicons/ball.gif" /></small></div>';
	
	

		echo'<div class="up">Top surinkusiuju:</div>';
			
			$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM isbarstyta"),0);
        
        if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
            
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            $query = mysql_query("SELECT * FROM isbarstyta ORDER BY turima DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
               while ($row = mysql_fetch_assoc($query)){
                $nr++;
                
                    echo '<b>'.$nr.'</b>. <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row['nick']).'</a> yra surinkęs - <b>'.sk($row['turima']).'</b><img src="img/bicons/ball.gif" /><br />';
                }
            
            }
            
            echo '</div>';
			
			 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=isbarst').'</div>';
           
          
        
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Išbarstyti rutuliai");
	navigacija($g_n);
    
	
}

foot();
?>
