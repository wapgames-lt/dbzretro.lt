<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include("cfg/sql.php");
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if(empty($apie['lab'])){
	if($id == ''){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');
		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Jūs dar neradote daktaro gero labaratorijos</div>';
		echo'	<div class="meniu">'.$ico.' <a href="?id=ieskoti">Ieškoti</a></div>';
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Daktaro Gero labaratorija");
		navigacija($g_n);}

	if($id == "ieskoti"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');

		if($apie['lab_time'] > time()){
			echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Ieškoti galėsi '.laikas($apie['lab_time']-time(),1).'</div>';


		}else{
			$rr = rand(1,2);
			if($rr == '2'){
				echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Sveikiname radote labaratorija</div>';
				mysqli_query($conn,"UPDATE zaidejai SET lab='+' WHERE  nick='$nick'");
			}else{

				echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Deja neradote labaratorijos</div>';
				$t= time()+30;
				mysqli_query($conn,"UPDATE zaidejai SET lab_time='$t' WHERE  nick='$nick'");
			}
		}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Daktaro Gero labaratorija");
		navigacija($g_n);
	}



}else{



	if($id == ""){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Tau pavyko rasti <b>labaratoriją</b>!<br>Dabar gali pasidaryti sau nuosavą <b>Kyborgą</b>!</div>
	<div class="meniu">

	'.$ico.' <a href="?id=kyborgai">Kyborgai</a></br>
	'.$ico.' <a href="?id=daiktai"><b>AD daiktai</b></a></br>
'.$ico.' <a href="?id=setai"><b><b>Kyborgų</b> setai</b></a></br>



';
		if($apie['ad16'] == '+'){	echo''.$ico.' <a href="?id=turiuk">Turimi Kyborgai</a></br>

	
	';}
		if($inv['ad16amulet'] > '0'||$inv['ad17amulet']> '0'||$inv['ad18amulet'] > '0'||$inv['ad19amulet'] > '0'||$inv['ad20amulet'] > '0'){	echo''.$ico.' <a href="?id=turius">Turimi Setai</a></br>

	
	';}
		echo'</div>';
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Daktaro Gero labaratorija");
		navigacija($g_n);
	}

	if($id == "kyborgai"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>Kyborgas</b> - tai labai didelė pagalba kovojant prieš <b>Bosus</b>!<br><b>Kyborgai</b> sudėti iš eilės pagal jų <b>vertę</b>!<br>Norint gauti <b>kyborgą</b> turite atlikti visus reikiamus reikalavimus!</div>
	<div class="meniu">';

		echo'	'.$ico.' <a href="?id=16">16 <b>Kyborgas</b></a>';
		if($apie['ad16'] == '' ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($apie['ad16'] == '+' ){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';

		echo'	'.$ico.' <a href="?id=17">17<b> Kyborgas</b></a>';
		if($apie['ad17'] == '' ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($apie['ad17'] == '+' ){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';
		echo'	'.$ico.' <a href="?id=18">18 <b>Kyborgė</b></a>';
		if($apie['ad18'] == '' ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($apie['ad18'] == '+' ){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';
		echo'	'.$ico.' <a href="?id=19">19 <b>Kyborgas</b></a>';
		if($apie['ad19'] == '' ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($apie['ad19'] == '+' ){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';
		echo''.$ico.' <a href="?id=20">20 <b>Kyborgas</b></a>';
		if($apie['ad20'] == '' ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($apie['ad20'] == '+' ){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}

		echo'	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}

	if($id == "turiuk"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Čia yra visi laikomi tavo turimi <b>Kyborgai</b>!<br>Ateityje <b>Kyborgai</b> bus vertingesni, ir galbūt jų bus <b>daugiau</b>!</div>
	<div class="meniu">
';

		if($apie['ad16'] == '+'){	echo''.$ico.'  16 <b>Kyborgas</b></br>';}
		if($apie['ad17'] == '+'){	echo''.$ico.'  17 <b>Kyborgas</b></br>';}
		if($apie['ad18'] == '+'){	echo''.$ico.'  18 <b>Kyborgė</b></br>';}
		if($apie['ad19'] == '+'){	echo''.$ico.'  19 <b>Kyborgas</b></br>';}
		if($apie['ad20'] == '+'){	echo''.$ico.'  20 <b>Kyborgas</b></br>';}
		echo'</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "turius"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br>Čia yra visi laikomi tavo turimi <b>Setai</b>!<br>Ateityje <b>Setų</b>  galbūt jų bus <b>daugiau</b>!</div>
	<div class="meniu">
';

		if($inv['ad16kard'] > '0' and $inv['ad16sarv'] > '0' and $inv['ad16amulet'] > '0'){	echo''.$ico.' <b> 16AD</b> <b>Setas</b> (Bonusas + <b>50000</b> žalos bosams)</br>';}

		if($inv['ad17kard'] > '0' and $inv['ad17sarv'] > '0' and $inv['ad17amulet'] > '0'){	echo''.$ico.' <b> 17AD</b> <b>Setas</b> (Bosų žala sumažinama  - <b>15000</b> )</br>';}
		if($inv['ad18kard'] > '0' and $inv['ad18sarv'] > '0' and $inv['ad18amulet'] > '0'){	echo''.$ico.' <b> 18AD</b> <b>Setas</b> (Bonusas + <b>200000</b> žalos bosams)</br>';}
		if($inv['ad19kard'] > '0' and $inv['ad19sarv'] > '0' and $inv['ad19amulet'] > '0'){	echo''.$ico.' <b> 19AD</b> <b>Setas</b> (Bosų žala sumažinama  - <b>50000</b> )</br>';}
		if($inv['ad20kard'] > '0' and $inv['ad20sarv'] > '0' and $inv['ad20amulet'] > '0'){	echo''.$ico.' <b> 20AD</b> <b>Setas</b> (Bonusas + <b>500000</b> žalos bosams)</br>';}
		echo'</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "daiktai"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD daiktai</b> - tai daiktai reikalingi pasigaminti <b>Kyborgui</b>!<br>Kuo geresnį norite <b>Kyborgą</b> pasigaminti, tuo geresnį daiktą turite atiduoti!<br>Norint pasigaminti geresnį <b>daiktą</b> turite turėti daug mažesnės vertės <b>AD daikto</b></div>
	<div class="meniu">

	'.$ico.' <a href="?id=gaminuad17">Gaminti <b>AD17</b> daiktus</a></br>
		'.$ico.' <a href="?id=gaminuad18">Gaminti <b>AD18</b> daiktus</a></br>
		'.$ico.' <a href="?id=gaminuad19">Gaminti <b>AD19</b> daiktus</a></br>
		'.$ico.' <a href="?id=gaminuad20">Gaminti <b>AD20</b> daiktus</a></br>
	

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "setai"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>Kyborgų setai</b>  - tai <b>unikalūs daiktai</b>!<br>Kiekvienas <b>Kyborgo setas</b> turi skirtingus <n>bonusus</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad16set">Gaminti <b>AD16</b> setą</a>';
		if($inv['ad16kard'] > '0' and $inv['ad16sarv'] > '0' and $inv['ad16amulet'] > '0'){	echo'<b> [<font color="blue"><b>Turite visą setą</b></font>]';}
		echo'<br>';
		echo' 	'.$ico.' <a href="?id=ad17set">Gaminti <b>AD17</b> setą</a>';
		if($inv['ad17kard'] > '0' and $inv['ad17sarv'] > '0' and $inv['ad17amulet'] > '0'){	echo'<b> [<font color="blue"><b>Turite visą setą</b></font>]';}
		echo'<br>';
		echo'	'.$ico.' <a href="?id=ad18set">Gaminti <b>AD18</b> setą</a>';
		if($inv['ad18kard'] > '0' and $inv['ad18sarv'] > '0' and $inv['ad18amulet'] > '0'){	echo'<b> [<font color="blue"><b>Turite visą setą</b></font>]';}
		echo'<br>';
		echo'	'.$ico.' <a href="?id=ad19set">Gaminti <b>AD19</b> setą</a>';
		if($inv['ad19kard'] > '0' and $inv['ad19sarv'] > '0' and $inv['ad19amulet'] > '0'){	echo'<b> [<font color="blue"><b>Turite visą setą</b></font>]';}
		echo'<br>';
		echo'	'.$ico.' <a href="?id=ad20set">Gaminti <b>AD20</b> setą</a>';
		if($inv['ad20kard'] > '0' and $inv['ad20sarv'] > '0' and $inv['ad20amulet'] > '0'){	echo'<b> [<font color="blue"><b>Turite visą setą</b></font>]';}
		echo'

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}

	if($id == "ad16set"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD16 setas</b>  - tai <b>unikalus setas</b>!<br> <b>AD16 setas</b> turi savo <n>bonusus</b>!<br>Pasigaminus visus daiktus, papildomas <b>bonusas</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad16kard">Gaminti <b>AD16</b> kardą</a>';
		if($inv['ad16kard'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad16kard']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';
		echo'	'.$ico.' <a href="?id=ad16sarv">Gaminti <b>AD16</b> šarvus</a>';
		if($inv['ad16sarv'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad16sarv']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';
		echo'	'.$ico.' <a href="?id=ad16amulet">Gaminti <b>AD16</b> amuletą</a>';
		if($inv['ad16amulet'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad16amulet']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}


		echo'
	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "ad17set"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD17 setas</b>  - tai <b>unikalus setas</b>!<br> <b>AD17 setas</b> turi savo <n>bonusus</b>!<br>Pasigaminus visus daiktus, papildomas <b>bonusas</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad17kard">Gaminti <b>AD17</b> kardą</a>';
		if($inv['ad17kard'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad17kard']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';




		echo'	'.$ico.' <a href="?id=ad17sarv">Gaminti <b>AD17</b> šarvus</a>';
		if($inv['ad17sarv'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad17sarv']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';

		echo'		'.$ico.' <a href="?id=ad17amulet">Gaminti <b>AD17</b> amuletą</a>';
		if($inv['ad17amulet'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad17amulet']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'
	

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "ad18set"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD18 setas</b>  - tai <b>unikalus setas</b>!<br> <b>AD18 setas</b> turi savo <n>bonusus</b>!<br>Pasigaminus visus daiktus, papildomas <b>bonusas</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad18kard">Gaminti <b>AD18</b> kardą</a>';
		if($inv['ad18kard'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad18kard']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';


		echo'	'.$ico.' <a href="?id=ad18sarv">Gaminti <b>AD18</b> šarvus</a>';
		if($inv['ad18sarv'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad18sarv']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';


		echo'		'.$ico.' <a href="?id=ad18amulet">Gaminti <b>AD18</b> amuletą</a>';
		if($inv['ad18amulet'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad18amulet']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'
	

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "ad19set"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD19 setas</b>  - tai <b>unikalus setas</b>!<br> <b>AD19 setas</b> turi savo <n>bonusus</b>!<br>Pasigaminus visus daiktus, papildomas <b>bonusas</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad19kard">Gaminti <b>AD19</b> kardą</a>';
		if($inv['ad19kard'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad19kard']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';

		echo''.$ico.' <a href="?id=ad19sarv">Gaminti <b>AD19</b> šarvus</a>';
		if($inv['ad19sarv'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad19sarv']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';

		echo'	'.$ico.' <a href="?id=ad19amulet">Gaminti <b>AD19</b> amuletą</a>';
		if($inv['ad19amulet'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad19amulet']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'
	

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	if($id == "ad20set"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD20 setas</b>  - tai <b>unikalus setas</b>!<br> <b>AD20  setas</b> turi savo <n>bonusus</b>!<br>Pasigaminus visus daiktus, papildomas <b>bonusas</b>!</div>
	<div class="meniu">';
		echo'	'.$ico.' <a href="?id=ad20kard">Gaminti <b>AD20</b> kardą</a>';
		if($inv['ad20kard'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad20kard']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';


		echo'	'.$ico.' <a href="?id=ad20sarv">Gaminti <b>AD20</b> šarvus</a>';
		if($inv['ad20sarv'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad20sarv']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'</br>';


		echo'		'.$ico.' <a href="?id=ad20amulet">Gaminti <b>AD20</b> amuletą</a>';
		if($inv['ad20amulet'] <= 0 ){
			echo' [<font color="red"><b>Nepasigaminęs</b></font><b>]';}
		if($inv['ad20amulet']> 0){
			echo' [<font color="green"><b>Pasigaminęs</b></font><b>]';
		}
		echo'
	

	</div>
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}



	if($id == "gaminuad17"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD daiktai</b> - tai daiktai reikalingi pasigaminti <b>Kyborgui</b>!<br>Kuo geresnį norite <b>Kyborgą</b> pasigaminti, tuo geresnį daiktą turite atiduoti!<br>Norint pasigaminti geresnį <b>daiktą</b> turite turėti daug mažesnės vertės <b>AD daikto</b></div>
	<div class="meniuc">
Norint pasigaminti <b>AD17</b> <br>
Reikia: 10 <b>AD16</b></div>
<div class="meniuc">
<form action="?id=gaminuad172" method="post"/>
        Kiek gaminsite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	elseif($id == "gaminuad172"){
		online('Gamina AD17');
		top("AD17 Gaminimas");


		if(isset($_POST['submit'])){
			$kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
			$kainn = $kiekv*10;


			if(empty($kiekv)){
				echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
			}




			elseif($kainn > $inv['ad16']){
				echo '<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div><div class="meniuc">Neturi pakankamai 
<b>AD16</b> !
</div>';
			} else {
				echo '<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div><div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b>AD16</b>, Gavai '.$kiekv.' <b>AD17</b>!</div>';


				mysqli_query($conn,"UPDATE inv SET ad16=ad16-'$kainn', ad17=ad17+'$kiekv' WHERE nick='$nick' ");
			}
		}$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=gaminuad17","Atgal","AD17 Gaminimas");
		navigacija($g_n);
	}


	if($id == "gaminuad18"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD daiktai</b> - tai daiktai reikalingi pasigaminti <b>Kyborgui</b>!<br>Kuo geresnį norite <b>Kyborgą</b> pasigaminti, tuo geresnį daiktą turite atiduoti!<br>Norint pasigaminti geresnį <b>daiktą</b> turite turėti daug mažesnės vertės <b>AD daikto</b></div>
	<div class="meniuc">
Norint pasigaminti <b>AD18</b> <br>
Reikia: 8 <b>AD17</b></div>
<div class="meniuc">
<form action="?id=gaminuad182" method="post"/>
        Kiek gaminsite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	elseif($id == "gaminuad182"){
		online('Gamina AD18');
		top("AD18 Gaminimas");


		if(isset($_POST['submit'])){
			$kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
			$kainn = $kiekv*8;


			if(empty($kiekv)){
				echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
			}




			elseif($kainn > $inv['ad17']){
				echo '
<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div>
<div class="meniuc">Neturi pakankamai 
<b>AD17</b> !
</div>';
			} else {
				echo '<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div><div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b>AD17</b>, Gavai '.$kiekv.' <b>AD18</b>!</div>';


				mysqli_query($conn,"UPDATE inv SET ad17=ad17-'$kainn', ad18=ad18+'$kiekv' WHERE nick='$nick' ");
			}
		}$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=gaminuad18","Atgal","AD18 Gaminimas");
		navigacija($g_n);
	}
	if($id == "gaminuad19"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD daiktai</b> - tai daiktai reikalingi pasigaminti <b>Kyborgui</b>!<br>Kuo geresnį norite <b>Kyborgą</b> pasigaminti, tuo geresnį daiktą turite atiduoti!<br>Norint pasigaminti geresnį <b>daiktą</b> turite turėti daug mažesnės vertės <b>AD daikto</b></div>
	<div class="meniuc">
Norint pasigaminti <b>AD19</b> <br>
Reikia: 6 <b>AD18</b></div>
<div class="meniuc">
<form action="?id=gaminuad192" method="post"/>
        Kiek gaminsite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	elseif($id == "gaminuad192"){
		online('Gamina AD19');
		top("AD19 Gaminimas");


		if(isset($_POST['submit'])){
			$kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
			$kainn = $kiekv*6;


			if(empty($kiekv)){
				echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
			}




			elseif($kainn > $inv['ad18']){
				echo '
<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div>
<div class="meniuc">Neturi pakankamai 
<b>AD18</b> !
</div>';
			} else {
				echo '<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div><div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b>AD18</b>, Gavai '.$kiekv.' <b>AD19</b>!</div>';


				mysqli_query($conn,"UPDATE inv SET ad18=ad18-'$kainn', ad19=ad19+'$kiekv' WHERE nick='$nick' ");
			}
		}$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=gaminuad19","Atgal","AD19 Gaminimas");
		navigacija($g_n);
	}
	if($id == "gaminuad20"){
		online('Daktaro Gero labaratorija');
		top('Daktaro Gero labaratorija');


		echo'	<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></br><b>AD daiktai</b> - tai daiktai reikalingi pasigaminti <b>Kyborgui</b>!<br>Kuo geresnį norite <b>Kyborgą</b> pasigaminti, tuo geresnį daiktą turite atiduoti!<br>Norint pasigaminti geresnį <b>daiktą</b> turite turėti daug mažesnės vertės <b>AD daikto</b></div>
	<div class="meniuc">
Norint pasigaminti <b>AD20</b> <br>
Reikia: 4 <b>AD19</b></div>
<div class="meniuc">
<form action="?id=gaminuad202" method="post"/>
        Kiek gaminsite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Gaminti"/></form>
</div>



	
	';


		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=","Labaratorija","Daktaro Gero labaratorija");
		navigacija($g_n);
	}
	elseif($id == "gaminuad202"){
		online('Gamina AD20');
		top("AD20 Gaminimas");


		if(isset($_POST['submit'])){
			$kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
			$kainn = $kiekv*4;


			if(empty($kiekv)){
				echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
			}




			elseif($kainn > $inv['ad19']){
				echo '
<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div>
<div class="meniuc">Neturi pakankamai 
<b>AD19</b> !
</div>';
			} else {
				echo '<div class="meniuc"><img src=img/imgg/labaratorija.png border="1" width="150" height="75"></div><div class="meniuc">Atlikta! Išsikeitei sėkmingai!<br>Praradai '.$kainn.' <b>AD19</b>, Gavai '.$kiekv.' <b>AD20</b>!</div>';


				mysqli_query($conn,"UPDATE inv SET ad19=ad19-'$kainn', ad20=ad20+'$kiekv' WHERE nick='$nick' ");
			}
		}$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php?id=gaminuad20","Atgal","AD20 Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16kard'){
		top('AD16 Kardo Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"></br>Norint pasigaminti<b>Android 16</b> kardą reikia <b>1500 AD16 </b>!<br>Kardas jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD16 kardu </b> kirsite bosui <b>15000</b> daugiau!<br>Reikia turėti <b>Android 16</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad16kard2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16kard2'){
		top('AD16 Kardo Gaminimas')	;
		if($inv[ad16] < 1500 ){
			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tau nepakanka  <b> AD16 item</b>!</div>';

		}
		elseif($apie['ad16'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Norint vygdyti turi turėti <b> Android 16</b>!</div>';
		}
		elseif($inv['ad16kard'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tu jau pasigaminęs<b> AD16 kardą</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad16=ad16-'1500' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad16kard=ad16kard+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD16 Kardą</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16sarv'){
		top('AD16 Šarvų Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"></br>Norint pasigaminti<b>Android 16</b> šarvus reikia <b>2000 AD16 </b>!<br>Šarvai  jums padės kovoti prieš bosus! <br> Su šiais  <b>AD16 šarvais</b>  bosas kirs jums <b>3000</b> mažiau!<br>Reikia turėti <b>Android 16</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad16sarv2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16sarv2'){
		top('AD16 Šarvų Gaminimas')	;
		if($inv[ad16] < 2000 ){
			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tau nepakanka  <b> AD16 item</b>!</div>';

		}
		elseif($apie['ad16'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Norint vygdyti turi turėti <b> Android 16</b>!</div>';
		}
		elseif($inv['ad16sarv'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tu jau pasigaminęs<b> AD16 šarvus</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad16=ad16-'2000' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad16sarv=ad16sarv+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD16 šarvus</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16amulet'){
		top('AD16 Amulet Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"></br>Norint pasigaminti <b>Android 16</b> amulet reikia <b>2500 AD16 </b>!<br>Amulet  jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD16 amuletu</b>  bosui kirsite <b>30000 </b>daugiau!<br>Reikia turėti <b>Android 16</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad16amulet2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Amulet Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad16amulet2'){
		top('AD16 Amulet Gaminimas')	;
		if($inv[ad16] < 2500 ){
			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tau nepakanka  <b> AD16 item</b>!</div>';

		}
		elseif($apie['ad16'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Norint vygdyti turi turėti <b> Android 16</b>!</div>';
		}
		elseif($inv['ad16amulet'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tu jau pasigaminęs<b> AD16 amulet</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad16=ad16-'2500' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad16amulet=ad16amulet+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD16 amulet</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD16 Amulet Gaminimas");
		navigacija($g_n);
	}
/// Ad17 set
	if($id == 'ad17kard'){
		top('AD17 Kardo Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"></br>Norint pasigaminti<b>Android 17</b> kardą reikia <b>1500 AD17 </b>!<br>Kardas jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD17 kardu </b> kirsite bosui <b>40000</b> daugiau!<br>Reikia turėti <b>Android 17</b><br>Būtina atiduoti <b>AD16 Kardą</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad17kard2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad17kard2'){
		top('AD17 Kardo Gaminimas')	;
		if($inv[ad17] < 1500 and $inv[ad16kard] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tau nepakanka  <b> AD17 item</b> arba neturi <b>AD16 kardo</b>!!</div>';

		}
		elseif($inv['ad16kard'] < '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Neturi<b> AD16 Kardo</b> !</div>';
		}
		elseif($apie['ad17'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Norint vygdyti turi turėti <b> Android 17</b>!</div>';
		}
		elseif($inv['ad17kard'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tu jau pasigaminęs<b> AD17 kardą</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad17=ad17-'1500', ad16kard=ad16kard-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad17kard=ad17kard+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD17 Kardą</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad17sarv'){
		top('AD17 Šarvų Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"></br>Norint pasigaminti<b>Android 16</b> šarvus reikia <b>2000 AD17 </b>!<br>Šarvai  jums padės kovoti prieš bosus! <br> Su šiais  <b>AD17 šarvais</b>  bosas kirs jums <b>6000</b> mažiau!<br>Reikia turėti <b>Android 17</b><br>Būtina atiduoti <b>AD16 šarvus</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad17sarv2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad17sarv2'){
		top('AD17 Šarvų Gaminimas')	;
		if($inv[ad17] < 2000 and $inv[ad16sarv] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tau nepakanka  <b> AD17 item</b> arba neturi <b>AD16 sarvu</b>!!</div>';

		}

		elseif($inv['ad16sarv'] < '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Neturi<b> AD16 Šarvų</b> !</div>';
		}
		elseif($apie['ad17'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Norint vygdyti turi turėti <b> Android 17</b>!</div>';
		}
		elseif($inv['ad17sarv'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tu jau pasigaminęs<b> AD17 šarvus</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad17=ad17-'2000', ad16sarv=ad16sarv-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad17sarv=ad17sarv+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD17 šarvus</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad17amulet'){
		top('AD17 Amulet Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"></br>Norint pasigaminti <b>Android 17</b> amulet reikia <b>2500 AD17 </b>!<br>Amulet  jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD17 amuletu</b>  bosui kirsite <b>90000 </b>daugiau!<br>Reikia turėti <b>Android 17</b><br>Būtina atiduoti <b>AD16 Amulet</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad17amulet2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Amulet Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad17amulet2'){
		top('AD17 Amulet Gaminimas')	;
		if($inv[ad17] < 2500 and $inv[ad16amulet] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tau nepakanka  <b> AD17 item</b> arba neturi <b>AD16 amulet</b>!!</div>';

		}
		elseif($inv['ad16amulet'] < '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Neturi<b> AD16 Amulet</b> !</div>';
		}

		elseif($apie['ad17'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Norint vygdyti turi turėti <b> Android 17</b>!</div>';
		}
		elseif($inv['ad17amulet'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tu jau pasigaminęs<b> AD17 amulet</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad17=ad17-'2500', ad16amulet=ad16amulet-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad17amulet=ad17amulet+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD17 amulet</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD17 Amulet Gaminimas");
		navigacija($g_n);
	}

/// Ad19 set
	if($id == 'ad19kard'){
		top('AD19 Kardo Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"></br>Norint pasigaminti<b>Android 19</b> kardą reikia <b>1500 AD19 </b>!<br>Kardas jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD19 kardu </b> kirsite bosui <b>150000</b> daugiau!<br>Reikia turėti <b>Android 19</b><br>Būtina atiduoti <b>AD18 Kardą</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad19kard2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad19kard2'){
		top('AD19 Kardo Gaminimas')	;
		if($inv[ad19] < 1500 and $inv[ad18kard] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tau nepakanka  <b> AD19 item</b> arba neturi <b>AD18 kardo</b>!!</div>';

		}

		elseif($apie['ad19'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Norint vygdyti turi turėti <b> Android 19</b>!</div>';
		}
		elseif($inv['ad19kard'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tu jau pasigaminęs<b> AD19 kardą</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad19=ad19-'1500', ad18kard=ad18kard-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad19kard=ad19kard+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD19 Kardą</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad19sarv'){
		top('AD19 Šarvų Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"></br>Norint pasigaminti<b>Android 19</b> šarvus reikia <b>2000 AD19 </b>!<br>Šarvai  jums padės kovoti prieš bosus! <br> Su šiais  <b>AD19 šarvais</b>  bosas kirs jums <b>25000</b> mažiau!<br>Reikia turėti <b>Android 19</b><br>Būtina atiduoti <b>AD18 šarvus</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad19sarv2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad19sarv2'){
		top('AD19 Šarvų Gaminimas')	;
		if($inv[ad19] < 2000 and $inv[ad18sarv] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tau nepakanka  <b> AD19 item</b> arba neturi <b>AD18 sarvu</b>!!</div>';

		}


		elseif($apie['ad19'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Norint vygdyti turi turėti <b> Android 19</b>!</div>';
		}
		elseif($inv['ad19sarv'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tu jau pasigaminęs<b> AD19 šarvus</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad19=ad19-'2000', ad18sarv=ad18sarv-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad19sarv=ad19sarv+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD19 šarvus</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad19amulet'){
		top('AD19 Amulet Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"></br>Norint pasigaminti <b>Android 19</b> amulet reikia <b>2500 AD19 </b>!<br>Amulet  jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD19 amuletu</b>  bosui kirsite <b>300000 </b>daugiau!<br>Reikia turėti <b>Android 19</b><br>Būtina atiduoti <b>AD18 Amulet</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad19amulet2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Amulet Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad19amulet2'){
		top('AD19 Amulet Gaminimas')	;
		if($inv[ad19] < 2500 and $inv[ad18amulet] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tau nepakanka  <b> AD19 item</b> arba neturi <b>AD18 amuleto</b>!!</div>';

		}


		elseif($apie['ad19'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Norint vygdyti turi turėti <b> Android 19</b>!</div>';
		}
		elseif($inv['ad19amulet'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tu jau pasigaminęs<b> AD19 amulet</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad19=ad19-'2500', ad18amulet=ad18amulet-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad19amulet=ad19amulet+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD19 amulet</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD19 Amulet Gaminimas");
		navigacija($g_n);
	}
/// Ad18 set
	if($id == 'ad18kard'){
		top('AD18 Kardo Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"></br>Norint pasigaminti<b>Android 18</b> kardą reikia <b>1500 AD18 </b>!<br>Kardas jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD18 kardu </b> kirsite bosui <b>80000</b> daugiau!<br>Reikia turėti <b>Android 18</b><br>Būtina atiduoti <b>AD17 Kardą</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad18kard2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad18kard2'){
		top('AD18 Kardo Gaminimas')	;
		if($inv[ad18] < 1500 and $inv[ad17kard] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tau nepakanka  <b> AD18 item</b> arba neturi <b>AD17 kardo</b>!!</div>';

		}

		elseif($apie['ad18'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Norint vygdyti turi turėti <b> Android 18</b>!</div>';
		}
		elseif($inv['ad18kard'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tu jau pasigaminęs<b> AD18 kardą</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad18=ad18-'1500', ad17kard=ad17kard-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad18kard=ad18kard+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD18 Kardą</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad18sarv'){
		top('AD18 Šarvų Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"></br>Norint pasigaminti<b>Android 18</b> šarvus reikia <b>2000 AD18 </b>!<br>Šarvai  jums padės kovoti prieš bosus! <br> Su šiais  <b>AD18 šarvais</b>  bosas kirs jums <b>12000</b> mažiau!<br>Reikia turėti <b>Android 18</b><br>Būtina atiduoti <b>AD17 šarvus</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad18sarv2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad18sarv2'){
		top('AD18 Šarvų Gaminimas')	;
		if($inv[ad18] < 2000 and $inv[ad17sarv] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tau nepakanka  <b> AD18 item</b> arba neturi <b>AD17 sarvu</b>!!</div>';

		}


		elseif($apie['ad18'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Norint vygdyti turi turėti <b> Android 18</b>!</div>';
		}
		elseif($inv['ad18sarv'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tu jau pasigaminęs<b> AD18 šarvus</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad18=ad18-'2000', ad17sarv=ad17sarv-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad18sarv=ad18sarv+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD18 šarvus</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad18amulet'){
		top('AD18 Amulet Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"></br>Norint pasigaminti <b>Android 18</b> amulet reikia <b>2500 AD18 </b>!<br>Amulet  jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD18 amuletu</b>  bosui kirsite <b>150000 </b>daugiau!<br>Reikia turėti <b>Android 18</b><br>Būtina atiduoti <b>AD17 Amulet</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad18amulet2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Amulet Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad18amulet2'){
		top('AD18 Amulet Gaminimas')	;
		if($inv[ad18] < 2500 and $inv[ad17amulet] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tau nepakanka  <b> AD18 item</b> arba neturi <b>AD17 kardo</b>!!</div>';

		}


		elseif($apie['ad18'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Norint vygdyti turi turėti <b> Android 18</b>!</div>';
		}
		elseif($inv['ad18amulet'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tu jau pasigaminęs<b> AD18 amulet</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad18=ad18-'2500', ad17amulet=ad17amulet-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad18amulet=ad18amulet+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD18 amulet</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD18 Amulet Gaminimas");
		navigacija($g_n);
	}





/// Ad20 set
	if($id == 'ad20kard'){
		top('AD20 Kardo Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"></br>Norint pasigaminti<b>Android 20</b> kardą reikia <b>1500 AD20 </b>!<br>Kardas jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD20 kardu </b> kirsite bosui <b>500000</b> daugiau!<br>Reikia turėti <b>Android 20</b><br>Būtina atiduoti <b>AD19 Kardą</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad20kard2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad20kard2'){
		top('AD20 Kardo Gaminimas')	;
		if($inv[ad20] < 1500 and $inv[ad19kard] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tau nepakanka  <b> AD20 item</b> arba neturi <b>AD19 kardo</b>!!</div>';

		}
		elseif($inv['ad19kard'] > '1'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Neturi<b> AD19 Kardo</b> !</div>';
		}
		elseif($apie['ad20'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Norint vygdyti turi turėti <b> Android 20</b>!</div>';
		}
		elseif($inv['ad20kard'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tu jau pasigaminęs<b> AD20 kardą</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad20=ad20-'1500', ad19kard=ad19kard-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad20kard=ad20kard+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD20 Kardą</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Kardo Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad20sarv'){
		top('AD20 Šarvų Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"></br>Norint pasigaminti<b>Android 20</b> šarvus reikia <b>2000 AD20 </b>!<br>Šarvai  jums padės kovoti prieš bosus! <br> Su šiais  <b>AD20 šarvais</b>  bosas kirs jums <b>50000</b> mažiau!<br>Reikia turėti <b>Android 20</b><br>Būtina atiduoti <b>AD19 šarvus</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad20sarv2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad20sarv2'){
		top('AD20 Šarvų Gaminimas')	;
		if($inv[ad20] < 2000 and $inv[ad19sarv] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tau nepakanka  <b> AD20 item</b> arba neturi <b>AD19 šarvų</b>!!</div>';

		}


		elseif($apie['ad20'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Norint vygdyti turi turėti <b> Android 20</b>!</div>';
		}
		elseif($inv['ad20sarv'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tu jau pasigaminęs<b> AD20 šarvus</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad20=ad20-'2000', ad19sarv=ad19sarv-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad20sarv=ad20sarv+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD20 šarvus</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Šarvų Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad20amulet'){
		top('AD20 Amulet Gaminimas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"></br>Norint pasigaminti <b>Android 20</b> amulet reikia <b>2500 AD20 </b>!<br>Amulet  jums padės kovoti prieš bosus! <br> Su šiuo  <b>AD20 amuletu</b>  bosui kirsite <b>800000 </b>daugiau!<br>Reikia turėti <b>Android 20</b><br>Būtina atiduoti <b>AD19 Amulet</b>!</div>
			<div class="meniuc">
	'.$ico.' <a href="?id=ad20amulet2">Gaminti!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Amulet Gaminimas");
		navigacija($g_n);
	}

	if($id == 'ad20amulet2'){
		top('AD20 Amulet Gaminimas')	;
		if($inv[ad20] < 2000 and $inv[ad19amulet] < 1){
			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tau nepakanka  <b> AD20 item</b> arba neturi <b>AD19 amuleto</b>!!</div>';

		}


		elseif($apie['ad20'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Norint vygdyti turi turėti <b> Android 20</b>!</div>';
		}
		elseif($inv['ad20amulet'] > '0'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tu jau pasigaminęs<b> AD20 amulet</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET ad20=ad20-'2500', ad19amulet=ad19amulet-'1' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET ad20amulet=ad20amulet+'1' WHERE nick='$nick'");

			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Pasigaminai sėkmingai! Gavai <b>AD20 amulet</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "AD20 Amulet Gaminimas");
		navigacija($g_n);
	}


	if($id == '20'){
		top('20 kyborgas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"></br>Norint prikelti <b>Android 20</b> reikia<b> 25000 </b>mikroschemų!<br>Kyborgas jums padės kovoti prieš bosus. <br> Su šiuo kyborgu kirsite bosui <b>8</b> kartus daugiau!<br>Surinkti <b>2000 </b> - <b>AD 20 item</b><br>Reikia turėti <b>Android 19</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=20_2">Turiu viską ko reikia!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 20");
		navigacija($g_n);
	}

	if($id == '20_2'){
		top('20 kyborgas')	;
		if($inv[Microshem] < 25000 || $inv[ad20] < 2000){
			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tau nepakanka <b>mikroschemų</b> arba <b> AD20 item</b>!</div>';

		}
		elseif($apie['ad19'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Norint vygdyti turi turėti <b> Android 19</b>!</div>';
		}
		elseif($apie['ad20'] == '+'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Tu jau buvai gavęs<b> Android 20</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'10000', ad20=ad20-'2000' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET kyborgas='Android 20' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET ad20='+' WHERE nick='$nick'");
			echo'<div class="meniuc"><img src="img/veikejai/Android 20-0.png"><br>Misija vygdyta sėkmingai! Gavai <b>Android 20</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 20");
		navigacija($g_n);
	}
	if($id == '19'){
		top('19 kyborgas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"></br>Norint prikelti <b>Android 19</b> reikia<b> 15000 </b>mikroschemų!<br>Kyborgas jums padės kovoti prieš bosus. <br> Su šiuo kyborgu kirsite bosui <b>6</b> kartus daugiau!<br>Surinkti <b>1000 </b> - <b>AD 19 item</b><br>Reikia turėti <b>Android 18</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=19_2">Turiu viską ko reikia!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 19");
		navigacija($g_n);
	}

	if($id == '19_2'){
		top('19 kyborgas')	;
		if($inv[Microshem] < 15000 || $inv[ad19] < 1000){
			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tau nepakanka <b>mikroschemų</b> arba <b> AD19 item</b>!</div>';

		}
		elseif($apie['ad18'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Norint vygdyti turi turėti <b> Android 18</b>!</div>';
		}

		elseif($apie['ad19'] == '+'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Tu jau buvai gavęs<b> Android 19</b>!</div>';
		}
		else{
			mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'10000', ad19=ad19-'1000' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET kyborgas='Android 19' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET ad19='+' WHERE nick='$nick'");
			echo'<div class="meniuc"><img src="img/veikejai/Android 19-0.png"><br>Misija vygdyta sėkmingai! Gavai <b>Android 19</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 19");
		navigacija($g_n);
	}
	if($id == '18'){
		top('18 kyborgė')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"></br>Norint prikelti <b>Android 18</b> reikia<b> 10000 </b>mikroschemų!<br>Kyborgas jums padės kovoti prieš bosus. <br> Su šiuo kyborgu kirsite bosui <b>4</b> kartus daugiau!<br>Surinkti <b>700 </b> - <b>AD 18 item</b><br>Reikia turėti <b>Android 17</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=18_2">Turiu viską ko reikia!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 18");
		navigacija($g_n);
	}


	if($id == '18_2'){
		top('18 kyborgė')	;
		if($inv[Microshem] < 10000 || $inv[ad18] < 700){
			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tau nepakanka <b>mikroschemų</b> arba <b> AD18 item</b>!</div>';

		}
		elseif($apie['ad17'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Norint vygdyti turi turėti <b> Android 17</b>!</div>';
		}

		elseif($apie['ad18'] == '+'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Tu jau buvai gavęs<b> Android 18</b>!</div>';
		}
		else{
			mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'10000', ad18=ad18-'700' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET kyborgas='Android 18' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET ad18='+' WHERE nick='$nick'");
			echo'<div class="meniuc"><img src="img/veikejai/Android 18-0.png"><br>Misija vygdyta sėkmingai! Gavai <b>Android 18</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 18");
		navigacija($g_n);
	}

	if($id == '17'){
		top('17 kyborgas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"></br>Norint prikelti<b> Android 17</b> reikia <b>5000</b> mikroschemų!<br>Kyborgas jums padės kovoti prieš bosus.<br> Su šiuo kyborgu kirsite bosui <b>3</b> kartus daugiau!<br>Surinkti <b>400 </b> - <b>AD 17 item</b><br>Reikia turėti <b>Android 16</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=17_2">Turiu viską ko reikia!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 17");
		navigacija($g_n);
	}

	if($id == '17_2'){
		top('17 kyborgas')	;

		if($inv[Microshem] < 5000 || $inv[ad17] < 400){
			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tau nepakanka <b>mikroschemų</b>arba <b> AD17 item</b>!</div>';

		}
		elseif($apie['ad16'] == ''){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Norint vygdyti turi turėti <b> Android 16</b>!</div>';
		}

		elseif($apie['ad17'] == '+'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Tu jau buvai gavęs<b> Android 17</b>!</div>';
		}

		else{
			mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'5000', ad17=ad17-'400' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET kyborgas='Android 17' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET ad17='+' WHERE nick='$nick'");
			echo'<div class="meniuc"><img src="img/veikejai/Android 17-0.png"><br>Misija įvygdyta sėkmingai! Gavai <b>Android 17</b> !</div>';
		}

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 17");
		navigacija($g_n);
	}
	if($id == '16'){
		top('16 kyborgas')	;
		echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"></br>Norint prikelti <b>Android 16</b> reikia<b> 3000 </b>mikroschemų!<br>Kyborgas jums padės kovoti prieš bosus.<br> Su šiuo kyborgu kirsite bosui <b>2</b> kartus daugiau!<br>Surinkti <b>200 </b> - <b>AD 16 item</b></div>
			<div class="meniuc">
	'.$ico.' <a href="?id=16_2">Turiu viską ko reikia!</a></div>	
		';

		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 16");
		navigacija($g_n);
	}

	if($id == '16_2'){
		top('16 kyborgas')	;
		if($inv[Microshem] < 3000|| $inv[ad16] < 200){
			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tau nepakanka <b>mikroschemų</b> arba <b>AD16 item</b>!</div>';}
		elseif($apie['ad16'] == '+'){
			echo '<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Tu jau buvai gavęs<b> Android 16</b> !</div>';
		}
		else{

			mysqli_query($conn,"UPDATE zaidejai SET kyborgas='Android 16' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET ad16='+' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'3000', ad16=ad16-'200' WHERE nick='$nick'");
			echo'<div class="meniuc"><img src="img/veikejai/Android 16-0.png"><br>Misija įvygdyta sėkmingai! Gavai <b>Android 16</b> !</div>';
		}



		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","labaratory.php","Daktaro Gero labaratorija", "Android 16");
		navigacija($g_n);
	}
}
foot();
?>
