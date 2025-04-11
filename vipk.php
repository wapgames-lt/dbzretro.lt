<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/config.php';;
include_once 'cfg/funkcijos.php';;
head2();
$zaidejai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
baneris();

topbar();

if(empty($apie[kovos])){
	
	mysqli_query($conn,"UPDATE zaidejai SET kovos='paprastos' WHERE nick='$nick'");
}


if($apie['vip']-time > 0){
$kovojimas = 0;
 $padusimas = 0;
 
}
else{
 
 $kovojimas = 1;
 $padusimas = 1; 
}
		$sis = $zaidejai['exp'];
		
		
		
		
		
		
		
		
		
		
	
		
	if($id == "auto_off"){
    online('Auto kovojimai');
    
    echo '<div class="meniuc">Auto kovojimai išjungti!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET auto='-' WHERE nick='$nick' ");
  
  
}
elseif($id == "auto_on"){
    online('Auto kovojimai');
    
    echo '<div class="meniuc">Auto kovojimai įjungti!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET auto='+' WHERE nick='$nick' ");
   
	
}	
if($id == "js"){
    online('Auto kovojimai');
      header('location:fight.php');

    mysqli_query($conn,"UPDATE zaidejai SET kovos='js' WHERE nick='$nick' ");
  
  
}
elseif($id == "pap"){
    online('Auto kovojimai');
    
   header('location:vipk.php');
    mysqli_query($conn,"UPDATE zaidejai SET kovos='paprastos' WHERE nick='$nick' ");
   
	
}	

		if($id == ""){

 if($nust['kovos'] == "-"){
top('Kovų laukas');
       echo '<div class="meniuc"><b>Kovų laukas išjungtas!</br></div></div>';

       }
else{

			  online('Kovose');
			top("VIP Kovų laukas");
   if($auto == "+"){
       $onoff = '<font color="green">Įjunkti</font>';
       $nurd = '<a href="fight.php?id=auto_off">Išjungti</a>';
   } else {
       $onoff = '<font color="red">Išjungti</font>';
       $nurd = '<a href="fight.php?id=auto_on">Ijungti</a>';  
   }

/*

			if($apie['veikejas'] == "kaba"){
$kg = $kg*1.1;
}

if($apie['veikejas'] == "jiren"){
$kg = ($kg/100) * 15000;
}
*/

echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
			echo' <div class="meniuc">Jūs turite sukaupęs  <b><font color="red"><img src="img/bicons/kg2.png" height="16" width="16" />'.sk($apie['kg2']).'</font></b> galios.</div>
			
		
			
   <div class="titlec">Dabar auto kovojimai <b>'.$onoff.'</b> ['.$nurd.']<br/></div>

  <div class="titlec">Dabar padusimai kas <b><font color="green">'.$padusimas.'</font></b> sec , auto kovos kas <b><font color="green">'.$kovojimas.'</font></b> sec<br/></div>


';
if((int)$apie['vip']-time() > 0){
	
echo'	<div class="meniuc">Vip turėsite <font color="red">VISAM LAIKUI</font></div>';
}
if($apie['monak']-time() > 0){
  echo '<div class="meniuc"><small>Monako mirtis suteikia jums <b>2 kartus</b> daugiau '.$pinigaii.'</b></small> - <b>'.laikas($apie['monak']-time(), 1).'</b></div>';
}

if(($apie[uzsiregistravo] + 3600*0) > time()	)
{
	echo'	<div class="meniuc">Jums galioja 10x paslauga nes esate naujokas, galios <font color="red">'.laikas(($apie[uzsiregistravo]+3600*24*0)-time(),1).'</font></div>';
	
}	
/// reward
if($apie['kovureward'] == '+'){
$kovureward=2;}
if($apie['kovureward'] == ''){
$kovureward=1;}

    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM lokacijosv"))[0];

    if($total > 0){
   echo '<div class="up"> Vietovės:</div>';
   echo '<div class="meniu">';
   $query = mysqli_query($conn,"SELECT * FROM lokacijosv");
   while($row = mysqli_fetch_assoc($query)){

if($apie['kg2'] > $row['nuo']/$kovureward){
         echo ' <img src="img/aicon/'.$row['img'].'.png" /><a href="?id=vieta&ID='.$row['id'].'">'.$row['name'].' </a>';}

if($apie['kg2'] < $row['nuo']/$kovureward){
         echo ' <img src="img/aicon/'.$row['img'].'.png" /><s><b>'.$row['name'].'</s></b> ';}
if($apie['kg2'] $row['nuo']/$kovureward){
echo'[<font color="green"><b>Galite kovoti</b></font><b>]';
}
if($apie['kg2'] < $row['nuo']/$kovureward){
echo'[<font color="red"><b>Negalite kovoti</b></font><b>]';

}
       
echo'<br>';

  unset($row);
   }
   echo '</div>';
   } else {
         echo '<div class="meniuc">Kolkas lokacijų nėra.</div>';
   }

/// bandau





}
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","VIP Kovų laukas");
	navigacija($g_n);
		}

elseif($id == "vieta"){
 if($nust['kovos'] == "-"){
top('Kovų laukas');
       echo '<div class="meniuc"><b>Kovų laukas išjungtas!</br></div></div>';

       }


else{
/// reward
if($apie['kovureward'] == '+'){
$kovureward=2;}
if($apie['kovureward'] == ''){
$kovureward=1;}
$KD = rand(9999,99999);
mysqli_query($conn,"UPDATE zaidejai SET kda='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);
   online('Kovose');
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM lokacijosv WHERE id='$ID' "));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM lokacijosv WHERE id='$ID' ")) == 0){
          echo '<div class="up"><b>Klaida!</b></div>';
          echo '<div class="meniuc">Tokios lokacijos nėra!</div>';
    } else {
        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM mobaiv WHERE lokacija='$ID'"))[0];
        echo '<div class="up">'.$lok['name'].'</div>';
         if($total > 0){
      if($apie['kg2'] < $lok['nuo']/$kovureward){
header('Location:vipk.php');
echo' <div class="meniuc"> Manai esi gudrus? :DD </div>';}
else{   

    echo '<div class="meniu">'.$ico.' Priešo nuotrauka <b> (Priešo<img src="img/bicons/kg2.png" height="16" width="16" />)</b></div>';


echo '<div class="up">'.$ico.'Jūsų (<b>'.skaicius($apie['kg2']).'  <img src="img/bicons/kg2.png" height="16" width="16" /></b>)</div>';
             echo '';
             $query = mysqli_query($conn,"SELECT * FROM mobaiv WHERE lokacija='$ID' ORDER BY -kg DESC LIMIT 0,30");
             while($row = mysqli_fetch_assoc($query)){
                   

echo '<div class="meniuc"><b></b> <img src="img/veikejaic/'.$row['img'].'.png" /><br>';
if($apie['kg2'] > $row['kg']){
echo'[<font color="green"><b>Nukausite</b></font><b>]';
}
if($apie['kg2'] < $row['kg']){
echo'[<font color="red"><b>Nenukausite</b></font><b>]';

}
echo'</div>';
echo'
<div class="meniuc">';
if($apie['kg2'] > $row['kg']/$kovureward){echo'<a href="?id=kova&ID='.$row['lokacija'].'&VS='.$row['id'].'&KD='.$KD.'"><b>Pulti</b></a>';} 

if($apie['kg2'] < $row['kg']/$kovureward){echo'<b><s>Pulti</s></b>';}echo'(<b>'.skaicius($row['kg']/$kovureward).'</b></s>) <img src="img/bicons/kovines.png" /><b>'; 

 if($apie['statusas'] == "Kurejas"){echo'<font color="red"><a href="?id=keiciu&ID='.$row['id'].'"><b>Keisti</b></a></font>';}



echo'</div>';}
                   unset($row);
             }
         echo '';
         } else {
              echo '<div class="meniuc">Kolkas monstrų nėra.</div>';
         }
         
    }
}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","?id=","VIP Kovų laukas","Vietovė");
	navigacija($g_n);
}

/// atl

if($id == "keiciu"){
        
    echo '<div class="up">Keitimas </div>';
         $query = mysqli_query($conn,"SELECT * FROM mobai WHERE id='$ID' ");
             while($row = mysqli_fetch_assoc($query)){
 if($apie['statusas'] == "Kurejas"){
 if($apie['statusas'] != "Kurejas"){
echo '<div class="meniuc">Manai esi gudrus? :D</div>';} 
  elseif($apie['ip'] != $nust['ip'] && $apie['ip'] !=$nust['ip2']){
        echo '<div class="up">Klaida!</div>';
       echo '
          <div class="meniuc">
       
        	<img src="img/bicons/noadmin.gif"></div>';
        echo '<div class="meniuc"><font color="red"><b>Tavo IP neatitinka savininko IP</b>!</font></div>';}
else{
   if(isset($_POST['submit'])){
                $kg = post($_POST['kg']);
             $exp = post($_POST['exp']);
 $pin = post($_POST['pin']);

                
                    
if($apie['statusas'] > "Kurejas"){
echo '<div class="meniuc">Manai esi gudrus? :D</div>';}
                 elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mobai WHERE kg='$kg' ")) > 0 ){
                    echo '<div class="meniuc"><div class="error">Tokia jau kg uzdeta!</div></div>';
                } else {
                    echo '<div class="meniuc"><div class="true">Pakeista!</div></div>';
                    mysqli_query($conn,"UPDATE mobai SET id='$ID', kg='$kg', exp='$exp', pin='$pin'  ");
            }    
            }
echo'<div class="meniuc"> <img src="img/veikejaic/'.$row['img'].'.png" /></div>';
    echo '<div class="meniuc"><b>Mobo Tvarkymas<br>
<b>'.$row['name'].' </b></b> -  '.skaicius($row['kg']).' '.$kgi.' , '.skaicius($row['pin']).' '.$pinigaii.' , '.skaicius($row['exp']).' '.$expi.' 
   </div>';
            echo '<div class="meniuc">
            <form action="?&id=keiciu&ID='.$row['id'].'" method="post"/>
            Kiek KG:<br /><input type="text" name="kg"/><br />
Kiek PINIGU<br /><input type="text" name="pin"/><br />
Kiek EXP:<br /><input type="text" name="exp"/><br />
            <input type="submit" name="submit" class"submit" value="Keisti-&raquo;"/>
            </div>';
}
}}
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php","Kovų zona","Keitimas");
	navigacija($g_n);    
}  
// reward
elseif($id == "kovureward"){
   online('Vygdo kovų misiją');
   top('Kovų zonos Reward');
   echo '<div class="meniuc"><img src="img/kovureward.png"></div>
<div class="meniuc">
  Pasiek <b>'.skaicius(500000).' </b>veiksmų ir <b>75</b> lygį <small>ir tada galėsi įvygdyti šią kovų reward misiją!</small><br>Įvygdžius gausi <b>Kovų Rewardą</b>!<br>Su kuriuo kovų zonoje sumažinsi visų mobų '.$kgi.' <b>2</b> kartus!
   </div><div class="titlec">
   <a href="?id=kovureward2">Pasiekiau reikiama kiekį!</a>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php", "Kovų zona", "Kovų reward misija");
	navigacija($g_n);
}
elseif($id == "kovureward2"){
   online('Vygdo kovų  misiją');
   top('Kovų Reward');
 
 
   if($apie['veiksmai'] < 499999 || $apie['lygis'] < 74){
echo '<div class="meniuc"><img src="img/kovureward.png"></div>';

      echo '<div class="meniuc">Tu neesi padaręs <b>'.skaicius(500000).'</b> veiksmų arba neturi <b>75</b> lygio!</div>';}
elseif($apie['kovureward'] == '+'){
		echo'<div class="meniuc"><img src="img/kovureward.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}

   else{
echo '<div class="meniuc"><img src="img/kovureward.png"></div>';
      echo '<div class="meniuc">Sėkmingai įvygdei misiją!<br>Nuo šiol mobų  '.$kgi.' bus <b>2</b> kartus mažesnė!</div>';
       
      mysqli_query($conn,"UPDATE zaidejai SET kovureward='+' WHERE nick='$nick' ");}
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php", "Kovų zona", "Kovų reward");
	navigacija($g_n);

}

/// kova
		if($id == "kova"){


 if($nust['kovos'] == "-"){
top('Kovų laukas');
       echo '<div class="meniuc"><b>Kovų laukas išjungtas!</br></div></div>';

       }
else{
$tt = ' <img src="img/veikejaic/Bardock.png" /> ';
		$ID = mysqli_real_escape_string($conn,htmlspecialchars($_GET['ID']));
			$VS = mysqli_real_escape_string($conn,htmlspecialchars($_GET['VS']));
	
/// reward
if($apie['kovureward'] == '+'){
$kovureward=2;}
if($apie['kovureward'] == ''){
$kovureward=1;}
			$KD = rand(9999,99999);
$ID = post($_GET['ID']);
$VS = post($_GET['VS']);
$KD = post($_GET['KD']);
   online('Kovoja kovų lauke');
$dtop = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop WHERE id='vksm' "));
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM lokacijosv WHERE id='$ID' "));
   $mob = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mobaiv WHERE id='$VS' "));
   $m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM lokacijosv WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios lokacijos nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mobaiv WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokio monstro kovų lauke nėra!</div></div>';
    } }
    if($m['kda'] != $KD){
  
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;">Taip kovoti negalimą! Eikite atgal ir vėl pulkite.</div>';
    } 
else {
   
    
    if($apie['kovu_tm']-time() > 0){
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;"">Padusai! Kovoti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b>.</div>';
	} else {
   
   if($apie['energy'] < 0){
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;"">Neturi energijos</div>';
	} else {

  if($apie['gyvybes'] < 1){
      echo'<div class="up">Kovų zona</div>';
       echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>'; 
        echo '<div class="meniuc">Nebeturi '.$hp.'</div>';
mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
    }
else{
    if($gyvybes == 4444444 or $mob['kg']/$kovureward > $apie['kg2']){
    	top(Klaida);
          echo '<div class="meniuc"><img src="img/bicons/dislike.png" /> Jūs per mažai sukaupęs<img src="img/bicons/kg2.png" height="16" width="16" />  galios!</div>';
		
          mysqli_query($conn,"UPDATE zaidejai SET gyvybe='0' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE zaidejai SET pveiksmai=pveiksmai+0, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
    } 



else {

   $KDS = rand(9999,99999);
    mysqli_query($conn,"UPDATE zaidejai SET kda='$KDS' WHERE nick='$nick'");
       if ($nust['dtop_nick'] !== $nick) {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
   if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
   }
    mysqli_query($conn,"UPDATE zaidejai SET veiksmai=veiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
	// arack savybe
    if($apie['arackb']-time() > 0){
        $mob['pin']= $mob['pin']*2;
           $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }
// jiren savybe
    if($apie['jirenb']-time() > 0){
            $mob['pin']= $mob['pin']*3;
             $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }
// quitela savybe
    if($apie['quitelab']-time() > 0){
             $mob['pin']= $mob['pin']*1;
            $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
// mosco savybe
    if($apie['moscob']-time() > 0){
          $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
  if($apie['duxpx']-time() > 0){
          $mob['pin']= $mob['pin']*1.3;
       $mob['exp']= $mob['exp']*1.3;
        $xxs = "+";
    }


//monak
  if($apie['monak']-time() > 0){
          $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }

//cognac
  if($apie['cognacb']-time() > 0){
          $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
//cukatail
  if($apie['cukatailb']-time() > 0){
          $mob['pin']= $mob['pin']*7;
       $mob['exp']= $mob['exp']*7;
        $xxs = "+";
    }
//gokas ultra
  if($apie['gokasultrab']-time() > 0){
          $mob['pin']= $mob['pin']*10;
       $mob['exp']= $mob['exp']*10;
        $xxs = "+";
    }
//gokas ultra master
  if($apie['gokasultramb']-time() > 0){
          $mob['pin']= $mob['pin']*15;
       $mob['exp']= $mob['exp']*15;
        $xxs = "+";
    }
//toppo
  if($apie['toppomb']-time() > 0){
          $mob['pin']= $mob['pin']*20;
       $mob['exp']= $mob['exp']*20;
        $xxs = "+";
    }
//jiren
  if($apie['jirenmb']-time() > 0){
          $mob['pin']= $mob['pin']*25;
       $mob['exp']= $mob['exp']*25;
        $xxs = "+";
    }
//kefla
  if($apie['keflab']-time() > 0){
          $mob['pin']= $mob['pin']*15;
       $mob['exp']= $mob['exp']*15;
        $xxs = "+";
    }
//gohan ultra
  if($apie['gohanultrab']-time() > 0){
          $mob['pin']= $mob['pin']*75;
       $mob['exp']= $mob['exp']*75;
        $xxs = "+";
    }
//vegeta ultra
  if($apie['vegetaultrab']-time() > 0){
          $mob['pin']= $mob['pin']*100;
       $mob['exp']= $mob['exp']*100;
        $xxs = "+";
    }
//zamasu
  if($apie['zamasub']-time() > 0){
          $mob['pin']= $mob['pin']*50;
       $mob['exp']= $mob['exp']*50;
        $xxs = "+";
    }

//5x
  if($apie['botas5x']-time() > 0){
          $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
//20x
  if($apie['20xpin']-time() > 0){
          $mob['pin']= $mob['pin']*20;
       $mob['exp']= $mob['exp']*20;
        $xxs = "+";
    }
    //* EVENTAS
    if($apie['majin']-time() > 0){
      $mob['pin']= $mob['pin']*1.1;
       $mob['exp']= $mob['exp']*1.2;
        $xxs = "+";
    }
 //* Trankso kardas
    if($apie['sword'] ==  'Trankso kardas'){
      $mob['pin']= $mob['pin']*1.15;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
 //* Vedzito sarvai
    if($apie['armor'] ==  'Vedzito sarvai'){
      $mob['pin']= $mob['pin']*1;
       $mob['exp']= $mob['exp']*1.4;
        $xxs = "+";
    }

 //* Money armor
    if($apie['armor'] ==  'Money armor'){
      $mob['pin']= $mob['pin']*1.35;
       $mob['exp']= $mob['exp']*1.35;
        $xxs = "+";
    }
	 //* Super money armor
    if($apie['armor'] ==  'Super money armor'){
      $mob['pin']= $mob['pin']*1.8;
       $mob['exp']= $mob['exp']*1.8;
        $xxs = "+";
    }
	//* Vieno kirčio armor
    if($apie['armor'] ==  'Vieno kircio armor'){
      $mob['pin']= $mob['pin']*2.5;
       $mob['exp']= $mob['exp']*2.5;
        $xxs = "+";
    }
	//* Galios armor
    if($apie['armor'] ==  'Galios armor'){
      $mob['pin']= $mob['pin']*4;
       $mob['exp']= $mob['exp']*4;
        $xxs = "+";
    }
	//* Infinity armor
    if($apie['armor'] ==  'Infinity armor'){
      $mob['pin']= $mob['pin']*6;
       $mob['exp']= $mob['exp']*6;
        $xxs = "+";
    }
	//* Mirties armor
    if($apie['armor'] ==  'Mirties armor'){
      $mob['pin']= $mob['pin']*10;
       $mob['exp']= $mob['exp']*10;
        $xxs = "+";
    }
	//* Atgimimo armor
    if($apie['armor'] ==  'Atgimimo armor'){
      $mob['pin']= $mob['pin']*15;
       $mob['exp']= $mob['exp']*15;
        $xxs = "+";
    }

 //* Money sword
    if($apie['sword'] ==  'Money sword'){
      $mob['pin']= $mob['pin']*1.3;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
	 //* Super money sword
    if($apie['sword'] ==  'Super money sword'){
      $mob['pin']= $mob['pin']*1.6;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
	//* Vieno kirčio kardas
    if($apie['sword'] ==  'Vieno kircio kardas'){
      $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }
	//* Galios kardas
    if($apie['sword'] ==  'Galios kardas'){
      $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }
	//* Infinity kardas
    if($apie['sword'] ==  'Infinity sword'){
      $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
	//* Mirties kardas
    if($apie['sword'] ==  'Mirties sword'){
      $mob['pin']= $mob['pin']*9;
       $mob['exp']= $mob['exp']*9;
        $xxs = "+";
    }
	//* Atgimimo kardas
    if($apie['sword'] ==  'Atgimimo sword'){
      $mob['pin']= $mob['pin']*14;
       $mob['exp']= $mob['exp']*14;
        $xxs = "+";
    }

	//* Atgimimo kardas
    if($inv['zkardas'] ==  '1'){
      $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }




//* Super Amuletas
    if($apie['amuletas'] ==  'Super amulet'){
      $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
//* Naikinimo Amuletas
    if($apie['amuletas'] ==  'Naikinimo amulet'){
      $mob['pin']= $mob['pin']*8;
       $mob['exp']= $mob['exp']*8;
        $xxs = "+";
    }
//* Mirties Amuletas
    if($apie['amuletas'] ==  'Mirties amulet'){
      $mob['pin']= $mob['pin']*15;
       $mob['exp']= $mob['exp']*15;
        $xxs = "+";
    }
//* Atgimimo Amuletas
    if($apie['amuletas'] ==  'Atgimimo amulet'){
      $mob['pin']= $mob['pin']*25;
       $mob['exp']= $mob['exp']*25;
        $xxs = "+";
    }
//* 1 lygio vip
    if($apie['vipas1'] ==  '+'){
      $mob['pin']= $mob['pin']*1.15;
       $mob['exp']= $mob['exp']*1.15;
        $xxs = "+";
    }
//* 2 lygio vip
    if($apie['vipas2'] ==  '+'){
      $mob['pin']= $mob['pin']*1.5;
       $mob['exp']= $mob['exp']*1.5;
        $xxs = "+";
    }
//* 3 lygio vip
    if($apie['vipas3'] ==  '+'){
      $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }
//* 4 lygio vip
    if($apie['vipas4'] ==  '+'){
      $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }
//* 5 lygio vip
    if($apie['vipas5'] ==  '+'){
      $mob['pin']= $mob['pin']*4;
       $mob['exp']= $mob['exp']*4;
        $xxs = "+";
    }
//* 6 lygio vip
    if($apie['vipas6'] ==  '+'){
      $mob['pin']= $mob['pin']*5;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
//* 7 lygio vip
    if($apie['vipas7'] ==  '+'){
      $mob['pin']= $mob['pin']*6;
       $mob['exp']= $mob['exp']*6;
        $xxs = "+";
    }
//* 8 lygio vip
    if($apie['vipas8'] ==  '+'){
      $mob['pin']= $mob['pin']*7;
       $mob['exp']= $mob['exp']*7;
        $xxs = "+";
    }
//* 9 lygio vip
    if($apie['vipas9'] ==  '+'){
      $mob['pin']= $mob['pin']*8;
       $mob['exp']= $mob['exp']*8;
        $xxs = "+";
    }
//* 10 lygio vip
    if($apie['vipas10'] ==  '+'){
      $mob['pin']= $mob['pin']*10;
       $mob['exp']= $mob['exp']*10;
        $xxs = "+";
    }
//* 11 ygio vip
    if($apie['vipas11'] ==  '+'){
      $mob['pin']= $mob['pin']*11;
       $mob['exp']= $mob['exp']*11;
        $xxs = "+";
    }
//* 12 lygio vip
    if($apie['vipas12'] ==  '+'){
      $mob['pin']= $mob['pin']*12;
       $mob['exp']= $mob['exp']*12;
        $xxs = "+";
    }
//* 13 lygio vip
    if($apie['vipas13'] ==  '+'){
      $mob['pin']= $mob['pin']*13;
       $mob['exp']= $mob['exp']*13;
        $xxs = "+";
    }
//* 14 lygio vip
    if($apie['vipas14'] ==  '+'){
      $mob['pin']= $mob['pin']*14;
       $mob['exp']= $mob['exp']*14;
        $xxs = "+";
    }
//* 15 lygio vip
    if($apie['vipas15'] ==  '+'){
      $mob['pin']= $mob['pin']*15;
       $mob['exp']= $mob['exp']*15;
        $xxs = "+";
    }
//* 16 lygio vip
    if($apie['vipas16'] ==  '+'){
      $mob['pin']= $mob['pin']*20;
       $mob['exp']= $mob['exp']*20;
        $xxs = "+";
    }
//* 17 lygio vip
    if($apie['vipas17'] ==  '+'){
      $mob['pin']= $mob['pin']*25;
       $mob['exp']= $mob['exp']*25;
        $xxs = "+";
    }
//* 18 lygio vip
    if($apie['vipas18'] ==  '+'){
      $mob['pin']= $mob['pin']*30;
       $mob['exp']= $mob['exp']*30;
        $xxs = "+";
    }
//* 19 lygio vip
    if($apie['vipas19'] ==  '+'){
      $mob['pin']= $mob['pin']*35;
       $mob['exp']= $mob['exp']*35;
        $xxs = "+";
    }
//* 20 lygio vip
    if($apie['vipas20'] ==  '+'){
      $mob['pin']= $mob['pin']*45;
       $mob['exp']= $mob['exp']*45;
        $xxs = "+";
    }
//* 21 lygio vip
    if($apie['vipas21'] ==  '+'){
      $mob['pin']= $mob['pin']*50;
       $mob['exp']= $mob['exp']*50;
        $xxs = "+";
    }
//* 22 lygio vip
    if($apie['vipas22'] ==  '+'){
      $mob['pin']= $mob['pin']*55;
       $mob['exp']= $mob['exp']*55;
        $xxs = "+";
    }
//* 23 lygio vip
    if($apie['vipas23'] ==  '+'){
      $mob['pin']= $mob['pin']*60;
       $mob['exp']= $mob['exp']*60;
        $xxs = "+";
    }
//* 24 lygio vip
    if($apie['vipas24'] ==  '+'){
      $mob['pin']= $mob['pin']*65;
       $mob['exp']= $mob['exp']*65;
        $xxs = "+";
    }
//*25 lygio vip
    if($apie['vipas25'] ==  '+'){
      $mob['pin']= $mob['pin']*70;
       $mob['exp']= $mob['exp']*70;
        $xxs = "+";
    }
// Kamehameha
    if($apie['Kamehameha'] ==  '+'){
      $mob['pin']= $mob['pin']*4;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
// Final flash
    if($apie['Finalflash'] ==  '+'){
      $mob['pin']= $mob['pin']*1;
       $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }
// Masenko
    if($apie['Masenko'] ==  '+'){
      $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }
// Galick Gun
    if($apie['Galickgun'] ==  '+'){
      $mob['pin']= $mob['pin']*3.5;
       $mob['exp']= $mob['exp']*4.5;
        $xxs = "+";
    }
//Death laser
    if($apie['Deathlaser'] ==  '+'){
      $mob['pin']= $mob['pin']*2.5;
       $mob['exp']= $mob['exp']*3.5;
        $xxs = "+";
    }
//Sayan power
    if($apie['Sayanpower'] ==  '+'){
      $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*1;
        $xxs = "+";
    }
///Makosen
if($apie['Makosen'] ==  '+'){
      $mob['pin']= $mob['pin']*1;
       $mob['exp']= $mob['exp']*5;
        $xxs = "+";
    }
///changed
if($apie['Changed'] ==  '+'){
      $mob['pin']= $mob['pin']*2.5;
       $mob['exp']= $mob['exp']*2.5;
        $xxs = "+";
    }
///Regeneration
if($apie['Regeneration'] ==  '+'){
      $mob['pin']= $mob['pin']*4;
       $mob['exp']= $mob['exp']*4;
        $xxs = "+";
    }
///ArmBreak
if($apie['ArmBreak'] ==  '+'){
      $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }
///AngryBulma
if($apie['AngryBulma'] ==  '+'){
      $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }

    /*if(isset($xx2)){
          $mob['pin']= $mob['pin']*1;
        $mob['exp']= $mob['exp']*1;
        $xxs2 = "+";
    }*/
    
  $times = date("H:i:s");
   if($times > '23:00:00' and $times < '24:00:00'){
      $mob['pin']= $mob['pin']*1.1;
      $mob['pin']= $mob['pin']*1.1;
        $xxs = "+";
}
    if($xxs != '+'){
          $pin = $mob['pin'];
       $xp = $mob['exp'];
    }
   if($nust['diena'] == '1'){
        $kr= $kr*1.10;
       
        $xxs = "+";
    }
      if($nust['diena'] == '2'){
        $xp = $xp*1.15;
       
        $xxs = "+";
    }
 if($nust['diena'] == '4'){
        $xp = $xp*1.15;
       
        $xxs = "+";
    }
if($apie['kate'] == '+'){
           $mob['pin']= $mob['pin']*2;
       $mob['exp']= $mob['exp']*2;
        $xxs = "+";
    }
if($apie['giras'] == '+'){
           $mob['pin']= $mob['pin']*3;
       $mob['exp']= $mob['exp']*3;
        $xxs = "+";
    }

	if((int)$apie['vip']-time() > 0){
            $mob['pin']= $mob['pin']*1.2;
$mob['exp']= $mob['exp']*1.2;
       
        $xxs = "+";
    }

		
	 
    ///
     $kiek_exp = $xp + $apie['exp'];
    $j = rand(0,0);
	$g = rand(0,0);
	$a = rand(0,0);
	$lvlas = 99999; 
$enda = 99999; 
$qq = 1.1;
for ($rr=1; $rr<99999; $rr++){ 
if ($rr==1){ $qq = 1.4; } else { $qq = $qq*1.4; }
if ($qq >= $kiek_exp/10 && $enda != $rr){ $lvlas = $rr; $enda = $rr+1; $buves = $qq; }
if ($enda==$rr){ $left = round($buves*2,1); break; }}
$left_xp = $left - $kiek_exp;
$kiek_turi =$apie['exp'] + $xp;
if ($lvlas > $apie['lygis']){
	$pt = rand(1,2); 
	
echo"<div class='meniuc'>
Sveikinu! Tu pasikelei naują <img src='img/bicons/lvl.png'/><br/>
Dabar tavo <img src='img/bicons/lvl.png' />: <u>$lvlas</u>. Gavai $pt Lygio taškų!<br/></div>";


mysqli_query($conn,"UPDATE zaidejai SET taskai=taskai + '$pt' WHERE nick='$nick'");
}
echo'
<div class="up">'.$ico.' Laimėjote!<br>
Nukovėte '.$mob['name'].'
(<b>'.skaicius($mob['kg']/$kovureward).'</b> <img src="img/bicons/kovines.png" />)</div>  ';
	mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$j' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$g' WHERE nick='$nick' ");
  echo'
  <div class="meniuc">
  <img src="img/veikejaic/'.$mob['img'].'.png" alt="IMG" height="120" width="120">

   
    </div>';

if($dtop2[vksm] ==40000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>40000</b> veiksmų , gaunate <b>35</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>40000</b> veiksmų! Gavai <b>35</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'35' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2[vksm] ==25000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>25000</b> veiksmų , gaunate <b>30</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>25000</b> veiksmų! Gavai <b>30</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'30' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2[vksm] ==15000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>15000</b> veiksmų , gaunate <b>25</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>15000</b> veiksmų! Gavai <b>25</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'25' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2[vksm] ==7000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>7000</b> veiksmų , gaunate <b>20</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>7000</b> veiksmų! Gavai <b>20</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'20' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2[vksm] ==3500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>3500</b> veiksmų , gaunate <b>15</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>3500</b> veiksmų! Gavai <b>15</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'15' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2[vksm] ==1500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>1500</b> veiksmų , gaunate <b>10</b>'.$eurui.'</div>';
$txt = "Įvygdei <b>kovų užduotį</b> -  Padaryti <b>1500</b> veiksmų! Gavai <b>10</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'10' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2[vksm] ==500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>500</b> veiksmų, gaunate <b>5</b>'.$eurui.'</div>';
$txt = "Įvygdei <b>kovų užduotį</b> -  Padaryti <b>500</b> veiksmų! Gavai <b>5</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'5' WHERE nick='$apie[nick]'")or die(mysqli_error());



}
if($dtop2[vksm] >40001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small><b>Tu esi įvygdęs visas užduotis!</b></small></div>';


}
else{
if($dtop2[vksm] >25001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>40000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>35</b>'.$eurui.'</small></div>';


}

else{
if($dtop2[vksm] >15001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>25000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>30</b>'.$eurui.'</small></div>';


}
else{
if($dtop2[vksm] >7001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>15000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>25</b>'.$eurui.'</small></div>';


}

else{
if($dtop2[vksm] >3501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>7000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>20</b>'.$eurui.'</small></div>';


}

else{
if($dtop2[vksm] >1501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>3500</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>15</b>'.$eurui.'</small></div>';


}

else{
if($dtop2[vksm] >501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>1500</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>10</b>'.$eurui.'</small></div>';


}

else{
if($dtop2[vksm] <500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>500</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>5</b>'.$eurui.'</small></div>';
}
}
}
}}}}
}
echo '<div class="up">
'.$ico.' Gavimas<br></div>';
    echo'<div class="meniuc">
  
Gavote: <img src="img/bicons/kg2.png" /> <font color="green"><b>+</b></font><b>'.skaicius($mob['duoskg']).'</b> <img src="img/bicons/lyg.png" />
Turite: <img src="img/bicons/kg2.png" />
<b>'.skaicius($apie['kg2']).' </b>
   

</div>';
/*
echo'
<div class="meniuc">
išmušėte: <img src="img/bicons/pinigai.png" /> <font color="green"><b>+</b></font><b>'.skaicius($mob['pin']).'</b><img src="img/bicons/lyg.png" /> Turite: <img src="img/bicons/pinigai.png" /><b> '.skaicius($apie['litai']).' </b>
</div>';*/
echo '<div class="up">
'.$ico.' Veiksmai<br></div>';
echo'
<div class="meniuc">
 Padaręs šiandien  <img src="img/bicons/attack1.png" /> <b> '.sk($dtop2['vksm']).'</b><img src="img/bicons/lyg.png" />
Padaręs išviso  <img src="img/bicons/attack1.png" /> <b> '.sk($apie['veiksmai']).'</b></div>';

echo '<div class="up">
'.$ico.' Dropas:<br></div>';
if($inv['radaras'] == '1'){
    if(rand(1,400) == 200 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+1;

if($apie['toppomb']-time() > 0){
$kiek_duos = $kiek_duos*3;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Drakono rutulį! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET dball=dball + '$kiek_duos' WHERE nick='$nick'");
    }
}
///event daiktai
if(rand(1,90) == 47 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*1;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Pavogei '.$kiek_duos.'   <img src="img/boxes/1.png" /> </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET event1=event1 + '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,90) == 46 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*1;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Nuskynei '.$kiek_duos.'   <img src="img/boxes/2.png" /> </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET event2=event2 + '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,90) == 45 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*1;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Suradai '.$kiek_duos.'   <img src="img/boxes/3.png" /> </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET event3=event3 + '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,90) == 49 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*1;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Sugavai '.$kiek_duos.'   <img src="img/boxes/4.png" /> </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET event4=event4 + '$kiek_duos' WHERE nick='$nick'");
    }
//// kitu daiktu drop
if(rand(1,90) == 49 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red"><b>AD 16</b></font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET ad16=ad16+ '$kiek_duos' WHERE nick='$nick'");
    }

if(rand(1,180) == 101 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+1;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*1;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*1;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="green"><b>Išbarstytą rutulį</b></font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE isbarstyta  SET turima=turima+ '$kiek_duos' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE nustatymai  SET balls=balls+ '$kiek_duos'");
    }
if($apie['jirenmb']-time() > 0){
if(rand(1,600) == 201 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos=1;

if($apie['jirenmb']-time() > 0){
$kiek_duos = $kiek_duos*1;




}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="green"><b>Juodąjį drakono rutulį</b></font>! </b><br/></div>';
         
mysqli_query($conn,"UPDATE inv  SET jball=jball+ '$kiek_duos' WHERE nick='$nick'");
    }

}


if(rand(1,130) == 75 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red">Super Amulet Iteam</font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Super_amulet_item=Super_amulet_item+ '$kiek_duos' WHERE nick='$nick'");
    }
if($apie['bts']-time() > 0){
if(rand(1,400) == 222 )
{
if($apie['bt']-time() > 0){
$kiek_bt=$kiek_bt+ 2;
}
else{
$kiek_bt = 1;
}

echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_bt.'    <img src="img/bicons/bitcoin.png" /> </b><br/></div>';

         mysqli_query($conn,"UPDATE zaidejai  SET bitcoin=bitcoin+ '$kiek_bt' WHERE nick='$nick'");
    }
}



if(rand(1,130) == 64 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red">Naikinimo Amulet Iteam</font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET naikinimo_amulet_item=naikinimo_amulet_item+ '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,131) == 64 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['gokasultramb']-time() > 0){
$kiek_duos = $kiek_duos*3;
}
}
}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red">Mirties Iteam</font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET mirties_item=mirties_item+ '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,132) == 64 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['gokasultramb']-time() > 0){
$kiek_duos = $kiek_duos*3;
}
}
}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red">Atgimimo Iteam</font>! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET atgimimo_item=atgimimo_item+ '$kiek_duos' WHERE nick='$nick'");
    }


if(rand(1,70) == 30 )
{
if($apie['duxkrd']-time() > 0){
$kiek_krd = +2;
if($apie['gokas20xb']-time() > 0){
$kiek_krd = $kiek_krd*3;
if($apie['arackb']-time() > 0){
$kiek_krd = $kiek_krd*3;
}
}}
else{
$kiek_krd = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_krd.'    <img src="img/bicons/credit.png" /> </b><br/></div>';

         mysqli_query($conn,"UPDATE zaidejai  SET kred=kred + '$kiek_krd' WHERE nick='$nick'");
    }

if(rand(1,1) == 1 )
{




if($apie['duxaux']-time() > 0){
$kiek_aux = 2;

if($apie['dgax']-time() > 0){
$kiek_aux = $kiek_aux*3;




if($apie['visasb']-time() > 0){
$kiek_aux = $kiek_aux*2;

if($apie['arackb']-time() > 0){
$kiek_aux = $kiek_aux*3;
if($apie['armor'] == 'Gold armor'){
$kiek_aux=$kiek_aux*2;

}
}}}}
else{
$kiek_aux = 1;}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_aux.'  <img src="img/coin.png" />   </b><br/></div>';
         mysqli_query($conn,"UPDATE zaidejai  SET auksiniai=auksiniai + '$kiek_aux' WHERE nick='$nick'");
    }


if(rand(1,100) == 50 )
{
if($apie['dgeur']-time() > 0){
$kiek_eur = $kiek_eur+0.2;
if($apie['gokas20xb']-time() > 0){
$kiek_eur = $kiek_eur*3;
if($apie['arackb']-time() > 0){
$kiek_eur = $kiek_eur*3;
}
}
}
else{
$kiek_eur = 0.1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_eur.'  <img src="img/bicons/euro.png" />   </b><br/></div>';
         mysqli_query($conn,"UPDATE zaidejai  SET sms_litai=sms_litai + '$kiek_eur' WHERE nick='$nick'");
    }

 if(rand(1,80) == 37 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;
 
if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;

if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Sayiantail! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Sayiantail=Sayiantail + '$kiek_duos' WHERE nick='$nick'");
    }
 if(rand(1,85) == 39 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;
 
if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;

if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Fusion Fail! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Fusionfail=Fusionfail + '$kiek_duos' WHERE nick='$nick'");
    }


    if(rand(1,90) == 36 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;


if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Stone=Stone + '$kiek_duos' WHERE nick='$nick'");
    }
    
        if(rand(1,100) == 50 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Soul! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Soul=Soul + '$kiek_duos' WHERE nick='$nick'");
    }
    if(rand(1,100) == 38 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Energy stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Energystone=Energystone + '$kiek_duos' WHERE nick='$nick'");
    }


//done

     if(rand(1,90) == 39 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;


if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;

if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Pragaro vaisius! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Pragarovaisius=Pragarovaisius + '$kiek_duos' WHERE nick='$nick'");
    }
if(rand(1,80) == 42 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Majin scroll! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Majinsroll=Majinsroll + '$kiek_duos' WHERE nick='$nick'");
    }
    if(rand(1,95) == 43 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;

if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Gold stone! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Goldstone=Goldstone + '$kiek_duos' WHERE nick='$nick'");
    }
    if(rand(1,90) == 34 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Magic ball! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Magicball=Magicball + '$kiek_duos' WHERE nick='$nick'");
    }

 if(rand(1,80) == 44 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}

}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'    <img src="img/boxes/anti.png" />Anti potion! </b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET antipotion=antipotion + '$kiek_duos' WHERE nick='$nick'");
    }
   if(rand(1,75) == 40 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Mikroskemų!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Microshem=Microshem+'$kiek_duos' WHERE nick='$nick'");
    }





        if(rand(1,80) == 40 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Power stone !</b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET Powerstone=Powerstone + '$kiek_duos' WHERE nick='$nick'");
    }
    
if(rand(1,120) == 90 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;

if($apie['vadoseb']-time() > 0){
$kiek_duos = $kiek_duos*2;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}

}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <b>Critical stone</b>!</b><br/></div>';
         mysqli_query($conn,"UPDATE inv  SET critical=critical+ '$kiek_duos' WHERE nick='$nick'");
    }
    

if(rand(1,180) == 50 )
{
if($apie['dglg']-time() > 0){
$kiek_duos = $kiek_duos+3;
if($apie['cusb']-time() > 0){
$kiek_duos = $kiek_duos*5;

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   Lygio taškų! </b><br/></div>';
         mysqli_query($conn,"UPDATE zaidejai SET taskai=taskai + '$kiek_duos' WHERE nick='$nick'");
    }
    if(rand(1,70) == 50 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;
if($apie['cus']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'   <font color="red"><b>Angelo Sparnus! </b><br/></font></div>';
         mysqli_query($conn,"UPDATE inv SET angelwing=angelwing + '$kiek_duos' WHERE nick='$nick'");
    }
/// kit
    if(rand(1,70) == 50 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;
if($apie['cus']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.'  <font color="red"><b>Naikinimo galios! </b><br/></div></font>';
         mysqli_query($conn,"UPDATE inv SET naikinti=naikinti + '$kiek_duos' WHERE nick='$nick'");
    }

    if(rand(1,70) == 50 )
{
if($apie['duxdaig']-time() > 0){
$kiek_duos = $kiek_duos+2;
if($apie['cus']-time() > 0){
$kiek_duos = $kiek_duos*2;

}
}
else{
$kiek_duos = 1;
}
echo ' 
<div class="meniuc">
 <img src="img/bicons/green.png" />     <b>Gavai '.$kiek_duos.' <font color="red"><b>  Kario tobuljimas! </b><br/></div></font>';
         mysqli_query($conn,"UPDATE inv SET tobulas=tobulas + '$kiek_duos' WHERE nick='$nick'");
    }

    

mysqli_query($conn,"UPDATE zaidejai SET  kg2=kg2+'$mob[duoskg]', lygis='$lvlas',expl='$left' WHERE nick='$nick'");



mysqli_query($conn,"UPDATE zaidejai SET sveiksmai=sveiksmai+'1' WHERE nick='$nick'");

    if($auto == "+" AND $apie[kovos] == 'js'){
    
  ?> <div class='titlec'> Kita kova įvyks už  <label id="setTime1397086567"><?echo $kovojimas?> sek.</label><label id="getTime1397086567" style="display:none;"><?echo $kovojimas ?></label> 
				<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
				<script type="text/javascript">
				updateTime1397086567();
				
				function updateTime1397086567() {
					time = $("#getTime1397086567").text();
					refresh = 1;
					countdown = 1;
					startTime = 3;
					
					if(startTime > 0)
					{
						if(time <= 0 && refresh)
						
						window.location = "?id=kova&ID=<?echo $ID?>&VS=<?echo $VS?>&KD=<?echo $KDS?>";
						else
						{
							var newTime = (countdown ? time - 1 : time + 1);
							$("#getTime1397086567").text(newTime);
							var days = Math.floor(newTime / (60 * 60 * 24));
							var hours = Math.floor((newTime - (days * (60 * 60 * 24))) / 3600);
							var minutes = Math.floor((newTime - (days * (60 * 60 * 24)) - (hours * 3600)) / 60);
							var seconds = Math.floor(newTime - (days * (60 * 60 * 24)) - (hours * 3600) - (minutes * 60));
							$("#setTime1397086567").text((days == 0 ? "" : days + " d. ") + (days == 0 && hours == 0 ? "" : hours + " val. ") + (days == 0 && hours == 0 && minutes == 0 ? "" : minutes + " min. ") + (seconds + " sek."));
							timer = setTimeout("updateTime1397086567()", 1000);
						}
					}
				}
				</script><br/></div>
    <?
    }
elseif($auto = '+' AND $apie[kovos] == 'paprastos'){
    echo '<meta http-equiv="refresh" content="'.$kovojimas.'; url=?id=kova&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">';}
    echo '<div class="up">'.$ico.'<font color="white">Informacija<br/></div></font>';
	echo '     <div class="meniuc">   '.$ico.'<a href="pagrindinis.php?id=apie&ka='.$nick.'"><img src="img/bicons/apie.png" /></a> 
	'.$ico.'<a href="inv.php?id="><img src="img/bicons/inventorius.png" /></a>
	</div>
	';
	$krss = $kr/100;
	$experience = $xp;

    mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$experience', litai=litai+'$krss', lygis='$lvlas',expl='$left', energy=energy-'0' WHERE nick='$nick'");

       $_SESSION['pad'] = time()+$padusimas;
	   $tt = time()+$padusimas;
	   mysqli_query($conn,"UPDATE zaidejai SET kovu_tm='$tt' WHERE nick='$nick'");
	 $fusn = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick'"));
    $fusn_k2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fusn[kitas_zaidejas]'"));
	 if(!empty($fusn['kitas_zaidejas']) AND $fusn[double_fussion_dance] == '+'){ 
        $mob['exp']= $mob['exp']/10;
        mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$mob[exp]' WHERE nick='$fusn[kitas_zaidejas]'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE susijungimas SET uzdirbo_exp=uzdirbo_exp+'$mob[exp]' WHERE nick='$nick'")or die(mysqli_error());}
   
    
	if(!empty($user['team'])){
	$komanda = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));
	$plius = $user['win_in_team']+1;
	$pius = $komanda['viso_laimejo_kovu']+1;
$pius2= $komanda['pinigai']+$mob[pin]/50;
$pius3= $komanda['eurai']+0.01;
	
	mysqli_query($conn,"UPDATE team SET viso_laimejo_kovu='$pius', pinigai='$pius2', eurai='$pius3' WHERE pavadinimas = '".$user['team']."'") or die(mysqli_error());
	mysqli_query($conn,"UPDATE user SET win_in_team='$plius',iki_algos=iki_algos-'1' WHERE nick='$nick'")or die(mysqli_error());
	if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM komandu_dtop WHERE team = '$user[team]'"))){
		mysqli_query($conn,"INSERT INTO komandu_dtop SET laimejo_kovu='0', team = '".$user['team']."'")or die(mysqli_error());
		
	}else{
mysqli_query($conn,"UPDATE komandu_sav_dtop SET laimejo_kovu=laimejo_kovu+1 WHERE team='".$user['team']."'")or die(mysqli_error());
	mysqli_query($conn,"UPDATE komandu_dtop SET laimejo_kovu=laimejo_kovu+1 WHERE team='".$user['team']."'")or die(mysqli_error());

}


}

  
	 if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM komandu_sav_dtop WHERE team = '$user[team]'"))){
		mysqli_query($conn,"INSERT INTO komandu_sav_dtop SET laimejo_kovu='0', team = '".$user['team']."'")or die(mysqli_error());
	
}else{

}
   $nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
$usex = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
if($usex['kovu_trn'] == '+')
{
if($nst['trn_busena'] == '2' OR $nst['trn_busena'] == '3' OR $nst['trn_busena'] == '4' OR$nst['trn_busena'] == '5' )
{
	mysqli_query($conn,"UPDATE user SET kiek_trn=kiek_trn+1 WHERE nick='$nick'");
}
	}
   }
   }}}
   }
   if($user[chat] == '1'){
   	top('Pokalbiai');
			require 'chat.php';
   }
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php?id=","Kovos","Kovojimas");
	navigacija($g_n);
   
}
    
    
    
	

if($id == 'kovu_masina'){
top('Kovų mašina');
online('Kovų mašina');


	$VS = post($_GET['VS']);
$KD = post($_GET['KD']);

 if($VS == botas){
 	
if($kg < 100000){
	$kr = $kg/10;
		$xp = $kg/10;
	$lvl = $kg;
	
}	
 else{	$kr = $kg/1000;
		$xp = $kg/1000;
				$lvl = $kg;}
	
 }              

   online('Kovoja kovų lauke');

    
 if($KD != $_SESSION['kovv']){
       
        echo '<div class="meniu" style="text-align: center;">Taip kovoti negalimą! Eikite atgal ir vėl pulkite.</div>';
  } else {
   
    
    if($apie['kovu_tm']-time() > 0){
       
          echo '<div class="meniu" style="text-align: center;"">Padusai! Kovoti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b>.</div>';
	} else {
   
   if($apie['energy'] >0){
      
          echo '<div class="meniu" style="text-align: center;"">Neturi energijos</div>';
	} else {
   
    if($gyvybes< 1){
    	
          echo '<div class="meniuc">Jūs pralaimėjote kovą</b>!<br/>Nes neturite gyvybių</div>';
		
          mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE zaidejai SET pveiksmai=pveiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
	}
	else{
		if($kg > 1000000000000){
			
			
			 echo '<div class="meniuc">Tau čia negalima, tik iki '.sk(1000000000000).' kg</div>';
			
		
		
		
	}
   	else{
		if($apie['lygis'] > 250){
			
			
			 echo '<div class="meniuc">Tau čia negalima, tik iki '.sk(250).' lygio!</div>';
			
		
		
		
	}
   
     else {
    $KDS = rand(9999,99999);
    $_SESSION['kovv'] = $KDS;
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
   if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
   
    mysqli_query($conn,"UPDATE zaidejai SET veiksmai=veiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
	
	
	
    $kiek_exp = $xp + $apie['exp'];
    $j = rand(20,60);
	$g = rand(20,60);
	$a = rand(1,10);
	$lvlas = 99999; 
$enda = 99999; 
$qq = 1.1;
for ($rr=1; $rr<99999; $rr++){ 
if ($rr==1){ $qq = 1.1; } else { $qq = $qq*1.1; }
if ($qq >= $kiek_exp/20 && $enda != $rr){ $lvlas = $rr; $enda = $rr+1; $buves = $qq; }
if ($enda==$rr){ $left = round($buves*20,1); break; }}
$left_xp = $left - $kiek_exp;
$kiek_turi =$apie['exp'] + $xp;
if ($lvlas > $apie['lygis']){
	$pt = rand(3,5); 
	
echo"<div class='meniuc'>
Sveikinu! Tu pasikelei naują lygį<br/>
Dabar tavo lygis: <u>$lvlas</u>. Gavai $pt Skill Points<br/></div>";


mysqli_query($conn,"UPDATE zaidejai SET taskai=taskai + '$pt' WHERE nick='$nick'");
}

	mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$j' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$g' WHERE nick='$nick' ");
    echo '<div class="meniuc">Jūs laimėjote kovą</b>!</div>
    
 
  ';
  
  echo' <div class="title">
    '.$ico2.' Jūsų Kovine galia: <b>'.sk($kg).'</b><br/>
    '.$ico2.'  Kovine galia: <b>'.$lvl.'</b><br/>
     '.$ico2.'  Energija: <b>'.$apie[energy].'/'.$apie[energy_max].'</b><br/>
    </div>
    <div class="meniu">
   '.$ico2.' Gavai <b>'.sk($xp).'</b> EXP.<br/>
    '.$ico2.' Turi '.sk($kiek_turi).'/'.sk($left).' EXP.<br/>
    '.$ico2.' Gavai <b>'.sk($kr).'</b> Pinigu<br/>
    '.$ico2.' Turi '.sk($litai).' pinigu.<br/>';
	if($a == '1'){
		
	echo''.$ico2.' Radai <b>1</b> auksinį<br/>';
	mysqli_query($conn,"UPDATE zaidejai SET auksiniai = auksiniai +'1' WHERE nick='$nick'");
	}
    dropas();
    echo '</div>'; 
    if($auto == "+" AND $apie[kovos] == 'js'){
    
  ?> <div class='titlec'> Kita kova įvyks už  <label id="setTime1397086567"><?echo $kovojimas?> sek.</label><label id="getTime1397086567" style="display:none;"><?echo $kovojimas ?></label> 
				<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
				<script type="text/javascript">
				updateTime1397086567();
				
				function updateTime1397086567() {
					time = $("#getTime1397086567").text();
					refresh = 1;
					countdown = 1;
					startTime = 3;
					
					if(startTime > 0)
					{
						if(time <= 0 && refresh)
						
						window.location = "fight.php?id=kovu_masina&VS=botas&KD=<?echo $KDS?>";
						else
						{
							var newTime = (countdown ? time - 1 : time + 1);
							$("#getTime1397086567").text(newTime);
							var days = Math.floor(newTime / (60 * 60 * 24));
							var hours = Math.floor((newTime - (days * (60 * 60 * 24))) / 3600);
							var minutes = Math.floor((newTime - (days * (60 * 60 * 24)) - (hours * 3600)) / 60);
							var seconds = Math.floor(newTime - (days * (60 * 60 * 24)) - (hours * 3600) - (minutes * 60));
							$("#setTime1397086567").text((days == 0 ? "" : days + " d. ") + (days == 0 && hours == 0 ? "" : hours + " val. ") + (days == 0 && hours == 0 && minutes == 0 ? "" : minutes + " min. ") + (seconds + " sek."));
							timer = setTimeout("updateTime1397086567()", 1000);
						}
					}
				}
				</script><br/></div>
    <?
    }
elseif($auto = '+' AND $apie[kovos] == 'paprastos'){
	
    echo '<meta http-equiv="refresh" content="'.$kovojimas.'; url=fight.php?id=kovu_masina&&VS=botas&KD='.$KDS.'">';}
    echo '<div class="meniuc"><a class="green_button_s" href="fight.php?id=kovu_masina&VS=botas&KD='.$KDS.'">Pulti vėl</a></span></div>';
	echo '<div class="meniu">'.$ico.'<a href="pagrindinis.php?id=apie&ka='.$nick.'">Apie mane</a><br/>
	'.$ico.'<a href="inv.php?id=">Inventorius</a></div>
	
	';
	$krss = $kr;
	$experience = $xp;

    mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$experience', litai=litai+'$krss', lygis='$lvlas',expl='$left', energy=energy-'1' WHERE nick='$nick'");

       $_SESSION['pad'] = time()+$padusimas;
	   $tt = time()+$padusimas;
	   mysqli_query($conn,"UPDATE zaidejai SET kovu_tm='$tt' WHERE nick='$nick'");
	 $fusn = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick'"));
    $fusn_k2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fusn[kitas_zaidejas]'"));
	
	if(!empty($user['team'])){
	$komanda = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));
	$plius = $user['win_in_team']+1;
	$pius = $komanda['viso_laimejo_kovu']+1;
	
	mysqli_query($conn,"UPDATE team SET viso_laimejo_kovu='$pius' WHERE pavadinimas = '".$user['team']."'") or die(mysqli_error());
	mysqli_query($conn,"UPDATE user SET win_in_team='$plius',iki_algos=iki_algos-'1' WHERE nick='$nick'")or die(mysqli_error());
	if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM komandu_dtop WHERE team = '$user[team]'"))){
		mysqli_query($conn,"INSERT INTO komandu_dtop SET laimejo_kovu='0', team = '".$user['team']."'")or die(mysqli_error());
		
	}else{
	mysqli_query($conn,"UPDATE komandu_dtop SET laimejo_kovu=laimejo_kovu+1 WHERE team='".$user['team']."'")or die(mysqli_error());
}}

   
   $nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
$usex = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
if($usex['kovu_trn'] == '+')
{
	mysqli_query($conn,"UPDATE user SET kiek_trn=kiek_trn+1 WHERE nick='$nick'");
}
	
   
   }}}
   }}}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php?id=","Kovos","Kovų mašina");
	navigacija($g_n);
   

}


if($id == 'fm'){
	  $KDS = rand(9999,99999);
    $_SESSION['kovv'] = $KDS;
	top('Kovų mašina');
online('Kovų mašina');
echo'<div class="meniuc">Kovų mašinoje negalioja <b>Majin</b>, <b>Vip</b> bei kiti gavimai</br>
Kovų mašinoje galima kautis iki <b>250</b> Lygio arba <b> '.sk(1000000000000).'</b> Kovinės galios</br>
Mašina skrita naujokams tad čia gavimai daug didesni



</div>';
    echo '<div class="meniuc"><a class="green_button_s" href="fight.php?id=kovu_masina&VS=botas&KD='.$KDS.'">Kautis</a></span></div>';


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php?id=","Kovos","Kovų mašina");
	navigacija($g_n);
	
}


 foot();
		
		
		?>
