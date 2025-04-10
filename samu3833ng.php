<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

topbar();
if($apie[vip]-time > 0){
$kovojimas = 0;
	$padusimas = 0;	
	
}

else{
	
	$kovojimas = 5;
	$padusimas = 4;	
}
if($apie[lygis] < 10){
		top('Samungo planeta');
echo '<div class="meniuc"><img src=img/shenron2.png><alt="**"></br></br>Į Samungo planeta galima tik nuo 200 lygio !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Samungo planeta");
	navigacija($g_n);
}else{
switch($id){
	default:
top('Samungo planeta');
echo '<div class="meniuc"><img src=img/shenron2.png><alt="**"></br>Samungo planeta, čia galėsite ieškoti samungo drakono rutulių kurie duos žymiai daugiau</div>';

echo'<div class="meniu">
'.$ico.' <a href="?id=ieskoti">Ieškoti rutulių</a><br />
'.$ico.' <a href="?id=dragon">Kviesti dievą drakoną</a><br />
'.$ico.' <a href="?id=laukas">Kovų laukas</a><br />

</div>
';



  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Samungo planeta");
	navigacija($g_n);
break;

	case'ieskoti':
	top('Drakono rutulių ieškojimas');
	
	
	echo '<div class="meniuc"><img src=img/shenron2.png><alt="**"></br>
  
   Drakono rutuliu radimas 10 %
    </div>
    
    <div class="title">
    '.$ico.' <a href="?id=ieskoti2">Ieškoti</a><br/>
  
     
    </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","samung.php", "Samung planeta", "Drakono rutulių ieškojimas");
	navigacija($g_n);
	
	
break;
case'ieskoti2':
top('Drakono rutulių ieškojimas');
if ($inv['radaras'] < 1){
	echo'
	<div class="meniuc">Tu neturi radaro</div>
'; 
}

elseif ($apie['sbal'] > time()){
	echo'
	<div class="meniuc">Ieskoti galima kas 6 valandas !!!</br> Ieškoti galėsi po '.laikas($apie[sbal]-time(),1).'</div>
'; }
else{
	if ($inv['radaras'] > 0){
$randas = rand(1,10);
if ($randas == 5){
	echo'
	<div class="meniuc">Radai Samungo drakono rutuli</div>
'; 
   mysqli_query($conn,"UPDATE inv SET Sball=Sball+'1' WHERE nick='$nick'")or die(mysqli_error());
$ko = time() + 21600;
mysqli_query($conn,"UPDATE zaidejai SET sbal = '$ko' WHERE nick = '$nick' ");

}

else{
echo'
	<div class="meniuc">Neradai rutulio....</div>
	'; 
	$ko = time() + 21600;
mysqli_query($conn,"UPDATE zaidejai SET sbal = '$ko' WHERE nick = '$nick' ");}

}}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","samung.php", "Samung planeta", "Drakono rutulių ieškojimas");
	navigacija($g_n);

break;
case'dragon':
   online('Kviečią Samung Dievą drakoną');
	top('Samung dievas drakonas');
   if($inv['Sball'] < 7){
 	
	  echo '<div class="meniuc">Neturi 7 Samungo planetos rutulių rutuliu</div>';
	
 }else{
     
      if($co == 1){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 350 kreditų.</div>';
         mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'350' WHERE nick='$nick' ");
        mysqli_query($conn,"UPDATE inv SET Sball=Sball-'7' WHERE nick='$nick'")or die(mysqli_error());}
      elseif($co == 2){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai '.sk(5000000000).' pinigu.</div>';
         mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'5000000000' WHERE nick='$nick' ");
         mysqli_query($conn,"UPDATE inv SET Sball=Sball-'7' WHERE nick='$nick'")or die(mysqli_error());
      }
      elseif($co == 3){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 60% savo Jėgos.</div>';
         $jeggoo = round($jega*60/100);
         mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE inv SET Sball=Sball-'7' WHERE nick='$nick'")or die(mysqli_error());
      }
      
      elseif($co == 4){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 60% savo Gynybos.</div>';
         $gynnoo = round($gynyba*60/100);
         mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET Sball=Sball-'7' WHERE nick='$nick'")or die(mysqli_error());
      } 
       elseif($co == 5){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 30% savo Gynybos ir Jėgos</div>';
         $gynnoo = round($gynyba*30/100);
         $jeggoo = round($jega*30/100);
         mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
		          mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET Sball=Sball-'7' WHERE nick='$nick'")or die(mysqli_error());
      } 
      
      else {
      	 echo '<div class="meniuc"><img src="img/samung.png" alt="*"></br>';
         echo 'Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div>';
         echo '<div class="title">
         <b>1.</b> <a href="?id=dragon&co=1">350 Kreditų</a><br/>
         <b>2.</b> <a href="?id=dragon&co=2">'.sk(5000000000).' pinigu</a><br/>
         <b>3.</b> <a href="?id=dragon&co=3">60% Jėgos</a><br/>
         <b>4.</b> <a href="?id=dragon&co=4">60% Gynybos</a><br/>
          <b>5.</b> <a href="?id=dragon&co=5">30% Jėgos ir Gynybos</a><br/>
         </div>';
      }
          
   
   
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","samung.php", "Samung planeta", "Dievas drakonas");
	navigacija($g_n);
}
break;
case'kova':
	$VS = post($_GET['VS']);
$KD = post($_GET['KD']);
switch ($VS) {
case'1':
$kr = 300600000000;
$xp = 350000000000;
$lvl = 1000000000000000000000000000000000000000000000000 ;
break;
case'2':
$kr = 350600000000;
$xp = 370000000000;
$lvl = 5000000000000000000000000000000000000000000000000 ;
break;
case'3':
$kr = 450600000000;
$xp = 470000000000;
$lvl = 20000000000000000000000000000000000000000000000000 ;
break;
case'4':
$kr = 550600000000;
$xp = 570000000000;
$lvl = 50000000000000000000000000000000000000000000000000 ;
break;
case'5':
$kr = 550600000000;
$xp = 570000000000;
$lvl = 50000000000000000000000000000000000000000000000000 ;
break;	
}

	


   online('Kovoja kovų lauke');

    
  if($KD != $_SESSION['kovv']){
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;">Taip kovoti negalimą! Eikite atgal ir vėl pulkite.</div>';
    } else {
   
    
    if($apie['kovu_tm']-time() > 0){
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;"">Padusai! Kovoti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b>.</div>';
	} else {
   
   if($apie['energy'] < 1){
        top(Klaida);
          echo '<div class="meniu" style="text-align: center;"">Neturi energijos</div>';
	} else {
   
    if($gyvybes == 0 or $lvl > $kg){
    	top(Klaida);
          echo '<div class="meniuc">Jūs pralaimėjote kovą</b>!<br/>Praradai visas gyvybęs.</div>';
		
          mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE zaidejai SET pveiksmai=pveiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
    } else {
    $KDS = rand(9999,99999);
    $_SESSION['kovv'] = $KDS;
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
   if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
   
    mysqli_query($conn,"UPDATE zaidejai SET veiksmai=veiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
	
	
	
      
    //* EVENTAS
    if($apie['majin']-time() > 0){
        $kr= $kr*1.5;
        $xp = $xp*1.5;
        $xxs = "+";
    }
	

    /*if(isset($xx2)){
        $pin = $mob['pin']*2;
        $drop_xp = $mob['exp']*2;
        $xxs2 = "+";
    }*/
    
  $times = date("H:i:s");
   if($times > '21:00:00' and $times < '21:00:00'){
   	  $kr= $kr*2;
        $xp = $xp*2;
        $xxs = "+";
}
    if($xxs != '+'){
        $pin = $kr;
        $xp = $xp;
    }
   if($nust['diena'] == '1'){
        $kr= $kr*1.50;
       
        $xxs = "+";
    }
      if($nust['diena'] == '2'){
        $xp = $xp*1.50;
       
        $xxs = "+";
    }
if($apie['kate'] == '+'){
        $kr= $kr*1.5;
        $xp = $xp*1.5;
        $xxs = "+";
    }
	if($apie['vip']-time() > 0){
        $kr= $kr*5;
        $xp = $xp*5;
        $xxs = "+";
    }

		
	
				
			
		
	 
    ///
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
top(Kovojimas);
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
   '.$ico2.' Gavai <b>'.sk($xp*2).'</b> EXP.<br/>
    '.$ico2.' Turi '.sk($kiek_turi).'/'.sk($left).' EXP.<br/>
    '.$ico2.' Gavai <b>'.sk($kr/100).'</b> Pinigu<br/>
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
						
						window.location = "?id=kova&VS=<?echo $VS?>&KD=<?echo $KDS?>";
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
	
    echo '<meta http-equiv="refresh" content="'.$kovojimas.'; url=samung.php?id=kova&&VS='.$VS.'&KD='.$KDS.'">';}
    echo '<div class="title">'.$ico.'<a href="?id=kova&VS='.$VS.'&KD='.$KDS.'">Pulti vėl</a><br/>';
	echo ''.$ico.'<a href="pagrindinis.php?id=apie&ka='.$nick.'">Apie mane</a><br/>
	'.$ico.'<a href="inv.php?id=">Inventorius</a></div>
	
	';
	$krss = $kr/100;
	$experience = $xp*2;

    mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$experience', litai=litai+'$krss', lygis='$lvlas',expl='$left', energy=energy-'1' WHERE nick='$nick'");

       $_SESSION['pad'] = time()+$padusimas;
	   $tt = time()+$padusimas;
	   mysqli_query($conn,"UPDATE zaidejai SET kovu_tm='$tt' WHERE nick='$nick'");
	 $fusn = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$nick'"));
    $fusn_k2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM susijungimas WHERE nick='$fusn[kitas_zaidejas]'"));
	 if(!empty($fusn['kitas_zaidejas']) AND $fusn[double_fussion_dance] == '+'){ 
        $kiek_expss = $xp/10;
        mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$kiek_expss' WHERE nick='$fusn[kitas_zaidejas]'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE susijungimas SET uzdirbo_exp=uzdirbo_exp+'$kiek_expss' WHERE nick='$nick'")or die(mysqli_error());}
   
    
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
}

   
   $nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
$usex = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
if($usex['kovu_trn'] == '+')
{
	mysqli_query($conn,"UPDATE user SET kiek_trn=kiek_trn+1 WHERE nick='$nick'");
}
	
  
   
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","samung.php","Samung planeta","Kovojimas");
	navigacija($g_n);
   
}}}}}
break;
case'laukas':
	$KD= rand(111111,999999);
	$_SESSION['kovv'] = $KD;
	top('Almighty');
				echo'	
				
<div class="meniu">
			
<div class="meniu">'.$ico.'  <a href="?id=kova&VS=1&KD='.$KD.'">Trunks</a>(1,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000 kg) <br/></div
 <div class="meniu">'.$ico.'  <a href="?id=kova&VS=2&KD='.$KD.'">Goten</a>(5,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000 kg)<br/>
'.$ico.'  <a href="?id=kova&VS=3&KD='.$KD.'">Vegeta</a>(20,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000kg)<br/>
'.$ico.'  <a href="?id=kova&VS=4&KD='.$KD.'">Goku</a>(50,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000kg)<br/>
'.$ico.'  <a href="?id=kova&VS=5&KD='.$KD.'">Gohan</a>(500,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000,000kg)<br/> </div>
';

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","samung.php","Samung planeta","Kovojimas");
	navigacija($g_n);
		
break;

	

}}
switch ($VS) {
case'1':
$kr = 300600000000;
$xp = 350000000000;
$lvl = 1000000000000000000000000000000000000000000000000 ;
break;
case'2':
$kr = 350600000000;
$xp = 370000000000;
$lvl = 5000000000000000000000000000000000000000000000000 ;
break;
case'3':
$kr = 450600000000;
$xp = 470000000000;
$lvl = 20000000000000000000000000000000000000000000000000 ;
break;
case'4':
$kr = 550600000000;
$xp = 570000000000;
$lvl = 50000000000000000000000000000000000000000000000000 ;
break;
case'5':
$kr = 700600000000;
$xp = 670000000000;
$lvl = 500000000000000000000000000000000000000000000000000 ;
break;	
}



foot();
?>
