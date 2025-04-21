<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();
$a1 = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM aukcijonas"))[0];
$a2 = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM turgus"))[0];
$a3 = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM uzsakymai"))[0];
$a4 = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM nick_turgus"))[0];

if($id == ""){
	 online('Miestas');
   top('Miestas');
    echo '<div class="meniuc"><img src="img/imgg/miestas.png" border="0" alt="**">
 ';
  if(date("m-d") == "12-25"){
  echo "<a href='kaledine_dovana.php'><b>Pasiimti kalėdinę dovaną</b>";

  }
    echo '</div><div class="up">Vietovės</div>
    

	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="aukcijonas.php?id=">Aukcijonas ('.$a1.')</a><br/></div> 
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="turgus.php?id=">Eurų turgelis ('.$a2.')</a><br/></div> 
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="uzsakymai.php?id=">Užsakymai ('.$a3.')</a><br/></div> 
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="?id=kap">Gydimo kapsulė</a><br/></div>  
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="bank.php?id=">Bankas</a><br/></div>  
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="casino.php?id=">Kazino</a><br/></div> 
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="?id=banned">Užbanintieji</a><br/></div>  
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="?id=tyla">Užtildytieji</a><br/></div>   
	<div class="meniu"><img src=img/imgg/miestas.png border="1" width="16" height="16"><a href="?id=lenta">Garbės lenta</a><br /></div>
		
	 
	    
       
   
     
  ';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Miestas");}
	navigacija($g_n);
if($id == 'tyla'){
		 online('Žiūri užtildytus žaidėjus');
		top('Užtildytieji');
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM block1"))[0];


    $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
			
			$puslapiu=ceil($viso/$rezultatu_rodymas);
		$query = mysqli_query($conn,"SELECT * FROM block1 ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
		while($row = mysqli_fetch_assoc($query)){
		$nr ++;
	echo'<div class="meniu"><b>Užtildytas :</b> '.statusas($row['nick']).'</br> <b>Už ką :</b> '.$row['uz'].' </br> <b>Atsitildys baigsis :</b> '.laikas($row['time']).'</br> <b>Užtildė : </b>'.statusas($row['kas_ban']).'</div><div class="line"></div>';	
			
			
		}
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=tyla').'</div>';
   
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","Užtyldiieji");
	navigacija($g_n);
	}


	if($id == 'banned'){
		 online('Banai');
		top('Užbanintieji');
        $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM block"))[0];
		 echo '<div class="meniuc"><img src="img/ban.png" border="0" alt="**"></div>';
			$rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
			
			$puslapiu=ceil($viso/$rezultatu_rodymas);
		$query = mysqli_query($conn,"SELECT * FROM block ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
		while($row = mysqli_fetch_assoc($query)){
		$nr ++;
	echo'<div class="meniu"><b>Užbanintas :</b> '.statusas($row['nick']).'</br> <b>Už ką :</b> '.$row['uz'].' </br> <b>Banas baigsis :</b> '.laikas($row['time']).'</br> <b>Užbanino : </b>'.statusas($row['kas_ban']).'</div><div class="line"></div>';	
			
			
		}
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=banned').'</div>';
   
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","Užbanintieji");
	navigacija($g_n);
	}
if($id == 'lenta'){
		 online('Garbes lenta');
	top('Garbės lenta');
	echo'<div class="meniu">';
    $viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM zaidejai WHERE rep_teig !='0'"))[0];
    if($viso > 0){
			$rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
			
			$puslapiu=ceil($viso/$rezultatu_rodymas);
		$query = mysqli_query($conn,"SELECT * FROM zaidejai ORDER BY rep_teig DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
		
		while($row = mysqli_fetch_assoc($query)){
		$nr ++;
echo'<b>'.$nr.'.</b><a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row['nick']).'</a> <b> '.$row['rep_teig'].'</b> </br>';
			
			
		}
echo '</div>';
		}
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=lenta').'</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","Garbės lenta");
	navigacija($g_n);
	}




if($id == "raktai"){
   top('Raktų keitykla');
   
    online('Raktai');
 
    echo '<div class="meniuc">
   Prizas buna atsitiktinis !
    </div>';
    
    echo '<div class="up"> <b>Turimi raktai</b>:</div>
    <div class="meniu">
    ';
    echo'<img src="img/keys/red_key.gif"> Raudonas raktas: <b>'.$inv['red_key'].'</b></br>';
		echo'<img src="img/keys/blue_key.gif"> Mėlinas raktas: <b>'.$inv['blue_key'].'</b></br>';
echo'<img src="img/keys/yellow_key.gif"> Geltonas raktas: <b>'.$inv['yellow_key'].'</b></br>';
echo'<img src="img/keys/black_key.gif"> Juodas raktas: <b>'.$inv['black_key'].'</b></br>';
echo'<img src="img/keys/green_key.gif"> Žalias raktas: <b>'.$inv['green_key'].'</b></br>';
  echo'  </div>';
    echo '<div class="meniu">
    '.$ico.'<a href="?id=imti">Pasiimti prizą</a></div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Raktų keitykla");
	navigacija($g_n);
 }
if($id == 'imti'){
top('Raktai');
        online('raktai');
       
        if($inv['red_key']< 7 or $inv['blue_key'] < 7 or $inv['yellow_key'] < 7 or $inv['black_key'] < 7 or $inv['green_key'] < 7){
            echo '<div class="meniuc">Neturi pakankamai Raktu!</div>';
        } else {
            $ev_lt = rand(1,2);
            $ev_krd = rand(10,50);
            $ev_zen = rand(1000000,5000000);
            echo '<div class="meniuc">Pasiėmei prizą ir gavai <b>'.sk($ev_zen).'</b> pinigų, <b>'.sk($ev_krd).'</b> kreditų ir <b>'.sk($ev_lt).'</b> eurus.</div>';
            mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$ev_zen', kred=kred+'$ev_krd', sms_litai=sms_litai+'$ev_lt' WHERE nick='$nick' ");
        mysqli_query($conn,"UPDATE inv SET blue_key=blue_key-'7', yellow_key=yellow_key-'7', black_key=black_key-'7', red_key=red_key-'7', green_key=green_key-'7' WHERE nick='$nick'");
        }
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Raktų keitykla");
	navigacija($g_n);
   
}

if($id == "kap"){
	 online('kapsule');
   top('Gydimo kapsulė');
    echo '<div class="meniuc"><img src=img/gydymo.jpeg border="1" width="100" height="50"><alt="**"></div>
    <div class="meniuc">
   Sveikas<b> '.$nick.'</b>, atsipildyk savo visas gyvybes tik už   <b>500</b> kreditų!
    </div>
    
    <div class="meniuc">
    <a href="?id=gydo"><b>Atsipildyti gyvybes</b></a><br/>
     

     
    </div>';
        $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Gydimo kapsulė");
	navigacija($g_n);
	
	
		
}  
if($id == "gydo"){
	 online('kapsule');
      top('Gydimo kapsulė');
       if($apie['kred']< 500 ){
echo '<div class="meniuc"><img src=img/gydymo.jpeg border="1" width="100" height="50"><alt="**"></div>';

           echo '<div class="meniuc">Neturi pakankamai kreditų!</div>';   
	}
 
	else{
	echo '<div class="meniuc"><img src=img/gydymo.jpeg border="1" width="100" height="50"><alt="**"></div>';
	
      mysqli_query($conn,"UPDATE zaidejai SET gyvybes='$apie[max_gyvybes]', kred=kred-'500' WHERE nick='$nick'");
	  $ti = time()+0;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='gydosi kapsuleja', kas_ban='SISTEMA', time='$ti'");
	      echo'<div class="meniuc">Tavo gyvybės papilditos sumokėjai <b>500</b> kreditų!</div>';
    
  }
      
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Gydimo kapsulė");
	navigacija($g_n);
	
}
if($id == "event"){
   top('Pavasario eventas');
   
    online('Pavasario eventas');
 
    echo '<div class="meniuc">
   Už dovanų dežutes, gausi atsitikinį prizą, jis gali būti <b>Critical Stone</b>, <b>DAIKTAS</b>, <b>'.$pinigaii.'</b>, <b>'.$eurui.'</b> bei <b>'.$kreditaii.'</b><br>
  visų dežučių reikia po <b>50</b>  </div>';
    
    echo '<div class="up"> <b>Turimos dovanų dežutės</b>:</div>
    <div class="meniu">
    ';
    echo'<img src="img/zaislai/zaislas1.png"> Raudona dovanų dežutė: <b>'.sk($inv['zaislas1']).'</b></br>';
echo'<img src="img/zaislai/zaislas3.png"> Geltona dovanų dežutė: <b>'.sk($inv['zaislas2']).'</b></br>';
echo'<img src="img/zaislai/zaislas5.png"> Mėlina dovanų dežutė: <b>'.sk($inv['zaislas3']).'</b></br>';
echo'<img src="img/zaislai/zaislas4.png"> Juoda dovanų dežutė: <b>'.sk($inv['zaislas4']).'</b></br>';
  echo'  </div>';
    echo '<div class="meniu">
    '.$ico.'<a href="?id=event2">Pasiimti prizą</a></div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Pavasario event");
	navigacija($g_n);
 }
if($id =='event2'){
  top('Pavasario eventas');
   
    online('Pavasario eventas');
 
       
      if($inv['zaislas1']< 10 or $inv['zaislas2'] < 10 or $inv['zaislas3'] < 10 or $inv['zaislas4'] < 10 ){
           echo '<div class="meniuc">Neturi pakankamai daigtų dežučių!</div>';
       } else {
            $randas = rand(0,4);
			$gaus[0] = array("sms_litai","1","3","Litų");
		    $gaus[1] = array("litai","1000000","10000000","Pinigų");
			$gaus[2] = array("kred","20","100","Kreditų");
			$gaus[3] = array("jega","100000","900000","Jėgos");
			$gaus[4] = array("gynyba","100000","900000","Gynybos");
			list($statusas,$min,$max,$ko) = $gaus[$randas];	
			$duoda = rand($min,$max);
            echo '<div class="meniuc">Pasiėmei prizą ir gavai <b>'.sk($duoda).'</b> '.$ko.' <b></div>';
            mysqli_query($conn,"UPDATE zaidejai SET $statusas=$statusas+'$duoda' WHERE nick='$nick' ");
        mysqli_query($conn,"UPDATE inv SET zaislas1=zaislas1-'10', zaislas2=zaislas2-'10', zaislas3=zaislas3-'10', zaislas4=zaislas4-'10' WHERE nick='$nick'");
       }
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas", "Pavasario evebtas");
	navigacija($g_n);
   
}

 foot();
?>
