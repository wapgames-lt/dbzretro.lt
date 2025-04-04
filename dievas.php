<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
$zaidejai = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick='$nick'"));

baneris();
topbar();
if($id == ""){
	top('Dievo namai');
	if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	
	
	 online('Dievo namai');
   
    echo '<div class="meniuc"><img src="img/imgg/namai.png"><alt="**"></br>
 
   Sveiki atvyke į dievo rūmus
    </div>
    <div class="up">Vietovės</div>
    <div class="meniu">
    '.$ico.' <a href="?id=time">Laiko ir sielos kambarys</a><br/>
       '.$ico.' <a href="?id=ieskoti">Ieskoti drakono rutuliu</a><br/>
     '.$ico.' <a href="?id=shenron">Kviesti dievą drakoną</a><br/>
       '.$ico.' <a href="sdievas.php?id=sdball"><b>Super Drakono rutuliai</b></a><br/>
 '.$ico.' <a href="sdievas.php?id=shenrons">Kviesti <b>Super Shenron</b></a><br/>

  
    </div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Dievo namai");
	navigacija($g_n);
	
	}
		
}

elseif($id == "ieskoti"){
	top('Drakono rutulių ieškojimas');
	online('Ieško drakono rutulių');
	if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	
	echo '<div class="meniuc"><img src=img/dievas.png><alt="**"></br>
   
   Drakono rutulių  radimas 50 %
    </div>
    
    <div class="title">
    '.$ico.' <a href="?id=ieskoti2">Ieškoti</a><br/>
  
     
    </div>';
}
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Rutulių ieškojimas");
	navigacija($g_n);
	
	
}
elseif($id == "ieskoti2"){
	top('Drakono rutulių ieškojimas');
	online('Ieško drakono rutulių');
if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	


if ($inv['radaras'] < 1){
	echo'
	<div class="meniuc">Tu neturi radaro</div>
';  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Rutulių ieškojimas");
	navigacija($g_n);
}

elseif ($zaidejai['dbal'] > time()){
	echo'
	<div class="meniuc">Ieskoti galima kas valanda !!!</div>
';  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Rutulių ieškojimas");
	navigacija($g_n);}

elseif ($inv['radaras'] >= 1){

if ($randas == 1){
	echo'
	<div class="meniuc">Radai drakono rutulį!</div>
'; 
mysql_query("UPDATE inv SET dball=dball+'1' WHERE nick='$nick'")or die(mysql_error());
$ko = time() + 3600;
mysql_query("UPDATE zaidejai SET dbal = '$ko' WHERE nick = '$nick' ");

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Rutulių ieškojimas");
	navigacija($g_n);}

else{
echo'
	<div class="meniuc">Neradai rutulio....</div>
	';  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Rutulių ieškojimas");
	navigacija($g_n);
	$ko = time() + 3600;
mysql_query("UPDATE zaidejai SET dbal = '$ko' WHERE nick = '$nick' ");}
}
}}
elseif($id == "shenron"){
	top('Žemės dievas drakonas');
   online('Kviečią Žemės Dievą drakoną');
if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	

 if($inv['dball'] < 6 ){
 	echo '<div class="meniuc"><img src="img/shenron.png" alt="*"></div>';
	  echo '<div class="meniuc">Neturi 7 drakono rutulių!</div>';
	
 }else{
   
      echo '<div class="meniuc"><img src="img/shenron.png" alt="*"></div>';
echo'<div class="meniuc">';
      if($co == 1){
         echo 'Jūsų noras išpildytas! Gavai 500 '.$kreditaii.'</div>';
         mysql_query("UPDATE zaidejai SET kred=kred+'500' WHERE nick='$nick' ");
      mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }
      elseif($co == 2){
         echo 'Jūsų noras išpildytas! Gavai '.sk(700000000).' '.$pinigaii.'</div>';
         mysql_query("UPDATE zaidejai SET litai=litai+'700000000' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }
      elseif($co == 3){
         echo 'Jūsų noras išpildytas! Gavai '.sk(100).' '.$eurui.'</div>';
         mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'20' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }
   elseif($co == 4){
         echo 'Jūsų noras išpildytas! Gavai '.sk(3000).' '.$auksiniaii.'</div>';
         mysql_query("UPDATE zaidejai SET auksiniai=auksiniai+'3000' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }   
elseif($co == 5){
         echo 'Jūsų noras išpildytas! Gavai '.sk(70).' <b>AD16  ITEM</b>!</div>';
         mysql_query("UPDATE inv SET ad16=ad16+'70' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }   
elseif($co == 6){
         echo 'Jūsų noras išpildytas! Gavai '.sk(70).' <b>Mikroskemų</b>!</div>';
         mysql_query("UPDATE inv SET Microshem=Microshem+'70' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }   
  elseif($co == 7){
         echo 'Jūsų noras išpildytas! Gavai '.sk(70).' <b>Majin Scroll</b>!</div>';
         mysql_query("UPDATE inv SET Majinsroll=Majinsroll+'70' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }      
elseif($co == 8){
         echo 'Jūsų noras išpildytas! Gavai '.sk(70).' <b>Stone</b>!</div>';
         mysql_query("UPDATE inv SET Stone=Stone+'70' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }   
 elseif($co == 9){
         echo 'Jūsų noras išpildytas! Gavai '.sk(70).' <b> Power Stone</b>!</div>';
         mysql_query("UPDATE inv SET Powerstone=Powerstone+'70' WHERE nick='$nick' ");
 mysql_query("UPDATE inv SET dball=dball-'7' WHERE nick='$nick'")or die(mysql_error());
      }   
      else {
         echo 'Sveikas '.statusas($nick).'. Koki norą nori kad išpildyčiau?</div>';
         echo '<div class="title">
         <b>1.</b> <a href="?id=shenron&co=1">Noriu už norą - <b> 500</b> '.$kreditaii.' </a><br/>
         <b>2.</b> <a href="?id=shenron&co=2">Noriu už norą - <b>'.sk(700000000).' </b> '.$pinigaii.' </a><br/>
         <b>3.</b> <a href="?id=shenron&co=3">Noriu už norą - <b>100</b> '.$eurui.'</a><br/>
<b>4.</b> <a href="?id=shenron&co=4">Noriu už norą -<b> 3000</b> '.$auksiniaii.'</a><br/>
<b>5.</b> <a href="?id=shenron&co=5">Noriu už norą -<b> 70</b> AD16 ITEM</a><br/>
<b>6.</b> <a href="?id=shenron&co=6">Noriu už norą -<b> 70</b> Mikroskemų</a><br/>
<b>7.</b> <a href="?id=shenron&co=7">Noriu už norą -<b> 70</b> Majin Scroll</a><br/>
<b>8.</b> <a href="?id=shenron&co=8">Noriu už norą -<b> 70</b> Stone</a><br/>
<b>9.</b> <a href="?id=shenron&co=9">Noriu už norą -<b> 70</b> Power Stone</a><br/>
         </div>';
      }
      }
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Žemės dievas drakonas");
	navigacija($g_n);
}


elseif($id == "time"){
    $times = date("H:i:s");
    online('Laiko ir Sielos kambarys');
	top('Laiko ir sielos kambarys');
 if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	 
      
        echo '<div class="meniuc"><img src="img/kambarys.png" border="0"></br>';
        if($times >'06:00:00' and $times < '21:00:00'){
            echo 'Laiko ir Sielos kambaryję jūsų jėga ir gynyba padidės 2%, įejas į Laiko ir Sielos Kambarį negalėsi žaisi žaidimę 1 valandą.</div>';
            echo '
            <div class="title">'.$ico.' <a href="?id=time2">Eiti į Laiko ir Sielos kambarį</a>
            </div>';
        } else {
            echo 'Į Laiko ir Sielos kambarį patekti galima nuo 20:00:00 iki 21:00:00 val.</div>';
        }
    
    }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);

}
elseif($id = "time2"){
   
    online('Laiko ir Sielos kambarys');
     top('Laiko ir Sielos kambarys');
if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	       
        echo '<div class="meniuc"><img src="img/kambarys.png" border="0"></div>';
 $times = date("H:i:s");
        if($times > '06:00:00' and $times < '21:00:00'){
            echo '<div class="meniuc">Sėkmingai įėjai į Laiko ir Sielos kambarį! Ten būsi 1 valandą. Jūsų jėga ir gynyba padidės 2%.</div>';
            $time = time()+60*60;
	
            $jegu = $jega*2/100;
            $jegos = $jega+$jegu;
	
            $gynyb = $gynyba*2/100;
            $gynybos = $gynyba+$gynyb;	

            mysql_query("UPDATE zaidejai SET jega='$jegos', gynyba='$gynybos',kambarys='$time' WHERE nick='$nick'");
        } else {
            echo '<div class="meniuc">Laiko ir Sielos kambarys uždarytas.</div>';
        }
}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
		
    }

elseif($id == "sdballs"){
	top('Super drakono rutukiai');
   online('Keičia rutulius');
if(($apie['lazdele'])== ''){
		echo '<div class="meniuc"><img src=img/imgg/namai.png><alt="**"></div>
    <div class="meniuc">
   Tu neturi lazdelės, todėl negali įeiti į dievo rūmus, lazdelę gali gauti karino bokšte!
 </div>  ';  

	
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Laiko ir sielos kambarys");
	navigacija($g_n);
}
	else{
	

 if($inv['dball'] < 700 ){
 	echo '<div class="meniuc"><img src="img/shenron.png" alt="*"></div>';
	  echo '<div class="meniuc">Neturi 700 drakono rutulių!</div>';
	
 }else{
   
      echo '<div class="meniuc"><img src="img/shenron.png" alt="*"></div>';
echo'<div class="meniuc">';
      if($ka == 1){
         echo 'Jūs išsikeitėte 700 drakono rutulių į <b>Super drakono rutulį</b>! </div>';
         mysql_query("UPDATE zaidejai SET sdball=sdball+'1' WHERE nick='$nick' ");
      mysql_query("UPDATE inv SET dball=dball-'700' WHERE nick='$nick'")or die(mysql_error());
      }
      
      else {
         echo 'Sveikas '.statusas($nick).'. Keiskite savo turimus rutulius į Super Rutulius!</div>';
         echo '<div class="title">
         <b>1.</b> <a href="?id=sdballs&ka=1">Keisti 700 drakono rutulių į <b>Super drakono rutulį</b>!</a><br/>
        
         </div>';
      }
 }     
   }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","dievas.php", "Dievo namai", "Keitimas");
	navigacija($g_n);
}



 foot();
?>
