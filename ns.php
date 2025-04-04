<?php

echo "<!DOCTYPE html PUBLIC '-//WAPFORUM//DTD XHTML Mobile 1.0//EN' 'http://www.wapforum.org/DTD/xhtml-mobile10.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt'>";

include_once 'cfg/sql.php';
include_once 'cfg/funkcijos.php';
head2();
online('Non stop'); 
echo'
<div class="up">
<img src="img/baneriai/botasm.png" /></div>';
		topbar();
if($id == ""){
   top('Non stop');
   if(isset($_POST[submit])){
   	
	   $ats = post($_POST['ats']);
    if(empty($ats)){
        echo '<script>document.location="?id="</script>';
    }
   else {
	
     mysql_query("INSERT INTO ns SET nick='$nick', msg='$ats', laikas='".time()."'");
    ?> <script>
     document.location="?id="
     </script> <?
    
    }
	
	
	
	
   }
     echo '<div class="meniuc"><form action="?id=" method="post"/><textarea name="ats"></textarea></br> <input type="submit" name="submit" value="Rašyti/Naujinti"/></form></div>';
     $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM ns"),0);
     if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
        $query = mysql_query("SELECT * FROM ns ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
        $puslapiu=ceil($viso/$rezultatu_rodymas);
        while($row = mysql_fetch_assoc($query)){
            echo '<div class="meniu"> <b>'.statusas($row['nick']).'</b>: '.smile($row['msg']).'<br /><small>&raquo; '.laikas($row['laikas']).' </small>';
		
echo"</div>";
            }
            echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=').'</div>';
			
			
            
            
           }
            
       else{
                echo '<div class="meniuc">Žinučių nėra!</div>';
            }
  $g_n[] = array("pagrindinis.php?id=","Pagrindinis","Non stop");
navigacija($g_n);
}

if($id == 'dalyviai')
{
	top('Non stop dalyviai');
	 echo '<div class="meniu"> ';
	 $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM zaidejai WHERE ns='+'"),0);
     if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
	 
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	 }else{
	 	echo'Dalyvių nėra';
	 }
	$r = mysql_query("SELECT * FROM zaidejai WHERE ns='+' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
			
			while($q = mysql_fetch_assoc($r)){
				 echo ''.statusas($q[nick]).'</br> ';
			}
			echo'</div>';
			  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=dalyviai').'</div>';
			    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ns.php","Non stop","Non stop dalyviai");
navigacija($g_n);
}
if($id == 'on')
{
	top('Prisijungusieji');
	 echo '<div class="meniu"> ';
	 $viso = mysql_result(mysql_query("SELECT COUNT(*) FROM online WHERE vieta='Non stop'"),0);
     if($viso > 0){
        $rezultatu_rodymas=10;
            $total = @intval(($viso-1) / $rezultatu_rodymas) + 1;
            if (empty($psl) or $psl < 0) $psl = 1;
            if ($psl > $total) $psl = $total;
            $nuo_kiek=$psl*$rezultatu_rodymas-$rezultatu_rodymas;
	 
        $puslapiu=ceil($viso/$rezultatu_rodymas);
	 }else{
	 	echo'Dalyvių nėra';
	 }
	$r = mysql_query("SELECT * FROM  online WHERE vieta='Non stop' ORDER BY id DESC LIMIT $nuo_kiek,$rezultatu_rodymas");
			
			while($q = mysql_fetch_assoc($r)){
				 echo ''.statusas($q[nick]).',  ';
			}
			echo'</div>';
			  echo '<div class="meniuc">'.puslapiavimas($puslapiu,$psl,'?id=on').'</div>';
			    $g_n[] = array("pagrindinis.php?id=","Pagrindinis","ns.php","Non stop","Prisijungusieji");
navigacija($g_n);
}

		
    foot();
?>
