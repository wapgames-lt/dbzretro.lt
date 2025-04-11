<?php


	if($ka == "rasyti"){
        $zin = post($_POST['zinute']);
        if(empty($zin)){
            echo '<script>document.location="?id=#"</script>';
        }
        elseif($lygis < 35){
            echo '<div class="error">Jūsų lygis per žemas! Reikia 35 lygio.</div>';
        }
        elseif(strlen($zin) < 4){
            echo '<script>document.location="?id=#"</script>';
      
			}else{
      
           	
 
		   
            mysqli_query($conn,"INSERT INTO pokalbiai SET nick='".$nick."', sms='$zin', data='".time()."'");
            }
            mysqli_query($conn,"UPDATE zaidejai SET chate=chate+1 WHERE nick='$nick'");
            echo '<script>document.location="?id=#"</script>';
        
    }
        if(!empty($ka)) $ats = $ka.' -> '; else $ats = '';
        echo '<div class="meniuc">
		<div id="error"></div>
		';
		$apie = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `zaidejai` WHERE `nick` = '$nick'"));
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

$visi = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM pokalbiai"))[0];
if ($visi > 0) {

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
			
		$q = mysqli_query($conn,"SELECT * FROM pokalbiai ORDER BY id DESC LIMIT $xaz");
		
        echo '<div class="title">';
        while($rr = mysqli_fetch_assoc($q)){
			$nr++;
			 	 	if($apie['statusas'] == 'Admin' or $apie['statusas'] == 'Mod' or $apie['statusas'] == 'Mod2' or $apie['statusas'] == 'Mod3' or $apie['statusas'] == 'Mod4'){ $goo = '<a href="?id=delete&ka='.$rr['id'].'"><small>[x]</small></a>';}
			echo '<b>'.$nr.'.</b> <a href="pagrindinis.php?id=apie&ka='.$rr['nick'].'"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' <small>('.lai($rr['data']).')</small>';
			if($rr['nick'] != $nick && $rr['nick']  != 'SUPPORT') echo ' <a href="?id=&ka='.$rr['nick'].'#"><small>[A]</small></a>'.$goo.'<br />'; else echo '<br /><left>';
      
	    }
        unset($nr);
        echo '</div>';
		}
    }else{
          echo '<div class="meniuc">Žinučių nėra!</div>';
       
     }
?>
