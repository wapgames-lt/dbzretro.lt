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
if($id == ""){
		top('Prekių užsakymai');
		
		echo'<div class="meniuc">
<a href="?id=uzsakymas">Įdėti užsakymą</a>
</div>';
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai")) == false){
	echo'<div class="meniuc"><b>Užsakymų nėra!</b></div>';
	}
	else
	{
		$viso = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM uzsakymai"))[0];
		if($viso > 0){
       $rezultatu_rodymas=5;
       $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
       if (empty($psl) or $psl < 0) $psl = 1;
       if ($psl > $total) $psl = $total;
       $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
            
       $query = mysqli_query($conn,"SELECT * FROM uzsakymai ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
       $puslapiu=ceil($viso/$rezultatu_rodymas);
            
     
       while($row = mysqli_fetch_assoc($query)){
		
									
			echo'<div class="meniu">
			[&#187;] <b>Užsakovas</b> <a href="pagrindinis.php?id=apie&ka='.$row['nick'].'">'.$row['nick'].'</a><br>
			[&#187;] <b>Užsakoma prekė</b> '.number_format($row['kiek']).' '.change($row[norima]).'<br>
			[&#187;] <b>Atlygis</b> '.skaicius($row['atlygis']).' Pinigų<br>
		';
			if (apsas($row[nick]) != apsas($nick)){
			echo''.$ico.'<a href="?id=buy&ID='.$row[id].'">Pirkti</a>';
			}
			else{
			echo ''.$ico.' <a href="?id=delete&ID='.$row['id'].'">Ištrinti užsakymą</a>';
			}
			
			echo'</div>';
			unset($row);
			
		}
      
        }
	  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
	}
		
		
		
		
		    
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","Prekių užsakymai");
	navigacija($g_n);
}
if($id == 'uzsakymas'){
	top('Prekės užsakymas');
	echo'
	<form action="?id=uzsakymas2" method="post">
	<div class="meniuc">

	<b>Atlygis už prekę (pinigais)</b><br>
	<input name="atlygis" type="text"/><br>
	<b>Užsakoma suma :</b><br>
	<input name="uzsakoma" type="text"/><br>
	


	

	
		<b>Užsakoma prekė:</b><br>
	<select name="preke">';	
echo"<option value=\"Microshem\">Mikroschemos </option>"; 
 echo"<option value=\"Fusionfail\">Fusion fail </option>"; 
echo"<option value=\"Sayiantail\">Sayian Tail</option>"; 
echo"<option value=\"Stone\">Stone </option>"; 
echo"<option value=\"Soul\">Soul </option>"; 
 echo"<option value=\"Energystone\">Energy Stone </option>"; 
echo"<option value=\"Pragarovaisius\">Pragaro vaisius</option>"; 
echo"<option value=\"Majinsroll\">Majin sroll </option>"; 
echo"<option value=\"Goldstone\">Gold Stone </option>"; 
echo"<option value=\"Magicball\">Magic Ball </option>"; 
echo"<option value=\"Powerstone\">Power Stone </option>"; 
echo"<option value=\"tobulas\">Kario tobulėjimo</option>"; 
echo"<option value=\"naikinti\">Naikinimo galios</option>"; 
echo"<option value=\"angelwing\">Angelo sparnų </option>"; 
echo"<option value=\"ad16\">AD16 Item </option>"; 
echo"<option value=\"ad17\">AD17 Item </option>"; 
echo"<option value=\"ad18\">AD18 Item </option>"; 
echo"<option value=\"ad19\">AD19 Item </option>"; 
echo'</select>

</br>
	<input type="submit" value="&#302;d&#279;ti">
	</form>
	</div>';
			
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","uzsakymai.php","Prekių užsakymai", "Prekės užsakymas");
	navigacija($g_n);
}

if($id == 'uzsakymas2'){
		top('Prekės užsakymas');
		$atlygis = abs($_POST[atlygis]);
		$uzsakoma = abs($_POST[uzsakoma]);
		$preke = post($_POST[preke]);
		$galima = array("Microshem","Fusionfail","Sayiantail","Stone","Soul","Energystone","Pragarovaisius","Majinsroll","Goldstone","Magicball","Powerstone","naikinti","tobulas","angelwing","ad16","ad17","ad18","ad19","Nball","Jball","Sball");
	if(empty($atlygis) or empty($preke) or empty($uzsakoma)){
		$error = 'Tusčias laukelis';
		
	}
	
	elseif($apie['litai'] < $atlygis){
		$error = 'Nepakanka pinigų';
		
	}
	elseif(!in_array($preke, $galima)){
		
		$error = "Tokių daiktų nėra";
	
		
		
	}
	
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai WHERE nick='$nick'")) > 2){
		
			$error = 'Galima užsakyti tik 3 užsakymus!';
	}
	if(isset($error)){
		echo '<div class="meniuc">'.$error.'</div>';
	}
	
	else{
		
		echo'<div class="meniuc">Prekė užsakyta</div>';
		$laix = time()+3600*5;
		mysqli_query($conn,"INSERT INTO uzsakymai SET atlygis ='$atlygis', norima='$preke', nick='$nick', kiek='$uzsakoma', laikas='$laix'");
		mysqli_query($conn,"UPDATE zaidejai SET litai=litai-'$atlygis' WHERE nick='$nick'");
		
	}
 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","uzsakymai.php","Prekių užsakymai", "Prekės užsakymas");
	navigacija($g_n);

}
		
	if($id=='buy'){
		top('Prekės pirkimas');
		$inv = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM inv WHERE nick='$nick'"));
$in=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM uzsakymai WHERE id='$ID'"));	
if($inv[$in['norima']] < $in['kiek']){
	$error = 'Nepakanka turimų daigtų';
}		
	elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai WHERE id='$ID'")) == false){
		
		$error = 'Tokio užsakymo nėra';
	}
	elseif(apsas($in[nick]) == apsas($nick)){
		
		$error = 'Negalima pirkti savo prekės';
	}

		if(isset($error)){
		echo'<div class="meniuc">'.$error.'</div>';	
			
		}else{
		
			
			echo'<div class="meniuc">Prekė nupirkta</div>';
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$in[atlygis]' WHERE nick='$nick'");
			$kas = $in['norima'];
			mysqli_query($conn,"UPDATE inv SET $kas=$kas+$in[kiek] WHERE nick='$in[nick]' ");
			mysqli_query($conn,"UPDATE inv SET $kas=$kas-$in[kiek] WHERE nick='$nick' ");
			mysqli_query($conn,"INSERT INTO pm SET gavejas='$in[nick]', what='SISTEMA', txt='$nick atliko jūsų užsakymą', time='".time()."', nauj='NEW'");		
			mysqli_query($conn,"DELETE FROM uzsakymai WHERE id='$ID'");
		}
		
		
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","uzsakymai.php","Prekių užsakymai", "Prekės pirkimas");
	navigacija($g_n);
	}
	
	if($id == "delete"){
	top("Užsakymo atšaukimas");
	
	$in=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM uzsakymai WHERE id='$ID'"));	
	
	if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM uzsakymai WHERE id='$ID'")) == false){
		
		$error = 'Tokio užsakymo nėra';
	}
	elseif(apsas($in[nick]) != apsas($nick)){
		
		$error = 'Čia ne tavo prekė!';
	}
	
	
	if(isset($error)){
		echo'<div class="meniuc">'.$error.'</div>';	
			
		}else{
		
			
			echo'<div class="meniuc">Prekė išimta</div>';
			mysqli_query($conn,"UPDATE zaidejai SET litai=litai+'$in[atlygis]' WHERE nick='$nick'");
			mysqli_query($conn,"DELETE FROM uzsakymai WHERE id='$ID'");
		}
		
		
		 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","miestas.php","Miestas","uzsakymai.php","Prekių užsakymai", "Prekės pirkimas");
	navigacija($g_n);
	}
	
	

foot();
?>
	
