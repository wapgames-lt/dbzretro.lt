<?php

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();;

topbar();
if($id == ""){
	 online('Vėžlio namai');
   top('Vėžlio namai');
    echo '<div class="meniuc"><img src=img/imgg/sala.png><alt="**"></div>
   <div class="meniuc"> 
   Sveiki, esu Džinas vėžlys, ką veiksite pas mane ? 
    </div>
    <div class="up">Vietovės</div>
    <div class="meniu"><img src=img/imgg/sala.png border="1" width="16" height="16"> <a href="?id=tren">Treniruotės</a><br/></div>
    <div class="meniu"><img src=img/imgg/sala.png border="1" width="16" height="16"> <a href="?id=dzino"><b>Puaro Misija</b></a><br></div>
    <div class="meniu"><img src=img/imgg/sala.png border="1" width="16" height="16"> <a href="?id=giras"><b>Giro misija</b></a></div> 
 
     
    ';
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Vežlio sala");
	navigacija($g_n);
	
	

	   }
	 elseif($id == "tren"){
	top('Treniruotės');
	 echo '<div class="meniuc"><img src="img/imgg/sala.png" border="0" alt="*"></div><div class="line"></div>';
   

echo '<div class="title" style="text-align: center;">
Aš esu <b>Master Roshi</b>, galiu padėti jums sutvirtėti, bet mano treniruočių pamokos kainuoja.
   </div><div class="line"></div>';










echo '<div class="title" style="text-align: center;">
1 jėgos = 300 <img src="img/bicons/pinigai.png"> Jums išeiną pasitreniruoti jėgos <b>'.sk($litai/300).'</b>kartų.
   </div><div class="line"></div>';



   echo '<div class="titlec" style="text-align: center;">


 <form action="?id=tren2" method="post"/>
 Kiek kartų treniruositi jėgą?
    <br /><input type="text" name="jegos"/><br />
   <input type="submit" name="submit" value="Treniruotis"/>
   </div></form>';



echo '<div class="title" style="text-align: center;">
1 gynybos = 1 000 <img src="img/bicons/pinigai.png"> Jums išeiną pasitreniruoti gynybos <b>'.sk($litai/1000).'</b> kartų.
   </div><div class="line"></div>';
   echo '<div class="titlec" style="text-align: center;">
<form action="?id=tren3" method="post"/>
Kiek kartų treniruositi gynybą?<br /><input type="text" name="gynybos"/><br />
<input type="submit" name="submit" value="Treniruotis"/>
   </div></form>';









   
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Treniruotės");
	navigacija($g_n);}
elseif($id == "tren2"){
   online('Dž. Vėžlio treniruotės');
 top('Treniruotės');

  
   if(isset($_POST['submit'])){
       $kjega = isset($_POST['jegos']) ? preg_replace("/[^0-9]/","",$_POST['jegos'])  : null;

	    
		
   
	   $kjeg = $kjega * 300;
    
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
            if($kjega == "" or $kgynyba == ""){} else {
                 echo ' ir';
            }

			   if($klygio == ""){} else {
                 echo ' <b>'.sk($klygio).'</b> Jėgos';
            }
            echo '. Tau kainavo <b>'.sk($kkiek).'</b> Pinigu.</div>';
      }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Treniruotės");
	navigacija($g_n);
	   }}

elseif($id == "tren3"){
   online('Dž. Vėžlio treniruotės');
 top('Treniruotės');

  
   if(isset($_POST['submit'])){

       $kgynyba = isset($_POST['gynybos']) ? preg_replace("/[^0-9]/","",$_POST['gynybos'])  : null;
	    
		
   
       $kgyn = $kgynyba * 1000;
       $kkiek = $kgyn  ;

        if($litai < $kkiek){
            $klaida = "Neturi pakankamai <img src='img/bicons/pinigai.png'>";
        }

        if(empty($kjega) && empty($kgynyba)){
            $klaida = "Paliktas tuščias laukelis.";
        }

       if($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
      } else {
            mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'$kgynyba', litai=litai-'$kkiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta! Pasitreniravai';
            if($kjega == ""){} else {
                 echo ' <b>'.sk($kjega).'</b> Jėgos';
            }
            if($kjega == "" or $kgynyba == ""){} else {
                 echo ' ir';
            }
            if($kgynyba == ""){} else {
                 echo ' <b>'.sk($kgynyba).'</b> Gynybos';
            }
			   if($klygio == ""){} else {
                 echo ' <b>'.sk($klygio).'</b> Jėgos';
            }
            echo '. Tau kainavo <b>'.sk($kkiek).'</b> Pinigu.</div>';
      }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Treniruotės");
	navigacija($g_n);
	   }}  

elseif($id == "dzino"){
   online('Vygdo Dž. Vėžlio užduotį');
   top('Džino vėžlio misija');
   echo '<div class="meniuc"><img src="img/kate.png"></div>
<div class="meniuc">
  Atnešk man<b> 2000</b> stone ir aš tau duosiu puarą, su juo kovose gausi 2x daugiau '.$expi.' bei '.$pinigaii.'
   </div><div class="titlec">
   <a href="?id=dzino2">Vygdyti</a>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Puaro Misija");
	navigacija($g_n);
}
elseif($id == "dzino2"){
   online('Vygdo Dž. Vėžlio užduotį');
	top('Džino vėžlio misija');
 
 
   if($inv['Stone'] < 1999){
echo '<div class="meniuc"><img src="img/kate.png"></div>';
      echo '<div class="meniuc">Tu neturi<b> 2000</b> Stone!</div>';}
 elseif($apie['kate'] == '+' ){
echo '<div class="meniuc"><img src="img/kate.png"></div>';
      echo '<div class="meniuc">Tu jau turi <b>Puarą</b>!</div>';}
   else{
echo '<div class="meniuc"><img src="img/kate.png"></div>';
      echo '<div class="meniuc">Misija ivygdei gauni Puara!</div>';
       mysqli_query($conn,"UPDATE inv SET Stone=Stone-'2000' WHERE nick='$nick' ");
      mysqli_query($conn,"UPDATE zaidejai SET kate='+' WHERE nick='$nick' ");}
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Puaro Misija");
	navigacija($g_n);

}
elseif($id == "giras"){
   online('Vygdo Dž. Vėžlio užduotį');
   top('Giro misija');
   echo '<div class="meniuc"><img src="img/giras.png"></div>
<div class="meniuc">
  Atnešk man <b>100</b> Drakono rutulių  ir aš tau duosiu Girą, su juo kovose gausi <b>3x</b> daugiau '.$expi.' bei '.$pinigaii.'
   </div><div class="titlec">
   <a href="?id=giras2">Vygdyti</a>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Giro Misija");
	navigacija($g_n);
}
elseif($id == "giras2"){
   online('Vygdo Dž. Vėžlio užduotį');
	top('Giro misija');
 
 
   if($inv['dball'] < 99){
echo '<div class="meniuc"><img src="img/giras.png"></div>';
      echo '<div class="meniuc">Tu neturi <b>100</b> Drakono rutulių!</div>';}
 elseif($apie['giras'] == '+' ){
echo '<div class="meniuc"><img src="img/giras.png"></div>';
      echo '<div class="meniuc">Tu jau turi <b>Girą</b>!</div>';}


   else{
echo '<div class="meniuc"><img src="img/giras.png"></div>';
      echo '<div class="meniuc">Misija ivygdei gauni Girą!</div>';
       mysqli_query($conn,"UPDATE inv SET dball=dball-'100' WHERE nick='$nick' ");
      mysqli_query($conn,"UPDATE zaidejai SET giras='+' WHERE nick='$nick' ");}
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Giro misija");
	navigacija($g_n);

}


elseif($id == "kova444"){
top('Kovos');
online("Dzino Vezlio misijoje");
if($apie['dzinas'] > time() ){
echo "<div class='meniuc'>Kovoto dar negali, galėsi  už ".laikas(($apie[dzinas])-time(),1)."</div>";
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Kova");
	navigacija($g_n);
}else{
echo'<div class="meniuc"><img src="img/dzinas.png"></br>
Jums reikia nukauti Dzino Vezlio draugus ir ji pati.
 Ivykde sia misija, jus gausite 0.10% kovines galios!
Taip pat yra 2% sansas rasti drakono rutuli!</div>';
 echo'
 <div class="title">';
 if($zaidejai['vezlys'] == 0){
 echo ''.$ico.'<a href="?id=kautis&vs=0">Krilinas</a> (500kg)<br/>';
 }
 else{
 echo ''.$ico.'Krilinas (500kg)<br/>';
 }
 if($zaidejai['vezlys'] == 1){
 echo ''.$ico.'<a href="?id=kautis&vs=1">Lance</a> (1 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Lance (1 000kg)<br/>';
 }
 if($zaidejai['vezlys'] == 2){
 echo ''.$ico.'<a href="?id=kautis&vs=2">Jamcis</a> (2 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Jamcis (2 000kg)<br/>';
 }
 if($zaidejai['vezlys'] == 3){
 echo ''.$ico.'<a href="?id=kautis&vs=3">Tensinhanas</a> (3 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Tensinhanas (3 000kg)<br/>';
 }
 if($zaidejai['vezlys'] == 4){
 echo ''.$ico.'<a href="?id=kautis&vs=4">Dzinas Vezlys</a> (5 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Dzinas Vezlys (5 000kg)<br/>';}
 
 
 echo '</div>';
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Kova");
	navigacija($g_n);
 }}
if($id == 'kau44tis'){

online("Dzino Vezlio misijoje");
	top('Kovos');
$vs=(int)abs($_GET['vs']);
		if($vs == 0){
		$pl_saga = 500;
		$pinigu = 500;
		$xp2 = 10;
	    }
	    elseif($vs == 1){
		$pl_saga = 1000;
		$pinigu = 1000;
		$xp2 = 25;
	    }
	    elseif($vs == 2){
		$pl_saga = 2000;
		$pinigu = 2000;
		$xp2 = 50;
	    }
	    elseif($vs == 3){
		$pl_saga = 3000;
		$pinigu = 3000;
		$xp2 = 90;
	    }
	    elseif($vs == 4){
		$pl_saga = 5000;
		$pinigu = 5000;
		$xp2 = 150;
	    }
           
		if($zaidejai['dzinas'] > time() ){echo "<div class='meniuc'>Kovoto dar negali, galėsi  už ".laikas(($apie[dzinas])-time(),1)."</div>
			";
		  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Klaida");
	navigacija($g_n);}
	elseif($pl_saga > $kg or $gyvybes < 1){
	echo"<div class='main_l'>Pralaimėjai ir praradai visas gyvybes, prieso KG <b>$pl_saga</b>, mano KG <b>$kg</b></div>";
	atgal('Atgal-kame.php?i= &I Pradžia-game.php?i=');
	mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick'");
	    }else{
		if($zaidejai['vezlys'] != $vs){
		echo "<div class='meniuc'>Jau nukovėte</div>";
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "Klaida");
	navigacija($g_n);
		}else{
	

 
	echo"<div class='meniuc'>
	<b>Laimejai</b></div><div class='title'>
	".$ico." Gavai <b>$xp2</b>EXP.<br/>
    ".$ico." Gavai <b>$pinigu</b> Pinigų</div>";

		if($vs == 4){
		$je = $apie['jega'] * 1.01;
		$gy = $apie['gynyba'] * 1.03;
		echo"<div class='titlec'><b>Ivykdete Master Dzino Vezlio misija, uz tai gaunate: <b>0.2</b> %, o Gynyba <b>0.8</b> % <b></div>";
		mysqli_query($conn,"UPDATE zaidejai SET jega='$je', gynyba='$gy' WHERE nick='$nick'");
		$random=rand(1,100);
		if($random == 1 OR $random == 2){
		echo "<div class='meniuc'>Radai Drakono rutulį!</div>";
		
		mysqli_query($conn,"UPDATE inv SET Dball=Dball+'1' WHERE nick='$nick'");
		}
		$time = time()+3600;
		mysqli_query($conn,"UPDATE zaidejai SET jega=jega+2000, gynyba=gynyba+4000, dzinas='$time', vezlys='0'  WHERE nick='$nick'");
	    }
		else{
		mysqli_query($conn,"UPDATE zaidejai SET litai=litai+$pinigu, exp=exp+$xp2, pveiksmai=pveiksmai+1, vezlys=vezlys+1 WHERE nick='$nick'");

 }
 }}
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kame.php", "Vežlio sala", "kame.php?id=kova", "Kovos", "Laimėta kova");
	navigacija($g_n);

}


  foot();
?>
