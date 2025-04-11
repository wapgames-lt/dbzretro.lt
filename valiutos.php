<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

	  

   $prizas = $nust['sms_priz'];
	$prizas2 = round($nust['sms_priz']) / 2;
	$prizas3 = round($nust['sms_priz']) / 3;
 $statusai = array("Mod","Mod2","Mod3","Mod4","Admin");
$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
$new = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$xd = mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick= $nick");
head2();
if($nust['new_time']-time() > 0){
    $q = mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1");
   
    while($row = mysqli_fetch_assoc($q)){
        echo '<div class="meniuc">Padarytas atnaujinimas: '.$row['name'].'</div>';
      
        unset($row);
    }
}
	   


baneris();
		topbar();

	
		
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == true){
	echo"<div class='meniuc'><font color='red'>Dėmesio! Tu kviečiamas į ".$team_pakv['team']." komandą!</font><br>
	<a href='komanda.php?id=atmesti&ka=".$team_pakv['team']."'>Atmesti</a> <a href='komanda.php?id=priimti&ka=".$team_pakv['team']."'>Priimti</a>
	</div>";
	}
		if(empty($apie['vardas'])){
 	$error='<a href="?id=keistiinf">Nusistatyk anketa</a>';
}
		 if(empty($apie['k_dovana'])){

        $error='<a href="?id=dovana"><b>Pasiimti naujoko dovaną</b></a>';

    }
		if(empty($apie['litis'])){
 	$error='<a href="?id=litis">Nusistatyk lyti</a>';
}
	
			if(empty($apie['email'])){
 $error='<a href="meniu.php?id=email">Nusistatyk email slaptažodžio priminimui</a>';
}	
			if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM b_rez WHERE nick ='$nick' && bals_id ='1'")) == false){
 $error='<a href="balsavimai.php">Naujas balsavimas kuriame nebalsavai !</a>';
}	
			if($apie['daily'] != '+'){
				$error='<a href="?id=daily">Pasiimk dienos prizą</a>';
				
			}
		
		if(isset($error)){
			
	     echo '<div class="meniuc">'.$error.'</div>';
		}	
		
$pakvietimai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pakvietimai WHERE nick='$nick'"));
if($pakvietimai > 0 ? $pakvietimai : 0){
  echo '<div class="meniuc">'.statusas($pakvietimai['kviecia']).' Kviečia i draugus !<br/>
    <a href="pagrindinis.php?id=priimti&ID='.$pakvietimai['kviecia'].'">Priimti</a> | <a href="pagrindinis.php?id=atmesti&ID='.$pakvietimai['kviecia'].'">Atmesti</a> 
  
  
  
  </div>';
	
}
/// team pakvietims ++
$mano_team = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE vadas='$nick'"));
$kvietimas_i_komanda = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM prasosi_i_komanda WHERE komanda='$mano_team[pavadinimas]'"));
if($kvietimas_i_komanda  > 0){
  echo '<div class="meniuc">'.statusas($kvietimas_i_komanda['nick']).' Nori i jūsų komanda<br/>
   
  	<a href="komanda.php?id=atmesti_kv&ka='.$kvietimas_i_komanda['nick'].'"><font color="red">Atmesti</font></a> <a href="komanda.php?id=priimti_kv&ka='.$kvietimas_i_komanda['nick'].'"><font color="blue">Priimti</font></a>
  
  
  </div>';
	
}
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM statusai WHERE kam='$nick'")) == true){
	$st = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM statusai WHERE kam='$nick'"));
	
	  echo '<div class="meniuc">'.statusas($st['nick']).' Nori pakeisti draugystės statusas į '.$st['stats'].'<br/>
	  
	  <a href="?id=stt_n&ka='.$st['nick'].'&ID='.$st['id'].'"><font color="red">Nesutinku</font></a> <a href="?id=stt_p&ka='.$st['nick'].'&ID='.$st['id'].'"><font color="blue">Sutinku</font></a>
	  <br/>
	
</div>	';
	
}

   $stt = array("Admin","Mod4","Mod3","Mod2","Mod");
if(in_array($apie['statusas'], $stt) && mysqli_num_rows(mysqli_query($conn,"SELECT * FROM foto WHERE ar_patvirtinta='ne'")) >0){
	
 echo'<div class="meniuc"> <a href="meniu.php?id=mod&ka=ft_tikrinimas">Nauja nepatvirtinta nuotrauka</a></div>';
	
}

if($user['kovu_trn'] !='+' && $nst['trn_busena'] == 0 && $user['rodyti_turnyra']] == 1){
		
	echo '<div class="meniuc"><b><font color="red">!!!</font> Registracija į turnyrą prasidėjo <font color="red">!!!</font><br/> >>> <a href="trn.php?id=reg">Registruotis</a> <<< </b></div>';
}
$sajanas =mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM legendinis_sajanas"));
if($sajanas['prisikels']-time() < 0){
	echo '<div class="meniuc"><b><a href="legendinis_sajanas.php"><font color="red">Legendinis sajanas prisikėlė</font></a></div>';
}	
		
		
if($id == ""){
 online('Suka varkes');
 echo'<div class="up">Jūsų turimos Valiutos:</div>';
 	echo' <div class="meniuc"><img src=img/imgg/valiutos.png border="1" width="180" height="90"><alt="**"></div>';
 echo '
 <div class="meniuc">
<a href="eurai.php?id=">'.skaicius($apie['sms_litai'],2).'<img src="img/bicons/euro.png" /> | </a><a href="kreditai.php?"> 
'.skaicius($kreditai).' <img src="img/bicons/credit.png" /></a>  |
 <a href="auksiniai.php?id="> '.skaicius($apie['auksiniai']).' <img src="img/bicons/auxo.png" /> </a>  | <a href="ptshop.php?id=">'.skaicius($inv['unikalus']).'  <img src="img/bicons/pt.png" /> </a><br></div>



 ';
 

	}


    if($id == 'pasl'){
	top('Užsakytos paslaugos');
   
 echo' <div class="meniuc"><img src=img/imgg/paslaugos.png border="1" width="180" height="90"><alt="**"></div>';
 if($apie['dgeur']-time() > 0){
  echo '<div class="meniuc">Paslauga 2x eurų tau dar galios: <b>'.laikas($apie['dgeur']-time(), 1).'</b></div>';
}
if($apie['duxkrd']-time() > 0){
  echo '<div class="meniuc">Paslauga 2x kreditų tau dar galios: <b>'.laikas($apie['duxkrd']-time(), 1).'</b></div>';
}
 
if($apie['duxaux']-time() > 0){
  echo '<div class="meniuc">Paslauga 2x auksinių tau dar galios: <b>'.laikas($apie['duxaux']-time(), 1).'</b></div>';
}
if($apie['dgax']-time() > 0){
  echo '<div class="meniuc">Paslauga 3x auksinių tau dar galios: <b>'.laikas($apie['dgax']-time(), 1).'</b></div>';
}

if($apie['dglg']-time() > 0){
  echo '<div class="meniuc">Paslauga daugiau lygio taškų tau dar galios: <b>'.laikas($apie['dglg']-time(), 1).'</b></div>';
}
if($apie['duxdaig']-time() > 0){
  echo '<div class="meniuc">Paslauga didesnis daigtų gavimas tau dar galios: <b>'.laikas($apie['duxdaig']-time(), 1).'</b></div>';
}
if($apie['duxpx']-time() > 0){
  echo '<div class="meniuc">Paslauga 30% pinigų ir exp tau dar galios: <b>'.laikas($apie['duxpx']-time(), 1).'</b></div>';
}
if($apie['duxkrd']-time() > 0){
  echo '<div class="meniuc">Paslauga 2x kreditu tau dar galios: <b>'.laikas($apie['duxkrd']-time(), 1).'</b></div>';
}
if($apie['cusb']-time() > 0){
  echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['cusb']-time(), 1).'</b></div>';
}
if($apie['antipl']-time() > 0){
  echo '<div class="meniuc">Anti nuo puolimų dar turėsi: <b>'.laikas($apie['antipl']-time(), 1).'</b></div>';
}
   else{ 
echo'<div class="meniuc"> 
Neturi užsisakęs paslaugų
!</div> ';
}
}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Įsigytos paslaugos");
	navigacija($g_n);

foot();
?>



