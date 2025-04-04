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
    online('siaurinis kajus');
	top('Šiaurinis kajus');
	  if($zaidejai['kai'] == '-')	{
	  	  echo '<div class="meniuc"><img src="img/kai.png"></div>';
		echo'<div class="meniu"><center>Tu neperejai gyvates kelio !</center></div>';
				
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pomirtinis.php", "Pomirtinis pasaulis", "Šiaurinis kajus");
	navigacija($g_n);
	


		}
		else{
			
			
echo '<div class="meniuc"><img src="img/imgg/kajus.png" border="0" alt="*"></br>';
   echo '
   Treniruotės yra mokamos! Vienos treniruotės kaina <b>1200</b> <img src="img/bicons/pinigai.png" border="0" alt="*"></div><div class="titlec">
   Turi <img src="img/bicons/pinigai.png" border="0" alt="*"> <b>'.sk($litai).'</b><br/>
  Gali Treniruotis: <b>'.sk($litai/1200).'</b> kartų.<br/>
   </div>';
   if(isset($_POST['submit'])){
       $kgg = isset($_POST['kg']) ? preg_replace("/[^0-9]/","",$_POST['kg'])  : null;
    
       $kgg2 = $kgg * 1200;
  $kgg4 = $kgg*1 ;
       $kgg3= $kgg*3 ;
       $kkiek = $kgg2;

        if($litai < $kkiek){
            $klaida = "Neturi pakankamai <img src='img/bicons/pinigai.png'>";
        }

        if(empty($kgg)){
            $klaida = " Palikai tuščia laukeli.";
        }

       if($klaida != ""){
            echo '<div class="titlec">'.$klaida.'</div>';
      } else {
            mysql_query("UPDATE zaidejai SET jega=jega+'$kgg4', gynyba=gynyba+'$kgg3', litai=litai-'$kkiek' WHERE nick='$nick' ");
            echo '<div class="titlec">Atlikta! Pasitreniravai';
            if($kjega == ""){} else {
                 echo ' <b>'.sk($kjega).'</b> Jėgos';
            }
            if($kjega == "" or $kgynyba == ""){} else {
                 echo ' ir';
            }
            if($kgynyba == ""){} else {
                 echo ' <b>'.sk($kgynyba).'</b> Gynybos';
            }
            echo '. Tau kainavo <b>'.sk($kkiek).'</b> <img src="img/bicons/pinigai.png" border="0" alt="*">.</div>';
      }
    }
   echo '<div class="meniuc">
   <form action="?id=" method="post"/>
    KIEK KG:<br /><input type="text" name="kg"/><br />
 
   <input type="submit" name="submit" value="Treniruotis"/>
   </div>';
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","pomirtinis.php", "Pomirtinis pasaulis", "Šiaurinis kajus");
	navigacija($g_n);
}}
  foot();
?>
