<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

head2();
baneris();
topbar();

	
		
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == true){
	echo"<div class='meniuc'><font color='red'>Dėmesio! Tu kviečiamas į ".$team_pakv['team']." komandą!</font><br>
	<a href='komanda.php?id=atmesti&ka=".$team_pakv['team']."'>Atmesti</a> <a href='komanda.php?id=priimti&ka=".$team_pakv['team']."'>Priimti</a>
	</div>";
	}
if($id == ""){
	 online('Perka VIP');
   top('VIP');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';

echo'<div class="up">'.$ico.'VIP Paslaugos</div>
<div class="meniuc">
<a href="?id=vip_privilegija"><img src="img/bicons/vip.png">VIP Privilegija</a> |
<a href="?id=vip"><img src="img/bicons/vip.png">VIP Lygis</a> | <a href="vipm.php?id="><img src="img/bicons/vip.png">VIP Misijos</a> | <a href="viptren.php?id="><img src="img/bicons/vip.png">VIP Treniruotės</a>

</div>
';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","VIP paslaugos");
	navigacija($g_n);
}

if($id =='vip_privilegija'){
	top('VIP Privilegijos pirkimas');
	$price = resolveVipPriceInVipTickets();
	echo'<div class="meniuc">' . skaicius($price) . '  <img src="img/bicons/vip.png"> - <b>24h</b> galiojanti VIP privilegija</div>';
	echo '<div class="meniuc"> '.$ico.' <a href="?id=vip_privilegija1">Pirkti VIP Privilegija</a></div>';


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Privilegijos pirkimas");
	navigacija($g_n);
}

function resolveVipPriceInVipTickets() {
	global  $apie;

	if ($apie['lygis'] < 30) {
		return 10000;
	}

	if ($apie['lygis'] < 60) {
		return 300000;
	}

	if ($apie['lygis'] < 90) {
		return 5000000;
	}

	if ($apie['lygis'] < 120) {
		return 70000000000;
	}

	if ($apie['lygis'] < 150) {
		return 1000000000000;
	}

	return 2000000000000;
}

if($id =='vip_privilegija1'){
	top('VIP Privilegijos pirkimas');
	$price = resolveVipPriceInVipTickets();
	if($apie['vipticket'] < $price){
		echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vip.png"> !</div>';
	}
	elseif((int)$apie['vip']-time() > 0){

		echo '<div class="meniuc">Tu jau turi VIP Privilegiją!</div>';

	}
	else{
		$vip_time = time()+ 3600*24;
		echo '<div class="meniuc">VIP Privilegija nupirkta sėkmingai!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vip='$vip_time', vipticket=vipticket-'$price' WHERE nick='$nick'");
	}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php","VIP", "VIP Privilegijos pirkimas");
	navigacija($g_n);

}
if($id == "vip"){
	 online('Perka VIP');
   top('VIP Pirkimas');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';


if($apie['vipas26'] === '+'){
	echo'<div class="up">'.$ico.'26 Lygio VIP</div>
<div class="meniu">
1. <font color="#663399"><b>+2</b></font> daugiau daiktų kovų zonoje</font><br>
2. <font color="#663399"><b>2x</b></font> daugiau eurų kovų zonoje <br/>
</div><div class="meniuc"><b>Tu jau esi pasiekęs didžiausią VIP Lygį</b>!</div>';
}
else if($apie['vipas25'] === '+'){
echo'<div class="up">'.$ico.'25 Lygio VIP</div>
<div class="meniu">
1. <font color="#663399"><b>+3</b></font> daugiau daiktų kovų zonoje<br>
    2. <font color="#663399"><b>70x</b></font> daugiau <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>
    3. <font color="#663399"><b>+15000</b></font> eurų <br/>
    4. <font color="#663399"><b>2x</b></font> daugiau eurų kovų zonoje<br/>
    <div class="meniuc">26 Lygio VIP kaina - <b>700,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';


		echo '<div class="meniuc"> ' . $ico . ' <a href="?id=vip26">Pirkti 26 lygio VIP</a></div></div>';


}
else if($apie['vipas24']== '+'){
echo'<div class="up">'.$ico.'25 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>24</b> Lygių VIP Privilegijos<br>
2. Bonusas - Meta <b>2x daugiau</b> Kario tobulėjimo <br>    
  3. Kovų zonoje duos <b>70</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>25 Lygio VIP kaina - <b>500,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas24']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip25">Pirkti 25 lygio VIP</a></div>';
     }


}



else{
if($apie['vipas23']== '+'){
echo'<div class="up">'.$ico.'24 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>23</b> Lygių VIP Privilegijos<br>
2. Bonusas - Meta <b>2x daugiau</b> daiktų <br>    
  3. Kovų zonoje duos <b>65</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>24 Lygio VIP kaina - <b>250,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas23']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip24">Pirkti 24 lygio VIP</a></div>';
     }


}
else{


if($apie['vipas22']== '+'){
echo'<div class="up">'.$ico.'23 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>22</b> Lygių VIP Privilegijos<br>
2. Bonusas - Meta <b>10x daugiau</b> lygio taškų <br>    
  3. Kovų zonoje duos <b>60</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>23 Lygio VIP kaina - <b>150,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas22']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip23">Pirkti 23 lygio VIP</a></div>';
     }


}
else{
if($apie['vipas21']== '+'){
echo'<div class="up">'.$ico.'22 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>21</b> Lygių VIP Privilegijos<br>
2. Bonusas - Meta <b>2x daugiau</b> drakono rutulių kovų zonoje<br>    
  3. Kovų zonoje duos <b>55</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>22 Lygio VIP kaina - <b>100,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas21']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip22">Pirkti 22 lygio VIP</a></div>';
     }


}
else{



if($apie['vipas20']== '+'){
echo'<div class="up">'.$ico.'21 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>20</b> Lygių VIP Privilegijos<br>
2. Bonusas - Meta <b>2x daugiau</b> BitCoin kovų zonoje<br>    
  3. Kovų zonoje duos <b>50</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>21 Lygio VIP kaina - <b>50,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas20']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip21">Pirkti 21 lygio VIP</a></div>';
     }


}
else{







if($apie['vipas19']== '+'){
echo'<div class="up">'.$ico.'20 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>19</b> Lygių VIP Privilegijos<br>
    
  2. Kovų zonoje duos <b>45</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>20 Lygio VIP kaina: <br>Žuvies <b>20000</b><br> <b>25,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas19']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip20">Pirkti 20 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas18']== '+'){
echo'<div class="up">'.$ico.'19 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>18</b> Lygių VIP Privilegijos<br>
    
  2. Kovų zonoje duos <b>35</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>19 Lygio VIP kaina - <b>15,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas18']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip19">Pirkti 19 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas17']== '+'){
echo'<div class="up">'.$ico.'18 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>17</b> Lygių VIP Privilegijos<br>
    
  2. Kovų zonoje duos <b>30</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>18 Lygio VIP kaina - <b>10,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas17']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip18">Pirkti 18 lygio VIP</a></div>';
     }


}
else{
if($apie['vipas16']== '+'){
echo'<div class="up">'.$ico.'17 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>16</b> Lygių VIP Privilegijos<br>
    
  2. Kovų zonoje duos <b>25</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>17 Lygio VIP kaina - <b>5,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas16']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip17">Pirkti 17 lygio VIP</a></div>';
     }


}
else{




if($apie['vipas15']== '+'){
echo'<div class="up">'.$ico.'16 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>14</b> Lygių VIP Privilegijos<br>
    
  2. Kovų zonoje duos <b>20</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>16 Lygio VIP kaina - <b>2,000,000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas15']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip16">Pirkti 16 lygio VIP</a></div>';
     }


}
else{







if($apie['vipas14']== '+'){
echo'<div class="up">'.$ico.'15 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>14</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>350 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 20000</b> '.$kreditaii.'<br>
4. Gausi <b> 500</b> '.$eurui.'<br>
5. Gausi <b> 200</b> '.$bt.'<br>




  10. Kovų zonoje duos <b>15</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"><b>
	 <br>
	 15 Lygio VIP kaina
	 <br>
	 	 <b>5000</b> Soul
	 <br><b>800000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas14']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip15">Pirkti 15 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas13']== '+'){
echo'<div class="up">'.$ico.'14 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>13</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>250 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 15000</b> '.$kreditaii.'<br>
4. Gausi <b> 500</b> '.$eurui.'<br>
5. Gausi <b> 150</b> '.$bt.'<br>




  10. Kovų zonoje duos <b>14</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>14 Lygio VIP kaina - <b>500000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas13']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip14">Pirkti 14 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas12']== '+'){
echo'<div class="up">'.$ico.'13 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>12</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>200 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 12000</b> '.$kreditaii.'<br>
4. Gausi <b> 500</b> '.$eurui.'<br>
5. Gausi <b> 120</b> '.$bt.'<br>




  10. Kovų zonoje duos <b>13</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>13 Lygio VIP kaina - <b>300000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas12']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip13">Pirkti 13 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas11']== '+'){
echo'<div class="up">'.$ico.'12 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>11</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>150 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 10000</b> '.$kreditaii.'<br>
4. Gausi <b> 500</b> '.$eurui.'<br>
5. Gausi <b> 100</b> '.$bt.'<br>




  10. Kovų zonoje duos <b>12</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>12 Lygio VIP kaina - <b>200000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas11']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip12">Pirkti 12 lygio VIP</a></div>';
     }


}
else{

if($apie['vipas10']== '+'){
echo'<div class="up">'.$ico.'11 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>10</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>100 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 7000</b> '.$kreditaii.'<br>
4. Gausi <b> 200</b> '.$eurui.'<br>
5. Gausi <b> 70</b> '.$bt.'<br>
6. Gausi 500 <b> Naikinimo Amulet Item</b> <br>



  10. Kovų zonoje duos <b>11</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>11 Lygio VIP kaina - <b>180000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas10']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip11">Pirkti 11 lygio VIP</a></div>';
     }


}



else{

if($apie['vipas9']== '+'){
echo'<div class="up">'.$ico.'10 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>9</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>50 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 5000</b> '.$kreditaii.'<br>
4. Gausi <b> 100</b> '.$eurui.'<br>
5. Gausi <b> 50</b> '.$bt.'<br>
6. Gausi 1000 <b> Super Amulet Item</b> <br>
7. Bus suteikta <b> BitCoin Licenzija</b> <br>
8. Gausi <b>Super Money Sword</b><br>
9. Gausi <b>Super Money Armor</b><br>

  10. Kovų zonoje duos <b>10</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc">10 Lygio VIP kaina <br><br>
	 <b>2000</b> Soul<br>
	 <b>100000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas9']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip10">Pirkti 10 lygio VIP</a></div>';
     }


}

else{


if($apie['vipas8']== '+'){
echo'<div class="up">'.$ico.'9 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>8</b> Lygių VIP Privilegijos<br>
    2. Gausi <b>20 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 3000</b> '.$kreditaii.'<br>
4. Gausi <b> 500</b> '.$eurui.'<br>
5. Duos <b>1000</b> <b> Kario tobulėjimo</b> <br>
6.Duos <b>1000</b> <b> Naikinimo galios</b><br>
7.Duos <b>1000 </b> <b> Angelo sparnų</b><br>
8. Gausi <b>Money Armor</b><br>
  9. Kovų zonoje duos <b>8</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>9 Lygio VIP kaina - <b>70000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas8']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip9">Pirkti 9 lygio VIP</a></div>';
     }


}

else{



if($apie['vipas7']== '+'){
echo'<div class="up">'.$ico.'8 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>7</b> Lygių VIP Privilegijos<br>
    2. Gausi <b>10 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 2000</b> '.$kreditaii.'<br>
4. Gausi <b> 350</b> '.$eurui.'<br>
5. Duos 400 <b>Majin scroll</b> <br>
6.Duos 400 <b> Fusion Fail</b><br>
7.Duos 200 <b> Sayan Tail</b><br>
8. Gausi <b>Money Sword</b><br>
  9. Kovų zonoje duos <b>7</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>8 Lygio VIP kaina - <b>45000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas7']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip8">Pirkti 8 lygio VIP</a></div>';
     }


}

else{

if($apie['vipas6']== '+'){
echo'<div class="up">'.$ico.'7 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>6</b> Lygių VIP Privilegijos<br>
      2. Gausi <b>5 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 1500</b> '.$kreditaii.'<br>
4. Gausi <b> 50</b> '.$eurui.'<br>
5. Duos 400 <b>Energy Stone</b> <br>
6.Duos 400 <b> Power Stone</b><br>
7.Duos 500 <b> Majin Scroll</b><br>
8.Duos 500 <b> Fusion Fail</b><br>
9. Duos 400 <b>  Sayan Tail</b><br>
  10. Kovų zonoje duos <b>6</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>7 Lygio VIP kaina - <b>30000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas6']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip7">Pirkti 7 lygio VIP</a></div>';
     }


}

else{

if($apie['vipas5']== '+'){
echo'<div class="up">'.$ico.'6 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>5</b> Lygių VIP Privilegijos<br>
  2. Gausi <b>2 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 1000</b> '.$kreditaii.'<br>
4. Gausi <b> 150</b> '.$eurui.'<br>
5. Duos 400 <b>Magic ball</b> <br>
6.Duos 600 <b> Mikroskemų</b><br>
7.Duos 200 <b> Energy Stone</b><br>
8.Duos 200 <b> Power Stone</b><br>
  9. Kovų zonoje duos <b>5</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>6 Lygio VIP kaina - <b>20000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas5']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip6">Pirkti 6 lygio VIP</a></div>';
     }


}

else{

if($apie['vipas4']== '+'){
echo'<div class="up">'.$ico.'5 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>4</b> Lygių VIP Privilegijos<br>
 2. Gausi <b>1 000 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 500</b> '.$kreditaii.'<br>
4. Gausi <b> 100</b> '.$eurui.'<br>
5. Duos 200 <b>Magic ball</b> <br>
6.Duos 300 <b> Mikroskemų</b><br>
  7. Kovų zonoje duos <b>4</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>5 Lygio VIP kaina - <b>15000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas4']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip5">Pirkti 5 lygio VIP</a></div>';
     }


}

else{


if($apie['vipas3']== '+'){
echo'<div class="up">'.$ico.'4 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b>-<b>3</b> Lygių VIP Privilegijos<br>
    2. Gausi <b>500 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 300</b> '.$kreditaii.'<br>
4. Gausi <b> 50</b> '.$eurui.'<br>
  5. Kovų zonoje duos <b>3</b>  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>4 Lygio VIP kaina - <b>10000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas3']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip4">Pirkti 4 lygio VIP</a></div>';
     }


}

else{




if($apie['vipas2']== '+'){
echo'<div class="up">'.$ico.'3 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b>1</b> ir <b>2</b> Lygio VIP Privilegijos<br>
    2. Gausi <b>150 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 120</b> '.$kreditaii.'<br>
4. Gausi <b> 30</b> '.$eurui.'<br>
  5. Kovų zonoje duos<b> 2 </b>kartus  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>



	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>3 Lygio VIP kaina -  <b>7000</b> <img src="img/bicons/vipt.png" /></b></div>';
if($apie['vipas2']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip3">Pirkti 3 lygio VIP</a></div>';
     }


}

else{

if($apie['vipas1']== '+'){
echo'<div class="up">'.$ico.'2 Lygio VIP Pirkimas</div>
<div class="meniu">
1. Visos <b> 1 Lygio VIP </b> Privilegijos<br>
   
2. Gausi <b>50 000 000 </b> '.$pinigaii.'<br>
3. Gausi <b> 60</b> '.$kreditaii.'<br>
4. Gausi <b> 10</b> '.$eurui.'<br>
  5. Kovų zonoje duos 50%  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   
   </div>
 <div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>2 Lygio VIP kaina -  <b>4000</b> <img src="img/bicons/vipt.png" /></b></div>';

if($apie['vipas1']== '+'){
echo '<div class="meniuc"> '.$ico.' <a href="?id=vip2">Pirkti 2 lygio VIP</a></div>';
     }


}

else{

echo'<div class="up">'.$ico.' 1 Lygio VIP Pirkimas</div>
<div class="meniu">
	1. Prie slapyvardžio rodys <img src="img/bicons/vip.png"> ženkliuką.<br/>
	2. Pagražintas slapyvardis <span style="background:url(http://dbzretro.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['color'].'"><b><img src="img/bicons/vip.png">'.$nick.'</b></span>.<br/>
    3. Kovų zonoje duos 15%  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>


   4. Padusimai: <b>1</b> sekundės<br/>
        5. Autokovojimas kas: <b>1</b> sekundes.<br/>
        6. Vipas <b>galios 24h</b> nuo pirkimo, bet VIP lygius galėsite keltis toliau. <br/>
	 </div><div class="meniuc"> VIP funkcijos bus pildomos ateityje.<b><br>1 Lygio VIP kaina - <b>2000</b> <img src="img/bicons/vipt.png" /> <b>1000</b> <img src="img/bicons/euro.png" /> ir 0 <img src="img/bicons/cash.png" /></b></div>';


     if(laikass((int)$apie['vip'])-time()> 0){
     echo "<div class='meniuc'> ".$ico."  Tavo <b>VIP</b> dar galios ".(laikass((int)$apie['vip']-time(),1)).". </div>";
     }
     else{
	 echo '<div class="meniuc"> '.$ico.' <a href="?id=vip1">Pirkti 1 lygio VIP</a></div>';
     }
   }
}
}
}}}}}}}}}}}
}}}}}}}}}}




		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip1'){
	top('VIP Pirkimas');
	online('VIP Pirkime');
	if($apie['vipticket'] < 1999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
		elseif($apie['cash'] < 0){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/cash.png" />!</div>';
	}
	elseif($apie['sms_litai'] < 1000){
		echo '<div class="meniuc">Nepakanka  <img src="img/bicons/euro.png" />!</div>';
	}
elseif((int)$apie['vip']-time() > 0){
	
	echo '<div class="meniuc">Tu jau esi <b>1 Lygio VIP </b>!</div>';
	
}
	
	
	else{
		$vip_time = time()+ 3600*24;
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>1 lygio VIP </b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vip='$vip_time', vipas1='+', sms_litai=sms_litai-'1000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'2000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip2'){
	top('2 Lygio VIP Pirkimas');
	online('2 Lygio VIP Pirkime');

if($apie['vipas1']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>1 Lygio VIP</b>!</div>";}
elseif($apie['vipas1']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>2 Lygio VIP </b>!</div>';
	
}

else{

	if($apie['vipticket'] < 3999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas2']== '+'){
	
	echo '<div class="meniuc">Tu jau esi <b>2 Lygio VIP </b>!</div>';
	
}
	elseif($apie['vipas2']== '-'){
	
	echo '<div class="meniuc">Tu jau esi <b>2 Lygio VIP </b>!</div>';
	
}
	
	else{
		$vip_time2 = time()+ 3600*24*7666;
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>2 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas2='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'4000', kred=kred+'60', sms_litai=sms_litai+'10', litai=litai+'50000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas1='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip3'){
	top('3 Lygio VIP Pirkimas');
	online('3 Lygio VIP Pirkime');

if($apie['vipas2']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>2 Lygio VIP</b>!</div>";}
elseif($apie['vipas2']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>3 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 6999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas3']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>3 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>3 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas3='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'7000', kred=kred+'120', sms_litai=sms_litai+'25', litai=litai+'150000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas2='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip4'){
	top('4 Lygio VIP Pirkimas');
	online('4 Lygio VIP Pirkime');

if($apie['vipas3']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>3 Lygio VIP</b>!</div>";}
elseif($apie['vipas3']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>4 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 9999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas4']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>4 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>4 Lygio VIP</b> </div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas4='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'10000', kred=kred+'300', sms_litai=sms_litai+'50', litai=litai+'500000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas3='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}


if($id == 'vip5'){
	top('5 Lygio VIP Pirkimas');
	online('5 Lygio VIP Pirkime');

if($apie['vipas4']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>4 Lygio VIP</b>!</div>";}
elseif($apie['vipas4']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>5 Lygio VIP </b>!</div>';
	
}

else{



	if($apie['vipticket'] < 14999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas5']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>5 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>5 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas5='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'15000', kred=kred+'500', sms_litai=sms_litai+'100', litai=litai+'1000000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET Magicball=Magicball+'200', Microshem=Microshem+'300' WHERE nick='$nick'")or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET vipas4='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip6'){
	top('6 Lygio VIP Pirkimas');
	online('6 Lygio VIP Pirkime');

if($apie['vipas5']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>5 Lygio VIP</b>!</div>";}
elseif($apie['vipas5']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>6 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 19999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas6']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>6 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>6 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas6='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'20000', kred=kred+'1000', sms_litai=sms_litai+'150', litai=litai+'2000000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  Magicball=Magicball+'400', Microshem=Microshem+'600', Energystone=Energystone+'200', Powerstone=Powerstone+'200' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas5='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}


if($id == 'vip7'){
	top('7 Lygio VIP Pirkimas');
	online('7  Lygio VIP Pirkime');

if($apie['vipas6']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>6 Lygio VIP</b>!</div>";}
elseif($apie['vipas6']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>7 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 29999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas7']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>7 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>7 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas7='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'30000', kred=kred+'1500', sms_litai=sms_litai+'250', litai=litai+'5000000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll+'400', Sayiantail=Sayiantail+'400', Energystone=Energystone+'500', Powerstone=Powerstone+'500', Fusionfail=Fusionfail+'400' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas6='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}


if($id == 'vip8'){
	top('8 Lygio VIP Pirkimas');
	online('8 Lygio VIP Pirkime');

if($apie['vipas7']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>7 Lygio VIP</b>!</div>";}
elseif($apie['vipas7']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>8 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 44999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas8']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>8 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>8 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas8='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'45000', kred=kred+'2000', sms_litai=sms_litai+'50', litai=litai+'10000000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  Majinsroll=Majinsroll+'600', Sayiantail=Sayiantail+'600', Fusionfail=Fusionfail+'400', Money_sword=Money_sword+'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas7='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip9'){
	top('9 Lygio VIP Pirkimas');
	online('9 Lygio VIP Pirkime');

if($apie['vipas8']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>8 Lygio VIP</b>!</div>";}
elseif($apie['vipas8']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>9 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] <69999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas9']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>9 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>9 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas9='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'70000', kred=kred+'3000', sms_litai=sms_litai+'500', litai=litai+'20000000000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas+'1000', naikinti=naikinti+'1000', angelwing=angelwing+'1000', Money_armor=Money_armor+'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas8='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip10'){
	top('10 Lygio VIP Pirkimas');
	online('10 Lygio VIP Pirkime');

if($apie['vipas9']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>9 Lygio VIP</b>!</div>";}
elseif($apie['vipas9']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>10 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 99999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas10']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>10 Lygio  VIP </b>!</div>';
} elseif ($inv['Soul'] < 2000) {
		echo '<div class="meniuc">Reikia 2000 Soul!</div>';
	}
	
	
	else{
		$timxx = time()+60*60*24*1000;

		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>10 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas10='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'100000', kred=kred+'5000', sms_litai=sms_litai+'100', litai=litai+'50000000000', bitcoin=bitcoin+'50' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  Super_amulet_item=Super_amulet_item+'500', Super_money_armor=Super_money_armor+'1', Super_money_sword=Super_money_sword+'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas9='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET bts='$timxx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET Soul=Soul-'2000' WHERE nick='$nick' ");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip11'){
	top('11 Lygio VIP Pirkimas');
	online('11 Lygio VIP Pirkime');

if($apie['vipas10']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>10 Lygio VIP</b>!</div>";}
elseif($apie['vipas10']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>11 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 179999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas11']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>11 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>11 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas11='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'180000', kred=kred+'7000', sms_litai=sms_litai+'200', litai=litai+'100000000000', bitcoin=bitcoin+'70' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  Naikinimo_amulet_item=Naikinimo_amulet_item+'3000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET vipas10='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip12'){
	top('12 Lygio VIP Pirkimas');
	online('12 Lygio VIP Pirkime');

if($apie['vipas11']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>11 Lygio VIP</b>!</div>";}
elseif($apie['vipas11']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>11 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 199999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas12']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>12 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>12 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas12='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'200000', kred=kred+'10000', sms_litai=sms_litai+'500', litai=litai+'150000000000', bitcoin=bitcoin+'100' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas11='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip13'){
	top('13 Lygio VIP Pirkimas');
	online('13 Lygio VIP Pirkime');

if($apie['vipas12']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>12 Lygio VIP</b>!</div>";}
elseif($apie['vipas12']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>12 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 299999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas13']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>13 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>13 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas13='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'300000', kred=kred+'12000', sms_litai=sms_litai+'500', litai=litai+'200000000000', bitcoin=bitcoin+'120' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas12='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip14'){
	top('14 Lygio VIP Pirkimas');
	online('14 Lygio VIP Pirkime');

if($apie['vipas13']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>13 Lygio VIP</b>!</div>";}
elseif($apie['vipas13']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>13 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 499999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas14']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>14 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>14 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas14='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'500000', kred=kred+'15000', sms_litai=sms_litai+'500', litai=litai+'250000000000', bitcoin=bitcoin+'150' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas13='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip15'){
	top('15 Lygio VIP Pirkimas');
	online('15 Lygio VIP Pirkime');

if($apie['vipas14']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>14 Lygio VIP</b>!</div>";}
elseif($apie['vipas14']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>14 Lygio VIP </b>!</div>';

} elseif ($inv['Soul'] < 5000) {
	echo '<div class="meniuc">Reikia 5000 Soul!</div>';
}
else{



	if($apie['vipticket'] < 799999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas15']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>15 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>15 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas15='+', sms_litai=sms_litai-'0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'800000', kred=kred+'20000', sms_litai=sms_litai+'500', litai=litai+'350000000000', bitcoin=bitcoin+'200' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas14='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Soul=Soul-'5000' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip16'){
	top('16 Lygio VIP Pirkimas');
	online('16 Lygio VIP Pirkime');

if($apie['vipas15']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>15 Lygio VIP</b>!</div>";}
elseif($apie['vipas16']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>16 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 1999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas16']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>16 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>16 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas16='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'2000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas15='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip17'){
	top('17 Lygio VIP Pirkimas');
	online('17 Lygio VIP Pirkime');

if($apie['vipas16']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>16 Lygio VIP</b>!</div>";}
elseif($apie['vipas16']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>16 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 4999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas17']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>17 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>17 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas17='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'5000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas16='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip18'){
	top('18 Lygio VIP Pirkimas');
	online('18 Lygio VIP Pirkime');

if($apie['vipas17']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>17 Lygio VIP</b>!</div>";}
elseif($apie['vipas17']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>17 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 9999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas18']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>18 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>18 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas18='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'10000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas17='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip19'){
	top('19 Lygio VIP Pirkimas');
	online('19 Lygio VIP Pirkime');

if($apie['vipas18']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>18 Lygio VIP</b>!</div>";}
elseif($apie['vipas18']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>18 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 14999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas19']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>19 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>19 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas19='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'15000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas18='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip20'){
	top('20 Lygio VIP Pirkimas');
	online('20 Lygio VIP Pirkime');

if($apie['vipas19']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>19 Lygio VIP</b>!</div>";}
elseif($apie['vipas19']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>19 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 24999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas20']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>20 Lygio  VIP </b>!</div>';

	} elseif ($inv['Zuvis'] < 20000) {
		echo '<div class="meniuc">Reikia 20000 žuvies!</div>';
	}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>20 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas20='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'25000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas19='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis-'20000' WHERE nick='$nick' ");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip21'){
	top('21 Lygio VIP Pirkimas');
	online('21 Lygio VIP Pirkime');

if($apie['vipas20']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>20 Lygio VIP</b>!</div>";}
elseif($apie['vipas20']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>20 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 49999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas21']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>21 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>21 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas21='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'50000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas20='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip22'){
	top('22 Lygio VIP Pirkimas');
	online('22 Lygio VIP Pirkime');

if($apie['vipas21']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>21 Lygio VIP</b>!</div>";}
elseif($apie['vipas21']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>21 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 99999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas22']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>22 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>22 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas22='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'100000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas21='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip23'){
	top('23 Lygio VIP Pirkimas');
	online('23 Lygio VIP Pirkime');

if($apie['vipas22']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>22 Lygio VIP</b>!</div>";}
elseif($apie['vipas22']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>22 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 149999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas23']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>23 Lygio  VIP </b>!</div>';

} elseif ($inv['Malkos'] < 20000) {
		echo '<div class="meniuc">Reikia 20000 malkų!</div>';
	}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>23 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas23='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'150000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas22='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Malkos=Malkos-'20000' WHERE nick='$nick' ");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}
if($id == 'vip24'){
	top('24 Lygio VIP Pirkimas');
	online('24 Lygio VIP Pirkime');

if($apie['vipas23']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>23 Lygio VIP</b>!</div>";}
elseif($apie['vipas23']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>23 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 249999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas24']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>24 Lygio  VIP </b>!</div>';
	
}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>24 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas24='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'250000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas23='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}

if($id == 'vip25'){
	top('25 Lygio VIP Pirkimas');
	online('25 Lygio VIP Pirkime');

if($apie['vipas24']< '+'){
     echo "<div class='meniuc'>Tu neturi <b>24 Lygio VIP</b>!</div>";}
elseif($apie['vipas24']== '-'){
	
	echo '<div class="meniuc">Tu jau pirkai <b>24 Lygio VIP </b>!</div>';
	
}
else{



	if($apie['vipticket'] < 499999999){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
	}
elseif($apie['vipas25']=='+'){
	
	echo '<div class="meniuc">Tu jau esi <b>25 Lygio  VIP </b>!</div>';
	
}elseif ($inv['Soul'] < 5000) {
		echo '<div class="meniuc">Reikia 5000 Soul!</div>';
	}
	
	
	else{
		$timxx = time()+60*60*24*1000;    
	
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>25 Lygio VIP</b>!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET vipas25='+', sms_litai=sms_litai+'500' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'500000000' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE zaidejai SET vipas24='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE inv SET Soul=Soul-'5000' WHERE nick='$nick' ");
	}
}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}


if($id == 'vip26'){
	top('26 Lygio VIP Pirkimas');
	online('26 Lygio VIP Pirkime');

	if($apie['vipas25']< '+'){
		echo "<div class='meniuc'>Tu neturi <b>25 Lygio VIP</b>!</div>";}
	elseif($apie['vipas26']== '-'){

		echo '<div class="meniuc">Tu jau pirkai <b>26 Lygio VIP </b>!</div>';

	}
	else{



		if($apie['vipticket'] < 799999999){
			echo '<div class="meniuc">Nepakanka  <img src="img/bicons/vipt.png" />!</div>';
		}
		elseif($apie['vipas26']=='+'){

			echo '<div class="meniuc">Tu jau esi <b>26 Lygio  VIP </b>!</div>';

		}


		else{
			$timxx = time()+60*60*24*1000;

			echo '<div class="meniuc">Nusipirkai sėkmingai <b>25 Lygio VIP</b>!</div>';
			mysqli_query($conn,"UPDATE zaidejai SET vipas26='+', sms_litai=sms_litai+'15000' WHERE nick='$nick'");
			mysqli_query($conn,"UPDATE zaidejai SET  vipticket=vipticket-'700000000' WHERE nick='$nick'");

			mysqli_query($conn,"UPDATE zaidejai SET vipas25='-', sms_litai=sms_litai-'0' WHERE nick='$nick'");

			mysqli_query($conn,"UPDATE  inv SET viplvl=viplvl+'1' WHERE nick='$nick'");
		}
	}
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","VIP Pirkimas");
	navigacija($g_n);
}



if($id == "uvip"){
	 online('Perka Ultimate VIP');
   top('Ultimate VIP Pirkimas');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';

echo'<div class="up">'.$ico.' Ultimate VIP Pirkimas</div>
<div class="meniu">
	1. Prie slapyvardžio rodys <img src="img/bicons/vip.png"> ženkliuką.<br/>
	2. Pagražintas slapyvardis <span style="background:url(http://dbaf.lt/img/sparks.gif);color:'.$n['color'].';text-shadow:0px 0px 10px '.$n['color'].'"><b><img src="img/bicons/vip.png">'.$nick.'</b></span>.<br/>
    3. Kovų zonoje duos 3 kartus  daugiau   <img src="img/bicons/pinigai.png" /> ir <img src="img/bicons/exp.png" />   <br/>
    4. Padusimai: <b>1</b> sekundės<br/>
        5. Autokovojimas kas: <b>1</b> sekundes.<br/>
	 </div><div class="meniuc"> Ultimate VIP funkcijos bus pildomos ateityje.<b><br>Ultimate VIP kaina <b>400</b> <img src="img/bicons/euro.png" />/Savaitei</b></div>';
     
     if(laikass($apie['uvip']-time(),1) > 1){
     echo "<div class='meniuc'> ".$ico."  Tavo <b>Ultimate VIP</b> dar galios ".(laikass($apie['uvip']-time(),1)).". </div>";
     }
     else{
	 echo '<div class="meniuc"> '.$ico.' <a href="?id=uvip2">Pirkti Ultimate VIP</a></div>';
     }
     
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","Ultimate VIP Pirkimas");
	navigacija($g_n);
}










if($id == 'uvip2'){
	top('Ultimate VIP Pirkimas');
	online('Ultimate VIP Pirkime');
	if($apie['sms_litai'] < 399){
		 echo '<div class="meniuc">Nepakanka  <img src="img/bicons/euro.png" />!</div>';
	}
elseif((int)$apie['uvip']-time() > 0){
	
	echo '<div class="meniuc">Tu jau esi <b>Ultimate VIP </b>!</div>';
	
}
	
	
	else{
		$vip_time = time()+ 3600*24*7;
		 echo '<div class="meniuc">Nusipirkai sėkmingai <b>Ultimate VIP Narystę</b> savaitei!</div>';
		mysqli_query($conn,"UPDATE zaidejai SET uvip='$vip_time', sms_litai=sms_litai-'400' WHERE nick='$nick'");
	}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php?","Atgal","Ultimate VIP Pirkimas");
	navigacija($g_n);
}
foot();
?>
