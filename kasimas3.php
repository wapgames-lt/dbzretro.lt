<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();

baneris();
topbar();
$kasimas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE id='$VS' "));
   if(empty($apie['kasimasa'])){
	
	mysqli_query($conn,"UPDATE zaidejai SET kasimasa='paprastas' WHERE nick='$nick'");
}
      	if($id == "auto_off"){
    online('Auto kasimas');
   echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
    echo '<div class="meniuc">Auto kasimas išjungtas!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET autok='-', kasimasa='-' WHERE nick='$nick' ");
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=kasykla","Kasykla", "Kasimo auto OFF");
	navigacija($g_n);
  
}
elseif($id == "auto_on"){
    online('Auto kasimas');
    echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
    echo '<div class="meniuc">Auto kasimas  įjungtas!</div>';
    mysqli_query($conn,"UPDATE zaidejai SET autok='+', kasimasa='paprastas' WHERE nick='$nick' ");
   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=kasykla","Kasykla", "Kasimo auto ON");
	navigacija($g_n);
	
}	           



elseif($id == "pap"){
    online('Auto kasimas');
    
   header('location:kasimas.php');
    mysqli_query($conn,"UPDATE zaidejai SET kasimasa='paprastas' WHERE nick='$nick' ");
   
	
}	          
if((int)$apie['vip']-time() > 0){
$kasimasa = 3;
 $padusimas = 3;
 
}
else{
 
 $kasimasa = 6;
 $padusimas = 6; 
}


if($id == ''){
	top('Rudų kasimas');


    $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM kasykla"))[0];
    echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Kasimas</b> - čia galite rasti įvairių užsiemimų!
</div>
<div class="meniuc"><a href="?id=rudushop"><font color="green"><b>Iškasenų parduotuvė</b></font></a></div>
<div class="meniuc"><a href="?id=kirtikliai"><font color="red"><b>Kirtiklių pirkimas</b></font></a></div>
<div class="meniuc"><a href="?id=kasimoreward"><font color="blue"><b>Kasimo LVL Reward</b></font></a></div>
';
   if($total > 0){
   echo '<div class="up"> Vietovės:</div>';
   
   $query = mysqli_query($conn,"SELECT * FROM kasykla Order by ID");
   while($row = mysqli_fetch_assoc($query)){
	
echo '<div class="meniu">';
         echo ' <img src="img/kasimas/'.$row['img'].'.png"alt="IMG" height="16" width="16" /><a href="kasimas.php?id=kasykla&ID='.$row['id'].'">'.$row['name'].' </a><br>';


       
echo '';

  
   echo'</div>';

  unset($row);
}
    $query = mysqli_query($conn,"SELECT * FROM kasykla2");
   while($row = mysqli_fetch_assoc($query)){
	
echo '<div class="meniu">';
         echo ' <img src="img/kasimas/'.$row['img'].'.png"height="16" width="16" /><a href="kasimas2.php?id=kasykla&ID='.$row['id'].'">'.$row['name'].' </a><br>';


      

  unset($row);
echo'</div>';
   
}

   } else {
         echo '<div class="meniuc">Kolkas  vietų nėra.</div>';
   }

/// bandau






			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis", "Kasykla");
	navigacija($g_n);
}


// reward
elseif($id == "kasimoreward"){
   online('Vygdo kasyklos misiją');
   top('Kasimo Lvl Reward');
   echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>
<div class="meniuc">
  Pasiek <b>'.skaicius(5000000).' LVL</b> kasimo ir tada galėsi įvygdyti šią kasimo misiją!<br>Įvygdžius gausi <b>Kasimo Rewardą</b>!<br>Su kuriuo kasykloje iškasi ne po <b>1</b> rūdą, o  po <b>2</b>!<br><small><b>P.S</b> su papildomai nupirkta paslauga už '.$eurui.' gausi po <b>3</b> rūdas!</small>
   </div><div class="titlec">
   <a href="?id=kasimoreward2">Pasiekiau reikiama lygį!</a>
   </div>';
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Kasykla", "Kasimo Lvl misija");
	navigacija($g_n);
}
elseif($id == "kasimoreward2"){
   online('Vygdo kasyklos misiją');
   top('Kasimo Lvl Reward');
 
 
   if($apie['kasimolvl'] < 4999999){
echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>';

      echo '<div class="meniuc">Tu neturi pasiekęs <b>'.skaicius(5000000).' LVL</b> Kasimo!</div>';}
elseif($apie['kasimoreward'] == '+'){
		echo'<div class="meniuc"><img src="img/kasimoreward.png" /></div>';
			echo'<div class="meniuc">Šią misiją jau esi įvygdęs!</div>';
		
	
}

   else{
echo '<div class="meniuc"><img src="img/kasimoreward.png"></div>';
      echo '<div class="meniuc">Sėkmingai įvygdei misiją!<br>Nuo šiol kasite po <b>2</b> rudas, o su paslauga po <b>3</b>!</div>';
       
      mysqli_query($conn,"UPDATE zaidejai SET kasimoreward='+' WHERE nick='$nick' ");}
 
    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Kasykla", "Kasimo Lvl reward");
	navigacija($g_n);

}



elseif($id == "rudushop"){
 
top('Iškasenų keitykla');
  


   online('Pardavinėja iškasenas');

echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Iškasenų parduotuvė</b> - čia galite keisti rudas į kitus dalykus!
</div>';
echo'<div class="up">Alavo iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> keisti į <b>200</b>'.$vipt.' <a href="?id=keiciua1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> keisti į <b>5</b>'.$eurui.' <a href="?id=keiciua2">[Keisti]</a>
</div>';
echo'<div class="up">Vario iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> keisti į <b>250</b>'.$vipt.' <a href="?id=keiciuv1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> keisti į <b>10</b>'.$eurui.' <a href="?id=keiciuv2">[Keisti]</a>
</div>';
echo'<div class="up">Kadmio iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> keisti į <b>300</b>'.$vipt.' <a href="?id=keiciuk1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> keisti į <b>15</b>'.$eurui.' <a href="?id=keiciuv2">[Keisti]</a>
</div>';
echo'<div class="up">Cirkonio iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> keisti į <b>400</b>'.$vipt.' <a href="?id=keiciuc1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> keisti į <b>20</b>'.$eurui.' <a href="?id=keiciuc2">[Keisti]</a>
</div>';
echo'<div class="up">Geležies iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> keisti į <b>500</b>'.$vipt.' <a href="?id=keiciug1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> keisti į <b>25</b>'.$eurui.' <a href="?id=keiciug2">[Keisti]</a>
</div>';
echo'<div class="up">Sidabro iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> keisti į <b>700</b>'.$vipt.' <a href="?id=keicius1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> keisti į <b>30</b>'.$eurui.' <a href="?id=keicius2">[Keisti]</a>
</div>';
echo'<div class="up">Aukso iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> keisti į <b>900</b>'.$vipt.' <a href="?id=keiciuaux1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> keisti į <b>35</b>'.$eurui.' <a href="?id=keiciuaux2">[Keisti]</a>
</div>';
echo'<div class="up">Platinos iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> keisti į <b>1,100</b>'.$vipt.' <a href="?id=keiciup1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> keisti į <b>40</b>'.$eurui.' <a href="?id=keiciup2">[Keisti]</a>
</div>';
echo'<div class="up">Titano iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> keisti į <b>1,300</b>'.$vipt.' <a href="?id=keiciut1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> keisti į <b>45</b>'.$eurui.' <a href="?id=keiciut2">[Keisti]</a>
</div>';
echo'<div class="up">Osmio iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> keisti į <b>1,500</b>'.$vipt.' <a href="?id=keiciuo1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> keisti į <b>50</b>'.$eurui.' <a href="?id=keiciuo2">[Keisti]</a>
</div>';

echo'<div class="up">Mangano iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> keisti į <b>1,700</b>'.$vipt.' <a href="?id=keicium1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> keisti į <b>55</b>'.$eurui.' <a href="?id=keicium2">[Keisti]</a>
</div>';
echo'<div class="up">Anglies iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> keisti į <b>1,900</b>'.$vipt.' <a href="?id=keiciuang1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> keisti į <b>60</b>'.$eurui.' <a href="?id=keiciuang2">[Keisti]</a>
</div>';
echo'<div class="up">Mineralų iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> keisti į <b>2,200</b>'.$vipt.' <a href="?id=keiciumin1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> keisti į <b>65</b>'.$eurui.' <a href="?id=keiciumin2">[Keisti]</a>
</div>';
echo'<div class="up">Spato iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/spato.png" alt="IMG" height="16" width="16"> keisti į <b>2,500</b>'.$vipt.' <a href="?id=keiciuspa1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/spato.png" alt="IMG" height="16" width="16"> keisti į <b>70</b>'.$eurui.' <a href="?id=keiciuspa2">[Keisti]</a>
</div>';
echo'<div class="up">Kvarco iškasenų</div>
<div class="meniuc">

<b>300</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> keisti į <b>2,800</b>'.$vipt.' <a href="?id=keiciukva1">[Keisti]</a><br>
<b>500</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> keisti į <b>75</b>'.$eurui.' <a href="?id=keiciukva2">[Keisti]</a>
</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų parduotuvė");
	navigacija($g_n);

}



elseif($id == "rudos"){
 
top('Kasykla');
  


   online('Kasykloje');

echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Turimos rūdos</b> - čia galite rasti rudas kurias turite išsikasęs!
</div>';
echo'<div class="up">Paprastos rūdos</div>
<div class="meniuc">
<b>'.$inv['alavas'].'</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['varis'].'</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['kadmis'].'</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['cirkonis'].'</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> |
<b>'.$inv['gelezis'].'</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> </div>
<div class="up">Vidutinės rūdos</div>
<div class="meniuc">
<b>'.$inv['sidabras'].'</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['auksas'].'</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['platina'].'</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['titanas'].'</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> </div>
<div class="up">Geros rūdos</div>
<div class="meniuc">
<b>'.$inv['osmis'].'</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> | 
<b>'.$inv['manganas'].'</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> 
</div>';
$g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}

elseif($id == "kasykla"){
 
top('Kasykla');
  


$KD = rand(9999,99999);
mysqli_query($conn,"UPDATE zaidejai SET kda2='$KD' WHERE nick='$nick'");
$ID = sk($_GET['ID']);
   online('Kasykloje');
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasykla3 WHERE id='$ID' "));
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Rudų kasimas</b> - čia galite kasti rudas ir kelti  rūdų kasimo  lygį, kuo jis aukštesnis tuo geresnę rūdą galima kasti!
</div>';
 if($autok == "paprastas"){
       $onoff = '<font color="green">Įjunkti</font>';
       $nurd = '<a href="kasimas.php?id=auto_off">Išjungti</a>';
   } else {
       $onoff = '<font color="red">Išjungti</font>';
       $nurd = '<a href="kasimas.php?id=auto_on">Ijungti</a>';  
   }
 echo'  <div class="titlec">Dabar auto kasimas <b>'.$onoff.'</b> ['.$nurd.']<br/></div>

  <div class="titlec">Dabar padusimai kas <b><font color="green">'.$padusimas.'</font></b> sec , auto kasimas kas <b><font color="green">'.$kasimasa.'</font></b> sec<br/></div>
';
if((int)$apie['kasimas2x']-time() > 0){
  echo '<div class="meniuc">Daugiau iškasamų rūdų tau galios: <b>'.laikas($apie['kasimas2x']-time(), 1).'</b></div>';
}
if((int)$apie['kasimolvl2x']-time() > 0){
  echo '<div class="meniuc">Daugiau kasimi LVL tau galios: <b>'.laikas($apie['kasimolvl2x']-time(), 1).'</b></div>';
}
echo'<div class="meniuc"><a href="?id=rudos"><font color="red"><b>Iškasti ištekliai</b></font></a></div>';
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasykla3 WHERE id='$ID' ")) == 0){
          echo '<div class="up"><b>Klaida!</b></div>';
          echo '<div class="meniuc">Tokios vietos nėra!</div>';
    } else {
        $total = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM kasyklav3 WHERE lokacija='$ID'"))[0];
        echo '<div class="up">'.$lok['name'].'</div>';
         if($total > 0){
      if($kg < $lok['nuo']){
header('Location:fight.php');
echo' <div class="meniuc"> Manai esi gudrus? :DD </div>';}
else{

    echo '<div class="meniu">'.$ico.' Rūda  <b> (Reikiamas kasimo lygis)</b></div>';


echo '<div class="up">'.$ico.'Jūsų (<b>'.$apie['kasimolvl'].'   LVL</b> kasimo)</div>';
             echo '';
             $query = mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE lokacija='$ID' ");
             while($row = mysqli_fetch_assoc($query)){
                   



echo'
<div class="meniu">';
echo'<img src="img/kasimas/'.$row['img'].'.png"alt="IMG" height="16" width="16" /><a href="kasimas3.php?id=kasu&ID='.$row['lokacija'].'&VS='.$row['id'].'&KD='.$KD.'"><b>'.$row['name'].'</b> (<b>'.skaicius($row['kasimolvl']).' LVL</b> kasimo )

</a>'; 




echo'</div>';}
                   unset($row);
             }
         echo '';
         } else {
              echo '<div class="meniuc">Kolkas išteklių nėra.</div>';
         
         
    }
}
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php?id=","Kasykla","Kasimas");
	navigacija($g_n);
}

if($id == 'kasu'){
    $onlineCount = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM online WHERE nick='$nick' AND vieta='Kovoja kovų lauke'"))[0];
    if ($onlineCount) {
        header('Refresh: 1; url=pagrindinis.php');
    }
		$ID = mysqli_real_escape_string($conn,htmlspecialchars($_GET['ID']));
			$VS = mysqli_real_escape_string($conn,htmlspecialchars($_GET['VS']));
	
$kasimas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE id='$VS' "));
			$KD = rand(9999,99999);
$ID = post($_GET['ID']);
$VS = post($_GET['VS']);
$KD = post($_GET['KD']);
   online('Kasykloje');
//// 2x kasimo lvl
  if((int)$apie['kasimolvl2x']-time() > 0){
$kasimas2x=2;}
  if((int)$apie['kasimolvl2x']-time() < 0){
$kasimas2x=1;}
/// 2x rudu
   if((int)$apie['kasimas2x']-time() > 0){
$kasimasx=1;}
if((int)$apie['kasimas2x']-time() < 0){
$kasimasx=0;}
/// reward
if($apie['kasimoreward'] == '+'){
$kasimoreward=1;}
if($apie['kasimoreward'] == ''){
$kasimoreward=0;}
   $lok = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasykla3 WHERE id='$ID' "));
   $mob = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE id='$VS' "));
   $m = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasykla3 WHERE id='$ID' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios vietos nėra!</div></div>';
    } else {
    if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE id='$VS' ")) == 0){
          echo '<div class="up">Klaida !</div>';
          echo '<div class="meniuc"><div class="error">Tokios iškasenos nėra!</div></div>';
    } }

	   if($m['kda2'] != $KD){
  
        top('Klaida');
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
          echo '<div class="meniu" style="text-align: center;">Taip kasti negalimą! Eikite atgal ir vėl kaskite!</div>';
    
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Klaida");
	navigacija($g_n);
	}

	elseif(($apie['kasimolvl']) < $kasimas
['kasimolvl']){
  
             
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'	<div class="meniuc">Tu neturi tokio <b>Rūdų kasimo lvl</b>!  </div> ';

			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);

}

	elseif($inv[$kasimas['kirtiklis']] < '1'){
  
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tu neturi <b>'.$kasimas['img'].' kirtiklio arba <b>Super Unikalaus</b> kirtiklio</b>!
</div> ';
			 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kasimas");
	navigacija($g_n);
}

	elseif($_SESSION[kasu] > time()){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
		echo'<div class="meniuc">Per greit kasi galėsi po '.laikas($_SESSION[kasu]-time(), 1).'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdos kasimas", "Klaida");
	navigacija($g_n);
	
	}
	else{


		   $KDS= rand(9999,99999);
    mysqli_query($conn,"UPDATE zaidejai SET kda2='$KDS' WHERE nick='$nick'");

             $query = mysqli_query($conn,"SELECT * FROM kasyklav3 WHERE lokacija='$ID' ORDER BY id='$VS' DESC LIMIT 1");
             while($row = mysqli_fetch_assoc($query)){
		$_SESSION[kasu] = time()+$padusimas;
		$randas = rand(1,6);
		$randas2 =rand(1,50)*rand($kasimasx+$kasimoreward,1+$kasimasx+$kasimoreward);
		$randas3 =rand($row['minlvl']*$kasimas2x,$row['maxlvl']*$kasimas2x);
		
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
echo'<div class="up">'.$row['kasimolvl'].' LVL Rūdu kasimas</div>';
if($apie['kasimas2x']-time() > 0){
  echo '<div class="meniuc">Gausite <b>2x</b> iškasamų rūdų dar: <b>'.laikas($apie['kasimas2x']-time(), 1).'</b></div>';
}
if($apie['kasimolvl2x']-time() > 0){
  echo '<div class="meniuc">Gausite <b>2x</b> kasimo LVL dar: <b>'.laikas($apie['kasimolvl2x']-time(), 1).'</b></div>';
}
echo'<div class="meniuc">Iškasei<b> '.$randas2.' </b><img src="img/kasimas/'.$row['img'].'.png" alt="IMG" height="16" width="16"> | Išviso turi: <b>'.$inv[$row['ruda']].'</b><img src="img/kasimas/'.$row['img'].'.png" alt="IMG" height="16" width="16"><br>Gavai +<font color="red">'.$randas3.'</font><b> Rūdų kasimo lygio</b><br>Turi <font color="red">'.skaicius($apie['kasimolvl']).'</font><b> Rūdų kasimo lygio</b></div>';
	mysqli_query($conn,"UPDATE inv SET $row[ruda]=$row[ruda]+'$randas2' WHERE nick='$nick'");
mysqli_query($conn,"UPDATE zaidejai SET kasimolvl=kasimolvl+'$randas3', vveiksmai=vveiksmai+'1', veiksmai=veiksmai+'1' WHERE nick='$nick'");

mysqli_query($conn,"UPDATE kasimotop SET surinkta=surinkta+'$randas3' WHERE nick='$nick'");

                 if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
                 if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
	}
	    
if($autok = '+' AND $apie['kasimasa'] == 'paprastas'){
    echo '<meta http-equiv="refresh" content="'.$kasimasa.'; url=kasimas3.php?id=kasu&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">';}	     



		echo'<div class="meniuc"><a href="kasimas3.php?id=kasu&ID='.$ID.'&VS='.$VS.'&KD='.$KDS.'">Kasti toliau</a></div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php", "Rūdų kasimas", "Kasimas");
	navigacija($g_n);
	}
	
	
	
}


if($id == 'kirtikliai'){
	top('Kirtiklių pirkimas');

	
	echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>
<div class="meniuc"><b>Kirtikliai</b> - čia įsigyti jums reikiamų kirtiklių norint kasti geras rūdas!
</div>
<div class="up">Kirtikliai</div>


<div class="meniuc">
<b>Alavo kirtiklis  </b><br> Kaina - 20'.$eurui.' <a href="?id=kirtalavo"> [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Vario kirtiklis </b><br> Kaina - 40'.$eurui.' | 75 <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">   <a href="?id=kirtvario">[<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Kadmio kirtiklis </b><br> Kaina - 70'.$eurui.' | 100 <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> <a href="?id=kirtkadmio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Cirkonio kirtiklis  </b><br> Kaina - 100'.$eurui.' | 120 <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> <a href="?id=kirtcirkonio">  [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b>Geležies kirtiklis  </b><br> Kaina - 120'.$eurui.' | 200 <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"><a href="?id=kirtgelezies"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Sidabro kirtiklis  </b><br> Kaina - 150'.$eurui.' | 250 <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"><a href="?id=kirtsidabro"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Aukso kirtiklis  </b><br> Kaina - 200'.$eurui.' | 300 <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"><a href="?id=kirtaukso"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Platinos kirtiklis  </b><br> Kaina - 250'.$eurui.' | 350 <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"><a href="?id=kirtplatinos"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Titano kirtiklis  </b><br> Kaina - 300'.$eurui.' | 500 <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"><a href="?id=kirttitano"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Osmio kirtiklis  </b><br> Kaina - 350'.$eurui.' | 800 <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"><a href="?id=kirtosmio"> [<b>Pirkti</b>]</a>
</div>
<div class="meniuc">
<b>Mangano kirtiklis  </b><br> Kaina - 400'.$eurui.' | 1200 <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"><a href="?id=kirtmangano"> [<b>Pirkti</b>]</a></div>
<div class="meniuc">
<b> Unikalus kirtiklis  </b><br> Kaina - 1200'.$eurui.' | 5000 <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"><a href="?id=kirtunikalus"> [<b>Pirkti</b>]</a>
</div>
';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rudų kasimas","Kirtiklių pirkimas");
	navigacija($g_n);
}
if($id == "kirtalavo"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai']) < '19'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" />
</div> ';}
elseif($inv['alavok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Alavo kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'20' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET alavok=alavok+'1' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtvario"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '39' || $inv['alavas'] < '74')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['variok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Vario kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'40' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET variok=variok+'1', alavas=alavas-'75' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtkadmio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '69' || $inv['varis'] < '99')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['kadmiok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Kadmio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'70' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kadmiok=kadmiok+'1', varis=varis-'100' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtcirkonio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '99' || $inv['kadmis'] < '119')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['cirkoniok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Cirkonio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'100' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET cirkoniok=cirkoniok+'1', kadmis=kadmis-'120' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtgelezies"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '119' || $inv['cirkonis'] < '199')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['geleziesk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Geležies kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'120' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET geleziesk=geleziesk+'1', cirkonis=cirkonis-'200' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtsidabro"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '149' || $inv['gelezis'] < '249')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['sidabrok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Sidabro kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'150' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET sidabrok=sidabrok+'1', gelezis=gelezis-'250' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtaukso"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '199' || $inv['sidabras'] < '299')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['auksok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Aukso kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET auksok=auksok+'1', sidabras=sidabras-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}	
if($id == "kirtplatinos"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '249' || $inv['auksas'] < '349')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['platinosk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Platinos kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'250' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET platinosk=platinosk+'1', auksas=auksas-'350' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirttitano"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '299' || $inv['platina'] < '499')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['titanok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Titano kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'300' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET titanok=titanok+'1', platina=platina-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtosmio"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '349' || $inv['titanas'] < '799')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['osmiok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Osmio kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'350' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET osmiok=osmiok+'1', titanas=titanas-'800' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtmangano"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '399' || $inv['osmis'] < '1199')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['manganok'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Mangano kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'400' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET manganok=manganok+'1', osmis=osmis-'1000' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			
if($id == "kirtunikalus"){
	 online('Perka kirtiklį');
top('Kirtiklio pirkimas');
		
	if(($apie['sms_litai'] < '1199' || $inv['manganas'] < '4999')){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/bicons/euro.png" /> arba <img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!
</div> ';}
elseif($inv['unikalusk'] > '0'){
echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';
                echo '<div class="meniuc">Tu jau turi nusipirkęs šį kirtiklį!</div>';
            }
else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Nusipirkai sėkmingai <b>Unikalų kirtiklį</b>!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai-'1200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET unikalusk=unikalusk+'1', manganas=manganas-'5000' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Kirtiklio pirkimas");
	navigacija($g_n);
	

}			



if($id == "keicium1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['manganas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> į <b>1,700</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1700' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET manganas=manganas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keicium2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['manganas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>1,000</b><img src="img/kasimas/mangano.png" alt="IMG" height="16" width="16"> į <b>55</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'55' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET manganas=manganas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciua1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['alavas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> į <b>200</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET alavas=alavas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciua2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['alavas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/alavo.png" alt="IMG" height="16" width="16"> į <b>5</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'5' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET alavas=alavas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
	if($id == "keiciuv1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['varis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> į <b>250</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'250' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET varis=varis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuv2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['varis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/vario.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/vario.png" alt="IMG" height="16" width="16"> į <b>10</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'10' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET varis=varis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
	if($id == "keiciuk1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['kadmis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> į <b>300</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'300' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kadmis=kadmis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuk2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['kadmis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/kadmio.png" alt="IMG" height="16" width="16"> į <b>15</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'15' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kadmis=kadmis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuc1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['cirkonis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> į <b>400</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'400' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET cirkonis=cirkonis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuc2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['cirkonis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/cirkonio.png" alt="IMG" height="16" width="16"> į <b>20</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'20' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET cirkonis=cirkonis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				

	if($id == "keiciug1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['gelezis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> į <b>500</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'500' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET gelezis=gelezis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciug2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['gelezis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/gelezies.png" alt="IMG" height="16" width="16"> į <b>25</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'25' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET gelezis=gelezis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keicius1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['sidabras'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> į <b>700</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'700' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET sidabras=sidabras-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keicius2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['sidabras'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/sidabro.png" alt="IMG" height="16" width="16"> į <b>30</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'30' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET sidabras=sidabras-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciuaux1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['auksas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> į <b>900</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'900' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET auksas=auksas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuaux2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['auksas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/aukso.png" alt="IMG" height="16" width="16"> į <b>35</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'35' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET auksas=auksas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				

if($id == "keiciup1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['platina'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> į <b>1100</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1100' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET platina=platina-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciup2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['platina'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/platinos.png" alt="IMG" height="16" width="16"> į <b>40</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'40' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET platina=platina-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciut1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['titanas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> į <b>1300</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1300' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET titanas=titanas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciut2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['titanas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/titano.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/titano.png" alt="IMG" height="16" width="16"> į <b>45</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'45' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET titanas=titanas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciuo1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['osmis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> į <b>1500</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1500' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET osmis=osmis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuo2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['osmis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/osmio.png" alt="IMG" height="16" width="16"> į <b>50</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'50' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET osmis=osmis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciuang1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['anglis'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> į <b>1900</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'1900' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET anglis=anglis-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuang2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['anglis'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/anglies.png" alt="IMG" height="16" width="16"> į <b>60</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'60' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET anglis=anglis-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciumin1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['mineralai'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> į <b>2,200</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'2200' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET mineralai=mineralai-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciumin2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['mineralai'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/mineralu.png" alt="IMG" height="16" width="16"> į <b>65</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'65' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET mineralai=mineralai-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				
if($id == "keiciuspa1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['spatas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16"> į <b>2,500</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'2500' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET spatas=spatas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciuspa2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['spatas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/spatu.png" alt="IMG" height="16" width="16"> į <b>70</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'70' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET spatas=spatas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				

if($id == "keiciukva1"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['kvarcas'] < '299'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>300</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> į <b>2,800</b>'.$vipt.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET vipticket=vipticket+'2800' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kvarcas=kvarcas-'300' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}			
if($id == "keiciukva2"){
	 online('Išteklių parduotuvėje');
top('Iškasenų keitimas');
		
	if($inv['kvarcas'] < '499'){
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';

		echo'	<div class="meniuc">Tau nepakanka
<img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16">!
</div> ';}

else{
			echo'<div class="meniuc"><img src="img/kasimas/kasykla.png" border="1"></div>';	
	echo'	<div class="meniuc">Išsikeitei sėkmingai <b>500</b><img src="img/kasimas/kvarco.png" alt="IMG" height="16" width="16"> į <b>75</b>'.$eurui.'!
</div> ';		
mysqli_query($conn,"UPDATE zaidejai SET sms_litai=sms_litai+'75' WHERE nick='$nick' ");
	mysqli_query($conn,"UPDATE inv SET kvarcas=kvarcas-'500' WHERE nick='$nick' ");


		}
	

 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","kasimas.php","Rūdų kasimas", "Iškasenų keitimas");
	navigacija($g_n);
	

}				


foot();
