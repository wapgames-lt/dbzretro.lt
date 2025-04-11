<?php
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();

		if($apie['lygis'] < 39){
			top('Kovų mašina');
echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
			echo"<div class='meniuc'>I kovų mašina galima tik nuo 40 lygio!</div>";
			
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php","Kovų laukas","Kovų mašina");
	navigacija($g_n);
}else{
if($id == ""){
top('Kovų mašina');
echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
echo '<div class="meniuc"><b>Galingiausią smūgį</b> įkirtęs žaidėjas laimi prizą.</br>Smūgis yra atsitiktinis, nereikia turėti jokių statusų, reikia tik sekmės!<br><b>Prizą</b>  gaus tas kuris įkirto didžiausią smūgį po 24 valandos!<br>Įkirtęs didžiausią galimą smūgį žaidėjas gaus <b>100</b>'.$eurui.'</div>
<div class="meniuc"> <a href="?id=smogti"><input type="submit" Value="Trenkti"></a></div>';
echo'<div class="up">Šiandien daugiausiai itrenkę:</div>';
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM machine")) == false){
	
	echo'<div class="meniu">Šiandien dar niekas netrenkė!</div>';
}else{
	echo'<div class="meniu">';
$query = mysqli_query($conn,"SELECT * FROM machine ORDER BY smugis DESC LIMIT 0,10");
while($row = mysqli_fetch_assoc($query)){
	$nr ++;
	
	echo'<b>'.$nr.'. </b><a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.statusas($row[nick]).'</a> įtrenkė <b>'.$row[smugis].'</b> žalos</a></br>';	
	
	
	
}
echo'</div>';
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php","Kovų laukas","Kovų mašina");
	navigacija($g_n);
}



if($id == 'smogti'){
	top('Kovų mašina');
	$smugis = rand(350,10000);
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM machine WHERE nick='$nick'")) == true){
	echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
	echo'<div class="meniuc">Šiandien jau trenkei!</div>';
}else{
	if($smugis == 10000){
echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
echo'<div class="meniuc">Įtrenkei<b> '.$smugis.'</b>, tai yra didžiausias smūgis ! Gauni 100 '.$eurui.'</div>';	
		mysqli_query($conn,"INSERT INTO machine SET nick='$nick',smugis ='$smugis'");
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'100' WHERE nick='$nick'");
}	else{
	
	echo'
<div class="meniuc">
<img src="img/imgg/zona.png" /></div>';
	
echo'<div class="meniuc">Įtrenkei <b>'.$smugis.'</b> žalos!</div>';
	
	mysqli_query($conn,"INSERT INTO machine SET nick='$nick',smugis ='$smugis'");
	
}}

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php","Kovų laukas","Kovų mašina");
	navigacija($g_n);
}

}




 foot();
