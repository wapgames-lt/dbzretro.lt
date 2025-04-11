<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
topbar();

 $rrr =	mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE name = '$apie[veikejas]'"));
 $tru = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM transformacijos WHERE nick='$nick'"));
 if($ka == 0){
	$reike_level = 10;
    $trans_jegos = 10000;
    $trans_gynybos = 30000;
    $trans_jegos2 = $zaidejai['jega'] + 1500;
    $trans_gynybos2 = $zaidejai['gynyba'] + 4500;
	$kiek_j = '1500';
$kiek_g = '4500';
}

if($ka == 1){
	$reike_level = 20;
    $trans_jegos = 50000;
    $trans_gynybos = 150000;
 $trans_jegos2 = $zaidejai['jega'] + 4000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 12000;
	$kiek_j = '4000';
$kiek_g = '12000';
}

if($ka == 2){
	$reike_level = 30;
    $trans_jegos = 100000;
    $trans_gynybos = 300000;
  $trans_jegos2 = $zaidejai['jega'] + 10000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 30000;
	$kiek_j = '10000';
$kiek_g = '30000';
}

if($ka == 3){
	$reike_level = 40;
    $trans_jegos = 250000;
    $trans_gynybos = 750000;
   $trans_jegos2 = $zaidejai['jega'] + 20000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 60000;
	$kiek_j = '20000';
$kiek_g = '60000';
}

if($ka == 4){
	$reike_level = 50;
    $trans_jegos = 500000;
    $trans_gynybos = 1500000;
   $trans_jegos2 = $zaidejai['jega'] + 50000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 150000;
	$kiek_j = '50000';
$kiek_g = '150000';
}
if($ka== 5){
	$reike_level = 60;
    $trans_jegos = 1000000;
    $trans_gynybos = 3000000;
     $trans_jegos2 = $zaidejai['jega'] + 100000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 300000;
	$kiek_j = '100000';
$kiek_g = '300000';
}
if($ka == 6){
	$reike_level = 70;
    $trans_jegos = 3000000;
    $trans_gynybos = 9000000;
    $trans_jegos2 = $zaidejai['jega'] + 200000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 600000;
		$kiek_j = '200000';
$kiek_g = '600000';
}
if($ka == 7){
	$reike_level = 80;
    $trans_jegos = 10000000;
    $trans_gynybos = 30000000;
    $trans_jegos2 = $zaidejai['jega'] + 400000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 1200000;
	$kiek_j = '400000';
$kiek_g = '1200000';
}
if($ka == 8){
	$reike_level = 100;
    $trans_jegos = 20000000;
    $trans_gynybos = 60000000;
    $trans_jegos2 = $zaidejai['jega'] + 1000000;
    $trans_gynybos2 = $zaidejai['gynyba'] + 3000000;
	$kiek_j = '1000000';
$kiek_g = '3000000';
}
 
if($id == ""){
	
    online('Transformacijos');
   top('Trasnsformacijos');
  
    echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="*"></div>';
    echo '<div class="meniuc">Transformuoti gali visi veikėjai, kiek trasformacijų turėsite priklauso nuo jūsų pasirinkto veikėjo. Trasformuotis galima tik tada kai pasieksit tam tikra  <img src="img/bicons/lvl.gif"> ir tam tikrą kiekį <img src="img/bicons/attack.png"> , <img src="img/bicons/shield.png">.</div>';
    echo '<div class="meniuc"><a href="?id=transreikalavimai"><font color="red"><small>Transformacijų reikalavimai</font></a></small></div>
<div class="meniu">
     Jūs galite transformuotis: <b>'.$trans_turi.'</b> kartus.<br/>
     Jūsų transformacijos lygis: <b>'.$apie['trans'].'</b>.
    </div>';
	  echo '<div class="meniu">';
	
  for($t = 0; $t <= $rrr['trans']; $t++){
  		
  	echo'<a href="?id=OK&ka='.$t.'">'.$t.' transformacija </a></br>';
  	
       
 
    }
  echo '</div>';
  

   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Transformacijos");
	navigacija($g_n);
}
if($id == "transreikalavimai"){
	
    online('Transformacijos');
   top('Trasnsformacijos');
  
    echo '<div class="meniuc"><img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="*"></div>';
    echo '<div class="meniuc">Transformuoti gali visi veikėjai, kiek trasformacijų turėsite priklauso nuo jūsų pasirinkto veikėjo. Trasformuotis galima tik tada kai pasieksit tam tikra  <img src="img/bicons/lvl.gif"> ir tam tikrą kiekį <img src="img/bicons/attack.png"> , <img src="img/bicons/shield.png">.</div>';
    echo '<div class="meniu">
<b>0 transformacija</b> - 10 <img src="img/bicons/lvl.png">,  10,000 <img src="img/bicons/attack.png">, 30,000 <img src="img/bicons/shield.png"><br>
<b>1 transformacija</b> - 20 <img src="img/bicons/lvl.png">,  50,000 <img src="img/bicons/attack.png">, 150,000 <img src="img/bicons/shield.png"><br>
<b>2 transformacija</b> - 30 <img src="img/bicons/lvl.png">,  100,000 <img src="img/bicons/attack.png">, 300,000 <img src="img/bicons/shield.png"><br>
<b>3 transformacija</b> - 40 <img src="img/bicons/lvl.png">,  250,000 <img src="img/bicons/attack.png">, 750,000 <img src="img/bicons/shield.png"><br>
<b>4 transformacija</b> - 50 <img src="img/bicons/lvl.png">,  500,000 <img src="img/bicons/attack.png">, 1,500,000 <img src="img/bicons/shield.png"><br>
<b>5 transformacija</b> - 60 <img src="img/bicons/lvl.png">,  1,000,000 <img src="img/bicons/attack.png">, 3,000,000 <img src="img/bicons/shield.png"><br>
<b>6 transformacija</b> - 70 <img src="img/bicons/lvl.png">,  3,000,000 <img src="img/bicons/attack.png">, 9,000,000 <img src="img/bicons/shield.png"><br>
<b>7 transformacija</b> - 80 <img src="img/bicons/lvl.png">,  10,000,000 <img src="img/bicons/attack.png">, 30,000,000 <img src="img/bicons/shield.png"><br>
<b>8 transformacija</b> - 90 <img src="img/bicons/lvl.png">,  20,000,000 <img src="img/bicons/attack.png">, 60,000,000 <img src="img/bicons/shield.png"></div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Transformacijos");
	navigacija($g_n);
}
  if($id == "OK"){
     top('Trasnsformacijos');
	  
	  
        if($jega < $trans_jegos){
            echo '<div class="meniuc">Transformacijai neužtenka <img src="img/bicons/attack.png">!</div>';
        }
elseif($ka > $rrr['trans']){
            echo '<div class="meniuc">Klaida, tokios transforemacijos nėra arba ji negalima</div>';
        }


		elseif($apie['lygis']< $reike_level){
            echo '<div class="meniuc">Tavo <img src="img/bicons/lvl.gif"> per mažas! </div>';
        }
		
        elseif($gynyba < $trans_gynybos){
            echo '<div class="meniuc">Transformacijai neužtenka <img src="img/bicons/shield.png">!</div>';
        } 
		elseif($tru['tr'.$ka.''] == '+'){
			  mysqli_query($conn,"UPDATE zaidejai SET trans='$ka' WHERE nick='$nick' ") or die(mysqli_error());
			header("location:?id=");		}
        
        
        else {
            echo '<div class="meniuc">Transformaciją pavyko! Gavai <b>'.$kiek_j.' <img src="img/bicons/attack.png"> ,   '.$kiek_g.'  <img src="img/bicons/shield.png"> </b>.</div>';
          
        
     mysqli_query($conn,"UPDATE transformacijos SET tr$ka='+' WHERE nick='$nick'")or die(mysqli_error());
     mysqli_query($conn,"UPDATE zaidejai SET trans='$ka' WHERE nick='$nick' ") or die(mysqli_error());
     mysqli_query($conn,"UPDATE zaidejai SET jega='$trans_jegos2', gynyba='$trans_gynybos2' WHERE nick='$nick' ") or die(mysqli_meniuc());
            
        }
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","skill.php","Skillai","Transformacijos");
	navigacija($g_n);

  }
  foot();
