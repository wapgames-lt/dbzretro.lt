<?php
ob_start();
include_once 'cfg/sql.php';
include_once 'cfg/login.php';
echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

head2();
$ip = $_SERVER ['REMOTE_ADDR'];
if($apie[ip] == ""){
mysql_query("UPDATE zaidejai SET ip='$ip' WHERE nick='$nick'");}
echo '<div class="head"> Vegeta.US.LT</div>';
echo'<div class="div"';
newupdate();
if($new_pm > 0)
{
echo '<a href="pm.php?i=gautos_all"><font color="black">Turite <b>'.$new_pm.'</b> neperskaitytų PM !</a></font>';
echo '<div class="line"></div>';
}



echo'<div class="title"><b>Pokalbiai</b>:';
echo '<div class="line"></div>';
if(mysql_num_rows(mysql_query("SELECT * FROM mute WHERE nick='$nick'")) > 0){
 echo '<center><b>Tu esi u&#382;tildytas!</b></center>';
 }
else{    if(!empty($wh)) $ats = $wh.' -&raquo; '; else $ats = '';

echo '   <form action="?i=&ka=rasyti" method="post"/>
    <textarea name="zinute" cols="25" rows="2">'.$ats.'</textarea><br />
    <input type="submit" value="Rašyti / Atnaujinti"/></form>';

 echo '<div class="line"></div>';}

    if($ka == "rasyti"){
        $zin = post($_POST['zinute']);
        if(empty($zin)){
            echo '<script>document.location="?i=#"</script>';
        }
        elseif($lygis < 34 AND $apie['statusas'] !== "Admin" AND $apie['statusas'] !== "Mod"){
            echo 'Jūsų lygis per žemas! Reikia 35 lygio.';
 echo '<div class="line"></div>';

        }
        elseif(strlen($zin) < 1){
            echo '<script>document.location="?i=#"</script>';
        }else{
            if($zin == "/clean" AND $statusas == "Admin"){
                mysql_query("DELETE FROM pokalbiai");
                mysql_query("INSERT INTO pokalbiai SET nick='Sistema', sms ='<b>".statusas($nick)."</b> Išvalė pokalbius! :)', data='".time()."'");
            }else{
if ($apie['vip_time'] > time()){
            mysql_query("INSERT INTO pokalbiai SET nick='$nick', sms='<font color=red>".smile($zin)."</font>', data='".time()."'");
}
else{            mysql_query("INSERT INTO pokalbiai SET nick='$nick', sms='".smile($zin)."', data='".time()."'");
}            }
            echo '<script>document.location="?i=#"</script>';
        }
    }

   $visi = mysql_result(mysql_query("SELECT COUNT(*) FROM pokalbiai"),0);
       if($visi > 0){
         $q = mysql_query("SELECT * FROM pokalbiai ORDER BY id DESC LIMIT 10");

         while($rr = mysql_fetch_assoc($q)){
            $nr++;
            echo '<div class="left">'.$nr.'.<a href="nera.php"><b>'.statusas($rr['nick']).'</b></a> - '.smile($rr['sms']).' (<small>'.laikas($rr['data']).'</small>)';
            if($rr['nick'] != $nick && $rr['nick']  != 'Administracija') echo ' <a href="nera.php"><small>[A]</small></a><br/>'; else echo '<br/>';
echo '</div>';
         }
         unset($nr);
       }else{
          echo 'Žinučių nėra!';
       }

echo'</div>';
foot();
?>

