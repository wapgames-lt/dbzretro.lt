<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
topbar();
$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;

//$kodas .= $_SESSION[kd];
if($id == ''){
	top('Rudų kasimas');
	$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;
	
	echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Rudų kasimas</b> - čia galite kasti rudas ir kelti  rūdų kasimo  lygį, kuo jis aukštesnis tuo geresnę rūdą galima kasti!
</div>
<div class="meniuc"><a href="?id=kirtikliai"><font color="red"><b>Kirtiklių pirkimas</b></font></a></div>
';

	echo'<div class="up">Rudų kasimas</div>
<div class="meniuc"><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> 
Rūdų kasimo lvl: <b>'.$apie['kasimolvl'].'</b></div>
<div class="meniu">
<a href="?id=alavo&kodas='.$kodas.'"><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> Alavo rūda (<b>1 LVL </b> Rūdų kasimo)</a></br>
<a href="?id=vario&kodas='.$kodas.'"><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> Vario rūda (<b>200 LVL </b> Rūdų kasimo)</a></br>
<a href="?id=kadmio&kodas='.$kodas.'"><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> Kadmio rūda (<b>600 LVL </b> Rūdų kasimo)</a></br>
<a href="?id=cirkonio&kodas='.$kodas.'"><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> Cirkonio rūda (<b>1300 LVL </b> Rūdų kasimo)</a></br>
<a href="?id=gelezies&kodas='.$kodas.'"><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> Geležies rūda (<b>2000 LVL </b> Rūdų kasimo)</a></br>

</div>
';
	
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis", "Rudų kasimas");
	navigacija($g_n);
}
if($id == 'kirtikliai'){
	top('Kirtiklių pirkimas');

	
	echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Kirtikliai</b> - čia įsigyti jums reikiamų kirtiklių norint kasti geras rūdas!
</div>
<div class="up">Kirtikliai</div>


<div class="meniuc">
<b>Alavo kirtiklis  </b><br> Kaina - 20'.$eurui.' <a href="?id=kirtalavo"> [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Vario kirtiklis </b><br> Kaina - 40'.$eurui.' | 75 <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">   <a href="?id=kirtvario">[<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Kadmio kirtiklis </b><br> Kaina - 70'.$eurui.' | 100 <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> <a href="?id=kirtkadmio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Cirkonio kirtiklis  </b><br> Kaina - 100'.$eurui.' | 120 <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> <a href="?id=kirtcirkonio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Geležies kirtiklis  </b><br> Kaina - 150'.$eurui.' | 200 <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"><a href="?id=kirtgelezies"> [<b>Pirkti</b>]</a>
</div>
';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rudų kasimas","Kirtiklių pirkimas");
	navigacija($g_n);
}
if($id == "kirtalavo"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai']) < '19'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
elseif($inv['alavok'] > '1'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Alavo kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'20' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET alavok=alavok+'1' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtvario"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '39' || $inv['alavas'] < '74')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['variok'] > '1'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Vario kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'40' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET variok=variok+'1', alavas=alavas-'75' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtkadmio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '69' || $inv['varis'] < '99')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['kadmiok'] > '1'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Kadmio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'70' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kadmiok=kadmiok+'1', varis=varis-'100' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtcirkonio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '99' || $inv['kadmis'] < '119')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['cirkoniok'] > '1'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Cirkonio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'100' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET cirkoniok=cirkoniok+'1', kadmis=kadmis-'120' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtgelezies"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '149' || $inv['cirkonis'] < '199')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['geleziesk'] > '1'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Geležies kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'150' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET geleziesk=geleziesk+'1', cirkonis=cirkonis-'200' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == 'alavo'){
top('Alavo kasimas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['kasimolvl']) < '0'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}
	elseif(($inv['alavok']) < '1'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>Alavo kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kasu] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,1);
		$randas3 =rand(1,3);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">1 LVL Rūdu kasimas</div>';
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv['alavas'].'</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET alavas=alavas+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3' WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=alavo&kodas='.$kodas.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'vario'){
top('Vario kasimas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['kasimolvl']) < '199'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}
elseif(($inv['variok']) < '1'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>Vario kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kasu] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,1);
		$randas3 =rand(2,4);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">200 LVL Rūdu kasimas</div>';
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv['varis'].'</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET varis=varis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3' WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=vario&kodas='.$kodas.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'kadmio'){
top('Kadmio kasimas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['kasimolvl']) < '599'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}
elseif(($inv['kadmiok']) < '1'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>Kadmio kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kasu] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,1);
		$randas3 =rand(3,4);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">600 LVL Rūdu kasimas</div>';
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv['kadmis'].'</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET kadmis=kadmis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3' WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=kadmio&kodas='.$kodas.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'cirkonio'){
top('Cirkonio kasimas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['kasimolvl']) < '1299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}
elseif(($inv['cirkoniok']) < '1'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>Cirkonio kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kasu] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,1);
		$randas3 =rand(3,6);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">1300 LVL Rūdu kasimas</div>';
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv['cirkonis'].'</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET cirkonis=cirkonis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3' WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=cirkonio&kodas='.$kodas.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}

if($id == 'gelezies'){
top('Geležies kasimas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['kasimolvl']) < '1999'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}
elseif(($inv['geleziesk']) < '1'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>Geležies kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[kasu] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,1);
		$randas3 =rand(4,8);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">2000 LVL Rūdu kasimas</div>';
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv['gelezis'].'</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET gelezis=gelezis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3' WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=gelezies&kodas='.$kodas.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}


foot();
