<?php
ob_start();

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

	  

   $prizas = $nust['sms_priz'];
	$prizas2 = round($nust['sms_priz']) / 2;
	$prizas3 = round($nust['sms_priz']) / 3;
 $statusai = array("Mod","Mod2","Mod3","Mod4","Admin");
$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
$new = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1"));
$xd = mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick= $nick");
head2();
if($nust['new_time']-time() > 0){
    $q = mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1");
   
    while($row = mysqli_fetch_assoc($q)){
        echo '<div class="meniuc">Padarytas atnaujinimas: '.$row[name].'</div>';
      
        unset($row);
    }
}
	   


baneris();
		topbar();

	
		
if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kvietimai_i_komanda WHERE nick2='$nick'")) == true){
	echo"<div class='meniuc'><font color='red'>Dėmesio! Tu kviečiamas į ".$team_pakv['team']." komandą!</font><br>
	<a href='komanda.php?id=atmesti&ka=".$team_pakv['team']."'>Atmesti</a> <a href='komanda.php?id=priimti&ka=".$team_pakv['team']."'>Priimti</a>
	</div>";
	}
if($id == ""){
	 online('VIP Treniruotės');
   top('VIP Treniruotės');
    echo'<div class="meniuc"><img src="img/imgg/vip.png" /></div>';

echo'<div class="up">'.$ico.'VIP Treniruotės</div>
<div class="meniuc">
<a href="?id=viptren15"><img src="img/bicons/vip.png">VIP 15</a> | <a href="?id=viptren20"><img src="img/bicons/vip.png">VIP 20</a> | <a href="viptren.php?id=viptren25"><img src="img/bicons/vip.png">VIP 25</a>

</div>
';


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","VIP treniruotės");
	navigacija($g_n);
}

if($id == "viptren15"){
    online('VIP Treniruotės');
	top('VIP Treniruotės');
	  if($inv['viplvl'] < '14')	{
	  	  echo '<div class="meniuc"><img src="img/imgg/vip.png"></div>';
		echo'<div class="meniu"><center>Tu neturi <b>15 VIP LVL</b> !</center></div>';
				
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
	


		}
		else{
			
			
echo '<div class="meniuc"><img src="img/imgg/vip.png" border="0" alt="*"></div>';
   echo '<div class="meniuc">
<b>   Treniruotės yra pigesnės nei visur kitur!</b> <br>Vienos treniruotės kaina <b>1100</b> <img src="img/bicons/pinigai.png" border="0" alt="*"></div><div class="titlec">
   Turi <img src="img/bicons/pinigai.png" border="0" alt="*"> <b>'.sk($litai).'</b><br/>
  Gali Treniruotis: <b>'.sk($litai/1100).'</b> kartų.<br/>
   </div>';
   if(isset($_POST['submit'])){
       $kgg = isset($_POST['kg']) ? preg_replace("/[^0-9]/","",$_POST['kg'])  : null;
    
       $kgg2 = $kgg * 1100;
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
            mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$kgg4', gynyba=gynyba+'$kgg3', litai=litai-'$kkiek' WHERE nick='$nick' ");

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
            echo '. Tau kainavo <b>'.skaicius($kkiek).'</b> <img src="img/bicons/pinigai.png" border="0" alt="*">.</div>';
      }
    }
   echo '<div class="meniuc">
   <form action="?id=viptren15" method="post"/>
    Kiek treniruosite:<br /><input type="text" name="kg"/><br />
 
   <input type="submit" name="submit" value="Treniruotis"/>
   </div>';
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
}}
if($id == "viptren20"){
    online('VIP Treniruotės');
	top('VIP Treniruotės');
	  if($inv['viplvl'] < '19')	{
	  	  echo '<div class="meniuc"><img src="img/imgg/vip.png"></div>';
		echo'<div class="meniu"><center>Tu neturi <b>20 VIP LVL</b> !</center></div>';
				
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
	


		}
		else{
			
			
echo '<div class="meniuc"><img src="img/imgg/vip.png" border="0" alt="*"></div>';
   echo '<div class="meniuc">
<b>   Treniruotės yra pigesnės nei visur kitur!</b> <br>Vienos treniruotės kaina <b>1000</b> <img src="img/bicons/pinigai.png" border="0" alt="*"></div><div class="titlec">
   Turi <img src="img/bicons/pinigai.png" border="0" alt="*"> <b>'.sk($litai).'</b><br/>
  Gali Treniruotis: <b>'.sk($litai/1000).'</b> kartų.<br/>
   </div>';
   if(isset($_POST['submit'])){
       $kgg = isset($_POST['kg']) ? preg_replace("/[^0-9]/","",$_POST['kg'])  : null;
    
       $kgg2 = $kgg * 1000;
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
            mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$kgg4', gynyba=gynyba+'$kgg3', litai=litai-'$kkiek' WHERE nick='$nick' ");

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
            echo '. Tau kainavo <b>'.skaicius($kkiek).'</b> <img src="img/bicons/pinigai.png" border="0" alt="*">.</div>';
      }
    }
   echo '<div class="meniuc">
   <form action="?id=viptren20" method="post"/>
    Kiek treniruosite:<br /><input type="text" name="kg"/><br />
 
   <input type="submit" name="submit" value="Treniruotis"/>
   </div>';
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
}}

if($id == "viptren25"){
    online('VIP Treniruotės');
	top('VIP Treniruotės');
	  if($inv['viplvl'] < '24')	{
	  	  echo '<div class="meniuc"><img src="img/imgg/vip.png"></div>';
		echo'<div class="meniu"><center>Tu neturi <b>25 VIP LVL</b> !</center></div>';
				
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
	


		}
		else{
			
			
echo '<div class="meniuc"><img src="img/imgg/vip.png" border="0" alt="*"></div>';
   echo '<div class="meniuc">
<b>   Treniruotės yra pigesnės nei visur kitur!</b> <br>Vienos treniruotės kaina <b>500</b> <img src="img/bicons/pinigai.png" border="0" alt="*"></div><div class="titlec">
   Turi <img src="img/bicons/pinigai.png" border="0" alt="*"> <b>'.sk($litai).'</b><br/>
  Gali Treniruotis: <b>'.sk($litai/500).'</b> kartų.<br/>
   </div>';
   if(isset($_POST['submit'])){
       $kgg = isset($_POST['kg']) ? preg_replace("/[^0-9]/","",$_POST['kg'])  : null;
    
       $kgg2 = $kgg * 500;
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
            mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$kgg4', gynyba=gynyba+'$kgg3', litai=litai-'$kkiek' WHERE nick='$nick' ");

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
            echo '. Tau kainavo <b>'.skaicius($kkiek).'</b> <img src="img/bicons/pinigai.png" border="0" alt="*">.</div>';
      }
    }
   echo '<div class="meniuc">
   <form action="?id=viptren25" method="post"/>
    Kiek treniruosite:<br /><input type="text" name="kg"/><br />
 
   <input type="submit" name="submit" value="Treniruotis"/>
   </div>';
   
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","vipas.php", "VIP", "VIP Treniruotės");
	navigacija($g_n);
}}



foot();
?>
