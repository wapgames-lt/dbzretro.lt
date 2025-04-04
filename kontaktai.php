<?php
error_reporting(0);
ob_start();
session_start();



include_once 'cfg/sql.php';
  head();

if($id == ''){

	
	echo'
	</script><div class="head"><div class="head_2">dbzretro.lt</div>
	<div class="head_3"><small>dbzretro.lt - Surink visus drakono rutulius ir užkariauk žaidima!</small></div></div>
	<div class="up"><small><b>KONTAKTAI</b></small></div><div class="linija-red"></div>';


	
	
	
	
	
	
	
	echo'<div class="meniu">
	'.$ico.' Nikas žaidime testas1</br>

	
	
	</div>
	';
	
	
	
	
	
	
	 $g_n[] = array("index.php?id=","Pagrindinis","Kontaktai");
	navigacija($g_n);
	
}
if($id == 'css'){
if($ID < 1 OR $ID > 7){
	header("LOCATION:index.php");
}	
else{
	$_SESSION[css] = $ID;
	header("LOCATION:index.php");
}
	
}


 foot();
?>
