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
if($apie[gyvateskm] < 10000){

$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
$kodas = rand(1111,9999);
	
	$_SESSION[kd] = $kodas;

		top('Gyvatės kelio bėgimę');
echo '<div class="meniuc"><img src=img/img/gyvate.png border="1" width="180" height="90"><alt="**"></br></br>Norint patekti pas <b>Šiaurės Kajų</b> pirma turite užbėgti <b>Gyvatės keliu</b> !</div>

<div class="meniuc">
<b>Bėgti Gyvatės keliu</b><br>
 <a href="?id=begukm&kodas='.$kodas.'">Bėgti</a>('.$apie['gyvateskm'].'/<b>10000</b>)<br/>
</div>
<div class="meniuc"><a href="?id=uzbegimas"><b>Užbėgti iš karto</a></b>[<b>100</b>'.$eurui.']</div>
';
  
}

}

	if($id == "uzbegimas"){
    online('Gyvatės kelias');
  top('Gyvatės kelias');
if($apie[sms_litai] < 99){
echo '<div class="meniuc"><img src="img/img/gyvate.png" border="1"></div>';
echo '<div class="meniuc">Neturite pakankamai '.$eurui.' '; $g_n[] = array("pagrindinis.php?id=","Pagrindinis","snake.php?id=","Atgal","Gyvatės kelias");
echo'</div>';
	navigacija($g_n);
}
else{
	echo '<div class="meniuc"><img src="img/img/gyvate.png" border="1"></div>';
echo'<div class="meniuc">Sėkmingai! Užbėgote <b>Gyvatės keliu</b> už <b>100</b>'.$eurui.'!</div>';
mysqli_query($conn,"UPDATE zaidejai SET gyvateskm=gyvateskm+'10000', sms_litai=sms_litai-'100' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kai='+' WHERE nick='$nick' ");
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","snake.php?id=","Atgal","Gyvatės kelias");

	navigacija($g_n);
}
}


if($id == "begukm"){
  
  online('Gyvates kelias');
  top('Gyvatės kelias');
$kodas = isset($_GET[kodas]) ? $_GET[kodas] : null;
      	if($kodas != $_SESSION[kd]){
echo '<div class="meniuc"><img src=img/img/gyvate.png border="1" width="180" height="90"><alt="**"></div>';
		echo'<div class="meniuc">Perkrauti puslapio negalima, eik per nauja</div>';

	}
	elseif($_SESSION[gyvates] > time()){
echo '<div class="meniuc"><img src=img/img/gyvate.png border="1" width="180" height="90"><alt="**"></div>';
		echo'<div class="meniuc">Per greit bėgi! Bėgti galėsi po '.laikas($_SESSION[gyvates]-time(), 1).'</div>';
 echo'<div class="meniuc"><a href="?id=begukm&kodas='.$kodas.'">Bėgti toliau</a></div>';
	navigacija($g_n);
	}
	
	else{
		$kodas = rand(1111,9999);
		
		$_SESSION[kd] = $kodas;
		$_SESSION[gyvates] = time()+1;


       echo '<div class="meniuc"><img src=img/img/gyvate.png border="1" width="180" height="90"><alt="**"></div>';
 echo '<div class="meniuc">Sėkmingai! +<b>5km</b> Išviso nubėgęs: <b>'.$apie['gyvateskm'].'</b>Km!</div>';

mysqli_query($conn,"UPDATE zaidejai SET gyvateskm=gyvateskm+'5' WHERE nick='$nick'");
echo'<div class="meniuc"><a href="?id=begukm&kodas='.$kodas.'">Bėgti toliau</a></div>';
}

}

if($id == ""){
   if($apie[gyvateskm] > 9999){
 online('Gyvates kelias');
  top('Gyvatės kelias');
       mysqli_query($conn,"UPDATE zaidejai SET kai='+' WHERE nick='$nick' ");
       echo '<div class="meniuc"><img src="img/img/gyvate.png" border="1"></br>';
        echo 'Kadangi jau užbėgai <b>Gyvatės keliu</b>, dabar gali eiti treniruotis pas <b>Šiaurės Kajų</b> pigiau!</div>
<div class="meniuc"><a href="kai.php?id="><b>Šiaurės Kajus</b></a></div>
';
        
        echo '</div>';
    
   }
    



if($id == "snake"){
     if($apie[gyvateskm] > 10000){

  online('Gyvatės kelias');
   top('Gyvatės kelias');
       
        echo '<div class="meniuc"><img src="img/snake.png" border="1"></div>';
       if($apie['snake'] > 7) $err = 'Tokios užduoties nėra.';
       elseif($apie['snake'] < 1) $err = 'Tokios užduoties nėra.';
       elseif($apie['snake'] == 1 && $inv['Soul'] < 200) $err = 'Neturi 200 Soul!';
       elseif($apie['snake'] == 2 && $inv['Stone'] < 300) $err = 'Neturi 300 Stone!';
       elseif($apie['snake'] == 3 && $kreditai < 100) $err = 'Neturi 25 kreditų!';
       elseif($apie['snake'] == 4 && $inv['Microshem'] < 500) $err = 'Neturi 500 Microshem!';
       elseif($apie['snake'] == 5 && $inv['Sayiantail'] < 700) $err = 'Neturi 700 Sayian Tail!';
      
       elseif($apie['snake'] == 6 && $inv['Fusionfail']  < 600) $err = 'Neturi 600 Fusion Tail!';
      
       elseif($apie['snake'] == 7 && $inv['Dball']  < 7) $err = 'Neturi 7 Drakono rutuliu!';

       if(!empty($err)){
           echo '<div class="meniuc">'.$err.'</div>';
       } else {
          if($apie['snake'] == 1){
               $ko = "40 Lygio taškų.";
               mysqli_query($conn,"UPDATE zaidejai SET taskai=taskai+'40' WHERE nick='$nick'");
               mysqli_query($conn,"UPDATE inv SET Soul=Soul-'200' WHERE nick='$nick'")or die(mysqli_error());
          }
          elseif($apie['snake'] == 2){
               $ko = "".sk(200000)." pinigu.";
             mysqli_query($conn,"UPDATE inv SET Stone=Stone-'300' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'200000' WHERE nick='$nick'");
          }
         
          
          elseif($apie['snake'] == 3){
               $ko = "".sk(1000)." Jėgos.";
               mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'1000', kred=kred-'100' WHERE nick='$nick'");
          }
          elseif($apie['snake'] == 4){
               $ko = "".sk(2000)." Gynybos.";
              mysqli_query($conn,"UPDATE inv SET Microshem=Microshem-'500' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET gynyba=gynyba+'2000' WHERE nick='$nick'");
          }
          elseif($apie['snake'] == 5){
               $ko = "".sk(3000)." Gyvybių lygio.";
                mysqli_query($conn,"UPDATE inv SET Sayiantail=Sayiantail-'700' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET max_gyvybes=max_gyvybes+'3000' WHERE nick='$nick'");
          }
          
          elseif($apie['snake'] == 6){
               $ko = "1 Žemės Drakono rutulį.";
            mysqli_query($conn,"UPDATE inv SET Fusionfail=Fusionfail-'600' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"INSERT inventorius SET nick='$nick', daiktas='3', tipas='3' ");
          }
         
          elseif($apie['snake'] == 7){
               $ko = "10% savo jėgos ir gynybos.";
               $jg = $jega * 10/100;
               $gn = $gynyba * 10/100;
              mysqli_query($conn,"UPDATE inv SET Dball=Dball-'7' WHERE nick='$nick'")or die(mysqli_error());
               mysqli_query($conn,"UPDATE zaidejai SET jega=jega+'$jg, gynyba=gynyba+'$gn' WHERE nick='$nick' ");
          }
          echo '<div class="meniuc">Užduotis įvygdyta! Gavai '.$ko.'</div>';
          mysqli_query($conn,"UPDATE zaidejai SET snake=snake+'1' WHERE nick='$nick' ");
		   mysqli_query($conn,"UPDATE zaidejai SET kai='+' WHERE nick='$nick' ");
       }
}
  }  
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis", "Gyvatės kelias");
	navigacija($g_n);
}

 foot();
?>
