<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";


include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

		topbar();
		
$lotery = mysql_fetch_assoc(mysql_query("SELECT * FROM loterija WHERE nick ='$nick'"));
 if($id == ""){
 	top('Loterija');
      echo'
      <div class="meniuc">
<img src="img/imgg/loterija.png" alt="*"/><br/>
Kiekviena diena vyksta loterija, vienas žaidėjas gali per diena loterijoje registruotis kiek norite kartu, vieno <img src="img/bicons/ticket.png" alt="*"/> kaina 1  <img src="img/bicons/euro.png" />, kuo daugiau kartu perkate <img src="img/bicons/ticket.png" alt="*"/> tuo didesne tikimybe laimėti.<br/>
Pasibaigus dienai vienas žaidejas laimi visas loterijos fondą<br/>
Kuo daugiau žaidėjų perka <img src="img/bicons/ticket.png" alt="*"/>, tuo labiau auga loterijos prizinis fondas<br/>
</div><div class="meniu" style="text-align: left;">
Šiuo metu loterijos fonde: <b>'.$nust['lotery_priz'].'  <img src="img/bicons/euro.png" /></b>

</b></a><br/>Šiandien jūs jau nusipirkote <img src="img/bicons/ticket.png" alt="*"/> <b>'.sk($lotery['kiek']).'</b><br/>
Vakar loteriją laimėjos <a href="pagrindinis.php?id=apie&ka='.$nust[lotery_win].'">'.statusas($nust[lotery_win]).'</a></b><br/>
</div><div class="line"></div><div class="meniu" style="text-align: left;">';
$ID = rand(100000,999999);
$_SESSION[no_refresh] = $ID;
echo' '.$ico.' <a href="?id=remiu&ID='.$ID.'">Loterijos prizo parėmimas</a><br></div>';

///// bilietu pirkimas
    echo '<div class="meniuc">
        <form action="?id=perkub" method="post"/>
        Kiek <img src="img/bicons/ticket.png" alt="*"/> pirksite:<br /><input type="text" name="kiek"><br />
        <input type="submit" name="submit" value="Pirkti"/></form>
        </div>';
  

    
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Loterija");
	navigacija($g_n);
 ;}


if($id =='perkub'){
		
 top('Bilietu pirkimas');
    
   
   
        if(isset($_POST['submit'])){
            $kiek= isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
            $kainn = $kiek;
			$kiekis = $kiek  * 1;
		
            
            if(empty($kiek)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Nusipirkai '.sk($kiekis).'  <img src="img/bicons/ticket.png" alt="*"/>!</div>';
	           
	   if(!mysql_num_rows(mysql_query("SELECT * FROM loterija WHERE nick='$nick' ")))
{
	mysql_query("INSERT INTO loterija SET nick='$nick', kiek='$kiekis'");
}else{
mysql_query("UPDATE loterija SET kiek=kiek+'$kiekis' WHERE nick='$nick'");}
mysql_query("UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick'")or die(mysql_error());
  
mysql_query("UPDATE nustatymai SET lotery_priz=lotery_priz+'$kiekis'")or die(mysql_error());


			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","lotery.php?id=","Loterija","Bilietų pirkimas");
	navigacija($g_n);}
		}




if($id =='remiu2'){
		
 top('Loterijos prizo didinimas');
    
   
   
        if(isset($_POST['submit'])){
            $kiek= isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
            $kainn = $kiek;
			$kiekis = $kiek  * 1;
		
            
            if(empty($kiek)){
                echo '<div class="meniuc">Palikai tuščią laukelį!</div>';
            }
            
            
	          elseif($kainn > $apie['sms_litai']){
	              echo '<div class="meniuc">Neturi pakankamai  <img src="img/bicons/euro.png" />!</div>';
	          } else {
	              echo '<div class="meniuc">Atlikta! Parėmei  '.sk($kiekis).'  <img src="img/bicons/euro.png" />!</div>';
	           
	   if(!mysql_num_rows(mysql_query("SELECT * FROM loterija WHERE nick='$nick' ")))
{
	mysql_query("INSERT INTO loterija SET nick='$nick', kiek='$kiekis1'");
}else{
mysql_query("UPDATE loterija SET kiek=kiek+'$kiekis11' WHERE nick='$nick'");}
mysql_query("UPDATE zaidejai SET sms_litai=sms_litai-'$kainn' WHERE nick='$nick'")or die(mysql_error());
  
mysql_query("UPDATE nustatymai SET lotery_priz=lotery_priz+'$kiekis'")or die(mysql_error());


			  }
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","lotery.php?id=","Loterija","Loterijos parėmimas");
	navigacija($g_n);}
		}



if($id == "remiu"){
 	top('Loterijos prizo didinimas');
      echo'
      <div class="meniuc">
<img src="img/imgg/loterija.png" alt="*"/><br/></div>';
///// bilietu pirkimas
    echo '<div class="meniuc">
        <form action="?id=remiu2" method="post"/>
        Kiek <img src="img/bicons/euro.png" alt="*"/> remsite:<br /><input type="text" name="kiek"><br />
        <input type="submit" name="submit" value="Paremti"/></form>
        </div>';
  

    
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","lotery.php?id=","Loterija","Loterijos parėmimas");
	navigacija($g_n);}
 


 foot();
?>
