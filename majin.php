<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
if($id == ""){
			  online('Majin karys');
    top("Majin karys");

    echo '<div class="meniuc"><img src="img/imgg/majin.png" border="0"></div>';
if($apie['majin']-time() < 0){
    echo '<div class="meniuc">Tapus <b>Majin kariu</b> iš kovų lauko gausite <b>10%</b> daugiau  <img src="img/bicons/pinigai.png" /> ir <b>20%</b> daugiau <img src="img/bicons/exp.png" />  <br><b>  100<img src="img/bicons/euro.png" />   - 1 valanda.</b></div>';
     if($apie['majin']-time() < 0){
    echo '<div class="titlec">
        <form action="?id=majin2" method="post"/>
        Kiek pirksite:<br /><input type="number" name="kiekv"><br />
        <input type="submit" name="submit" value="Tapti"/></form>
        </div>';}}
	 else{
	 			
	 		
	 	 echo '<div class="meniuc">Majin kariu dar būsi <b>'.laikas($apie['majin']-time(), 1).'</b></div>';
	 }
  
    
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Majin karys");
	navigacija($g_n);
    
	 
}

elseif($id == "majin2"){
    online('Majin karys');
    top("Majin karys");
  
    if($apie['majin']-time() < 0){
        if(isset($_POST['submit'])){
            $kiekv = isset($_POST['kiekv']) ? preg_replace("/[^0-9]/","",$_POST['kiekv']) : null;
            $kainn = $kiekv*100;
		
            
            if(empty($kiekv)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            elseif($apie['majin']-time() > 0){
                echo '<div class="meniuc">Tu jau esi <b>Majin karys</b>!</div>';
            }


	          elseif($apie['sms_litai'] < $kainn){
	              echo '<div class="meniuc">Neturi pakankamai 
<img src="img/bicons/euro.png" />
</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Tapai <b>Majin kariu</b> būsi '.sk($kiekv).' val.</div>';
	              $timxx = time()+60*60*1*$kiekv;
	              mysql_query("UPDATE zaidejai SET majin='$timxx' WHERE nick='$nick' ");
				   mysql_query("UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick' ");
			  }   
		} }
        
         $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Majin karys");
	navigacija($g_n);
    }

foot();
?>
