<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
$bals = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM balsavimas ORDER BY id DESC LIMIT 1"));
baneris();
		 topbar();
$kiekis = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM b_komentarai"))[0];


if($id == ''){
	top('Balsavimas');

	
    
  $nr = abs((int)$_GET['nr']);
	$inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bals WHERE id='1'"));
	echo'
	<div class="meniuc">
	 Klausimas: <b>'.$inf['klausimas'].'</b><br>
	 Klausimas sukurtas: <b>'.laikas($inf['kada']).'</b><br>
	 Balsavimą sukūrė: <b>'.statusas($inf['autorius']).'</b><br>
	</div><div class="up">Rezultatai</div><div class="meniu">
	<b>1.</b> '.$inf['ats'].': '.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM b_rez WHERE ats='1' && bals_id='1'")).' </br>
	<b>2.</b> '.$inf['ats2'].': '.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM b_rez WHERE ats='2' && bals_id='1'")).'<br>
	<b>3.</b> '.$inf['ats3'].': '.mysqli_num_rows(mysqli_query($conn,"SELECT * FROM b_rez WHERE ats='3' && bals_id='1'")).'<br>
	</div><div class="line"></div><div class="title">
	'.$ico.' <a href="balsavimai.php?id=balsuot&ID=1">Balsuoti</a></br>
	'.$ico.' <a href="balsavimai.php?id=komentarai">Komentarai('.$kiekis.')</a>
	</div>
	
	';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Balsavimas");
	navigacija($g_n);
	}
	
	
	
	
	if($id == 'balsuot'){
			top('Balsavimas');
	$nr = abs((int)$_GET['nr']);
	$inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bals WHERE id='1'"));
	echo'
	<div class="meniuc">
	<form action="?id=bals&ID=1" method="POST">
	Atsakymas:<br>
	<select name="kl">
	<option value="1"> '.$inf['ats'].'</option>
	<option value="2"> '.$inf['ats2'].'</option>
	<option value="3"> '.$inf['ats3'].'</option>
	</select><br>
	<input type="submit" value="Balsuoti">
	</form>
	</div>
	
	';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas","Blasuoju");
	navigacija($g_n);
	}
	
if($id == 'bals'){
		top('Balsavimas');
	$nr = abs((int)$_GET['nr']);
	$kl = abs((int)$_POST['kl']);
	$inf = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM bals WHERE id='1'"));
	
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM b_rez WHERE nick='$nick' && bals_id='1'")))
	{
		echo'<div class="meniuc"> Čia jau balsavai.</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas","Blasuoju");
	navigacija($g_n);
	}
	elseif(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bals WHERE id='1'")))
	{
		echo'<div class="meniuc"> Tokio balsavimo nėra.</div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas","Blasuoju");
	navigacija($g_n);
	}
	else
	{
		echo'<div class="meniuc"> Sėkmingai prabalsavai.</div>';
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas","Balsuoju");
	navigacija($g_n);
		mysqli_query($conn,"INSERT INTO b_rez SET nick='$nick',ats='$kl',bals_id='1'");
		mysqli_query($conn,"UPDATE zaidejai SET kred=kred+'10' WHERE nick='$nick'");
	}
	
	
}
if($id == "komentarai"){

		online(' Komentaruose');
		top("Balsavimo komentarai");
	$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM komentarai WHERE `kas` = '$ka'"))[0];

	$rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
			$query = "SELECT * FROM b_komentarai ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas";
			
			$puslapiu=ceil($viso/$rezultatu_rodymas);
		
		echo'
			<div class="meniuc">
			<form action="?id=komentarai2" method="POST">
			Komentaras:<br/>
				<input type="text" name="komentaras" maxlenght="350"><br/>
				<input type="Submit" Value="Rašyti">
			</form>
			</div>
			<div class="title">
				';
			
					$mquery = mysqli_query($conn,$query);
					
					if (@mysqli_num_rows($mquery) == 0){
						echo" Tuščia<br/>";
					}else{
						while($komentarai = mysqli_fetch_assoc($mquery)){
							echo ++$nr.'. <a href="pagrindinis.php?id=apie&ka='.$komentarai['nick'].'">'.statusas($komentarai['nick']).'</a>: '.smile($komentarai['komentaras']).' <small>['.laikas($komentarai['laikas']).']</small><br/>';
						}
					} 
				echo'
			</div>
		';
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=komentarai').'</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas", "Komentarai");
	navigacija($g_n);
	}
elseif($id == "komentarai2"){
	if (isset($_POST['komentaras'])){
		online('Komentaruose');
		top('Komentaro rašymas');
		$kom = post($_POST['komentaras']);
		if (strlen($kom) < 2){
			echo'<div class="meniuc">
			Komentaras per trumpas</div>';
		}
		elseif($lygis < 20){
          echo '<div class="meniuc">Tavo lygis per žemas! Reikia 20 lygio.</div>';}
		elseif($gaves == "+"){
 echo '<div class="meniuc"><b>Klaida!</b> Tu esi užtildytas!</div>';

}	
		else{
			echo '<div class="meniuc">';
			echo"Parašyta!<br/></div>";
			mysqli_query($conn,"INSERT INTO `b_komentarai` (`nick`, `komentaras`, `laikas`) VALUES ('$nick', '$kom', '".time()."')") or die(mysqli_error());
		}
	  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","balsavimai.php", "Balsavimas", "Komentarai");
	navigacija($g_n);
	}
}

 foot();
?>
