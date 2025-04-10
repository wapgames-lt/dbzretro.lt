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
if($apie[lygis] < 99){
		top('Juodoji planeta');
echo '<div class="meniuc"><img src=img/juodoji.jpg border="1" width="180" height="90"><alt="**"></br></br>Į Juodają planeta galima tik nuo 100 <img src="img/bicons/lvl.gif" /> !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Juodoji planeta");
	navigacija($g_n);
}else{
	
	if($apie['persikelimo_manevras'] == ''){
		top('Juodoji planeta');
echo '<div class="meniuc"><img src=img/juodoji.jpg></br></br>Tu neturi persikėlimo manevro, jį gali išmokti <b>Mano skiluose</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Juodoji planeta");
	navigacija($g_n);
}

else{
	
	
	
	

if($id == ""){
	 online('Juodojoje planetoje');
   top('Juodoji planeta');
if($apie[lygis] < 99){
		top('Juodoji planeta');
echo '<div class="meniuc"><img src=img/juodoji.jpg border="1" width="180" height="90"><alt="**"></br></br>Į Juodają planeta galima tik nuo 100 <img src="img/bicons/lvl.gif" /> !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Juodoji planeta");
	navigacija($g_n);
}
	elseif($apie['persikelimo_manevras'] == ''){
		top('Juodoji planeta');
echo '<div class="meniuc"><img src=img/juodoji.jpg></br></br>Tu neturi persikėlimo manevro, jį gali išmokti <b>Mano skiluose</div>


';}

else{

   echo '<div class="meniuc"><img src=img/juodoji.jpg border="1" width="180" height="90"><alt="**"></div>
  <div class="meniuc">
   Sveiki, atvykę i Juodają planetą!
    </div>
    <div class="up">Vietovės</div>
    <div class="meniu">

      '.$ico.' <a href="?id=ieskoti">Ieskoti juodųjų drakono rutulių</a><br/> 
    '.$ico.' <a href="?id=shenron">Kviesti Black Shenron</a><br/> 
     
       
    </div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
}
}
}

	
	}
if($id == "ieskoti"){
	top('Juodųjų drakono rutulių ieškojimas');
	
	
	echo '<div class="meniuc"><img src=img/juodoji.jpg border="1" width="180" height="90"><alt="**"></div>
<div class="meniuc">
  
   Juodųjų rutulių ieškojimas - <b>Tikimybė rasti  20 %</b>
    </div>
    
    <div class="titlec">
    <a href="?id=ieskoti2">Ieškoti</a><br/>
  
     
    </div>';
 
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
	
}
elseif($id == "ieskoti2"){
top('Juodųjų drakono rutulių ieškojimas');
if ($inv['radaras'] < 1){
	echo'
	<div class="meniuc">Tu neturi radaro</div>
'; 
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	}

elseif ($apie['jbal'] > time()){
	echo'
	<div class="meniuc">Ieskoti galima kas 6 valandas !!!</br> Ieškoti galėsi po '.laikas($apie[jbal]-time(),1).'</div>
';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
}
else{
	if ($inv['radaras'] > 0){
$randas = rand(1,5);
if ($randas == 2){
	echo'
	<div class="meniuc">Radai juodąjį drakono rutulį!</div>
'; 
   mysqli_query($conn,"UPDATE inv SET jball=jball+'1' WHERE nick='$nick'")or die(mysqli_error());
$ko = time() + 21600;
mysqli_query($conn,"UPDATE zaidejai SET jbal = '$ko' WHERE nick = '$nick' ");
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
}

else{
echo'
	<div class="meniuc">Neradai rutulio.</div>
	'; 
	$ko = time() + 21600;
mysqli_query($conn,"UPDATE zaidejai SET jbal = '$ko' WHERE nick = '$nick' ");}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
}}


}
  if($id == "shenron"){
   online('Kviečią Dievą drakoną');
	  top('Black smoke shenron');
    if($inv['jball'] < 6){
 	
	  echo '<div class="meniuc">Neturi 7 juodųjų rutulių!</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	
 }else{
   
     
     
      if($co == 1){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 15% savo Jėgos.</div>';
         $jeggoo = round($jega*1/100);
         mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET jball=jball-'7' WHERE nick='$nick'")or die(mysqli_error());
      }
	elseif($co == 2){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 15% savo Gynybos.</div>';
         $gynnoo = round($gynyba*3/100);
         mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET jball=jball-'7' WHERE nick='$nick'")or die(mysqli_error());
	}
		   elseif($co == 3){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 20 Bitcoins!</div>';

         mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
		    mysqli_query($conn,"UPDATE zaidejai SET bitcoin=bitcoin+'20' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET jball=jball-'7' WHERE nick='$nick'")or die(mysqli_error());
           
      }
elseif($co == 4){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 100 '.$eurui.' !</div>';

         mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
		    mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'100' WHERE nick='$nick' ");
           mysqli_query($conn,"UPDATE inv SET jball=jball-'7' WHERE nick='$nick'")or die(mysqli_error());
           
      } 

 else {
      	 echo '<div class="meniuc"><img src="img/124.png" alt="*"></br>';
         echo 'Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div>';
         echo '<div class="title">
        
         <b>1.</b> <a href="?id=shenron&co=1">1% Jėgos</a><br/>
         <b>2.</b> <a href="?id=shenron&co=2">3% Gynybos</a><br/>
          <b>3.</b> <a href="?id=shenron&co=3">20 BitCoins</a><br/>
 <b>3.</b> <a href="?id=shenron&co=3">100 '.$eurui.'</a><br/>
         </div>';
      
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","juodap.php","Juodoji Planeta","Planeta");
	navigacija($g_n);
	
	 

   }}


}

foot();
?>
