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
		online(Arenoje);
	if($apie[lygis] >= 1){
$klaida = 'Arena išjungta';		
		
}
elseif($apie[litai] < 1000000){
	
	$klaida = 'I arena galima ieiti turint mažiausiai '.sk(1000000).' pinigų';
}
if(isset($klaida)){
	echo'<div class="meniuc"><img src="img/duel.png"></div><div class="line"></div>';
	echo'<div class="meniuc">'.$klaida.'</div>';
	 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Arena");
	navigacija($g_n);
		
}else{
	
			top('Arena');
		echo'<div class="meniuc"><img src="img/duel.png"></div><div class="line"></div>';
	
			if(!mysql_num_rows(mysql_query("SELECT * FROM arena WHERE nick='$nick' "))){
				$laikas = time()+120;
    mysql_query("INSERT INTO arena SET nick='$nick', laikas ='$laikas' ");
}
	
	$ar_arenoje == '+';
			if($id == ''){
				
					 
				online(Arenoje);
				echo"<div class='meniu'>";
			$query=mysql_query("SELECT * FROM arena");
			
				while ($row=mysql_fetch_assoc($query)){
					
					$happy = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick = '$row[nick]'"))or die(mysql_error());
					
					if($row['nick'] != $nick){
						
						echo "<a href='fighting.php?id=fight&ka=".$row['id']."'>".$row['nick']." (Lygis: ".$happy['lygis'].")</a></br>";
					}else{
						
						echo"".$row['nick']." (Lygis: " . $happy['lygis'] .")</br>";
					} 
						
					
					}
				echo'</div><div class="meniuc"><a href="?id=off">Atsijungti</a></div>
				<div class="up">Mini chatas</div>
				
				';
				
				if($ka == "rasyti"){
        $zin = post($_POST['zinute']);
        if(empty($zin)){
            echo '<script>document.location="?id=#"</script>';
        }
        elseif($lygis < 1){
            echo '<div class="error">Jūsų lygis per žemas! Reikia 150 lygio.</div>';
        }
        elseif(strlen($zin) < 4){
            echo '<script>document.location="?id=#"</script>';
      
			}else{
      
           	
 
		   
            mysql_query("INSERT INTO pokalbiai SET nick='".$nick."', sms='$zin', data='".time()."'");
            }
            mysql_query("UPDATE zaidejai SET chate=chate+1 WHERE nick='$nick'");
            echo '<script>document.location="?id=#"</script>';
        
    }
        if(!empty($ka)) $ats = $ka.' -> '; else $ats = '';
        echo '<div class="meniuc">
		<div id="error"></div>
		';
		$apie = mysql_fetch_assoc(mysql_query("SELECT * FROM `zaidejai` WHERE `nick` = '$nick'"));
		if ($apie['minichatas'] != 1){echo'
    <form action="?id=&ka=rasyti#" method="post"/>
    <textarea name="zinute" cols="25" rows="2" placeholder="Bendraujam :)" required>'.$ats.'</textarea><br />
     <div class="line"></div>
    <input type="submit" value="Rašyti" style="cursor: pointer;></form>
     <div class="l">
  </div>';
	 
	}else{
	echo'<textarea class="bbzzin" name="zinute" id="minichatzin">'.$ats.'</textarea><br/>
<input id="minichatusername" name="nick" style="display: none;" readonly="readonly" value="'.$nick.'"/>
 <div class="line"></div>
  <input type="submit" onClick="minichatwrite()" value="Ra&#353;yti" style="cursor: pointer;"/>';
  echo'</div><div class="title">';
	}

    $visi = mysql_result(mysql_query("SELECT COUNT(*) FROM pokalbiai"),0);
    if($visi > 0){
    	
        if ($apie['minichatas'] == 1){
        	require 'mini.php';
		?>
	<script>
		var nick = "<?php echo $nick; ?>";
		setInterval(function(){loadChat(nick);},1000);
	</script>

	<div id="myDiv2"><?php include("minichat2.php"); ?></div></div>
	<?php
		}else{
			$xaz = $apie['rodymas'];
			
		$q = mysql_query("SELECT * FROM pokalbiai ORDER BY id DESC LIMIT $xaz");
		
        echo '<div class="title">';
        while($rr = mysql_fetch_assoc($q)){
			$nr++;
			 	 	if($apie[statusas] == 'Admin' or $apie[statusas] == 'Mod' or $apie[statusas] == 'Mod2' or $apie[statusas] == 'Mod3' or $apie[statusas] == 'Mod4'){ $goo = '<a href="?id=delete&ka='.$rr['id'].'"><small>[x]</small></a>';}
			echo '<b>'.$nr.'.</b> <a href="?id=apie&ka='.$rr['nick'].'"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' <small>('.lai($rr['data']).')</small>';
			if($rr['nick'] != $nick && $rr['nick']  != 'SUPPORT') echo ' <a href="?id=&ka='.$rr['nick'].'#"><small>[A]</small></a>'.$goo.'<br />'; else echo '<br /><left>';
      
	    }
        unset($nr);
        echo '</div>';
		}
    }else{
          echo '<div class="meniuc">Žinučių nėra!</div>';
       }
     }
	
				
			
			
				if($id == 'fight'){
						online(Arenoje);
						$kk = mysql_fetch_assoc(mysql_query("SELECT * FROM arena WHERE nick = '$nick'"));
				$k = mysql_fetch_assoc(mysql_query("SELECT * FROM arena WHERE id = '$ka'"));
				$druzba= mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick = '$ka'"));
				$js= mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick = '$druzba[nick]'"));
				
				$kov = mysql_fetch_assoc(mysql_query("SELECT * FROM zaidejai WHERE nick = '$k[nick]'"));
				
				if(empty($ka)){ echo '<div class="meniuc">Klaida</div>';}
				elseif($k['nick'] == ""){
						 echo '<div class="meniuc">Klaida</div>';}
				elseif($kov['gyvybes'] < 1){
						
						 echo '<div class="meniuc">Priesas neturi gyvybiu!</div>';}
						
elseif($apie['gyvybes'] < 1){
						
						 echo '<div class="meniuc">Tu neturi gyvybių</div>';
}
	
				elseif($apie['gyvybes'] < $kov['gyvybes'])	{
			
			
			
			 echo '<div class="meniuc">'.$kov['nick'].' gyvybės : '.$kov['gyvybes'].', o tavo '.$apie['gyvybes'].'</br>Pralaimėjai, praradai visus savo pinigu</div>';
	$laimejimas = $apie['litai'];
	mysql_query("UPDATE zaidejai SET litai=litai+'$laimejimas' WHERE nick='$kov[nick]'")or die(mysql_error());
	mysql_query("UPDATE zaidejai SET litai='0', gyvybes='0' WHERE nick='$nick'")or die(mysql_error());

	mysql_query("UPDATE zaidejai SET laimejo ='$nick', laimeta =laimeta +'1' WHERE nick='$kov[nick]'")or die(mysql_error());
	mysql_query("UPDATE zaidejai SET pralaimejo='$kov[nick]', pralaimeta=pralaimeta+'1' WHERE nick='$nick'")or die(mysql_error());
}
else{
			echo'<div class="meniu">Laimėjai tavo gyvybės <b>'.$apie['gyvybes'].'</b> o '.$kov['nick'].' gyvybės <b>'.$kov['gyvybes'].'</b></div>';
	$laimejimas = $kov['litai'];
		mysql_query("UPDATE zaidejai SET litai=litai+'$laimejimas' WHERE nick='$nick'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET litai='0' WHERE nick='$kov[nick]'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET gyvybes='0' WHERE nick = '$kov[nick]'")or die(mysql_error());
		mysql_query("UPDATE zaidejai SET laimejo ='$kov[nick]', laimeta=laimeta+'1' WHERE nick='$nick'")or die(mysql_error());
}
	


			
		
		

		
		
		
		
		$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Arena");
navigacija($g_n);
		
				}
				if($id== 'off'){
						online(Arenoje);
							mysql_query("DELETE FROM arena WHERE nick='$nick'");
					echo'<div class="meniuc">Atsijungiai sekmingai</div>';
							$g_n[] = array("pagrindinis.php?id=","Pagrindinis","Arena");
navigacija($g_n);
					
				}
		}
		
	 foot();
		
		?>
