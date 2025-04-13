<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
 $statusai = array("Mod","Mod2","Mod3","Mod4","Admin");
$zin =post($_GET['zinute']);

$nick = $_COOKIE['vardas'];
        if(empty($zin)){
            echo '<font color="red">Tuščia žinutė!</font><br/>';}

        elseif($lygis < 25 && !in_array($apie['statusas'], ['Kurejas', 'Admin'])){
            echo '<font color="red">Per mažas tavo lygis!</font><br/>';
        }
		elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

}
			  elseif($apie['veiksmai'] < 4999 && !in_array($apie['statusas'], ['Kurejas', 'Admin'])){
               echo '<font color="red">Rašyti galima nuo 5000 laimėtų kovų</font><br/>';
            }
			

        elseif(strlen($zin) < 4){
            echo '<font color="red">Per trumpa žinutė!</font><br/>';}
		
		elseif($_SESSION['chet']-time() > 0){
echo 'Antiflood!! rašyti galesi už <b>'.laikas($_SESSION['chet']-time(), 1).' </b>.</div>';
	

        } 
		
		elseif(apsas($zin) == apsas('/clean') AND in_array($apie['statusas'],$statusai)){
			
			mysqli_query($conn,"TRUNCATE pokalbiai");
		   mysqli_query($conn,"INSERT INTO pokalbiai SET nick='".$nick."', sms='Išvaliau pokalbius :)', data='".time()."'");	
		}

        
      
            else{
            	
            mysqli_query($conn,"INSERT INTO pokalbiai SET nick='".$nick."', sms='$zin', data='".time()."'");
			  $_SESSION['chet'] = time()+5;
            
            mysqli_query($conn,"UPDATE zaidejai SET chate=chate+1, pliusai=pliusai+'5' WHERE nick='$nick'");

    mysqli_query($conn,"UPDATE  bendravimo_top SET sms=sms+'1'  WHERE nick='$nick'");
            echo '<font color="green">Žinutė įrašyta!</font><br/>';
			}


        ?>

