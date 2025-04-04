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
	
	

    online('Žiūri prisijungusius');
    top('Prisijunge žaidėjai');
  
    echo '<div class="meniuc"> Dabar žaidžia: <font color="red"><span class="on">'.mysql_num_rows(mysql_query("SELECT * FROM online")).'</font> | Max. Prisijungusių: <font color="red">'.$nust['max_on'].'</font> |Max. Prisijungusių šiandien:</font> <font color="red"><span class="on">'.$nust['snd_max'].'</font><br /> </div>';
 echo ' <div class="up"><table> <tr onmouseover=""><td><b></b></td> <td><b>Nikas /</b> </td><td><b>Žaidėjo vieta /</b> </td><td> <i><b>Laikas prisijungus /</b> </i></td><td> <b>Naršyklė</b></td></table></div>';
        
 echo '<div class="meniu"><table>';

  $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM online"),0);

    if($viso > 0){
        $rezultatu_rodymas=15;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysql_query("
		            SELECT 
                       o.nick,
					   z.nick,
					   z.statusas,
					   z.vip,
					   o.vieta,
		            	o.nrs
					FROM online o
					LEFT JOIN zaidejai z ON z.nick=o.nick
					ORDER BY 
						z.statusas = 'Kurejas' 
						DESC,
             z.statusas = 'Admin' 
						DESC,
						z.statusas = 'Mod4' 
						DESC,
						z.statusas = 'Mod3' 
						DESC,
						z.statusas = 'Mod2' 
						DESC,
						z.statusas = 'Mod' 
						DESC,
						z.vip > ".time()."
						DESC,
						o.nick ASC
					LIMIT 
		$nuo_kiek,$rezultatu_rodymas") or die(mysql_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
       
        while($row = mysql_fetch_assoc($query)){
            $s++;
            $asdf = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$row[nick]' "));
           if($asdf['statusas'] == 'Kurejas' OR $asdf['statusas'] == 'Admin'){
             
				$ka[1] = array("Mylisi su Bulma");
				  $ka[2] = array("Skrenda Pas Čičę");
				  $ka[3] = array("Kažkur blūdija");
				  $ka[4] = array("Iesko tinginio Deivido");
				  $ka[5] = array("Miega po krūmu");
				  $ka[6] = array("Baliavoja");
				  $ka[7] = array("Miega su Goku");
				  $ka[8] = array("Svajoja apie Bulmos krūtinę");
				  $ka[9] = array("Treniruoja kairę");
				  $ka[10] = array("Mylisi su Čiče");
				  $ka[11] = array("Gadina žaidimą");
				  $ka[12] = array("Geria su Fryzu");
				  $ka[13] = array("Daro Pahmielą su Vedžitu");
				  $ka[14] = array("Niokoja pasaulį");
				  $ka[15] = array("Mylisi su Malium");
  $ka[16] = array("Bezda nesustodamas..");
	  $ka[17] = array("Ieško problemų..");
	  $ka[18] = array("Naikina žaidimą..");
	  $ka[19] = array("Duxina pikola");
	  $ka[20] = array("Miega..");
				  $rand=rand(1,20);
				  list($kurs) = $ka[$rand];
				  if ($action = getActionByUsername($asdf['nick'])) {
					  $kkuurr = '<font color="red">'.$action.'</font>';
				  } else {
					  $kkuurr = '<font color="red">'.$kurs.'</font>';
				  }
			echo '  <tr onmouseover=""><td><b>'.$s.'</b></td> <td><a href="pagrindinis.php?id=apie&ka='.$row['nick'].'"><b>'.statusas($row['nick']).'</b> </a></td><td> '.$kkuurr.' </td><td> <i>['.ar_on($row['nick'], 1).']</i></td><td><font color="red"> '. $row['nrs'].'</font></td>';
        
        
		   }
		  /*elseif($asdf['vip']-time() > 1){
		  
		  echo '  <tr onmouseover=""><td><b>'.$s.'</b></td> <td><a href="?id=apie&ka='.$row['nick'].'"><b>'.statusas($row['nick']).'</b> </a></td><td> <b>Paslaptis...</b> </td><td> <i>['.ar_on($row['nick'], 1).']</i></td><td> '.nar($row[nick]).'</td>';
		
		}*/
             else {
               
            
            
		 
          

		    echo '  <tr onmouseover=""><td><b>'.$s.'</b></td> <td><a href="pagrindinis.php?id=apie&ka='.$row['nick'].'"><b>'.statusas($row['nick']).'</b> </a></td><td> '.$row['vieta'].' </td><td> <i>['.ar_on($row['nick'], 1).']</i></td><td><font color="red"> '. $row['nrs'].'</font></td>';
        
			}
		}
        echo '</table></div>';
        
        echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
    }else{
        echo '<div class="meniuc">Prisijungusių nėra!</div>';
    }
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Prisijunge žaidėjai");
	navigacija($g_n);
    
}

		function getActionByUsername($name) {
			$actions = [
				'testas1' => [
					'Iesko tinginio Deivido',
					'Mylisi su Malium',
					'Slepiasi nesumokėjas testas1 50eur',
				],
				'testas1' => [
					'Tvarko legendinių misijų bugus',
					'Plauna grindis gravitacijos kambaryje',
					'Padeda Ukrainai',
					'Dauzo Bulma is galo',
					'Leidzia Kamehame i tavo mocia',
					'Testuoja ir neraudonuoja',
					'Sako, kad php 5.6 yra sudas',
				],
			];

			if (!isset($actions[$name])) {
				return null;
			}

			$availableActions = $actions[$name];

			return $availableActions[array_rand($availableActions)];
		}
foot();
?>
