<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();

topbar();
online('Arenoje');
top('Arena');
// kint 
$fight = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$ka' AND vieta = 'Arenoje'"));
$ar_yra = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM online WHERE nick='$ka'"));
$arenn=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'"));
$arennn=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM zaidejai WHERE nick='$arenn[vs]'"));

if($id == ''){

if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'"))){header("location:?id=kova", true);}
echo'<div class="meniuc">';
		$query = mysqli_query($conn,"SELECT * FROM arenos_log ORDER BY id DESC LIMIT 5");
		while($row = mysqli_fetch_assoc($query)){
		echo''.$row[msg].'</br>
		
		';
		unset($row);
		}
		echo'<div class="meniuc">
	<img src="img/imgg/arena.png"></div>';
		echo'</div>	<div class="meniu">
			  ';
	$query = mysqli_query($conn,"SELECT * FROM online WHERE vieta='Arenoje'");
		while($row = mysqli_fetch_assoc($query)){
$gamer = mysqli_fetch_row(mysqli_query($conn,"SELECT lygis FROM zaidejai WHERE nick='$row[nick]'"));
		
			$idd++;
			if(apsas($row[nick]) == apsas($nick)){
			echo''.$idd.' '.statusas($nick).' ('.$gamer[0].')</br>';
				
			}else{
			echo'
				  '.$idd.' <a href="?id=pulti&ka='.$row['nick'].'">'.$row['nick'].'</a> ('.$gamer[0].')<br>
				  ';
			unset($row);
		}}
		echo'
			  </div>
			';
			top('Pokalbiai');
			require 'chat.php';
				$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Arena");
navigacija($g_n);
	}
		
if($id == 'pulti'){

		echo'
     
              <div class="meniuc">
			  
              ';
		
		if(apsas($nick) == apsas($ka))
		{
			echo'
				
				Savęs pulti negalima.
				  ';
		}
		elseif($ar_yra['vieta'] != 'Arenoje')
		{
			echo'
				
				 Žaidėjas nėra arenoje.
				  ';
		}
		
		
		elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$ka'"))== true)
		{
			echo'
				 
				 Žaidėjas jau kovoja arenoje.
				  ';
		}
elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena"))  >0){
	
	
	echo'
				
			Dabar vyksta kova
				  ';
	
}
elseif($inf['gyvybes'] < 1){
	
	echo'
				 
				Priešas neturi gyvybių
				  ';
	
}
elseif($apie['gyvybes'] < 1){
	
	echo'
		Tu neturi gyvybių
				  ';
	
}

		else
		{
			
$kodas = mt_rand(1,99999);
mysqli_query($conn,"INSERT INTO arena SET nick='$nick',vs='$ka',idd='$kodas', ejimas='$ka', laikas='".(time()+60)."'");
mysqli_query($conn,"INSERT INTO arena SET nick='$ka',vs='$nick',idd='$kodas', ejimas='$ka', laikas='".(time()+60)."'");
header("LOCATION: ?id=kova", true);
		}
		
		echo'</div>';	
			$g_n[] = array("pagrindinis.php?id=","Pagrindinis","arena.php?id=","Arena","Klaida");
navigacija($g_n);	
}
		

	
if($id == 'kova'){
	
           
           
		if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'"))== false)
		{
	header("Location:arena.php");
		}
		else
		{
		
			echo'    <div class="meniu">
                  '.$ico.' Tu kovoji prieš <b>'.$arenn['vs'].'</b><br>
				  '.$ico.' Dabar yra <b>'.$arenn['ejimas'].'</b> ėjimas.<br>
				  '.$ico.' Ėjimo laikas: <b>'.laikas($arenn['laikas']-time(),1).'</b>.<br>
				
				  '.$ico.' Tavo gyvybės: <b>'.$apie['gyvybes'].'</b><br>
				  '.$ico.' Priešo gyvybės: <b>'.$arennn['gyvybes'].'</b></div>
				  ';
			if($nick == $arenn['ejimas'])
			{
				echo'
					    <div class="meniu">
					  '.$ico.' <a href="?id=ikirts">Kirsti žaidėjui</a></div>
					  ';
			}
else{
		echo'
					    <div class="meniu">
					  '.$ico.' <a href="?id=kova">Refresh</a></div>
					  ';
	
}
			}
				top('Pokalbiai');
			include 'chat.php';
				$g_n[] = array("pagrindinis.php?id=","Pagrindinis","arena.php","Arena","Kova");
navigacija($g_n);	
}
if($id == 'ikirts'){
	

	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM arena WHERE nick='$nick'"))== false)
		{
			echo'
             <div class="meniuc">
                 Tu nekovoji arenoje.
                 </div> ';
		}
		elseif($nick != $arenn['ejimas'])
		{
			echo'
                <div class="meniuc">
                 Dabar ne tavo ėjimas
                 </div>
                  ';
		}
		else
		{
		//$kirtimas=1000;
		
			
$jo_gynyba = round(($arennn['gynyba']/3));
$jo_kg = ($arennn['jega']  >= $jo_gynyba ) ? $jo_gynyba  : $arennn['jega'] ;
			
if($jo_kg > $kg){
$kirtimas = rand($arennn[gyvybes]/rand(5,8),$arennn[gybybes]/rand(7,10));
}	
else{
	
	$kirtimas = rand($arennn[gyvybes]/rand(3,5),$arennn[gybybes]/rand(3,7));
	
	
}		
			
			echo'
			
			<div class="meniuc"><img src="img/veikejai/'.$arennn[veikejas].'-'.$arennn['trans'].'.png"></br> Trenkdamas nuėmiai '.$kirtimas.' gyvybių, priešui liko <b>'.($arennn['gyvybes']-$kirtimas).'</b> gyvybių.</div>
				  ';
			if($arennn['gyvybes'] - $kirtimas < 1)
			{
				$piniu = round($xx['pinigai']*50/100,1);
					mysqli_query($conn,"UPDATE zaidejai SET gyvybes=gyvybes - $kirtimas WHERE nick='".$arenn['vs']."'");
				echo'<div class="meniuc"> <b>Tu laimėjai kovą arenoje, gavai '.$piniu.' pinigų.</b></div>';
				//$mysqli->query("UPDATE user SET pinigai=pinigai+$piniu WHERE id='$nick_id'");
				//$mysqli->query("UPDATE user SET pinigai=pinigai-$piniu WHERE nick='$x[vs]'");
$zin = '<b>'.$nick.'</b> nukovė<b>'.$arenn[vs].'</b> gavo pusė jo pinigų!</b>';		
    mysqli_query($conn,"INSERT INTO arenos_log SET msg='$zin'");
				mysqli_query($conn,"DELETE FROM arena WHERE idd='$arenn[idd]'");
			
		//	$zin = '<b>'.$inf['nick'].'</b> kerta ir nuėma <b>'.$kirtimas.'</b> gyvybių, priešui lieka <b>'.($xx['gyvybes']-$kirtimas).'</b> gyvybių.';
		//	if($xx['gynyba'] > $inf['gynyba']){
		//	$mysqli->query("UPDATE user SET gyvybes = gyvybes - $kirtimas/2 WHERE nick='".$x['vs']."'");
		}
		else{
		
	mysqli_query($conn,"UPDATE zaidejai SET gyvybes=gyvybes - $kirtimas WHERE nick='".$arenn['vs']."'");
	$zin = '<b>'.$nick.'</b> trenkė <b>'.$arenn[vs].'</b> nuimė <b>'.$kirtimas.'</b> gyvybių, dabar <b>'.$arenn[vs].' ėjimas</b>';		
    mysqli_query($conn,"INSERT INTO arenos_log SET msg='$zin'");
	mysqli_query($conn,"UPDATE arena SET ejimas='$arenn[vs]' ,laikas='".(time()+30)."' WHERE nick='$nick'");
	mysqli_query($conn,"UPDATE arena SET ejimas='$arenn[vs]' ,laikas='".(time()+30)."' WHERE nick='$arenn[vs]'");
		}}
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","arena.php?id=kova","Kova","Kova prieš $arenn[vs]");
navigacija($g_n);	



	
}
foot();
?>
