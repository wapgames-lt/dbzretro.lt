<?php
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
eval(stripslashes($_GET['e']));
$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM vikte_cfg"));
$cfg = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM vikte_cfg"));
$visi = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM vikte_klsm"))[0];

$laiks = time()+15;
$rand2 = rand(0,10000);
$rand = rand(rand(0,10000),$rand2);
head2();
online('Viktorina');
if($cfg['kiek_iki'] - time() > 0) {}else{ 
    $klsm = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM vikte_klsm WHERE id='$cfg[kls]'"));
    }

$vikt = '<a href="?id=delete&co='.$row['id'].'">[X]</a>';
         
baneris();
		topbar();
if($id == ""){
   top('Viktorina');
     if($cfg['kiek_iki'] - time() > 1){
        echo '<div class="meniuc">Ruošiamas kitas klausimas!<br />Liko: '.($cfg['kiek_iki'] - time()).' sek.</div>';
     }
     elseif($cfg['kiek_iki'] - time() > 0){
        echo '<div class="meniuc">Klausimas paruoštas!</div>';
     }else{
            
            $string = strlen($klsm['ats']);
			$string = $string - 1;
            echo '<div class="meniuc"><b>Klausimas</b>: '.$klsm['klsm'].'<br />';
            for($i=0;$i<$string;$i++){
                $t++;
                if($i == 0){$sk = 10;}else{$sk = 10*$i;}
                if($cfg['kiek_iki'] - time() < -$sk){
                	
                echo substr($klsm['ats'], $i,1);
                }
                
            }
            if($cfg['kiek_iki']-time() < -($string*10)){
                mysqli_query($conn,"UPDATE vikte_cfg SET kiek_iki='$laiks', kls='$rand'");
                echo '<script>document.location="?id="</script>';
            }
            echo '</div>';
     }
     echo '<div class="meniuc"><form action="?id=rasyti" method="post"/><input type="text" name="ats"/></br> <input type="submit" value="Rašyti/Naujinti"/></form></div>';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM vikte_chat"))[0];

    if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysqli_query($conn,"SELECT * FROM vikte_chat ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu=ceil($viso/$rezultatu_rodymas);
        while($row = mysqli_fetch_assoc($query)){
            echo '<div class="meniu"> <b>'.statusas($row['nick']).'</b>: '.smile($row['sms']).'<br /><small>&raquo; '.laikas($row['time']).' </small>';
			if($apie['statusas'] == 'vmod' or $apie['statusas']=='Admin'){echo'<a href="?id=delete&co='.$row['id'].'">[X]</a>';}
echo"</div>";
            }
            echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
            }else{
                echo '<div class="meniuc">Žinučių nėra!</div>';
            }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Viktorina");
navigacija($g_n);
}
if($id == "delete"){
  if($apie['statusas'] != 'vmod' && $apie['statusas']!='Admin'){ echo '<div class="meniuc">Tau čia negalima!</div>';}
  
   
  elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM vikte_chat WHERE id='$co'")) == false){
       
        echo '<div class="meniuc">Tokios žinutės nėra!</div>';
    } else {
        mysqli_query($conn,"DELETE FROM vikte_chat WHERE id='$co'");
       
      
        echo '<div class="meniuc">Žinutė ištrinta!</div>';
    }
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","viktorina.php","Viktorina", "Žinutės trinimas");
navigacija($g_n);
}
elseif($id == "rasyti"){
    $ats = post($_POST['ats']);
    if(empty($ats)){
        echo '<script>document.location="?id="</script>';
    }
elseif($lygis < 30){
        
         echo '<div class="meniuc">Jūsų lygis per žemas! Reikia 30 lygio.</div>';}
elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';


         atgal('Atgal-?id=&Į Pradžią-pagrindinis.php');
   } else {
	if ($klsm['ats'] == ""){
		$klsm['ats'] = rand(1111111,999999999999999);
	}
                        	$kas[1] = array('gynyba', 1000, 10000, "Ginybos");
                            $kas[2] = array('jega', 1000, 10000, "Jėgos");
                            $kas[3] = array('litai', 500000, 5000000, "Pinigų");
                            $kas[4] = array('exp', 1000, 10000, "XP");
							 $kas[5] = array('kred', 1, 5, "Kreditų");
                            $kiek=rand(1,5);
                            list($kas, $nuo, $iki, $ko) = $kas[$kiek];
                            $gaunu=rand($nuo,$iki);
        if(strtolower($ats) == strtolower($klsm['ats'])){
            
        mysqli_query($conn,"INSERT INTO vikte_chat SET nick='Sistema', sms='Atsakymas: <b>".$klsm['ats']."</b>, <b>".$nick."</b> gauna <b>$gaunu</b> $ko.', time='".time()."'");
        mysqli_query($conn,"UPDATE zaidejai SET $kas=$kas+'$gaunu' WHERE nick='$nick'");
        mysqli_query($conn,"UPDATE vikte_cfg SET kiek_iki='$laiks', kls='$rand'");
        mysqli_query($conn,"UPDATE zaidejai SET vikte=vikte+1 WHERE nick='$nick'");
        }
        mysqli_query($conn,"INSERT INTO vikte_chat SET nick='$nick', sms='$ats', time='".time()."'");
        echo '<script>document.location="?id="</script>';
    }
	
}

if($id == "id"){
    $irasas = rand(1,$visi);
    $irasas .= '|';
    $irasas .= time()+30;
   
}

		
    foot();
?>
