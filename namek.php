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
if($apie[lygis] < 49){
		top('Namek planeta');
echo '<div class="meniuc"><img src=img/namek.png border="1" width="180" height="90"><alt="**"></br></br>Į namek planeta galima tik nuo 50 <img src="img/bicons/lvl.gif" /> !</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Namek planeta");
	navigacija($g_n);
}else{
	
	if($apie['k_laivas'] <'1' OR $apie['persikelimo_manevras'] < ''){
		top('Namek planeta');
echo '<div class="meniuc"><img src=img/k_laivas.png></br></br>Tu neturi kosminio laivo, jį gali pasigaminti <b>Kapsulių korporacijoje</div>


';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Namek planeta");
	navigacija($g_n);
}

else{
	
	
	
	

if($id == ""){
	 online('Namek');
   top('Namek planeta');
   echo '<div class="meniuc"><img src=img/namek.png border="1" width="180" height="90"><alt="**"></br>
  
   Sveiki, atvykę i nameku planetą
    </div>
    <div class="up">Vietovės</div>
    <div class="meniu">
   '.$ico.' <a href="?id=guru">Namek senolis</a><br/>
      '.$ico.' <a href="?id=ieskoti">Ieskoti namek drakono rutuliu</a><br/> 
     '.$ico.' <a href="namekm.php?id="><b>Misijos</b></a><br/> 
    '.$ico.' <a href="?id=porung">Kviesti Porungą</a><br/> 
     
       
    </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Namek planeta");
	navigacija($g_n);
	
	
		
}


elseif($id == "ieskoti"){
	top('Namek drakono rutulių ieškojimas');
	
	
	echo '<div class="meniuc"><img src=img/dendis.png><alt="**"></div>
<div class="meniuc">
  
   Nameko rutulių radimas  15 %
    </div>
    
    <div class="titlec">
    <a href="?id=ieskoti2">Ieškoti</a><br/>
  
     
    </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","namek.php", "Namek planeta", "Drakono rutulių ieškojimas");
	navigacija($g_n);
	
	
}
elseif($id == "ieskoti2"){
top('Namek drakono rutulių ieškojimas');
if ($inv['radaras'] < 1){
	echo'
	<div class="meniuc">Tu neturi radaro</div>
'; 
}

elseif ($apie['nbal'] > time()){
	echo'
	<div class="meniuc">Ieskoti galima kas 6 valandas !!!</br> Ieškoti galėsi po '.laikas($apie[nbal]-time(),1).'</div>
'; }
else{
	if ($inv['radaras'] > 0){
$randas = rand(1,7);
if ($randas == 2){
	echo'
	<div class="meniuc">Radai namek drakono rutulį!</div>
'; 
   mysql_query("UPDATE inv SET Nball=Nball+'1' WHERE nick='$nick'")or die(mysql_error());
$ko = time() + 21600;
mysql_query("UPDATE zaidejai SET nbal = '$ko' WHERE nick = '$nick' ");

}

else{
echo'
	<div class="meniuc">Neradai rutulio....</div>
	'; 
	$ko = time() + 21600;
mysql_query("UPDATE zaidejai SET nbal = '$ko' WHERE nick = '$nick' ");}

}}
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","namek.php", "Namek planeta", "Drakono rutulių ieškojimas");
	navigacija($g_n);

}
elseif($id == "porung"){
   online('Kviečią Žemės Dievą drakoną');
	top('Porungas');
   if($inv['Nball'] < 7){
 	
	  echo '<div class="meniuc">Neturi 7 nameko rutulių!</div>';
	
 }else{
     
      if($co == 1){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 150 kreditų.</div>';
         mysql_query("UPDATE zaidejai SET kred=kred+'150' WHERE nick='$nick' ");
        mysql_query("UPDATE inv SET Nball=Nball-'7' WHERE nick='$nick'")or die(mysql_error());}
      elseif($co == 2){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai '.sk(50000000).' pinigu.</div>';
         mysql_query("UPDATE zaidejai SET litai=litai+'50000000' WHERE nick='$nick' ");
         mysql_query("UPDATE inv SET Nball=Nball-'7' WHERE nick='$nick'")or die(mysql_error());
      }
      elseif($co == 3){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 30% savo Jėgos.</div>';
         $jeggoo = round($jega*30/100);
         mysql_query("UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");
          mysql_query("UPDATE inv SET Nball=Nball-'7' WHERE nick='$nick'")or die(mysql_error());
      }
      
      elseif($co == 4){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 30% savo Gynybos.</div>';
         $gynnoo = round($gynyba*30/100);
         mysql_query("UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
           mysql_query("UPDATE inv SET Nball=Nball-'7' WHERE nick='$nick'")or die(mysql_error());
      } 
       elseif($co == 5){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 15% savo Gynybos ir Jėgos</div>';
         $gynnoo = round($gynyba*15/100);
         $jeggoo = round($jega*15/100);
         mysql_query("UPDATE zaidejai SET gynyba=gynyba+'$gynnoo' WHERE nick='$nick' ");
		          mysql_query("UPDATE zaidejai SET jega=jega+'$jeggoo' WHERE nick='$nick' ");
           mysql_query("UPDATE inv SET Nball=Nball-'7' WHERE nick='$nick'")or die(mysql_error());
      } 
      
      else {
      	 echo '<div class="meniuc"><img src="img/porung.png" alt="*"></br>';
         echo 'Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div>';
         echo '<div class="title">
         <b>1.</b> <a href="?id=porung&co=1">150 Kreditų</a><br/>
         <b>2.</b> <a href="?id=porung&co=2">'.sk(50000000).' pinigu</a><br/>
         <b>3.</b> <a href="?id=porung&co=3">30% Jėgos</a><br/>
         <b>4.</b> <a href="?id=porung&co=4">30% Gynybos</a><br/>
          <b>5.</b> <a href="?id=porung&co=5">15% Jėgos ir Gynybos</a><br/>
         </div>';
      }
         }   
   
   
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","namek.php", "Namek planeta", "Porungas");
	navigacija($g_n);
}

elseif($id == "guru"){
	top('Namek senolis');
	
	
	echo '<div class="meniuc"><img src=img/guru.png><alt="**"></div>
 <div class="meniuc">
  Namek senolis <b>Guru</b>  gali jums padėti atskleisti jūsų vidinę energiją,  kuri slypi jūsų kūno viduje, bet turi būti 50<img src="img/bicons/lvl.gif" /> !
    </div>
    
    <div class="titlec">
    <a href="?id=guru2">Atskleisti energija</a><br/>
  
     
    </div>';
    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","namek.php", "Namek planeta", "Namek senolis");
	navigacija($g_n);
	
	



}
elseif($id == "guru2"){
top('Namek senolis');
	if($apie['senolisa']-time() < 0){
	       $timxx = time()+60*60*24*100;   
  if($apie['lygis'] < '50'){
echo '<div class="meniuc"><img src=img/guru.png><alt="**"></div>';
 echo '<div class="meniuc">Tik nuo 50 lygio!</div>';
	
  }  

	 
//




 
  
  else{
echo '<div class="meniuc"><img src=img/guru.png><alt="**"></div>';
  	echo '<div class="meniuc">Senolis atskleidė tavo vidinę  energiją!<br>Gaunate '.skaicius(1000000).' '.$kgi.' !</div>';
	  
	  $jeg = $apie['jega'] +1000000;
	  $gin = $apie['gynyba'] +3000000;
	  mysql_query("UPDATE zaidejai SET jega='$jeg', gynyba='$gin' WHERE nick='$nick'");
	mysql_query("UPDATE zaidejai SET guru = '+' WHERE nick='$nick'");
	
	mysql_query("UPDATE zaidejai SET senolisa='$timxx' WHERE nick='$nick' ");
	}	
  }   
    
   elseif($apie['senolisa']-time() > 0){
                echo '<div class="meniuc">Tau jau atskleidė tavo galias!</div>';
            }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","namek.php", "Namek planeta", "Namek senolis");
	navigacija($g_n);
	
	
}}
}


 foot();
?>
