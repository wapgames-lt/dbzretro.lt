<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';

topbar();
if($id == ""){
	 online('kapsule');
   
    echo '<div class="meniuc"><img src=img/gydymo.jpeg border="1" width="100" height="50"><alt="**"></div>
    <div class="meniuc">
   Sveiki, jei neturite pinigu givybių atstatymui galite gulti i kapsule, ir jusu gyvybės atsipildys, bet tai kainuos 1 kreditą.
    </div>
    
    <div class="meniu">
    [&#8226;] <a href="?id=gydo">Gulti i kapsule</a><br/>
     

     
    </div>';
    atgal('Į Pradžią-pagrindinis.php?id=');
	
	
		
}  
if($id == "gydo"){
	 online('kapsule');
   
    echo '<div class="meniuc"><img src=img/gydymo.jpeg border="1" width="100" height="50"><alt="**"></div>';
	
 
	
	
	
      mysqli_query($conn,"UPDATE zaidejai SET gyvybes='$apie[max_gyvybes]' WHERE nick='$nick'");
	  $ti = time()+30;
	    mysqli_query($conn,"INSERT INTO block SET nick = '$nick', uz='gydosi kapsuleja', kas_ban='SUPPORT', time='$ti'");
	      echo'<div class="meniuc">Tavo gyvybės papilditos sumokėjai 1 kreditą</div>';
    
  
      
 
   
    atgal('Į Pradžią-pagrindinis.php?id=');
	
}
		
 
 foot();
?>
