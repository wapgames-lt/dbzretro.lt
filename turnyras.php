<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include("cfg/sql.php");
include("cfg/session.php");
head2();
baneris();

		topbar();
$nst = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM turnyras"));
if($id == ""){
	top('Kovų turnyras');
	echo'<div class="meniuc"><img src="img/xp_turnyras.jpg" border="1"></div>';
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
if($nst['ar_prasidejo'] == '+'){
echo'
<div class="meniuc">Turnyras prasidėjo, reikia laimėti '.$nst['trn_kiek'].' kovų</div>
		';
if($user['kovu_trn'] == '+')
		{
		    echo'
		    <div class="meniuc"> Tu laimėjai: <b>'.$user['kiek_trn'].' kovų</b></div>
		    ';
	    }
		
	}
	else
	{
		echo'
		<div class="meniuc"> <b>Turnyras prasidės už '.laikas($nst['trn_time']-time(),1).'</b></br>
		 Praeitą turnyrą laimėjo : <b><a href="pagrindinis.php?id=apie&ka='.$nst['trn_last'].'">'.statusas($nst['trn_last']).'</a></b><br>
		</div>
		';
	}
	echo'<div class="title">
	'.$ico.' <a href="turnyras.php?id=inf">Informacija</a><br>
	'.$ico.' <a href="turnyras.php?id=dalyviai">Dalyviai</a><br>
	';
	if($nst['ar_prasidejo'] != '+')
	{
		echo'
		'.$ico.' <a href="turnyras.php?id=reg">Registracija</a><br>
		';
	}
	echo'</div>';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Kovų turnyras");
	navigacija($g_n);
	}
	if($id == 'inf'){
		top('Turnyro informacija');
	echo'
	
	<div class="meniu">
	
	<b>1</b> Kad turynas prasidėtu reikia, kad būtų bent 10 dalyvių</br>
	<b>2</b>Jeigu pasibaigus turnyro laikui nebus 10 dalyvių tada turnyras nusikels dar valanda i priekį.</br>
	<b>3</b> Registracijos kaina: <b>1 auksinis.</b><br>
	<b>4</b> Turnyro prizas: <b>'.sk(500000000000000).'</b></br>
	</div>
	';
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","turnyras.php", "Turnyras", "Turnyro informacija");
	navigacija($g_n);
}
	if($id == 'dalyviai'){
		top('Turnyro dalyviai');
	echo'
	';
	if(!mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'")))
	{
		echo'<div class="meniuc"> Dalyvių nėra</div>';
	}
	else
	{
		echo'<div class="meniu">';
		$viso = mysqli_query($conn,"SELECT * FROM user WHERE kovu_trn='+'");
		$nr = 1;
		while($vs = mysqli_fetch_assoc($viso))
		{
			echo'
			<b>'.$nr.'.</b> <a href="pagrindinis.php?id=apie&ka='.$vs['nick'].'">'.$vs['nick'].'</a><br>
			';
			$nr++;
		}
		echo'</div>';
	}
	
	
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","turnyras.php", "Turnyras", "Turnyro registracija");
	navigacija($g_n);
	}
if($id == 'reg'){
	top('Registracija');
	echo'
	
	<div class="meniuc">
	';
	$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE nick='$nick'"));
	if($user['kovu_trn'] == '+')
	{
		echo'Tu jau užsiregistravęs kovų turnyre.';
	}
	elseif($nst['ar_prasidejo'] == '+')
	{
		echo'Turnyras jau prasidėjo.';
	}
	elseif($apie[auksiniai] < 100)
	{
		echo' Nepakanka auksinių';
	}

	else
	{
		echo' Sėkmingai užsiregistravai į turnyrą.';
		mysqli_query($conn,"UPDATE zaidejai SET auksiniai=auksiniai-1 WHERE nick='$nick'")or die(mysqli_error());
		mysqli_query($conn,"UPDATE user SET kovu_trn='+', kiek_trn='0' WHERE nick='$nick'")or die(mysqli_error());
	}

echo"</div>";
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","turnyras.php", "Turnyras", "Turnyro registracija");
	navigacija($g_n);
}
 foot();
?>

