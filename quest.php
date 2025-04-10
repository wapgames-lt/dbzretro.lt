<?php

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
		topbar();
		
		$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM quest WHERE nick='$nick'"));
		if($id == ''){
			top('Dienos misija');
			if($row['valiuta'] == 1){$pre = 'Microshem';}		
			if($row['valiuta'] == 2){$pre = 'Fusion fail';}	
			if($row['valiuta'] == 3){$pre = 'Sayain tail';}	
			if($row['valiuta'] == 4){$pre = 'Stone';}	
			if($row['valiuta'] == 5){$pre = 'Soul';}	
			if($row['valiuta'] == 6){$pre = 'Energy stone';}	
			if($row['valiuta'] == 7){$pre = 'Pragaro vaisius';}	
			if($row['valiuta'] == 8){$pre = 'Majin scroll';}	
			if($row['valiuta'] == 9){$pre = 'Gold stone';}	
			if($row['valiuta'] == 10){$pre = 'Magic ball';}
			if($row['valiuta'] == 11){$pre = 'Power stone';}	
			if($row['ko'] == 1){$koo = 'Kreditų';}		
			if($row['ko'] == 2){$koo = 'Eurų';}	
			if($row['ko'] == 3){$koo = 'Pinigų';}	
			echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
			
			echo'<div class="meniuc">Atneškite '.$row[reike].' '.$pre.' ir gausite '.$row[atlygis].' '.$koo.'</div>
			<div class="meniuc">'.$ico.' <a href="?id=next">Turiu viską</a> </div>
			
			';
			
			
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos.php?id=","Misijos","Dienos misija");
navigacija($g_n);	
			
		}
if($id == 'next'){
	top("Dienos misija");
	
	if($row[snd] == '+'){
		echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
			echo'<div class="meniuc">Šiandien jau vygdei !</div>';
		
	}
	else{
	if($row['valiuta'] == 1){$pre = 'Microshem';}		
			if($row['valiuta'] == 2){$pre = 'Fusionfail';}	
			if($row['valiuta'] == 3){$pre = 'Sayiantail';}	
			if($row['valiuta'] == 4){$pre = 'Stone';}	
			if($row['valiuta'] == 5){$pre = 'Soul';}	
			if($row['valiuta'] == 6){$pre = 'Energystone';}	
			if($row['valiuta'] == 7){$pre = 'Pragarovaisius';}	
			if($row['valiuta'] == 8){$pre = 'Majinsroll';}	
			if($row['valiuta'] == 9){$pre = 'Goldstone';}	
			if($row['valiuta'] == 10){$pre = 'Magicball';}
			if($row['valiuta'] == 11){$pre = 'Powerstone';}	
			if($row['ko'] == 1){$koo = 'Kreditų';}		
			if($row['ko'] == 2){$koo = 'Eurų';}	
			if($row['ko'] == 3){$koo = 'Pinigų';}	
			
			if($inv[$pre] < $row[reike]){
				echo"<div class='meniuc'>Nepakanka daigtu !</div>";
			}else{
				echo '<div class="meniuc"><img src="img/imgg/nmisijos.png"></div>';
			echo'<div class="meniuc">Ivygdyta sėkmingai, gavai '.$row[atlygis].' '.$koo.'</div>';
			mysqli_query($conn,"UPDATE quest SET snd ='+' WHERE nick='$nick'");
		if($row[ko] == 1){
			mysqli_query($conn,"UPDATE zaidejai SET kred=kred +'$row[atlygis]' WHERE nick='$nick'");
		}
		if($row[ko] == 2){
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'$row[atlygis]' WHERE nick='$nick'");
		}
		if($row[ko] == 3){
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai +'$row[atlygis]' WHERE nick='$nick'");
		}
		mysqli_query($conn,"UPDATE inv SET $pre=$pre-'$row[reike]' WHERE nick='$nick'")or die(mysqli_error());
			}
			}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","misijos.php?id=","Misijos","Dienos misija");
navigacija($g_n);	
			
		}
 foot();
