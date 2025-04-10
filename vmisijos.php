<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
 $ii = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tikslas WHERE nick = '$nick'"));

head2();
baneris();
topbar();
if($id == "naujos2"){
	
	top('Unikalių Veikėjų misijos');
   online('Unikalių Veikėjų Misijose');
	  echo '<div class="meniuc"><img src="img/imgg/misijos.png"></div>';
 echo '<div class="meniuc">Čia turite rinkti savo veikėjų kolekciją, už kiekvieną turimą unikalų veikėją ir įvygdyta misiją gausite atlygį! </div><div class="meniuc"> Misijas galite vygdyti tik iš eilės!</div>';
 echo'<div class="up">Misijos numeris / kokio veikėjo reikia</div>
   ';
if($apie['prizas1']-time() < 0){
echo' <div class="meniuc">
Neturi ka čia veikti!</div>';
}

if($apie['prizas1']-time() > 0){
echo' <div class="meniu">
<a href="?id=finalgoku"><b>8.</b>
Final Goku Gods<br></div>';
}
if($apie['finalgokas']-time() > 0){
echo' <div class="meniu">
<a href="?id=vegeta"><b>9.</b>
Vegeta gods<br></div>';
}
if($apie['vegetav']-time() > 0){
echo' <div class="meniu">
<a href="?id=hitas"><b>10.</b>
Hitas<br></div>';
}
if($apie['hitasv']-time() > 0){
echo' <div class="meniu">
<a href="?id=gokas"><b>11.</b>
 Goku Gods<br></div>';
}
if($apie['gokasv']-time() > 0){
echo' <div class="meniu">
<a href="?id=maxfryzas"><b>12.</b>
Max Power Gold Fryzas <br></div>';
}
if($apie['maxfryzasv']-time() > 0){
echo' <div class="meniu">
<a href="?id=sidra"><b>13.</b>
Sidra<br></div>';
}
if($apie['sidrav']-time() > 0){
echo' <div class="meniu">
<a href="?id=bills"><b>14.</b>
 Lord bills <br></div>';
}

if($apie['billsv']-time() > 0){
echo' <div class="meniu">
<a href="?id=prizas2">'.$ico.' Apdovanojimas!<br></div>';
}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Naujos Misijos 2");
	navigacija($g_n);	

}
if($id == ""){
	top('Unikalių Veikėjų misijos');
   online('Unikalių Veikėjų Misijose');
	  echo '<div class="meniuc"><img src="img/imgg/misijos.png"></div>';
 echo '<div class="meniuc">Čia turite rinkti savo veikėjų kolekciją, už kiekvieną turimą unikalų veikėją ir įvygdyta misiją gausite atlygį! </div> <div class="meniuc"><b>Misijas galite vygdyti tik iš eilės!</b></div>';
 echo'<div class="up">Misijos numeris / kokio veikėjo reikia</div>
   <div class="meniu">
<a href="?id=kaba"><b>1.</b>Kaba</a><br/></div>';
	if($apie['kabav']-time() > 0){
echo' <div class="meniu">
<a href="?id=kale"><b>2.</b>
Kale<br></div>';
}
	if($apie['kalev']-time() > 0){
echo' <div class="meniu">
<a href="?id=omega"><b>3.</b>
Fusion omega cooler<br></div>';
}
if($apie['omegav']-time() > 0){
echo' <div class="meniu">
<a href="?id=botamo"><b>4.</b>
Botamo<br></div>';
}
if($apie['botamov']-time() > 0){
echo' <div class="meniu">
<a href="?id=buu"><b>5.</b>
Majin Buu<br></div>';
}
if($apie['buuv']-time() > 0){
echo' <div class="meniu">
<a href="?id=baby"><b>6.</b>
Baby Vegeta<br></div>';
}
if($apie['babyv']-time() > 0){
echo' <div class="meniu">
<a href="?id=fryzas"><b>7.</b>
Gold Fryzas<br></div>';
}
if($apie['fryzasv']-time() > 0){
echo' <div class="meniu">
<a href="?id=prizas">'.$ico.' Apdovanojimas!<br></div>';
}


if($apie['prizas1']-time() > 0){
echo' <div class="meniu">
<a href="?id=naujos2">
Sekančios misijos!!<br></div>';
}



	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Misijos");
	navigacija($g_n);	
}
if($id == "kaba"){
	top('Naujos misijos - Kaba');
   online('Naujos Misijos');
		if($apie['kabab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Kaba-0.png">  </div>
';
	if($apie['kabab']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_kaba">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['kabab']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=kaba">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Kaba");
	navigacija($g_n);	
}


elseif($id == "turiu_kaba"){
	 online('Naujos Misijos');
top('Misija - Kaba');

	if($apie['kabab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if($apie['kabav']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['kabab']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 10 <img src="img/bicons/euro.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'10' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET kabav='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['kabav']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Kaba");
	navigacija($g_n);
	

}			

if($id == "kale"){
	top('Naujos misijos - Kale');
   online('Naujos Misijos');
		if($apie['kaleb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['kabav']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Kale-0.png">  </div>
';
	if($apie['kaleb']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_kale">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['kaleb']-time() < 0){
echo '<div class="meniuc">
        <a href="kreditai.php?id=shop&ka=kale">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Kale");
	navigacija($g_n);	
}


elseif($id == "turiu_kale"){
	 online('Naujos Misijos');
top('Misija - Kale');

	if($apie['kaleb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['kabav']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
		if($apie['kalev']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	
	if($apie['kabav']-time() > 0){
				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 20 <img src="img/bicons/euro.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'20' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET kalev='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['kalev']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Kale");
	navigacija($g_n);
	

}			

if($id == "omega"){
	top('Naujos misijos - Fusion omega cooler');
   online('Naujos Misijos');
		if($apie['omegab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['kalev']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Fusion omega cooler-0.png">  </div>
';
	if($apie['omegab']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_omega">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['omegab']-time() < 0){
echo '<div class="meniuc">
        <a href="auksiniai.php?id=fussion">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Fusion omega cooler");
	navigacija($g_n);	
}


elseif($id == "turiu_omega"){
	 online('Naujos Misijos');
top('Misija - Omega');


	if($apie['omegab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if($apie['kalev']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
		if($apie['omegav']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['kalev']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 30 <img src="img/bicons/euro.png">
<br>Gauni 1 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'30', bitcoin=bitcoin+'1' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET omegav='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['omegav']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Omega");
	navigacija($g_n);
	

}			

if($id == "botamo"){
	top('Naujos misijos - Botamo');
   online('Naujos Misijos');
		if($apie['magetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['omegav']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Botamo-0.png">  </div>
';
	if($apie['magetab']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_botamo">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['magetab']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=mageta">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Botamo");
	navigacija($g_n);	
}


elseif($id == "turiu_botamo"){
	 online('Naujos Misijos');
top('Misija - Botamo');

if($apie['magetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
		if($apie['omegav']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
		if($apie['botamov']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['omegav']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 40 <img src="img/bicons/euro.png">
<br>Gauni 2 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'40', bitcoin=bitcoin+'2' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET botamov='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['botamov']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Botamo");
	navigacija($g_n);
	

}	
if($id == "buu"){
	top('Naujos misijos - Majin Buu');
   online('Naujos Misijos');
		if($apie['buub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['botamov']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Majin Buu-0.png">  </div>
';
if($apie['buub']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_buu">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['buub']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=mbuu">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Majin Buu");
	navigacija($g_n);	
}


elseif($id == "turiu_buu"){
	 online('Naujos Misijos');
top('Misija - Majin Buu');
if($apie['buub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['botamov']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie['buuv']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['botamov']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 50 <img src="img/bicons/euro.png">
<br>Gauni 4 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'50',bitcoin=bitcoin+'4' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET buuv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['buuv']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Majin Buu");
	navigacija($g_n);
	

}
if($id == "baby"){
	top('Naujos misijos - Baby Vegeta');
   online('Naujos Misijos');
		if($apie['babyb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['buuv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Baby Vegeta-0.png">  </div>
';
if($apie['babyb']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_baby">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['babyb']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=baby">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Baby Vegeta");
	navigacija($g_n);	
}


elseif($id == "turiu_baby"){
	 online('Naujos Misijos');
top('Misija - Baby Vegeta');
if($apie['babyb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['buuv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
		if($apie['babyv']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['buuv']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 60 <img src="img/bicons/euro.png">
<br>Gauni 6 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'60', bitcoin=bitcoin+'6' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET babyv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['babyv']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Baby Vegeta");
	navigacija($g_n);
	

}
if($id == "fryzas"){
	top('Naujos misijos - Fryzas');
   online('Naujos Misijos');
		if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['babyv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Gold Fryzas-0.png">  </div>
';
if($apie['fryzasb']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_fryzas">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['fryzasb']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=goldfryzas">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Gold Fryzas");
	navigacija($g_n);	
}


elseif($id == "turiu_fryzas"){
	 online('Naujos Misijos');
top('Misija - Gold Fryzas');
if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie['babyv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie['fryzasv']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['babyv']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 70 <img src="img/bicons/euro.png">
<br>Gauni 8 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'70', bitcoin=bitcoin+'8' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET fryzasv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['fryzasv']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Gold Fryzas");
	navigacija($g_n);
	

}

if($id == "prizas"){
	top('Naujos misijos - Prizas!');
   online('Naujos Misijos');
		if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Negali imti prizo!</div>';
}
	if($apie['fryzasv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/bicons/prizas.png">  </div>
';
if($apie['fryzasv']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=imu_prizas">Passimti prizą!</a>	
        </div>';}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Prizas!");
	navigacija($g_n);	
}


elseif($id == "imu_prizas"){
	 online('Naujos Misijos');
top('Misija - Gold Fryzas');
if($apie['fryzasb']-time() < 0){
echo' <div class="meniuc">
Negali imti prizo!</div>';
}
	if($apie['fryzasv']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie['prizas1']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['fryzasv']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai pasiemei prizą!<br> Gauni 100 <img src="img/bicons/euro.png">
<br>Gauni 10 <img src="img/bicons/bitcoin.png"><br>
Gauni 200 <img src="img/bicons/credit.png">!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'100', bitcoin=bitcoin+'10', kred=kred+'200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET prizas1='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['prizas1']-time() > 0){
                echo '<div class="meniuc">Tu jau pasiemei šį prizą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Prizas!");
	navigacija($g_n);
	

}
if($id == "finalgoku"){
	top('Naujos misijos - Final Goku Gods');
   online('Naujos Misijos');
		if($apie['finalgokub']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['prizas1']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Final goku gods-0.png">  </div>
';
if($apie['finalgokub']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_finalgoku">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['finalgokub']-time() < 0){
echo '<div class="meniuc">
        <a href="auksiniai.php?id=goku">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Final Goku Gods");
	navigacija($g_n);	
}


elseif($id == "turiu_finalgoku"){
	 online('Naujos Misijos');
top('Misija - Final Goku Gods');
if($apie['finalgokub']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie['prizas1']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie['finalgokas']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['prizas1']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 80 <img src="img/bicons/euro.png">
<br>Gauni 10 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'80', bitcoin=bitcoin+'10' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET finalgokas='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['finalgokas']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Final Goku Gods");
	navigacija($g_n);
	

}

if($id == "vegeta"){
	top('Naujos misijos - Vegeta Gods');
   online('Naujos Misijos');
		if($apie['vegetab']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie['finalgokas']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Vegeta gods-0.png">  </div>
';
if($apie['vegetab']-time() > 0){
echo '<div class="meniuc">
        <a href="?id=turiu_vegeta">Turiu šį veikėją!</a>	
        </div>';}
	if($apie['vegetab']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=vegeta gods">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Vegeta Gods");
	navigacija($g_n);	
}


elseif($id == "turiu_vegeta"){
	 online('Naujos Misijos');
top('Misija - Vegeta Gods');
if($apie['vegetab']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie['finalgokas']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie['vegetav']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie['finalgokas']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 100 <img src="img/bicons/euro.png">
<br>Gauni 10 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'100', bitcoin=bitcoin+'10' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET vegetav='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['vegetav']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - Vegeta Gods");
	navigacija($g_n);
	

}
if($id == "hitas"){
$v = 'Hitas'; 
$p = 'vegetav'; 
$v2 = 'hitasb'; 
$v3 ='hitasv';
$tr ='turiu_hitas';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Hitas-0.png">  </div>
';
if($apie[''.$v2.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Turiu šį veikėją!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=hit">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "turiu_hitas"){
$v = 'Hitas'; 
$p = 'vegetav'; 
$v2 = 'vegetav'; 
$v3 ='hitasv';
$tr ='turiu_hitas';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$v2.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 110 <img src="img/bicons/euro.png">
<br>Gauni 11 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'110', bitcoin=bitcoin+'11' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET hitasv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}
if($id == "gokas"){
$v = 'Gokas Gods'; 
$p = 'hitasv'; 
$v2 = 'gokasb'; 
$v3 ='gokasv';
$tr ='turiu_gokas';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Goku Gods-0.png">  </div>
';
if($apie[''.$v2.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Turiu šį veikėją!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=goku gods">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "turiu_gokas"){
$v = 'Gokas Gods'; 
$p = 'hitasv'; 
$v2 = 'gokasb'; 
$v3 ='gokasv';
$tr ='turiu_gokas';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$p.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 120 <img src="img/bicons/euro.png">
<br>Gauni 12 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'120', bitcoin=bitcoin+'12' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET gokasv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}
if($id == "maxfryzas"){
$v = 'MAX Power Gold Fryzas'; 
$p = 'gokasv'; 
$v2 = 'maxfryzasb'; 
$v3 ='maxfryzasv';
$tr ='turiu_maxfryzas';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/MAX Power Gold Fryzas-0.png">  </div>
';
if($apie[''.$v2.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Turiu šį veikėją!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=goldfryza">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "turiu_maxfryzas"){
$v = 'MAX Power Gold Fryzas'; 
$p = 'gokasv'; 
$v2 = 'maxfryzasb'; 
$v3 ='maxfryzasv';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$p.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 130 <img src="img/bicons/euro.png">
<br>Gauni 13 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'130', bitcoin=bitcoin+'13' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET maxfryzasv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}
if($id == "sidra"){
$v = 'Sidra'; 
$p = 'maxfryzasv'; 
$v2 = 'sidrab'; 
$v3 ='sidrav';
$tr ='turiu_sidra';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Sidra-0.png">  </div>
';
if($apie[''.$v2.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Turiu šį veikėją!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="auksiniai.php?id=sidra">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "turiu_sidra"){
$v = 'Sidra'; 
$p = 'maxfryzasv'; 
$v2 = 'sidrab'; 
$v3 ='sidrav';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$p.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 140 <img src="img/bicons/euro.png">
<br>Gauni 14 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'140', bitcoin=bitcoin+'14' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET sidrav='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}
if($id == "bills"){
$v = 'Lord Bills'; 
$p = 'sidrav'; 
$v2 = 'billsb'; 
$v3 ='billsv';
$tr ='turiu_bills';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Lord bills-0.png">  </div>
';
if($apie[''.$v2.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Turiu šį veikėją!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=bils">Nusipirk veikėją čia!</a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "turiu_bills"){
$v = 'Lord Bills'; 
$p = 'sidrav'; 
$v2 = 'billsb'; 
$v3 ='billsv';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$p.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 150 <img src="img/bicons/euro.png">
<br>Gauni 15 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'150', bitcoin=bitcoin+'15' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET billsv='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Antrą kartą vygdyti negali!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}


if($id == "prizas2"){
$v = 'Prizas'; 
$p = 'billsv'; 
$v2 = 'hitasb'; 
$v3 ='prizas2';
$tr ='imu_prizas2';
	top('Naujos misijos - '.$v.'');
   online('Naujos Misijos');
		if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi šio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}
echo' 	<div class="meniuc"><img src="img/veikejai/Lord prizas2.png">  </div>
';
if($apie[''.$p.'']-time() > 0){
echo '<div class="meniuc">
        <a href="?id='.$tr.'">Atsiimti prizą!</a>	
        </div>';}
	if($apie[''.$v2.'']-time() < 0){
echo '<div class="meniuc">
        <a href="eurai.php?id=bils">Neturi reikiamo veikėjo!Nusipirk!/a>	
        </div>';}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);	
}


elseif($id == "imu_prizas2"){
$v = 'Prizas'; 
$p = 'billsv'; 
$v2 = 'hitasb'; 
$v3 ='prizas2';
	 online('Naujos Misijos');
top('Misija - '.$v.'');
if($apie[''.$v2.'']-time() < 0){
echo' <div class="meniuc">
Neturi sio veikėjo!</div>';
}
	if($apie[''.$p.'']-time() < 0){
echo' <div class="meniuc">
Neesi įvygdęs prieš tai misijos!</div>';
}

		if($apie[''.$v3.'']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '0'){
			
		echo'	<div class="meniuc">Klaida!
</div> ';}
	if($apie[''.$p.'']-time() > 0){

				
	echo'	<div class="meniuc">Sėkmingai įvydei misiją!<br> Gauni 200 <img src="img/bicons/euro.png">
<br>Gauni 25 <img src="img/bicons/bitcoin.png">
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'200', bitcoin=bitcoin+'25' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET prizas2='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie[''.$v3.'']-time() > 0){
                echo '<div class="meniuc">Jau pasiemei šį prizą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vmisijos.php","Misijos", "Misija - '.$v.'");
	navigacija($g_n);
	

}

 foot();
?>
