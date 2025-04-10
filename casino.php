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

if($id == ''){
	
	  top('Kazino');
      
 echo '
  <div class="meniuc"> Žaidimo aparatas iš litų, reike atspėti skaičių ir gausite dvigubai daugiau litų nei pastatėte.</div>
 
 <div class="meniuc">
   <form action="?id=statau" method="post"/>
   Statoma suma(LTL):<br /><input type="text" name="litaia"/><br />
    Skaičius(1-5):<br /><input type="text" name="skaicius"/><br />
   
   <input type="submit" name="submit" value="Statyti"/>
   </div>
 ';
  
   
   


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","Kazino");
	navigacija($g_n);

}
	if($id == 'statau'){
		top('Kazino');
		 if(isset($_POST['submit'])){
       $litaia = isset($_POST['litaia']) ? preg_replace("/[^0-9]/","",$_POST['litaia'])  : null;
       $skaicius = isset($_POST['skaicius']) ? preg_replace("/[^1-5]/","",$_POST['skaicius'])  : null;
	   if(empty($skaicius) or empty($litaia)){echo'<div class="meniuc">Tuščias laukelis..</div>';
	  }else{
	   if($apie['sms_litai'] < $litaia){echo'<div class="meniuc">Neturi tiek litų</div>';
	 }else{
		if($skaicius > 5 or $skaicius < 1){echo'<div class="meniuc">Tokio skaičiaus naudoti negalima</div>';
		}
		elseif(strlen($skaicius) > 1){echo'<div class="meniuc">Tokio skaičiaus naudoti negalima</div>';
		}
		else{
		$_SESSION['randas'] = rand(1,5);
		if($skaicius == $_SESSION['randas']){
			echo'<div class="meniuc">Atspėjai!! iškrito '.$_SESSION['randas'].'</div>';
			$laimejimas = $litaia * 2;
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai +'$laimejimas' WHERE nick='$nick'")or die(mysqli_error());
		}else{
			echo "<div class='meniuc'>Deja pralaimėjai... iškrito ".$_SESSION['randas']."</div>";
			mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai -'$litaia' WHERE nick='$nick'")or die(mysqli_error());
		}
		 
	}}}} $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php?id=","Miestas","casino.php", "Kazino", "Kazino žaidimas");
	navigacija($g_n);}



 foot();
?>
