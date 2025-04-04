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
	online('Kasimo dienos TOP');
	top("Kasimo dienos TOP");
    echo '<div class="meniuc"><img src="img/kasimas/kasykla.png" border="0" alt="*"></div>';
	
	echo'<div class="titlec"><small>Šiandien visi   varžosi dėl <b>'.$nust['kasimo_priz'].' Kasimo LVL!</b></div>';
	
	

		echo'<div class="up">TOP surinkusieji:</div>';
			
			$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM kasimotop"),0);
        
        if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
            
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            $query = mysql_query("SELECT * FROM kasimotop WHERE  nick != 'Jomajo' ORDER BY surinkta DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
               while ($row = mysql_fetch_assoc($query)){
                $nr++;
                
                    echo '<b>'.$nr.'</b>. <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row['nick']).'</a> yra surinkęs - <b>'.skaicius($row['surinkta']).'</b> Kasimo LVL<br />';
                }
            
            }
            
            echo '</div>';
			
			 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
           
          
        
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kasimo dienos TOP");
	navigacija($g_n);
    
	
}

foot();
?>
