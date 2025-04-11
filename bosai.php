<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
$zaidejai = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$nick'"));
baneris();
topbar();
if($id == "auto_off"){
    online('Auto bosų kirtimas');
   
    echo '<div class="meniuc">Auto bosų kirtimas išjungtas!</div>';
    mysqli_query($conn,"UPDATE autoboss SET auto='-', autob='-' WHERE nick='$nick' ");
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bosai.php?id=","Bosai", "Bosų auto OFF");
	navigacija($g_n);
  
}
if($id == "auto_on"){
    online('Auto bosų kirtimas');
    
    echo '<div class="meniuc">Auto bosų kirtimas  įjungtas!</div>';
    mysqli_query($conn,"UPDATE autoboss SET auto='paprastas', autob='+' WHERE nick='$nick' ");
     $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bosai.php?id=","Bosai", "Bosų auto OFF");
	navigacija($g_n);
	
}	           



elseif($id == "pap"){
    online('Auto bosų kirtimas');
 
   header('location:bosai.php');
    mysqli_query($conn,"UPDATE autoboss SET auto='paprastas'  WHERE nick='$nick' ");
   
	
}	          
if($inv['viplvl'] ==  '15' ){
$kirtimas = 0;
 $padusimas = 0;
 if($inv['viplvl'] == '14'){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl'] == '13'){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl'] = '12'){
$kirtimas = 0;
 $padusimas = 0;
 if($inv['viplvl']  == '11' ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl']  =='10'){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl']  == '9' ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl']  ==' 8' ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv['viplvl']  == '7' ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv[viplvl]  == 6 ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv[viplvl]  == 5 ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv[viplvl]  == 4 ){
$kirtimas = 0;
 $padusimas = 0;

 if($inv[viplvl]  == 3 ){
$kirtimas = 0;
 $padusimas = 0;
}}}}}}}}}}}}}
else{
 
 $kirtimas = 1;
 $padusimas = 1; 
}




if($id == ""){
    online('Boss');
	top('Bosai');
echo' <div class="meniuc"><img src=img/imgg/bosai.png border="1" width="180" height="90"><alt="**"></div>';
    echo '<div class="meniuc"><b>Bosai</b> - tai stiprūs priešai.<br>Norint kirsti daugiau <b>Bosui</b> turite kelti '.$kgi.', arba turėti gerą <b>Sword</b><br>Norint, kad jums <b>Bosas</b> kirstų mažiau turite turėti <b>Armor</b>.<br><b>Kritinis lygis</b> - kiek turėsite <b>kritinio lygio</b> tiek daugiau kirsite <b>bosams</b>!<br><font color="red"><b>1 </b> </font>Kritinio lygio '.$lygu.' <b><font color="red">5</font></b> daromos <b>bosui</b> žalos!</div><div class="line"></div>';
 if($autob == "+"){
       $onoff = '<font color="green">Įjunkti</font>';
       $nurd = '<a href="bosai.php?id=auto_off">Išjungti</a>';
   } else {
       $onoff = '<font color="red">Išjungti</font>';
       $nurd = '<a href="bosai.php?id=auto_on">Ijungti</a>';  
   }
 echo'  <div class="titlec">Dabar auto puolimas <b>'.$onoff.'</b> ['.$nurd.']<br/></div>

  <div class="titlec">Dabar padusimai kas <b><font color="green">'.$padusimas.'</font></b> sec , auto puolimas kas <b><font color="green">'.$kirtimas.'</font></b> sec<br/></div>
'; 

   echo '
    <div class="meniu">';
    $query = mysqli_query($conn,"SELECT * FROM boss");
    while($row = mysqli_fetch_assoc($query)){
         if($row['prisikels']-time() > 0){
         echo ' <img src="img/veikejaic/'.$row['img'].'.png" alt="IMG" height="42" width="42"><b> '.$row['name'].' </b>užmuštas, galėsite mušti už <b>'.laikas($row['prisikels']-time(), 1).'</b><br/>';
         } else {
             echo '   <img src="img/veikejaic/'.$row['img'].'.png" alt="IMG" height="42" width="42"> <b>'.$row['name'].' </b> [<a href="bosai.php?id=inf&go='.$row['id'].'">Detaliau</a>]   <br/>';
         }
         unset($row);
    }
    echo '</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","fight.php","Kovų laukas","Bosai");
	navigacija($g_n);
}
elseif($id == "inf"){
    online('Boss Village');
    $boss = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM boss WHERE id='$go'"));
	top(''.$boss['name'].'');
    $tims = $boss['laikas'];
    if($boss['prisikels']-time() > 0){
       
        echo '<div class="meniuc"> <img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
        echo '<div class="meniuc"><b>'.$boss['name'].'</b>  užmuštas, galėsite mušti už <b>'.laikas($boss['prisikels']-time(), 1).'</b></div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM boss WHERE id='$go' ")) == 0){
       
        echo '<div class="meniuc">Toks bosas neegzistuoja!</div>';
    }
    else {
        $KD = rand(9999,99999);
        $_SESSION['refresh'] = $KD;
       
        echo '<div class="meniuc"> <img src="img/veikejaic/'.$boss['img'].'.png" height="100" width="100" /></div>
      
        <div class="meniuc">
       <b> '.$boss['name'].' </b> būsena - <b> '.sk($boss['hp']).''.$hp.'</b><br/>

       <b>Atlygis</b> -  <b>'.skaicius($boss['zen']).'</b>, <b> '.$pinigaii.'</b>, <b>'.sk($boss['krd']).' '.$kreditaii.' </b>, <b> '.sk($boss['vipt']).' '.$vipt.' </b><br>
Meta po <b>'.sk($boss['crit']).' </b>Kritinio lygio!
</div>
       
            
         <div class="meniuc">
     
       Galima mušti kas - <b> '.laikas($tims, 1).'</b><br/>
       Paskutinis užmušė: <b>'.statusas($boss['nukirto']).'</b><br/>
 <b>'.$boss['name'].'</b> smūgis: Nuo<b> '.$boss['min_hit'].' '.$att1.'</b> iki <b>'.$boss['max_hit'].' '.$att1.'</b><br/>
        </div>
        <div class="meniuc">
       '.$ico.'  <a href="bosai.php?id=attack&KD='.$KD.'&go='.$go.'">Trenkti <b>'.$boss['name'].'</b></a></div>';



    }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bosai.php","Bosai","Boso daužymas");
	navigacija($g_n);
}
elseif($id == "attack"){
    online('Boss Village');
    $KD = $_GET['KD'];
    $boss = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM boss WHERE id='$go'"));
top(''.$boss['name'].'');
    $tims = $boss['laikas'];
    if($boss['prisikels']-time() > 0){
       
        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
        echo '<div class="meniuc"><b>'.$boss['name'].'</b> užmuštas, galėsite mušti už <b>'.laikas($boss['prisikels']-time(), 1).'</b></div>';
    }
    elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM boss WHERE id='$go' ")) == 0){
      
        echo '<div class="meniuc">Toks bosas neegzistuoja!</div>';
    }
 
    elseif($KD != $_SESSION['refresh']){
     
        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
        echo '<div class="meniuc">Atnaujinti puslapio negalimą! Eikite atgal ir vėl trenkite.</div>';
    }
    elseif($_SESSION['pad']-time() > 0){
      
        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
        echo '<div class="meniuc">Padusai! Trenkti galėsi už <b>'.laikas($_SESSION['pad']-time(), 1).'</b></div>';
    }
    elseif($gyvybes < 1){
      
        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
        echo '<div class="meniuc">Nebeturi '.$hp.'</div>';
 mysqli_query($conn,"UPDATE zaidejai SET gyvybes='0' WHERE nick='$nick' ");
   }
    else {
      
        echo '<div class="meniuc"><img src="img/veikejaic/'.$boss['img'].'.png" height="42" width="42" /></div>';
  if($apie['amuletas'] == 'Super amulet'){
         		
         	$smugis3 = 3000;
         }   
if($apie['armor'] == 'Vedzito sarvai'){
         		
         	$mazina = 50;
         }  
if($apie['armor'] == 'Gold armor'){
         		
         	$mazina = 100;
         }
if($apie['armor'] == 'Time armor'){
         		
         	$mazina = 200;
         }      
if($apie['armor'] == 'Money armor'){
         		
         	$mazina = 300;
         }   
 
if($apie['armor'] == 'Super money armor'){
         		
         	$mazina = 500;
         }   
if($apie['armor'] == 'Vieno kircio armor'){
         		
         	$mazina = 700;
         }  
if($apie['armor'] == 'Galios armor'){
         		
         	$mazina = 1000;
         } 
if($apie['armor'] == 'Infinity armor'){
         		
         	$mazina = 1500;
         }      
if($apie['armor'] == 'Mirties armor'){
         		
         	$mazina = 150000;
         }      

if($apie['sword'] == 'Trankso kardas'){
         		
         	$smugis2 = 500;
         }   
if($apie['sword'] == 'Gold sword'){
         		
         	$smugis2 = 1000;
         }    
if($apie['sword'] == 'Time sword'){
         		
         	$smugis2 = 1500;
         }   
if($apie['sword'] == 'Money sword'){
         		
         	$smugis2 = 2000;
         }      
if($apie['sword'] == 'Super money sword'){
         		
         	$smugis2 = 4000;
         }    
if($apie['sword'] == 'Vieno kircio sword'){
         		
         	$smugis2 = 6000;
         } 
if($apie['sword'] == 'Mirties sword'){
         		
         	$smugis2 = 1000000;
         } 
if($apie['sword'] == 'Atgimimo sword'){
         		
         	$smugis2 = 2000000;
         } 
/// AD16 SETAS
if($apie['sword'] == 'AD16 Kardas'){
         		
         	$smugis2 =15000;
         } 
if($apie['armor'] == 'AD16 Sarvai'){
         		
         	$mazina =3000;
         } 
if($apie['amuletas'] == 'AD16 Amulet'){
         		
         	$smugis3 =30000;
         } 
if($apie['amuletas'] == 'Mirties amulet'){
         		
         	$smugis3 =600000;
         } 
if($apie['amuletas'] == 'Atgimimo amulet'){
         		
         	$smugis3 =1500000;
         } 
if($apie['sword'] == 'AD16 Kardas'  and $apie['armor'] == 'AD16 Sarvai' and $apie['amuletas'] ==  'AD16 Amulet'){
         		
         	$set1=50000;
         } 
/// AD17 SETAS
if($apie['sword'] == 'AD17 Kardas'){
         		
         	$smugis2 =40000;
         } 
if($apie['armor'] == 'AD17 Sarvai'){
         		
         	$mazina =6000;
         } 
if($apie['amuletas'] == 'AD17 Amulet'){
         		
         	$smugis3 =90000;
         } 
if($apie['sword'] == 'AD17 Kardas'  and $apie['armor'] == 'AD17 Sarvai' and $apie['amuletas'] ==  'AD17 Amulet'){
         		
         	$set2=15000;
         } 
/// AD18 SETAS
if($apie['sword'] == 'AD18 Kardas'){
         		
         	$smugis2 =80000;
         } 
if($apie['armor'] == 'AD18 Sarvai'){
         		
         	$mazina =12000;
         } 
if($apie['amuletas'] == 'AD18 Amulet'){
         		
         	$smugis3 =150000;
         } 
if($apie['sword'] == 'AD18 Kardas'  and $apie['armor'] == 'AD18 Sarvai' and $apie['amuletas'] ==  'AD18 Amulet'){
         		
         	$set1=200000;
         } 
/// AD19 SETAS
if($apie['sword'] == 'AD19 Kardas'){
         		
         	$smugis2 =150000;
         } 
if($apie['armor'] == 'AD19 Sarvai'){
         		
         	$mazina =25000;
         } 
if($apie['amuletas'] == 'AD19 Amulet'){
         		
         	$smugis3 =300000;
         } 
if($apie['sword'] == 'AD19 Kardas'  and $apie['armor'] == 'AD19 Sarvai' and $apie['amuletas'] ==  'AD19 Amulet'){
         		
         	$set2=50000;
         } 
/// AD20 SETAS
if($apie['sword'] == 'AD20 Kardas'){
         		
         	$smugis2 =500000;
         } 
if($apie['armor'] == 'AD20 Sarvai'){
         		
         	$mazina =50000;
         } 
if($apie['amuletas'] == 'AD20 Amulet'){
         		
         	$smugis3 =800000;
         } 
if($apie['sword'] == 'AD20 Kardas'  and $apie['armor'] == 'AD20 Sarvai' and $apie['amuletas'] ==  'AD20 Amulet'){
         		
         	$set1=500000;
         } 
else{$tech=1;}
// Buu tech
    if($apie[kenergija6] > 49999){
     $tech=2; 
        
    }

// Selas tech
    if($apie['Sayanpower'] ==  '+'){
     $tech=3.5; 
        
    }

// Pikolas tech
    if($apie['Makosen'] ==  '+'){
     $tech=4; 
        
    }

// Krilinas tech
    if($apie['Kamehameha2'] ==  '+'){
     $tech=3; 
        
    }

// Raditas tech
    if($apie['Begone'] ==  '+'){
     $tech=3; 
        
    }

// Neilas tech
    if($apie['Regeneration'] ==  '+'){
     $tech=2; 
        
    }

// Nappas tech
    if($apie['ArmBreak'] ==  '+'){
     $tech=3; 
        
    }

// Dendis tech
    if($apie['Healing'] ==  '+'){
     $tech=5; 
        
    

}
// Bulma tech
    if($apie['AngryBulma'] ==  '+'){
     $tech=4; 
        
    }

///kyborgai
if($apie['kyborgas'] == ''){
         		
         	$kyborg = 1;
         } 
if($apie['kyborgas'] == 'Android 16'){
         		
         	$kyborg = 2;
         } 
if($apie['kyborgas'] == 'Android 17'){
         		
         	$kyborg = 3;
         } 
if($apie['kyborgas'] == 'Android 18'){
         		
         	$kyborg = 4;
         } 
if($apie['kyborgas'] == 'Android 19'){
         		
         	$kyborg = 6;
         } 
if($apie['kyborgas'] == 'Android 20'){
         		
         	$kyborg = 8;
         } 
   //// smugis
if($apie['sword'] == 'Galios sword'){
         		
         	$smugis2 = 8000;
         }    
if($apie['sword'] == 'Infinity sword'){
         		
         	$smugis2 = 10000;
         }    
         if($kg >= '58'){
         			$crit =rand(0,$apie[critical]*5);
         	$smugis = rand(100,200)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech+$crit*$kyborg*$tech;
         }
    
         		
         
         

if($kg >= '59'){
     
         
    		
         	$smugiss = rand(100,200)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '9999'){
     
         
    		
         	$smugiss = rand(500,800)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '49999'){
     
         
    		
         	$smugiss = rand(600,1000)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '99999'){
     
         
    		
         	$smugiss = rand(800,1200)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '199999'){
     
         
    		
         	$smugiss = rand(1000,1500)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '999999'){
     
         
    		
         	$smugiss = rand(1500,2000)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '9999999'){
     
         
    		
         	$smugiss = rand(2000,3000)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '999999999'){
     
         
    		
         	$smugiss = rand(3000,4500)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '999999999'){
     
         
    		
         	$smugiss = rand(4000,6000)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
if($kg >= '99999999999'){
     
         
    		
         	$smugiss = rand(5000,8000)+$smugis2*$kyborg*$tech+$smugis3*$kyborg*$tech+$set1*$kyborg*$tech;
         }
        if($kg< '50'){
        	
			$k_smugis = rand(100,300);
        }
        $hit = mt_rand($boss['min_hit'], $boss['max_hit'])-$mazina-$set2;
        $hit = max($hit, 0);
		$dmg = $smugiss+$k_smugis+$crit;
        $bosui_liko = $boss['hp'] - $dmg;
        
        if($bosui_liko > 0){
$critk= rand(0,$crit);
            $KD = rand(9999,99999);
            $_SESSION['refresh'] = $KD;
            $_SESSION['pad'] = time()+1;
			$smugelis =$smugis+$smugiss;
            mysqli_query($conn,"UPDATE zaidejai SET vveiksmai=vveiksmai+'1', gyvybes=gyvybes-'$hit' WHERE nick='$nick' ");
            if ($nust['dtop_nick'] !== $nick) {
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dtop WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE dtop SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO dtop SET vksm='1', nick='$nick'");
                if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM s_top WHERE nick='$nick'")) > 0) mysqli_query($conn,"UPDATE s_top SET vksm=vksm+1 WHERE nick='$nick'"); else mysqli_query($conn,"INSERT INTO s_top SET vksm='1', nick='$nick'");
            }
mysqli_query($conn,"UPDATE boss SET  kiekzalos=kiekzalos+'$smugelis' WHERE id='$go' ");

            mysqli_query($conn,"UPDATE boss SET hp='$bosui_liko' WHERE id='$go' ");

            
			if($apie[kyborgas] !=''){
echo '<div class="meniuc">';
			echo' <b> '.$apie[kyborgas].' </b> padidina jūsų kirtį  <b>'.$kyborg.'</b>  kartus! </div>  ';	}
			if($apie[kenergija6] > 49999){

echo'<div class="meniuc"><b>Gack technika</b> Padidina jūsų kirt! <b>2x</b> !</div>';}	
			if($apie[kenergija7] > 49999){

echo'<div class="meniuc"><b>Sayan Power technika</b> Padidina jūsų kirtį <b>3.5x</b> !</div>';}	
if($apie[kenergija8] > 49999){

echo'<div class="meniuc"><b>Makosen technika</b> Padidina jūsų kirtį <b>4x</b> !</div>';}	
if($apie[kenergija9] > 49999){

echo'<div class="meniuc"><b>Kamehameha technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}	
if($apie[kenergija11] > 49999){

echo'<div class="meniuc"><b>Begone technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}	
if($apie[kenergija12] > 49999){

echo'<div class="meniuc"><b>Regeneration technika</b> Padidina jūsų kirtį <b>2x</b> !</div>';}	
if($apie[kenergija13] > 49999){

echo'<div class="meniuc"><b>Regeneration technika</b> Padidina jūsų kirtį <b>3x</b> !</div>';}	
if($apie[kenergija14] > 49999){

echo'<div class="meniuc"><b>Healing technika</b> Padidina jūsų kirtį <b>5x</b> !</div>';}
if($apie[kenergija15] > 49999){

echo'<div class="meniuc"><b>AngryBulma technika</b> Padidina jūsų kirtį <b>4x</b> !</div>';}
echo '<div class="meniuc">';
        echo' <img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="IMG" height="16" width="16"> <b> '.$nick.'  </b> nuėmei 
<font color="green"><b>'.skaicius($smugiss).'</b>';
	if($apie[critical] !='0'){
        $dmg = $smugis;
        echo'
</font>'.$att1.' + <font color="red"><b>'.skaicius($crit).'</b></font> '.$att2.'';}   if($apie[kyborgas] !=''){echo' <font color="green">*'.$kyborg.'</font> ';  echo''.$lygu.' <font color="blue">  <b>'.skaicius($smugis).'</font> '.$att1.'</b>';}echo'  <br/>
     <img src="img/veikejaic/'.$boss['img'].'.png" alt="IMG" height="16" width="16"> <b>'.$boss['name'].'</b>  nuėmė     <b> '.$apie['nick'].'</b> - '.sk($hit).' '.$att1.'</b> <br></div>

 ';

			 
			 
echo'<div class="meniuc">
 <img src="img/veikejai/'.$apie['veikejas'].'-'.$apie['trans'].'.png" alt="IMG" height="16" width="16"><b>'.$nick.'</b> liko '.$lygu.'<font color="green"><b>'.sk($gyvybes).'</b></font>'.$hp.'<br/>
<img src="img/veikejaic/'.$boss['img'].'.png" alt="IMG" height="16" width="16">  <b>'.$boss['name'].'</b> liko '.$lygu.'<font color="green"> <b>'.sk($bosui_liko).'</b></font>'.$hp.'<br>
Padarei <img src="img/veikejaic/'.$boss['img'].'.png" alt="IMG" height="16" width="16"> <b> '.$boss['name'].'</b> žalos: <b>'.$dmg.'</b><br>';
   if($autob = '+' AND $boss2[auto] == 'paprastas'){
    echo '<meta http-equiv="refresh" content="'.$kirtimas.'; url=bosai.php?id=attack&KD='.$KD.'&go='.$go.'">';}	               
        
       echo'     </div><div class="line"></div><div class="meniuc">
            '.$ico.' <a href="bosai.php?id=attack&KD='.$KD.'&go='.$go.'">Trenkti <b>'.$boss['name'].'</b></a></div>';
        }
	elseif($bosui_liko < 1){
        	 $bosui_liko = $boss['hp'] - $smugis;
            $krdx = $boss['krd'];
            $zenx = $boss['zen'];
            $expx = $boss['exp'];
     $viptx = $boss['vipt'];
$critx = $boss['crit'];
            mysqli_query($conn,"UPDATE zaidejai SET exp=exp+'$expx', litai=litai+'$zenx', kred=kred+'$krdx', vipticket=vipticket+'$viptx', nukirtobosu=nukirtobosu+'1', critical=critical+'$critx' WHERE nick='$nick' ");
mysqli_query($conn,"UPDATE boss SET  kiekzalos=kiekzalos='0', kieknukirsta=kieknukirsta+'1', critp=critp+'$critx' WHERE id='$go' ");

            $time = time()+$boss['laikas'];
            mysqli_query($conn,"UPDATE boss SET hp='$boss[max_hp]', prisikels='$time', nukirto='$nick' WHERE id='$go'");

            echo '<div class="meniuc"><b>Įtrenkei paskutinį smūgį! </b><br>
Gavai <b>'.sk($krdx).'</b> '.$kreditaii.' , <b>'.sk($zenx).'</b>'.$pinigaii.'  ir <b> '.sk($viptx).' '.$vipt.'</b> bei <b> '.sk($critx).'</b> Kritinio lygio!<br>
<b>Papildoma:</b>
XP: <b> '.sk($expx).'</b></div>';
        }
    }
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","bosai.php","Bosai","Boso daužymas");
	navigacija($g_n);
}

 foot();
?>
