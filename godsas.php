<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if(($apie['lygis']) < '129'){
	top('Dievu planeta');
	echo"

	<div class='meniuc'><img src='img/veikejai/Lord bils-0.png'><br/></div>
	<div class='meniuc'>Į dievų planetą galima nuo 130 lygio !</div>";
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dievų planeta");
	navigacija($g_n);
}else{

if($id == ""){

online('Gods');
top('Dievu planeta');
echo"

	<div class='meniuc'><img src='img/veikejai/Lord bils-0.png'><br/>
	Sveikas atvykes i dievų planetą, čia rasi misijų, galėsi iškviesti dievą drakoną, bei igauti naujų jėgų.</div>
	<div class='up'>Vietovės</div>
	<div class='meniu'>
	
   ".$ico." <a href='gods.php?id=fight'>Gods misija</a><br>
    ".$ico." <a href='gods.php?id=dragons'>Dievas drakonas</a><br>
   	</div>
	";
atgal('Į Pradžią-pagrindinis.php?id=');}

elseif($id == "fight"){
top('Dievų misija');
online('Dievų misija');
if($apie['gods_misija'] > time() ){
echo'<div class="meniuc">Vygdyti galimas kas 24 h, vygdyti galesi už '.laikas($apie['gods_misija']-time(),1).'</div>';

}else{
echo'<div class="meniuc"><img src="img/veikejai/Goku gods-0.png"></br>
Jums reikia nukauti visus Gods karius
 Ivykde sia misija, jus gausite 0.10% kovines galios!
Taip pat yra 10% sansas rasti Namek, žemės bei juoduosius rutulius!</div>';
 echo'
<div class="up">Dievai</div>';
 echo'
 <div class="meniu">';
 if($apie['godss'] == 0){
 echo ''.$ico.'<a href="?id=kautis&vs=0">Gotenas</a> (10 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Gotenas (10 000 000 000 000 000kg)<br/>';
 }
 if($apie['godss'] == 1){
 echo ''.$ico.'<a href="?id=kautis&vs=1">Tranksas</a> (100 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Tranksas (100 000 000 000 000 000kg)<br/>';
 }
 if($apie['godss'] == 2){
 echo ''.$ico.'<a href="?id=kautis&vs=2">Vedžitas</a> (1 000 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Vedžitas (1 000 000 000 000 000 000kg)<br/>';
 }
 if($apie['godss'] == 3){
 echo ''.$ico.'<a href="?id=kautis&vs=3">Gokas</a> (10 000 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Gokas (10 000 000 000 000 000 000kg)<br/>';
 }
if($apie['godss'] == 4){
 echo ''.$ico.'<a href="?id=kautis&vs=4">Gohanas</a> (100 000 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Gohanas (100 000 000 000 000 000 000kg)<br/>';}

 if($apie['godss'] == 5){
 echo ''.$ico.'<a href="?id=kautis&vs=5">Valdovas bils</a> (1 000 000 000 000 000 000 000kg)<br/>';
 }
 else{
 echo ''.$ico.'Valdovas bils (1 000 000 000 000 000 000 000kg)<br/>';}



 
 echo '</div>';

 
 }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gods.php", "Dievų planeta", "Dievų misija");
	navigacija($g_n);
 
 }

if($id == 'kautis'){

top('Dievų misija');
online('Dievų misija');
$vs=(int)abs($_GET['vs']);
		if($vs == 0){
		$pl_saga = 10000000000000000;
		$pinigu = 5000000;
		$xp2 = 100000;
		$k = 'Kid goten-0';
	    }
	    elseif($vs == 1){
		$pl_saga = 100000000000000000;
		$pinigu = 10000000;
		$xp2 = 250000;
		$k = 'Kid trunks-0';
	    }
	    elseif($vs == 2){
		$pl_saga = 1000000000000000000;
		$pinigu = 20000000;
		$xp2 = 500000;
		$k = 'Vedzitas-0';
	    }
	    elseif($vs == 3){
		$pl_saga = 10000000000000000000;
		$pinigu = 3000000;
		$xp2 = 900000;
	$k = 'Gokas-0';
	    }
 elseif($vs == 4){
		$pl_saga = 100000000000000000000;
		$pinigu = 3000000;
		$xp2 = 900000;
	$k = 'Gohanas-0';
	    }
	    elseif($vs == 5){
		$pl_saga = 1000000000000000000000;
		$pinigu = 50000000;
		$xp2 = 1500000;
		$k = 'Bils-0';
	    }
           
		if($apie['gods_misija'] > time() ){echo "<div class='meniuc'>Kovoto dar negali, galėsi  už ".laikas(($apie[gods_misija])-time(),1)."</div>
			";
	}
	elseif($pl_saga > $kg or $gyvybes < 1){
	echo"<div class='meniuc'>Pralaimėjai ir praradai visas gyvybes, prieso KG <b>$pl_saga</b>, mano KG <b>$kg</b></div>";
	
	mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick'");
	    }else{
		if($apie['godss'] != $vs){
		echo "<div class='meniuc'>Jau nukovėte</div>";
	
		}else{
	

 
	echo"<div class='meniuc'><img src='img/veikejai/$k.png'></a></br>
	<b>Laimejai</b></div><div class='title'>
	".$ico." Gavai <b>$xp2</b>EXP.<br/>
    ".$ico." Gavai <b>$pinigu</b> Pinigų</div>";
 
		if($vs == 5){
		$je = $apie['jega'] * 1.01;
		$gy = $apie['gynyba'] * 1.03;
		echo"<div class='titlec'><b>Ivykdete Dievų misiją, uz tai gaunate: <b>10</b> %  kovinės galios<b></div>";
	mysqli_query($conn,"UPDATE zaidejai SET jega='$je', gynyba='$gy' WHERE nick='$nick'");
		$random=rand(1,10);
		if($random == 2){
		echo "<div class='meniuc'>Radai 3 drakonų rutulius!</div>";

	mysqli_query($conn,"UPDATE inv SET Nball=Nball+'1', Jball=Jball+'1', Dball=Dball+'1' WHERE nick='$nick'");
		}
		$time = time()+3600*24;
	mysqli_query($conn,"UPDATE zaidejai SET jega=jega+2000, gynyba=gynyba+4000, gods_misija='$time', godss='0'  WHERE nick='$nick'");
	    }
	else{
	mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$pinigu', exp=exp+'$xp2' WHERE nick='$nick'")or die(mysqli_error());
	mysqli_query($conn,"UPDATE zaidejai SET godss=godss+'1' WHERE nick='$nick'")or die(mysqli_error());
 }}} $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gods.php", "Dievų planeta", "?id=fight", "Kovos", "Laimėta kova");
	navigacija($g_n);}
	}
if($id == "dragons"){
   online('Kviečią Dievą drakoną');
	top('Dievas drakonas');
   if((($inv['Nball'] < 7) or $inv[Jball]< 7) or $inv[Dball] < 7){
 	
	  echo '<div class="meniuc">Neturi rutuliu reike visų po 7</div>';
	
 }else{
     
      if($co == 1){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 1500 kreditų.</div>';
         mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'1500' WHERE nick='$nick' ");
        mysqli_query($conn,"UPDATE inv SET Nball=Nball-'7', Jball=Jball-'7', Dball=Dball-'7' WHERE nick='$nick'")or die(mysqli_error());}
      elseif($co == 2){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai '.sk(5000000000).' pinigu.</div>';
         mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'5000000000' WHERE nick='$nick' ");
         mysqli_query($conn,"UPDATE inv SET Nball=Nball-'7', Jball=Jball-'7', Dball=Dball-'7' WHERE nick='$nick'")or die(mysqli_error());
      }
      elseif($co == 3){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 100% savo Jėgos.</div>';
         $jeggoo = $apie['jega'] *2;
         mysqli_query($conn,"UPDATE zaidejai SET jega='$jeggoo' WHERE nick='$nick' ");
       mysqli_query($conn,"UPDATE inv SET Nball=Nball-'7', Jball=Jball-'7', Dball=Dball-'7' WHERE nick='$nick'")or die(mysqli_error());
      }
      elseif($co == 4){
         echo '<div class="meniuc">Jūsų noras išpildytas! Gavai 100% savo Gynybos.</div>';
         $gynnoo = $apie['gynyba'] *2;
         mysqli_query($conn,"UPDATE zaidejai SET gynyba='$gynnoo' WHERE nick='$nick' ");
        mysqli_query($conn,"UPDATE inv SET Nball=Nball-'7', Jball=Jball-'7', Dball=Dball-'7' WHERE nick='$nick'")or die(mysqli_error());
      } else {
      	 echo '<div class="meniuc"><img src="img/samung.png" alt="*"></br>';
         echo 'Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div><div class="up">Norai</div>';
         echo '<div class="title">
         <b>1.</b> <a href="?id=dragons&co=1">1500 Kreditų</a><br/>
         <b>2.</b> <a href="?id=dragons&co=2">'.sk(5000000000).' pinigu</a><br/>
         <b>3.</b> <a href="?id=dragons&co=3">100% Jėgos</a><br/>
         <b>4.</b> <a href="?id=dragons&co=4">100% Gynybos</a><br/>
         </div>';
      }
         }   
   
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","gods.php", "Dievų planeta", "Dievas drakonas");
	navigacija($g_n);
 
}
 foot();
?>
