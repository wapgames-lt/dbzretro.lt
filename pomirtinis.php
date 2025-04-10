<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();


		 topbar();

if($apie[gyvybes] > 0){
		top('Pomirtinis Pasaulis');
echo '<div class="meniuc"><img src=img/imgg/pomirtinis.png border="1" width="180" height="90"><alt="**"></div><div class="meniuc"> Į Pomirtinį pasaulį galima patekti tik <b>MIRUS </b>!</div>
<div class="meniuc">Nori patekti?  <a href="pagrindinis.php?id=killself">Noriu sumažint savo <b>gyvybes</b> iki <b>0</b>!</a></div>

';


  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pomirtinis pasaulis");
	navigacija($g_n);
}


else{


if($id == ""){
    online('Pomirtinis pasaulis');
  top('Pomirtinis pasaulis');
       
         echo '<div class="meniuc"><img src=img/imgg/pomirtinis.png><alt="**"></br>
        Sveikas '.statusas($nick).' aš esu pomirtinio pasaulio prižiūrėtojas, perėjes gyvatės kelią galėsi treniruotis pas vakarų kajų, ten treniruotės pigesnės.</div>
        <div class="up">Vietovės</div>
    <div class="meniu">    <img src=img/imgg/pomirtinis.png border="1" width="16" height="16"> <a href="snake.php?id=">Gyvatės kelias</a><br/>
        <img src=img/imgg/pomirtinis.png border="1" width="16" height="16"> <a href="kai.php?id=">Šiaurės Kajus</a><br/>
       
      <img src=img/imgg/pomirtinis.png border="1" width="16" height="16"> <a href="pomirtinis.php?id=drakonai">Drakonų misija</a><br/>
       
       </div>
      
        
       
        ';
    
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pomirtinis pasaulis");
	navigacija($g_n);

}

elseif($id == "drakonai"){
top('7 drakonų misija');
online("7drakonai");
if($apie['drakonai'] > time() ){
echo'<div class="meniuc">Vygdyti galimas kas 12 h, vygdyti galesi už '.laikas($apie['drakonai']-time(),1).'</div>';

}else{
echo'<div class="meniuc"><img src="img/131.png"></br>
Nukaukite 7 bloguosius drakonus ir gausite juodajį drakono rutulį
.</div><div class="up">Drakonai</div>';
 echo'
 <div class="meniu">';
 if($zaidejai['perejo'] == 0){
 echo ''.$ico.'<a href="?id=kautis&vs=0">1 drakonas</a> (200 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'1 drakonas(200 000 000 000kg)<br/>';
 }
 if($zaidejai['perejo'] == 1){
 echo ''.$ico.'<a href="?id=kautis&vs=1">2 drakonas</a> (500 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'2 drakonas (500 000 000 000kg)<br/>';
 }
 if($zaidejai['perejo'] == 2){
 echo ''.$ico.'<a href="?id=kautis&vs=2">3 drakonas</a> (700 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'3 drakonas (700 000 000 000kg)<br/>';
 }
 if($zaidejai['perejo'] == 3){
 echo ''.$ico.'<a href="?id=kautis&vs=3">4 drakonas</a> (1 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'4 drakonas (1 000 000 000 000kg)<br/>';
 }
 if($zaidejai['perejo'] == 4){
 echo ''.$ico.'<a href="?id=kautis&vs=4">5 drakonas</a> (1 500 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'5 drakonas (1 500 000 000 000kg)<br/>';}

 if($zaidejai['perejo'] == 5){
 echo ''.$ico.'<a href="?id=kautis&vs=5">6 drakonas</a> (2 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'6 drakonas (2 000 000 000 000kg)<br/>';}
  if($zaidejai['perejo'] == 6){
 echo ''.$ico.'<a href="?id=kautis&vs=6">Omega shenron</a> (5 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Omega shenron (5 000 000 000 000kg)<br/>';}
 
 
 echo '</div>';

 }
 
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pomirtinis.php", "Pomirtinis pasaulis", "7 drakonų misija");
	navigacija($g_n);
 
 }

if($id == 'kautis'){

online("7 drakonai");
top('7 drakonų misija');
$vs=(int)abs($_GET['vs']);
  if($vs == 0){
  $pl_saga = 200000000000;
  $pinigu = 200;
  $xp2 = 100;
     }
     elseif($vs == 1){
  $pl_saga = 500000000000;
  $pinigu = 500;
  $xp2 = 250;
     }
     elseif($vs == 2){
  $pl_saga = 700000000000;
  $pinigu = 400;
  $xp2 = 400;
     }
     elseif($vs == 3){
  $pl_saga = 1000000000000;
  $pinigu = 800;
  $xp2 = 700;
     }
     elseif($vs == 4){
  $pl_saga = 1500000000000;
  $pinigu = 1200;
  $xp2 = 1000;
     }
	  elseif($vs == 5){
  $pl_saga = 2000000000000;
  $pinigu = 1200;
  $xp2 = 1000;
     }
	    elseif($vs == 6){
  $pl_saga = 5000000000000;
  $pinigu = 1200;
  $xp2 = 1000;
     } 
 
 if($zaidejai['pad_time']-time() > 0){
  echo"<div class='meniuc'>Palauk keles sekundes</div>";
 }
 elseif($zaidejai['drakonai'] > time() ){}
  if($gyvybes == 100 or $pl_saga > $kg){
 echo"<div class='meniuc'>Tu per silpnas!</div>";

 mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick'");
     }
  elseif($zaidejai['perejo'] != $vs){
  echo "<div class='meniuc'>Drakoną jau nukovėte</div>";

  }
  else{

 echo"<div class='meniuc'>
 <b>Laimėjai!!</b></div>
 <div class='titlec'>
 ".$ico." Sėkmingai nukovei priešą!<br/></div>";

  if($vs == 6){
 
  echo"<div class='titlec'><b>Sveikinu nukovei visus drakonus gauni juodajį rutulį<b></div>";
  
 

  
  $time = time()+60 * 60 * 24;
  mysqli_query($conn,"UPDATE zaidejai SET jega=jega+0, gynyba=gynyba+0, drakonai='$time', perejo='0'  WHERE nick='$nick'");
     mysqli_query($conn,"UPDATE inv SET jball=jball+'1' WHERE nick='$nick'")or die(mysqli_error());
     }
  else{
  mysqli_query($conn,"UPDATE zaidejai SET litai=litai+$pinigu, exp=exp+$xp2, pveiksmai=pveiksmai+0, perejo=perejo+1 WHERE nick='$nick'");

 }}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pomirtinis.php", "Pomirtinis pasaulis", "pomirtinis.php?id=drakonai","Drakonu misija", "Kova");
	navigacija($g_n);


}
}

 foot();
?>
