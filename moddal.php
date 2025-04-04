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
online("MOD FORTUNA RATAS");
top("MOD FORTUNA RATAS");
echo '<div class="meniuc"><img src="img/fortuna.png"></br></div>';
echo'<div class="up">Informacija</div>';
echo"<div class='meniuc'>Tai yra MOD FORTUNA RATAS, usiregistrave galite laimetu mod statusa tad registruokis ir nepraleisk progos<img src='/img/smile/6.png'></div>";
echo"<div class='meniuc'>MOD FORTUNA RATAO , rezultatai bus paskelbti <font color ='red'><b>2020-02-01 (Šeštadienį) 20:00H</b></font></div>";
echo "<div class='meniuc'><a href='moddal.php?id=regas'><font color='red'><b>->SPAUSK REGISTRACIJA!!!<-</b></font></a></div>";
echo "<div class='up'>Usiregistravusiu:</div>";
echo "<div class='meniu'>";

$query = mysql_query("SELECT * FROM moddal ORDER BY (0+ vksm) DESC LIMIT 0,20");
while($row = mysql_fetch_assoc($query)){
$vt++;
echo " <b>".$vt."</b>. <a href='pagrindinis.php?id=apie&ka=".$row['nick']."'>  ".$row['nick']."</a><br/>";

}
echo'</div><div class="up">Laimetojas</div>';
echo " <div class='meniuc'><b><a href='pagrindinis.php?id=apie&ka=".$nust['nick']."'>  ".$nust['nick']."</a></b>";

echo "</div>";
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","MOD FORTUNA RATAS");
navigacija($g_n);

}

elseif($id == "regas"){
top('MOD FORTUNA RATAS');
online('MOD FORTUNA RATAS');

        if(mysql_num_rows(mysql_query("SELECT * FROM moddal WHERE nick='$nick' ")) > 0 ){
				echo '<div class="meniuc"><img src="img/fortuna.png"></br></div>';
                echo '<div class="meniuc">Tu jau usiregistraves!</div>';
            }else{
            	mysql_query("INSERT INTO moddal SET nick='$nick'");
				echo '<div class="meniuc"><img src="img/fortuna.png"></br></div>';
            	echo'<div class="meniuc"><b>Sėkmingai usiregistravai!</b></font></div>';	
            }
        
       
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","moddal.php", "MOD FORTUNA RATAS", "MOD FORTUNA RATO REGAS");
navigacija($g_n);
    }

foot();

?>
