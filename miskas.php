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
	top('Miškas');
	$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;
	
	

echo'<div class="up">Vietovės</div>

<div class="meniu"> <img src="img/bicons/malka.png">  <a href="?id=malkur">Malkų rinkimas</a></br>
<img src="img/bicons/zuvis.png">	 <a href="?id=zvejybosr">Žuvų gaudymas</a><br>


</div>';
	
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Miškas");
	navigacija($g_n);
}
if($id == 'malkur'){
	top('Miškas');
	$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;
	
	echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>
<div class="meniuc"><b>Malkų rinkimas</b> - čia galite kelti malkų rinkimo lygį, kuo jis aukštesnis tuo daugiau malkų gausite už veiksmą!</div>
</div>';

	echo'<div class="up">Malkų rinkimas</div>
<div class="meniuc"><img src="img/bicons/malka.png"> Malkų rinkimo lvl: <b>'.$apie['malkur'].'</b></div>
<div class="meniu"><a href="?id=mal1&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>1 LVL </b> Malkų rinkimas</a></br>
<a href="?id=mal2&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>100 LVL </b> Malkų rinkimas</a><br>
<a href="?id=mal3&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>300 LVL </b> Malkų rinkimas</a><br>
<a href="?id=mal4&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>800 LVL </b> Malkų rinkimas</a><br>
<a href="?id=mal5&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>2000 LVL </b> Malkų rinkimas</a><br>
<a href="?id=mal6&kodas='.$kodas.'"><img src="img/bicons/malka.png"> <b>5000 LVL </b> Malkų rinkimas</a>
</div>
';
	
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);
}
if($id == 'zvejybosr'){
	top('Žuvų gaudymas');
	$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;
	
	echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>
<div class="meniuc"><b>Žuvų gaudymas</b> - čia galite kelti Žuvų gaudymo lygį, kuo jis aukštesnis tuo daugiau žuvų gausite už veiksmą!</div>
</div>';

	echo'<div class="up">Žuvų gaudymas</div>
<div class="meniuc"><img src="img/bicons/zuvis.png"> Žuvų gaudymo lvl: <b>'.$apie['zvejybosr'].'</b></div>
<div class="meniu"><a href="?id=zvej1&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>1 LVL </b>Žuvų gaudymo</a></br>

<a href="?id=zvej2&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>100 LVL </b>Žuvų gaudymo </a></br>
<a href="?id=zvej3&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>300 LVL </b>Žuvų gaudymo </a></br>
<a href="?id=zvej4&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>800 LVL </b>Žuvų gaudymo </a></br>
<a href="?id=zvej5&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>2000 LVL </b>Žuvų gaudymo </a></br>
<a href="?id=zvej6&kodas='.$kodas.'"><img src="img/bicons/zuvis.png"> <b>5000 LVL </b>Žuvų gaudymo </a></br>
</div>
';
	
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);
}
// žuvų 
if($id == 'zvej1'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '0'){
			echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,3);
		$randas3 =rand(1,2);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">1 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej1&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'zvej2'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '99'){
			echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(2,4);
		$randas3 =rand(2,3);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">100 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej2&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'zvej3'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '299'){
			echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(3,6);
		$randas3 =rand(3,5);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">300 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej3&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}

if($id == 'zvej4'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '799'){
			echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(5,10);
		$randas3 =rand(4,8);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">800 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej4&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}

if($id == 'zvej5'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '1999'){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(6,13);
		$randas3 =rand(5,11);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">2000 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej5&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}

if($id == 'zvej6'){
top('Žuvų gaudymas');
	if($kodas != $_SESSION[kd]){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['zvejybosr']) < '4999'){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Žuvų gaudymo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Žuvų gaudymas");
	navigacija($g_n);

}
	elseif($_SESSION[zuvis] > time()){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
		echo'<div class="meniuc">Per greit gaudai galėsi po '.laikas($_SESSION[zuvis]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[zuvis] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(8,16);
		$randas3 =rand(7,13);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/zvejyba.png" border="1"></div>';
echo'<div class="up">5000 LVL Žuvų Gaudymas</div>';
            echo'<div class="meniuc">Viso žuvų: '. $inv['Zuvis'] .' </div>';
echo'<div class="meniuc">Pagavai<b> '.$randas2.' </b><img src="img/bicons/zuvis.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Žuvų gaudymo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET zvejybosr=zvejybosr+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=zvej6&kodas='.$kodas.'">Gaudyti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žuvų gaudymas");
	navigacija($g_n);
	}
	
	
	
}



// malkųų 
if($id == 'mal1'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '0'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(1,5);
		$randas3 =rand(1,3);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">1 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=mal1&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'mal2'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '99'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(2,9);
		$randas3 =rand(2,4);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">100 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=mal2&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'mal3'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '299'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(3,13);
		$randas3 =rand(3,6);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">300 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=mal3&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'mal4'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '799'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(4,16);
		$randas3 =rand(4,8);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">800 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=mal4&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'mal5'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '1999'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(5,20);
		$randas3 =rand(5,10);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">2000 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'");
		}
	
		echo'<div class="meniuc"><a href="?id=mal5&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}
if($id == 'mal6'){
top('Malku rinkimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif(($apie['malkur']) < '4999'){
			echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Malkų rinkimo lvl</b>!  </div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php","Miškas", "Malkų rinkimas");
	navigacija($g_n);

}
	elseif($_SESSION[malkos] > time()){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
		echo'<div class="meniuc">Per greit renki galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,1);
		$randas2 =rand(6,22);
		$randas3 =rand(6,14);
		if($randas == 1){
echo'<div class="meniuc"><img src="img/miskas.png" border="1"></div>';
echo'<div class="up">5000 LVL Malkų rinkimas</div>';
            echo'<div class="meniuc">Viso malkų: '. $inv['Malkos'] .' </div>';
echo'<div class="meniuc">Radai<b> '.$randas2.' </b><img src="img/bicons/malka.png"><br>Gavai +<font color="red">'.$randas3.'</font><b> Malkų rinkimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET Malkos=Malkos+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET malkur=malkur+'$randas3' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'");

		}
	
		echo'<div class="meniuc"><a href="?id=mal6&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Malkų rinkimas");
	navigacija($g_n);
	}
	
	
	
}

if($id == 'zvej'){
top('Žvejojimas');
	if($kodas != $_SESSION[kd]){
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	elseif($_SESSION[malkos] > time()){
		echo'<div class="meniuc">Per greit žvejoji galėsi po '.laikas($_SESSION[malkos]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Klaida");
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[malkos] = time()+3;
		$randas = rand(1,3);
		$randas2 =rand(1,3);
		if($randas == 1){echo'<div class="meniuc">Deja nepagavai žuvies</div>';
	
		}
		if($randas == 2){echo'<div class="meniuc">Pavagai '.$randas2.'  žuvų</div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
            if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
		if($randas == 3){echo'<div class="meniuc">Pagavai '.$randas2.' didelių žuvu</div>';
	mysqli_query($conn,"UPDATE inv SET Zuvis=Zuvis+'$randas2' WHERE nick='$nick'");
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
		}
		echo'<div class="meniuc"><a href="?id=zvej&kodas='.$kodas.'">Rinkti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miskas.php", "Miskas", "Žvejojimas");
	navigacija($g_n);
	}
	
	
	
}
foot();
