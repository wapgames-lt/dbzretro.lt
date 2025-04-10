<?php
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';

$nick = post($_GET['username']);
$xaz = $apie['rodymas'];

$q = mysqli_query($conn,"SELECT * FROM pokalbiai ORDER BY id DESC LIMIT $xaz");
       
        while($rr = mysqli_fetch_assoc($q)){
			$nr++;
		 

			if ($rr['nick']  != 'SISTEMA'){echo '<b>'.$nr.'.</b> <a href="pagrindinis.php?id=apie&ka='.$rr['nick'].'"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' <small>('.lai($rr['data']).')</small>';}elseif ($rr['nick'] == "aNox"){
				echo '<b>'.$nr.'</b>. <a href="pagrindinis.php?id=apie&ka='.$rr['nick'].'"><b><font color="red">&copy; ~ Don\'t</font> <font color="blue">CRY ~</font></b></a> - '.smile($rr['sms']).'';}
			elseif ($rr['nick']  == 'aNox'){echo '<b><img src="img/green-arrow.png" alt="*"/></b> <a href="?id=apie&ka='.$rr['nick'].'"><b>'.($rr['nick']).'</b></a> - '.smile($rr['sms']).' <small>('.lai($rr['data']).')</small>';}elseif ($rr['nick'] == "cry"){
				echo '<b>'.$nr.'</b>. <a href="pagrindinis.php?id=apie&ka='.$rr['nick'].'"><b><font color="red">&copy; ~ Don\'t</font> <font color="blue">CRY ~</font></b></a> - '.smile($rr['sms']).'';
			
			}else
			if ($rr['nick']  == 'SISTEMA'){
				echo '<b>'.$nr.'</b>. <b>'.statusas($rr['nick']).'</b> - '.smile($rr['sms']).'<small>('.laikas($rr['data']).')</small> ';
			}
				 	if($apie[statusas] == 'Kurejas' or$apie[statusas] == 'Admin' or $apie[statusas] == 'Mod' or $apie[statusas] == 'Mod2' or $apie[statusas] == 'Mod3' or $apie[statusas] == 'Mod4'){ $goo = '<a href="pagrindinis.php?id=delete&ka='.$rr['id'].'"><small>[x]</small></a>';}
			echo ' <a onclick="citata(\''.$rr['nick'].'\')"><small>[A]</small></a>'.$goo.'<br />';
        }
        unset($nr);
      
		
		
?>
