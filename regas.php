<?php
error_reporting(0);
ob_start();
session_start();

include_once 'cfg/sql.php';

  head();
  
       if($nust['reg'] == "-"){
		   echo'</script><div class="head"><div class="head_2">dbzretro.lt</div><div class="linija-red"></div>';

top('Registracija');

       echo '<div class="meniuc"><b>Registracija išjungta!</br></div></div>';
  $g_n[] = array("index.php?id=","Pagrindinis","Registracija");
	navigacija($g_n);
       }





  
else{
  
  
  	   if($id == ""){
echo'</script><div class="head"><div class="head_2">dbzretro.lt</div></div><div class="linija-red"></div>';

echo'<div class="meniuc"><b>Už taisyklių pažeidimą, Ban, Delete, Ip ban, administracija pasilieka teisę keisti taisykles bet kada.</b></div>';
echo'<div class="up">Taisyklės</div>';
echo'
<div class="meniu"><b>1.1.</b> Draudžiama reklamuoti svetainę (nesvarbu kokia ji būtų ar filmų puslapis ar pažinčių svetainė)</br></div>

<div class="meniu"><b>1.2.</b> Draudžiama iš kitų žaidėjų vogti žaidimo resursus.</br></div>

<div class="meniu"><b>1.3.</b> Draudžiama nepargarbiai elgtis su žaidėjais, juos įžeidinėti, grasinti.</br></div>

<div class="meniu"><b>1.4.</b> Draudžiama žaidime keiktis.</br></div>

<div class="meniu"><b>1.5.</b> Žaidime galima turėti tik vieną vartotoją. (Jeigu žaidžiate su broliu ar dar kuo per tą patį ip adresą, būtina įspėti administraciją)</br></div>

<div class="meniu"><b>1.6.</b> Draudžiama prašyti administratoriaus žaidimo resursų ar statuso.</br></div>

<div class="meniu"><b>1.7.</b> Taisyklių nežinojimas yra nieko kito bet tik jūsų kaltė.</br></div>

<div class="meniu"><b>1.8.</b> Draudžiama pervedinėti ar kitais būdais gauti žaidimo resursų ir įvairių daiktų iš tų kurie turi tokį patį ip ir įrenginius (kai būna broliai ar dar koks giminaitis)</br></div>

<div class="meniu"><b>1.9.</b> Draudžiama naudoti programas kurios palengvintų žaidimą</br></div>

<div class="meniu"><b>1.10.</b> Negalima vogti kitų žaidėjų vartotojus, įvairius žaidimo resursus!</div>';

echo'<div class="up">Sutinku/Nesutinku</div>';
echo'
<div class="meniuc"><a href="registracija.php"><b>Sutinku su taisyklėm</b><b></a>  / </b><a href="index.php?id="><b>Nesutinku su taisyklėm</b></div>
';
	
	 $g_n[] = array("index.php?id=","Pagrindinis","Taisyklės");
	navigacija($g_n);
}}
 foot();
?>
