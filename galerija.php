<?php
ob_start();
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
topbar();
switch($id){
	default:
		top('Foto galerija');
		echo'<div class="meniuc">
		
	 <table class=table align=center>
       <tr>
        <th>Naujausia</th>
        <th>Geriausiai įvertinta</th>
        <th>Atsitiktinė</th>
       
       </tr>
	
		
	
		';
		$query = mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='taip' ORDER by id DESC LIMIT 1");
		while($row= mysql_fetch_assoc($query)){
			$foto = $row[pavadinimas];
			echo'<td><a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$foto.'&x=60&y=60"></a></td>';
		
			
			unset($row);
			
		}
		$query = mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='taip' ORDER by ivertinimas DESC LIMIT 1");
		while($row= mysql_fetch_assoc($query)){
			$foto = $row[pavadinimas];
			echo'<td><a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$foto.'&x=60&y=60"></a></td>';
		
		
			
			unset($row);
			
		}
		$query = mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='taip' ORDER by rand() DESC LIMIT 1");
		while($row= mysql_fetch_assoc($query)){
			$foto = $row[pavadinimas];
		echo'<td><a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$foto.'&x=60&y=60"></a></td>';
		
			
			unset($row);
			
		}
		echo'</table>';
		
		echo'</div><div class="meniu">
	'.$ico.'	<a href="?id=all">Visos nuotraukos</a><br/>
	'.$ico.'	<a href="?id=best">Geriausiai įvertintos</a><br/>
	'.$ico.'	<a href="?id=my">Mano nuotraukos</a><br/>
	'.$ico.'	<a href="?id=up">Nuotraukos ikėlimas</a><br/>
		</div>
		
		';
		
		$navi[] = array("pagrindinis.php","Pagrindinis","Foto galerija");
		navigacija($navi);
		break;	
	
	case'view':
		$foto_inf = mysql_fetch_assoc(mysql_query("SELECT * FROM foto WHERE id='$ft_id'"));
		if(mysql_num_rows(mysql_query("SELECT * FROM zaidejai WHERE nick='$co'")) == false){
			
			
				top('Klaida');
		echo'<div class="meniuc">Tokio žaidėjo nėra</div>';	
		}
elseif(mysql_num_rows(mysql_query("SELECT * FROM foto WHERE nick='$co'")) == false){
			top('Klaida');
		echo'<div class="meniuc">Šiš žaidėjas neturi nuotraukų</div>';	
			
			
		}
		elseif(mysql_num_rows(mysql_query("SELECT * FROM foto WHERE id='$ft_id'")) == false){
		
			top('Klaida');
		echo'<div class="meniuc">Klaida ir dar didelė </div>';	
		}
		
		
		else{
		top(''.$foto_inf[nick].' nuotrauka');
		$dydis = getimagesize('foto/'.$foto_inf[pavadinimas].'');
		$aukstis = $dydis[1];
		$plotis = $dydis[0];
		if($aukstis > 128){$h = '128';}else{$h=$aukstis;}
		if($plotis > 128){$w = '128';}else{$w = $plotis;}

		echo'<div class="meniuc">
		<img src="view.php?foto='.$foto_inf[pavadinimas].'&x='.$w.'&y='.$h.'"><br />';
		
		
		
		
		
		
		

	
		


		
		
		
		
		
		
		
		
		
		
		
		
		
echo'		<a href="foto/'.$foto_inf[pavadinimas].'">Rodyti pilnu dydžiu</a></div><div class="meniuc">'
;if(!empty($foto_inf[komentaras])){echo'Komentaras :<b>'.$foto_inf[komentaras].'</b><br />';}
echo'<a href="?id=rep&co='.$co.'&ft_id='.$ft_id.'">Nuotraukos įvertinimai</a></div>

';

if(mysql_num_rows(mysql_query("SELECT * FROM vertinimai WHERE nick='$nick' AND foto='$ft_id'"))> 0){
	$vertinimas = mysql_fetch_assoc(mysql_query("SELECT * FROM vertinimai WHERE nick='$nick' AND foto='$ft_id'"));
echo'<div class="meniuc">Jūs jau vertinote nuotrauką, skyrėte <b>'.$vertinimas[balai].'</b> balus, komentaras <b>'.$vertinimas[komentaras].'</b></div>';
}else{echo'
<div class="meniuc">
Ivertinti nuotrauka:<br/>
 <form action="?id=verti&ft_id='.$ft_id.'" method="POST">
<select name="vertinimas">
<option value="10">10</option>
<option value="9">9</option>
<option value="8">8</option>
<option value="7">7</option>
<option value="6">6</option>
<option value="5">5</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1</option>
</select><br/>
		  Komentaras<br/><input type="text" name="komentaras"><br>
			  <input type="submit" value="Vertinti"></div>
		';
		}}
		
	$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "$foto_inf[nick] nuotrauka");
		navigacija($navi);
		
		break;
case'verti':
	top('Nuotraukos vertinimas');
$vertinimas = isset($_POST[vertinimas]) ? abs($_POST[vertinimas]): null;	
$komentaras = isset($_POST[komentaras]) ? post($_POST[komentaras]) : null;	
if(empty($komentaras) || empty($vertinimas) || $vertinimas > 10 || $vertinimas < 1){
	
	echo'<div class="meniuc">Tuščias laukelis</div>';
	
	
}	
elseif(mysql_num_rows(mysql_query("SELECT * FROM vertinimai WHERE nick='$nick' AND foto='$ft_id'")) == true){
	echo'<div class="meniuc">Šia foto jau vertinai</div>';
}
elseif(mysql_num_rows(mysql_query("SELECT * FROM foto WHERE id='$ft_id'")) == false){
	
	echo'<div class="meniuc">Tokios nuotraukos nėra</div>';
}	else{
		mysql_query("INSERT INTO vertinimai SET nick='$nick', komentaras='$komentaras', balai='$vertinimas', foto='$ft_id'");
		mysql_query("UPDATE foto SET ivertinimas =ivertinimas+'$vertinimas' WHERE id='$ft_id'");
		echo'<div class="meniuc">Sėkmingai įvertinai nuotrauką</div>';
	
	
}
$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija","?id=viev&co=$co&ft_id=$ft_id","$foto_inf[nick] nuotrauka","Nuotraukos vertinimas");
		navigacija($navi);	
	
break;
case'all':
	top('Nuotraukų galerija');
$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM foto WHERE ar_patvirtinta='taip'"),0);

    if($viso > 0){
        $rezultatu_rodymas=7;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
$query=mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='taip' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysql_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	echo'<div class="meniu">';
	while($row= mysql_fetch_assoc($query)){
		
$ft_turi = mysql_num_rows(mysql_query("SELECT * FROM foto WHERE nick='$row[nick]'"));	
echo'<a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$row[pavadinimas].'&x=60&y=60"></a><br/>';
echo' <a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'">Peržiūrėti<br/></a>';
		
			
			unset($row);
			
		}
	echo'</div>';
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=all').'</div>';
		

}
else{
	
	echo'<div class="meniuc">Nuotraukų nėra</div>';	
	
}
$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Žaidėjų nuotraukos");
		navigacija($navi);



break;
case'best':
	top('Nuotraukų galerija');
$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM foto WHERE ar_patvirtinta='taip'"),0);

    if($viso > 0){
        $rezultatu_rodymas=7;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
$query=mysql_query("SELECT * FROM foto WHERE ar_patvirtinta='taip' ORDER BY ivertinimas DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysql_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	echo'<div class="meniu">';
	while($row= mysql_fetch_assoc($query)){
		
$ft_turi = mysql_num_rows(mysql_query("SELECT * FROM foto WHERE nick='$row[nick]'"));	
echo'<a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$row[pavadinimas].'&x=60&y=60"></a><br/>';
echo' <a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'">Peržiūrėti<br/></a>';
		
			
			unset($row);
			
		}
	echo'</div>';
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=all').'</div>';
		

}
else{
	
	echo'<div class="meniuc">Nuotraukų nėra</div>';	
	
}
$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Žaidėjų nuotraukos");
		navigacija($navi);



break;
case'my':
	top('Nuotraukų galerija');
$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM foto WHERE nick='$nick' AND ar_patvirtinta='taip'"),0);

    if($viso > 0){
        $rezultatu_rodymas=7;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
$query=mysql_query("SELECT * FROM foto WHERE nick='$nick' AND ar_patvirtinta='taip' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysql_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	echo'<div class="meniu">';
	while($row= mysql_fetch_assoc($query)){
		
$ft_turi = mysql_num_rows(mysql_query("SELECT * FROM foto WHERE nick='$row[nick]'"));	
echo'<a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'"><img src="view.php?foto='.$row[pavadinimas].'&x=60&y=60"></a><br/>';
echo' <a href="?id=view&co='.$row[nick].'&ft_id='.$row[id].'">Peržiūrėti<br/></a>';
		
			
			unset($row);
			
		}
	echo'</div>';
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=my').'</div>';
		

}
else{
	
	echo'<div class="meniuc">Nuotraukų nėra</div>';	
	
}
$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Žaidėjų nuotraukos");
		navigacija($navi);
 


break;
case'up':
	top('Nuotraukos ikėlimas');
	online('Nuotraukos ikėlimas');
	
	echo'<div class="meniuc">Nuotraukos ikėlimo kaina <b>500</b> Kreditų.</div><div class="meniuc">
<form action="?id=up_yes" method="post" enctype="multipart/form-data">
<b>Nuotrauka:</b><br><input name="files" type="file">
<br/>
 Komentaras<br /><input type="text" name="kom"><br />
<input value="Ikelti" type="submit"><br/>
</form>	
	</div>
	';
	$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Nuotraukos ikėlimas");
		navigacija($navi);
	break;
	
case'up_yes':
	$kom= post($_POST[kom]);
	top('Nuotraukos ikėlimas');
	online('Nuotraukos ikėlimas');
	$direktorija = 'foto/';
$failas = array_reverse(explode(".",$_FILES['files']['name']));
$tinkami = array("jpg","gif","jpeg","png");
$tipas = strtolower($failas[0]);
$time = time();
$_FILES['files']['name']="".$time.".".$tipas."";
if(!in_array($tipas, $tinkami)){$error = 'Netinkamas failo formatas, tinkami JPG, GIF, JPEG, PNG, Nemegink ikelt shellu :DD';}
elseif($_FILES["files"]["size"] > 500000000000){$error = 'Failas per daug užima';}
elseif($apie[kred] < 50){$error = 'Nepakanka kreditų';}
	
else{

move_uploaded_file($_FILES['files']['tmp_name'], $direktorija.$_FILES['files']['name']);
	mysql_query("INSERT INTO foto SET nick='$nick', pavadinimas='".$_FILES['files']['name']."',ar_patvirtinta='ne', laikas='".time()."', ivertinimas='0',komentaras='$kom'  ");
	mysql_query("UPDATE zaidejai SET kred=kred-'500' WHERE nick='$nick'");
		echo'<div class="meniuc">Nuotrauka ikelta</div>';;
}
if(isset($error)){echo'<div class="meniuc">'.$error.'</div>';}
	$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Nuotraukos ikėlimas");
		navigacija($navi);
break;
case'rep':
	top('Nuotraukų galerija');
$viso = mysql_result(mysql_query("SELECT COUNT(*) FROM vertinimai WHERE foto='$ft_id'"),0);

    if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
$query=mysql_query("SELECT * FROM vertinimai WHERE foto='$ft_id' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas") or die(mysql_error());
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	echo'<div class="meniu">';
	while($row= mysql_fetch_assoc($query)){
		$a++;
echo'<b>'.$a.'.</b>Ivertino <b>'.$row[nick].'</b>, davė balų <b>'.$row[balai].'</b>, komentaras <b>'.$row[komentaras].'</b><br/>';
		
			
			unset($row);
			
		}
	echo'</div>';
		echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=rep&co='.$co.'&ft_id='.$ft_id.'').'</div>';
		

}
else{
	
	echo'<div class="meniuc">Šios nuotraukos dar niekas nevertino</div>';	
	
}
$navi[] = array("pagrindinis.php","Pagrindinis","?id=","Foto galerija", "Žaidėjų nuotraukos");
		navigacija($navi);



break;


}


 foot();
?>
