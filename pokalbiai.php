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
		top('Pokalbiai');
 
   if($ka == "rasyti"){
        $zin = post($_POST['zinute']);
        if(empty($zin)){
            echo '<script>document.location="?id=#"</script>';
        }
        elseif($lygis < 35){
            echo '<div class="error">Jūsų lygis per žemas! Reikia 35 lygio.</div>';
        }
		
		elseif($apie[veiksmai] < 5000){
               echo '<font color="red">Rašyti galima nuo 5000 laimėtų kovų</font><br/>';
            }
			
 
	  
			else{
      
           	
 
		   
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
    <textarea name="zinute" cols="25" rows="2" placeholder="Bendraujam :)">'.$ats.'</textarea><br />
     <div class="line"></div>
    <input type="submit" value="Rašyti/Atnaujinti" style="cursor: pointer;></form>
     <div class="l">
  </div>';
	 
	}else{
	echo'<textarea class="bbzzin" name="zinute" id="minichatzin">'.$ats.'</textarea><br/>
<input id="minichatusername" name="nick" style="display: none;" readonly="readonly""/>
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
			 	 	if($apie[statusas] == 'Admin' or $apie[statusas] == 'Mod' or $apie[statusas] == 'Mod2' or $apie[statusas] == 'Mod3' or $apie[statusas] == 'Mod4'){ $goo = '<a href="pagrindinis.php?id=delete&ka='.$rr['id'].'"><small>[x]</small></a>';}
			echo '<b>'.$nr.'.</b> <a href="pagrindinis.php?id=apie&ka='.$rr['nick'].'"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' <small>('.lai($rr['data']).')</small>';
			echo ' <a href="?id=&ka='.$rr['nick'].'#"><small>[A]</small></a>'.$goo.'<br />';
      
	    }
        unset($nr);
        echo '</div>';
		}
    }else{
          echo '<div class="meniuc">Žinučių nėra!</div>';
       }
     
	 	


 $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Pokalbiai");
	navigacija($g_n);
foot();
?>
