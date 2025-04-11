<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR);
$veikejas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejas WHERE nick='$nick'"));
if($id == ""){
	 online('Leidžia eurus');
   top('Eurai');
    echo '<div class="meniuc">Jūsų saskaitoje: <b>'.round($sms_litai,2).'</b>   <img src="img/bicons/euro.png" />   </div>

    
 
    <div class="meniu">';
	if ((int)$apie['vip']-time() < 0) {
		echo'
		'.$ico.' <a href="eurai.php?id=vip_privilegija">VIP privilegija</a></br>';
	} else {
		$timestamp = $apie['vip'];
		$dt = new DateTime("@$timestamp");
		$timezone = new DateTimeZone('Europe/Vilnius');
		$dt->setTimezone($timezone);
		echo '
		'.$ico.'<span>VIP Privelegija</span> (iki: ' . $dt->format('m-d H:i'). ')
		</br>';
	}

	echo'
		'.$ico.' <a href="eurai.php?id=krd">Kreditų pirkimas</a></br>
    '.$ico.' <a href="eurai.php?id=shop&ka=pinigai">Pinigų pirkimas</a></br>
	'.$ico.' <a href="eurai.php?id=vipticket">VIP TICKET pirkimas</a></br>
    '.$ico.' <a href="eurai.php?id=shop&ka=jega">Jėgos pirkimas</a></br>
	'.$ico.' <a href="eurai.php?id=shop&ka=gynyba">Gynybos pirkimas</a></br>
	'.$ico.' <a href="eurai.php?id=shop&ka=color">Keisti Nick spalvą</a></br>
';
	
if($apie['duxpx']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dgxp">Daugiau 
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>';
    if($apie['duxpx']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["duxpx"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['duxpx']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dgxp">Daugiau 
 <img src="img/bicons/pinigai.png" /> ,  <img src="img/bicons/exp.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}

if($apie['duxdaig']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=daiktai">Didesnis daiktų gavimas </a>';
    if($apie['duxdaig']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["duxdaig"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['duxdaig']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=daiktai">Didesnis daiktų gavimas </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
echo'
     '.$ico.' <a href="eurai.php?id=unikalus"><font color="red"><b>Unikalus veikejai</b></font></a></br>';

if($apie['dgeur']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dge">Daugiau 2x 
 <img src="img/bicons/euro.png" /> </a>';
    if($apie['dgeur']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["dgeur"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['dgeur']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dge">Daugiau 2x 
 <img src="img/bicons/euro.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
if($apie['duxaux']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dga">Daugiau 2x 
 <img src="img/bicons/auxo.png" /> </a>';
    if($apie['duxaux']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["duxaux"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['duxaux']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dga">Daugiau 2x 
 <img src="img/bicons/auxo.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
      
  if($apie['duxkrd']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dgas">Daugiau 2x 
 <img src="img/bicons/credit.png" /> </a>';
    if($apie['duxkrd']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["duxkrd"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['duxkrd']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dgas">Daugiau 2x 
 <img src="img/bicons/credit.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
if($apie['dgax']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dgax">Daugiau 3x 
 <img src="img/bicons/auxo.png" /> </a>';
    if($apie['dgax']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["dgax"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['dgax']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dgax">Daugiau 3x 
 <img src="img/bicons/auxo.png" /> </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
      echo'  
 
	  '.$ico.' <a href="?id=rep">Nusiimt -rep<b> [1   <img src="img/bicons/euro.png" />  ]</b></a></br>
	
	   	   '.$ico.' <a href="?id=secret">Informacijos užsislaptinimas[1000 <img src="img/bicons/euro.png" />   ]</a></br>
	   	   	   	   '.$ico.' <a href="?id=team">Komandos žaidėjų didinimas</a></br>
  	   	   '.$ico.' <a href="?id=veikatstatymas"><font color="red"><b>Veikėjo atstatymas</b></font></a></br>
';

if($apie['dglg']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=dglg">Daugiau  lygio taškų </a>';
    if($apie['dglg']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["dglg"]-time(), 1).'</b></font>)<br>';
}
}
if($apie['dglg']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=dglg">Daugiau lygio taškų </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
if((int)$apie['kasimas2x']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=rudos">Daugiau iškasamų rūdų </a>';
    if((int)$apie['kasimas2x']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["kasimas2x"]-time(), 1).'</b></font>)<br>';
}
}
if((int)$apie['kasimas2x']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=rudos">Daugiau iškasamų rūdų </a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}
if((int)$apie['kasimolvl2x']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=kasimo">Daugiau kasimo LVL</a>';
    if((int)$apie['kasimolvl2x']-time() > 0){
echo'
(<font color="green"><b>'.laikas($apie["kasimolvl2x"]-time(), 1).'</b></font>)<br>';
}
}
if((int)$apie['kasimolvl2x']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=kasimo">Daugiau kasimo LVL</a>(<font color="red"><b>Neužsakyta</b></font>)<br>';

}

if((int)$apie['bts']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=bt"><b>BitCoin Licenzija</b> </a>(<font color="green"><b>Nupirkta</b></font>)<br>';

}
if((int)$apie['bts']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=bt"><b>BitCoin Licenzija</b> </a>(<font color="red"><b>Nenupirkta</b></font>)<br>';

}
	
if((int)$apie['pliusaib']-time() > 0){
echo'
'.$ico.' <a href="eurai.php?id=pliusai"><b>Pliusų Licenzija</b> </a>(<font color="green"><b>Nupirkta</b></font>)<br>';

}
if((int)$apie['pliusaib']-time() < 0){
echo'
'.$ico.' <a href="eurai.php?id=pliusai"><b>Pliusų Licenzija</b> </a>(<font color="red"><b>Nenupirkta</b></font>)<br>';

}
echo'
	</div>
 
     
    ';

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Eurai");
	navigacija($g_n);
	
	
		
}
if($ID == 'tikrinimas'){
	top('Kovinės galios pirkimas');
	
	echo'
	<div class="meniuc">
				 Ar tikrai pirksite?</br>
				 <a href="?id='.$id.'"><font color="blue">Taip</font></a>  <a href="?"><font color="red">Ne</font></a>
	</div>		';
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Kovinės galios pirkimas");
	navigacija($g_n);
	
}
elseif($id == "rep"){
    online('Leidžia eurus');
	top('Reputacijos šalinimas');
	echo'<div class="meniuc">Už <b>1</b>  <img src="img/bicons/euro.png" /> galite nusimt -rep</div>
	
	<div class="meniu"> '.$ico.' <a href="?id=rep2">Nusiimti</a></div>
	
	
	
	';
	

     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Reputacijos šalinimas");
	navigacija($g_n);
	
	
	
}

elseif($ka == "color2"){
       online('Nick spalva');
       top('Nick spalva');
        if(isset($_POST['submit'])){
            $color = post($_POST['color']);
           
            if(empty($color)){
                echo '<div class="meniuc">Paliktas tuščias laukelis!</div>';
           
            }
	if(($apie['sms_litai']) < '500'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
            else{
                echo '<div class="meniuc">Pasikeitei vardo spalvą  už <b>500</b>'.$eurui.'</div>';
                mysqli_query($conn,"UPDATE zaidejai SET  color='$color', sms_litai=sms_litai-'500' WHERE nick='$nick'");
            }

        }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai","Nick spalva");
	navigacija($g_n);
}
        elseif($ka == "color"){
        	top('Nick spalva');
        	online('Nick spalva');
         echo '<div class="meniuc">'.smile('Pasirink savo mėgstamą spalvą <br>Kaina <b>500</b>'.$eurui.' ').'</div>';
        echo '<div class="meniu">
        <form action="?id=shop&ka=color2" method="post"/>
        Pasirinkite nick spalvą:<br /><input type="color" name="color"/><br />
          
        <input type="submit" name="submit" value="Keisti"/></form>
        </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai","Nick spalva");
	navigacija($g_n);
    }

elseif($id == "rep2"){
	top('Reputavcijos šalinimas');
    online('Litai');
	if($apie['sms_litai'] < 0){
				echo'<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div>';
			
		
	}else{
	
	echo'<div class="meniuc">Nusiemiai -rep</div>
	';
	mysqli_query($conn,"UPDATE zaidejai SET rep_neig='0',sms_litai=sms_litai-'1' WHERE nick='$nick'")or die(mysqli_error());
	}
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Reputacijos šalinimas");
	navigacija($g_n);
	
	
	
}

	elseif($id == "veikatstatymas"){
				top('Veikėjo atstatymas');
echo'<div class="meniuc">Kaskart atkūrdami savo veikėją turėsite mokėti 500 '.$eurui.' daugiau!</div>';
				echo'	<div class="meniu" style="text-align: left;">
<table><tr><td>
	<img src="img/veikejai/'.$veikejas['veikejas'].'-0.png">

	</td>
		<td>
	 Veikėjas: <b> '.$veikejas['veikejas'].'</b><br/>

 Veikėjo atstatymo kaina:<b> '.$veikejas['kiek'].'  '.$eurui.'</b><br/>
		</td>
		</tr>
		</table> </div>	
		
		<div class="meniuc"><b><a href="eurai.php?id=veikatstatymas2">Atstatyti mano veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Veikėjo atstatymas");
	navigacija($g_n);

}
elseif($id == "veikatstatymas2"){
	top('Veikėjo atstatymas');
    online('Veikėjo atstatymas');
	if($apie['sms_litai'] < $veikejas[kiek]){
				echo'<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div>';
			
		
	}else{
	
	echo'<div class="meniuc">	<img src="img/veikejai/'.$veikejas['veikejas'].'-0.png"> </div>
<div class="meniuc"><b>Atstatei savo veikėjo būseną į pradinę sėkmingai!</b></div>
	';

	mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$veikejas[kiek]' WHERE nick='$nick'")or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET veikejas='$veikejas[veikejas]', trans='0' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE veikejas SET kiek=kiek+'500' WHERE nick='$nick'")or die(mysqli_error());

	}
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Veikėjo atstatymas");
	navigacija($g_n);
	
	
	
}


elseif($id == "goku gods"){
	 online('Leidžia eurus');
	 top('Goku gods');
	echo'
	<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Goku gods</b><br/>
'.$ico2.' Jėga:<b> +250%</b><br/>
'.$ico2.' Gynyba:<b> +250%</b><br/>
'.$ico2.' Gyvybes:<b> +250%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">1000,00 Eurų.</b><br/></font>
		</td>
		<td>
		<img src="img/veikejai/Goku Gods-0.png">
		</td>
		</tr>
		</table> </div>
		
		
		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_goka">Pirkti šį veikėją</a></b></div>	';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Goku gods");
	navigacija($g_n);
	
}
					
			elseif($id == "goku gods2"){
				top('Goku gods');
				echo'	<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Goku gods ssj3</b><br/>
'.$ico2.' Jėga:<b> +30%</b><br/>
'.$ico2.' Gynyba:<b> +30%</b><br/>
'.$ico2.' Gyvybes:<b> +30%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 400,00 Eurų.</b><br/>
	</td>
		<td>
		<img src="img/veikejai/Super goku gods-0.png">
		</td>
		</tr>
		</table> </div>	
		
		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_goka2">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Goku gods");
	navigacija($g_n);

}
elseif($id == "vegeta gods"){
	 online('Leidžia eurus');
	 top('Vegeta gods');
	echo'
<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Vegeta Gods</b><br/>
'.$ico2.' Jėga:<b> +200%</b><br/>
'.$ico2.' Gynyba:<b> +200%</b><br/>
'.$ico2.' Gyvybes:<b> +200%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green"> 800,00 Eurų.</b><br/></font>
</td>
		<td>
		<img src="img/veikejai/Vegeta gods-0.png">
		</td>
		</tr>
		</table> </div>	
		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_vegeta">Pirkti šį veikėją</a></b></div>
		';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Vegeta gods");
	navigacija($g_n);
	}
		elseif($id == "vegeta gods2"){
			top('Vegeta gods');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Vegeta gods ssj3</b><br/>
'.$ico2.' Jėga:<b> +25%</b><br/>
'.$ico2.' Gynyba:<b> +25%</b><br/>
'.$ico2.' Gyvybes:<b> +25%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 300,00 Eurų.</b><br/>
		</td>
		<td>
		<img src="img/veikejai/Vegeta gods ssj3-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_vegeta2">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Vegeta gods");
	navigacija($g_n);

}
			elseif($id == "xicor"){
				top('Xicor');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Xicor</b><br/>
'.$ico2.' Jėga:<b> +10%</b><br/>
'.$ico2.' Gynyba:<b> +10%</b><br/>
'.$ico2.' Gyvybes:<b> +10%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 80,00 Eurų.</b><br/>
		</td>
		<td>
		<img src="img/veikejai/Xicor-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_xicor">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "xicor");
	navigacija($g_n);


}
			elseif($id == "gotenks"){
				top('Gotenks');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gotenks super saiyan 4</b><br/>
'.$ico2.' Jėga:<b> +5%</b><br/>
'.$ico2.' Gynyba:<b> +5%</b><br/>
'.$ico2.' Gyvybes:<b> +5%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 40,00 Eurų.</b><br/>

	</td>
		<td>
		<img src="img/veikejai/Gotenks saiyan-0.png">
		</td>
		</tr>
		</table> </div>	

		
<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_gotenks">Pirkti šį veikėją</a></b></div>
		
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gotenks");
	navigacija($g_n);


}
				elseif($id == "android18"){
					top('Android18');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Super android18</b><br/>
'.$ico2.' Jėga:<b> +3%</b><br/>
'.$ico2.' Gynyba:<b> +3%</b><br/>
'.$ico2.' Gyvybes:<b> +3%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 10,00 Eurų.</b><br/>
		</td>
		<td>
		<img src="img/veikejai/Super17.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_android18">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Android18");
	navigacija($g_n);


}
					elseif($id == "evil vegeta"){
						top('Evil vegeta');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Evil vegeta</b><br/>
'.$ico2.' Jėga:<b> +50%</b><br/>
'.$ico2.' Gynyba:<b> +50%</b><br/>
'.$ico2.' Gyvybes:<b> +50%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 700,00 Eurų.</b><br/>

		<td>
		<img src="img/veikejai/Evil vegeta-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_evil_vegeta">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "evil vegeta");
	navigacija($g_n);


}
						elseif($id == "evil vegeta gods"){
							top('Evil vegeta gods');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Evil vegeta gods</b><br/>
'.$ico2.' Jėga:<b> +70%</b><br/>
'.$ico2.' Gynyba:<b> +70%</b><br/>
'.$ico2.' Gyvybes:<b> +70%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 1000,00 Eurų.</b><br/>

		<td>
		<img src="img/veikejai/Evil vegeta gods-0.png">
		</td>
		</tr>
		</table> </div>	

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_evil_vegeta_gods">Pirkti šį veikėją</a></b></div>
		

		
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Evil gohan gods");
	navigacija($g_n);


} 
					elseif($id == "evil goku"){
						top('Evil goku');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Evil goku</b><br/>
'.$ico2.' Jėga:<b> +60%</b><br/>
'.$ico2.' Gynyba:<b> +60%</b><br/>
'.$ico2.' Gyvybes:<b> +60%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 800,00 Eurų.</b><br/>

		<td>
		<img src="img/veikejai/Evil goku-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_goku">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Evil goku");
	navigacija($g_n);


}
elseif($id == "cus"){
						top('Cus');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Cus</b><br/>
'.$ico2.' Jėga:<b> +4000%</b><br/>
'.$ico2.' Gynyba:<b> +4000%</b><br/>
'.$ico2.' Gyvybes:<b> +4000%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 40000,00 <img src="img/bicons/euro.png" />
ir

<font color="red"> <b>50000 Angelo Sparnų</b></font>
 <br></b>
'.$ico2.' Unikalios savybės:<b> <font color="green">  iš kovų gauna 5 kart daugiau lygio taškų!  </b><br/></font>
</b><br/>
'.$ico2.' Papildoma:<b><font color="green"> Bei 2 kart daugiau daiktų!</b><br/></font>
		<td>
		<img src="img/veikejai/Cus-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_cus">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Cus");
	navigacija($g_n);


}

elseif($id == "arack"){
						top('Arack');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Arack</b><br/>
'.$ico2.' Jėga:<b> +3500%</b><br/>
'.$ico2.' Gynyba:<b> +3500%</b><br/>
'.$ico2.' Gyvybes:<b> +3500%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 30000,00 <img src="img/bicons/euro.png" />
ir

<font color="red"> <b>40000 Naikinimo galios</b></font>
 <br></b>
'.$ico2.' Unikalios savybės:<b> <font color="green">  iš kovų gauna 3 kart daugiau <img src="img/bicons/euro.png" /> ,  <img src="img/bicons/auxo.png" /> ,  <img src="img/bicons/credit.png" />  </b></font>
</b><br>
'.$ico2.' Papildoma:<b><font color="green"> Bei 2 kart <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /></b><br/></font>
		<td>
		<img src="img/veikejai/Arack-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_arack">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Arack");
	navigacija($g_n);


}


elseif($id == "gokas20x"){
						top('Gokas SSJGB Kaioken 20x');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gokas SSJGB Kaioken 20x</b><br/>
'.$ico2.' Jėga:<b> +3000%</b><br/>
'.$ico2.' Gynyba:<b> +3000%</b><br/>
'.$ico2.' Gyvybes:<b> +3000%</b><br/>
'.$ico2.' Veikėjo kaina:<font color="green">  <b> 20000,00 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>145000 Kario tobulėjimo</b></font><br>

'.$ico2.' Unikali savybė:  <font color="green"> <b> iš kovų gauna 3x daugiau  <img src="img/bicons/credit.png" />,
<img src="img/bicons/euro.png" />
 </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_gokas20x">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gokas SSJGB Kaioken 20x");
	navigacija($g_n);


}
elseif($id == "mosco"){
						top('Mosco');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Mosco</b><br/>
'.$ico2.' Jėga:<b> +2500%</b><br/>
'.$ico2.' Gynyba:<b> +2500%</b><br/>
'.$ico2.' Gyvybes:<b> +2500%</b><br/>
'.$ico2.' Veikėjo kaina: <font color="green">     <b> 14,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>25000 Naikinimo galios</b></font><br>
'.$ico2.' Unikali savybė:  <font color="green">    <b> iš kovų gauna 5 kart daugiau <img src="img/bicons/pinigai.png" />    </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Mosco-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_mosco">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Mosco");
	navigacija($g_n);


}

elseif($id == "cukatail"){
						top('Cukatail');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Cukatail</b><br/>
'.$ico2.' Jėga:<b> +5000%</b><br/>
'.$ico2.' Gynyba:<b> +5000%</b><br/>
'.$ico2.' Gyvybes:<b> +5000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 100,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>100,000 Angelo sparnų</b></font></small><br>
'.$ico2.' Unikali savybė: <small> <font color="green">    <b> iš kovų gauna 7 kart daugiau <img src="img/bicons/pinigai.png" />,   <img src="img/bicons/exp.png" />  </b><br/></font></small>
</b><br/>

		<td>
		<img src="img/veikejai/Cukatail-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_cukatail">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Cukatail");
	navigacija($g_n);


}
elseif($id == "gokasultra"){
						top('Gokas Ultra Instinct');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b><small>Gokas Ultra Instinct</small></b><br/>
'.$ico2.' Jėga:<b> +6000%</b><br/>
'.$ico2.' Gynyba:<b> +6000%</b><br/>
'.$ico2.' Gyvybes:<b> +6000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 140,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>120,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 10 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br/>

		<td>
		<img src="img/veikejai/Gokas Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_gokasultra">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gokas Ultra Instinct");
	navigacija($g_n);


}
elseif($id == "gokasultram"){
						top('Gokas Mastered Ultra Instinct');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Gokas Mastered Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +7000%</b><br/>
'.$ico2.' Gynyba:<b> +7000%</b><br/>
'.$ico2.' Gyvybes:<b> +7000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 200,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>150,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 15 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small>Iš kovų duoda <b>3 kartus daugiau</b> daiktų</small>

		<td>
		<img src="img/veikejai/Gokas Mastered Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_gokasultram">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gokas Mastered Ultra Instinct");
	navigacija($g_n);


}
elseif($id == "toppo"){
						top('Toppo');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Toppo</b></small><br/>
'.$ico2.' Jėga:<b> +8000%</b><br/>
'.$ico2.' Gynyba:<b> +8000%</b><br/>
'.$ico2.' Gyvybes:<b> +8000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 240,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>200,000 Naikinimo galios</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 20 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small>Iš kovų duoda <b> 3 kartus daugiau</b> Drakono rutulių!</small>

		<td>
		<img src="img/veikejai/Toppo-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_toppo">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Toppo");
	navigacija($g_n);


}

elseif($id == "jirenm"){
						top('Max Form Jiren');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Jiren</b></small><br/>
'.$ico2.' Jėga:<b> +9000%</b><br/>
'.$ico2.' Gynyba:<b> +9000%</b><br/>
'.$ico2.' Gyvybes:<b> +9000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 300,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>250,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 25 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small>Iš kovų pradeda kristi <b>Juodieji drakono rutuliai</b>!</small>

		<td>
		<img src="img/veikejai/Max Form Jiren-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_jirenm">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Jiren");
	navigacija($g_n);


}

elseif($id == "gohanasultra"){
						top('Gohanas Ultra Instinct');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Gohanas Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +10000%</b><br/>
'.$ico2.' Gynyba:<b> +10000%</b><br/>
'.$ico2.' Gyvybes:<b> +10000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 700,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>500,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 75 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small<b>Nėra!</b>Nes gauna daug daugiau pinigų!</b>!</small>

		<td>
		<img src="img/veikejai/Gohanas Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_gohanultra">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gohanas Ultra");
	navigacija($g_n);


}

elseif($id == "vegetaultra"){
						top('Vegeta Ultra Instinct');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Vegeta Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +12000%</b><br/>
'.$ico2.' Gynyba:<b> +12000%</b><br/>
'.$ico2.' Gyvybes:<b> +12000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 1,000,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>1,000,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 100 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small>Iš kovų gauna 3x<b>Juodųjų drakono rutulių</b>!</small>

		<td>
		<img src="img/veikejai/Vegeta Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_vegetaultra">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Vegeta Ultra");
	navigacija($g_n);


}
elseif($id == "vegitoultra"){
						top('Vegito Ultra Instinct');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <small><b>Vegito Ultra Instinct</b></small><br/>
'.$ico2.' Jėga:<b> +15000%</b><br/>
'.$ico2.' Gynyba:<b> +15000%</b><br/>
'.$ico2.' Gyvybes:<b> +15000%</b><br/>
'.$ico2.' Veikėjo kaina: <small><font color="green">     <b> 2,000,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>3,000,000 Kario tobulėjimo</b></font></small><br>
'.$ico2.' Unikali savybė:  <small><font color="green">    <b> iš kovų gauna 150 kart daugiau <img src="img/bicons/pinigai.png" />,  <img src="img/bicons/exp.png" /> </b><br/></font></small>
</b><br>'.$ico2.' Bonusas: <small>Iš kovų gauna 5x<b> Mikroskemų</b>!</small>

		<td>
		<img src="img/veikejai/Vegito Ultra Instinct-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_vegitoultra">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Vegito Ultra");
	navigacija($g_n);


}


elseif($id == "quitela"){
						top('Quitela');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Quitela</b><br/>
'.$ico2.' Jėga:<b> +2000%</b><br/>
'.$ico2.' Gynyba:<b> +2000%</b><br/>
'.$ico2.' Gyvybes:<b> +2000%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">   10000,00 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>15000 Naikinimo galios</b></font><br>
'.$ico2.' Unikali savybė: <font color="green">    <b> iš kovų gauna 5 kart daugiau <img src="img/bicons/exp.png" />   </b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Quitela-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_quitela">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Quitela");
	navigacija($g_n);


}





elseif($id == "goldfryzas"){
						top('Gold Fryzas');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gold Fryzas</b><br/>
'.$ico2.' Jėga:<b> +150%</b><br/>
'.$ico2.' Gynyba:<b> +150%</b><br/>
'.$ico2.' Gyvybes:<b> +150%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 600,00 <img src="img/bicons/euro.png" /> 
</b><br/>

		<td>
		<img src="img/veikejai/fryza-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_goldfryzas">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gold Fryzas");
	navigacija($g_n);


}


elseif($id == "vadose"){
						top('Vadose');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>Vadosė</b><br/>
'.$ico2.' Jėga:<b> +1200%</b><br/>
'.$ico2.' Gynyba:<b> +1200%</b><br/>
'.$ico2.' Gyvybes:<b> +1200%</b><br/>
'.$ico2.' Veikėjo kaina:<font color="green">    <b> 5000,00 <img src="img/bicons/euro.png" /> </b>
ir

<font color="red"> <b>10000 Angelo Sparnų</b></font>
<br></font>
'.$ico2.' Unikali savybė:<font color="green">    <b> iš kovų gauna 2 kart daugiau daiktų nei kiti!</b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Vadose-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_vadose">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Vadose");
	navigacija($g_n);


}

elseif($id == "champa"){
						top('Champa');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Champa</b><br/>
'.$ico2.' Jėga:<b> +850%</b><br/>
'.$ico2.' Gynyba:<b> +850%</b><br/>
'.$ico2.' Gyvybes:<b> +850%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">3000,00 <img src="img/bicons/euro.png" /> </font>
ir

<font color="red"> <b>5000 Naikinimo galios</b></font>
</b><br/>

		<td>
		<img src="img/veikejai/Champa-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_champa">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Champa");
	navigacija($g_n);


}

elseif($id == "mbuu"){
						top('Majin BUU');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Majin BUU</b><br/>
'.$ico2.' Jėga:<b> +30%</b><br/>
'.$ico2.' Gynyba:<b> +30%</b><br/>
'.$ico2.' Gyvybes:<b> +30%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">100,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Majin Buu-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_mbuu">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Majin BUU");
	navigacija($g_n);


}


elseif($id == "baby"){
						top('Baby');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Baby</b><br/>
'.$ico2.' Jėga:<b> +50%</b><br/>
'.$ico2.' Gynyba:<b> +50%</b><br/>
'.$ico2.' Gyvybes:<b> +50%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">  200,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Baby Vegeta-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_baby">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Baby");
	navigacija($g_n);


}


elseif($id == "super17"){
						top('Super Android 17');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Super Android 17</b><br/>
'.$ico2.' Jėga:<b> +75%</b><br/>
'.$ico2.' Gynyba:<b> +75%</b><br/>
'.$ico2.' Gyvybes:<b> +75%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">300,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Super Android 17-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_s17">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Super Android 17");
	navigacija($g_n);


}



elseif($id == "goldenbaby"){
						top('Gold Ozaru Baby');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Gold Ozaru Baby</b><br/>
'.$ico2.' Jėga:<b> +100%</b><br/>
'.$ico2.' Gynyba:<b> +100%</b><br/>
'.$ico2.' Gyvybes:<b> +100%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">400,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Gold Ozaru Baby-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_goldozarub">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gold Ozaru Baby");
	navigacija($g_n);


}

elseif($id == "goldfryza"){
						top('MAX Power Gold Fryzas');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b>MAX Power Gold Fryzas</b><br/>
'.$ico2.' Jėga:<b> +500%</b><br/>
'.$ico2.' Gynyba:<b> +500%</b><br/>
'.$ico2.' Gyvybes:<b> +500%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">   2,000<img src="img/bicons/euro.png" /> 
</b><br/></font>

		<td>
		<img src="img/veikejai/MAX Power Gold Fryzas-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_maxfryzas">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "MAX Power Gold Fryzas");
	navigacija($g_n);


}

elseif($id == "jiren"){
						top('JIREN');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> JIREN</b><br/>
'.$ico2.' Jėga:<b> +1500%</b><br/>
'.$ico2.' Gynyba:<b> +1500%</b><br/>
'.$ico2.' Gyvybes:<b> +1500%</b><br/>
'.$ico2.' Veikėjo kaina:<font color="green"><b> 6,000 <img src="img/bicons/euro.png" /> </b></font>
ir

<font color="red"> <b>12500 Kario tobulėjimo</b></font><br>
'.$ico2.' Unikali savybė: <font color="green">   <b> iš kovų gauna 3 kart daugiau                
<img src="img/bicons/pinigai.png" /> , <img src="img/bicons/exp.png" /></b><br/></font>
</b><br/>

		<td>
		<img src="img/veikejai/Jiren-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_jiren">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "JIREN");
	navigacija($g_n);


}


elseif($id == "hit"){
						top('HITAS');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> HITAS</b><br/>
'.$ico2.' Jėga:<b> +350%</b><br/>
'.$ico2.' Gynyba:<b> +350%</b><br/>
'.$ico2.' Gyvybes:<b> +350%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">1,400,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Hitas-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_hit">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "HITAS");
	navigacija($g_n);


}


elseif($id == "kaba"){
						top('Kaba');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Kaba</b><br/>
'.$ico2.' Jėga:<b> +10%</b><br/>
'.$ico2.' Gynyba:<b> +10%</b><br/>
'.$ico2.' Gyvybes:<b> +10%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">40,00 <img src="img/bicons/euro.png" /> </font>
</b><br/>

		<td>
		<img src="img/veikejai/Kaba-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_kaba">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Kaba");
	navigacija($g_n);


}

elseif($id == "mageta"){
						top('Botamo');
echo'
					<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Botamo</b><br/>
'.$ico2.' Jėga:<b> +20%</b><br/>
'.$ico2.' Gynyba:<b> +20%</b><br/>
'.$ico2.' Gyvybes:<b> +20%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">60,00 <img src="img/bicons/euro.png" /> </font>
</b>
<br/>

		<td>
		<img src="img/veikejai/Botamo-0.png">
		</td>
		</tr>
		</table> </div>	

		

		<div class="meniu">'.$ico.' <b><a href="eurai.php?id=perku_mageta">Pirkti šį veikėją</a></b></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Botamo");
	navigacija($g_n);


}




/*
elseif($id == 'mod1444'){
	top('1lygio moderatorius');
	echo'
	
	<div class="meniu">
'.$ico2.'	 Žaidėjo baninimas</br>
'.$ico2.' Pervedimų logas</br>
'.$ico2.' Išvalyti pokalbius</br>
'.$ico2.' Išvalyti topicą</div>
	<div class="meniu">
'.$ico.' <a href="?id=perku_mod1">Pirkti</a>	
	
	</div>
	';
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "1 lygio moderatorius");
	navigacija($g_n);
	
	
	
}
elseif($id == 'mod244'){
	top('2 lygio moderatorius');
	echo'
	
	<div class="meniu">
'.$ico2.'Gali naudotis 1 lygio moderatiriaus meniu </br>
'.$ico2.'Kurti balsavimą</br>
'.$ico2.'Nuimti baną
	</div><div class="meniu">
'.$ico.' <a href="?id=perku_mod2">Pirkti</a>	
	
	</div>
	';
	     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "2 lygio moderatorius");
	navigacija($g_n);
	
	
	
	
}
elseif($id == 'mod3444'){
	top('3 lygio moderatorius');
	echo'
	
	<div class="meniu">
'.$ico2.'Gali naudotis 1 lygio  ir 2 lygio moderatoriaus meniu </br>
'.$ico2.'Skaityti žaidėjų pm</br>
'.$ico2.'Nuimti modą
	</div><div class="meniu">
'.$ico.' <a href="?id=perku_mod3">Pirkti</a>	
	
	</div>
	';
	   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "3 lygio moderatorius");
	navigacija($g_n);
	
	
	
	
}
elseif($id == "perku_mod144"){
	 online('Leidžiu eurus');
top('Moderatoriaus pirkimas');
	
		if(($apie['sms_litai']) < '49'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai 1 lygio moderatorių</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod',sms_litai=sms_litai-'50' WHERE nick='$nick'");
		
	
}
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai", "litai.php?id=mod1", "1lygio moderatorius", "Moderatoriaus pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_mod2444"){
	 online('Litai');
top('Moderatoriaus pirkimas');
	
		if(($apie['sms_litai']) < '99'){
			
		echo'	<div class="meniuc">Tau nepakanka litu</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai 2 lygio mod</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod2',sms_litai=sms_litai-'100' WHERE nick='$nick'");
		
	
}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai", "litai.php?id=mod2", "2lygio moderatorius", "Moderatoriaus pirkimas");
	navigacija($g_n);
	

}			
	elseif($id == "perku_mod443"){
	 online('Litai');
top('Moderatoriaus pirkimas');
	
		if(($apie['sms_litai']) < '149'){
			
		echo'	<div class="meniuc">Tau nepakanka litu</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai 3 lygio mod</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET statusas='Mod3',sms_litai=sms_litai-'150' WHERE nick='$nick'");
		
	
}			

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai", "litai.php?id=mod3", "3lygio moderatorius", "Moderatoriaus pirkimas");
	navigacija($g_n);
	

}

*/

elseif($id == "perku_goka"){
	top('Goku gods');
	 online('Leidžia eurus');

		if($apie['gokasb']-time() < 0){
	       $timxx = time()+60*60*24*100;      
		if(($apie['sms_litai']) < '999'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Goku Gods-0.png"><br> Nusipirkai už 1000 <img src="img/bicons/euro.png"> </div> ';		 
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Goku Gods', trans='0', sms_litai=sms_litai-'1000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET gokasb='$timxx' WHERE nick='$nick' ");
	
}
		}	
		elseif($apie['gokasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_goka2"){
	 online('Leidžia eurus');
	top('Goku gods');
	if($apie['gokasb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '399'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Super Goku gods</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Super oku gods', trans='0', sms_litai=sms_litai-'400' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET gokasb='$timxx' WHERE nick='$nick' ");
	
}}
			
		elseif($apie['gokasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}



elseif($id == "perku_goldfryzas"){
	top('Gold Fryzas');
	 online('Leidžia eurus');

		if($apie['fryzasb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '599'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/fryza-0.png"><br> Nusipirkai už 600 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gold Fryzas', trans='0', sms_litai=sms_litai-'600', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	mysqli_query($conn,"UPDATE zaidejai SET fryzasb='$timxx' WHERE nick='$nick' ");
}}
			
		elseif($apie['fryzasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_cus"){
	top('Cus');
	 online('Leidžia eurus');

		if($apie['cusb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['sms_litai'] < 39999 || $inv['angelwing'] < 50000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">angelo sparnų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Cus-0.png"><br> Nusipirkai už 40000 <img src="img/bicons/euro.png"> , 50000  <font color="red"><b>Angelo sparnų!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'50000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cus', trans='0', sms_litai=sms_litai-'40000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET cusb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['cusb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_cukatail"){
	top('Cukatail');
	 online('Leidžia eurus');

		if($apie['cukatailb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['sms_litai'] < 99999 || $inv['angelwing'] < 100000){

		echo'<div class="meniuc"><img src="img/veikejai/Cukatail-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">angelo sparnų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Cukatail-0.png"><br> Nusipirkai už 100000 <img src="img/bicons/euro.png"> , 100000  <font color="red"><b>Angelo sparnų!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'100000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Cukatail', trans='0', sms_litai=sms_litai-'100000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET cukatailb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['cukatailb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_gokasultra"){
	top('Gokas Ultra Instinct');
	 online('Leidžia eurus');

		if($apie['gokasultrab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 139999 || $inv['tobulas'] < 120000){
		echo'<div class="meniuc"><img src="img/veikejai/Gokas Ultra Instinct-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Gokas Ultra Instinct-0.png"><br> Nusipirkai už 140000 <img src="img/bicons/euro.png"> 
,
120000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'120000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas Ultra Instinct', trans='0', sms_litai=sms_litai-'140000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET gokasultrab='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['gokasultrab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_gokasultram"){
	top('Gokas Mastered Ultra Instinct');
	 online('Leidžia eurus');

		if($apie['gokasultramb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 199999 || $inv['tobulas'] < 150000){
		echo'<div class="meniuc"><img src="img/veikejai/Gokas Mastered Ultra Instinct-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Gokas Mastered Ultra Instinct-0.png"><br> Nusipirkai už 200000 <img src="img/bicons/euro.png"> 
,
150000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'150000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas Mastered Ultra Instinct', trans='0', sms_litai=sms_litai-'200000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET gokasultramb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['gokasultramb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_toppo"){
	top('Toppo');
	 online('Leidžia eurus');

		if($apie['toppomb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 240000 || $inv['naikinti'] < 200000){
		echo'<div class="meniuc"><img src="img/veikejai/Toppo-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red"> naikinimo galios!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Toppo-0.png"><br> Nusipirkai už 240000 <img src="img/bicons/euro.png"> 
,
200000 <font color="red"><b>Naikinimo galios!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'200000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Toppo', trans='0', sms_litai=sms_litai-'240000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET toppomb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['toppomb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_jirenm"){
	top('Max Form Jiren');
	 online('Leidžia eurus');

		if($apie['jirenmb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 300000 || $inv['tobulas'] < 250000){
		echo'<div class="meniuc"><img src="img/veikejai/Max Form Jiren-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Max Form Jiren-0.png"><br> Nusipirkai už 300000 <img src="img/bicons/euro.png"> 
,
250000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'250000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Max Form Jiren', trans='0', sms_litai=sms_litai-'300000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET jirenmb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['jirenmb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_gohanultra"){
	top('Gohanas Ultra Instinct');
	 online('Leidžia eurus');

		if($apie['gohanultrab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 700000 || $inv['tobulas'] < 500000){
		echo'<div class="meniuc"><img src="img/veikejai/Gohanas Ultra Instinct-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Gohan Ultra Instinct-0.png"><br> Nusipirkai už 700000 <img src="img/bicons/euro.png"> 
,
500000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'500000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gohanas Ultra Instinct', trans='0', sms_litai=sms_litai-'700000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET gohanultrab='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['gohanultrab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_vegetaultra"){
	top('Vegeta Ultra Instinct');
	 online('Leidžia eurus');

		if($apie['vegetaultrab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 1000000 || $inv['tobulas'] < 1000000){
		echo'<div class="meniuc"><img src="img/veikejai/Vegeta Ultra Instinct-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Vegeta Ultra Instinct-0.png"><br> Nusipirkai už 1000000 <img src="img/bicons/euro.png"> 
,
1,000,000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'1000000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegeta Ultra Instinct', trans='0', sms_litai=sms_litai-'1000000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET vegetaultrab='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['vegetaultrab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_vegitoultra"){
	top('Vegito Ultra Instinct');
	 online('Leidžia eurus');

		if($apie['vegitoultrab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 2000000 || $inv['tobulas'] < 3000000){
		echo'<div class="meniuc"><img src="img/veikejai/Vegito Ultra Instinct-0.png"></div>
<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Vegito Ultra Instinct-0.png"><br> Nusipirkai už 2,000,000 <img src="img/bicons/euro.png"> 
,
3,000,000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'3000000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegito Ultra Instinct', trans='0', sms_litai=sms_litai-'2000000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET vegitoultrab='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['vegitoultrab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=unikalus", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}



elseif($id == "perku_gokas20x"){
	top('Gokas SSJGB Kaioken 20x');
	 online('Leidžia eurus');

		if($apie['gokas20xb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

			if($apie['sms_litai'] < 20000 || $inv['tobulas'] < 145000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobulėjimo!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Gokas SSJGB Kaioken 20x-0.png"><br> Nusipirkai už 20000 <img src="img/bicons/euro.png"> 
,
145000 <font color="red"><b>Kario tobulėjimo!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'145000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gokas SSJGB Kaioken 20x', trans='0', sms_litai=sms_litai-'20000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET gokas20xb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['gokas20xb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_arack"){
	top('Arack');
	 online('Leidžia eurus');

		if($apie['arackb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['sms_litai'] < 30000 || $inv['naikinti'] < 40000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">naikinimo galios!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Arack-0.png"><br> Nusipirkai už 30000 <img src="img/bicons/euro.png"> 
 ,
40000  <font color="red"><b>Naikinimo galios!</b></font>
</div> ';		
mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'40000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Arack', trans='0', sms_litai=sms_litai-'30000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET arackb='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['arackb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}


elseif($id == "perku_mosco"){
	top('Mosco');
	 online('Leidžia eurus');

		if($apie['moscob']-time() < 0){
	       $timxx = time()+60*60*24*10;      

			if($apie['sms_litai'] < 14000 || $inv['naikinti'] < 25000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">naikinimo galios!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Mosco-0.png"><br> Nusipirkai už 14000 <img src="img/bicons/euro.png">
 ,
25000  <font color="red"><b>Naikinimo galios!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'25000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Mosco', trans='0', sms_litai=sms_litai-'14000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	              mysqli_query($conn,"UPDATE zaidejai SET moscob='$timxx' WHERE nick='$nick' ");
	
}
			}

	elseif($apie['moscob']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}


elseif($id == "perku_quitela"){
	top('Quitela');
	 online('Leidžia eurus');

		if($apie['quitelab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      

		if($apie['sms_litai'] < 10000 || $inv['naikinti'] < 15000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">naikinimo galios!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Quitela-0.png"><br> Nusipirkai už 10000 <img src="img/bicons/euro.png"> 
 ,
15000  <font color="red"><b>Naikinimo galios!</b></font>
</div> ';		

	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Quitela', trans='0', sms_litai=sms_litai-'10000' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'15000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET quitelab='$timxx' WHERE nick='$nick' ");
	
	}
}
			elseif($apie['quitelab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_vadose"){
	 online('Leidžia eurus');
	top('Vadose');
	if($apie['vadoseb']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
			if($apie['sms_litai'] < 5000 || $inv['angelwing'] < 10000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">angelo sparnų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Vadose-0.png"><br> Nusipirkai už 5000 <img src="img/bicons/euro.png"> ,
10000  <font color="red"><b>Angelo sparnų!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'10000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vadose', trans='0', sms_litai=sms_litai-'5000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
			mysqli_query($conn,"UPDATE zaidejai SET vadoseb='$timxx' WHERE nick='$nick' ");
}
			}
		elseif($apie['vadoseb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}

elseif($id == "perku_champa"){
	top('Champa');
	 online('Leidžia eurus');
if($apie['champab']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
		
		if($apie['sms_litai'] < 3000 || $inv['naikinti'] < 5000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">naikinimo galios!</b></font></div>';}


else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Champa-0.png"><br> Nusipirkai už 3000 <img src="img/bicons/euro.png">
 ,
5000  <font color="red"><b>Naikinimo galios!</b></font>
 </div> ';		

mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'5000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Champa', trans='0', sms_litai=sms_litai-'3000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE zaidejai SET champab='$timxx' WHERE nick='$nick' ");
	
}
			}
		elseif($apie['champab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_mbuu"){
	 online('Leidžia eurus');
	top('Majin BUU');
	if($apie['buub']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '99'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Majin Buu-0.png"><br> Nusipirkai už 100 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Majin Buu', trans='0', sms_litai=sms_litai-'100', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET buub='$timxx' WHERE nick='$nick' ");
}}
			
		elseif($apie['buub']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}

elseif($id == "perku_baby"){
	top('Baby');
	 online('Leidžia eurus');

		if($apie['babyb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '199'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"> <img src="img/veikejai/Baby Vegeta-0.png"><br> Nusipirkai už 200 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Baby Vegeta', trans='0', sms_litai=sms_litai-'200' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	mysqli_query($conn,"UPDATE zaidejai SET babyb='$timxx' WHERE nick='$nick' ");
}}
			
		elseif($apie['babyb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_s17"){
	 online('Leidžia eurus');
	top('Super Android 17');
	if($apie['s17b']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '299'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Super Android 17-0.png"><br> Nusipirkai už 300 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Super Android 17', trans='0', sms_litai=sms_litai-'300' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET s17b='$timxx' WHERE nick='$nick' ");
	}
}
			
		elseif($apie['s17b']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}

elseif($id == "perku_goldozarub"){
	top('Gold Ozaru Baby');
	 online('Leidžia eurus');

		if($apie['goldozarub']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		if(($apie['sms_litai']) < '399'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Gold Ozaru Baby-0.png"><br> Nusipirkai už 400 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gold Ozaru Baby', trans='0', sms_litai=sms_litai-'400', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET goldozarub='$timxx' WHERE nick='$nick' ");
	}
}
			
		elseif($apie['goldozarub']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_maxfryzas"){
	 online('Leidžia eurus');
	top('MAX Power Gold Fryzas');
	if($apie['maxfryzasb']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
		if(($apie['sms_litai']) < '1999'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/MAX Power Gold Fryzas-0.png"><br> Nusipirkai už 2000 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='MAX Power Gold Fryzas', trans='0', sms_litai=sms_litai-'2000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
				mysqli_query($conn,"UPDATE zaidejai SET maxfryzasb='$timxx' WHERE nick='$nick' ");
	
}
		}	
		elseif($apie['maxfryzasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}


elseif($id == "perku_jiren"){
	top('JIREN');
	 online('Leidžia eurus');
if($apie['jirenb']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
		
	if($apie['sms_litai'] < 6000 || $inv['tobulas'] < 12500){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">kario tobuėjimas!</b></font></div>';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Jiren-0.png"><br> Nusipirkai už 6000 <img src="img/bicons/euro.png">
,
12500 <font color="red"><b>Kario tobulėjimo!</b></font>
 </div> ';	
mysqli_query($conn,"UPDATE inv SET  tobulas=tobulas-'12500' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Jiren', trans='0', sms_litai=sms_litai-'6000' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
			mysqli_query($conn,"UPDATE zaidejai SET jirenb='$timxx' WHERE nick='$nick' ");
}
			
		}
elseif($apie['jirenb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}


elseif($id == "perku_hit"){
	top('HITAS');
	 online('Leidžia eurus');
if($apie['hitasb']-time() < 0){
	       $timxx = time()+60*60*24*1000;   
		
		if(($apie['sms_litai']) < '699'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Hitas-0.png"><br> Nusipirkai už 700 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Hitas', trans='0', sms_litai=sms_litai-'700', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
			mysqli_query($conn,"UPDATE zaidejai SET hitasb='$timxx' WHERE nick='$nick' ");
}
	}		
		elseif($apie['hitasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}
elseif($id == "perku_kaba"){
	top('Kaba');
	 online('Leidžia eurus');
if($apie['kabab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		
		if(($apie['sms_litai']) < '39'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Kaba-0.png"><br> Nusipirkai už 40 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Kaba', trans='0', sms_litai=sms_litai-'40', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		mysqli_query($conn,"UPDATE zaidejai SET kabab='$timxx' WHERE nick='$nick' ");
	}
}
			
		elseif($apie['kabab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}

elseif($id == "perku_mageta"){
	top('Mageta');
	 online('Leidžia eurus');
if($apie['magetab']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
		
		if(($apie['sms_litai']) < '59'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc">		<img src="img/veikejai/Botamo-0.png"><br> Nusipirkai už 60 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Botamo', trans='0', sms_litai=sms_litai-'60' , kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
		
	mysqli_query($conn,"UPDATE zaidejai SET magetab='$timxx' WHERE nick='$nick' ");}}
			
		elseif($apie['magetab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	

}





elseif($id == "perku_goka2"){
	 online('Leidžia eurus');
	top('Goku gods');
	
		if(($apie['sms_litai']) < '399'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Super Goku gods</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Super goku gods', trans='0', sms_litai=sms_litai-'400' WHERE nick='$nick'");
		
	
}
			
		

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}


elseif($id == "perku_android18"){
	 online('Leidžia eurus');
	 top('Android18');
	
		
		if(($apie['sms_litai']) < '19'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Super android18</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Super android 18', trans='0', sms_litai=sms_litai-'20' WHERE nick='$nick'");
		
	
}
			
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);

}
elseif($id == "perku_vegeta"){
	top('Vegeta gods');
	 online('Leidžia eurus');

		if($apie['vegetab']-time() < 0){
	       $timxx = time()+60*60*24*100;      
		if(($apie['sms_litai']) < '799'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Vegeta gods-0.png"><br> Nusipirkai už 800 <img src="img/bicons/euro.png"> </div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegeta Gods', trans='0', sms_litai=sms_litai-'800' WHERE nick='$nick'")or die(mysqli_error());
mysqli_query($conn,"UPDATE zaidejai SET vegetab='$timxx' WHERE nick='$nick' ");
}}
elseif($apie['vegetab']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_vegeta2"){
	 online('Leidžia eurus');
	 top('Vegeta gods');
	
		
		if(($apie['sms_litai']) < '150'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Vegeta gods ssj3</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Vegeta gods ssj3', trans='0', sms_litai=sms_litai-'150' WHERE nick='$nick'")or die(mysqli_error());}

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_bils"){
	 online('Leidžia eurus');
	 top('Bills');
	
		if($apie['billsb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
			if($apie['sms_litai'] < 2500 || $inv['naikinti'] < 3000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">naikinimo galios!</b></font></div>';}
else{
				
	echo'	<div class="meniuc">	<img src="img/veikejai/Lord bills-0.png"><br> Nusipirkai už 250 <img src="img/bicons/euro.png"> ,
3000  <font color="red"><b>Naikinimo galios!</b></font>
 </div> ';		

mysqli_query($conn,"UPDATE inv SET  naikinti=naikinti-'3000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Lord bills', trans='0', sms_litai=sms_litai-'2500', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET billsb='$timxx' WHERE nick='$nick' ");
}}

elseif($apie['billsb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_wiss"){
	top('Wiss');
	 online('Leidžia eurus');
if($apie['visasb']-time() < 0){
	       $timxx = time()+60*60*24*1000;      
	if($apie['sms_litai'] < 4000 || $inv['angelwing'] < 5000){
		echo'<div class="meniuc">
  Neužtenka <img src="img/bicons/euro.png" /> arba
neturi pakankamai <b><font color="red">angelo sparnų!</b></font></div>';}

else{
				
	echo'	<div class="meniuc"><img src="img/veikejai/Wiss-0.png"><br> Nusipirkai už 4000 <img src="img/bicons/euro.png"> , 5000  <font color="red"><b>Angelo sparnų!</b></font>
 </div> ';		
mysqli_query($conn,"UPDATE inv SET  angelwing=angelwing-'5000' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Wiss', trans='0', sms_litai=sms_litai-'4000', kiek_unikaliu=kiek_unikaliu+'1' WHERE nick='$nick'");


mysqli_query($conn,"UPDATE zaidejai SET visasb='$timxx' WHERE nick='$nick' ");
}}


elseif($apie['visasb']-time() > 0){
                echo '<div class="meniuc">Tu jau pirkai šį veikėją!</div>';
            }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_gotenks"){
	top('Gotenks');
	 online('Leidžia eurus');
	
		
		if(($apie['sms_litai']) < '39'){
			
		echo'	<div class="meniuc">Tau nepakanka  <img src="img/bicons/euro.png" />!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Gotenks saiyan</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Gotenks saiyan', trans='0', sms_litai=sms_litai-'40' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_xicor"){
	top('Xicor');
	 online('Leidžia eurus');
	
		if(($apie['sms_litai']) < '79'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Xicor</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Xicor', trans='0', sms_litai=sms_litai-'80' WHERE nick='$nick'");}

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_evil_vegeta"){
	 online('Leidžia eurus');
	 top('Evil vegeta');
	
		
		if(($apie['sms_litai']) < '699'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Evil vegeta</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Evil vegeta', trans='0', sms_litai=sms_litai-'700' WHERE nick='$nick'");}

		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_evil_goku"){
	 online('Leidžia eurus');
	top('Evil goku');
	
		
		if(($apie['sms_litai']) < '799'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Evil goku</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Evil goku', trans='0', sms_litai=sms_litai-'800' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_evil_vegeta_gods"){
	top('Evil vegeta gods');
	 online('Leidžia eurus');
	
		if(($apie['sms_litai']) < '999'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Evil vegeta gods</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Evil vegeta gods', trans='0', sms_litai=sms_litai-'1000' WHERE nick='$nick'");}

	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}
elseif($id == "perku_gohan"){
	 online('Leidžia eurus');
	 top('Evil gohan');
	
		if(($apie['sms_litai']) < '1199'){
			
		echo'	<div class="meniuc">Tau nepakanka eurų!</div> ';}
else{
				
	echo'	<div class="meniuc">Tapai Evil vegeta gods</div> ';		
	mysqli_query($conn,"UPDATE zaidejai SET veikejas='Evil gohan', trans='0', sms_litai=sms_litai-'1200' WHERE nick='$nick'");}

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Veikejo pirkimas");
	navigacija($g_n);
	
}

elseif($id == "bils"){
	 online('Leidžia eurus');
	top('Bils');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Lords Bills</b><br/>
'.$ico2.' Jėga:<b> +700%</b><br/>
'.$ico2.' Gynyba:<b> +700%</b><br/>
'.$ico2.' Gyvybes:<b> +700%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">2500,00 <img src="img/bicons/euro.png" /> </font>
ir

<font color="red"> <b>3000 Naikinimo galios</b></font>
</b><br/>

		<td>
		<img src="img/veikejai/Lord bills-0.png">
		</td>
		</tr>
		</table> </div>	
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="eurai.php?id=perku_bils">Pirkti šį veikėją</a></b><br/></div>
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Bils");
	navigacija($g_n);

}
elseif($id == "wiss"){
	 online('Leidžia eurus');
	 top('Wiss');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Wiss</b><br/>
'.$ico2.' Jėga:<b> +1000%</b><br/>
'.$ico2.' Gynyba:<b> +1000%</b><br/>
'.$ico2.' Gyvybes:<b> +1000%</b><br/>
'.$ico2.' Veikėjo kaina:<b><font color="green">   4000,00 <img src="img/bicons/euro.png" /> </b></font> ir

<font color="red"> <b>5000 Angelo Sparnų</b></font>
<br></font>
'.$ico2.' Unikali savybė:<b><font color="green"> iš kovų gauna 2 kart daugiau  <img src="img/bicons/auxo.png" />  </b><br/></font>
</b><br/>


		<td>
		<img src="img/veikejai/Wiss-0.png">
		</td>
		</tr>
		</table> </div>	
		
<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="eurai.php?id=perku_wiss">Pirkti šį veikėją</a></b><br/></div>
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Bils");
	navigacija($g_n);

}
elseif($id == "evil gohan"){
	top('Evil gohan');
	 online('Leidžia eurus');
	echo'

		<div class="meniu" style="text-align: left;">
<table><tr><td>
'.$ico2.' Veikėjas: <b> Evil gohan</b><br/>
'.$ico2.' Jėga:<b> +85%</b><br/>
'.$ico2.' Gynyba:<b> +85%</b><br/>
'.$ico2.' Gyvybes:<b> +85%</b><br/>
'.$ico2.' Veikėjo kaina:<b> 1200,00 Eurų.</b><br/>

		<td>
		<img src="img/veikejai/Evil gohan-0.png">
		</td>
		</tr>
		</table> </div>	
		<div class="meniu" style="text-align: left;">	'.$ico.' <b><a href="eurai.php?id=perku_gohan">Pirkti šį veikėją</a></b><br/></div>
		
		
		
		';
		
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "eurai.php?id=uni", "Unikalus veikejai", "Bils");
	navigacija($g_n);

}
elseif($id == "unikalus"){
	 online('Leidžia eurus');
	 top('Unikalūs veikėjai');
	echo'
<div class="meniuc">
Unikalus veikėjas - tai veikėjas kuris tui daugiai galių bei privalumų žaidime!<br></div>



<div class="meniu">'.$ico.' <a href="eurai.php?id=kaba">Kaba</a> [<b>40</b>  <img src="img/bicons/euro.png" />]
</br>
<small> +<b>10%</b> jėgos + <b>10%</b> ginybos +<b>10%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=mageta">Botamo</a> [<b>60</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>20%</b> jėgos + <b>20%</b> ginybos +<b>20%</b> gyvybių</small></div>


<div class="meniu">'.$ico.' <a href="eurai.php?id=mbuu">Majin BUU</a> [<b>100</b>  <img src="img/bicons/euro.png" />] </br>
<small> +<b>30%</b> jėgos + <b>30%</b> ginybos +<b>30%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=baby">Baby</a> [<b>200</b>  <img src="img/bicons/euro.png" />]</br>
<small> +<b>50%</b> jėgos + <b>50%</b> ginybos +<b>50%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=super17">Super Android 17</a> [<b>300</b><img src="img/bicons/euro.png" />] </br>
<small> +<b>75%</b> jėgos + <b>75%</b> ginybos +<b>75%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=goldenbaby">Gold Ozaru Baby</a> [<b>400</b> <img src="img/bicons/euro.png" />] </br>
<small> +<b>100%</b> jėgos + <b>100%</b> ginybos +<b>100%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=goldfryzas">Golden Fryzas</a> [<b>600</b> <img src="img/bicons/euro.png" />] </br>
<small> +<b>150%</b> jėgos + <b>150%</b> ginybos +<b>150%</b> gyvybių</small></div>




<div class="meniu">'.$ico.' <a href="eurai.php?id=vegeta gods">Vegeta Gods</a> [<b>800</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>200%</b> jėgos + <b>200%</b> ginybos +<b>200%</b> gyvybių</small></div>


<div class="meniu">'.$ico.' <a href="eurai.php?id=goku gods">Goku Gods</a> [<b>1000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>250%</b> jėgos + <b>250%</b> ginybos +<b>250%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=hit">HITAS</a> [<b>1400</b> <img src="img/bicons/euro.png" />]   </br>
<small> +<b>350%</b> jėgos + <b>350%</b> ginybos +<b>350%</b> gyvybių</small></div>


<div class="meniu">'.$ico.' <a href="eurai.php?id=goldfryza">MAX Power Gold Fryzas</a> [<b>2000</b>     
<img src="img/bicons/euro.png" />]
</br>
<small> +<b>500%</b> jėgos + <b>500%</b> ginybos +<b>500%</b> gyvybių</small></div>




<div class="meniu">'.$ico.' <a href="eurai.php?id=bils">Lord Bills</a> [<b>2500</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>700%</b> jėgos + <b>700%</b> ginybos +<b>700%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=champa">Įniršęs Champa</a> [<b>3000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>850%</b> jėgos + <b>850%</b> ginybos +<b>850%</b> gyvybių</small></div>


<div class="meniu">'.$ico.' <a href="eurai.php?id=wiss">Wiss</a> [<b>4000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>1000%</b> jėgos + <b>1000%</b> ginybos +<b>1000%</b> gyvybių</small></div>



<div class="meniu">'.$ico.' <a href="eurai.php?id=vadose">Vadosė</a> [<b>5000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>1200%</b> jėgos + <b>1200%</b> ginybos +<b>1200%</b> gyvybių</small></div>










<div class="meniu">'.$ico.' <a href="eurai.php?id=jiren">JIREN</a> [<b>6000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>1500%</b> jėgos + <b>1500%</b> ginybos +<b>1500%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=quitela">Quitela</a> [<b>10000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>2000%</b> jėgos + <b>2000%</b> ginybos +<b>2000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=mosco">Mosco</a> [<b>14000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>2500%</b> jėgos + <b>2500%</b> ginybos +<b>2500%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=gokas20x">Gokas SSJGB Kaioken 20x</a> [<b>20,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>3000%</b> jėgos + <b>3000%</b> ginybos +<b>3000%</b> gyvybių</small></div>

<div class="meniu">'.$ico.' <a href="eurai.php?id=arack">Arack</a> [<b>30,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>3500%</b> jėgos + <b>3500%</b> ginybos +<b>3500%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=cus">Cus</a> [<b>40,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>4000%</b> jėgos + <b>4000%</b> ginybos +<b>4000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=cukatail">Cukatail</a> [<b>100,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>5000%</b> jėgos + <b>5000%</b> ginybos +<b>5000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=gokasultra">Gokas Ultra Instinct</a> [<b>140,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>6000%</b> jėgos + <b>6000%</b> ginybos +<b>6000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=gokasultram">Gokas Mastered Ultra Instinct</a> [<b>200,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>7000%</b> jėgos + <b>7000%</b> ginybos +<b>7000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=toppo">Toppo</a> [<b>240,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>8000%</b> jėgos + <b>8000%</b> ginybos +<b>8000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=jirenm">Max Form Jiren</a> [<b>300,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>9000%</b> jėgos + <b>9000%</b> ginybos +<b>9000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=gohanasultra">Gohanas Ultra Instinct</a> [<b>700,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>10000%</b> jėgos + <b>10000%</b> ginybos +<b>10000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=vegetaultra">Vegeta Ultra Instinct</a> [<b>1,000,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>12000%</b> jėgos + <b>12000%</b> ginybos +<b>12000%</b> gyvybių</small></div>
<div class="meniu">'.$ico.' <a href="eurai.php?id=vegitoultra">Vegito Ultra Instinct</a> [<b>2,000,000</b> <img src="img/bicons/euro.png" />]
</br>
<small> +<b>15000%</b> jėgos + <b>15000%</b> ginybos +<b>15000%</b> gyvybių</small></div>
		';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Unikalus veikejai");
	navigacija($g_n);

}
/// kovų taškų licenzija
elseif($id == "kt"){
    online('Leidžia eurus');
	top('Kovų taškų Licenzija');
			echo'<div class="meniuc">Kovų taškų licenzija - tai galimybė gauti kovų taškus ir jų naudojimą!<br>Jos kaina: 200
<img src="img/bicons/euro.png" />
</div>';
        echo '<div class="meniuc">
        <a href="?id=perku_kt">Pirkti</a>	
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Kovos taškai Licenzija");
	navigacija($g_n);
	 
}

elseif($id == "perku_kt"){
	 online('Eurai');
top('Licenzijos pirkimas');
		if($apie['ktb']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '199'){
			
		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai <img src="img/bicons/kovostaskai.png" /> licenziją!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET ktb='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['ktb']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Licenzijos pirkimas");
	navigacija($g_n);
	

}			
//// pliusu licenzija
elseif($id == "pliusai"){
    online('Leidžia eurus');
	top('Pliusų Licenzija');
			echo'<div class="meniuc">Pliusų licenzija - tai galimybė gauti pliusus!<br>Jos kaina: 500
<img src="img/bicons/euro.png" />
</div>';
        echo '<div class="meniuc">
        <a href="?id=perku_pliusai">Pirkti</a>	
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Pliusai Licenzija");
	navigacija($g_n);
	 
}

elseif($id == "perku_pliusai"){
	 online('Eurai');
top('Licenzijos pirkimas');
		if($apie['pliusaib']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '499'){
			
		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai <img src="img/bicons/pliusai.png" > licenziją!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'500' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET pliusaib='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['pliusaib']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Licenzijos pirkimas");
	navigacija($g_n);
	

}			

//// bitcoin licenzija
elseif($id == "bt"){
    online('Leidžia eurus');
	top('BitCoin Licenzija');
			echo'<div class="meniuc">BitCoin licenzija - tai galimybė gauti naują valiutą!<br>Jos kaina: 5000
<img src="img/bicons/euro.png" />
</div>';
        echo '<div class="meniuc">
        <a href="?id=perku_bt">Pirkti</a>	
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "BitCoin Licenzija");
	navigacija($g_n);
	 
}

elseif($id == "perku_bt"){
	 online('Eurai');
top('Licenzijos pirkimas');
		if($apie['bts']-time() < 0){
	       $timxx = time()+60*60*24*100;    
////

		


		if(($apie['sms_litai']) < '4999'){
			
		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
else{
				
	echo'	<div class="meniuc">Nusipirkai <img src="img/bicons/bitcoin.png" /> licenziją!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'5000' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE zaidejai SET bts='$timxx' WHERE nick='$nick' ");

}
		}
	elseif($apie['bts']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Licenzijos pirkimas");
	navigacija($g_n);
	

}			

/// didesnis daiktu gavimas
elseif($id == "daiktai"){
    online('Leidžia eurus');
	top('Didesnis daiktu gavimas');
			echo'<div class="meniuc">1000 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau </b> daiktu kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=daiktai2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Didesnia daiktu gavimas");
	navigacija($g_n);
	 
}
/// didesnis rudu gavimas
elseif($id == "rudos"){
    online('Leidžia eurus');
	top('Didesnis rūdų gavimas');
			echo'<div class="meniuc">150 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau rūdų </b> kasykloje </div>';
        echo '<div class="meniuc">
        <form action="?id=rudos2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Didesnis rūdų gavimas");
	navigacija($g_n);
	 
}
/// didesnis kasimo gavimas
elseif($id == "kasimo"){
    online('Leidžia eurus');
	top('Didesnis kasimo LVL gavimas');
			echo'<div class="meniuc">300 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau kasimo LVL</b> kasykloje </div>';
        echo '<div class="meniuc">
        <form action="?id=kasimo2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Didesnis kasimo LVL gavimas");
	navigacija($g_n);
	 
}

///// didesnis lg tasku gavimas
elseif($id == "dglg"){
    online('Leidžia eurus');
	top('Daugiau lygio taškų');
			echo'<div class="meniuc">2000 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite po 3 lygio taškus daugiau </b> kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dglg2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau lygio taškų");
	navigacija($g_n);
}
///// 2x euru
elseif($id == "dge"){
    online('Leidžia eurus');
	top('Daugiau 2x eurų');
			echo'<div class="meniuc">1000 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau </b><img src="img/bicons/euro.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dge2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau 2x euru");
	navigacija($g_n);
	 
}
///// 2x aukso
elseif($id == "dga"){
    online('Leidžia eurus');
	top('Daugiau 2x auksinių');
			echo'<div class="meniuc">50 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau </b><img src="img/bicons/auxo.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dga2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau 2x auksiniu");
	navigacija($g_n);
	 
}

///// 3x aukso
elseif($id == "dgax"){
    online('Leidžia eurus');
	top('Daugiau 3x auksinių');
			echo'<div class="meniuc">100 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 3 kartus daugiau </b><img src="img/bicons/auxo.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dgax2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau 3x auksiniu");
	navigacija($g_n);
	 
}

//// 2x kreditu
elseif($id == "dgas"){
    online('Leidžia eurus');
	top('Daugiau 2x kreditų');
			echo'<div class="meniuc">50 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite 2 kartus daugiau </b><img src="img/bicons/credit.png" /> kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dgas2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau 2x kreditu");
	navigacija($g_n);
	 
}
///daugiau pinigu ir exp
elseif($id == "dgxp"){
    online('Leidžia eurus');
	top('Daugiau pinigu ir exp');
			echo'<div class="meniuc">1000 <img src="img/bicons/euro.png" />   -  1 Para<br><b>Gausite daugiau  30% </b><img src="img/bicons/pinigai.png" />,   <img src="img/bicons/exp.png" />  kovų lauke. </div>';
        echo '<div class="meniuc">
        <form action="?id=dgxp2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
 

$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Daugiau pinigu ir exp");
	navigacija($g_n);
	 
}

///// 2x euru pirkimas

elseif($id == "dge2"){
    online('Leidžia eurus');
    top("Daugiau 2x eurų gavimas");
  
    if($apie['dgeur']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*1000;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['dgeur']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x eurų gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET dgeur='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['dgeur']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x eurų");
	navigacija($g_n);
    }

///// daugiau lygio tasku pirkimas

elseif($id == "dglg2"){
    online('Leidžia eurus');
    top("Daugiau lygio taškų");
  
    if($apie['dglg']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*2000;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['dglg']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai daugiau lygio taškų gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET dglg='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['dglg']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","Daugiau lygio taškų");
	navigacija($g_n);
    }

///// 2x kredu pirkimas

elseif($id == "dgas2"){
    online('Leidžia eurus');
    top("Daugiau 2x kreditų gavimas");
  
    if($apie['duxkrd']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*50;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['duxkrd']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x kreditų gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET duxkrd='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['duxkrd']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x kreditų");
	navigacija($g_n);
    }
        /////2x aukso pirkimas

elseif($id == "dga2"){
    online('Leidžia eurus');
    top("Daugiau 2x auksinių gavimas");
  
    if($apie['duxaux']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*50;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['duxaux']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	         elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x auksinių gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET duxaux='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['duxaux']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x auksinių");
	navigacija($g_n);
    }
/////3x aukso pirkimas

elseif($id == "dgax2"){
    online('Leidžia eurus');
    top("Daugiau 3x auksinių gavimas");
  
    if($apie['dgax']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*100;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
       }
         elseif($apie['duxaux']-time() > 0){
                echo '<div class="meniuc">Jau turi 2x auksinių paslauga!</div>';
            }   
            elseif($apie['dgax']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	         elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 3x auksinių gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET dgax='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['dgax']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","3x auksinių");
	navigacija($g_n);
    }

        ///// 2x daiktu pirkimas

elseif($id == "daiktai2"){
    online('Leidžia eurus');
    top("Daugiau 2x daiktų gavimas");
  
    if($apie['duxdaig']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*1000;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['duxdaig']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x daiktų gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET duxdaig='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['duxdaig']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x Daiktų");
	navigacija($g_n);
    }
     ///// 2x rūdų pirkimas

elseif($id == "rudos2"){
    online('Leidžia eurus');
    top("Daugiau 2x rūdų gavimas");
  
    if($apie['kasimas2x']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*150;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['kasimas2x']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x rūdų gavimą kasykloje!</div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET kasimas2x='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['kasimas2x']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x rūdų gavimas");
	navigacija($g_n);
    }

elseif($id == "kasimo2"){
    online('Leidžia eurus');
    top("Daugiau 2x kasimo LVL gavimas");
  
    if($apie['kasimolvl2x']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*300;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['kasimolvl2x']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 2x  kasimo LVL gavimą kasykloje!</div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET kasimolvl2x='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['kasimolvl2x']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x kasimo LVL gavimas");
	navigacija($g_n);
    }


// 2x pin ir aukso pirkimas
elseif($id == "dgxp2"){
    online('Leidžia eurus');
    top("Daugiau pinigu ir exp gavimas");
  
    if($apie['duxpx']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*1000;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['duxpx']-time() > 0){
                echo '<div class="meniuc">Tu jau turi šią paslaugą!</div>';
            }


	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai 30% daugiau pinigų ir exp gavimą kovų lauke. </div>';
	              $timxx = time()+60*60*24*$kiekv;
	              mysqli_query($conn,"UPDATE zaidejai SET duxpx='$timxx' WHERE nick='$nick' ");
				   mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }else {
        echo '<div class="meniuc">Paslauga tau dar galios: <b>'.laikas($apie['duxpx']-time(), 1).'</b></div>';
        }  $g_n[] = array("eurai.php?id=","Eurai","2x pinigų ir exp gavimas");
	navigacija($g_n);
    }
        
//kita

elseif($id == "krd"){
    online('Leidžia eurus');
	top('Kreditų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" />   - 50   <img src="img/bicons/credit.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=kred2" method="post"/>
        Kiek eurų išleisite:<br /><input type="number" name="kred"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Kreditu pirkimas");
	navigacija($g_n);
	 
}
if($ka =='kred2'){
		
 top('Kreditų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $kred= isset($_POST['kred']) ? preg_replace("/[^0-9]/","",$_POST['kred']) : null;
            $kainn = $kred;
			$kiekis = $kred * 50;
		
            
            if(empty($kred)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/credit.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET kred=kred +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Kreditų pirkimas");
	navigacija($g_n);}
		}





    
elseif($id == 'shop'){
	   online('Leidžia eurus');
	
        
		if($ka =='exprnrn'){
			top('Exp pirkimas');
			echo'<div class="meniuc">1 litas 50 000  Exp</div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=exp2" method="post"/>
        Kiek litų išleisite:<br /><input type="text" name="expas"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai", "Exp pirkimas");
	navigacija($g_n);}
	 
}
if($ka =='exp2jj'){
		top('Exp pirkimas');
 
    
   
   
        if(isset($_POST['submit'])){
            $expas= isset($_POST['expas']) ? preg_replace("/[^0-9]/","",$_POST['expas']) : null;
            $kainn = $expas;
			$kiekis = $expas * 50000;
		
            
            if(empty($expas)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai litų!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).' exp</div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET exp=exp +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai", "Exp pirkimas");
	navigacija($g_n);
		}}

 
		if($ka =='jega'){
			top('Jėgos pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" /> - 100 <img src="img/bicons/attack1.png" />   </div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=jega2" method="post"/>
        Kiek eurų šleisite:<br /><input type="number" name="jegaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Jėgos pirkimas");
	navigacija($g_n);
	 
}
if($ka =='jega2'){
		
 top('Jėgos pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $jegaa= isset($_POST['jegaa']) ? preg_replace("/[^0-9]/","",$_POST['jegaa']) : null;
            $kainn = $jegaa;
			$kiekis = $jegaa * 100;
		
            
            if(empty($jegaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/attack1.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET jega=jega +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Jėgos pirkimas");
	navigacija($g_n);}
		}
if($ka =='gyvybes'){
	top('Gyvybių pirkimas');
			echo'<div class="meniuc">1  <img src="img/bicons/euro.png" />  - 50  <img src="img/bicons/hp.png" /></div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=gyvybes2" method="post"/>
        Kiek eurų išleisite:<br /><input type="number" name="gyvybess"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gyvybių pirkimas");
	navigacija($g_n);
	 
}
if($ka =='gyvybes2'){
		
 top('Gyvybių pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gyvybess= isset($_POST['gyvybess']) ? preg_replace("/[^0-9]/","",$_POST['gyvybess']) : null;
            $kainn = $gyvybess;
			$kiekis = $gyvybess* 50;
		
            
            if(empty($gyvybess)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/hp.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET max_gyvybes=max_gyvybes +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gyvybių pirkimas");
	navigacija($g_n);}
		}
		
if($ka =='gynyba'){
	top('Gynybos pirkimas');
			echo'<div class="meniuc">1   <img src="img/bicons/euro.png" />  -  100  <img src="img/bicons/shield.png" />  </div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=gynyba2" method="post"/>
        Kiek eurų išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gynybos pirkimas");
	navigacija($g_n);}
	 

if($ka =='gynyba2'){
		
 
    top('Gynybos pirkimas');
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 100;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/shield.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Gynybos pirkimas");
	navigacija($g_n);}
		}
	if($ka =='pinigai'){
		top('Pinigų pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" /> - 1,000 <img src="img/bicons/pinigai.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=shop&ka=pinigai2" method="post"/>
        Kiek eurų išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="pirkti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Pinigų pirkimas");
	navigacija($g_n);
	 
}
if($ka =='pinigai2'){
		
 top('Pinigų pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 1000;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! nusipirkai '.sk($kiekis).'  <img src="img/bicons/pinigai.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET litai=litai +'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Pinigų pirkimas");
	navigacija($g_n);}
		}
		
if($id =='keitimas'){

		top('Veikėjo keitimas');
	
	
  echo'
        <div class="meniuc">';
        $query = mysqli_query($conn,"SELECT * FROM veikejai WHERE rodyti =''");
        while($row = mysqli_fetch_assoc($query)){
            echo ' <a href="?id=veikejai&ka='.$row['id'].'&ID='.$ID.'"><img src="img/head/'.$row['logo'].'.png"></a>';
        }
  
		echo'</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","litai.php","Litai","Veikėjo pasirinkimas");
navigacija($g_n);
	
	
}
if($id == 'veikejaejeji'){
 $veik = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka' "));
    top(''.$veik['name'].' Veikėjas');
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE id='$ka'")) == 0){
  
        echo '<div class="meniuc">Tokio veikėjo nėra!</div>';
		

    } else {
      
      
        if($veik['name'] == 'Vedžitas'){
            $imgssxx = 'Vedzitas';
        } else {
            $imgssxx = $veik['name'];
        }
        echo '<div class="meniuc"><img src="img/veikejai/'.$imgssxx.'-0.png"></div>';
		
        echo '<div class="up"> Veikėjo savybės</div><div class="meniu">
        '.$ico2.' Veikėjas: '.$veik['name'].'<br/>
        '.$ico2.' Turi transformacijų: '.$veik['trans'].'<br/>
           '.$ico2.' Jėga: '.$veik['jega'].'<br/>
               '.$ico2.' Gynyba: '.$veik['gynyba'].'<br/>
                '.$ico2.' Gyvybes: '.$veik['gyvybes'].'<br/>
                 '.$ico2.' Rasė: '.$veik['rase'].'<br/>';
       if(!empty($veik['sugebejimas'])){     echo'      '.$ico2.' Sugebėjimas: '.$veik['sugebejimas'].'<br/>';}
     echo'   '.$ico2.' Veikėją pasirinko: '.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM zaidejai WHERE veikejas='$veik[name]' ")).' žaidėjų<br/>
        </div>';
        echo '<div class="meniuc"><a href="?id=rinktis&ka='.$veik['name'].'">Pasirinkti šį veikėją</a></div>';
    }
   	$g_n[] = array("pagrindinis.php?id=","Pagrindinis", "litai.php?id=keitimas","Veikėjo pasirinkimas", "".$veik['name']." Veikėjas");
navigacija($g_n);
   }
if($id == 'rinkkkktis'){
	top('Veikėjo keitimas');
	
    
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM veikejai WHERE name='$ka'")) == 0){
  
        echo '<div class="meniuc">Tokio veikėjo nėra!</div>';}
	elseif($apie['sms_litai'] < 100){
		  echo '<div class="meniuc">Nepakanka litų</div>';}
	
	elseif($apie['keite_veikejai'] > 2){
		
		  echo '<div class="meniuc">Jus jau keitėte veikėją du kartus</div>';
	}
	else{
		
		 mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'100', veikejas='$ka', trans='0', keite_veikejai=keite_veikejai+'1' WHERE nick='$nick'");
		mysqli_query($conn,"DELETE FROM transformacijos WHERE nick='$nick'");
		
	echo '<div class="meniuc">Veikėjas pakeistas</div>';}
	 	$g_n[] = array("pagrindinis.php?id=","Pagrindinis", "litai.php?id=keitimas","Veikėjo pasirinkimas", "Veikėjo keitimas");
navigacija($g_n);

}

if($id =='secret'){
			top('Informacijos užslaptinimas');
	echo'<div class="meniuc">Už <b>1000</b> <img src="img/bicons/euro.png" /> jūs galėsite užsislaptinti savo infomaciją, kiti žaidėjai nematys jokių jūsų, statusų, užslaptinimas galioja <b>3</b> dienas		</div>
		';
		if($user['secret']-time() > 0){
				echo'	<div class="meniu">Užslaptinta informacija dar bus <b>'.laikas($user['secret']-time(),1).'</b></div>	';
			
		}	else{		
		echo'	<div class="meniu"> '.$ico.'<a href="?id=secret2">Pirkti užslaptinimą</a></div>	
			';
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Informacijos užslaptinimas");
	navigacija($g_n);
}
if($id =='secret2'){
			top('Informacijos užslaptinimas');
	if($apie['sms_litai'] < 1000){
		echo'<div class="meniuc">Nepakanka  <img src="img/bicons/euro.png" />!</div>';
	}
	elseif($user['secret']-time() > 0){
		echo'<div class="meniuc">Tu jau esi užsislaptinęs informaciją</div>';
	}
	else{
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'1000' WHERE nick='$nick'");
		$timeas = time()+3600*24*3;
		mysqli_query($conn,"UPDATE user SET secret='$timeas' WHERE nick='$nick'");
		echo'<div class="meniuc">Užsislaptinai informaciją sėkmingai</div>';
		
	}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Informacijos užslaptinimas");
	navigacija($g_n);
}

if($id == 'team')
{
	top('Komandos narių didinimas');
	  echo '<div class="meniuc">Iveskite komandos pavadinimą, kuriai norite nupirkti +1 vietą komandoje<br>1 vieta - 5  <img src="img/bicons/euro.png" />  </div><div class="meniuc">
  <form action="?id=team2" method="post"/>
   Komandos pavadinimas:<br />
  <input type="text" name="team" value="'.$user['team'].'""><br/>
   <input type="submit" value="Pirkti"/>
   </div>';
			
	
	
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Komandos narių didinimas'");
	navigacija($g_n);	

}
if($id =='team2'){
	top('Komandos narių didinimas');
	$team = post($_POST['team']);
	$tm = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$team'"));
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM team WHERE pavadinimas='$team'")) == false){
		
		echo'<div class="meniuc">Tokios komandos nėra</div>';
	}
	elseif($apie['sms_litai'] < 5){
		echo'<div class="meniuc">Nepakanka  <img src="img/bicons/euro.png" />!</div>';
	}
	
	elseif($tm['max'] >= 25){
			echo'<div class="meniuc">Maksimalus narių skaičius 25</div>';
		
	}
	else{
		
		mysqli_query($conn,"UPDATE team SET max=max+'1' WHERE pavadinimas='$team'");
		mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'5' WHERE nick='$nick'");
		
		
		echo'<div class="meniuc">Pridėjai 1 narį '.$team.' komandai</div>';
	}
	
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "Komandos narių didinimas'");
	navigacija($g_n);		
}

		if($id =='vipticket'){
		top('VIP TICKET pirkimas');
			echo'<div class="meniuc">1 <img src="img/bicons/euro.png" /> - <b>'.skaicius(10).'</b> <img src="img/bicons/vipt.png" />    </div>';
        echo '<div class="meniuc">
        <form action="?id=vipticket2" method="post"/>
        Kiek cash išleisite:<br /><input type="number" name="gynybaa"><br />
        <input type="submit" name="submit" value="Įsigyti"/></form>
        </div>';
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "VIP TICKET pirkimas");
	navigacija($g_n);
	 
}
if($id =='vipticket2'){
		
 top('VIP TICKET pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $gynybaa= isset($_POST['gynybaa']) ? preg_replace("/[^0-9]/","",$_POST['gynybaa']) : null;
            $kainn = $gynybaa;
			$kiekis = $gynybaa * 10;
		
            
            if(empty($gynybaa)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai <b>'.sk($kiekis).' </b> <img src="img/bicons/vipt.png" /></div>';
	           
	            mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'$kiekis', sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "VIP TICKET pirkimas");
	navigacija($g_n);}
		}

if($id =='vip_privilegija'){
	top('VIP Privilegijos pirkimas');
	$price = resolveVipPriceInEuro();
	echo'<div class="meniuc">' . $price . '  <img src="img/bicons/euro.png" /> - <b>24h</b> galiojanti VIP privilegija</div>';
	echo '<div class="meniuc"> '.$ico.' <a href="?id=vip_privilegija1">Pirkti VIP Privilegija</a></div>';


	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "VIP Privilegijos pirkimas");
	navigacija($g_n);

}

function resolveVipPriceInEuro(){
	global  $apie;

	if ($apie['lygis'] < 30) {
		return 1000;
	}

	if ($apie['lygis'] < 60) {
		return 3000;
	}

	if ($apie['lygis'] < 90) {
		return 5000;
	}

	if ($apie['lygis'] < 120) {
		return 7000;
	}

	if ($apie['lygis'] < 150) {
		return 10000;
	}

	return 20000;
}

if($id =='vip_privilegija1'){
	top('VIP Privilegijos pirkimas');
	$price = resolveVipPriceInEuro();
if($apie['sms_litai'] < $price){
	echo '<div class="meniuc">Nepakanka  <img src="img/bicons/euro.png" />!</div>';
}
elseif((int)$apie['vip']-time() > 0){

	echo '<div class="meniuc">Tu jau turi VIP Privilegiją!</div>';

}
else{
	$vip_time = time()+ 3600*24;
	echo '<div class="meniuc">VIP Privilegija nupirkta sėkmingai!</div>';
	mysqli_query($conn,"UPDATE zaidejai SET vip='$vip_time', sms_litai=sms_litai-'$price' WHERE nick='$nick'");
}

	$g_n[] = array("pagrindinis.php?id=","Pagrindinis","eurai.php","Eurai", "VIP Privilegijos pirkimas");
	navigacija($g_n);

}

 foot();
?>
	
