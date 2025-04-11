<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
   topbar();
 $kovojimas = 2;
 $padusimas = 3; 
 
    $asas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unikalai WHERE unikalas='$veikejas'"));
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM unikalai WHERE unikalas='$asas[unikalas]'")) > 0){

        //$kg = $apie['jega'] + ($apie['gynyba']/2) + ($swordp + $armorp);


        $kguni = ($kg/100)*$asas['kg'];

        if($bonusask !=""){
        $kgun = $kg+$kguni+$bonusask;
      }
      else{
        $kgun = $kg+$kguni;
      }


    }
    else{
      $kgun = $kg;
    
    }


if($apie['lygis'] < 100){
top('Tuffle planeta');
echo '<div class="meniuc"><img src=img/tuffle.png border="1" width="180" height="90"><alt="**"></br></br>Į Tuffle planeta galima tik nuo 100 <img src="img/bicons/lvl.gif" /> !</div>';

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Tuffle planeta");
navigacija($g_n);
	
}else{
	
if($apie['persikelimo_manevras'] == ''){
top('Tuffle planeta');
echo '<div class="meniuc"><img src=img/tuffle.png></br></br>Tu neturi persikėlimo manevro, jį gali išmokti <b>Mano skiluose</div>';

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Tuffle planeta");
navigacija($g_n);


}else{

if($id == ""){
	
	
	 if($nust['kovos'] == "-"){
       echo '<div class="meniuc"><b>Kovų laukas išjungtas!</br></div></div>';

}
else{

			  online('Tuffle Planeta');

	if($auto == "+"){
       $onoff = '<font color="green">Įjunkti</font>';
       $nurd = '<a href="tuffle.php?id=auto_off">Išjungti</a>';
   } else {
       $onoff = '<font color="red">Išjungti</font>';
       $nurd = '<a href="tuffle.php?id=auto_on">Ijungti</a>';  
   }
   
   echo '<div class="up"><b>Tuffle Planeta</b></div>';

 echo '<div class="meniuc"><img src="img/tuffle.png" border="0" alt="*"></div>';

   echo '

   <div class="meniuc">

   Dabar auto kovojimai <b>'.$onoff.'</b> ['.$nurd.']<br/>

</div>';

    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tuffle_lokacijos"))[0];


    if($total > 0){

   echo '<div class="up"><b>'.$ico.' Vietovės</b>:</div>';

   echo '<div class="meniu">';

   $query = mysqli_query($conn,"SELECT * FROM tuffle_lokacijos");

   while($row = mysqli_fetch_assoc($query)){

         echo '<b>[&raquo;]</b> <a href="tuffle.php?id=vieta&ID='.$row['id'].'">'.$row['name'].'</a><br/>';

         unset($row);

   }

   echo '</div>';

   } else {

         echo '<div class="error">Kolkas lokacijų nėra.</div>';

   }

   echo '<div class="up"><b>'.$ico.' Papildoma</b>:</div>

   <div class="meniu">
   <b>[&raquo;]</b> <a href="?id=treniruotes">Tuffle planetos treniruotės</a><br/>
   <b>[&raquo;]</b> <a href="tuffle.php?id=baby">Baby Vegeta Planas</a> <font color="red">[Galima vykdyti tik 1kart&#261;!]</font><br/>

   </div>';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Tuffle planeta");
	navigacija($g_n);



}   
}


	elseif($id == "auto_off"){
    online('Auto kovojimai');
    
    echo '<div class="meniuc">Auto kovojimai išjungti!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET auto='-' WHERE nick='$nick' ");
		   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php","Tuffle Planeta","AUTO");
	navigacija($g_n);
  
	
}
elseif($id == "auto_on"){
    online('Auto kovojimai');
    
    echo '<div class="meniuc">Auto kovojimai įjungti!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET auto='+' WHERE nick='$nick' ");
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php", "Tuffle Planeta", "AUTO");
	navigacija($g_n);




}
          

	 elseif($id == "treniruotes"){
	top('Tuffle planetos treniruotės');

echo '<div class="title" style="text-align: center;">
1 jėgos = 1 500 <img src="img/bicons/pinigai.png"> Jums išeiną pasitreniruoti jėgos <b>'.sk($litai/1500).'</b>kartų.
   </div><div class="line"></div>';



   echo '<div class="titlec" style="text-align: center;">


 <form action="?id=tren2" method="post"/>
 Kiek kartų treniruositi jėgą?
    <br /><input type="text" name="jegos"/><br />
   <input type="submit" name="submit" value="Treniruotis"/>
   </div></form>';



echo '<div class="title" style="text-align: center;">
1 gynybos = 500 <img src="img/bicons/pinigai.png"> Jums išeiną pasitreniruoti gynybos <b>'.sk($litai/500).'</b> kartų.
   </div><div class="line"></div>';
   echo '<div class="titlec" style="text-align: center;">
<form action="?id=tren3" method="post"/>
Kiek kartų treniruositi gynybą?<br /><input type="text" name="gynybos"/><br />
<input type="submit" name="submit" value="Treniruotis"/>
   </div></form>';









   
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php", "Tuffle Planeta", "Treniruotės");
	navigacija($g_n);}
elseif($id == "tren2"){
   online('Tuffle planetos treniruotės');
 top('Tuffle planetos treniruotės');

  
   if(isset($_POST['submit'])){
       $kjega = isset($_POST['jegos']) ? preg_replace("/[^0-9]/","",$_POST['jegos'])  : null;

	    
		
   
	   $kjeg = $kjega * 1500;
    
       $kkiek = $kjeg  ;

        if($litai < $kkiek){
            $klaida = "Neturi pakankamai pinigu.";
        }

        if(empty($kjega) && empty($kgynyba)){
            $klaida = "Paliktas tuščias laukelis.";
        }

       if($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
      } else {
            mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$kjega', litai=litai-'$kkiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta! Pasitreniravai';
            if($kjega == ""){} else {
                 echo ' <b>'.sk($kjega).'</b> Jėgos';
            }
            echo '. Tau kainavo <b>'.sk($kkiek).'</b> Pinigu.</div>';
      }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php", "Tuffle Planeta", "Treniruotės");
	navigacija($g_n);
	   }}

elseif($id == "tren3"){
   online('Tuffle planetos treniruotės');
 top('Tuffle planetos treniruotės');

  
   if(isset($_POST['submit'])){

       $kgynyba = isset($_POST['gynybos']) ? preg_replace("/[^0-9]/","",$_POST['gynybos'])  : null;

		

   
       $kgyn = $kgynyba * 500;
       $kkiek = $kgyn  ;

	   

        if($litai < $kkiek){
            $klaida = "Neturi pakankamai <img src='img/bicons/pinigai.png'>";
        }

        if(empty($kgynyba) && empty($kgynyba)){
            $klaida = "Paliktas tuščias laukelis.";
        }

       if($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
      } else {
            mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$kgynyba', litai=litai-'$kkiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta! Pasitreniravai';

            if($kgynyba == ""){} else {
                 echo ' <b>'.sk($kgynyba).'</b> Gynybos';
            }

            echo '. Tau kainavo <b>'.sk($kkiek).'</b> Pinigu.</div>';
      }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php", "Tuffle Planeta", "Treniruotės");
	navigacija($g_n);
	   }}  


elseif($id == "vieta"){

$KD = rand(9999,99999);

$_SESSION['refresh'] = $KD;
mysqli_query($conn,"UPDATE zaidejai SET kda='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);

   online('tuffle Planeta - Kovose');

   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tuffle_lokacijos WHERE id='$ID' "));
$m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tuffle_lokacijos WHERE id='$ID' ")) == 0){

          echo '<div class="up"><b>Klaida ! ! !</b></div>';

          echo '<div class="error">Tokios lokacijos nėra!</div>';

    } else {

        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM tuffle_mobai WHERE lokacija='$ID'"))[0];


        echo '<div class="up"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>'.$lok['name'].'</b></font></div>';





         if($total > 0){

             echo '<div class="meniuc"><img src="img/'.$lok['foto'].'"width="150"border="1"></div><div class="meniuc">

Jūs galite nukauti <b><font color="red">'.sk($kgun).'</font></b> lygio karį.</div><div class="up"><b>'.$ico.' Kovotojas (K.G)</b></div>';

             echo '<div class="meniu">';

             $query = mysqli_query($conn,"SELECT * FROM tuffle_mobai WHERE lokacija='$ID' ORDER BY -kg DESC LIMIT 0,30");

             while($row = mysqli_fetch_assoc($query)){
              if($row['kg'] < $kgun){
                $nukausi = "<font color='green'>&raquo;</font>";
              }
              else{
                $nukausi = "<font color='red'>&raquo;</font>";
              }
                   echo '<b>['.$nukausi.']</b> <a href="tuffle.php?id=pulti&ID='.$row['lokacija'].'&VS='.$row['id'].'&KD='.$KD.'">'.$row['name'].'</a> ('.sk($row['kg']).')<br/>';

                   unset($row);

             }

         echo '</div>';

         } else {

              echo '<div class="error">Kolkas monstrų nėra.</div>';

         }

         }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuflle.php","Tuffle planeta","Vietovės");
	navigacija($g_n);

}



elseif($id == "pulti"){

$ID = post($_GET['ID']);
$VS = post($_GET['VS']);
$KD = post($_GET['KD']);
   online('tuffle Planeta - Kovose');
$dtop = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM dtop WHERE id='vksm' "));
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tuffle_lokacijos WHERE id='$ID' "));
   $mob = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tuffle_mobai WHERE id='$VS' "));
   $m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tuffle_lokacijos WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios lokacijos nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tuffle_mobai WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokio monstro kovų lauke nėra!</div></div>';
    } }
    if($m['kda'] != $KD){
  
        top('Klaida');
          echo '<div class="meniu" style="text-align: center;">Taip kovoti negalimą! Eikite atgal ir vėl pulkite.</div>';
    } 
else {
   
    
    if($apie['kovu_tm']-time() > 0){
        top('Klaida');
          echo '<div class="meniu" style="text-align: center;"">Padusai! Kovoti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b>.</div>';
	} else {
   
   if($apie['energy'] < 0){
        top('Klaida');
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
    if($gyvybes == 4444444 or $mob['kg']/$kovureward > $kg){
    	top(Klaida);
          echo '<div class="meniuc"><img src="img/bicons/dislike.png" /> Jūsų '.$kgi.'  yra per maža!</div>';
		
          mysqli_query($conn,"UPDATE zaidejai SET gyvybe='0' WHERE nick='$nick' ");
          mysqli_query($conn,"UPDATE zaidejai SET pveiksmai=pveiksmai+0, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
    
    } else {


    $KDS = rand(9999,99999);
	mysqli_query($conn,"UPDATE zaidejai SET kda='$KDS' WHERE nick='$nick'");
    $_SESSION['kovv'] = $KDS;
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
   if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
   
    mysqli_query($conn,"UPDATE zaidejai SET veiksmai=veiksmai+1, vveiksmai=vveiksmai+1 WHERE nick='$nick'");
	
	
	

     $kiek_exp = $mob['exp'] + $apie['exp'];
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
(<b>'.skaicius($mob['kg']).'</b> <img src="img/bicons/kovines.png" />)</div>  ';
	mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$j' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$g' WHERE nick='$nick' ");
	
	
	
echo'  <div class="meniuc">  <img src="img/veikejaic/'.$mob['foto'].'"width="150"border="1"></div>';
  
if($apie['kenergija'] > 49999){
echo'<div class="up">Kamehameha technika</div>';
echo'<div class="meniuc">Gaunate <b>4x</b> '.$pinigaii.' daugiau!</div>';}
if($apie['kenergija2'] > 49999){
echo'<div class="up">Final flash technika</div>';
echo'<div class="meniuc">Gaunate <b>3x</b> '.$expi.' daugiau!</div>';}
if($apie['kenergija3'] > 49999){
echo'<div class="up">Masenko technika</div>';
echo'<div class="meniuc">Gaunate <b>2x</b> '.$pinigaii.' , '.$expi.' daugiau!</div>';}
if($apie['kenergija4'] > 49999){
echo'<div class="up">Galick Gun technika</div>';
echo'<div class="meniuc">Gaunate <b>3.5x</b> '.$pinigaii.' , <b>4.5</b>'.$expi.' daugiau !</div>';}
if($apie['kenergija5'] > 49999){
echo'<div class="up">Death Laser technika</div>';
echo'<div class="meniuc">Gaunate <b>2.5x</b> '.$pinigaii.' , <b>3.5</b> '.$expi.' daugiau!</div>';}
if($apie['kenergija7'] > 49999){
echo'<div class="up">Sayan Power technika</div>';
echo'<div class="meniuc">Gaunate <b>3x</b> '.$pinigaii.' daugiau!</div>';}
if($apie['kenergija8'] > 49999){
echo'<div class="up">Makosen technika</div>';
echo'<div class="meniuc">Gaunate <b>5x</b> '.$expi.' daugiau!</div>';}
if($apie['kenergija10'] > 49999){
echo'<div class="up">Changed technika</div>';
echo'<div class="meniuc">Gaunate <b>2.5x</b>'.$pinigaii.' ,  '.$expi.' daugiau!</div>';}
if($apie['kenergija12'] > 49999){
echo'<div class="up">Regeneration technika</div>';
echo'<div class="meniuc">Gaunate <b>4x</b>'.$pinigaii.' ,  '.$expi.' daugiau!</div>';}
if($apie['kenergija13'] > 49999){
echo'<div class="up">ArmBreak technika</div>';
echo'<div class="meniuc">Gaunate <b>3x</b>'.$pinigaii.' ,  '.$expi.' daugiau!</div>';}
if($apie['kenergija15'] > 49999){
echo'<div class="up">AngryBulma technika</div>';
echo'<div class="meniuc">Gaunate <b>2x</b>'.$pinigaii.' ,  '.$expi.' daugiau!</div>';}
if($dtop2['vksm'] ==40000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>40000</b> veiksmų , gaunate <b>35</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>40000</b> veiksmų! Gavai <b>35</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'35' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2['vksm'] ==25000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>25000</b> veiksmų , gaunate <b>30</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>25000</b> veiksmų! Gavai <b>30</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'30' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2['vksm'] ==15000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>15000</b> veiksmų , gaunate <b>25</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>15000</b> veiksmų! Gavai <b>25</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'25' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2['vksm'] ==7000){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>7000</b> veiksmų , gaunate <b>20</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>7000</b> veiksmų! Gavai <b>20</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'20' WHERE nick='$apie[nick]'")or die(mysqli_error());


}

if($dtop2['vksm'] ==3500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>3500</b> veiksmų , gaunate <b>15</b>'.$eurui.'</div>';
$txt = "įvygdei <b>kovų užduotį</b> - Padaryti <b>3500</b> veiksmų! Gavai <b>15</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'15' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2['vksm'] ==1500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>1500</b> veiksmų , gaunate <b>10</b>'.$eurui.'</div>';
$txt = "Įvygdei <b>kovų užduotį</b> -  Padaryti <b>1500</b> veiksmų! Gavai <b>10</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'10' WHERE nick='$apie[nick]'")or die(mysqli_error());


}
if($dtop2['vksm'] ==500){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc">Atlikote <b>500</b> veiksmų, gaunate <b>5</b>'.$eurui.'</div>';
$txt = "Įvygdei <b>kovų užduotį</b> -  Padaryti <b>500</b> veiksmų! Gavai <b>5</b> $eurui ";
                    mysqli_query($conn,"INSERT INTO pm SET what='SISTEMA', txt='$txt', time='".time()."', nauj='NEW', gavejas='$apie[nick]' ");

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'5' WHERE nick='$apie[nick]'")or die(mysqli_error());



}
if($dtop2['vksm'] >40001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small><b>Tu esi įvygdęs visas užduotis!</b></small></div>';


}
else{
if($dtop2['vksm'] >25001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>40000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>35</b>'.$eurui.'</small></div>';


}

else{
if($dtop2['vksm'] >15001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>25000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>30</b>'.$eurui.'</small></div>';


}
else{
if($dtop2['vksm'] >7001){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>15000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>25</b>'.$eurui.'</small></div>';


}

else{
if($dtop2['vksm'] >3501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>7000</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>20</b>'.$eurui.'</small></div>';


}

else{
if($dtop2['vksm'] >1501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>3500</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>15</b>'.$eurui.'</small></div>';


}

else{
if($dtop2['vksm'] >501){
echo'<div class="up">Kovų užduotis</div>';
echo'<div class="meniuc"><small>Tu padaręs -  <b>'.sk($dtop2['vksm']).'</small></b><img src="img/bicons/attack1.png" /> | <small>Reikia padaryti - <b>1500</b><img src="img/bicons/attack1.png" /> </small>| <small>Gausite <b>10</b>'.$eurui.'</small></div>';


}

else{
if($dtop2['vksm'] <500){
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
  
Gavote: <img src="img/bicons/exp.png" /> <font color="green"><b>+</b></font><b>'.skaicius($mob['exp']).'</b> <img src="img/bicons/lyg.png" />
Turite: <img src="img/bicons/exp.png" />
<b>'.skaicius($apie['exp']).' </b><br>
<small>Iki kito lygio reikia<img src="img/bicons/exp.png" /></small> <b>'.skaicius($apie['expl']*4.95-$apie['exp']).' </b>
   

</div>';

echo'
<div class="meniuc">
išmušėte: <img src="img/bicons/pinigai.png" /> <font color="green"><b>+</b></font><b>'.skaicius($mob['pin']).'</b><img src="img/bicons/lyg.png" /> Turite: <img src="img/bicons/pinigai.png" /><b> '.skaicius($apie['litai']).' </b>
</div>';
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
if($apie['vegitoultrab']-time() > 0){
$kiek_duos = $kiek_duos*5;
}
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

    

mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$mob[exp]', litai=litai+'$mob[pin]', lygis='$lvlas',expl='$left', expl2='$left*3.53' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET surinktapin=surinktapin+'$mob[pin]' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE pinigai SET  surinkta=surinkta+'$mob[pin]' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET sveiksmai=sveiksmai+'1' WHERE nick='$nick'");

    if($auto == "+" AND $apie['kovos'] == 'js'){
    
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
						
						window.location = "fight.php?id=kova&ID=<?echo $ID?>&VS=<?echo $VS?>&KD=<?echo $KDS?>";
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
elseif($auto = '+' AND $apie['kovos'] == 'paprastos'){
    echo '<meta http-equiv="refresh" content="'.$kovojimas.'; url=tuffle.php?id=pulti&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">';}
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
	 if(!empty($fusn['kitas_zaidejas']) AND $fusn['double_fussion_dance'] == '+'){
        $mob['exp']= $mob['exp']/10;
        mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$mob[exp]' WHERE nick='$fusn[kitas_zaidejas]'")or die(mysqli_error());
        mysqli_query($conn,"UPDATE susijungimas SET uzdirbo_exp=uzdirbo_exp+'$mob[exp]' WHERE nick='$nick'")or die(mysqli_error());}
   
    
	if(!empty($user['team'])){
	$komanda = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='".$user['team']."'"));
	$plius = $user['win_in_team']+1;
	$pius = $komanda['viso_laimejo_kovu']+1;
$pius2= $komanda['pinigai']+$mob['pin']/50;
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
   
   if($user['chat'] == '1'){
   	top('Pokalbiai');
			require 'chat.php';
   }
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php?id=","Kovos","Kovojimas");
	navigacija($g_n);
   
}

elseif($id == "baby"){

 online('Baby Vegeta');

 if ($apie['baby'] == "+") {

  echo '<div class="up"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white">Klaida!</font></div>';

  echo '<div class="meniuc"><img src="img/vaikeliss.png"></div><div class="error">Baby Vegeta misiją jūs esate įvykdęs!</div>';   

 }elseif($inv['jball'] > 6){

  
  echo '<div class="up">Tu įvykdei Baby Vegeta misiją !</div>';
  echo '<div class="meniuc"><img src="img/vaikeliss.png"></div><div class="meniu"><b>Baby Vegeta</b> tau dovanoja: <b>5000 eurų ir 10000000000 pinigų!</b></div>';
  mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'1000', litai=litai+'10000000000', baby='+' WHERE nick='$nick'");
  mysqli_query($conn,"UPDATE inv SET jball=jball-'7' WHERE nick='$nick'")or die(mysqli_error());
  
 }else{

  echo '<div class="up"><img src="http://tools.uiwap.com/icon/art/icon.snow.png"style="float:left" ><font color="white"><b>Klaida!</b></font></div>';
  echo '<div class="meniuc"><img src="img/vaikeliss.png"></div><div class="error">Jūs neturite <b>7</b> Juod&#363;j&#371; drakono rutuli&#371;!</div>'; 

 }

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","tuffle.php","Tuffle planeta","Baby Vegeta Planas");
	navigacija($g_n);

}}}


foot();

?>