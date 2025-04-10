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
	top('Bankas');
    echo '<div class="meniu">
    <b>Turi pinigu: '.sk($apie['litai']).' </b>
    <form action="?id=dedu" method="post">
    Kiek padėsi:<br/><input type="text" name="kiek" maxlength="100"/>

 
   
    </select>
    <input type="submit" name="submit" value="Padėti"></form>
   
    </div>
    
    <div class="line"></div>
    
    <div class="meniu">
    <b>Turi pinigu banke: '.sk($apie['b_zenu']).' </b>
    <form action="?id=imu" method="post">
    Kiek pasiimsi:<br/><input type="text" name="kiek" maxlength="100"/>
    
    <input type="submit" name="submit2" value="Paiimti"></form>
    </div>
  
    
    
    
    ';
	 echo '<div class="meniu">
    <b>Turi eurų: '.sk($apie['sms_litai']).' </b>
    <form action="?id=ltl" method="post">
    Kiek padėsi:<br/><input type="text" name="kiek" maxlength="100"/>

 
   
    </select>
    <input type="submit" name="submit" value="Padėti"></form>
   
    </div>
    
    <div class="line"></div>
    
    <div class="meniu">
    <b>Turi eurų banke: '.sk($apie['b_ltl']).' </b>
    <form action="?id=ltl2" method="post">
    Kiek pasiimsi:<br/><input type="text" name="kiek" maxlength="100"/>
    
    <input type="submit" name="submit2" value="Paiimti"></form>
    </div>
  
    
    
    
    ';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","Bankas");
	navigacija($g_n);
    
}
if($id == "dedu"){
	top('Bankas');
if(isset($_POST['submit'])){
        $kiek = isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
   if($kiek > $apie['litai']){
            $klaida = "Neturi tiek pinigu.";
        }
        if (preg_match("/[^0-9]/", $kiek)){
            $klaida = "Rašyti galima tik skaičius.";
        }
		
		
		if(empty($kiek)){
            echo '<div class="meniuc">Sėkmingai padėjai visus pinigus į banką!</div>';
			mysqli_query($conn,"UPDATE zaidejai SET b_zenu=b_zenu+'$apie[litai]', litai='0' WHERE nick='$nick' ");
        }
        elseif ($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'$kiek', b_zenu=b_zenu+'$kiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta, į banka padėjai <b>'.sk($kiek).'</b> '.$ka.'.</div>';
		
        }} $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","bank.php", "Banka", "Pinigų padėjimas");
	navigacija($g_n);}
    
  if($id == "imu"){
    if(isset($_POST['submit2'])){
        $kiek = isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
    
        if($kiek > $apie['b_zenu']){
            $klaida = "Neturi banke tiek pinigu.";
        }
        if (preg_match("/[^0-9]/", $kiek)){
            $klaida = "Rašyti galima tik skaičius.";
        }
		
		if(empty($kiek)){
            echo '<div class="meniuc">Sėkmingai pasiimiai visus pinigus iš banko!</div>';
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$apie[b_zenu]', b_zenu='0' WHERE nick='$nick' ");
        }
        elseif ($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysqli_query($conn,"UPDATE zaidejai SET b_zenu=b_zenu-'$kiek', litai=litai+'$kiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta, iš banko pasiėmei <b>'.sk($kiek).'</b> pinigu.</div>';
        
    }
    }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","bank.php", "Banka", "Pinigų paėmimas");
	navigacija($g_n);}
  
  
  
  
 if($id == "ltl"){
	top('Bankas');
if(isset($_POST['submit'])){
        $kiek = isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
   if($kiek > $apie['sms_litai']){
            $klaida = "Neturi tiek eurų.";
        }
        if(empty($kiek)){
            $klaida = "Neįrašei kiek padėsi.";
        }
        if (preg_match("/[^0-9]/", $kiek)){
            $klaida = "Rašyti galima tik skaičius.";
        }
        if ($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'$kiek', b_ltl=b_ltl+'$kiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta, į banka padėjai <b>'.sk($kiek).'</b> eurų.</div>';
		
        }} $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","bank.php", "Banka", "Pinigų padėjimas");
	navigacija($g_n);}
    
  if($id == "ltl2"){
    if(isset($_POST['submit2'])){
        $kiek = isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek']) : null;
    if(empty($kiek)){
            $klaida = "Neįrašei kiek paiimsi.";
        }
        if($kiek > $apie['b_ltl']){
            $klaida = "Neturi banke tiek pinigu.";
        }
        if (preg_match("/[^0-9]/", $kiek)){
            $klaida = "Rašyti galima tik skaičius.";
        }
        if ($klaida != ""){
            echo '<div class="meniuc">'.$klaida.'</div>';
        } else {
            mysqli_query($conn,"UPDATE zaidejai SET b_ltl=b_ltl-'$kiek', sms_litai=sms_litai+'$kiek' WHERE nick='$nick' ");
            echo '<div class="meniuc">Atlikta, iš banko pasiėmei <b>'.sk($kiek).'</b> eurų.</div>';
        
    }
    }
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","bank.php", "Banka", "Pinigų paėmimas");
	navigacija($g_n);}
 
	
  
   foot();
    ?>
