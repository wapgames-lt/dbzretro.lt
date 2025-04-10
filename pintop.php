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
	online('Surinktų pinigų TOP');
	top("Surinktų pinigų dienos TOP");
    echo '<div class="meniuc"><img src="img/imgg/pinigu_top.png" border="0" alt="*"></div>';
	
	echo'<div class="titlec"><small>Kiekvieną diena daugiausia '.$pinigaii.' surinkęs žaidėjas gauna <b>100</b>'.$eurui.'</div>';
	
	

		echo'<div class="up">TOP surinkusieji:</div>';

    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pinigai"))[0];


    if($viso > 0){
            $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
            
            $puslapiu=ceil($viso/$rezultatu_rodymas);
            
            echo '<div class="meniu">';
            $query = mysqli_query($conn,"SELECT * FROM pinigai WHERE  nick != 'aNox' ORDER BY surinkta DESC LIMIT 5");
               while ($row = mysqli_fetch_assoc($query)){
                $nr++;
                
                    echo '<b>'.$nr.'</b>. <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row['nick']).'</a> yra surinkęs - <b>'.skaicius($row['surinkta']).'</b>'.$pinigaii.'<br />';
                }
            
            }
            
            echo '</div>';
			
			 echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
           
          
        
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Surinktų pinigų dienos TOP");
	navigacija($g_n);
    
	
}

foot();
?>
