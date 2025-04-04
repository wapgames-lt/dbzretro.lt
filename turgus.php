<?php
ob_start();
session_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
baneris();
topbar();
if($id == ""){
	top('Litų turgelis');
echo'<div class="meniuc">	<a href="?id=ideti">Idėti prekę</a></div><div class="up">Prekės</div>';
	
		
		if(mysql_num_rows(mysql_query("SELECT * FROM turgus")) == false){
	echo'<div class="meniuc"><b>Kolkas preki&#371; n&#279;ra!</b></div>';
	}
	else
	{
	  $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM turgus"),0);
   if($viso > 0){
       $rezultatu_rodymas=5;
       $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
       if (empty($psl) or $psl < 0) $psl = 1;
       if ($psl > $total) $psl = $total;
       $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
       $query = mysql_query("SELECT * FROM turgus ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
       $puslapiu=ceil($viso/$rezultatu_rodymas);
	     while($row = mysql_fetch_assoc($query)){
	     	if($row[preke] = litai){$pre = 'Pinigai';}
echo'	<div class="meniu">
	[&#187;] <b>Pardav&#279;jas:</b> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>
			[&#187;] <b>Prek&#279: </b>'.sk($row['kiek']).' Eurai<br> 
			[&#187;] <b>Kaina:</b> '.sk($row['kiekis']).' '.$pre.'<br>
			
			';
			if($row['nick'] != $nick){echo'			
			'.$ico.' <a href="?id=pirkti&nr='.$row['id'].'">Pirkti</a>';
			}
			
			echo'</div>';
			unset($row);
			
			}}}
     
        
	  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
	
	
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php", "Miestas","Eurų turgelis",);
	navigacija($g_n);
}
if($id == 'ideti'){
	top('Prekės idėjimas');
	
	
	echo'<div class="meniu"> <form action="?id=ideti2" method="POST">
			  <b>Prekė Eurais</b><br>
			  <input type="text" name="kiek"><br>
			  <b>Kaina pinigais</b><br>
			  <input type="text" name="kaina"><br>
			  <input type="submit" value="Įdėti">
			  </form>
			  </div>';
			   $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php", "Miestas","turgus.php","Eurų turgelis","Prekės įdėjimas");
	navigacija($g_n);
}
if($id == 'ideti2'){
	top('Prekės idėjimas');
	$kiek = isset($_POST['kiek']) ? preg_replace("/[^0-9]/","",$_POST['kiek'])  : null;
	$kaina = isset($_POST['kaina']) ? preg_replace("/[^0-9]/","",$_POST['kaina'])  : null;
	if($kiek > $apie[sms_litai]){
	$klaida = 'Nepakanka turimų eurų!';	
		
	}
	elseif(empty($kiek) or empty($kaina)){
		$klaida = 'Tuščias laukelis';	
		
	}
	elseif(mysql_num_rows(mysql_query("SELECT * FROM turgus WHERE nick='$nick'")) == true){
	$klaida = 'Galima dėti tik vieną preke';}
	else{
		$timux = time() +60*60*5;
	
	mysql_query("INSERT INTO turgus SET nick='$nick', preke='litai', kaina='sms_litai', kiek='$kiek', kiekis='$kaina', laikas = '$timux' ");
mysql_query("UPDATE zaidejai SET sms_litai = sms_litai-'$kiek' WHERE nick ='$nick'");
		echo'<div class="meniuc">Prekė įdėta</div>';
	}
	if(isset($klaida)){
		
			echo'<div class="meniuc">'.$klaida.'</div>';
	}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php", "Miestas","turgus.php","Eurų  turgelis","Prekės idėjimas");
	navigacija($g_n);
}
if($id == 'pirkti'){
	top('Prekės pirkimas');
	$nr = (int)abs($_GET['nr']);
$apie_pr = mysql_fetch_array(mysql_query("SELECT * FROM turgus WHERE id='$nr'"))or die(mysql_error());	
	
	if(mysql_num_rows(mysql_query("SELECT * FROM turgus WHERE id='$nr'")) == false){
		$klaida = 'Tokios prekės nėra';
	}
	elseif($apie_pr['nick'] == $nick){
		$klaida = 'Savo prekės pirkti negalima';
	}
	elseif($apie_pr[kiekis] > $apie[litai]){
		$klaida = 'Tau nepakanka pinigų';
	}else{
		$zinute = "Tavo preke turgelije nupirko $nick";
		mysql_query("INSERT INTO pm SET gavejas='$apie_pr[nick]', what='SISTEMA', txt='$zinute', time='".time()."', nauj='NEW'")or die(mysql_error());
	mysql_query("UPDATE zaidejai SET sms_litai=sms_litai+'$apie_pr[kiek]', litai=litai-'$apie_pr[kiekis]' WHERE nick='$nick'")or die(mysql_error());
	mysql_query("UPDATE zaidejai SET litai=litai+'$apie_pr[kiekis]' WHERE nick ='$apie_pr[nick]'");	
	mysql_query("DELETE FROM turgus WHERE id='$nr'")or die(mysql_error());
		echo'<div class="meniuc">Nupirkta sėkmingai</div>';
	}
	if(isset($klaida)){
			echo'<div class="meniuc">'.$klaida.'</div>';
	}
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php", "Miestas","turgus.php","Eurų turgelis","Prekės pirkimas");
	navigacija($g_n);
}
foot();
